<h1 class="text-center">Original Data</h1>

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
	    	<th class="text-right">Birds Harvested</th>
	    	<td class="text-center">{{ number_format($Birds_A) }}</td>
	    	<td class="text-center">{{ number_format($Birds_B) }}</td>
	    	<td class="text-center">{{ number_format($Birds_C) }}</td>
	    	<td></td>
	    	<td></td>
	    </tr>

	    <tr>
	    	<th class="text-right">Age</th>
	    	<td class="text-center">{{ $Age_A }}</td>
	    	<td class="text-center">{{ $Age_B }}</td>
	    	<td class="text-center">{{ $Age_C }}</td>
	    	<td></td>
	    	<td></td>
	    </tr>

	    <tr>
	    	<th class="text-right">Average Live Weight (ALW)</th>
	    	<td class="text-center">{{ $ALW_A }}</td>
	    	<td class="text-center">{{ $ALW_B }}</td>
	    	<td class="text-center">{{ $ALW_C }}</td>
	    	<td></td>
	    	<td></td>
	    </tr>

	    <tr>
	    	<th class="text-right">Harvest Recovery (HR)</th>
	    	<td class="text-center">{{ $HR_A }}</td>
	    	<td class="text-center">{{ $HR_B }}</td>
	    	<td class="text-center">{{ $HR_C }}</td>
	    	<td></td>
	    	<td></td>
	    </tr>

	    <tr>
	    	<td></td>
	    	<th colspan="5" class="text-center">Variables</th>
	    </tr>

	    <tr>
	    	<th class="text-right">Feeds Conversion Ratio (FCR)</th>
	    	<td class="text-center">{{ $FCR_A }}</td>
	    	<td class="text-center">{{ $FCR_B }}</td>
	    	<td class="text-center">{{ $FCR_C }}</td>
	    	<td></td>
	    	<td></td>
	    </tr>

	    <tr>
	    	<th class="text-right">Broiler Production Index (BPI)</th>
	    	<td class="text-center">{{ $BPI_A }}</td>
	    	<td class="text-center">{{ $BPI_B }}</td>
	    	<td class="text-center">{{ $BPI_C }}</td>
	    	<td></td>
	    	<td></td>
	    </tr>

	    <tr>
	    	<th class="text-right">Feeds Consumed</th>
	    	<td class="text-center">{{ $Feeds_A }}</td>
	    	<td class="text-center">{{ $Feeds_B }}</td>
	    	<td class="text-center">{{ $Feeds_C }}</td>
	    	<td></td>
	    	<td></td>
	    </tr>

	    <tr>
	    	<th class="text-right">Total Feeds Consumed</th>
	    	<td class="text-center" colspan="5">{{ number_format($Feeds_A + $Feeds_B + $Feeds_C) }}</td>
	    </tr>
	    	
	    <tr>
	    	<td></td>
	    	<th colspan="5" class="text-center">Rates</th>
	    </tr>

	    <tr>
	    	<th class="text-right">FCR Rates</th>
	    	<td class="text-center">{{ $Actual_FCR_rate_A }}</td>
	    	<td class="text-center">{{ $Actual_FCR_rate_B }}</td>
	    	<td class="text-center">{{ $Actual_FCR_rate_C }}</td>
	    	<td></td>
	    	<td></td>
	    </tr>

	     <tr>
	    	<th class="text-right">FCRi Rates</th>
	    	<td class="text-center">{{ number_format($Actual_FCRi_rate_A,2) }}</td>
	    	<td class="text-center">{{ number_format($Actual_FCRi_rate_B,2) }}</td>
	    	<td class="text-center">{{ number_format($Actual_FCRi_rate_C,2) }}</td>
	    	<td></td>
	    	<td></td>
	    </tr>

	    <tr>
	    	<th class="text-right">BPI Rates</th>
	    	<td class="text-center">{{ number_format($Actual_BPI_rate_A,2) }}</td>
	    	<td class="text-center">{{ number_format($Actual_BPI_rate_B,2) }}</td>
	    	<td class="text-center">{{ number_format($Actual_BPI_rate_C,2) }}</td>
	    	<td></td>
	    	<td></td>
	    </tr>

	    <tr>
	    	<th class="text-right">Income</th>
	    	<td class="text-center">{{ 'PHP ' . number_format($Income_A) }}</td>
	    	<td class="text-center">{{ 'PHP ' . number_format($Income_B) }}</td>
	    	<td class="text-center">{{ 'PHP ' . number_format($Income_C) }}</td>
	    	<td></td>
	    	<td></td>
	    </tr>

	    <tr>
	    	<th class="text-right">Total Income</th>
	    	<td class="text-center" colspan="5">{{ 'PHP ' . number_format($Income_A + $Income_B + $Income_C) }}</td>
	    </tr>
	</tbody>
</table>