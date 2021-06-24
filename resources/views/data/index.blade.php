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
                    <th scope="col">List Menu</th>
                    <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $dat)
                    <tr>
                    <th scope="row">{{$loop->iteration}}.</th>
                        <td>{{$dat->listmenu}}</td>
                        <td>
                            <a href="{{ route('data.edit', $dat->id) }}" class="btn btn-info">Ubah</a>
                            <form method="POST" action="{{ route('data.destroy',$dat->id) }}">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-warning">Hapus</button>
                            </form>
                        </td>        
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="{{ route('data.create') }}" class="btn btn-success">+</a>   
        </div>
    </div>
</div>
@endsection