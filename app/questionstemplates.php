<?php
 
 namespace App;
 
 use Illuminate\Database\Eloquent\Model;
 
 class questionstemplates extends Model
 {
 
     protected $fillable = [
         'title', 'type', 'order','salto','templates_idTemplatesÍndice','created_at','updated_at'
     ];
 
 } 
