<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $table = 'comments';
    protected $primaryKey = 'id';
    // protected $guarded = [];
    // protected $hidden = ['id'];
    protected $fillable = ['comment','videoId','userId'];       
    public $timestamps = true;
    
    public function video()
    {
        return $this->belongsTo('App\Models\Videos','videoId');
    }
    
    public function user()
    {
        return $this->belongsTo('App\Models\User','userId');
    }

}
