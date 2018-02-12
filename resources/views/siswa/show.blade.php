@extends('layouts.app')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">Show Data Siswa 
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
        			<div class="form-group">
			  			<label class="control-label">Nama</label>	
			  			<input type="text" name="nama" class="form-control" value="{{ $siswa->nama }}"  readonly>
			  		</div>

			  		<div class="form-group {{ $errors->has('bio') ? ' has-error' : '' }}">
			  			<label class="control-label">Bio</label>	
			  			<textarea name="bio" class="form-control" rows="10" readonly>{{ $siswa->bio }}</textarea>
			  		</div>
			  	</div>
			</div>	
		</div>
	</div>
</div>
@endsection