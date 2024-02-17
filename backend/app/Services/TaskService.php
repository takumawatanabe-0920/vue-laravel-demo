<?php

namespace App\Services;

use App\Models\Task;
use App\Repositories\TaskRepository;
use App\Http\Dto\Tasks\CreateTaskDto;
use App\Http\Dto\Tasks\UpdateTaskDto;
use App\Http\Resources\TaskListResource;
use App\Http\Resources\TaskResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class TaskService
{
    private TaskRepository $taskRepository;

    public function __construct(TaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    /**
     * @return AnonymousResourceCollection<int, TaskListResource>
     */
    public function index(): AnonymousResourceCollection
    {
        $tasks = $this->taskRepository->index();
        return TaskListResource::collection($tasks);
    }

    public function show(int $id): TaskResource
    {
        $task = $this->taskRepository->show($id);
        return TaskResource::make($task);
    }

    public function store(CreateTaskDto $data): TaskResource
    {
        $task = $this->taskRepository->store($data->toArray());
        return $this->show($task->id);
    }

    public function update(UpdateTaskDto $data, int $id): TaskResource
    {
        $this->taskRepository->update($data->toArray(), $id);
        return $this->show($id);
    }

    public function destroy(int $id): int
    {
        return $this->taskRepository->destroy($id);
    }
}
