@extends('layouts.App')

@section('title')
    Smp || PPDB 2021
@endsection

@section('header')
    Smp Management
@endsection

@section('content')
<div class="col-lg">
    <a href="{{ route('smp.create') }}" class="btn btn-primary">Create</a>
</div>
<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nama</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($smps as $item)
          <tr>
              <th scope="col">{{ $loop->iteration }}</th>
              <td>{{ $item->nama }}</td>
              <td>
                  <a href="{{ route('smp.edit', $item->id) }}" class="btn btn-success">Edit</a>
                  <a href="/smp/{{ $item->id }}/delete" class="btn btn-danger">Hapus</a>
              </td>
          </tr>
      @empty
          <th scope="col">Belum ada data</th>
      @endforelse
    </tbody>
  </table>
@endsection