<?php

namespace App\Models;

use App\Traits\Following;
use Illuminate\Support\Str;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Following;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
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

    public function statuses() //Relasi
    {
        return $this->hasMany(Status::class);
    }

    public function makeStatus($input) //Store status
    {
        $this->statuses()->create([
            'body' => $input,
            'identifier' => Str::slug(Str::random(31) . $this->id),
        ]);
    }

    public function timeline() //Action menampilkan di timeline
    {
        $following = $this->follows->pluck('id');
        $auth = $this->id;
        return Status::whereIn('user_id', $following)
                       ->orWhere('user_id', $auth)->latest()->get();
    }

    // METHOD FOLLOW DISIMPAN DI FILE TRAITS.FOLLOWING

}
