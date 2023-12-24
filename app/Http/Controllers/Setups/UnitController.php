<?php

namespace App\Http\Controllers\Setups;

use Exception;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreUnitRequest;
use App\Http\Requests\UpdateUnitRequest;
use Yajra\DataTables\Facades\DataTables;
use App\Traits\Controllers\ResponseTrait;

class UnitController extends Controller
{
    use ResponseTrait;

    public $title;

    public function __construct(
        public Unit $model
    ) {
        $this->title = "Item Unit Management";
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

            $datatable->editColumn('title', function ($row) {
                return $row->title ? $row->title : '';
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

        return $this->viewResponse('setups.units.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        abort_if(Gate::denies($this->model->getTable() . '_store'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return $this->viewResponse('setups.units.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUnitRequest $request)
    {
        abort_if(Gate::denies($this->model->getTable() . '_store'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        try {
            $request->merge([
                "created_by" => $request->user()->email
            ]);
            $this->model->create($request->all());
            return $this->redirectResponse('success', "Unit $request->title created successfully!");
        } catch (Exception $e) {
            return $this->redirectResponse('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Unit $unit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Unit $unit)
    {
        abort_if(Gate::denies($this->model->getTable() . '_update'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return $this->viewDataResponse('setups.units.edit', 'unit', $unit);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUnitRequest $request, Unit $unit)
    {
        abort_if(Gate::denies($this->model->getTable() . '_update'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        try {
            $request->merge([
                "updated_by" => $request->user()->email
            ]);
            $unit->update($request->all());
            $unit->save();
            return $this->redirectResponse('success', "Unit $request->title updated successfully!");
        } catch (Exception $e) {
            return $this->redirectResponse('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Unit $unit)
    {
        abort_if(Gate::denies($this->model->getTable() . '_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return $this->viewDataResponse('setups.units.delete', 'unit', $unit);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Unit $unit)
    {
        abort_if(Gate::denies($this->model->getTable() . '_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        try {
            $unit->update([
                'deleted_by' => $request->user()->email
            ]);
            $unit->delete();
            $unit->save();
            return $this->redirectResponse('success', "Unit $unit->title deleted successfully!");
        } catch (Exception $e) {
            return $this->redirectResponse('error', $e->getMessage());
        }
    }
}
