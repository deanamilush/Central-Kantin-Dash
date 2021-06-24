@extends('layout.main')

@section('title', 'K4ntin')

@section('container')
<div class="container">
    <div class="row">
        <div class="col-10">
            <h2 class="mt-2">Edit Bagian</h2>
            <form method="POST" action="{{ route('bagian.update', $bagian->id) }}">
            @method('patch')
            @csrf
            <div class="mb-3">
                    <label for="kode_bagian" class="form-label">Kode Bagian</label>
                    <input type="text" name="kode_bagian" class="form-control" value="{{$bagian->kode_bagian}}" id="kode_bagian" required>
                    <div class="invalid-feedback">
                        Mohon masukan kode bagian.
                    </div>
                </div>
                <div class="mb-3">
                    <label for="bagian" class="form-label">Umur</label>
                    <input type="text" name="bagian" class="form-control" value="{{$bagian->bagian}}" id="bagian" required>
                    <div class="invalid-feedback">
                        Mohon isi bagian yang Anda inginkan.
                    </div>
                </div>
                <div class="mb-3">
                    <label for="lantai" class="form-label">Jurusan</label>
                    <input type="text" name="lantai" class="form-control" value="{{$bagian->lantai}}" id="lantai" required>
                    <div class="invalid-feedback">
                        Mohon masukan lantai untuk bagian di atas.
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                </form> 
        </div>
    </div>
</div>
@endsection