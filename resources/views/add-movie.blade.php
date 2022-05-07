@extends('layouts.base')

@section('content')
    {!! Form::open(['action' => 'App\Http\Controllers\MovieController@store', 'files' => true]) !!}
        <div class="form-group">
            {!! Form::label('title', 'Title:') !!}
            {!! Form::text('title', null, ['class' => 'form-control']) !!}

            {!! Form::label('image', 'Upload Image:') !!}
            {!! Form::file('image', ['class' => 'btn btn-dark']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('release', 'Release:') !!}
            {!! Form::text('release', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('rating', 'Rating:') !!}
            {!! Form::text('rating', null, ['class' => 'form-control']) !!}
        </div>

        {!! Form::button('<span class="fa fa-plus"></span> Add Movie', ['type' => 'submit', 'class' => 'btn btn-dark']) !!}
    {!! Form::close() !!}
@endsection