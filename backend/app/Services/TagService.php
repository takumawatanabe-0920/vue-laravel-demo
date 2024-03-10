<?php

namespace App\Services;

use App\Http\Resources\tags\TagListResource;
use App\Http\Resources\Tags\TagResource;
use App\Repositories\TagRepository;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class TagService
{
    private TagRepository $tagRepository;

    public function __construct(TagRepository $tagRepository)
    {
        $this->tagRepository = $tagRepository;
    }

    /**
     * @return AnonymousResourceCollection<int, TagListResource>
     */
    public function index(): AnonymousResourceCollection
    {
        $tags = $this->tagRepository->index();
        return TagListResource::collection($tags);
    }

    public function show(string $id): TagResource
    {
        $tag = $this->tagRepository->show($id);
        return TagResource::make($tag);
    }

    public function store(array $data): TagResource
    {
        $tag = $this->tagRepository->store($data);
        return $this->show($tag->id);
    }

    public function update(array $data, string $id): TagResource
    {
        $this->tagRepository->update($data, $id);
        return $this->show($id);
    }

    public function destroy(string $id): int
    {
        return $this->tagRepository->destroy($id);
    }
}
