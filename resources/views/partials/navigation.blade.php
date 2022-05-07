<nav>
  <ul>
    <li><a href="{{ url('/') }}" @if(Request::path() == '/') class="current" @endif><span class="fa fa-palette"></span> Movies</a></li>
    <li><a href="{{ url('/movies/create') }}" @if(Request::path() == 'movies/create') class="current" @endif><span class="fa fa-plus"></span> Add Movie</a></li>
    <li><a href="{{ url('/actors') }}" @if(Request::path() == 'actors') class="current" @endif><span class="fa fa-image"></span> Actors</a></li>
    <li><a href="{{ url('/actors/create') }}" @if(Request::path() == 'actors/create') class="current" @endif><span class="fa fa-plus"></span> Add Actor</a></li>
  </ul>
</nav>