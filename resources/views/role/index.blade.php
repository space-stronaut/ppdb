@extends('layouts.App')

@section('title')
    Role || PPDB 2021
@endsection

@section('header')
    Role Management
@endsection

@section('content')
<div class="col-lg">
    <a href="{{ route('role.create') }}" class="btn btn-primary">Create</a>
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
      @forelse ($roles as $item)
          <tr>
              <th scope="col">{{ $loop->iteration }}</th>
              <td>{{ $item->nama }}</td>
              <td>
                  <a href="{{ route('role.edit', $item->id) }}" class="btn btn-success">Edit</a>
                  <a href="/role/{{ $item->id }}/delete" class="btn btn-danger">Hapus</a>
              </td>
          </tr>
      @empty
          <th scope="col">Belum ada data</th>
      @endforelse
    </tbody>
  </table>
@endsection