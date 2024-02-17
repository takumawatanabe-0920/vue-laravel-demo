<?php

namespace App\Http\Dto\Tags;

class CreateTagDto
{
    public string $name;
    public string $color;
    public string $description;

    /**
     * CreateTagDto constructor.
     * @param array{"name": string, "color": string, "description": string} $data
     */
    public function __construct(array $data)
    {
        $this->name = $data['name'];
        $this->color = $data['color'];
        $this->description = $data['description'];
    }

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'color' => $this->color,
            'description' => $this->description
        ];
    }
}
