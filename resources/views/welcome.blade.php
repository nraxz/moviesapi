@include('header')

<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
    <div class="container">
        <h1 class="display-3">Movie </h1>
        <p>This is a simple application build in laravel, this has the following features:

        <ul>
            <li>- 3 button components which trigger API GET requests, A component that renders the API results in a presentable way. </li>
            <li>- Each button fetch data using their own API URL (provided below). Once the data is fetched, It stores in a local database. and adds status column as Just added by user (Button Name is user here). </li>
            <li>- If the record is already stored in database then it only updates status and user data and return updated information. Doing this prevents duplicate records. imdbID is the unique id.</li>
            <li>- At the same time this also maintain the Posters table where it keeps one poster of each Movie.</li>
            <li>- It doesn't allow duplicate poster record for each movie it maps data with imdbID which is unique.</li>
            <li>- It doesn't insert any record in poster table if it has been return 'N/A' from API.</li>
        </ul></p>

    </div>
</div>

<div class="container">
    <!-- Example row of columns -->
    <div class="row col-12">

        <div class="col s12 m4">
            {!! Form::open(['method' => 'Post', 'route' => ['fetch-data'] ]) !!}

            <input id="api" name="api" type="hidden" value="http://www.omdbapi.com/?s=Matrix&apikey=720c3666">
            <input id="user" name="user" type="hidden" value="BTN 1">

            <button class="btn waves-effect waves-light" type="submit">Button 1</button>
            {!! Form::close() !!}
            <p>http://www.omdbapi.com/?s=Matrix&apikey=720c3666</p>
        </div>
        <div class="col s12 m4">
            {!! Form::open(['method' => 'Post', 'route' => ['fetch-data'] ]) !!}

            <input id="api" name="api" type="hidden" value="http://www.omdbapi.com/?s=Matrix%20Reloaded&apikey=720c3666">
            <input id="user" name="user" type="hidden" value="BTN 2">

            <button class="btn waves-effect waves-light" type="submit">Button 2</button>
            {!! Form::close() !!}
            <p>http://www.omdbapi.com/?s=Matrix%20Reloaded&apikey=720c3666</p>
        </div>
        <div class="col s12 m4">
            {!! Form::open(['method' => 'Post', 'route' => ['fetch-data'] ]) !!}

            <input id="api" name="api" type="hidden" value="http://www.omdbapi.com/?s=Matrix%20Revolutions&apikey=720c3666">
            <input id="user" name="user" type="hidden" value="BTN 3">

            <button class="btn waves-effect waves-light" type="submit">Button 3</button>
            {!! Form::close() !!}
            <p>http://www.omdbapi.com/?s=Matrix%20Revolutions&apikey=720c3666</p>
        </div>

    </div>

</div>

@include('footer')