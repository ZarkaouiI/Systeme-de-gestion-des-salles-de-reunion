<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomsController extends Controller
{
    public function index()
    {
        $rooms = Room::get();
        return view('admin.rooms', ['rooms' => $rooms]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:20',
            'capacity' => 'required',
            'description' => 'required|max:100'
        ]);

        Room::create([
            'name' => $request->name,
            'capacity' => $request->capacity,
            'description' => $request->description
        ]);

        return back();
    }
}
