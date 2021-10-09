<?php

namespace App\Http\Controllers;

use App\Mail\EmployeeAdded;
use App\Models\Meeting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ReservationsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        $meetings = Meeting::get();
        return view('reservations', ['meetings' => $meetings]);
    }
}
