<?php

namespace App\Http\Controllers;

use App\Models\TrParticipants;
use App\Models\TrParticipantsRegistrationStatus;
use Illuminate\Http\Request;

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

class FormController extends Controller
{
    public function index()
    {
        if (auth()->user()->hasRole('admin')) {
            // * Admin

            $trParticipants = TrParticipants::with('trParticipantsRegistrationStatus')
            ->orderBy('created_at','DESC')
            ->get();

            return view('pages.admin.form.form', [
                'sb_open' => '',
                'sb_active' => 'form',
                'participants' => $trParticipants
            ]);
        }
        // * User
        return view('pages.user.form.form', [
            'sb_open' => '',
            'sb_active' => 'form'
        ]);
    }

    public function detail($id)
    {
        $trParticipants = TrParticipants::with('mstrKwarran','mstrScoutLevel','mstrKridaSakaMilenial','trParticipantsRegistrationStatus')
        ->where('id',$id)
        ->first();

        return view('pages.admin.form.detail', [
            'sb_open' => '',
            'sb_active' => 'form',
            'participants' => $trParticipants
        ]);
    }

    public function accept(Request $request)
    {
        try {
            try {
                $id = Uuid::uuid4()->toString();
            } catch (UnsatisfiedDependencyException $e) {
                return response()->json([
                    'status' => false,
                    'message' => $e->getMessage()
                ]);
            }

            $trParticipantsRegistrationStatus = TrParticipantsRegistrationStatus::where('participant_id',$request->id)->first();

            if ($trParticipantsRegistrationStatus) {
                // * Update
                TrParticipantsRegistrationStatus::where('participant_id',$request->id)
                ->update([
                    'status' => 1,
                    'updated_by' => auth()->user()->email
                ]);
            } else {
                // * Insert
                TrParticipantsRegistrationStatus::create([
                    'id' => $id,
                    'participant_id' => $request->id,
                    'status' => 1,
                    'created_by' => auth()->user()->email
                ]);
            }

            return response()->json([
                'status' => true,
                'message' => 'Peserta pendaftaran berhasil diterima'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ]);
        }
    }

    public function reject(Request $request)
    {
        try {
            try {
                $id = Uuid::uuid4()->toString();
            } catch (UnsatisfiedDependencyException $e) {
                return response()->json([
                    'status' => false,
                    'message' => $e->getMessage()
                ]);
            }

            $trParticipantsRegistrationStatus = TrParticipantsRegistrationStatus::where('participant_id',$request->id)->first();

            if ($trParticipantsRegistrationStatus) {
                // * Update
                TrParticipantsRegistrationStatus::where('participant_id',$request->id)
                ->update([
                    'status' => 0,
                    'updated_by' => auth()->user()->email
                ]);
            } else {
                // * Insert
                TrParticipantsRegistrationStatus::create([
                    'id' => $id,
                    'participant_id' => $request->id,
                    'status' => 0,
                    'created_by' => auth()->user()->email
                ]);
            }

            return response()->json([
                'status' => true,
                'message' => 'Peserta pendaftaran berhasil ditolak'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ]);
        }
    }
}
