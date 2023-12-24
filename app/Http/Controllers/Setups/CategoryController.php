<?php

namespace App\Http\Controllers\Setups;

use Exception;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\Facades\DataTables;
use App\Traits\Controllers\ResponseTrait;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    use ResponseTrait;

    public $title;

    public function __construct(
        public Category $model
    ) {
        $this->title = "Item Category Management";
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

        return $this->viewResponse('setups.categories.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        abort_if(Gate::denies($this->model->getTable() . '_store'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return $this->viewResponse('setups.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        abort_if(Gate::denies($this->model->getTable() . '_store'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        try {
            $request->merge([
                "created_by" => $request->user()->email
            ]);
            $this->model->create($request->all());
            return $this->redirectResponse('success', "Category $request->title created successfully!");
        } catch (Exception $e) {
            return $this->redirectResponse('error', "Category created unsuccessfully!");
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
        abort_if(Gate::denies($this->model->getTable() . '_update'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return $this->viewDataResponse('setups.categories.edit', 'category', $category);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        abort_if(Gate::denies($this->model->getTable() . '_update'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        try {
            $request->merge([
                "updated_by" => $request->user()->email
            ]);
            $category->update($request->all());
            $category->save();
            return $this->redirectResponse('success', "Category $request->title updated successfully!");
        } catch (\Throwable $th) {
            return $this->redirectResponse('error', "Category updated unsuccessfully!");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Category $category)
    {
        abort_if(Gate::denies($this->model->getTable() . '_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return $this->viewDataResponse('setups.categories.delete', 'category', $category);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Category $category)
    {
        abort_if(Gate::denies($this->model->getTable() . '_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        try {
            $category->update([
                'deleted_by' => $request->user()->email
            ]);
            $category->delete();
            $category->save();
            return $this->redirectResponse('success', "Category $category->title deleted successfully!");
        } catch (Exception $e) {
            return $this->redirectResponse('error', "Category updated unsuccessfully!");
        }
    }
}
