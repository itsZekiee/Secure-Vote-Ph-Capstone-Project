<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ElectionForm1;
use App\Models\ElectionForm2;
use App\Models\ElectionForm3;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ElectionFormController extends Controller
{
    
    public function store(Request $request)
    {
        // Only allow access to logged-in main_admin or sub_admin
        if (!Auth::check() || !in_array(Auth::user()->role, ['main_admin', 'sub_admin'])) {
            abort(403, 'Unauthorized access.');
        }

        $validated = $request->validate([
            'organization' => 'required|string|max:255',
            'contact_person' => 'required|string|max:255',
            'contact_email' => 'required|email|max:255',
            'allowed_domain' => 'required|string|max:255', 
            'admin_emails' => 'nullable|string', 
        ]);

        // Save the form
        $form3 = ElectionForm3::create([
            'organization' => $validated['organization'],
            'contact_person' => $validated['contact_person'],
            'contact_email' => $validated['contact_email'],
            'allowed_domain' => $validated['allowed_domain'],
            'admin_emails' => $validated['admin_emails'] ?? null,
        ]);

       
        $adminEmails = array_map('trim', explode(',', $validated['admin_emails'] ?? ''));
        $existingAdmins = User::whereIn('email', $adminEmails)->get();

        foreach ($existingAdmins as $admin) {
            $admin->update(['role' => 'sub_admin']);
        }

        return response()->json([
            'message' => 'Form 3 saved successfully!',
            'form3_id' => $form3->id,
            'sub_admins_added' => $existingAdmins->pluck('email'),
            'next_step' => 4,
        ]);
    }


    /**
     * Store Form 1 data
     */
    protected function storeForm1(Request $request)
    {
        $validated = $request->validate([
            'form.title' => 'required|string|max:255',
            'form.organization' => 'required|string|max:255',
            'form.category' => 'nullable|string|max:255',
            'form.description' => 'required|string|max:800',
            'form.instructions' => 'nullable|string|max:800',
            'form.start' => 'required|date',
            'form.end' => 'required|date|after:form.start',
        ]);

        $form1 = ElectionForm1::create([
            'title' => $request->form['title'],
            'organization' => $request->form['organization'],
            'category' => $request->form['category'] ?? null,
            'description' => $request->form['description'],
            'instructions' => $request->form['instructions'] ?? null,
            'start' => $request->form['start'],
            'end' => $request->form['end'],
            'created_by' => Auth::id(),
        ]);

        return response()->json([
            'message' => 'Form 1 saved successfully',
            'form1_id' => $form1->id,
            'next_step' => 2
        ]);
    }

    /**
     * Store Form 2 (positions and candidates)
     */
    protected function storeForm2(Request $request)
    {
        $validated = $request->validate([
            'form1_id' => 'required|exists:election_form_1,id',
            'positions' => 'required|array|min:1',
            'positions.*.name' => 'required|string|max:255',
            'positions.*.candidates' => 'required|array|min:1',
            'positions.*.candidates.*' => 'required|string|max:255',
        ]);

        foreach ($request->positions as $pos) {
            ElectionForm2::create([
                'form1_id' => $request->form1_id,
                'position' => $pos['name'],
                'candidates' => json_encode($pos['candidates']),
            ]);
        }

        return response()->json([
            'message' => 'Form 2 saved successfully',
            'form1_id' => $request->form1_id,
            'next_step' => 3
        ]);
    }

    /**
     * Store Form 3 (settings, restrictions)
     */
    protected function storeForm3(Request $request)
    {
        $validated = $request->validate([
            'form1_id' => 'required|exists:election_form_1,id',
            'allowed_domains' => 'nullable|string|max:255',
            'admin_emails' => 'nullable|string|max:800',
            'enable_geo_restriction' => 'boolean',
            'geo_location' => 'nullable|string',
            'geo_radius' => 'nullable|numeric',
            'geo_radius_unit' => 'nullable|string|max:10',
        ]);

        // Check if sub-admin emails exist in user table
        $validAdmins = [];
        if (!empty($request->admin_emails)) {
            $emails = array_map('trim', explode(',', $request->admin_emails));
            $existing = \App\Models\User::whereIn('email', $emails)->pluck('email')->toArray();
            $validAdmins = $existing;
        }

        $form3 = ElectionForm3::create([
            'form1_id' => $request->form1_id,
            'allowed_domains' => $request->allowed_domains ?? '@securevoteph.com',
            'admin_emails' => json_encode($validAdmins),
            'enable_geo_restriction' => $request->enable_geo_restriction ?? false,
            'geo_location' => $request->geo_location ?? null,
            'geo_radius' => $request->geo_radius ?? null,
            'geo_radius_unit' => $request->geo_radius_unit ?? 'km',
        ]);

        return response()->json([
            'message' => 'Form 3 saved successfully',
            'form1_id' => $request->form1_id,
            'next_step' => 4 // Proceed to Form 4
        ]);
    }
}
