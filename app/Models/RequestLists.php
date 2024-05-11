<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestLists extends Model
{
    use HasFactory;

    protected $table = 'request_lists';
    
    protected $fillable = [
        'user_id','type', 'firename', 'serial_number', 'room', 'building', 'floor', 'status', 'request',
    ];

    public function fireex()
    {
        return $this->belongsTo(TypeList::class, 'type', 'id');
    }
    public function fireLocation()
    {
        return $this->belongsTo(FireList::class, 'building', 'floor', 'room');
    }
    public function office()
    {
        return $this->belongsTo(OfficeLists::class);
    }
    public function dept()
    {
        return $this->belongsTo(DepartmentLists::class);
    }
    
    public function addRequest()
    {
        return $this->belongsTo(Request::class, 'request', 'id');
    }

    public function requestNames()
    {
        return $this->hasMany(LocationList::class);
    }
    public static function getRequestNames()
    {
        return self::pluck('request');
    }
    public function syncRequest(array $RequestCheck)
    {
        // Implement synchronization logic here
        // For example, you can update related records based on the provided $fireCheck array
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
