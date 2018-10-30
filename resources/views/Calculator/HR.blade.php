@extends('Layouts.master')

@section('content')

<h1 class="text-center">HR Calculator</h1>

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
	    	<th class="text-right">Quantity Started</th>
	    	<td class="text-center">{{ number_format($Qty_Started_A) }}</td>
	    	<td class="text-center">{{ number_format($Qty_Started_B) }}</td>
	    	<td class="text-center">{{ number_format($Qty_Started_C) }}</td>
	    	<td></td>
	    	<td></td>
	    </tr>

	    <tr>
	    	<th class="text-right">Total Quantity Started</th>
	    	<td class="text-center" colspan="5">{{ number_format($Qty_Started_A + $Qty_Started_B + $Qty_Started_C) }}</td>
	    </tr>

	    <tr>
	    	<td colspan="5">
	    </tr>

	    <tr>
	    	<th class="text-right">Current Live Birds</th>
	    	<td class="text-center">{{ number_format($Live_Birds_A) }}</td>
	    	<td class="text-center">{{ number_format($Live_Birds_B) }}</td>
	    	<td class="text-center">{{ number_format($Live_Birds_C) }}</td>
	    	<td></td>
	    	<td></td>
	    </tr>

	    <tr>
	    	<th class="text-right">Total Current Live Birds</th>
	    	<td class="text-center" colspan="5">{{ number_format($Total_Live_Birds) }}</td>
	    </tr>

	     <tr>
	    	<th class="text-right">Current HR%</th>
	    	<td class="text-center">{{ number_format($HR_A, 2) . "%" }}</td>
	    	<td class="text-center">{{ number_format($HR_B, 2) . "%" }}</td>
	    	<td class="text-center">{{ number_format($HR_C, 2) . "%" }}</td>
	    	<td></td>
	    	<td></td>
	    </tr>


	    <tr>
	    	<th class="text-right">Income</th>
	    	<td class="text-center" colspan="5">{{ 'PHP ' . number_format($Total_Original_Income) }}</td>
	    </tr>

	    <tr>
	    	<td colspan="5">
	    </tr>

	    @if($result)
	    <tr>
	    	<th class="text-right">Suggested Bird Count</th>
	    	<td class="text-center">{{ number_format($result->Computed_Birds_A) }}</td>
	    	<td class="text-center">{{ number_format($result->Computed_Birds_B) }}</td>
	    	<td class="text-center">{{ number_format($result->Computed_Birds_C) }}</td>
	    	<td></td>
	    	<td></td>
	    </tr>

	    <tr>
	    	<th class="text-right">Total Suggested Bird Count</th>
	    	<td class="text-center" colspan="5">{{ number_format($result->Computed_Total_Birds) }}</td>
	    </tr>

	    <tr>
	    	<th class="text-right">New HR%</th>
	    	<td class="text-center">{{ number_format($result->Computed_Birds_A/$Qty_Started_A * 100, 2) . "%" }}</td>
	    	<td class="text-center">{{ number_format($result->Computed_Birds_B/$Qty_Started_B * 100, 2) . "%" }}</td>
	    	<td class="text-center">{{ number_format($result->Computed_Birds_C/$Qty_Started_C * 100, 2) . "%" }}</td>
	    	<td></td>
	    	<td></td>
	    </tr>

	    <tr>
	    	<th class="text-right">Income</th>
	    	<td class="text-center" colspan="5">{{ 'PHP ' . number_format($result->Computed_HR_Income)}}</td>
	    </tr>
	    @endif

	</tbody>
</table>

@endsection
