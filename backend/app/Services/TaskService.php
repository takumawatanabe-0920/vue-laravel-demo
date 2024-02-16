<?php

namespace App\Services;

use App\Models\Task;
use App\Repositories\TaskRepository;
use Illuminate\Database\Eloquent\Collection;
use App\Http\Dto\Tasks\CreateTaskDto;
use App\Http\Dto\Tasks\UpdateTaskDto;

class TaskService
{
    private TaskRepository $taskRepository;

    public function __construct(TaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    /**
     * @return Collection<int, Task>
     */
    public function index(): Collection
    {
        return $this->taskRepository->index();
    }

    public function show(int $id): Task | null
    {
        return $this->taskRepository->show($id);
    }

    public function store(CreateTaskDto $data): Task | null
    {
        return $this->taskRepository->store($data->toArray());
    }

    public function update(UpdateTaskDto $data, int $id): bool
    {
        return $this->taskRepository->update($data->toArray(), $id);
    }

    public function destroy(int $id): int
    {
        return $this->taskRepository->destroy($id);
    }
}
