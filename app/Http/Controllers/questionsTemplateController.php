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

            $datosOpt;
            //echo $datos;
            foreach ($preguntas as $dato) {
                //echo $dato . ",";
                if($dato['type']==2){
                    $idq=$dato['id'];
                    $opt=optionsMult::where('idParent',$idq)->get();
                    //echo $opt . ",";
                }else{
                    $opt=null;
                }
                $datosOpt[] = [
                "questions" => $dato,
                "options" => $opt];
            }

            $options=serialize($datosOpt);

            return $options;

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
