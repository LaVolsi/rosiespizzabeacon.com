<?php

namespace App\Http\Controllers;

use App\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller {
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth')->except(['get', 'showMenu']);
	}

	/**
	 * Get the list of menus.
	 *
	 * @return mixed
	 */
	public function get()
	{
		return Menu::orderBy('order')->get();
	}

	/**
	 * Return the menu.
	 *
	 * @param $label
	 * @return mixed
	 */
	public function showMenu($label)
	{
		if ($menu = Menu::where('label', $label)->first()) return Storage::get($menu->storageLabel);
		else return abort(409, 'Menu not found');
	}

	/**
	 * Save a new menu.
	 *
	 * @param Request $request
	 * @throws \Exception
	 */
	public function set(Request $request)
	{
		$validatedData = $request->validate([
			'document' => 'required|file',
			'label'    => 'required|string',

		]);
		DB::beginTransaction();
		try
		{
			$order = ($menu = Menu::orderBy('order', 'desc')->first()) ? $menu->order + 1 : 1;
			$file = Storage::put('menus/', $validatedData['document']);
			Menu::create([
				'label'        => $validatedData['label'],
				'storageLabel' => $file,
				'order'        => $order,
			]);
			DB::commit();

			return $this->successResponse();
		} catch (\Exception $e)
		{
			DB::rollBack();
			throw $e;
		}
	}

	/**
	 * Update a menus information.
	 *
	 * @param Request $request
	 * @return string
	 * @throws \Exception
	 */
	public function update(Request $request)
	{
		$validatedData = $request->validate([
			'id'    => 'required|integer',
			'label' => 'required|string',
			'order' => 'required|integer',
		]);
		DB::beginTransaction();
		try
		{
			Menu::where('id', $validatedData['id'])
				->update([
					'label' => $validatedData['label'],
					'order' => $validatedData['order']
				]);
			$this->reorderMenus();
			DB::commit();

			return $this->successResponse();
		} catch (\Exception $e)
		{
			DB::rollBack();
			throw $e;
		}
	}

	/**
	 * Delete a menu.
	 *
	 * @param Menu $menu
	 * @return string
	 * @throws \Exception
	 */
	public function delete($id)
	{
		$menu = Menu::where('id', $id)->first();
		if (!$menu) abort(409, 'No menu was found by this ID.');
		Storage::delete($menu->storageLabel);
		$menu->delete();
		$this->reorderMenus();

		return 'Menu deleted.';
	}

	/**
	 * Reorder the menu order index.
	 */
	public function reorderMenus()
	{
		$menus = Menu::orderBy('order')->orderBy('updated_at', 'desc')->get();
		foreach ($menus as $index => $menu)
		{
			$menu->order = $index;
			$menu->save();
		}
	}

	/**
	 * @return string
	 */
	public function successResponse()
	{
		return 'Save Successful';
	}

	/**
	 * @return string
	 */
	public function failedResponse()
	{
		return 'Save Successful';
	}
}
