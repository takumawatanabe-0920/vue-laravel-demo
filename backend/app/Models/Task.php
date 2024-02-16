<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'tasks';

    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    use HasFactory;

    protected $fillable = ['label', 'is_done'];

    protected $casts = [
        'is_done' => 'boolean'
    ];

    public function getIsDoneAttribute(bool $value): bool
    {
        return $value;
    }


    public function setIsDoneAttribute(bool $value): void
    {
        $this->attributes['is_done'] = $value;
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->id = (string) \Illuminate\Support\Str::uuid();
        });
    }
}
