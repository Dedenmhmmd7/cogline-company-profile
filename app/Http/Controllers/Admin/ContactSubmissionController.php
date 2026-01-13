<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactSubmission;
use Illuminate\Http\Request;

class ContactSubmissionController extends Controller
{
    public function index(Request $request)
    {
        $query = ContactSubmission::query()->orderBy('created_at', 'desc');

        // Filter by status
        if ($request->has('status') && $request->status !== 'all') {
            $query->where('status', $request->status);
        }

        $submissions = $query->paginate(20);
        $newCount = ContactSubmission::where('status', 'new')->count();

        return view('admin.contacts.index', compact('submissions', 'newCount'));
    }

    public function show(ContactSubmission $contact)
    {
        return view('admin.contacts.show', compact('contact'));
    }

    public function updateStatus(Request $request, ContactSubmission $contact)
    {
        $validated = $request->validate([
            'status' => 'required|in:new,contacted,closed',
            'admin_notes' => 'nullable|string',
        ]);

        $contact->update([
            'status' => $validated['status'],
            'admin_notes' => $validated['admin_notes'],
            'contacted_at' => $validated['status'] === 'contacted' ? now() : $contact->contacted_at,
        ]);

        return redirect()
            ->route('admin.contacts.index')
            ->with('success', 'Status berhasil diupdate!');
    }

    public function destroy(ContactSubmission $contact)
    {
        try {
            $contact->delete();
            return redirect()
                ->route('admin.contacts.index')
                ->with('success', 'Data berhasil dihapus!');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function export()
    {
        $submissions = ContactSubmission::orderBy('created_at', 'desc')->get();

        $filename = 'contact-submissions-' . date('Y-m-d') . '.csv';
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"$filename\"",
        ];

        $callback = function() use ($submissions) {
            $file = fopen('php://output', 'w');
            
            // Header
            fputcsv($file, [
                'ID',
                'Tanggal',
                'Nama',
                'No. Telepon',
                'Alamat',
                'Email',
                'Jumlah Kamar',
                'Pesan',
                'Status',
                'Admin Notes',
            ]);

            // Data
            foreach ($submissions as $submission) {
                fputcsv($file, [
                    $submission->id,
                    $submission->created_at->format('d/m/Y H:i'),
                    $submission->name,
                    $submission->phone,
                    $submission->address,
                    $submission->email,
                    $submission->room_count,
                    $submission->message,
                    $submission->status_text,
                    $submission->admin_notes,
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}