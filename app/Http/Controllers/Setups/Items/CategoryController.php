<?php

namespace App\Http\Controllers\Setups\Items;

use Exception;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\Facades\DataTables;
use App\Traits\Controllers\ResponseTrait;
use App\Http\Requests\StoreCategoryRequest;

class CategoryController extends Controller
{
    use ResponseTrait;

    public string $table;
    public string $title;

    public function __construct(
        public Category $model
    ) {
        $this->title = "Categories Management";
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

        return $this->viewResponse('setups.items.' . $this->table . '.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        abort_if(Gate::denies($this->table . '_store'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        try {
            $request->merge([
                "created_by" => $request->user()->email
            ]);
            $this->model->create($request->all());
            return $this->redirectResponse('success', "Category $request->name created successfully!");
        } catch (Exception $e) {
            return $this->redirectResponse('error', "Category create unsuccessfully! Error: " . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        abort_if(Gate::denies($this->table . '_update'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return $this->viewDataResponse('setups.items.' . $this->table . '.edit', 'category', $category);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        abort_if(Gate::denies($this->table . '_update'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $request->validate([
            'code' => ['required', 'regex:/^[a-zA-Z0-9\-]+$/', Rule::unique($this->table)->ignore($category->id)->whereNull('deleted_at')],
            'name' => ['required', 'string', Rule::unique($this->table)->ignore($category->id)->whereNull('deleted_at')],
        ]);

        try {
            $request->merge([
                "updated_by" => $request->user()->email
            ]);
            $category->update($request->all());
            $category->save();
            return $this->redirectResponse('success', "Category $category->name updated successfully!");
        } catch (Exception $e) {
            return $this->redirectResponse('error', "Category update unsuccessfully! Error: " . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Category $category)
    {
        abort_if(Gate::denies($this->table . '_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return ($category->subcategories->count() === 0)
            ? $this->viewDataResponse('setups.items.' . $this->table . '.delete', 'category', $category)
            : $this->redirectResponse('error', $category->name . " has an active subcategory! Cannot be deleted as of this moment.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Category $category)
    {
        abort_if(Gate::denies($this->table . '_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        try {
            $category->update([
                'deleted_by' => $request->user()->email
            ]);
            $category->delete();
            return $this->redirectResponse('success', "Category deleted successfully!");
        } catch (Exception $e) {
            return $this->redirectResponse('error', "Category delete unsuccessfully! Error: " . $e->getMessage());
        }
    }
}
