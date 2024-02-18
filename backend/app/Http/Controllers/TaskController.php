<?php

namespace App\Http\Controllers;

use App\Services\TaskService;
use App\Http\Requests\TaskRequest;
use App\Http\Controllers\Controller;
use App\Http\Dto\Tasks\CreateTaskDto;
use App\Http\Dto\Tasks\UpdateTaskDto;
use App\Http\Resources\Tasks\TaskListResource;
use App\Http\Resources\tasks\TaskResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class TaskController extends Controller
{
    private TaskService $service;

    public function __construct(
        TaskService $service,
    ) {
        $this->service = $service;
    }

    /**
     * @return AnonymousResourceCollection<int, TaskListResource>
     */
    public function index(): AnonymousResourceCollection
    {
        return $this->service->index();
    }

    public function show(string $id): TaskResource
    {
        return $this->service->show($id);
    }

    public function store(TaskRequest $request): TaskResource
    {
        $data = $request->validated();
        $transformedData = [
            'label' => (string) $data['label'],
            'is_done' => (bool) $data['is_done'],
            'tag_id' => (string) $data['tag_id'],
        ];
        $transformedData = new CreateTaskDto($transformedData);
        return $this->service->store($transformedData);
    }

    public function update(TaskRequest $request, string $id): TaskResource
    {
        $data = $request->validated();
        $transformedData = [
            'label' => (string) $data['label'],
            'is_done' => (bool) $data['is_done'],
            'tag_id' => (string) $data['tag_id'],
        ];
        $transformedData = new UpdateTaskDto($transformedData);
        return $this->service->update($transformedData, $id);
    }

    public function destroy(string $id): int
    {
        return $this->service->destroy($id);
    }
}
