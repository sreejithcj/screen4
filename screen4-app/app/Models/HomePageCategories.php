<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class HomePageCategories extends Model {

    use CrudTrait;
    
       protected $table = 'home_page_categories';
	protected $primaryKey = 'id';
	// protected $guarded = [];
	// protected $hidden = ['id'];
	protected $fillable = ['categoryId','order'];
	public $timestamps = true;

    
    public function category()
    {
        return $this->belongsTo('App\Models\Categories','categoryId');
    }
}
?>
