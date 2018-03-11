<?php
/*
 * id         int(10) unsigned
 * name       varchar(255)
 * created_at timestamp        nullable
 * updated_at timestamp        nullable
 */

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Project extends Model {
    protected $guarded = ['id'];
    public static $validate_rule = [
        'name' => 'required|max:50',
    ];

    public function users() {
        return $this->belongsToMany(User::class);
    }

    public function time_records() {
        return $this->hasMany(TimeRecord::class);
    }
}
