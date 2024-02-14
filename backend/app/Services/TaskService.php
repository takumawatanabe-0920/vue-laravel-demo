<?php

namespace App\Services;

use App\Repositories\TaskRepository;

class TaskService
{
    private $taskRepository;

    public function __construct(TaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function index()
    {
        return $this->taskRepository->index();
    }

    public function show($id)
    {
        return $this->taskRepository->show($id);
    }

    public function store($data)
    {
        return $this->taskRepository->store($data);
    }

    public function update($data, $id)
    {
        return $this->taskRepository->update($data, $id);
    }

    public function destroy($id)
    {
        return $this->taskRepository->destroy($id);
    }
}
