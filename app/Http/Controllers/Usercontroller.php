<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

use App\Mail\Verifadmin;
use Illuminate\Support\Facades\Mail;

class Usercontroller extends Controller
{
    public function index(){
    	$admin = User::all();
		return view('admin/admin', ['admin' => $admin]);
    }

    public function store(Request $request){
		$user = new User;
		$user->name = $request->name;
		$user->email = $request->email;
		$user->password = bcrypt($request->password);
		$user->status = '0';
		$user->save();
		
		$data = array(
            'id' => $user->id
        );

		Mail::to($request->email)->send(new Verifadmin($data));

    	return redirect('/user')->with('status', 'Admin baru berhasil ditambahkan');
	}
	
	public function changestatus(User $user){
		User::where('id', $user->id)->update([
			'status' => '1'
		]);
		
		return redirect('/login');
	}

    public function destroy(User $user){
    	User::destroy('id', $user->id);

    	return redirect('/user')->with('status', 'Admin berhasil dihapus');
    }
}
