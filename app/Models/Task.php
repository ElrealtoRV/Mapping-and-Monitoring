<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    
    protected $fillable = ['task_name', 'due_date', 'user_id', 'status','doneBy'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public static function getTaskNames()
    {
        return self::pluck('task_name');
    }
    public function syncTask(array $taskCheck)
    {
        // Implement synchronization logic here
        // For example, you can update related records based on the provided $fireCheck array
    }
}
