<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public $title;

    public function __construct()
    {
        $this->title = "Dashboard";
    }

    public function index()
    {
        return view('dashboard.index', [
            'title' => $this->title
        ]);
    }
}
