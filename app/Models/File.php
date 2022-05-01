<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'file_path',
        'request_id'
    ];

    public function request()
    {
        return $this->belongsTo(Request::class);
    }
}
