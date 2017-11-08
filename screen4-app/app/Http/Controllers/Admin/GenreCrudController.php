<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\GenreCrudRequest as StoreRequest;
use App\Http\Requests\GenreCrudRequest as UpdateRequest;

class GenreCrudController extends CrudController {

	public function setup() {
        $this->crud->setModel("App\Models\Genres");
        $this->crud->setRoute("admin/genres");
        $this->crud->setEntityNameStrings('Genre', 'Genre');

        $this->crud->setColumns(['genre']);
        $this->crud->addField([
	'name' => 'genre',
	'label' => "Genre Name"
	]);
    }

	public function store(StoreRequest $request)
	{
		return parent::storeCrud();
	}

	public function update(UpdateRequest $request)
	{
		return parent::updateCrud();
	}
}
?>
