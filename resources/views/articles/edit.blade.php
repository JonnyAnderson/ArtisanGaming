@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-warning">
                    <div class="panel-heading">Edit article: {{ $article->title }}</div>
                    <div class="panel-body">

                        {{ Form::open([
                            'url' => 'articles/' . $article->id . '/images',
                            'method' => 'POST',
                            'class' => 'dropzone',
                            'id' => 'addImagesForm',
                            'role' => 'form'
                        ]) }}

                        {{ csrf_field() }}

                        {{ Form::close() }}

                        <hr />

                        {{ Form::model($article, [
                            'url' => 'articles/' . $article->id,
                            'method' => 'PATCH',
                            'class' => 'form-horizontal',
                            'role' => 'form'
                        ]) }}

                            @include('articles._articleForm', ['buttonText' => 'Update article', 'edit' => 'true'])

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
            dictDefaultMessage: 'Click or drag here to add a cover image.'
        };
    </script>

@endsection



