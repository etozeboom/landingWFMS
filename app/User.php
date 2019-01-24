<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use App\Scopes\AgeScope;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Observers\UserObserver;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'age',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected static function boot()
    {
        parent::boot();

       // static::addGlobalScope(new AgeScope);

        /*static::addGlobalScope('age', function (Builder $builder) {
            $builder->where('age', '<', 10);
        });*/
    }

    public function scopeAge($query, $var)
    {
        return $query->where('age', '>', $var);
    }
    
    public function phone()
    {
        return $this->hasOne('App\Phone');
    }
   /* protected $events = [
        'saved' => UserSaved::class,
        'deleted' => UserDeleted::class,
    ];*/
}
