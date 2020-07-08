@extends('layouts.app')

@section('content')
	<div class="row">
		<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12">
			<div class="card">
				<div class="card-body">
					<p>{{ $user->username }} Balance : {{ $user->balance }}</p>
				</div>
			</div>
		</div>
		<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12">
			<div class="card">
				<div class="card-body">
					<p>Transaction In Total : {{ $trinTotal }}</p>
				</div>
			</div>
		</div>
		<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12">
			<div class="card">
				<div class="card-body">
					<p>Transaction Out Total : {{ $troutTotal }}</p>
				</div>
			</div>
		</div>
	</div>

	<br><br>

	<div class="row">
		<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
			<div class="card">
				<div class="card-body">
					<table class="table table-hover">
						<thead>
							<tr>
								<th colspan="4">Transaction In</th>
							</tr>
							<tr>
								<th>No</th>
								<th>Title</th>
								<th>Amount of Money</th>
								<th>date</th>
							</tr>
						</thead>
						<tbody>
							@php
								$no = 1;
							@endphp
							@foreach($trins as $trin)
							@php
								$time = strtotime($trin->datetime);
							@endphp
								<tr>
									<td>{{ $no }}</td>
									<td>{{ $trin->title == null ? "no title" : $trin->title }}</td>
									<td>{{ $trin->money }}</td>
									<td>{{ date('l d-M-Y H:i:s', $time) }}</td>
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
		<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
			<div class="card">
				<div class="card-body">
					<table class="table table-hover">
						<thead>
							<tr>
								<th colspan="4">Transaction Out</th>
							</tr>
							<tr>
								<th>No</th>
								<th>Title</th>
								<th>Amount of Money</th>
								<th>date</th>
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