<?php

namespace App\Http\Controllers;

use App\Models\MstrKridaSakaMilenial;
use App\Models\MstrKwarran;
use App\Models\MstrScoutLevel;
use App\Models\TrParticipants;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $mstrKwarran = MstrKwarran::where('is_deleted',0)->get();
        $mstrScoutLevel = MstrScoutLevel::where('is_deleted',0)->get();
        $mstrKridaSakaMilenial = MstrKridaSakaMilenial::where('is_deleted',0)->get();

        // * Statistic
        $statistic = [];
        $statisticCounter = 0;

        $trParticipants = TrParticipants::with('mstrKwarran','mstrKridaSakaMilenial','trParticipantsRegistrationStatus')
        ->orderBy('created_at','DESC')
        ->get();

        foreach ($trParticipants as $key => $value) {
            $statistic[$statisticCounter]['no'] = $statisticCounter + 1;
            $statistic[$statisticCounter]['full_name'] = $value->full_name;
            $statistic[$statisticCounter]['krida_saka_milenial'] = $value->mstrKridaSakaMilenial->krida_saka_milenial;
            $statistic[$statisticCounter]['kwarran'] = $value->mstrKwarran->kwarran;
            if ($value->trParticipantsRegistrationStatus) {
                if ($value->trParticipantsRegistrationStatus->status == 1) {
                    $statistic[$statisticCounter]['status'] = '<span class="text-success"><b>Diterima</b></span>';
                } else {
                    $statistic[$statisticCounter]['status'] = '<span class="text-danger"><b>Ditolak</b></span>';
                }
            } else {
                $statistic[$statisticCounter]['status'] = '<span class="text-warning"><b>Belum Diverifikasi</b></span>';
            }
            $statisticCounter++;
        }

        return view('landing', [
            'kwarran' => $mstrKwarran,
            'scout_level' => $mstrScoutLevel,
            'krida_saka_milenial' => $mstrKridaSakaMilenial,
            'statistic' => $statistic
        ]);
    }
}
