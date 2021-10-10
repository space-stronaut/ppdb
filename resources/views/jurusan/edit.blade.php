@extends('layouts.App')

@section('title')
    Jurusan || PPDB 2021
@endsection

@section('header')
    Jurusan Management
@endsection

@section('content')
    <form action="{{ route('jurusan.update', $jurusan->id) }}" method="POST">
        @csrf
        @method('put')
        <div class="form-group">
            <input type="text" value="{{ $jurusan->nama }}" name="nama" class="form-control" id="">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
@endsection