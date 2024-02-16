<?php

namespace App\Http\Dto\Tasks;

class UpdateTaskDto
{
    public string $label;
    public bool $is_done;

    public function __construct(array $data)
    {
        $this->label = $data['label'];
        $this->is_done = $data['is_done'];
    }
}
