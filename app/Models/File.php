<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'user_id',
        'path',
        'size',
        'type_file',
        'file_uploaded_at',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
