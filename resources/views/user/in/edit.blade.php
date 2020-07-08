@extends('layouts.app')

@section('content')
	<div class="card">
		<div class="card-header">
			<p>Edit a Transaction In</p>
		</div>
		<div class="card-body">
			<form action="{{ route('user.trin.update', $goshujin_sama->id) }}" method="post">
				@csrf
				@method('PUT')
				<div class="form-group">
					<label for="">Title</label>
					<input type="text" name="title" class="form-control" placeholder="Title" value="{{ $goshujin_sama->title }}">
					<small>*this field is optional. only as a label, it's ok to fill it :)</small>
				</div>
				<div class="form-group">
					<label for="">Amount of Money</label>
					<input type="number" id="number" name="money" class="form-control" placeholder="Amount" value="{{ $goshujin_sama->money }}">
					<small>*IDR.</small>
				</div>
				<input type="submit" class="btn btn-primary">
			</form>
		</div>
	</div>
@endsection

@section('js')
	<script>
		document.querySelector("#number").addEventListener("keypress", function (evt) {
		    if (evt.which != 8 && evt.which != 0 && evt.which < 48 || evt.which > 57)
		    {
		        evt.preventDefault();
		    }
		});
	</script>
@endsection