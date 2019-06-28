<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Movie;
use App\Models\Poster;
use GuzzleHttp\Client;

//use GuzzleHttp\Exception\RequestException;



class ApisController extends Controller
{
    //

    public function data(Request $request){

        /*
         *
         *Subject to all Api links working
         *Error handling are not implemented at this stage.
         *
         */


        $apiLink = $request->api;
        $user = $request->user;
        $client = new Client();
        $res = $client->get($apiLink);

        $contents = $res->getBody()->getContents();

        $movies = json_decode($contents);
        $results = $movies->Search;


        $movies = array();
        $i = 0;
        foreach($results as $result) {



            $movie = new Movie();

            $isInserted = $movie->ifExists($result->imdbID);

            $movie->title = $result->Title;
            $movie->year = $result->Year;
            $movie->imdbID = $result->imdbID;
            $movie->type = $result->Type;

            /*
             * isInserted checks the record if it already added by another user, which is a Button in this applicant
             * if count is 0 it inserts the new records
             * otherwise it updates the updated columns.
            */
            if($isInserted == 0) {


                $movie->status = 'Just Added';
                $movie->user = $user;
                $movie->save();



                $poster = new Poster();

                $hasPoster = $poster->ifhas($result->imdbID);

                /*
                 * Movie and poster has one to one relation and mapped with imdbID. It won't create new reord if the poster exist.
                 * It wont add record in poster if the Poster value is 'N/A'.
                */

                if($hasPoster == 0){

                    if($result->Poster != 'N/A') {

                        $poster->imdbID = $result->imdbID;
                        $poster->link = $result->Poster;
                        $poster->save();
                    }
                }


            }
            else{

                $movie->status = 'Updated';
                $movie->user = $user;
                $movie->update();



                $poster = new Poster();

                $hasPoster = $poster->ifhas($result->imdbID);

                if($hasPoster == 0){

                    if($result->Poster != 'N/A') {

                        $poster->imdbID = $result->imdbID;
                        $poster->link = $result->Poster;
                        $poster->save();
                    }
                }
            }



            $movies[$i] = $movie;

            $i++;

        }



        return view('results', compact('movies', 'apiLink', 'user'));

    }

    public function allMovies(){

        $movies = Movie::all();

        return view('allmovies', compact('movies'));
    }
}
