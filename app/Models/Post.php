<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'title',
        'body',
    ];
    
    public function postImages()
    {
        return $this->hasMany(Media::class);
    }
    
    public function likes()
	{
	    return $this->hasMany(Like::class);
	}
	
	public function userLikes()
	{
	    return $this->hasMany(Like::class)->where('user_id', auth()->id());
	}
    
}
