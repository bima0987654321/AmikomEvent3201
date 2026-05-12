@extends('layouts.admin')

@section('content')

<h2>Data Partner</h2>

<br>

<a href="/admin/partners/create"
   style="
        padding:10px 20px;
        background:blue;
        color:white;
        text-decoration:none;
        border-radius:5px;
   ">

    Tambah Partner

</a>

<br><br>

<table
    style="
        width:100%;
        border-collapse:collapse;
        background:white;
    ">

    <tr style="background:#f2f2f2;">

        <th style="border:1px solid #ccc; padding:15px;">
            No
        </th>

        <th style="border:1px solid #ccc; padding:15px;">
            Logo
        </th>

        <th style="border:1px solid #ccc; padding:15px;">
            Nama Partner
        </th>

        <th style="border:1px solid #ccc; padding:15px;">
            Action
        </th>

    </tr>

    @foreach($partners as $partner)

    <tr>

        <td style="
                border:1px solid #ccc;
                padding:15px;
                text-align:center;
           ">

            {{ $loop->iteration }}

        </td>

        <td style="
                border:1px solid #ccc;
                padding:15px;
                text-align:center;
           ">

            <img src="{{ $partner->logo_url }}"
                 width="100">

        </td>

        <td style="
                border:1px solid #ccc;
                padding:15px;
           ">

            {{ $partner->name }}

        </td>

        <td style="
                border:1px solid #ccc;
                padding:15px;
                text-align:center;
           ">

            <a href="/admin/partners/edit/{{ $partner->id }}"
               style="
                    background:orange;
                    color:white;
                    padding:8px 12px;
                    text-decoration:none;
                    border-radius:5px;
                    margin-right:5px;
               ">

                Edit

            </a>

            <a href="/admin/partners/delete/{{ $partner->id }}"
               onclick="return confirm('Yakin ingin menghapus data ini?')"

               style="
                    background:red;
                    color:white;
                    padding:8px 12px;
                    text-decoration:none;
                    border-radius:5px;
               ">

                Delete

            </a>

        </td>

    </tr>

    @endforeach

</table>

@endsection