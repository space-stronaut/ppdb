@extends('layouts.App')

@section('title')
    Smp || PPDB 2021
@endsection

@section('header')
    Smp Management
@endsection

@section('content')
    <form action="{{ route('smp.update', $smp->id) }}" method="POST">
        @csrf
        @method('put')
        <div class="form-group">
            <input type="text" value="{{ $smp->nama }}" name="nama" class="form-control" id="">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
@endsection