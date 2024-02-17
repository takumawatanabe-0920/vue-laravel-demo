<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'tags';

    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    use HasFactory;
    use HasUuids;

    protected $fillable = ['name', 'color', 'description'];
    protected $guarded = ['id'];

    protected $casts = [
        'name' => 'string',
        'color' => 'string',
        'description' => 'string',
    ];


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

        static::deleting(function ($tag) {
            $tag->tasks()->detach();
        });
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany<\App\Models\Task>
     */
    public function tasks(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Task::class, 'task_tag', 'tag_id', 'task_id');
    }
}
