<?php
 
 namespace App;
 
 use Illuminate\Database\Eloquent\Model;
 
 class optionsMult extends Model
 {
 
 	protected $table ='optionsMult';

     protected $fillable = [
         'name', 'idParent', 'salto','created_at','updated_at'
     ];
 
 } 
