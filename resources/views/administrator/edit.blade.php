@extends('layouts.back-survey')
@section('content')
<div class="container" style="width: 100%">
  <div class="row">
    <div class="col-md-12">
			<div class="row">
				@include('administrator.DataTemplate')
				@include('administrator.saveQuestionsSection')

        	<div class="row col-md-3">
            <div class="new-survey__controls " >
              <div class="col-md-12">
                <button class="btn btn-info new-survey__control" id="addQuestion">
                  <span class="glyphicon glyphicon-plus icon-mobile"></span>
                  <label style="margin-bottom: 0px;float: left;font-size: 11px; ">Agregar pregunta</label>
		            </button>
               <button id="sortableQuestions" class="btn btn-info">
                  <span class="glyphicon glyphicon-random icon-mobile"></span>
                  <label style="margin-bottom: 0px;float: left;font-size: 11px; ">Quitar Bifurcaciones</label>
                </button>
              </div>
            </div>
	        </div>

				<div id="questionSaved">
					<div id="container-questions">
						@include('administrator.questionSaved')
					</div>
				</div>
    	
    	</div>
  	</div>
	</div>
</div>

				@include('administrator.modalTitle')
				@include('administrator.modalQuestionEdit')

 @endsection
