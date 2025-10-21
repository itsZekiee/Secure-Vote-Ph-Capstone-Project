<?php

namespace App\Http\Controllers;

use App\Models\Partylist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PartylistController extends Controller
{
    public function index()
    {
        $partylists = Partylist::all();

        $stats = [
            'totalPartylists' => $partylists->count(),
            'activePartylists' => $partylists->where('status', 'active')->count(),
            'totalMembers' => $partylists->sum('members_count'),
            'totalCandidates' => $partylists->sum('candidates_count'),
        ];

        return view('users.main-admin.ma-partylistPage', compact('partylists') + $stats);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'acronym' => 'nullable|string|max:10',
            'leader_name' => 'required|string|max:255',
            'founded_year' => 'nullable|integer|min:1900|max:' . date('Y'),
            'email' => 'nullable|email|max:255',
            'platform' => 'nullable|string|max:1000',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->except(['logo', '_token']);
        $data['status'] = 'active';
        $data['members_count'] = 0;
        $data['candidates_count'] = 0;

        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('partylists/logos', 'public');
            $data['logo'] = $logoPath;
        }

        Partylist::create($data);

        return redirect()->route('partylists.index')->with('success', 'Partylist created successfully!');
    }

    public function show($id)
    {
        $partylist = Partylist::findOrFail($id);
        return view('users.main-admin.ma-partylist-show', compact('partylist'));
    }

    public function edit($id)
    {
        $partylist = Partylist::findOrFail($id);
        return response()->json($partylist);
    }

    public function update(Request $request, $id)
    {
        $partylist = Partylist::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'acronym' => 'nullable|string|max:10',
            'leader_name' => 'required|string|max:255',
            'founded_year' => 'nullable|integer|min:1900|max:' . date('Y'),
            'email' => 'nullable|email|max:255',
            'platform' => 'nullable|string|max:1000',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->except(['logo', '_token', '_method']);

        if ($request->hasFile('logo')) {
            if ($partylist->logo) {
                Storage::disk('public')->delete($partylist->logo);
            }
            $logoPath = $request->file('logo')->store('partylists/logos', 'public');
            $data['logo'] = $logoPath;
        }

        $partylist->update($data);

        return redirect()->route('partylists.index')->with('success', 'Partylist updated successfully!');
    }

    public function destroy($id)
    {
        $partylist = Partylist::findOrFail($id);

        if ($partylist->logo) {
            Storage::disk('public')->delete($partylist->logo);
        }

        $partylist->delete();

        return redirect()->route('partylists.index')->with('success', 'Partylist deleted successfully!');
    }
}
