<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class FilmsController extends Controller
{
    /**
     * Display a listing of the resource
     *
     * @return Response|array
     */
    public function index()
    {
        $films = Film::all();
        return $films;
    }
}
