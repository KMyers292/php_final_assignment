<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>{{ $title }}</title>

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

  <link rel="stylesheet" href="{{ url('css/app.css') }}">
  <link rel="stylesheet" href="{{ url('css/custom.css') }}">
</head>
<body>
  <header>
    <h1>{{ $title }}</h1>

    @include('partials.navigation')
  </header>

  <div class="content-wrapper">
    <div class="container">
      @if ($errors->any())
        <div class="alert alert-danger">
          @foreach ($errors->all() as $error)
            {{ $error }}<br>
          @endforeach
        </div>
      @elseif( session('success') )
        <div class="alert alert-success">
          <span class="fa fw fa-check"></span> {{ session('success') }}
        </div>
      @endif
      
      @yield('content')
    </div>
  </div>

  <footer>
    <p><small>Copyright &copy; {!! date('Y') !!} Movies App - kmyers4@myseneca.ca - 159766179 - Web306</small></p>
  </footer>
</body>
</html>