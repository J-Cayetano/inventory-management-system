<?php

namespace App\Http\Controllers\Inventory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Item;
use App\Models\Supplier;
use App\Traits\Controllers\ResponseTrait;

class InventoryController extends Controller
{
    use ResponseTrait;

    public $title;

    public function __construct(
        public Category $category,
        public Supplier $supplier,
        public Item $item,
    ) {
        $this->title = "Inventory Management";
    }

    public function gallery(Request $request)
    {
        return view('inventory.index-gallery', [
            'title' => $this->title,
            'key' => 'items',
            'categories' => $this->category->all(),
            'suppliers' => $this->supplier->all(),
            'items' => $this->item->paginate(10),
        ]);
    }

    public function table(Request $request)
    {
        return view('inventory.index-table', [
            'title' => $this->title,
            'key' => 'items',
            'categories' => $this->category->all(),
            'suppliers' => $this->supplier->all(),
            'items' => $this->item->paginate(10),
        ]);
    }
}
