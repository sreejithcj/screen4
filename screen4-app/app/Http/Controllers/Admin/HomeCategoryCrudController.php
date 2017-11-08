<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\HomeCategoryCrudRequest as StoreRequest;
use App\Http\Requests\HomeCategoryCrudRequest as UpdateRequest;

class HomeCategoryCrudController extends CrudController {

    public function setup() {
        
        $this->crud->setModel("App\Models\HomePageCategories");
        $this->crud->setRoute("admin/home-category");
        $this->crud->setEntityNameStrings('Home Category', 'Categories');

        $this->crud->addColumn(
        [   'label' => "Category",
            'type' => 'select',
            'name' => 'categoryId', // the db column for the foreign key
            'entity' => 'category', // the method that defines the relationship in your Model
            'attribute' => 'category', // foreign key attribute that is shown to user
            'model' => "App\Models\Categories" // foreign key model
        ]);   

        $this->crud->addColumn(
        [   'name' => "order",
            'label' => 'Order',
        ]);
        
        $this->crud->addField(
        [   'label' => "Category",
            'type' => 'select2',
            'name' => 'categoryId', // the db column for the foreign key
            'entity' => 'category', // the method that defines the relationship in your Model
            'attribute' => 'category', // foreign key attribute that is shown to user
            'model' => "App\Models\Categories" // foreign key model
        ]);   


        $this->crud->addField(
        [   'name' => 'order',
            'label' => "Order"
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
