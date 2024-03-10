<?php

namespace App\Http\Controllers;

use App\Services\TagService;
use App\Http\Requests\TagRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\Tags\TagResource;
use App\Http\Resources\tags\TagListResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;


class TagController extends Controller
{
    private TagService $service;

    public function __construct(
        TagService $service,
    ) {
        $this->service = $service;
    }

    /**
     * @return AnonymousResourceCollection<int, TagListResource>
     */
    public function index(): AnonymousResourceCollection
    {
        return $this->service->index();
    }

    public function show(string $id): TagResource
    {
        return $this->service->show($id);
    }

    public function store(TagRequest $request): TagResource
    {
        $data = $request->validated();
        $transformedData = [
            'name' => (string) $data['name'],
            'color' => (string) $data['color'],
            'description' => (string) $data['description'],
        ];
        return $this->service->store($transformedData);
    }

    public function update(TagRequest $request, string $id): TagResource
    {
        $data = $request->validated();
        $transformedData = [
            'name' => (string) $data['name'],
            'color' => (string) $data['color'],
            'description' => (string) $data['description'],
        ];
        return $this->service->update($transformedData, $id);
    }

    public function destroy(string $id): int
    {
        return $this->service->destroy($id);
    }
}
