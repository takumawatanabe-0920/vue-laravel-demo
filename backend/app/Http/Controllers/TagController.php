<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Services\TagService;
use App\Http\Requests\TagRequest;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;
use App\Http\Dto\Tags\CreateTagDto;
use App\Http\Dto\Tags\UpdateTagDto;


class TagController extends Controller
{
    private TagService $service;

    public function __construct(
        TagService $service,
    ) {
        $this->service = $service;
    }

    /**
     * @return Collection<int, Tag>
     */
    public function index(): Collection
    {
        return $this->service->index();
    }

    public function show(int $id): Tag | null
    {
        return $this->service->show($id);
    }

    public function store(TagRequest $request): Tag | null
    {
        $data = $request->validated();
        $transformedData = [
            'name' => (string) $data['name'],
            'color' => (string) $data['color'],
            'description' => (string) $data['description'],
        ];
        $transformedData = new CreateTagDto($transformedData);
        return $this->service->store($transformedData);
    }

    public function update(TagRequest $request, int $id): bool
    {
        $data = $request->validated();
        $transformedData = [
            'name' => (string) $data['name'],
            'color' => (string) $data['color'],
            'description' => (string) $data['description'],
        ];
        $transformedData = new UpdateTagDto($transformedData);
        return $this->service->update($transformedData, $id);
    }

    public function destroy(int $id): int
    {
        return $this->service->destroy($id);
    }
}
