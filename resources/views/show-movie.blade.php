@extends('layouts.base')

@section('content')
    <div class="row">
        <div class="col-3">
            <h2>{{ $movie->title }}</h2>
            <img src="{{ url('/images/' . $movie->image) }}" alt="{{ $movie->title }}">
            <p>Release Date: {{ $movie->release }}</p>
            <p>Rating: {{ $movie->rating }}</p>
        </div>
        <div class="col-7">
            <h3>Actors In {{ $movie->title }}</h3>
            @foreach ($movie->actors as $actor_id => $actor)
                <img src="{{ url('/images/' . $actor->image) }}" alt="{{ $actor->name }}">
                <h3>{{ $actor->name }}</h3>
            @endforeach
        </div>
        <div class="col-2">
            <h3>Manage {{ $movie->title }}</h3>
            {!! Form::open(['action' => ['App\Http\Controllers\MovieController@destroy', $movie->id], 'method' => 'delete']) !!}
                <a href="{{ url('/' . $movie->id . '/edit') }}" class="btn btn-dark"><span class="fa fa-edit"></span> Edit</a>
                {!! Form::button('<span class="fa fa-trash"></span> Delete', ['type' => 'submit', 'class' => 'btn btn-dark']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection