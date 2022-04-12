@extends('navbar.main')

@section('judul','Barang')
    
@section('halaman')
    <div class="container">
        <div class="row">
            <div class="col-8">
                <h1 class="mt-3 text-light">Data barang</h1>
                @if(session()->has('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('status')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                    <a class="btn btn-success" href="barangs/create">Tambah data</a>
                <form action="barangs" method="post">
                    @csrf
                    <table class="table table-bordered text-light table-primary">
                        <thead>
                            <tr>
                                <td scope="col">NO</td>
                                <td scope="col">Nama</td>
                                <td scope="col">Brand</td>
                                <td scope="col">Ketarangan</td>
                                <td scope="col">create At</td>
                                <td scope="col">update At</td>
                                <td scope="col">Opsi</td>
                            </tr>
                        </thead>
                        <tbody class="table-dark">
                            @foreach ($barangs as $barangs)      
                            <tr>
                                <td scope="row">{{$loop->iteration}}</td>
                                <td>{{$barangs->nama}}</td>
                                <td>{{$barangs->brand}}</td>
                                <td>{{$barangs->keterangan}}</td>
                                <td>{{$barangs->createdAt}}</td>
                                <td>{{$barangs->updatedAt}}</td>
                                <td class=" btn btn-center">
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('barangs.destroy',$barangs->id) }}" method="POST">
                                            {{-- <a href="{{ route('barangs.edit',$barangs->id) }}" class="btn btn-sm btn-primary">EDIT</a> --}}
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </form>            
            </div>
        </div>
    </div>
 @endsection
