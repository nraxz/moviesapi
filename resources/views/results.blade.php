@include('header')
<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
    <div class="container">
        <h1 class="display-3">Results </h1>
        <p>Results of {{$user}}: [{{$apiLink}}]</p>

    </div>
</div>

<div class="container">
    <!-- Example row of columns -->

    <div class="row col-12">
        @foreach($movies as $movie)

            <div class="col l3 m6 s12 ">
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
                        @if($movie->status =='Just Added')

                            <p>{{$movie->created_at}}</p>
                        @else
                            <p>{{$movie->updated_at}}</p>
                        @endif

                    </div>
                </div>
            </div>
        @endforeach
    </div>

</div>

@include('footer')