<?php

namespace App\Http\Controllers\Purchases;

use Exception;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\Facades\DataTables;
use App\Traits\Controllers\ResponseTrait;
use App\Http\Requests\StoreSupplierRequest;
use App\Http\Requests\UpdateSupplierRequest;

class SupplierController extends Controller
{
    use ResponseTrait;

    public $title;

    public function __construct(
        public Supplier $model
    ) {
        $this->title = "Supplier Management";
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        abort_if(Gate::denies($this->model->getTable() . '_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {

            $query = $this->model->when($request->has('deactivate_switch'), function ($query) use ($request) {
                if ($request->deactivate_switch === "true") {
                    return $query->withTrashed();
                }
            });

            $datatable = DataTables::of($query);

            $datatable->addColumn('actions', function ($row) {
                $key = $this->model->getTable();
                $editGate      = $this->model->getTable() . '_update';
                $deleteGate    = $this->model->getTable() . '_delete';

                return view('components.datatables.action-buttons', compact(
                    'editGate',
                    'deleteGate',
                    'key',
                    'row'
                ));
            });

            $datatable->editColumn('code', function ($row) {
                return $row->code ? $row->code : '';
            });

            $datatable->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });

            $datatable->editColumn('email', function ($row) {
                return $row->email ? $row->email : '';
            });

            $datatable->editColumn('contact', function ($row) {
                return $row->contact ? $row->contact : '';
            });

            $datatable->addColumn('last_action_at', function ($row) {
                if ($row->deleted_by) {
                    return $row->deleted_at;
                } else if ($row->updated_by) {
                    return $row->updated_at;
                } else {
                    return $row->created_at;
                }
            });

            $datatable->addColumn('last_action_by', function ($row) {
                if ($row->deleted_by) {
                    return $row->deleted_by;
                } else if ($row->updated_by) {
                    return $row->updated_by;
                } else {
                    return $row->created_by;
                }
            });

            $datatable->addColumn('status', function ($row) {
                return ($row->deleted_by === null) ? "<span value='true' class='badge bg-green text-green-fg'>Active</span>" : "<span value='false' class='badge bg-red text-red-fg'>Deactivated</span>";
            });

            $datatable->rawColumns(['actions', 'status']);

            return $datatable->make(true);
        }

        return $this->viewResponse('purchases.suppliers.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        abort_if(Gate::denies($this->model->getTable() . '_store'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return $this->viewResponse('purchases.suppliers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSupplierRequest $request)
    {
        abort_if(Gate::denies($this->model->getTable() . '_store'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        try {
            $request->merge([
                "created_by" => $request->user()->email
            ]);
            $this->model->create($request->all());
            return $this->redirectResponse('success', "Supplier $request->name created successfully!");
        } catch (Exception $e) {
            return $this->redirectResponse('error', "Supplier created unsuccessfully!");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supplier $supplier)
    {
        abort_if(Gate::denies($this->model->getTable() . '_update'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return $this->viewDataResponse('purchases.suppliers.edit', 'supplier', $supplier);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSupplierRequest $request, Supplier $supplier)
    {
        abort_if(Gate::denies($this->model->getTable() . '_update'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        try {
            $request->merge([
                "updated_by" => $request->user()->email
            ]);
            $supplier->update($request->all());
            $supplier->save();
            return $this->redirectResponse('success', "Supplier $request->name updated successfully!");
        } catch (\Throwable $th) {
            return $this->redirectResponse('error', "Supplier updated unsuccessfully!");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Supplier $supplier)
    {
        abort_if(Gate::denies($this->model->getTable() . '_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return $this->viewDataResponse('purchases.suppliers.delete', 'supplier', $supplier);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Supplier $supplier)
    {
        abort_if(Gate::denies($this->model->getTable() . '_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        try {
            $supplier->update([
                'deleted_by' => $request->user()->email
            ]);
            $supplier->delete();
            $supplier->save();
            return $this->redirectResponse('success', "Supplier $supplier->title deleted successfully!");
        } catch (Exception $e) {
            return $this->redirectResponse('error', "Supplier updated unsuccessfully!");
        }
    }
}
