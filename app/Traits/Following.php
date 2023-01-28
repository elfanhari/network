<?php 

namespace App\Traits;

use App\Models\User;

trait Following 
{
  public function follows() //Relasi
    {
        return $this->belongsToMany(User::class, 'follows', 'user_id', 'following_user_id')->withTimestamps();
    }

    public function followers() //Relasi
    {
        return $this->belongsToMany(User::class, 'follows', 'following_user_id', 'user_id')->withTimestamps();
    }

    public function follow(User $user) //Action di Tinker
    {
        return $this->follows()->save($user);
    }

    public function unfollow(User $user) //Action di Tinker
    {
        return $this->follows()->detach($user);
    }

    public function hasFollow(User $user)
    {
        return $this->follows()->where('following_user_id', $user->id)->exists();
    }
}