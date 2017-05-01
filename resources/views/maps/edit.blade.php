@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-warning">
                    <div class="panel-heading">Edit map: {{ $map->title }}</div>
                    <div class="panel-body">

                        {{ Form::open([
                            'url' => 'maps/' . $map->id . '/images',
                            'method' => 'POST',
                            'class' => 'dropzone',
                            'id' => 'addImagesForm',
                            'role' => 'form'
                        ]) }}

                        {{ csrf_field() }}

                        {{ Form::close() }}

                        <hr />

                        {{ Form::model($map, [
                            'url' => 'maps/' . $map->id,
                            'method' => 'PATCH',
                            'class' => 'form-horizontal',
                            'role' => 'form'
                        ]) }}

                            @include('maps._mapForm', ['buttonText' => 'Update map', 'edit' => 'true'])

                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

@section('scripts.footer')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.js"></script>
    <script>
        Dropzone.options.addImagesForm = {
            paramName: 'image',
            maxFileSize: 6,
            acceptedFiles: '.jpg, .jpeg, .png',
            dictDefaultMessage: 'Click or drag here to add images to {{ $map->title }}.'
        };
    </script>

@endsection



