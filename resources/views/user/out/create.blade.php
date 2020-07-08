@extends('layouts.app')

@section('content')
	<div class="card">
		<div class="card-header">
			<p>Add new Transaction out</p>
		</div>
		<div class="card-body">
			<form action="{{ route('user.trout.store') }}" method="post">
				@csrf
				<div class="form-group">
					<label for="">Title</label>
					<input type="text" name="title" class="form-control" placeholder="Title">
					<small>*this field is optional. only as a label, it's ok to fill it :)</small>
				</div>
				<div class="form-group">
					<label for="">Amount of Money</label>
					<input type="number" id="number" name="money" class="form-control" placeholder="Amount">
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