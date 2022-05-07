@extends('layouts.base')

@section('content')
  {!! Form::open(['action' => 'App\Http\Controllers\ActorController@store', 'files' => true]) !!}
    <div class="form-group">
      {!! Form::label('name', 'Name:') !!}
      {!! Form::text('name', null, ['class' => 'form-control']) !!}

      {!! Form::label('image', 'Upload Image:') !!}
      {!! Form::file('image', ['class' => 'btn btn-dark']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('movie_id', 'Movies:') !!}
      <select name="movie_id">
        @foreach ($movies as $movie_num => $movie)
          <option value="{{ $movie->id }}">{{ $movie->title }}</option>
        @endforeach
      </select>
    </div>

    {!! Form::button('<span class="fa fa-plus"></span> Add Actor', ['type' => 'submit', 'class' => 'btn btn-dark']) !!}
  {!! Form::close() !!}
@endsection