<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    use HasFactory;
    protected $fillable = ['user_name','user_id','message'];

    public function scopeGetData($query)
    {
        return $this->created_at . '　@' . $this->user_name . '　' . $this->message;
    }
}
