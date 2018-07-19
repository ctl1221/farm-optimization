@extends('Layouts.master')

@section('content')

<h1 class="text-center">8 Star Global Farm Corporation</h1>

<br>

<h2 class="text-center">Harvest Recovery (HR) Calculator</h2>

<form method="post" action="/ALW-table">

	{{ csrf_field() }}

<table class="table table-bordered table-sm">
	<thead class="thead-light">
	    <tr class="text-center">
	    	<th></th>
	        <th>Farm A</th>
	        <th>Farm B</th>
	        <th>Farm C</th>
	        <th>Farm D</th>
	        <th>Farm E</th>
	    </tr>
	 </thead>

	<tbody>
		 <tr>
	    	<th class="text-right" style="vertical-align: middle">Quantity Started</th>
	        <td><input type="text" class="form-control" name="Qty_Started_A"></td>
	    	<td><input type="text" class="form-control" name="Qty_Started_B"></td>
	    	<td><input type="text" class="form-control" name="Qty_Started_C"></td>
	    	<td><input type="text" class="form-control" name="Qty_Started_D"></td>
	    	<td><input type="text" class="form-control" name="Qty_Started_E"></td>
	    </tr>


	    <tr>
	    	<th class="text-right" style="vertical-align: middle">Birds Harvested</th>
	        <td><input type="text" class="form-control" name="Birds_A"></td>
	    	<td><input type="text" class="form-control" name="Birds_B"></td>
	    	<td><input type="text" class="form-control" name="Birds_C"></td>
	    	<td><input type="text" class="form-control" name="Birds_D"></td>
	    	<td><input type="text" class="form-control" name="Birds_E"></td>
	    </tr>

	</tbody>

</table>

	    <button type="submit" class="btn btn-primary btn-block">Submit</button>

</form>

<br><br>

<h2 class="text-center">Entry Table</h1>

<form method="post" action="/data-table">

	{{ csrf_field() }}

<table class="table table-bordered table-sm">
	<thead class="thead-light">
	    <tr class="text-center">
	    	<th></th>
	        <th>Farm A</th>
	        <th>Farm B</th>
	        <th>Farm C</th>
	        <th>Farm D</th>
	        <th>Farm E</th>
	    </tr>
	 </thead>

	 <tbody>
	    <tr>
	    	<th class="text-right" style="vertical-align: middle">Birds Harvested</th>
	        <td><input type="text" class="form-control" name="Birds_A"></td>
	    	<td><input type="text" class="form-control" name="Birds_B"></td>
	    	<td><input type="text" class="form-control" name="Birds_C"></td>
	    	<td><input type="text" class="form-control" name="Birds_D"></td>
	    	<td><input type="text" class="form-control" name="Birds_E"></td>
	    </tr>

	    <tr>
	    	<th class="text-right" style="vertical-align: middle">Age</th>
	        <td><input type="text" class="form-control" name="Age_A"></td>
	    	<td><input type="text" class="form-control" name="Age_B"></td>
	    	<td><input type="text" class="form-control" name="Age_C"></td>
	    	<td><input type="text" class="form-control" name="Age_D"></td>
	    	<td><input type="text" class="form-control" name="Age_E"></td>
	    </tr>

	    <tr>
	    	<th class="text-right" style="vertical-align: middle">Average Live Weight (ALW)</th>
	        <td><input type="text" class="form-control" name="ALW_A"></td>
	    	<td><input type="text" class="form-control" name="ALW_B"></td>
	    	<td><input type="text" class="form-control" name="ALW_C"></td>
	    	<td><input type="text" class="form-control" name="ALW_D"></td>
	    	<td><input type="text" class="form-control" name="ALW_E"></td>
	    </tr>

	    <tr>
	    	<th class="text-right" style="vertical-align: middle">ALW Incentive</th>
	        <td><input type="text" class="form-control" name="Actual_ALW_Income_A"></td>
	    	<td><input type="text" class="form-control" name="Actual_ALW_Income_B"></td>
	    	<td><input type="text" class="form-control" name="Actual_ALW_Income_C"></td>
	    	<td><input type="text" class="form-control" name="Actual_ALW_Income_D"></td>
	    	<td><input type="text" class="form-control" name="Actual_ALW_Income_E"></td>
	    </tr>

	    <tr>
	    	<th class="text-right" style="vertical-align: middle">Harvest Recovery (HR)</th>
	        <td><input type="text" class="form-control" name="HR_A"></td>
	    	<td><input type="text" class="form-control" name="HR_B"></td>
	    	<td><input type="text" class="form-control" name="HR_C"></td>
	    	<td><input type="text" class="form-control" name="HR_D"></td>
	    	<td><input type="text" class="form-control" name="HR_E"></td>
	    </tr>

	    <tr>
	    	<th class="text-right" style="vertical-align: middle">Feeds Consumed</th>
	        <td><input type="text" class="form-control" name="Feeds_A"></td>
	    	<td><input type="text" class="form-control" name="Feeds_B"></td>
	    	<td><input type="text" class="form-control" name="Feeds_C"></td>
	    	<td><input type="text" class="form-control" name="Feeds_D"></td>
	    	<td><input type="text" class="form-control" name="Feeds_E"></td>
	    </tr>

	    <tr>
	    	<th class="text-right" style="vertical-align: middle">Start FCR Range</th>
	    	<td colspan="2"><input type="text" class="form-control text-center" name="start_FCR" value="1.32"></td>
	    	<th class="text-right" style="vertical-align: middle">End FCR Range</th>
	    	<td colspan="2"><input type="text" class="form-control text-center" name="end_FCR" value="2.00"></td>
	</tbody>

</table>

	    <button type="submit" class="btn btn-primary btn-block">Submit</button>

</form>

@endsection