@extends('layout.main')

@section('title', 'K4ntin')

@section('container')
<div class="container">
    <div class="row">
        <div class="col-10">
            <h2 class="mt-2">Edit Bagian</h2>
            <form method="POST" action="{{ route('data.update', $data->id) }}">
            @method('patch')
            @csrf
            <div class="mb-3">
                    <label for="listmenu" class="form-label">List Menu</label>
                    <input type="text" name="listmenu" class="form-control" value="{{$data->listmenu}}" id="listmenu" required>
                    <div class="invalid-feedback">
                        Mohon masukan jenis menu (menu atau add-on).
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                </form> 
        </div>
    </div>
</div>
@endsection