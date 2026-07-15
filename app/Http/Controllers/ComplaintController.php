<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Carbon\Carbon; // Make sure you have a Complaint model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

Carbon::setLocale('id');

class ComplaintController extends Controller
{
    public function store(Request $request)
    {
        try {
            // Validate input
            $validated = $request->validate([
                'name' => 'required|string',
                'email' => 'required|email',
                'subject' => 'required|string',
                'message' => 'required|string',
                // 'status' => 'string'
            ]);

            // dd($validated);

            DB::beginTransaction();
            // Save complaint data
            $complaint = Complaint::create([
                'name' => $request->name,
                'email' => $request->email,
                'subject' => $request->subject,
                'message' => $request->message,
                'status' => 'belum dibalas',
                'sent_at' => now(),
            ]);

            DB::commit();

            return redirect('/')->with('success', 'Order berhasil disimpan!');
        } catch (\Exception $e) {
            DB::rollBack();

            return back()->with('error', 'Gagal mengirim keluhan: '.$e->getMessage());
        }
    }

    public function showComplaint()
    {
        $complaints = Complaint::all();

        return view('admin.complaints', compact('complaints'));
    }

    public function sendEmail(Request $request, $id)
    {
        $complaint = Complaint::findOrFail($id);
        $name = $complaint->name;
        $subject = $complaint->subject;
        $message = $complaint->message;

        // Send email logic here
        // Mail::to($complaint->email)->send(new EmailReply($name, $subject, $message));

        return view('admin.reply', compact('complaint'));
    }

    public function showUnreadComplaints()
    {
        $complaints = Complaint::where('status', 'belum dibalas')->get();

        return view('admin.unreplied', compact('complaints'));
    }

    public function showReadComplaints()
    {
        $complaints = Complaint::where('status', 'sudah dibalas')->get();

        return view('admin.replied', compact('complaints'));
    }
}
