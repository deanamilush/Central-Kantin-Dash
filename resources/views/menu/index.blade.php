@extends('layout.main')

@section('title', 'K4ntin')

@section('container')
<div class="container">
  <div class="row">
    <div class="col-">
      <h2 class="mt-2">Master Tabel Menu</h2>

      <br />
      <table class="table">
        <thead class="table-dark">
          <tr>
            <th scope="col">No</th>
            <th scope="col">Kode</th>
            <th scope="col">Hari</th>
            <th scope="col">Menu Utama</th>
            <th scope="col">Menu Add-On</th>
            <th scope="col">Harga Add-On</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($menu as $menu)
          <tr>
            <th scope="row">{{$loop->iteration}}.</th>
            <td>{{$menu->kode_katering}}</td>
            <td>@foreach($menu->hari as $value)
              {{$value}}
              @endforeach
            </td>
            <td>@foreach($menu->menu_utama as $value)
              {{$value}}<br />
              @endforeach
            </td>
            <td>@foreach($menu->menu_add_on as $value)
              {{$value}}<br />
              @endforeach
            </td>
            <td>{{$menu->harga_add_on}}</td>
            <td>
              <a href="{{ route('menu.edit', $menu->id) }}" class="btn btn-info">Ubah</a>
              <form method="POST" action="{{ route('menu.destroy',$menu->id) }}">
                @method('delete')
                @csrf
                <button type="submit" class="btn btn-warning">Hapus</button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <a href="{{ route('menu.create') }}" class="btn btn-success">+</a>
    </div>
  </div>
</div>
@endsection