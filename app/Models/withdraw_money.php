<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class withdraw_money extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->hasOne(User::class,'id','user_id');
    }
}
