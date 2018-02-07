@extends('layouts.back-survey')
@section('content')
<div class="container" >
    <div class="row">
        <div class="col-md-12">
			<div class="row">

				@include('administrator.DataTemplate')
			    <div class="new-survey__question-container" style="position: fixed;overflow: auto;height: auto;width:75%;margin-top: 100px;">
			    </div>

				@include('administrator.saveQuestionsSection')

				<div style="overflow-x: hidden; overflow-y: auto; height: 439px;position: relative; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); padding: 15px 25px 0px 25px; margin: 0px 15px 0px 15px;" >
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
	<div id="loader" class="modal fade">
		<img src="/img/load/loader.gif" alt="cargando...">
	</div>
 @endsection

