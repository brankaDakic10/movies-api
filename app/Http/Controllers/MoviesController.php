<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Movie;
use Validator;
class MoviesController extends Controller
{
    public function index()
    {
        return Movie::all();
    }


    public function show($id)
    {
        // return Movie::findOrFail($id);
        return Movie::find($id);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:movies',
            'director' => 'required',
            'duration' => 'required|numeric|between:1,500',
            'releaseDate' => 'required|unique:movies',
            'imageUrl' => 'url'
        ]);

        if ($validator->fails()) {
            return new JsonResponse($validator->errors(), 406);
        }
        
        $movie=new Movie();
        
        $movie->title=$request->input('title');
        $movie->director=$request->input('director');
        $movie->imageUrl=$request->input('imageUrl');
        $movie->duration=$request->input('duration');
        $movie->releaseDate=$request->input('releaseDate');
        $movie->genre=$request->input('genre');
        $movie->save();
        return $movie;
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:movies',
            'director' => 'required',
            'duration' => 'required|numeric|between:1,500',
            'releaseDate' => 'required|unique:movies',
            'imageUrl' => 'url'
        ]);

        if ($validator->fails()) {
            return new JsonResponse($validator->errors(), 406);
        }
       $movie=Movie::find($id);
       $movie->title=$request->input('title');
       $movie->director=$request->input('director');
       $movie->imageUrl=$request->input('imageUrl');
       $movie->duration=$request->input('duration');
       $movie->releaseDate=$request->input('releaseDate');
       $movie->genre=$request->input('genre');
       $movie->save();
       return $movie;
    }


    public function destroy($id)
    {
        $movie= Movie::find($id);
        $movie->delete();
        return new JsonResponse(true);
    }
}
