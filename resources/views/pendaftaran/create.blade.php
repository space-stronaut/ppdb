@extends('layouts.App')

@section('title')
    Pendaftaran || PPDB 2021
@endsection

@section('header')
    Upload Berkas
@endsection

@section('content')
    <form action="{{ route('pendaftaran.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" class="form-control" id="">
        <input type="file" name="berkas" class="form-control" id="">
        <input type="hidden" name="status" value="proses">
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
@endsection