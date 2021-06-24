@extends('layout.main')

@section('title', 'K4ntin')

@section('container')
<div class="container">
  <div class="row">
    <div class="col-10">
      <h2 class="mt-2">Master Tabel Item</h2>
      <table class="table">
        <thead class="table-dark">
          <tr>
            <th scope="col">No</th>
            <th scope="col">Menu</th>
            <th scope="col">Item</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($item as $itm)
          <tr>
            <th scope="row">{{$loop->iteration}}.</th>
            <td>{{$itm->menu_name}}
            </td>
            <td>{{$itm->item}}</td>
            <td>
              <a href="{{ route('item.edit', $itm->id) }}" class="btn btn-info">Ubah</a>
              <form method="POST" action="{{ route('item.destroy',$itm->id) }}">
                @method('delete')
                @csrf
                <button type="submit" class="btn btn-warning">Hapus</button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <a href="{{ route('item.create') }}" class="btn btn-success">+</a>
    </div>
  </div>
</div>
@endsection