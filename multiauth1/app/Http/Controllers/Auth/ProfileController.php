<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Model;
use App\Models\Profile;
use DB;
use Auth;
use Hash;

class ProfileController extends Controller
{
    public function showProfile()
	{
		$user_id = \Session::get('user_id');
		$profileDetails = Profile::where('id', $user_id)->get();
		return \View::make('profile', compact('profileDetails'));
	}

	public function editPicture( Request $request ){
		$input = Input::all();
		$rules = array(
				'image'=>'required',
		);
		$validator = Validator::make($input,$rules);	
		if($validator->passes()){
			$file = $request->file('image');
			$destinationPath = 'uploads';
			$user_id = \Session::get('user_id');
			$image = $file->getClientOriginalName();
	     	$upload = $file->move($destinationPath,$file->getClientOriginalName());
	     	if($upload == true){
				Profile::where('id', $user_id)->update(array(
					'image' => $image
				));
				return Redirect::action('Auth\ProfileController@showProfile')->with('message', 'You have successfully updated your Profile Picture !');
			}
			return redirect()->back()->withErrors($validator->errors()->all());
		}
		return redirect()->back()->withErrors($validator->errors()->all());
	}

	public function changePassword(){
		$input = Input::all();
		$rules = array(
				'curpass'=>'required',
				'newpass'=>'required|min:6|different:curpass',
				'confirmpass'=> 'required|min:6|same:newpass'
		);
		$validator = Validator::make($input,$rules);	
		if($validator->passes()){
			if ( Hash::check(Input::get('curpass'), Auth::user()->password )) {
				$user_id = \Session::get('user_id');
				$password = bcrypt(Input::get('newpass'));
				Profile::where('id', $user_id)->update(array(
					'password' =>  $password
				));
				return Redirect::action('Auth\ProfileController@showProfile')->with('message', 'Your password changed successfully !');
			}
			$validator->errors()->add('curpass', 'Curent Password is invalid');
			return redirect()->back()->withErrors($validator->errors()->all());
		}
		return redirect()->back()->withErrors($validator->errors()->all());
	}
}
