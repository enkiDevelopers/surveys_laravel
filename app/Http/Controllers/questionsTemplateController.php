<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\questionsTemplates;
use App\optionsMult;
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
        $optionsResult = $request['optionsResult'];
        //$idParent = $request['idParent'];

            $surv = new questionsTemplates;
            $surv->templates_idTemplates = $idTemplate;
            $surv->order = $numPregSig;
            $surv->title = $questionInput;
            $surv->type = $questionType;
            //$surv->idParent = $idParent;
            $surv->save();

        if($questionType == 1){

            return questionsTemplates::where('templates_idTemplates',$idTemplate)->get();

        }else{

            $eid = $surv->id;

            $valOptions = count(json_decode(json_encode($optionsResult), true));
            for ($i=0; $i < $valOptions; $i++) { 
        
                DB::table('optionsMult')->insert([
                    ['name' => $optionsResult[$i], 'idParent' => $eid],
                ]);               

            }
            
            $preguntas = questionsTemplates::where('templates_idTemplates',$idTemplate)->get();
            $opciones = questionsTemplates::join('optionsMult', 'questionsTemplates.id', '=', 'optionsMult.idParent')
            //->where('optionsMult.id', $numPregSig)
            //->orderby('id', 'desc')
            ->get();
            return $preguntas .$opciones;

        }
    }

    public function deleteQuestion(){

        $order = $request['order'];
        $idTemplate = $request['idTemplate'];

        $surv = new questionsTemplates;

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
