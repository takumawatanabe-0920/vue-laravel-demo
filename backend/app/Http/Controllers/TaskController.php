<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Services\TaskService;
use App\Http\Requests\TaskRequest;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;
use App\Http\Dto\Tasks\CreateTaskDto;
use App\Http\Dto\Tasks\UpdateTaskDto;


class TaskController extends Controller
{
    private TaskService $service;

    public function __construct(
        TaskService $service,
    ) {
        $this->service = $service;
    }

    /**
     * @return Collection<int, Task>
     */
    public function index(): Collection
    {
        return $this->service->index();
    }

    public function show(int $id): Task
    {
        return $this->service->show($id);
    }

    public function store(TaskRequest $request): Task
    {
        $data = new CreateTaskDto($request->validated());
        return $this->service->store($data);
    }

    public function update(TaskRequest $request, int $id): Task
    {
        $data = new UpdateTaskDto($request->validated());
        return $this->service->update($data, $id);
    }

    public function destroy(int $id): bool
    {
        return $this->service->destroy($id);
    }
}
