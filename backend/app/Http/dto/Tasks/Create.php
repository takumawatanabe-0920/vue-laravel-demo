<?php

namespace App\Http\Dto\Tasks;

class CreateTaskDto
{
    public string $label;
    public bool $is_done;

    /**
     * CreateTaskDto constructor.
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
