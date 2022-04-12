@extends('navbar.main')

@section('judul','Barang')
    
@section('halaman')
    <div class="container">
        <div class="row">
            <div class="col-8">
                <h1 class="mt-3 text-dark">Tambah Data Barang</h1>
                <form action="{{route('barangs.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="nama" class="form-label text-dark">Nama</label>
                        <input type="text" name="nama" class="form-control" id="nama" placeholder="Isi Nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="brand" class="form-label text-dark">Brand</label>
                        <input type="text" name="brand" class="form-control" id="brand" placeholder="Isi brand" required>
                    </div>
                    <div class="mb-3">
                        <label for="keterangan" class="form-label text-dark">Ketarangan</label>
                        <input type="text" name="keterangan" class="form-control" id="keterangan" placeholder="Masukaan Ketarangan" required>
                    </div>
                    <Button class="btn btn-sm btn-success">Tambah</Button>
                </form>
            </div>
        </div>
@endsection
