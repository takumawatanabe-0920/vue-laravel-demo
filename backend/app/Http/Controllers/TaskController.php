<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskRequest;
use App\Services\TaskService;
use Illuminate\Support\Facades\Log;


class TaskController extends Controller
{
    private $service;

    public function __construct(
        TaskService $service,
    ) {
        $this->service = $service;
    }

    public function index()
    {
        return $this->service->index();
    }

    public function show($id)
    {
        return $this->service->show($id);
    }

    public function store(TaskRequest $request)
    {
        return $this->service->store($request->validated());
    }

    public function update(TaskRequest $request, $id)
    {
        return $this->service->update($request->validated(), $id);
    }

    public function destroy($id)
    {
        return $this->service->destroy($id);
    }
}
