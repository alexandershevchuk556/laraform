<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'company',
        'request',
        'message',
        'user_id',
        'file_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class); 
    }

    public function file()
    {
        return $this->hasOne(File::class);
    }
}
