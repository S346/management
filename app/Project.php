<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Project extends Model {
    protected $guarded = ['id'];
    public static $validate_rule = [
        'name' => 'required|max:50',
    ];

    public function user() {
        return $this->hasMany(User::class);
    }
}
