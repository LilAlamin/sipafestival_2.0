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

            if ($request->expectsJson() || $request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Pertanyaan Anda berhasil dikirim! Tim SIPA akan segera merespons melalui email.',
                    'data' => $complaint,
                ]);
            }

            return redirect('/')->with('success', 'Pertanyaan Anda berhasil dikirim! Tim SIPA akan segera merespons melalui email.');
        } catch (\Exception $e) {
            DB::rollBack();

            if ($request->expectsJson() || $request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Gagal mengirim pertanyaan: '.$e->getMessage(),
                ], 422);
            }

            return back()->with('error', 'Gagal mengirim keluhan: '.$e->getMessage());
        }
    }

    public function showComplaint(Request $request)
    {
        $query = Complaint::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('subject', 'like', "%{$search}%")
                    ->orWhere('message', 'like', "%{$search}%")
                    ->orWhere('response_subject', 'like', "%{$search}%")
                    ->orWhere('response_message', 'like', "%{$search}%");
            });
        }

        $complaints = $query->orderBy('created_at', 'desc')->get();
        $totalAll = Complaint::count();
        $totalUnread = Complaint::where('status', 'belum dibalas')->count();
        $totalReplied = Complaint::where('status', 'sudah dibalas')->count();

        return view('admin.complaints', compact('complaints', 'totalAll', 'totalUnread', 'totalReplied'));
    }

    public function sendEmail(Request $request, $id)
    {
        $complaint = Complaint::findOrFail($id);
        $name = $complaint->name;
        $subject = $complaint->subject;
        $message = $complaint->message;

        return view('admin.reply', compact('complaint'));
    }

    public function showUnreadComplaints(Request $request)
    {
        $query = Complaint::where('status', 'belum dibalas');

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('subject', 'like', "%{$search}%")
                    ->orWhere('message', 'like', "%{$search}%");
            });
        }

        $complaints = $query->orderBy('created_at', 'desc')->get();
        $totalAll = Complaint::count();
        $totalUnread = Complaint::where('status', 'belum dibalas')->count();
        $totalReplied = Complaint::where('status', 'sudah dibalas')->count();

        return view('admin.unreplied', compact('complaints', 'totalAll', 'totalUnread', 'totalReplied'));
    }

    public function showReadComplaints(Request $request)
    {
        $query = Complaint::where('status', 'sudah dibalas');

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('subject', 'like', "%{$search}%")
                    ->orWhere('message', 'like', "%{$search}%")
                    ->orWhere('response_subject', 'like', "%{$search}%")
                    ->orWhere('response_message', 'like', "%{$search}%");
            });
        }

        $complaints = $query->orderBy('created_at', 'desc')->get();
        $totalAll = Complaint::count();
        $totalUnread = Complaint::where('status', 'belum dibalas')->count();
        $totalReplied = Complaint::where('status', 'sudah dibalas')->count();

        return view('admin.replied', compact('complaints', 'totalAll', 'totalUnread', 'totalReplied'));
    }
}
