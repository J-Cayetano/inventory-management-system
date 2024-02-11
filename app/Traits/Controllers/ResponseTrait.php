<?php

namespace App\Traits\Controllers;

trait ResponseTrait
{
    public function viewResponse(string $view)
    {
        return view($view, [
            "title" => $this->title,
            "key" => $this->table
        ]);
    }

    public function viewDataResponse(string $view, $key, $data)
    {
        return view($view, [
            "title" => $this->title,
            "key" => $this->table,
            $key => $data
        ]);
    }

    public function redirectResponse(string $key, string $message)
    {
        return redirect()->to(route($this->table))->with($key, $message);
    }

    public function jsonResponse(
        string $status,
        string $message,
        mixed $data
    ) {
        return response()->json([
            "status" => $status,
            "message" => $message,
            "data" => $data,
        ]);
    }
}
