<?php

namespace App;

use App\User;
use App\Project;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class TimeRecord extends Model {
    public $timestamps = false;
    protected $guarded = ['id'];

    const datetime_format = 'Y/m/d H:i';

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function getStartAt(){
        return (new Carbon($this->start_at))->format(self::datetime_format);
    }

    public function getEndAt(){
        if(!is_null($this->end_at)) {
            return (new Carbon($this->end_at))->format(self::datetime_format);
        }
        return '';
    }

    public function getDiffTime() {
        if(!is_null($this->end_at)) {
            $diff = strtotime($this->end_at) - strtotime($this->start_at);
            $h = (integer)($diff/3600);
            $diff %= 3600;
            $i = (integer)($diff/60);
            return sprintf('%d:%02d', $h, $i);
        }
        return '';
    }

}
