@extends('navbar.main')

@section('judul','brand')
    
@section('halaman')
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="mt-3 text-dark">Data Brand</h2>
            @if(session()->has('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('status')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
             @endif
            <a class="btn btn-success" href="brands/create">Tambah Data Brand</a>
            <form action="brands" method="post">
                @csrf
                <table class="table table-bordered text-dark table-primary">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Updated At</th>
                            <th scope="col">Opsi</th>
                        </tr>
                    </thead>
                    <tbody class="table-dark">
                        @foreach($brands as $brands)
                        <tr>   
                            <td scope="row">{{$loop->iteration}}</td>
                            <td>{{$brands->brand}}</td>
                            <td>{{$brands->createdAt}}</td>
                            <td>{{$brands->updatedAt}}</td>
                            <td class=" btn btn-center">
                                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('brands.destroy',$brands->id) }}" method="POST">
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