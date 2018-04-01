<?php

namespace App\Http\Controllers\Api;

use Auth;
use App\TimeRecord;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TimeRecordController extends Controller {
    public function index(Request $request) {
        $time_record_query = TimeRecord::query();

        $where_condition = array_filter([
            'user_id' => $request->input('user_id'),
            'project_id' => $request->input('project_id'),
        ]);

        if ($where_condition) {
            $time_record_query = $time_record_query->where($where_condition);
        }

        $start_month = $request->input('start_month');

        if(is_numeric($start_month)) {
            $time_record_query = $time_record_query->whereMonth('start_at', $start_month);
        };

        $time_records = $time_record_query->get();
        return response()->json($time_records);
    }
}
