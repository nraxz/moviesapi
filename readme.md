<h1>about</h1>
<div>
    <p>This is a simple application build in laravel, this has the following features:

        <ul>
            <li> 3 button components which trigger API GET requests, A component that renders the API results in a presentable way. </li>
            <li> Each button fetch data using their own API URL (provided below). Once the data is fetched, It stores in a local database. and adds status column as Just added by user (Button Name is user here). </li>
            <li> If the record is already stored in database then it only updates status and user data and return updated information. Doing this prevents duplicate records. imdbID is the unique id.</li>
            <li> At the same time this also maintain the Posters table where it keeps one poster of each Movie.</li>
            <li> It doesn't allow duplicate poster record for each movie it maps data with imdbID which is unique.</li>
            <li> It doesn't insert any record in poster table if it has been return 'N/A' from API.</li>
        </ul></p>
  </div>
  <br>
  <h1>Installtion</h1>
<hr>

<p>Add this to your composer.json file, in the require object: </p>

 "laravelcollective/html": "^5.8",
 <br>
 "guzzlehttp/guzzle": "^6.3"

