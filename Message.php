<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','name','email','content'];

    public function user(){ return $this->belongsTo(User::class); }
    // Rely on global config('app.timezone') for Carbon date casting; no custom override needed.
}
