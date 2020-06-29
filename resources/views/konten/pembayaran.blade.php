@extends('layouts.admin')

@section('isi')

<!-- Default box -->
<div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Judul : Aplikasi Media Cetak</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          <div class="content">
    <div class="panel panel-flat border-top-lg border-top-primary">
    <form action="{{(isset($Pembayaran)) ? route ('Pembayaran.update',$Pembayaran->id_pembayaran):route('Pembayaran.store')}}" method="post">
    @csrf
    @if(isset($Pembayaran))?@method('PUT')

    @endif
    <div class="panel-body">
	<div class="form-group">
		<label class="control-label col-lg-2">Id Dokumen</label>
		<div class="col-lg10">
			<input type="text" value="{{(isset($Pembayaran))?$Pembayaran->id_dokumen:old('id_dokumen')}}" name="id_dokumen" class="form-control" required>
            @error('id_dokumen')
                <small style="color:red">{{$message}}</small
            >@enderror
		</div>
    </div>
	<div class="form-group">
		<label class="control-label col-lg-2">Id Petugas</label>
		<div class="col-lg10">
			<input type="text" value="{{(isset($Pembayaran))?$Pembayaran->id_petugas:old('id_petugas')}}" name="id_petugas" class="form-control" required>
            @error('id_petugas')
                <small style="color:red">{{$message}}</small
            >@enderror
		</div>
    </div>


    <div class="form-group">
		<label class="control-label col-lg-2">Status Pembayaran</label>
		<div class="col-lg10">
			<select class="form-control" name="status_pembayaran" id="status_pembayaran" value="{{(isset($Pembayaran))?$Pembayaran->status_pembayaran:old('status_pembayaran')}}">
                <option value="0">Pilih salah satu</option>
                <option value="sudah bayar">Sudah Bayar</option>
                <option value="belum bayar">Belum Bayar</option>
            </select>
            @error('status_pembayaran')
                <small style="color:red">{{$message}}</small
            >@enderror
		</div>
    </div>

	<div class="form-group">
		<label class="control-label col-lg-2">Jenis Pembayaran</label>
		<div class="col-lg10">
			<select class="form-control" name="jenis_pembayaran" id="jenis_pembayaran" value="{{(isset($Pembayaran))?$Pembayaran->jenis_pembayaran:old('jenis_pembayaran')}}">
                <option value="0">Pilih salah satu</option>
                <option value="cash">Cash</option>
                <option value="transfer">Transfer</option>
            </select>
            @error('jenis_pembayaran')
                <small style="color:red">{{$message}}</small
            >@enderror
		</div>
    </div>

    


	<div class="form-group">
	<button type="submit">SIMPAN</button>
    </div>
    </form>
    </div>
    </div>
</div>
        </div>

        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->
@endsection
