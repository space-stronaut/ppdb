@extends('layouts.App')

@section('title')
    Role || PPDB 2021
@endsection

@section('header')
    Role Management
@endsection

@section('content')
    <form action="{{ route('role.update', $role->id) }}" method="POST">
        @csrf
        @method('put')
        <div class="form-group">
            <input type="text" value="{{ $role->nama }}" name="nama" class="form-control" id="">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
@endsection