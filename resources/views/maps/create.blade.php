@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Post a new map</div>
                    <div class="panel-body">
                        {{ Form::open([
                            'url' => 'maps',
                            'method' => 'POST',
                            'class' => 'form-horizontal',
                            'role' => 'form'
                        ]) }}

                            @include('maps._mapForm', ['buttonText' => 'Save & Add Images'])

                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

@section('scripts.footer')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.js"></script>

@endsection