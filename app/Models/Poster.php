<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Poster extends Model
{
    //
    protected $table = 'posters';

    protected $primaryKey = 'imdbID';
    public $incrementing = false;

    protected $filable = ['imdbID', 'link'];

    public function movie(){
        return $this->hasOne(\App\Models\Movie::class);
    }

    public function ifhas($imdbID){

        return $this->exists = DB::table('posters')
            ->where('imdbID', $imdbID)
            ->count();
    }

    public function link($imdbID){

        return $this->link = DB::table('posters')
            ->where('imdbID', $imdbID)
            ->first();
    }
}
