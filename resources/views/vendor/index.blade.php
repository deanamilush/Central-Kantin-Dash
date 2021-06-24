@extends('layout.main')

@section('title', 'K4ntin')

@section('container')
<div class="container">
  <div class="row">
    <div class="col-10">
      <h2 class="mt-2">Master Tabel Vendor</h2><br />
      <table class="table">
        <thead class="table-dark">
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Kode</th>
            <th scope="col">Harga Katering Dasar</th>
            <th scope="col">Add On (Tambahan)</th>
            <th scope="col">Harga Add On</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($vendor as $ven)
          <tr>
            <th scope="row">{{$loop->iteration}}.</th>
            <td>{{$ven->nama}}</td>
            <td>{{$ven->kode}}</td>
            <td>{{$ven->harga_katering_dasar}}</td>
            <td>{{$ven->add_on}}</td>
            <td>{{$ven->harga_add_on}}</td>
            <td>
              <a href="{{ route('vendor.edit', $ven->id) }}" class="btn btn-info">Ubah</a>
              <form method="POST" action="{{ route('vendor.destroy', $ven->id) }}">
                @method('delete')
                @csrf
                <button type="submit" class="btn btn-warning">Hapus</button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <a href="{{ route('vendor.create') }}" class="btn btn-success">+</a>
    </div>
  </div>
</div>
@endsection