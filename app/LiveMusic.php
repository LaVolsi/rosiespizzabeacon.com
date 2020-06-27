<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LiveMusic extends Model {
	protected $fillable = [
		'label',
		'storageLabel',
		'date',
		'name',
		'description',
	];
}
