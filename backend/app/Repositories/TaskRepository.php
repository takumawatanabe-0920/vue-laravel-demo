<?php

namespace App\Repositories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Collection;

class TaskRepository
{
    /**
     * @return Collection<int, Task>
     */
    public function index(): Collection
    {
        return Task::all();
    }

    public function show(string $id): Task | null
    {
        return Task::find($id);
    }

    /**
     * @param array<string, mixed> $data
     */
    public function store(array $data): Task | null
    {
        $task = Task::create($data);
        $task->tags()->sync($data['tag_id']);

        return $task;
    }

    /**
     * @param array<string, mixed> $data
     */
    public function update(array $data, string $id): Task | null
    {
        $task = Task::find($id);

        if ($task === null) {
            return null;
        }

        $task->update($data);
        $task->tags()->sync($data['tag_id']);

        return $task;
    }

    public function destroy(string $id): int
    {
        return Task::destroy($id);
    }
}
