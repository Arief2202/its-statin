<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    use HasFactory;
    public function buyer()
    {
        return $this->belongsTo(User::class, 'buyer_id', 'id');
    }
}
