@extends('layouts.base')

@section('content')
  <div class="row">
    @foreach ($actors as $actor_num => $actor)
      <div class="col-3">
        <h2>{{ $actor->name }}</h2>
        <h3>In {{ $actor->movie->title }}</h3>
        <img src="{{ url('/images/' . $actor->image) }}" alt="{{ $actor->name }}">

        {!! Form::open(['action' => ['App\Http\Controllers\ActorController@destroy', $actor->id], 'method' => 'delete']) !!}
          <a href="{{ url('actors/' . $actor->id . '/edit') }}" class="btn btn-dark"><span class="fa fa-edit" aria-hidden="true"></span> Edit</a>
          {!! Form::button('<span class="fa fa-trash"></span> Delete', ['type' => 'submit', 'class' => 'btn btn-dark']) !!}
        {!! Form::close() !!}
      </div>
    @endforeach
  </div>
@endsection
