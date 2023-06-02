<?php

namespace App\Http\Controllers;

use App\Models\TrParticipants;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

class RegistrationController extends Controller
{
    public function register(Request $request)
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

            $kk_original_filename = null;
            $kk_filename = null;
            $ktp_original_filename = null;
            $ktp_filename = null;

            if (!$request->hasFile('kk_file') || !$request->hasFile('ktp_file')) {
                return response()->json([
                    'status' => false,
                    'message' => 'Harap upload KK dan KTP'
                ]);
            }

            $kk_file = $request->file('kk_file');
            $kk_original_filename = $kk_file->getClientOriginalName();
            $kk_filename = date('YmdHis').'_kk_'.$kk_original_filename;
            $kk_file->storeAs('public/registration/', $kk_filename);

            $ktp_file = $request->file('ktp_file');
            $ktp_original_filename = $ktp_file->getClientOriginalName();
            $ktp_filename = date('YmdHis').'_ktp_'.$ktp_original_filename;
            $ktp_file->storeAs('public/registration/', $ktp_filename);

            TrParticipants::create([
                'id' => $id,
                'full_name' => $request->full_name,
                'email' => $request->email,
                'gender' => (int)$request->gender,
                'birth_place' => $request->birth_place,
                'birth_date' => date('Y-m-d', strtotime($request->birth_date)),
                'pangkalan_gudep' => $request->pangkalan_gudep,
                'kwarran_id' => $request->kwarran,
                'nik' => $request->nik,
                'nta_pramuka_nis_nim' => $request->nta_pramuka_nis_nim,
                'scout_level_id' => $request->scout_level,
                'krida_saka_milenial_id' => $request->krida_saka_milenial,
                'address' => $request->address,
                'phone_number' => $request->phone_number,
                'twitter' => $request->twitter,
                'instagram' => $request->instagram,
                'facebook' => $request->facebook,
                'tiktok' => $request->tiktok,
                'kk_original_filename' => $kk_original_filename,
                'kk_filename' => $kk_filename,
                'ktp_original_filename' => $ktp_original_filename,
                'ktp_filename' => $ktp_filename,
                'created_by' => 'registration_form'
            ]);

            User::create([
                'participant_id' => $id,
                'name' => $request->full_name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'created_at' => date('Y-m-d H:i:s')
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Pendaftaran berhasil, silahkan login menggunakan email dan password anda'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ]);
        }
    }
}
