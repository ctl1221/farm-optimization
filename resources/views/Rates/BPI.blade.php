@extends('Layouts.master')

@section('content')

<h1 class="text-center">BPI Incentive Table</h1>

	<table class="table table-bordered table-sm">

		<thead class="thead-light">
		    <tr class="text-center">
		    	<th colspan="2">BPI Range</th>
		        <th rowspan="2" style="vertical-align: middle">Rate</th>
		    </tr>

		    <tr class="text-center">
		    	<th>Start</th>
		        <th>End</th>
		    </tr>

		</thead>

		<tbody>
			@foreach($BPI_rates as $x)
		    <tr class="text-center">
		    	<td>{{ $x->start }}</td>
		    	<td>{{ $x->end }}</td>
		    	<td>{{ number_format($x->rate,2) }}</td>
		    </tr>
		    @endforeach
		</tbody>

	</table>

@endsection