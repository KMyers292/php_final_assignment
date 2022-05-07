@extends('layouts.base')

@section('content')
    <div class="row">
        @foreach ($movies as $movie_num => $movie)
        <div class="col-3">
            <h2>{{ $movie->title }}</h2>
            <img src="{{ url('/images/' . $movie->image) }}" alt="{{ $movie->title }}">
            <p>Release: {{ $movie->release }}</p>
            <p>Rating: {{ $movie->rating }}</p>

            {!! Form::open(['action' => ['App\Http\Controllers\MovieController@destroy', $movie->id], 'method' => 'delete']) !!}
                <a href="{{ url('movies/' . $movie->id) }}" class="btn btn-dark"><span class="fa fa-eye"></span> Details</a>
                <a href="{{ url('movies/' . $movie->id . '/edit') }}" class="btn btn-dark"><span class="fa fa-edit"></span> Edit</a>
                {!! Form::button('<span class="fa fa-trash"></span> Delete', ['type' => 'submit', 'class' => 'btn btn-dark']) !!}
            {!! Form::close() !!}
        </div>
        @endforeach
    </div>
@endsection