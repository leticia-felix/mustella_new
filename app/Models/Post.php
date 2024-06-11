<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;

    protected $fillable = ['title','caption','image_path', 'user_id'];

    public function user()
{
    return $this->belongsTo(User::class);
}

public function posts()
{
    return $this->hasMany('App\\Post');
}

public function favoritedBy()
{
    return $this->belongsToMany(User::class, 'favorites')->withTimestamps();
}


public function favorites(){
    
    return $this->belongsToMany(User::class, 'favorites');

}


}
