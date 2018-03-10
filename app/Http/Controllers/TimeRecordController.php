<?php

namespace App\Http\Controllers;

use App\TimeRecord;
use Auth;
use Datetime;
use Illuminate\Http\Request;

class TimeRecordController extends Controller
{
    public function index() {
        $time_records = TimeRecord::get();
        return view('time_record.index', compact('time_records', 'users'));
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
        return redirect('time_records');
    }


    public function recordEndTime(TimeRecord $timeRecord) {
        $user_id = Auth::id();
        $time_record = TimeRecord::where('user_id', $user_id)->latest('start_at')->first();
        $time_record->update([
            'end_at' => new Datetime(),
        ]);
        return redirect('time_records');
    }
}
