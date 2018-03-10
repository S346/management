<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class TimeRecord extends Model {
    public $timestamps = false;
    protected $guarded = ['id'];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
