<?php

namespace App\Traits\Controllers;

trait ResponseTrait
{
    public function viewResponse(string $view)
    {
        return view($view, [
            "title" => $this->title,
            "key" => $this->model->getTable()
        ]);
    }

    public function viewDataResponse(string $view, $key, $data)
    {
        return view($view, [
            "title" => $this->title,
            "key" => $this->model->getTable(),
            $key => $data
        ]);
    }

    public function redirectResponse(string $key, string $message)
    {
        return redirect()->to(route($this->model->getTable()))->with($key, $message);
    }
}
