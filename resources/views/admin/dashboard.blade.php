@extends('layouts.app')

@section('content')
	<div class="row">
		<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12">
			<div class="card">
				<div class="card-body">
					All Balance : Rp. {{ $allBalance }}
				</div>
			</div>
		</div>
		<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12">
			<div class="card">
				<div class="card-body">
					Total Transaction In : Rp. {{ $allTrin }}
				</div>
			</div>
		</div>
		<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12">
			<div class="card">
				<div class="card-body">
					Total Transaction Out : Rp. {{ $allTrout }}
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
								<th>No</th>
								<th>Username</th>
								<th>Balance</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@php
								$no = 1;
							@endphp
							@foreach($users as $user)
							<tr>
								<td>{{ $no }}</td>
								<td>{{ $user->username }}</td>
								<td>{{ $user->balance }}</td>
								<td>
									<a href="{{ route('admin.detail', $user->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-search" aria-hidden="true"></i></a>
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
			text-align: center;
		}
	</style>
@endsection