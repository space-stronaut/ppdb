@extends('layouts.App')

@section('title')
    Dashboard | PPDB 2021
@endsection

@section('header')
    Dashboard
@endsection

@section('content')
    @if (App\Models\Pendaftaran::where('user_id', Auth::user()->id)->first() == NULL && Auth::user()->role->nama == 'calon')
        Kamu Belum Melengkapi Pendaftaran
    @elseif(App\Models\Pendaftaran::where('user_id', Auth::user()->id)->first() != NULL && Auth::user()->role->nama == 'calon')
        Pendaftaranmu telah lengkap,untuk penerimaan silakan cek ke menu pendaftaran
    @else
        Halo Admin
    @endif
@endsection