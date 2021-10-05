<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmployeesController extends Controller
{
    public function index()
    {
        $employees = User::where('isadmin', '!=', true)->orderBy('name', 'asc')->get();
        return view('admin.employees', ['employees' => $employees]);
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email',
            'phone' => 'required|digits:10'
        ]);


        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->name . '2021'),
        ]);

        return back();
    }

    public function update($id)
    {
        $employee = User::find($id);
        return view('admin.modifyemployee', ['employee' => $employee]);
    }

    public function destroy($id)
    {
        User::destroy($id);

        return redirect()->back();
    }
}
