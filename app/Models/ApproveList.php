<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApproveList extends Model
{
    use HasFactory;
    protected $fillable = ['request_id', 'first_name','last_name','idnum','affiliation'];

    public function regularUser()
    {
        return $this->belongsTo(User::class);
    }
}
