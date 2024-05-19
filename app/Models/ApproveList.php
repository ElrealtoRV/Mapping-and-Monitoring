<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;


class ApproveList extends Model
{
    use HasFactory;

    protected $fillable = ['request_id', 'user_id','status'];

    /**
     * Get the user who approved the request.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the request that was approved.
     */
    public function request()
    {
        return $this->belongsTo(RequestLists::class, 'request_id');
    }
}
