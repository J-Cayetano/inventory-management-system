<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public $title;

    public function __construct()
    {
        $this->title = "Dashboard";
    }

    public function index()
    {
        return view('dashboard', [
            'title' => $this->title
        ]);
    }
}
