<?php
 namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todolist extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'group_id',
    ];

    /**
     * Bir listenin ait olduğu grubu döndürür.
     */
    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}