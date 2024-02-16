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

    public function show(int $id): Task | null
    {
        return $this->service->show($id);
    }

    public function store(TaskRequest $request): Task | null
    {
        $data = $request->validated();
        $transformedData = [
            'label' => (string) $data['label'],
            'is_done' => (bool) $data['is_done'],
        ];
        $transformedData = new CreateTaskDto($transformedData);
        return $this->service->store($transformedData);
    }

    public function update(TaskRequest $request, int $id): bool
    {
        $data = $request->validated();
        $transformedData = [
            'label' => (string) $data['label'],
            'is_done' => (bool) $data['is_done'],
        ];
        $transformedData = new UpdateTaskDto($transformedData);
        return $this->service->update($transformedData, $id);
    }

    public function destroy(int $id): int
    {
        return $this->service->destroy($id);
    }
}
