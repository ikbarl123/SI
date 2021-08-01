@extends('layouts.master-pegawai')
@section('section-header','Ubah Data barang')
@section('content-pegawai')
<div class="card">
            <div class="card-body">
           
                <!-- <h5 class="card-title">Special title treatment</h5> -->
                <div class="row">
                    <div class="col-md-12">
                    <form method="POST" action="{{route('barang.update',$barang->id_barang)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                            <label>Kode barang</label>
                            <input type="text" name="id_barang" value="{{$barang->id_barang}}" class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder" readonly>
                            @error('id_barang')
                                <h6 class="text-danger">{{ $message }}</h6>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Nama barang</label>
                            <input type="text" name="nama_barang" value="{{$barang->nama_barang}}" class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder">
                            @error('nama_barang')
                                <h6 class="text-danger">{{ $message }}</h6>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Harga</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Rp</div>
                                </div>
                                <input type="number" value="{{$barang->harga}}" name="harga" class="form-control" id="inlineFormInputGroup">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Stok</label>
                            <input type="number" name="stok" class="form-control" value="{{$barang->stok}}" id="inlineFormInputGroup" min="1">
                        </div>
                        <!-- <div class="form-group">
                            <label>Foto Baru</label>
                            <input type="file" name="foto" class="form-control" id="inlineFormInputGroup" >
                        </div> -->

                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                    </div>
                </div>
            </div>
</div>
@endsection