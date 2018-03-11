<?php
/*
 * id             int(10) unsigned
 * name           varchar(255)
 * email          varchar(255)
 * password       varchar(255)
 * remember_token varchar(100)     nullable
 * created_at     timestamp        nullable
 * updated_at     timestamp        nullable
 * is_active      tinyint(1)
 */

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'is_active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function time_records() {
        return $this->hasMany(TimeRecord::class);
    }

    public function projects() {
        return $this->belongsToMany(Project::class);
    }

    public function setIsActiive($flag) {
        $this->update([
            'is_active' => $flag ? 1 : 0,
        ]);
    }
}
