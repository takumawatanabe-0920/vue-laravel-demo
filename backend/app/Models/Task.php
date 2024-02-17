<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Tag;
use App\Enums\TaskLevel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    protected $table = 'tasks';

    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    use HasFactory;
    use HasUuids;

    protected $fillable = ['label', 'is_done', 'level'];
    protected $guarded = ['id'];

    protected $casts = [
        'is_done' => 'boolean',
        'label' => "string",
        'level' => TaskLevel::class
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

        static::deleting(function ($task) {
            $task->tags()->detach();
        });
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany<\App\Models\Tag>
     */
    public function tags(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'task_tag', 'task_id', 'tag_id');
    }
}
