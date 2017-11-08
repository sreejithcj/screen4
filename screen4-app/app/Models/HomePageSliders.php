<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class HomePageSliders extends Model {

    use CrudTrait;
    
    protected $table = 'home_page_sliders';
    protected $primaryKey = 'id';
    //// protected $guarded = [];
    // protected $hidden = ['id'];
    protected $fillable = ['videoId','order'];
    public $timestamps = true;

    public function video()
    {
        return $this->belongsTo('App\Models\Videos','videoId');
    }
}
?>
