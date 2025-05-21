<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'is_completed',
        'todolist_id', // Burayı ekledik
        'reminder_at', // Hatırlatıcı için ekledik
    ];

    protected $casts = [
        'is_completed' => 'boolean',
        'reminder_at' => 'datetime', // Hatırlatıcıyı datetime olarak dönüştürmek için
    ];

    /**
     * Bir görevin ait olduğu listeyi döndürür.
     */
    public function todolist()
    {
        return $this->belongsTo(Todolist::class);
    }
}