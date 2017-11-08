<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Genres extends Model {

    use CrudTrait;
    
        protected $table = 'genres';
	 protected $primaryKey = 'id';
	// protected $guarded = [];
	// protected $hidden = ['id'];
	protected $fillable = ['genre'];
	public $timestamps = true;

    
}
?>
