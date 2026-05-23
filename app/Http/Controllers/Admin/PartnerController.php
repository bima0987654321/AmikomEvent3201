<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Partner;

class PartnerController extends Controller
{
    public function index(Request $request)
    {
        $query = Partner::query();

        // Search functionality
        if ($request->has('search') && $request->search != '') {
            $query->where('name', 'LIKE', '%' . $request->search . '%');
        }

        $partners = $query->orderBy('created_at', 'desc')->get();
        return view('admin.partners.index', compact('partners'));
    }

    public function create()
    {
        return view('admin.partners.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'logo_url' => 'required|string|max:255',
        ]);

        Partner::create([
            'name' => $validated['name'],
            'logo_url' => $validated['logo_url']
        ]);

        return redirect('/admin/partners')->with('success', 'Partner berhasil ditambahkan');
    }

    public function edit($id)
    {
        $partner = Partner::find($id);
        if (!$partner) {
            return redirect('/admin/partners')->with('error', 'Partner tidak ditemukan');
        }
        return view('admin.partners.edit', compact('partner'));
    }

    public function update(Request $request, $id)
    {
        $partner = Partner::find($id);
        if (!$partner) {
            return redirect('/admin/partners')->with('error', 'Partner tidak ditemukan');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'logo_url' => 'required|string|max:255',
        ]);

        $partner->update([
            'name' => $validated['name'],
            'logo_url' => $validated['logo_url']
        ]);

        return redirect('/admin/partners')->with('success', 'Partner berhasil diperbarui');
    }

    public function delete($id)
    {
        $partner = Partner::find($id);
        if (!$partner) {
            return redirect('/admin/partners')->with('error', 'Partner tidak ditemukan');
        }

        $partner->delete();
        return redirect('/admin/partners')->with('success', 'Partner berhasil dihapus');
    }

}


