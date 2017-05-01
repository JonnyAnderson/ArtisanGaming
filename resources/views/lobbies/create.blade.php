@extends('layouts.app')



@section('content')

    <div class="container">

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Create a lobby</div>
                    <div class="panel-body">
                        {{ Form::open([
                            'url' => 'lobbies',
                            'method' => 'POST',
                            'class' => 'form-horizontal',
                            'role' => 'form'
                        ]) }}

                            @include('lobbies._lobbiesForm', ['buttonText' => 'Post Lobby'])

                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection


@section('scripts.footer')


<!-- Bootstrap Date-Picker Plugin -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker3.css"/>


<script type="text/javascript">
    $('#datepicker').datepicker({
        format: "yyyy-mm-dd",
        startDate: "-1d",
        endDate: "+60d",
        orientation: "bottom left",
        maxViewMode: 2,
        autoclose: true,
        todayHighlight: true
    });

    $('#datepicker').on("changeDate", function() {
        $('#scheduled_time').val(
            $('#datepicker').datepicker('getFormattedDate') + ' ' + $('#time').val()
        );
    });


    $(document).on('change','#time', function(){
        $('#scheduled_time').val(
            $('#datepicker').datepicker('getFormattedDate') + ' ' + $('#time').val()
        );
    });
</script>

@endsection