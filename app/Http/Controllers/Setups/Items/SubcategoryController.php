<?php

namespace App\Http\Controllers\Setups\Items;

use Exception;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\Facades\DataTables;
use App\Traits\Controllers\ResponseTrait;
use App\Http\Requests\StoreSubcategoryRequest;
use App\Http\Requests\UpdateSubcategoryRequest;

class SubcategoryController extends Controller
{
    use ResponseTrait;

    public $title, $table;

    public function __construct(
        public Subcategory $model,
        public Category $category,
    ) {
        $this->title = "Subcategories Management";
        $this->table = $this->model->getTable();
    }

    #-------------------------------------------------------#
    #                      Web Functions                    #
    #-------------------------------------------------------#

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        abort_if(Gate::denies($this->table . '_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return $this->viewResponse('setups.items.' . $this->table . '.index');
    }

    /**
     * Send a datatable response.
     */
    public function datatable(Request $request)
    {
        abort_if(Gate::denies($this->table . '_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {

            $query = $this->model
                ->when($request->has('deactivate_switch'), function ($query) use ($request) {
                    if ($request->deactivate_switch === "true") {
                        return $query->withTrashed();
                    }
                });

            $datatable = DataTables::of($query);

            $datatable->addColumn('category', function ($row) {
                return $row?->category?->name ?? null;
            });

            $datatable->addColumn('last_action_at', function ($row) {
                return $row->delete_at ?? $row->updated_at ?? $row->created_at;
            });

            $datatable->addColumn('last_action_by', function ($row) {
                return $row->delete_by ?? $row->updated_by ?? $row->created_by;
            });

            $datatable->addColumn('status', function ($row) {
                return ($row->deleted_by === null)
                    ? "<span value='true' class='badge bg-green text-green-fg'>Active</span>"
                    : "<span value='false' class='badge bg-red text-red-fg'>Deleted</span>";
            });

            $datatable->addColumn('actions', function ($row) {
                return view('components.datatables.action-buttons', [
                    'row' => $row,
                    'key' => $this->table,
                    'editGate' => $this->table . '_update',
                    'deleteGate' => $this->table . '_delete',
                ]);
            });

            $datatable->rawColumns(['actions', 'status']);

            return $datatable->make(true);
        }

        abort(403, "Unauthorized way of access.");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        abort_if(Gate::denies($this->table . '_store'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = $this->category->all(['code', 'name']);
        return $this->viewDataResponse('setups.items.' . $this->table . '.create', 'categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSubcategoryRequest $request)
    {
        abort_if(Gate::denies($this->table . '_store'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        try {
            $request->merge(['category_id' => $this->category->whereCode($request->category_id)->value('id')]);
            $request->merge([
                "created_by" => $request->user()->email
            ]);
            $this->model->create($request->all());
            return $this->redirectResponse('success', "Subcategory $request->name created successfully!");
        } catch (Exception $e) {
            return $this->redirectResponse('error', "Subcategory create unsuccessfully! Error: " . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Subcategory $subcategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subcategory $subcategory)
    {
        abort_if(Gate::denies($this->table . '_update'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $categories = $this->category->all(['code', 'name']);
        return $this->viewInformationResponse('setups.items.' . $this->table . '.edit', compact('subcategory', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subcategory $subcategory)
    {
        abort_if(Gate::denies($this->table . '_update'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $request->validate([
            'code' => ['required', 'regex:/^[a-zA-Z0-9\-]+$/', Rule::unique($this->table)->ignore($subcategory->id)->whereNull('deleted_at')],
            'name' => ['required', 'string', Rule::unique($this->table)->ignore($subcategory->id)->whereNull('deleted_at')],
            'category_id' => ['required', 'string']
        ]);

        try {
            $request->merge(['category_id' => $this->category->whereCode($request->category_id)->value('id')]);
            $request->merge([
                "updated_by" => $request->user()->email
            ]);
            $subcategory->update($request->all());
            $subcategory->save();
            return $this->redirectResponse('success', "Subcategory $subcategory->name updated successfully!");
        } catch (Exception $e) {
            return $this->redirectResponse('error', "Subcategory update unsuccessfully! Error: " . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Subcategory $subcategory)
    {
        abort_if(Gate::denies($this->table . '_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return $this->viewDataResponse('setups.items.' . $this->table . '.delete', 'subcategory', $subcategory);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Subcategory $subcategory)
    {
        abort_if(Gate::denies($this->table . '_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        try {
            $subcategory->update([
                'deleted_by' => $request->user()->email
            ]);
            $subcategory->delete();
            return $this->redirectResponse('success', "Subcategory deleted successfully!");
        } catch (Exception $e) {
            return $this->redirectResponse('error', "Subcategory delete unsuccessfully! Error: " . $e->getMessage());
        }
    }
}
