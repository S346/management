<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Project extends Model {
    protected $guarded = ['id'];

    public function user() {
        return $this->hasMany(User::class);
    }
}
