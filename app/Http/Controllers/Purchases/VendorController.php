<?php

namespace App\Http\Controllers\Purchases;

use Exception;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\StoreVendorRequest;
use App\Traits\Controllers\ResponseTrait;

class VendorController extends Controller
{
    use ResponseTrait;

    public $title, $table;

    public function __construct(
        public Vendor $model
    ) {
        $this->title = "Vendors Management";
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

        return $this->viewResponse('purchases.vendors.index');
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

        return $this->viewResponse('purchases.vendors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVendorRequest $request)
    {
        abort_if(Gate::denies($this->table . '_store'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        try {
            $request->merge([
                "created_by" => $request->user()->email
            ]);
            $this->model->create($request->all());
            return $this->redirectResponse('success', "Vendor $request->name created successfully!");
        } catch (Exception $e) {
            return $this->redirectResponse('error', "Vendor create unsuccessfully! Error: " . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Vendor $vendor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vendor $vendor)
    {
        abort_if(Gate::denies($this->table . '_update'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return $this->viewDataResponse('purchases.vendors.edit', 'vendor', $vendor);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vendor $vendor)
    {
        abort_if(Gate::denies($this->table . '_update'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        try {
            $data = $request->validate([
                'code' => ['required', 'regex:/^[a-zA-Z0-9\-]+$/', 'unique:' . $this->table . ',code,' . $vendor->id . ',id,deleted_at,NULL'],
                'name' => ['required', 'string', 'unique:' . $this->table . ',name,' . $vendor->id . ',id,deleted_at,NULL'],
                'email' => ['required', 'string', 'unique:' . $this->table . ',email,' . $vendor->id . ',id,deleted_at,NULL'],
                'contact' => ['required', 'string', 'unique:' . $this->table . ',contact,' . $vendor->id . ',id,deleted_at,NULL'],
                'city' => ['required', 'string'],
                'address' => ['required', 'string'],
            ]);
            $request->merge([
                "updated_by" => $request->user()->email
            ]);
            $vendor->update($request->all());
            $vendor->save();
            return $this->redirectResponse('success', "Vendor $vendor->name updated successfully!");
        } catch (Exception $e) {
            return $this->redirectResponse('error', "Vendor update unsuccessfully! Error: " . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Vendor $vendor)
    {
        abort_if(Gate::denies($this->table . '_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return $this->viewDataResponse('purchases.vendors.delete', 'vendor', $vendor);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Vendor $vendor)
    {
        abort_if(Gate::denies($this->table . '_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        try {
            $vendor->update([
                'deleted_by' => $request->user()->email
            ]);
            $vendor->delete();
            return $this->redirectResponse('success', "Vendor deleted successfully!");
        } catch (Exception $e) {
            return $this->redirectResponse('error', "Vendor delete unsuccessfully! Error: " . $e->getMessage());
        }
    }
}
