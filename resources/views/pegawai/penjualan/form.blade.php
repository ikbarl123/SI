@extends('layouts.master-pegawai')
@section('section-header','Data penjualan')
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
                    <form method="POST" action="{{route('penjualan.store')}}" enctype="multipart/form-data">
                    @csrf
                       <div class="form-group">
                            <label>Kode Penjualan</label>
                            <input type="text" name="id_penjualan" class="form-control" id="formGroupExampleInput" >
                            @error('id_penjualan')
                                <h6 class="text-danger">{{ $message }}</h6>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Nama Pembeli</label>
                            <input type="text" name="nama_pembeli" class="form-control" id="formGroupExampleInput" >
                            @error('nama_pembeli')
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
                        <div class="form-group">
                            <label>Di isi Oleh</label>
                            <input type="text" name="username" value="{{Auth::user()->username}}" class="form-control" id="inlineFormInputGroup" readonly>
                        </div>
                        <label>Detail</label>
                        <table class="table" id="barang_table">
                            <thead>
                                <tr>
                                    <th>Barang</th>
                                    <th>Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr id="barang0">
                                    <td>
                                        <select class="form-control" name="barang[]">
                                                <option value=""> - Pilih barang</option>
                                                @foreach ($barang as $barang)
                                                    <option value="{{$barang->id_barang}}"> {{$barang->nama_barang}}</option>
                                                @endforeach 
                                            </select>
                                    </td>
                                    <td>
                                        <input type="number" name="jumlah[]" onChange="HitungHarga()" class="form-control" value="1" />
                                    </td>
                                </tr>
                                <tr id="barang1"></tr>
                            </tbody>
                        </table>

                        <div class="row">
                            <div class="col-md-12">
                                <button id="add_row" class="btn btn-default pull-left">+ Add Row</button>
                                <button id='delete_row' class="pull-right btn btn-danger">- Delete Row</button>
                            </div>
                        </div>     
                        <hr>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </form>
                    </div>
                </div>
            </div>
</div>

@endsection
@push('script')
<script>
async function HitungHarga() {
			document.getElementById("lat").value=lat;      
      		document.getElementById('lng').value=lng;    
    }

 $(document).ready(function(){
    let row_number = 1;
    $("#add_row").click(function(e){
      e.preventDefault();
      let new_row_number = row_number - 1;
      $('#barang' + row_number).html($('#barang' + new_row_number).html()).find('td:first-child');
      $('#barangs_table').append('<tr id="barang' + (row_number + 1) + '"></tr>');
      row_number++;
    });

    $("#delete_row").click(function(e){
      e.preventDefault();
      if(row_number > 1){
        $("#barang" + (row_number - 1)).html('');
        row_number--;
      }
    });
  });
</script>
@endpush