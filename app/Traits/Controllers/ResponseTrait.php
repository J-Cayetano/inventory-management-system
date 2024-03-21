<?php

namespace App\Traits\Controllers;

use Illuminate\View\View;

trait ResponseTrait
{
    public function viewResponse(string $view): View
    {
        return view($view, [
            "title" => $this->title,
            "key" => $this->table
        ]);
    }

    public function viewDataResponse(string $view, $key, $data): View
    {
        return view($view, [
            "title" => $this->title,
            "key" => $this->table,
            $key => $data
        ]);
    }

    public function viewInformationResponse(string $view, $data)
    {
        $data['title'] = $this->title;
        $data['key'] = $this->table;

        return view($view, $data);
    }

    public function redirectResponse(string $key, string $message)
    {
        return redirect()->to(route($this->table . ".index"))->with($key, $message);
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
