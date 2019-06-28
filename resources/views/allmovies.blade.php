@include('header')

<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
    <div class="container">
        <h1 class="display-3">All records </h1>


    </div>
</div>

<div class="container">
    <!-- Example row of columns -->
    @if(isset($movies))

        <div class="row col-12">
            @foreach($movies as $movie)

                <div class="col l3 m6 s12">
                    <div class="card">
                        <div class="card-image">
                            @if($link = $movie->link($movie->imdbID))


                                <img src="{{$link->link}}">

                                <span class="card-title">{{$movie->title}}</span>
                            @else
                                <img src="https://static-assets.noovie.com/images/no-poster.png">
                                <span class="card-title">{{$movie->title}}</span>
                            @endif
                        </div>
                        <div class="card-content">
                            <p>Year: {{$movie->year}}</p>
                            <p>Type: {{$movie->type}}</p>
                        </div>
                        <div class="card-action">
                            <p>{{$movie->status}} by {{$movie->user}}</p>

                            <p>{{$movie->status}}</p>


                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div>
            <p>There is no record found.</p>
        </div>
    @endif
</div>

@include('footer')