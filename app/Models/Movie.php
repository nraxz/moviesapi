<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Movie extends Model
{
    //
    protected $primaryKey = 'imdbID';
    public $incrementing = false;

    protected $fillable = ['imdbID', 'title', 'year', 'type', 'status', 'user'];

    public function poster(){
        return $this->hasOne(\App\Models\Poster::class);
    }

    public function ifExists($imdbID){

        return $this->exists = DB::table('movies')
            ->where('imdbID', $imdbID)
            ->count();
    }

    public function link($imdbID){

        return $link = DB::table('posters')
            ->select(DB::raw('link'))
            ->where('imdbID', $imdbID)
            ->first();
    }




}
