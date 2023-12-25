<?php

namespace App\Http\Controllers\Inventory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Traits\Controllers\ResponseTrait;

class InventoryController extends Controller
{
    use ResponseTrait;

    public $title;

    public function __construct(
        public Category $category,
    ) {
        $this->title = "Inventory Management";
    }

    public function index(Request $request)
    {
        return view('inventory.index', [
            'title' => $this->title,
            'key' => 'inventory',
            'categories' => $this->category->all(),
        ]);
    }
}
