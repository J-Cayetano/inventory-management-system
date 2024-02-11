<?php

namespace App\Http\Controllers\Inventory;

use Exception;
use App\Models\Item;
use App\Models\Unit;
use App\Models\Category;
use App\Models\Supplier;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use App\Traits\Controllers\ResponseTrait;

class ItemController extends Controller
{
    use ResponseTrait;

    public $title;

    public function __construct(
        public Item $model,
        public Category $category,
        public Unit $unit,
        public Supplier $supplier,
    ) {
        $this->title = "Item Management";
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        abort_if(Gate::denies($this->model->getTable() . '_store'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('inventory.items.create', [
            'title' => $this->title,
            'key' => $this->model->getTable(),
            'categories' => $this->category->all(['id', 'title']),
            'units' => $this->unit->all(['id', 'title']),
            'suppliers' => $this->supplier->all(['id', 'name']),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreItemRequest $request)
    {
        abort_if(Gate::denies($this->model->getTable() . '_store'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        try {
            $photo_path = $request->file('photo_file')->store("items/photo", 'public');

            $request->merge([
                "created_by" => $request->user()->email,
                "photo" => $photo_path,
            ]);

            $this->model->create($request->all());

            return redirect()->to(route('inventory'))->with('success', "Item $request->name created successfully!");
        } catch (Exception $e) {
            return redirect()->to(route('inventory'))->with('error', $e->getMessage());
        }

        return $request->validated();
    }

    /**
     * Display the specified resource.
     */
    public function show($item)
    {
        $item = $this->model->find($item);
        $title = $this->title;
        return view('inventory.items.show', compact('item', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateItemRequest $request, Item $item)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        //
    }
}
