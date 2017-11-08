<?php

// Backpack\CRUD: Define the resources for the entities you want to CRUD.
CRUD::resource('categories', 'CategoryCrudController');
CRUD::resource('genres', 'GenreCrudController');
CRUD::resource('videos', 'VideoCrudController');
CRUD::resource('sliders', 'HomeSliderCrudController');
CRUD::resource('home-category', 'HomeCategoryCrudController');

?>
