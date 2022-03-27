<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enums\SystemUsers;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;



class AdminController extends Controller
{
  /** Display a list of all available users in the system**/
  public function show()
  {
    $users = DB::table('users')->paginate(20);
    if(Gate::allows('admin-only', auth()->user())){
      return view ('admin.admindash')->with(['users' => $users]);
    }
    return 'Sorry you\'re not an admin. No access allowed.';
  }

  public function adduser()
  {
    return view('admin.adduser');
  }

  public function store(Request $request)
  {
    $request->validate([
      'first_name' => 'required|string|max:255',
      'last_name' => 'required|string|max:255',
      'email' => 'required|string|email|max:255|unique:users',
      'password' => 'required|string|confirmed|min:8',
      'role' => 'required',Rule::in(SystemUsers::$types),
    ]);

    ($user = User::create([
      'first_name' => $request->first_name,
      'last_name' => $request->last_name,
      'email' => $request->email,
      'password' => Hash::make($request->password),
      'role' => $request->role,
    ]));

    $user->save();

    return redirect()->back()->with('success', 'This user has been added');

  }

  public function edituser($id)
  {
    $user = User::find($id);
    return view ('admin.edituser', ['user' => $user]);
  }

  public function update(Request $request,$id)
  {
    $user = User::find( $id);

    $request->validate([
      'first_name' => 'string|max:255',
      'last_name' => 'string|max:255',
      'email' => 'string|email|max:255|unique:users,email,'.$user->id,
      'role'=> Rule::in(SystemUsers::$types)
    ]);


    $user->first_name = $request->input('first_name');
    $user->last_name = $request->input('last_name');
    $user->email = $request->input('email');
    $user->role = $request->input('role');
    $user->save();

    return redirect('admindash')->with('success','This user has been successfully updated');
  }

  public function deleteuser($id)
  {
    if(Gate::allows('admin-only', auth()->user())){
      $user = User::find($id);
      $user->delete();
      return redirect ('admindash')->with('success','This user has been successfully deleted');
    }
    else{
    return 'You cannot perform this action. Please contact a system administrator';
    }
  }
}
