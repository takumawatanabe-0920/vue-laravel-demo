<?php

namespace App\Repositories;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Collection;

class TagRepository
{
    /**
     * @return Collection<int, Tag>
     */
    public function index(): Collection
    {
        return Tag::all();
    }

    public function show(string $id): Tag | null
    {
        return Tag::find($id);
    }

    /**
     * @param array<string, mixed> $data
     */
    public function store(array $data): Tag | null
    {
        return Tag::create($data);
    }

    /**
     * @param array<string, mixed> $data
     */
    public function update(array $data, string $id): bool
    {
        $Tag = Tag::find($id);

        if ($Tag === null) {
            return false;
        }

        return $Tag->update($data);
    }

    public function destroy(string $id): int
    {
        return Tag::destroy($id);
    }
}
