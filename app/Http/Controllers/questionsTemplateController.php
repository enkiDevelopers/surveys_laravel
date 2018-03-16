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
        $salto = $request['salto'];

            $surv = new questionsTemplates;
            $surv->templates_idTemplates = $idTemplate;
            $surv->orden = $numPregSig;
            $surv->title = $questionInput;
            $surv->type = $questionType;
            $surv->salto = $salto;
            //$surv->idParent = $idParent;
            $surv->save();

        if($questionType == 1){

            return questionsTemplates::where('templates_idTemplates',$idTemplate)->get();

        }else{

            $eid = $surv->id;

            $valOptions = count(json_decode(json_encode($optionsResult), true));
            for ($i=0; $i < $valOptions; $i++) { 
        
                DB::table('optionsMult')->insert([
                    ['name' => $optionsResult[$i], 'idParent' => $eid, 'salto' => $salto],
                ]);               

            }

            $preguntas = questionsTemplates::where('templates_idTemplates',$idTemplate)->get();

            $datosOpt = [];
            //echo $datos;
            foreach ($preguntas as $dato) {
                //echo $dato . ",";
                if($dato['type']== 2 || $dato['type']== 3  ){
                    $idq=$dato['id'];
                    $opt=optionsMult::where('idParent',$idq)->orderby('orden','asc')->get();
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

    public function addSalto(Request $request){
        $salto = $request['salto'];
        $idQuestion = $request['idQuestion'];
        $idOption = $request['idOption'];

        $option = optionsMult::where('idParent',$idQuestion)->where('id',$idOption)->update(array('salto' => $salto));

        return $option;
    }

    public function addSaltoParent(Request $request){
        $salto = $request['salto'];
        $idQuestion = $request['idQuestion'];

        $option = questionsTemplates::where('id',$idQuestion)->update(array('salto' => $salto));

        return $option;
    }

    public function deleteQuestion(Request $request){

        $idQuestion = $request['idQuestion'];
        $idTemplate = $request['idTemplate'];
        $orden = $request['orden'];
        $typeQuestion =$request['typeQuestion'];

        $result = questionsTemplates::where('id',$idQuestion)->delete();

        if ($typeQuestion == 2 || $typeQuestion == 3 ) {
            $result = optionsMult::where('idParent', $idQuestion)->delete();
        }

        $update = questionsTemplates::where('orden','>',$orden)->where('templates_idTemplates',$idTemplate)
                    ->decrement('orden');

        return $result;
    }

    public function editEliminarQuestion(Request $request){
        $idQuestion = $request['idQuestion'];
        $typeQuestion = $request['typeQuestion'];
        $titleEdit = $request['titleEdit'];
        $salto = $request['salto'];
        $optionsResult = $request['optionsResult'];

        $result = questionsTemplates::where('id',$idQuestion)->update(array('title' => $titleEdit));

        if ($typeQuestion == 2 || $typeQuestion == 3) {

            $result = optionsMult::where('idParent', $idQuestion)->delete();

            $valOptions = count(json_decode(json_encode($optionsResult), true)); //Cuenta las opciones mult.
            for ($i=0; $i < $valOptions; $i++) { 
    
                DB::table('optionsMult')->insert([
                        ['name' => $optionsResult[$i], 'idParent' => $idQuestion, 'salto' => $salto],
                    ]);     
 
             }
            $result = 1;   
                     }

           

        return $result;     
    }

    public function deleteOptions(Request $request){
        $idQuestion = $request['idQuestion'];

        $valOptions = count(json_decode(json_encode($idQuestion), true));
            for ($i=0; $i < $valOptions; $i++) { 
            DB::table('optionsMult')->where('idParent', $idQuestion[$i])->update(array('salto' => 0));
        }

        return "1";
    }

    public function updateOrderQuestion(Request $request){

        $newOrden = $request['newOrden'];
        $idQuestion = $request['idQuestion'];

        $valOptions = count(json_decode(json_encode($idQuestion), true));
        for ($i=0; $i < $valOptions; $i++) { 
            DB::table('questionsTemplates')->where('id', $idQuestion[$i])->update(array('orden' => $newOrden[$i]));
        }

//        $surv::where('id', $idTemplate)->update(array('orden' => $orden));

        return $valOptions;
    }

}
