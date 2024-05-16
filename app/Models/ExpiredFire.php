<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpiredFire extends Model
{
    use HasFactory;
    protected $table = 'expired_fires';
    protected $fillable = [
        'type', 'firename', 'serial_number','building','floor','room','installation_date','expiration_date', 'description','status',     ];

        public function location()
        {
            return $this->belongsTo(LocationList::class, 'room', 'id');
        }
        public function firebuilding()
        {
            return $this->belongsTo(LocationList::class, 'building', 'id');
        }
        public function firefloor()
        {
            return $this->belongsTo(LocationList::class, 'floor', 'id');
        }
        public function fireroom()
        {
            return $this->belongsTo(LocationList::class, 'room', 'id');
        }

    }
