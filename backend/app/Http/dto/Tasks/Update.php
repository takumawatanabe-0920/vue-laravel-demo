<?php

namespace App\Http\Dto\Tasks;

class UpdateTaskDto
{
    public string $label;
    public bool $is_done;
    public string $tag_id;

    /**
     * UpdateTaskDto constructor.
     * @param array{"label": string, "is_done": bool, "tag_id": string} $data
     */
    public function __construct(array $data)
    {
        $this->label = $data['label'];
        $this->is_done = $data['is_done'];
        $this->tag_id = $data['tag_id'];
    }

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return [
            'label' => $this->label,
            'is_done' => $this->is_done,
            'tag_id' => $this->tag_id
        ];
    }
}
