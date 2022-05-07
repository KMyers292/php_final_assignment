@extends('layouts.base')

@section('content')
  {!! Form::model($actor, ['action' => ['App\Http\Controllers\ActorController@update', $actor->id], 'method' => 'put', 'files' => true]) !!}
    <div class="form-group">
      {!! Form::label('name', 'Name:') !!}
      {!! Form::text('name', null, ['class' => 'form-control']) !!}

      {!! Form::label('image', 'Upload Image:') !!}
      {!! Form::file('image', ['class' => 'btn btn-dark']) !!}

      {!! Form::hidden('old_image', $actor->image) !!}
    </div>
    <div class="form-group">
      {!! Form::label('movie_id', 'Actors:') !!}
      <select name="movie_id">
        @foreach ($movies as $movie_num => $movie)
          <option value="{{ $movie->id }}" @if ($movie->id == $actor->movie->id) selected @endif>{{ $movie->title }}</option>
        @endforeach
      </select>
    </div>

    {!! Form::button('<span class="fa fa-edit"></span> Edit Actor', ['type' => 'submit', 'class' => 'btn btn-dark']) !!}
  {!! Form::close() !!}
@endsection