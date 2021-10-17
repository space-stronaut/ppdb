@extends('layouts.App')

@section('title')
    Pendaftaran || PPDB 2021
@endsection

@section('header')
    Pendaftaran Management
@endsection

@section('content')
@if (Auth::user()->role->nama == 'admin')
<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nama</th>
        <th scope="col">NISN</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($items as $item)
          <tr>
              <th scope="col">{{ $loop->iteration }}</th>
              <td>{{ $item->user->name }}</td>
              <td>
                  {{$item->user->nisn}}
              </td>
              <td colspan=4>
                  <a href="/unduh/{{ $item->id }}" class="btn btn-warning">Unduh Berkas</a>
                  @if ($item->status != 'proses')
                      <button class="btn btn-info text-uppercase">{{ $item->status }}</button>
                  @else
                  <form action="/status/{{ $item->id }}" method="post">
                    @csrf
                    <input type="hidden" name="status" value="diterima">
                    <button type="submit" class="btn btn-success">Terima</button>    
                </form>
                <form action="/status/{{ $item->id }}" method="post">
                    @csrf
                    <input type="hidden" name="status" value="ditolak">
                    <button type="submit" class="btn btn-danger">Tolak</button>    
                </form>
                  @endif
              </td>
          </tr>
      @empty
          <th scope="col">Belum ada data</th>
      @endforelse
    </tbody>
  </table>
@else
<form action="{{ route('pendaftaran.update', Auth::user()->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="row">
        <div class="col">
            <input type="hidden" name="id" value="{{ Auth::user()->id }}">
            <div class="form-group">
                <label for="">Username</label>
                <input type="text" name="username" class="form-control" value="{{ Auth::user()->username }}" id="" readonly>
            </div>
            <div class="form-group">
                <label for="">Nama</label>
                <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}" id="">
            </div>
            <div class="form-group">
                <label for="">NISN</label>
                <input type="number" name="nisn" class="form-control" value="{{ Auth::user()->nisn }}" id="">
            </div>
            <div class="form-group">
                <label for="">No Hp</label>
                <input type="number" name="nohp" class="form-control" value="{{ Auth::user()->nohp }}" id="">
            </div>
            <div class="form-group">
                <label for="">Tempat Lahir</label>
                <input type="text" name="tempat_lahir" class="form-control" value="{{ Auth::user()->tempat_lahir }}" id="">
            </div>
            <div class="form-group">
                <label for="">Jalur</label>
                <input type="text" name="jalur" class="form-control" value="{{ Auth::user()->jalur }}" id="">
            </div>
            <div class="form-group">
                <label for="">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" class="form-control" value="{{ Auth::user()->tanggal_lahir }}" id="">
            </div>
            <div class="form-group">
                <label for="">Nama Ibu</label>
                <input type="text" name="nama_ibu" value="{{ Auth::user()->nama_ibu }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Nama Ayah</label>
                <input type="text" name="nama_ayah" value="{{ Auth::user()->nama_ayah }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Nama Wali <small class="text-danger">*Optional</small></label>
                <input type="text" name="nama_wali" value="{{ Auth::user()->nama_wali }}" class="form-control">
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="">Berkas <small>*Pas Foto,Foto Raport,Foto Nisn,Bukti Pembayaran(Bila mendaftar dengan jalur Reguler)</small></label>
                <input type="file" name="berkas" class="form-control" id="">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</form>
@endif
@endsection