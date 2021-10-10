@extends('layouts.App')

@section('title')
    Pendaftaran || PPDB 2021
@endsection

@section('header')
    Pendaftaran Management
@endsection

@section('content')
@if (App\Models\Pendaftaran::where('user_id', Auth::user()->id)->first() == NULL)
<div class="col-lg">
    <a href="{{ route('pendaftaran.create') }}" class="btn btn-primary">Create</a>
</div>    
@endif

<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nama</th>
        <th scope="col">Peminatan</th>
        <th scope="col">Berkas</th>
        <th scope="col">Status</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($items as $item)
          <tr>
              <th scope="col">{{ $loop->iteration }}</th>
              <td>{{ $item->user->name }}</td>
              <td>{{ $item->user->jurusan->nama }}</td>
              <td>
                  {{ $item->berkas }}
              </td>
              <td class="text-uppercase">
                  {{ $item->status }}
              </td>
              <td>
                  @if (Auth::user()->role->nama == 'calon')
                  <a href="{{ $item->status == 'proses' ? route('pendaftaran.edit', $item->id) : 'javascript:void(0)' }}" class="btn btn-success">Edit</a>
                  <a href="/pendaftaran/{{ $item->id }}/delete" class="btn btn-danger">Hapus</a>
                  <a href="/unduh/{{ $item->id }}" class="btn btn-warning">Unduh Berkas</a>
                    @else
                    <form action="/status/{{$item->id}}" method="post">
                        @csrf
                        <input type="hidden" name="status" value="diterima">
                        <button type="submit" class="btn btn-success">Terima</button>
                    </form>
                    <form action="/status/{{$item->id}}" method="post">
                        @csrf
                        <input type="hidden" name="status" value="ditolak">
                        <button type="submit" class="btn btn-danger">Tolak</button>
                    </form>
                    <a href="/unduh/{{ $item->id }}" class="btn btn-warning">Unduh Berkas</a>
                  @endif
              </td>
          </tr>
      @empty
          <th scope="col">Belum ada data</th>
      @endforelse
    </tbody>
  </table>
@endsection