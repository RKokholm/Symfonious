<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Profile;
use Redirect;
use Validator;
use Input;

class ProfilesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($user)
	{
		
		$count = User::where('username', '=', $user)->count();

		if($count < 1){
			return Redirect::route('home_path')->withErrors("User doesn't exist");
		}

		$user = User::with('Profile')->with(['posts' => function($sql){
			$sql->orderBy('created_at', 'desc'); 
		}])->where('username', $user)->first();
		return view('profile.show')->with('user', $user);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($user)
	{
		$user = User::with('Profile')->where('username', $user)->first();
		return view('profile.edit')->with('user', $user);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($username)
	{
		$user = User::with('Profile')->where('username', $username)->firstOrFail();
		$inputs = Input::only('bio', 'short', 'location', 'birth_year', 'youtube', 'facebook', 'twitter');

		$validator = Validator::make(Input::all(), [
			'bio' => 'required',
			'short' => 'required',
			'location' => 'required',
			'birth_year' => 'required',
			'youtube' => 'required',
			'facebook' => 'required',
			'twitter' => 'required',
		]);

		if($validator->fails()){
			return Redirect::back()->withInput()->withErrors($validator);
		}

		$user->profile->fill($inputs)->save();
		return Redirect::back()->with('success', 'Profile has been updated');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function about($user)
	{
		$user = User::with('Profile')->where('username', $user)->first();
		return view('profile.about')->with('user', $user);
	}
}
