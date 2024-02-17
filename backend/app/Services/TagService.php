<?php

namespace App\Services;

use App\Models\Tag;
use App\Repositories\TagRepository;
use Illuminate\Database\Eloquent\Collection;
use App\Http\Dto\Tags\CreateTagDto;
use App\Http\Dto\Tags\UpdateTagDto;

class TagService
{
    private TagRepository $tagRepository;

    public function __construct(TagRepository $tagRepository)
    {
        $this->tagRepository = $tagRepository;
    }

    /**
     * @return Collection<int, Tag>
     */
    public function index(): Collection
    {
        return $this->tagRepository->index();
    }

    public function show(int $id): Tag | null
    {
        return $this->tagRepository->show($id);
    }

    public function store(CreateTagDto $data): Tag | null
    {
        return $this->tagRepository->store($data->toArray());
    }

    public function update(UpdateTagDto $data, int $id): bool
    {
        return $this->tagRepository->update($data->toArray(), $id);
    }

    public function destroy(int $id): int
    {
        return $this->tagRepository->destroy($id);
    }
}
