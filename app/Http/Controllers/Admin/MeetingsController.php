<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Meeting;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MeetingsController extends Controller
{

    public function __construct() {
        $this->middleware(['auth']);
    }

    public function index()
    {
        $rooms = Room::orderBy('name', 'asc')->get();
        return view('admin.meetings', [
            'rooms' => $rooms
        ]);
    }

    public function store(Request $request)
    {
        $rs = DB::table('rooms')
            ->where('name', '=', $request->room)
            ->get();
        foreach($rs as $ro){
            $room_id = $ro->id;
        }

        /*
        $available_rooms = DB::table('rooms')
                        ->where('capacity', '>=', $request->attendance)
                        ->get();
        //Send this to the 'amdin.meetings' view
        */


        $this->validate($request, [
            'responsable' => 'required|max:255',
            'date' => 'required|date',
            'start' => 'required',
            'end' => 'required',
            'attendance' => 'required|integer',
            'room' => 'required'
        ]);

        $request->user()->meetings()->create([
            'responsable' => $request->responsable,
            'date' => $request->date,
            'start' => $request->start,
            'end' => $request->end,
            'attendance' => $request->attendance,
            'room_id' => $room_id,
            'room' => $request->room
        ]);

        return redirect()->route('reservations');
    }

    public function update($id)
    {
        $meeting = Meeting::find($id);
        $rooms = Room::orderBy('name', 'asc')->get();
        return view('admin.modifymeeting', [
            'meeting' => $meeting,
            'rooms' => $rooms
        ]);
    }

    public function updatemeeting(Request $request)
    {
        $this->validate($request, [
            'responsable' => 'required|max:255',
            'date' => 'required|date',
            'start' => 'required',
            'end' => 'required',
            'attendance' => 'required|integer',
            'room' => 'required'
        ]);

        $meeting = Meeting::find($request->id);

        $meeting->responsable = $request->responsable;
        $meeting->date = $request->date;
        $meeting->start = $request->start;
        $meeting->end = $request->end;
        $meeting->attendance = $request->attendance;
        $meeting->room_id = Room::where('name', '=', $request->room);
        $meeting->room = $request->room;


        $meeting->save();

        return redirect()->route('meetings');
    }

    public function destroy($id)
    {
        Meeting::destroy($id);

        return redirect()->back();
    }
}
