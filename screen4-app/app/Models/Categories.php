<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Categories extends Model {

    use CrudTrait;
    protected $table = 'categories';
    protected $primaryKey = 'id';
    protected $fillable = ['category'];
    public $timestamps = true;
}
?>
