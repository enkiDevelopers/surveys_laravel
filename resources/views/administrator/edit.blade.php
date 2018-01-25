@extends('layouts.back-survey')
@section('content')

<div class="container" style="position: fixed; margin-left: 270px; height: 95%;">
    <div class="row">
        <div class="col-md-12">
			<div class="row">

				@include('administrator.DataTemplate')
			    <div class="new-survey__question-container" style="position: fixed;overflow: auto;height: auto;width:75%;margin-top: 100px;">
			    </div>

				@include('administrator.saveQuestionsSection')

				<div style="overflow-x: hidden; overflow-y: auto; height: 54%;position: relative;width: 90%" id="">
					<div id="container-questions">
						@include('administrator.questionSaved')
					</div>
				</div>
        	</div>
    	</div>
	</div>
</div>

				@include('administrator.modalTitle')

 @endsection
