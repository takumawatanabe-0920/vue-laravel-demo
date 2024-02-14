<?php

namespace App\Repositories;

use App\Models\Task;

class TaskRepository
{
    public function index()
    {
        return Task::all();
    }

    public function show($id)
    {
        return Task::find($id);
    }

    public function store($data)
    {
        return Task::create($data);
    }

    public function update($data, $id)
    {
        return Task::find($id)->update($data);
    }

    public function destroy($id)
    {
        return Task::destroy($id);
    }
}
