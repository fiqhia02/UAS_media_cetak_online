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
          <div class="col-lg-12">
      <a href="{{route('Pembayaran.create')}}">Tambah Data</a>
      <table class="table table-bordered">
      <thead>
      <tr>
        <th>No</th>
        <th>Id Dokumen</th>
        <th>Id Petugas</th>
        <th>Status Pembayaran</th>
        <th>Jenis Pembayaran</th>
        <th>Aksi</th></tr>
      </thead>
      <tbody>
        @foreach ($Pembayaran as $in=>$val)
        <tr>
          <td>{{($in+1)}}</td>
          <td>{{$val->id_dokumen}}</td>
          <td>{{$val->id_petugas}}</td>
          <td>{{$val->status_pembayaran}}</td>
          <td>{{$val->jenis_pembayaran}}</td>
          <td>

              <a href="{{route('Pembayaran.edit',$val->id_pembayaran)}}">Update</a>
          <form action="{{route('Pembayaran.destroy', $val->id_pembayaran)}}" method="POST">
            @csrf

            <button type="submit">Delete</button>
          </form></td>
        </tr>


        @endforeach
      </tbody>
      </table>
      {{$Pembayaran->links()}}
      </div>
        </div>

        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->
@endsection
