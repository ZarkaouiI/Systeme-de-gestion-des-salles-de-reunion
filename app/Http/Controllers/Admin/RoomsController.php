<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Meeting;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomsController extends Controller
{
    public function __construct() {
        $this->middleware(['auth']);
    }

    public function index()
    {
        $rooms = Room::orderBy('name', 'asc')->get();
        return view('admin.rooms', ['rooms' => $rooms]);
    }

    public function show()
    {
        $rooms = Room::orderBy('name', 'asc')->get();
        return view('rooms.index', ['rooms' => $rooms]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:20',
            'capacity' => 'required',
            'description' => 'required|max:200'
        ]);

        Room::create([
            'name' => $request->name,
            'capacity' => $request->capacity,
            'description' => $request->description
        ]);

        return back();
    }

    public function updateroom(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:20',
            'capacity' => 'required',
            'description' => 'required|max:100'
        ]);

        $room = Room::find($request->id);

        $room->name = $request->name;
        $room->capacity = $request->capacity;
        $room->description = $request->description;

        $room->save();

        return redirect()->route('rooms');
    }

    public function update($id)
    {
        $room = Room::find($id);
        return view('admin.modifyroom', ['room' => $room]);
    }

    public function destroy($id)
    {
        Room::destroy($id);

        return redirect()->back();
    }
}
