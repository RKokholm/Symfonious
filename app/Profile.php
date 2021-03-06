<?php namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model {

	protected $fillable = ['facebook', 'twitter', 'youtube', 'bio', 'short', 'location', 'birth_year'];

	public function user()
	{
		return $this->belongsTo('User');
	}

}
