<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Videos extends Model {

    use CrudTrait;
    
    protected $table = 'videos';
    protected $primaryKey = 'id';
    // protected $guarded = [];
    // protected $hidden = ['id'];
    protected $fillable = ['title','brief','duration','year','url','image','largeImage','genreId','categoryId','userId'];       
    public $timestamps = true;
    
    public function category()
    {
        return $this->belongsTo('App\Models\Categories','categoryId');
    }
    
    public function genre()
    {
        return $this->belongsTo('App\Models\Genres','genreId');
    }
    
    public function user()
    {
        return $this->belongsTo('App\User','userId');
    }    
}
?>