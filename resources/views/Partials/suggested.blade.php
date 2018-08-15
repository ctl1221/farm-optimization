<h1 class="text-center">Suggested Ratio</h1>

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
	    	<td></td>
	    	<th colspan="5" class="text-center">Variables</th>
	    </tr>

	    <tr>
	    	<th class="text-right">Feeds Conversion Ratio (FCR)</th>
	    	<td class="text-center">{{ number_format($result->farm_A * 50 / $Birds_A / $ALW_A,4) }}</td>
	    	<td class="text-center">{{ number_format($result->farm_B * 50 / $Birds_B / $ALW_B,4) }}</td>
	    	<td class="text-center">{{ number_format($result->farm_C * 50 / $Birds_C / $ALW_C,4) }}</td>
	    	<td></td>
	    	<td></td>
	    </tr>

	    <tr>
	    	<th class="text-right">Broiler Production Index (BPI)</th>
	    	<td class="text-center">{{ number_format($HR_A * $ALW_A * $ALW_A * $Birds_A * 2 / $Age_A / $result->farm_A, 0) }}</td>
	    	<td class="text-center">{{ number_format($HR_B * $ALW_B * $ALW_B * $Birds_B * 2 / $Age_B / $result->farm_B, 0) }}</td>
	    	<td class="text-center">{{ number_format($HR_C * $ALW_C * $ALW_C * $Birds_C * 2 / $Age_C / $result->farm_C, 0) }}</td>
	    	<td></td>
	    	<td></td>
	    </tr>

	    <tr>
	    	<th class="text-right">Feeds Consumed</th>
	    	<td class="text-center">{{ number_format($result->farm_A) }}</td>
	    	<td class="text-center">{{ number_format($result->farm_B) }}</td>
	    	<td class="text-center">{{ number_format($result->farm_C) }}</td>
	    	<td></td>
	    	<td></td>
	    </tr>

	    <tr>
	    	<th class="text-right">Total Feeds Consumed</th>
	    	<td class="text-center" colspan="5">{{ number_format($result->total_feeds) }}</td>
	    </tr>
	    	
	    <tr>
	    	<td></td>
	    	<th colspan="5" class="text-center">Rates</th>
	    </tr>

	    <tr>
	    	<th class="text-right">HR Rates</th>
	    	<td class="text-center">{{ number_format($Actual_HR_rate_A,2) }}</td>
	    	<td class="text-center">{{ number_format($Actual_HR_rate_B,2) }}</td>
	    	<td class="text-center">{{ number_format($Actual_HR_rate_C,2) }}</td>
	    	<td></td>
	    	<td></td>
	    </tr>

	    <tr>
	    	<th class="text-right">FCR Rates</th>
	    	<td class="text-center">{{ number_format($result->FCR_rate_A,2) }}</td>
	    	<td class="text-center">{{ number_format($result->FCR_rate_B,2) }}</td>
	    	<td class="text-center">{{ number_format($result->FCR_rate_C,2) }}</td>
	    	<td></td>
	    	<td></td>
	    </tr>

	     <tr>
	    	<th class="text-right">FCRi Rates</th>
	    	<td class="text-center">{{ number_format($result->FCRi_rate_A,2) }}</td>
	    	<td class="text-center">{{ number_format($result->FCRi_rate_B,2) }}</td>
	    	<td class="text-center">{{ number_format($result->FCRi_rate_C,2) }}</td>
	    	<td></td>
	    	<td></td>
	    </tr>

	    <tr>
	    	<th class="text-right">BPI Rates</th>
	    	<td class="text-center">{{ number_format($result->BPI_rate_A,2) }}</td>
	    	<td class="text-center">{{ number_format($result->BPI_rate_B,2) }}</td>
	    	<td class="text-center">{{ number_format($result->BPI_rate_C,2) }}</td>
	    	<td></td>
	    	<td></td>
	    </tr>

	     <tr>
	    	<td></td>
	    	<th colspan="5" class="text-center">Income</th>
	    </tr>

	    <tr>
	    	<th class="text-right">Income</th>
	    	<td class="text-center">{{ 'PHP ' . number_format($Birds_A * ($Actual_HR_rate_A + $result->FCR_rate_A + $result->FCRi_rate_A + $result->BPI_rate_A)) }}</td>
	    	<td class="text-center">{{ 'PHP ' . number_format($Birds_B * ($Actual_HR_rate_B + $result->FCR_rate_B + $result->FCRi_rate_B + $result->BPI_rate_B)) }}</td>
	    	<td class="text-center">{{ 'PHP ' . number_format($Birds_C * ($Actual_HR_rate_C + $result->FCR_rate_C + $result->FCRi_rate_C + $result->BPI_rate_C)) }}</td>
	    	<td></td>
	    	<td></td>
	    </tr>

	    <tr>
	    	<th class="text-right">ALW Incentive</th>
	    	<td class="text-center">{{ 'PHP ' . number_format($Actual_ALW_Income_A) }}</td>
	    	<td class="text-center">{{ 'PHP ' . number_format($Actual_ALW_Income_B) }}</td>
	    	<td class="text-center">{{ 'PHP ' . number_format($Actual_ALW_Income_C) }}</td>
	    	<td></td>
	    	<td></td>
	    </tr>
	    
	    <tr>
	    	<th class="text-right">Total Income</th>
	    	<td class="text-center" colspan="5">{{ 'PHP ' . number_format($result->total_income + $Actual_ALW_Income_A + $Actual_ALW_Income_B + $Actual_ALW_Income_C) }}</td>
	    </tr>

	</tbody>

</table>