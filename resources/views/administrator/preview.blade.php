@extends('layouts.back-admin')
@section('content')

		<div style="overflow-x: hidden; overflow-y: auto; height: 54%;position: relative;width: 90%">
            
            <div class="row col-md-12 new-question-template" id="one" style="margin-left: 13px;margin-top: 15px; ">
                <div class="col-md-11 well">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">¿Cómo te llamas?</label>
                        </div>
                    </div>
	                <div class="col-md-9 ">
	                    <div class="form-group">
	                        <input type="text" class="form-control text-black-body" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingrese su respuesta" required="" >
	                    </div>
	                </div>
                </div>
            </div>

            <div class="row col-md-12 new-question-template hidden" id="two" style="margin-left: 13px;margin-top: 15px; ">
                <div class="col-md-11 well">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">¿Practicas algún deporte?</label>
                        </div>
                    </div>
	                <div class="col-md-9 ">
	                    <div class="form-group" id="resp-group">
	                    	<div class="radio">
	                    		<label>
									<input type="radio" name="resp" value="0"> Raras veces
								</label>
	                    	</div>
	                    	<div class="radio">
				             	<label >
									<input type="radio" name="resp" value="3"> Sí
								</label>	                    		
	                    	</div>
							<div class="radio">
				              	<label>
									<input type="radio" name="resp" value="4"> No
								</label>								
							</div>

	                    </div>
	                </div>
	                <div class="col-md-4 pull-right hidden" id="btn-finish">
	                	<a href="" type="button" class="btn btn-success">
	                		Finalizar
	                	</a>	                	
	                </div>
                </div>
            </div>

            <div class="row col-md-12 new-question-template hidden" id="three" style="margin-left: 13px;margin-top: 15px; ">
                <div class="col-md-11 well">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">¿Qué deporte prácticas?</label>
                        </div>
                    </div>
	                <div class="col-md-8">
	                    <div class="form-group">
	                        <input type="text" class="form-control text-black-body" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingrese su respuesta">
	                    </div>
	                </div>
	                <div class="col-md-2 pull-right" >
	                   	<a href="" type="button" class="btn btn-success">
	                		Finalizar
	                	</a>  	
	                </div>
                </div>
            </div>

            <div class="row col-md-12 new-question-template hidden" id="four" style="margin-left: 13px;margin-top: 15px; ">
                <div class="col-md-11 well">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">¿Presentas alguna enfermedad muscular?</label>
                        </div>
                    </div>
	                <div class="col-md-8">
	                    <div class="form-group">
	                        <input type="text" class="form-control text-black-body" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingrese su respuesta">
	                    </div>
	                </div>
	                <div class="col-md-2 pull-right">
	                	<a href="" type="button" class="btn btn-success">
	                		Finalizar
	                	</a>
	           		</div>
                </div>
            </div>

			<div class="row col-md-12" style="margin-left: 13px;margin-top: 15px;">
				<nav aria-label="Page navigation">
					<ul class="pagination">
					    <li>
					      <a href="#" aria-label="Previous">
					        <span aria-hidden="true">&laquo;</span>
					      </a></li>
					    <li onclick="one();"><a >1</a></li>
					    <li  onclick="two();"><a >2</a></li>
					    <li onclick="check();"><a >3</a></li>						    
					    <li>
					      <a href="#" aria-label="Next">
					        <span aria-hidden="true">&raquo;</span>
					      </a></li>
					</ul>
				</nav>
			</div>
    
		</div>

<script>
	function one(){
		$('#one').show();	
		$('#two').addClass('hidden');
		$('#three').addClass('hidden');
		$('#four').addClass('hidden');
	}

	function two (){
		$('#one').hide();
		$('#three').addClass('hidden');
		$('#four').addClass('hidden');	
		$('#two').removeClass('hidden');
	}

	function check(){
			if( $("#resp-group input[name='resp']:radio").is(':checked')) {  
			//	alert("Bien!!!, la opción seleccionada es: " + $('input:radio[name=resp]:checked').val());
				  if ($('input:radio[name=resp]:checked').val() == '3') {
				  	$('#one').hide();	
					$('#two').addClass('hidden');
					$('#three').removeClass('hidden');	

				  } else if($('input:radio[name=resp]:checked').val() == '4'){
					$('#one').hide();	
					$('#two').addClass('hidden');
					$('#four').removeClass('hidden');	
				  } else if($('input:radio[name=resp]:checked').val() == '0'){
				  	$('#btn-finish').removeClass('hidden');
				  }
				} else{  
					alert("Selecciona una opción por favor!!!");  
					}  
		

	}
</script>

@endsection
