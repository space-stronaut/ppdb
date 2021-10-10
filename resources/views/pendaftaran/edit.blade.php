@extends('layouts.App')

@section('title')
    Pendaftaran || PPDB 2021
@endsection

@section('header')
    Edit Berkas
@endsection

@section('content')
    <form action="{{ route('pendaftaran.update', $pendaftaran->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" class="form-control" id="">
        <input type="file" name="berkas" class="form-control" id="">
        <input type="hidden" name="status" value="proses">
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
@endsection