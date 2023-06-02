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
        $mstrKwarran = MstrKwarran::where('is_deleted',0)->get();
        $mstrScoutLevel = MstrScoutLevel::where('is_deleted',0)->get();
        $mstrKridaSakaMilenial = MstrKridaSakaMilenial::where('is_deleted',0)->get();

        return view('landing', [
            'kwarran' => $mstrKwarran,
            'scout_level' => $mstrScoutLevel,
            'krida_saka_milenial' => $mstrKridaSakaMilenial
        ]);
    }
}
