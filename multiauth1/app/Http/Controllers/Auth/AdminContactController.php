<?php 
// app/controllers/ContactController.php

namespace App\Http\Controllers\Auth;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;  // <<< See here - no real class, only an alias
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Models\Contacts;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Model;
use DB;
use Auth;
use Datatables;
use Mail;


class AdminContactController extends BaseController 
{
	public function showContactList(){
		$contacts = Contacts::all();
		return \View::make('admin_contacts', compact('contacts'));
	}
	public function edit($contact)
	{
		$contactDetails = Contacts::where('contact_id', $contact)->get();
		//echo '<pre>'; print_r($contactDetails); die;
		return \View::make('admin_edit_contact', compact('contactDetails'));
	}
	
	
	public function doEdit()
	{
		$input = Input::all();
		$rules = array(
				'fname'=>'required|min:3|alpha',
				'lname'=>'required|alpha',
				'phone'=>'required|min:10|Numeric',
				'address'=>'required'
		);
		$validator = Validator::make($input,$rules);	
		if($validator->passes()){
			$contact_id = Input::get('contact_id');
			$fname = Input::get('fname');
			$lname = Input::get('lname');
			$phone = Input::get('phone');
			$address = Input::get('address');
			Contacts::where('contact_id', $contact_id)->update(array(
				'fname' =>  $fname,
				'lname'	=> $lname,
				'phone' => $phone,
				'address' => $address,
			));

			return Redirect::action('Auth\AdminContactController@showContactList')->with('message', 'You have successfully updated a Contact !');
		}
		return redirect()->back()->withErrors($validator->errors()->all());
		
	}
	public function deleteContact(){
		$contact_id = Input::get('contact_id');
		$contacts = Contacts::where('contact_id', $contact_id)->delete();
		return Redirect::action('Auth\AdminContactController@showContactList')->with('message', 'Contact deleted successfully!');
	}

}