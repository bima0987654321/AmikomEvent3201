<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Partner;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = Partner::all();

        return view('admin.partners.index', compact('partners'));
    }

    public function create()
    {
        return view('admin.partners.create');
    }

    public function store(Request $request)
    {
        Partner::create([
            'name' => $request->name,
            'logo_url' => $request->logo_url
        ]);

        return redirect('/admin/partners');
    }

    public function edit($id)
    {
        $partner = Partner::find($id);
        return view('admin.partners.edit', compact('partner'));
    }

    public function update(Request $request, $id)
    {
        $partner = Partner::find($id);

        $partner->update([
            'name' => $request->name,
            'logo_url' => $request->logo_url
        ]);

        return redirect('/admin/partners');
    }

    public function delete($id)
    {
        $partner = Partner::find($id);

        $partner->delete();

        return redirect('/admin/partners');
    }

}


