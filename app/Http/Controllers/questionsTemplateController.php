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
    $questionOptionInputs = $request['questionOptionInputs'];
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

  /*  foreach ($questionOptionInputs as $ => $value) {

        $question = new bifurcacion;
        $question->name = $questionOptionInputs.value ;
        $question->idParent = $ ;
        
    } */
    
    $datos = questionstemplates::where('templates_idTemplates',$idTemplate)->get();
    return $datos;

  }

  public function deleteQuestion(){

    $order = $request['order'];
    $idTemplate = $request['idTemplate'];

    $surv = new questionstemplates;

    $surv::where('id', $idTemplate and 'order',$order)->delete();

    return "1";
  }

  public function updateQuestion(){

    $order = $request['order'];
    $idTemplate = $request['idTemplate'];

    $surv = new questionsTemplates;

    $surv::where('id', $idTemplate)->update(array('order' => $order));

    return $surv;
  }



}
