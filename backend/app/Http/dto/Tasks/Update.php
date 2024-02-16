<?php

namespace App\Http\Dto\Tasks;

class UpdateTaskDto
{
    public string $label;
    public bool $is_done;

    /**
     * UpdateTaskDto constructor.
     * @param array{"label": string, "is_done": bool} $data
     */
    public function __construct(array $data)
    {
        $this->label = $data['label'];
        $this->is_done = $data['is_done'];
    }

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return [
            'label' => $this->label,
            'is_done' => $this->is_done
        ];
    }
}
