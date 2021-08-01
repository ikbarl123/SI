@extends('layouts.master-pegawai')
@section('section-header','Data penjualan')
@section('content-pegawai')

<div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                       <div class="form-group">
                            <label>Kode Penjualan</label>
                            <input type="text" name="id_penjualan" value="{{$penjualan->id_penjualan}}" class="form-control" id="formGroupExampleInput" readonly>
                            @error('id_penjualan')
                                <h6 class="text-danger">{{ $message }}</h6>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Nama Pembeli</label>
                            <input type="text" name="nama_pembeli" value="{{$penjualan->nama_pembeli}}" class="form-control" id="formGroupExampleInput" readonly>
                            @error('nama_pembeli')
                                <h6 class="text-danger">{{ $message }}</h6>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Tanggal</label>
                            <input type="date" name="tanggal" value="{{$penjualan->tanggal}}" class="form-control" id="formGroupExampleInput" readonly>
                            @error('tanggal')
                                <h6 class="text-danger">{{ $message }}</h6>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Di isi Oleh</label>
                            <input type="text" name="username" value="{{Auth::user()->username}}" class="form-control" id="inlineFormInputGroup" readonly>
                        </div>
                        <label>Detail Pesanan</label>
                        <table class="table" id="barang_table">
                            <thead>
                                <tr>
                                    <th>Barang</th>
                                    <th>Jumlah</th>
                                    <th>harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($penjualan->barang as $barang)
                                <?php
                                $biaya=($barang->harga)*($barang->pivot->jumlah);
                                ?>
                                <tr>
                                    <td>
                                        <input type="text" name="nama_barang" class="form-control" value="{{$barang->nama_barang}}" readonly/>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="number" name="jumlah" class="form-control" value="{{$barang->pivot->jumlah}}" readonly/>            
                                    </td>
                                    <td>
                                        <input type="number" name="harga" class="form-control" value="{{$biaya}}" readonly/>            
                                    </td>
                                </tr>
                                 @endforeach
                            </tbody>
                        </table>

                        <hr>
                        <div class="form-row">
                            <div class="form-group">
                                <label>Total Pembayaran</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Rp</div>
                                    </div>
                                    <input type="number" name="total_pembayaran" value="{{$penjualan->jumlah_pembayaran}}" class="form-control" id="inlineFormInputGroup" readonly>
                                </div>
                            </div>
                        </div>             
                    </div>
                </div>
            </div>
</div>

@endsection
@push('script')
@endpush