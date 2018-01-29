<?php

 namespace App;

 use Illuminate\Database\Eloquent\Model;

 class questionsTemplates extends Model
 {

	protected $table ='questionsTemplates';

     protected $fillable = ['title', 'type', 'order','templates_idTemplates',];

 }
