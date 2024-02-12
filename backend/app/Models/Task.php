<?php

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

    public function getIsDoneAttribute($value)
    {
        return (bool) $value;
    }


    public function setIsDoneAttribute($value)
    {
        $this->attributes['is_done'] = (bool) $value;
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->id = (string) \Illuminate\Support\Str::uuid();
        });
    }
}
