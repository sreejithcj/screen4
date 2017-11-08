<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\HomeSliderCrudRequest as StoreRequest;
use App\Http\Requests\HomeSliderCrudRequest as UpdateRequest;

class HomeSliderCrudController extends CrudController {

    public function setup() {
        
        $this->crud->setModel("App\Models\HomePageSliders");
        $this->crud->setRoute("admin/sliders");
        $this->crud->setEntityNameStrings('Slider', 'Sliders');

        $this->crud->addColumn(
        [   'label' => "Title",
            'type' => 'select',
            'name' => 'videoId', // the db column for the foreign key
            'entity' => 'video', // the method that defines the relationship in your Model
            'attribute' => 'title', // foreign key attribute that is shown to user
            'model' => "App\Models\Videos" // foreign key model
        ]);   

        $this->crud->addColumn(
        [   'name' => "order",
            'label' => 'Order',
        ]);
        
        $this->crud->addField(
        [   'label' => "Title",
            'type' => 'select2',
            'name' => 'videoId', // the db column for the foreign key
            'entity' => 'video', // the method that defines the relationship in your Model
            'attribute' => 'title', // foreign key attribute that is shown to user
            'model' => "App\Models\Videos" // foreign key model
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
