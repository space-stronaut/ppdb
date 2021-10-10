@extends('layouts.App')

@section('title')
    Jurusan || PPDB 2021
@endsection

@section('header')
    Jurusan Management
@endsection

@section('content')
    <form action="{{ route('jurusan.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <input type="text" name="nama" class="form-control" id="">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
@endsection