<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class RequestLists extends Model
{
    use HasFactory;

    protected $table = 'request_lists';
    
    protected $fillable = [
        'transaction_id','type', 'firename', 'serial_number', 'room', 'building', 'floor', 'status', 'request',
    ];


    public function fireLocation()
    {
        return $this->belongsTo(FireList::class, 'building', 'floor', 'room');
    }
    public function office()
    {
        return $this->belongsTo(OfficeLists::class);
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
        return $this->belongsTo(User::class, 'user_id');
    }
    public static function boot()
{
    parent::boot();

    // Automatically set the user_id and transaction_id when creating a new request
    static::creating(function ($requestList) {
        if (!isset($requestList->user_id)) {
            $requestList->user_id = Auth::id();
        }
        $requestList->transaction_id = Str::uuid();
    });
}
    public function approves()
    {
        return $this->hasMany(ApproveList::class, 'request_id');
    }
}
