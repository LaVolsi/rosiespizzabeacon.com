<?php

namespace App\Http\Controllers;

use App\MailingList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class MailingListController extends Controller {
	public function get(){
		$table = MailingList::all();
		$output='';
		foreach ($table as $row) {
			$output.=  implode(",",$row->toArray());
		}
		$headers = array(
			'Content-Type' => 'text/csv',
			'Content-Disposition' => 'attachment; filename="ExportFileName.csv"',
		);

		return Response::make(rtrim($output, "\n"), 200, $headers);
	}

	public function create(Request $request)
	{
		$validatedData = $this->validation($request->all())->validate();
		MailingList::create([
			'email' => $validatedData['email']
		]);

		return 'Thank You For Joining Our Mailing List!';
	}

	public function validation(array $data)
	{
		return Validator::make($data, [
			'email' => 'email|required|unique:mailing_lists'
		],[
			'email.unique' => 'Email already registered!'
		]);
	}
}
