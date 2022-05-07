@extends('layouts.base')

@section('content')
    {!! Form::model($movie, ['action' => ['App\Http\Controllers\MovieController@update', $movie->id], 'method' => 'put', 'files' => true]) !!}
        <div class="form-group">
            {!! Form::label('title', 'Title:') !!}
            {!! Form::text('title', null, ['class' => 'form-control']) !!}

            {!! Form::label('image', 'Upload Image:') !!}
            {!! Form::file('image', ['class' => 'btn btn-dark']) !!}

            {!! Form::hidden('old_image', $movie->image) !!}
        </div>
        <div class="form-group">
            {!! Form::label('release', 'Release:') !!}
            {!! Form::text('release', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('rating', 'Rating:') !!}
            {!! Form::text('rating', null, ['class' => 'form-control']) !!}
        </div>

        {!! Form::button('<span class="fa fa-edit"></span> Edit Movie', ['type' => 'submit', 'class' => 'btn btn-dark']) !!}
    {!! Form::close() !!}
@endsection