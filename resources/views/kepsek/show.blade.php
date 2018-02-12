@extends('layouts.app')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">Show Data Kepala Sekolah 
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
        			<div class="form-group">
			  			<label class="control-label">Nama</label>	
			  			<input type="text" name="nama" class="form-control" value="{{ $kepsek->nama }}"  readonly>
			  		</div>

			  		<div class="form-group {{ $errors->has('nama_sekolah') ? ' has-error' : '' }}">
			  			<label class="control-label">Nama Sekolah</label>	
			  			<textarea name="nama_sekolah" class="form-control" rows="10" readonly>{{ $kepsek->nama_sekolah }}</textarea>
			  		</div>
			  	</div>
			</div>	
		</div>
	</div>
</div>
@endsection