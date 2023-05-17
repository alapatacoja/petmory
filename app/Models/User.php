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
        'user',
        'type',
        'bio',
        'url'
    ];

    /**
     * Get the route key for the model.
     * 
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'username';
    }

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

    //mascotas del usuario
    public function pets(){
        return $this->hasMany(Pet::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    //mensajes del usuario
    public function messages(){
            return $this->hasMany(Message::class);
    }

    //posts del usuario
    public function posts(){
        return $this->hasMany(Post::class);
    }    

    // usuarios a los que sigue
    public function followings()
    {
        return $this->belongsToMany(User::class, 'follows', 'follower_id', 'followed_id');
    }

    // usuarios que lo siguen
    public function followers() {
        return $this->belongsToMany(User::class, 'follows', 'followed_id', 'follower_id');
    }

    // usuarios a los que recomienda
    public function recomendations()
    {
        return $this->belongsToMany(User::class, 'recommendations', 'recommender_id', 'recommended_id');
    }

    // usuarios que lo recomiendan
    public function recommenders() {
        return $this->belongsToMany(User::class, 'recommendations', 'recommended_id', 'recommender_id');
    }
}
