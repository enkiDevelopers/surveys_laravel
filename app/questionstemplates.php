<?php

 namespace App;

 use Illuminate\Database\Eloquent\Model;

 class questionsTemplates extends Model
 {

	protected $table ='questionsTemplates';

     protected $fillable = ['title', 'type', 'design' ,'orden','templates_idTemplates','salto'];

 }
