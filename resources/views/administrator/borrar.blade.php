<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/locales.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.css"></script>

<div class="col-md-2">
                            <div class='input-group' id='calendar1'>
                                {!! Form::text('fromDate', $plan->fromDate, ["placeholder" => "2014-09-09 12:00:00"]) !!}
                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                            </div>
                        </div>


<script type="text/javascript">
            $(function () {
                $('#calendar1').datetimepicker();
                $('#calendar2').datetimepicker();
            });
        </script>
