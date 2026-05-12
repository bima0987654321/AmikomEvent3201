@extends('layouts.admin')

@section('content')

<h2>Tambah Partner</h2>

<form action="/admin/partners/store" method="POST">

    @csrf

    <div>
        <label>Nama Partner</label>
        <br><br>

        <input type="text"
               name="name"
               placeholder="Masukkan nama partner"
               style="width:300px; padding:10px; border:1px solid #ccc;">
    </div>

    <br>

    <div>
        <label>Logo URL</label>
        <br><br>

        <input type="text"
               name="logo_url"
               value="https://placehold.co/200x200"
               style="width:300px; padding:10px; border:1px solid #ccc;">
    </div>

    <br>

    <button type="submit"
            style="padding:10px 20px; background:blue; color:white; border:none; cursor:pointer;">
        Simpan
    </button>

</form>

@endsection