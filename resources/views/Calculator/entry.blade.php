@extends('Layouts.master')

@section('content')

<h1 class="text-center">8 Star Global Farm Corporation</h1>

<br>

<h2 class="text-left">Step 1: Harvest Recovery (HR) Calculator</h2>

<form method="post" action="/HR-calculator">

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
	        <td><input type="text" class="form-control" name="Qty_Started_A" required></td>
	    	<td><input type="text" class="form-control" name="Qty_Started_B" required></td>
	    	<td><input type="text" class="form-control" name="Qty_Started_C" required></td>
	    	<td><input type="text" class="form-control" name="Qty_Started_D"></td>
	    	<td><input type="text" class="form-control" name="Qty_Started_E"></td>
	    </tr>


	    <tr>
	    	<th class="text-right" style="vertical-align: middle">Current Live Birds</th>
	        <td><input type="text" class="form-control" name="Live_Birds_A" required></td>
	    	<td><input type="text" class="form-control" name="Live_Birds_B" required></td>
	    	<td><input type="text" class="form-control" name="Live_Birds_C" required></td>
	    	<td><input type="text" class="form-control" name="Live_Birds_D"></td>
	    	<td><input type="text" class="form-control" name="Live_Birds_E"></td>
	    </tr>

	</tbody>

</table>

	    <button type="submit" class="btn btn-primary btn-block">Submit</button>

</form>

<br><br>

<h2 class="text-left">Step 2: Feeds Consumed Calculator</h1>

<form method="post" action="/Feeds-calculator">

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
	        <td><input type="text" class="form-control" name="Birds_A" required></td>
	    	<td><input type="text" class="form-control" name="Birds_B" required></td>
	    	<td><input type="text" class="form-control" name="Birds_C" required></td>
	    	<td><input type="text" class="form-control" name="Birds_D"></td>
	    	<td><input type="text" class="form-control" name="Birds_E"></td>
	    </tr>

	    <tr>
	    	<th class="text-right" style="vertical-align: middle">Age</th>
	        <td><input type="text" class="form-control" name="Age_A" required></td>
	    	<td><input type="text" class="form-control" name="Age_B" required></td>
	    	<td><input type="text" class="form-control" name="Age_C" required></td>
	    	<td><input type="text" class="form-control" name="Age_D"></td>
	    	<td><input type="text" class="form-control" name="Age_E"></td>
	    </tr>

	    <tr>
	    	<th class="text-right" style="vertical-align: middle">Average Live Weight (ALW) from San Miguel</th>
	        <td><input type="text" class="form-control" name="ALW_A" required></td>
	    	<td><input type="text" class="form-control" name="ALW_B" required></td>
	    	<td><input type="text" class="form-control" name="ALW_C" required></td>
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
	        <td><input type="text" class="form-control" name="HR_A" required></td>
	    	<td><input type="text" class="form-control" name="HR_B" required></td>
	    	<td><input type="text" class="form-control" name="HR_C" required></td>
	    	<td><input type="text" class="form-control" name="HR_D"></td>
	    	<td><input type="text" class="form-control" name="HR_E"></td>
	    </tr>

	    <tr>
	    	<th class="text-right" style="vertical-align: middle">Feeds Consumed</th>
	        <td><input type="text" class="form-control" name="Feeds_A" required></td>
	    	<td><input type="text" class="form-control" name="Feeds_B" required></td>
	    	<td><input type="text" class="form-control" name="Feeds_C" required></td>
	    	<td><input type="text" class="form-control" name="Feeds_D"></td>
	    	<td><input type="text" class="form-control" name="Feeds_E"></td>
	    </tr>

	    <tr>
	    	<th class="text-right" style="vertical-align: middle">Start FCR Range</th>
	    	<td colspan="2"><input type="text" class="form-control text-center" name="start_FCR" value="1.32" required></td>
	    	<th class="text-right" style="vertical-align: middle">End FCR Range</th>
	    	<td colspan="2"><input type="text" class="form-control text-center" name="end_FCR" value="2.00" required></td>
	</tbody>

</table>

	    <button type="submit" class="btn btn-primary btn-block">Submit</button>

</form>

<br>
<br>
<br>

@endsection