<?php

namespace App\Http\Controllers;

use App\Models\MstrKridaSakaMilenial;
use App\Models\MstrKwarran;
use App\Models\MstrScoutLevel;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $mstrKwarran = MstrKwarran::all();
        $mstrScoutLevel = MstrScoutLevel::all();
        $mstrKridaSakaMilenial = MstrKridaSakaMilenial::all();

        return view('landing', [
            'kwarran' => $mstrKwarran,
            'scout_level' => $mstrScoutLevel,
            'krida_saka_milenial' => $mstrKridaSakaMilenial
        ]);
    }
}
