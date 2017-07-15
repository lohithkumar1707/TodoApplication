<?php 
// app/controllers/ContactController.php

namespace App\Http\Controllers\Auth;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;  // <<< See here - no real class, only an alias
use App\Http\Controllers\Controller;
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

class ContactController extends BaseController 
{

	public function createContact()
	{
		return \View::make('create_contact');
	}
	public function edit($contact)
	{
		$contactDetails = Contacts::where('contact_id', $contact)->get();
		//echo '<pre>'; print_r($contactDetails); die;
		return \View::make('edit_contact', compact('contactDetails'));
	}
	
	public function saveCreate()
	{
		$input = Input::all();
		
		$rules = array(
				'fname'=>'required|min:3|alpha',
				'lname'=>'required|alpha',
				'phone'=>'required|unique:contacts|min:10|Numeric',
				'address'=>'required'
		);
		$validator = Validator::make($input,$rules);	
		if($validator->passes()){
			$task = new Contacts;
			$task->fname = Input::get('fname');
			$task->lname = Input::get('lname');
			$task->phone = Input::get('phone');
			$task->address = Input::get('address');
			$task->user = \Session::get('user_id');
			$task->save();

			$emailcontent = array (
		        'user' => Auth::user()->name,
		        'fname' => Input::get('fname'),
		        'lname' => Input::get('lname'),
		        'phone' => Input::get('phone'),
		        'address' => Input::get('address')
		    );

			Mail::send('emails.contactemail', $emailcontent, function($message) {
		        $message->to('lohithkumar1707@gmail.com', 'ladybirdweb')->subject
		            ('Contact Email');
		        $message->from('lohithkumar.r@ladybirdweb.com','Lohith');
		    });


			return Redirect::action('Auth\ContactController@showContactList')->with('message', 'You have successfully created a new Contact !');
		}
		//return Redirect::action('Auth\ContactController@createContact');
		return redirect()->back()->withErrors($validator->errors()->all());

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

			return Redirect::action('Auth\ContactController@showContactList')->with('message', 'You have successfully updated a Contact !');
		}
		return redirect()->back()->withErrors($validator->errors()->all());
		
	}
	public function deleteContact(){
		$contact_id = Input::get('contact_id');
		$contacts = Contacts::where('contact_id', $contact_id)->delete();
		return Redirect::action('Auth\ContactController@showContactList')->with('message', 'Contact deleted successfully!');
	}

	public function showContactList(){
		//$contacts = Contacts::all();
		$user_id = \Session::get('user_id');
		$contacts = Contacts::where('user', $user_id)->get();

		//$contacts = Datatables::of(Contacts::where('user', $user_id)->get())->make(true);
		return \View::make('contact_list', compact('contacts'));
	}

}