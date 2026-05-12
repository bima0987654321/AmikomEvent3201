@extends('layouts.admin')

@section('content')

<h2>Edit Partner</h2>

<form action="/admin/partners/update/{{ $partner->id }}"
      method="POST">

    @csrf

    <div>

        <label>Nama Partner</label>

        <br><br>

        <input type="text"
               name="name"
               value="{{ $partner->name }}"
               style="
                    width:300px;
                    padding:10px;
                    border:1px solid black;
                    background:white;
                    color:black;
               ">

    </div>

    <br><br>

    <div>

        <label>Logo URL</label>

        <br><br>

        <input type="text"
               name="logo_url"
               value="{{ $partner->logo_url }}"
               style="
                    width:300px;
                    padding:10px;
                    border:1px solid black;
                    background:white;
                    color:black;
               ">

    </div>

    <br><br>

    <button type="submit"
            style="
                padding:10px 20px;
                background:blue;
                color:white;
                border:none;
                cursor:pointer;
            ">

        Update

    </button>

</form>

@endsection