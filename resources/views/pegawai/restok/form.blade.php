@extends('layouts.master-pegawai')
@section('section-header','Data Restok')
@section('content-pegawai')

<div class="card">
            <div class="card-body">
            @if (@session('pesan'))
            <div class="alert alert-success pesan">
                <p>{{ session('pesan') }}</p>
            </div>
            @endif
                <!-- <h5 class="card-title">Special title treatment</h5> -->
                <div class="row">
                    <div class="col-md-12">
                    <form method="POST" action="{{route('restok.store')}}" enctype="multipart/form-data">
                    @csrf
                       <div class="form-group">
                            <label>Kode restok</label>
                            <input type="text" name="id_restok" class="form-control" id="formGroupExampleInput" >
                            @error('id_restok')
                                <h6 class="text-danger">{{ $message }}</h6>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Kode Barang</label>
                            <input type="text" name="id_barang" class="form-control" id="formGroupExampleInput" >
                            @error('id_barang')
                                <h6 class="text-danger">{{ $message }}</h6>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Nama Supplier</label>
                            <input type="text" name="nama_supplier" class="form-control" id="formGroupExampleInput" >
                            @error('nama_supplier')
                                <h6 class="text-danger">{{ $message }}</h6>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Tanggal</label>
                            <input type="date" name="tanggal" class="form-control" id="formGroupExampleInput" >
                            @error('tanggal')
                                <h6 class="text-danger">{{ $message }}</h6>
                            @enderror
                        </div>

                        

                        <div class="form-row">
                            <div class="form-group">
                                <label>Total Pembayaran</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Rp</div>
                                    </div>
                                    <input type="number" name="total_pembayaran" class="form-control" id="inlineFormInputGroup">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Jumlah</label>
                            <input type="number" name="jumlah" class="form-control" id="inlineFormInputGroup" min="1">
                        </div>
                        <div class="form-group">
                            <label>Di isi Oleh</label>
                            <input type="text" name="username" value="{{Auth::user()->username}}" class="form-control" id="inlineFormInputGroup" readonly>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </form>
                    </div>
                </div>
            </div>
</div>

@endsection
@push('script')
@endpush