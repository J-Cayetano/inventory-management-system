<?php

namespace App\Http\Controllers\Purchases;

use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\StoreVendorRequest;
use App\Traits\Controllers\ResponseTrait;
use App\Http\Requests\UpdateVendorRequest;

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
                    : "<span value='false' class='badge bg-red text-red-fg'>Deactivated</span>";
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVendorRequest $request, Vendor $vendor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vendor $vendor)
    {
        //
    }
}
