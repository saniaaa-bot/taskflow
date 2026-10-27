<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    // Yeh line batati hai ke in columns mein data save kiya ja sakta hai
    protected $fillable = [
        'title',
        'description',
        'status',
        'due_date',
    ];
}