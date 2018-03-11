<?php

namespace App\Http\Controllers;

use App\TimeRecord;
use Auth;
use Datetime;
use Illuminate\Http\Request;

class TimeRecordController extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $user_id = Auth::id();
        $time_records = TimeRecord::where('user_id', $user_id)->get();
        $sum = $this->getSumTime($time_records);
        $count = $time_records->count();
        return view('time_record.index', compact('time_records', 'sum', 'count'));
    }

    public function create() {}

    public function store(Request $request) {}

    public function show(TimeRecord $timeRecord) {}

    public function edit(TimeRecord $timeRecord) {}

    public function update(Request $request, TimeRecord $timeRecord) {}

    public function destroy(TimeRecord $timeRecord) {}

    public function recordStartTime() {
        Auth::user()->time_records()->create([
            'start_at' => new Datetime(),
        ]);
        Auth::user()->setIsActiive(true);
        return redirect('home');
    }

    public function recordEndTime(TimeRecord $timeRecord) {
        $user_id = Auth::id();
        $time_record = TimeRecord::where('user_id', $user_id)->latest('start_at')->first();
        $time_record->update([
            'end_at' => new Datetime(),
        ]);
        Auth::user()->setIsActiive(false);
        return redirect('home');
    }

    public function getSumTime($r) {
        $sum = 0;
        foreach ($r as $item) {
            if($item->end_at) {
                $sum += strtotime($item->end_at);
                $sum -= strtotime($item->start_at);
            }
        }
        $h = (integer)($sum/3600);
        $i = (integer)(($sum%3600)/60);
        return sprintf('%d:%02d', $h, $i);
    }
}
