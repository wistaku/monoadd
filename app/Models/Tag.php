<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "tag_name",
    ];


    // リレーション
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function belonging()
    {
        return $this->hasMany(Belonging::class);
    }
}
