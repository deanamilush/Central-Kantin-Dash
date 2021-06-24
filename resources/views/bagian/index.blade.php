@extends('layout.main')

@section('title', 'K4ntin')

@section('container')
<div class="container">
  <div class="row">
    <div class="col-10">
      <h2 class="mt-2">Master Tabel Bagian</h2>
      <table class="table">
        <thead class="table-dark">
          <tr>
            <th scope="col">No</th>
            <th scope="col">Kode</th>
            <th scope="col">Bagian</th>
            <th scope="col">Lantai</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($bagian as $bag)
          <tr>
            <th scope="row">{{$loop->iteration}}.</th>
            <td>{{$bag->kode_bagian}}</td>
            <td>{{$bag->bagian}}</td>
            <td>{{$bag->lantai}}</td>
            <td>
              <a href="{{ route('bagian.edit', $bag->id) }}" class="btn btn-info">Ubah</a>
              <form method="POST" action="{{ route('bagian.destroy', $bag->id) }}">
                @method('delete')
                @csrf
                <button type="submit" class="btn btn-warning">Hapus</button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <a href="{{ route('bagian.create')}}" class="btn btn-success">+</a>
    </div>
  </div>
</div>
@endsection