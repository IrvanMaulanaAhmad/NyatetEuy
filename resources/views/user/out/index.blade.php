@extends('layouts.app')

@section('content')
	<div class="row">
		<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12">
			<div class="card">
				<div class="card-body">
					<p>Balance : Rp. {{ $user->balance }}</p>
				</div>
			</div>
		</div>
		<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12">
			<div class="card">
				<div class="card-body">
					<p>Total Transaction Out : {{ $trtotal }} time(s)</p>
				</div>
			</div>
		</div>
		<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12">
			<div class="card">
				<div class="card-body">
					<p>Total : Rp. {{ $trmoney }}</p>
				</div>
			</div>
		</div>
	</div>

	<br><br>

	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-body">
					<table class="table table-hover">
						<thead>
							<tr>
								<th style="text-align: right" colspan="5"><a href="{{ route('user.trout.create') }}" class="btn btn-primary"> Add Transaction Out</a></th>
							</tr>
							<tr>
								<th>No</th>
								<th>Title</th>
								<th>Amount of Money</th>
								<th>date</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@php
								$no = 1;
							@endphp
							@foreach($trouts as $trout)
							@php
								$time = strtotime($trout->datetime);
							@endphp
								<tr>
									<td>{{ $no }}</td>
									<td>{{ $trout->title == null ? "no title" : $trout->title }}</td>
									<td>{{ $trout->money }}</td>
									<td>{{ date('l d-M-Y H:i:s', $time) }}</td>
									<td>
										<div class="btn-group">
											<a href="{{ route('user.trout.edit', $trout->id) }}" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Edit" id="edit" aria-hidden="true">
												<i class="fa fa-pencil"></i>
											</a>
											<form action="{{ route('user.trout.delete', $trout->id) }}" method="post">
												@csrf
												@method('delete')
												<button type="submit" class="btn btn-sm btn-danger" value="" data-toggle='tooltip' data-placement='top' title='Delete' id='delete' aria-hidden='true'>
													<i class='fa fa-trash'></i>
												</button>
											</form>
										</div>
									</td>
								</tr>
							@php
								$no++;
							@endphp
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('css')
	<style>
		th, td{
			text-align: center
		}
	</style>
@endsection

@section('js')
	<script>
		$('#edit').tooltip({ boundary: 'window' })
		$('#delete').tooltip({ boundary: 'window' })
	</script>
@endsection