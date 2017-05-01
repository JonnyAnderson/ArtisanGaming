@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Write a new article</div>
                    <div class="panel-body">
                        {{ Form::open([
                            'url' => 'articles',
                            'method' => 'POST',
                            'class' => 'form-horizontal',
                            'role' => 'form'
                        ]) }}

                            @include('articles._articleForm', ['buttonText' => 'Save Article & Add Cover'])

                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
