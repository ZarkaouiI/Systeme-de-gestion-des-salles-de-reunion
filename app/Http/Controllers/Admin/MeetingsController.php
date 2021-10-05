<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Meeting;
use App\Models\Room;
use Illuminate\Http\Request;


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

        //CHOF ILA MAKHDMCH HAD L9LAWI GHADI N AFFICHER GA3 LES SALLES O L USER HOWA LI GHAYTKHTAR BKRRO LA SALLE LI BGHA

        //Une fois la salle est choisie, on doit changer ses attributs from et to to match start and end of the meeting

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
            'room' => $request->room
        ]);

        return redirect()->route('reservations');
    }

    public function destroy($id)
    {
        Meeting::destroy($id);

        return redirect()->back();
    }
}
