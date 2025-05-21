<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    /**
     * Bir grubun birçok Todolist'i olabilir.
     */
    public function todolists()
    {
        return $this->hasMany(Todolist::class);
    }
}