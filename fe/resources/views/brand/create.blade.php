@extends('navbar.main')

@section('judul','Brand')
    
@section('halaman')
    <div class="container">
        <div class="row">
            <div class="col-8">
                <h1 class="mt-3 text-dark">Tambah Data Brand</h1>
                <form action="{{route('brands.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="brand" class="form-label text-dark">Brand</label>
                        <input type="text" name="brand" class="form-control" id="brand" placeholder="Isi brand" required>
                    </div>
                    <Button class="btn btn-sm btn-success">Tambah</Button>
                </form>
            </div>
        </div>
@endsection
