<?php
/**
 * Created by Paul Livorsi.
 * User: paul
 * Date: 10/20/18
 * Time: 12:05 AM
 */

namespace App\Http\Controllers;

use App\LiveMusic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LiveMusicController extends Controller {
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth')->except('show');
	}

	/**
	 * Show Events.
	 *
	 * @return mixed
	 */
	public function show()
	{
		return LiveMusic::orderBy('date', 'asc')->paginate(10);
	}

	/**
	 * Upload a document. Update or Create a record for the document.
	 *
	 * @param Request $request
	 * @return array|mixed
	 */
	public function create(Request $request)
	{
		$validatedData = $request->validate([
			'document'    => 'nullable',
			'date'        => 'date_format:Y-m-d|required',
			'name'        => 'required|string',
			'description' => 'required|string',
		]);

		if (array_key_exists('document', $validatedData))
		{
			if ($validatedData['document']->getSize() > 2000000)
			{
				return abort(422, 'File Size Is Too Large.');
			}
			$file = Storage::put('/public/liveMusic', $validatedData['document']);
			$label = $validatedData['document']->getClientOriginalName();
		} else
		{
			$file = $label = '';
		}

		LiveMusic::create([
			'label'        => $label,
			'storageLabel' => $file,
			'date'         => $validatedData['date'],
			'name'         => $validatedData['name'],
			'description'  => $validatedData['description'],
		]);

		return 'Event Saved.';
	}

	/**
	 * Delete Event and Associated Image.
	 *
	 * @param Request $request
	 * @return mixed
	 */
	public function delete(Request $request)
	{
		Storage::delete($request['storageLabel']);
		return LiveMusic::where('id', $request['id'])->delete();
	}
}
