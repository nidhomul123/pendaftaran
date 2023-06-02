<?php

namespace App\Http\Controllers;

use App\Models\TrParticipants;
use App\Models\TrParticipantsRegistrationStatus;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (auth()->user()->hasRole('admin')) {
            // * Admin

            $participantCount = 120;
            $acceptedCount = 105;
            $rejectedCount = 10;
            $queueCount = 5;

            return view('pages.admin.dashboard', [
                'sb_open' => '',
                'sb_active' => 'dashboard',
                'participant_count' => $participantCount,
                'accepted_count' => $acceptedCount,
                'rejected_count' => $rejectedCount,
                'queue_count' => $queueCount
            ]);
        }
        // * User

        // * registration status
        $trParticipantsRegistrationStatus = TrParticipantsRegistrationStatus::where('participant_id',auth()->user()->participant_id)->first();
        $registrationStatus = '-';
        if ($trParticipantsRegistrationStatus) {
            if ($trParticipantsRegistrationStatus->status == 1) {
                $registrationStatus = '<span class="text-success">Diterima</span>';
            } else {
                $registrationStatus = '<span class="text-danger">Ditolak</span>';
            }
        } else {
            $registrationStatus = '<span class="text-warning">Belum Diverifikasi</span>';
        }

        // * registration datetime
        $trParticipants = TrParticipants::where('id',auth()->user()->participant_id)->first();
        $registrationDatetime = date('d F Y H:i', strtotime($trParticipants->created_at));

        return view('pages.user.dashboard', [
            'sb_open' => '',
            'sb_active' => 'dashboard',
            'registration_status' => $registrationStatus,
            'registration_datetime' => $registrationDatetime
        ]);
    }
}
