<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\questionstemplates;
use DB;
use File;
use Input;
class questionsTemplateController extends Controller
{
  public function saveQuestionsTemplate(Request $request){

    $questionInput = $request['questionInput'];
    $questionType = $request['questionType'];
    $idTemplate = $request['idTemplate'];
    
    $surv = new questionstemplates;
    $surv->templates_idTemplates = $idTemplate;
    $surv->title = $questionInput;
    $surv->type = $questionType;
    $surv->save();
    
    return "1";
  }

  public function questionSaved(){

    $datos = questionstemplates::all();
    return view('administrator.questionSaved', compact('datos'));
  
  }

}
