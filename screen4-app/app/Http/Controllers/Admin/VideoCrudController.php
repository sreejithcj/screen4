<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\VideoCrudRequest as StoreRequest;
use App\Http\Requests\VideoCrudRequest as UpdateRequest;

class VideoCrudController extends CrudController {

    public function setup() {
        
        $this->crud->setModel("App\Models\Videos");
        $this->crud->setRoute("admin/videos");
        $this->crud->setEntityNameStrings('Video', 'Videos');

        $this->crud->addColumn(
        [   'name' => "title",
            'label' => 'Title'
        ]);

        $this->crud->addColumn(
        [   'name' => "brief",
            'label' => 'Brief',
            'type'=>'textarea'
        ]);

        $this->crud->addColumn(
        [   'name' => 'duration',
            'label' => "Duration"
        ]);

        $this->crud->addColumn(
        [   'name' => 'year',
            'label' => "Year",
            'type' => 'date_picker'
        ]);

        $this->crud->addColumn(
        [   'name' => 'url',
            'label' => "Video URL"
        ]);

        $this->crud->addColumn(
        [   'name' => 'image',
            'label' => "Image URL",
            'type' => 'upload',
            'upload' => true
        ]);          

        $this->crud->addColumn(
        [   'name' => 'largeImage',
            'label' => "Large Image",
            'type' => 'upload',
            'upload' => true
        ]);       
        
        $this->crud->addColumn(
        [   'label' => "Genre",
            'type' => 'select',
            'name' => 'genreId', // the db column for the foreign key
            'entity' => 'genre', // the method that defines the relationship in your Model
            'attribute' => 'genre', // foreign key attribute that is shown to user
            'model' => "App\Models\Genres" // foreign key model
        ]);   

        $this->crud->addColumn(
        [   'label' => "Category",
            'type' => 'select',
            'name' => 'categoryId', // the db column for the foreign key
            'entity' => 'category', // the method that defines the relationship in your Model
            'attribute' => 'category', // foreign key attribute that is shown to user
            'model' => "App\Models\Categories" // foreign key model
        ]);   

        $this->crud->addColumn(
        [   'label' => "User",
            'type' => 'select',
            'name' => 'userId', // the db column for the foreign key
            'entity' => 'user', // the method that defines the relationship in your Model
            'attribute' => 'name', // foreign key attribute that is shown to user
            'model' => "App\User" // foreign key model
        ]);     

        $this->crud->addField(
        [   'name' => 'title',
            'label' => "Title"
        ]);


        $this->crud->addField( 
        [   'name' => 'brief',
            'label' => "Brief",
            'type' => 'textarea'
        ]);

        $this->crud->addField(
        [   'name' => 'duration',
            'label' => "Duration"
        ]);

        $this->crud->addField(
        [   'name' => 'year',
            'label' => "Year",
            'type' => 'date_picker'
        ]);

        $this->crud->addField(
        [   'name' => 'url',
            'label' => "Video URL"
        ]);

        $this->crud->addField(
        [   'name' => 'image',
            'label' => "Image URL",
            'type' => 'upload',
            'upload' => true
        ]);
        
        $this->crud->addField(
        [   'name' => 'largeImage',
            'label' => "Large Image",
            'type' => 'upload',
            'upload' => true
        ]);

        $this->crud->addField(
        [   'label' => "Genre",
            'type' => 'select2',
            'name' => 'genreId', // the db column for the foreign key
            'entity' => 'genre', // the method that defines the relationship in your Model
            'attribute' => 'genre', // foreign key attribute that is shown to user
            'model' => "App\Models\Genres" // foreign key model
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
        [   'label' => "User",
            'type' => 'select2',
            'name' => 'userId', // the db column for the foreign key
            'entity' => 'user', // the method that defines the relationship in your Model
            'attribute' => 'name', // foreign key attribute that is shown to user
            'model' => "App\User" // foreign key model
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
