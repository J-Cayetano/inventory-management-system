<?php

namespace App\Http\Controllers\Setups\Items;

use Exception;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreBrandRequest;
use Yajra\DataTables\Facades\DataTables;
use App\Traits\Controllers\ResponseTrait;

class BrandController extends Controller
{
    use ResponseTrait;

    public string $table;
    public string $title;

    public function __construct(
        public Brand $model
    ) {
        $this->title = "Brands Management";
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

        return $this->viewResponse('setups.items.brands.index');
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
                    ? "<span class='badge bg-green text-green-fg'>Active</span>"
                    : "<span class='badge bg-red text-red-fg'>Deleted</span>";
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

        return $this->viewResponse('setups.items.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBrandRequest $request)
    {
        abort_if(Gate::denies($this->table . '_store'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        try {
            $request->merge([
                "created_by" => $request->user()->email
            ]);
            $this->model->create($request->all());
            return $this->redirectResponse('success', "Brand $request->name created successfully!");
        } catch (Exception $e) {
            return $this->redirectResponse('error', "Brand create unsuccessfully! Error: " . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        abort_if(Gate::denies($this->table . '_update'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return $this->viewDataResponse('setups.items.brands.edit', 'brand', $brand);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brand $brand)
    {
        abort_if(Gate::denies($this->table . '_update'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $request->validate([
            'code' => ['required', 'regex:/^[a-zA-Z0-9\-]+$/', Rule::unique($this->table)->ignore($brand->id)->whereNull('deleted_at')],
            'name' => ['required', 'string', Rule::unique($this->table)->ignore($brand->id)->whereNull('deleted_at')],
        ]);

        try {
            $request->merge([
                "updated_by" => $request->user()->email
            ]);
            $brand->update($request->all());
            $brand->save();
            return $this->redirectResponse('success', "Brand $brand->name updated successfully!");
        } catch (Exception $e) {
            return $this->redirectResponse('error', "Brand update unsuccessfully! Error: " . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Brand $brand)
    {
        abort_if(Gate::denies($this->table . '_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return $this->viewDataResponse('setups.items.brands.delete', 'brand', $brand);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Brand $brand)
    {
        abort_if(Gate::denies($this->table . '_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        try {
            $brand->update([
                'deleted_by' => $request->user()->email
            ]);
            $brand->delete();
            return $this->redirectResponse('success', "Brand deleted successfully!");
        } catch (Exception $e) {
            return $this->redirectResponse('error', "Brand delete unsuccessfully! Error: " . $e->getMessage());
        }
    }
}
