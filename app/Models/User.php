<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    //Postとの1対多のリレーションメソッドを認証
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    
    public function bookmarks()
    {
        return $this->hasMany(Bookmark::class);
    }
    
    public function bookmark_posts()
    {
        return $this->belongsToMany(Post::class,'bookmarks','user_id','post_id');
    }
    
    public function is_bookmark($postId)
    {
        return $this->bookmarks()->where('post_id', $postId)->exists();
    }
    
    public function howManyBookmarks($postId)
    {
        return $this->bookmark_posts()->where('post_id', $postId)->count();
    }
    
    public function follows()
    {
        return $this->belongsToMany($this,'follows','user_id','followed_user_id');
    }
    
    public function is_follow($userId)
    {
        // dd($this->follows()->where('followed_user_id', $userId)->exists());
        return $this->follows()->where('followed_user_id', $userId)->exists();
    }
    
    public function howManyFollowers($userId)
    {
        // dd($this->follows()->count());
        return $this->follows()->where('followed_user_id', $userId)->count();
    }
    
    public function howManyFollow($userId)
    {
        return $this->follows()->where('user_id', $userId)->count();
    }
    
    public function followUsers()
    {
        return $this->belongsToMany(
            'App\Models\User',
            'follow_users',
            'followed_user_id',
            'following_user_id'
        );
    }
    
    public function follow()
    {
        return $this->belongsToMany(
            'App\Models\User',
            'follow_users',
            'following_user_id',
            'followed_user_id'
        );
    }
   
}
