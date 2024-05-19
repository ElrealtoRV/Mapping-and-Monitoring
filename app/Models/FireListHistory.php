<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FireListHistory extends Model
{
    protected $table = 'fire_list_histories';
    use HasFactory;
    protected $fillable = [
        'fire_list_id', 'type', 'firename', 'serial_number', 'building', 'floor', 
        'room', 'installation_date', 'expiration_date', 'description', 'finding', 'status'
    ];
}
