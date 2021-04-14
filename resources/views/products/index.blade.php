@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="col-lg-12">
            <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                    <h4 style="float: left">Add Products</h4> 
                    <a href="#" style="float: right" class="btn btn-dark " 
                    data-toggle="modal" data-target="#addProduct">
                    <i class="fa fa-plus"></i> Add New Products </a></div>
                        <div class="card-body">
                            <table class="table table-bordered table-left">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>NamaBarang</th>
                                        <th>Merek</th>
                                        <th>Harga</th>
                                        <th>Kuantitas</th>
                                        <th>Stok_Barang</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $key => $product)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $product->nama_barang }}</td>
                                        <td>{{ $product->merek }}</td>
                                        <td>{{ number_format($product->harga,2) }}</td>
                                        <td>{{ $product->kuantitas }}</td>
                                        <td>
                                            @if ($product->stok_barang >= $product->kuantitas)
                                            <span class="badge badge-danger"> Low Stok > {{ $product->stok_barang }}</span>
                                            @else
                                            <span class="badge badge-success"> {{ $product->stok_barang }}</span>
                                        @endif
                                        </td>
                                        
                                        <td>
                                            <div class="btn group">
                                                <a href="#" class="btn btn-info btn-sm" data-toggle="modal" 
                                                    data-target="#editproduct{{ $product->id }}"><i class="fa fa-edit">
                                                    </i> Edit</a>
                                                <a href="#" data-toggle="modal" 
                                                    data-target="#deleteproduct{{ $product->id }}" class="btn btn-sm btn-danger"> <i class="fa fa-trash"></i>
                                                Del</a>
                                            </div>
                                        </td>
                                    </tr>

                            <div class="modal right fade" id="editproduct{{ $product->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="staticBackdropLabel">Edit Produk</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    {{ $product->id }}
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('product.update', $product->id) }}" method="post">
                                    @csrf
                                    @method('put')
                                    <div class="form-group">
                                        <label for="">Nama</label>
                                        <input type="text" name="name" id="" value="{{ $produk->name }}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="email" name="email" id="" value="{{ $produk->email }}" class="form-control">
                                    </div>
                                    <!-- <div class="form-group">
                                        <label for="">Phone</label>
                                        <input type="text" name="phone" id="" value="{{ $produk->phone }}" class="form-control">
                                    </div> -->
                                    <div class="form-group">
                                        <label for="">Password</label>
                                        <input type="password" name="password" readonly value="{{ $produk->password }}" class="form-control">
                                    </div>
                                    <!-- <div class="form-group">
                                        <label for="">Konirmasi Password</label>
                                        <input type="password" name="konfirmasi_password" id="" class="form-control">
                                    </div> -->
                                    <div class="form-group">
                                        <label for="">Jabatan</label>
                                        <select name="is_admin" id="" class="form-control">
                                            <option value="1" @if ($produk->is_admin == 1)
                                                selected
                                            @endif>Staff</option>
                                            <option value="2" @if ($produk->is_admin == 2) selected
                                            @endif>Kasir</option>
                                        </select>
                                    </div>
                                    <div class="modal-footer">
                                        <button class=" btn btn-warning btn-block">Update User</button>
                                    </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="modal right fade" id="deleteProduct{{ $product->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="staticBackdropLabel">Delete Produk</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    {{ $product->id }}
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('product.destroy', $produk->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <p> Apakah kamu yakin ingin menghapusnya {{ $product->name }} ? </p>
                                    <div class="modal-footer">
                                        <button class=" btn btn-default " data-dismiss="modal">
                                        Cancel</button>

                                        <button type="submit" class=" btn btn-danger ">
                                        Delete</button>
                                    </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>






                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                </div>
            </div>
            <div class="col-md-3">
            <div class="row">
                <div class="card">
                    <div class="card-header"> <h4>Search User</h4></div>
                        <div class="card-body">
                            ........

                            <thead>
                            </tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            </table>
                        </div>
                </div>
            </div>

            
        </div>

        </div>
    </div>

    <div class="modal right fade" id="addProduct" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="staticBackdropLabel">Add Products</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('products.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="">NamaBarang</label>
                <input type="text" name="nama_barang" id="" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Deskripsi</label>
                <textarea name="deskripsi" id="" cols="30" rows="2" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="">Merek</label>
                <input type="text" name="merek" id="" class="form-control">
            </div>
            <!-- <div class="form-group">
                <label for="">Phone</label>
                <input type="text" name="phone" id="" class="form-control">
            </div> -->
            <div class="form-group">
                <label for="">Harga</label>
                <input type="number" name="harga" id="" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Kuantitas</label>
                <input type="number" name="kuantitas" id="" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Stok Barang</label>
                <input type="number" name="stok_barang" id="" class="form-control">
            </div>

            <!-- <div class="form-group">
                <label for="">Jabatan</label>
                <select name="is_admin" id="" class="form-control">
                    <option value="1">Staff</option>
                    <option value="2">Kasir</option>
                </select>
            </div> -->
            <div class="modal-footer">
                <button class=" btn btn-primary btn-block">Simpan Produk</button>
            </div>
            </form>
            </div>
        </div>
    </div>
</div>


<div class="modal right fade" id="editProduct" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="staticBackdropLabel">Edit Produk</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('products.update', 1) }}" method="post">
            @csrf
            <div class="form-group">
                <label for="">Nama</label>
                <input type="text" name="name" id="" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" name="email" id="" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Phone</label>
                <input type="text" name="phone" id="" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="password" id="" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Konirmasi Password</label>
                <input type="password" name="konfirmasi_password" id="" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Jabatan</label>
                <select name="is_admin" id="" class="form-control">
                    <option value="1">Staff</option>
                    <option value="2">Kasir</option>
                </select>
            </div>
            <div class="modal-footer">
                <button class=" btn btn-primary btn-block">Simpan Produk</button>
            </div>
            </form>
            </div>
        </div>
    </div>
</div>



    <style>
        .modal.right .modal-dialog{
            top: 0;
            right: 0;
            margin-right: 19vh;
        }

        .modal.fade:not(.in).right .modal-dialog{
            -webkit-transform: translate3d(25%, 0, 0);
            transform: translate3d(25%, 0,0);
        }
    </style>
    
@endsection