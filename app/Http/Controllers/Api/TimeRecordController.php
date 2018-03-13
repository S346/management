<?php

namespace App\Http\Controllers\Api;

use Auth;
use App\TimeRecord;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class TimeRecordController extends Controller {
    public function index() {
        $time_records = TimeRecord::get();
        return response()->json($time_records);
    }
}
