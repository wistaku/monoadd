<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Belonging extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "address_id",
        "tag_id",
        "belonging_name",
    ];


    // リレーション
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function address()
    {
        return $this->belongsTo(Address::class);
    }
    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }
}
