<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\Controllers\ResponseTrait;

class UserController extends Controller
{
    use ResponseTrait;

    public $title;

    public function __construct(
        public User $model
    ) {
        $this->title = "User Profile";
    }

    public function index()
    {
        return $this->viewResponse('users.index');
    }
}
