<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller {
	public function send(Request $request)
	{
		$validatedData = $this->validation($request->all())->validate();
		Mail::to('info@pamelasonthehudson.com')->send(new Contact(
			$validatedData['name'],
			$validatedData['email'],
			$validatedData['phone'],
			$validatedData['message']
		));

		return 'Thank You For Your Email!';
	}

	public function sendCatering(Request $request)
	{
		$validatedData = $this->validation($request->all())->validate();
		Mail::to('info@pamelastravelingfeast.com')->send(new Contact(
			$validatedData['name'],
			$validatedData['email'],
			$validatedData['phone'],
			$validatedData['message']
		));

		return 'Thank You For Your Email!';
	}

	public function validation(array $data)
	{
		return Validator::make($data, [
			'name'    => 'required',
			'email'   => 'email|required',
			'phone'   => 'required',
			'message' => 'required',
		]);
	}
}
