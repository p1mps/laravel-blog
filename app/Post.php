<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {

	protected $guard = ['id'];

    protected $fillable = ['name', 'address', 'email', 'text'];
}
