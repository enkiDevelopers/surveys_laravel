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

    $numPregSig = $request['numPregSig'];
    $questionInput = $request['questionInput'];
    $questionType = $request['questionType'];
    $idTemplate = $request['idTemplate'];
    //$order = $request['order'];
    //$idParent = $request['idParent'];
    //$bifurcaccion = $request['bifurcacion'];

    $surv = new questionstemplates;
    $surv->templates_idTemplates = $idTemplate;
    $surv->order = $numPregSig;
    $surv->title = $questionInput;
    $surv->type = $questionType;
    //$surv->order = $order;
    //$surv->idParent = $idParent;
    //$surv->bifurcacion = $bifurcacion;
    $surv->save();
    
    $datos = questionstemplates::where('templates_idTemplates',$idTemplate)->get();
    return $datos;

  }

}
