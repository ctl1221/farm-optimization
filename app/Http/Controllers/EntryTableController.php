<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EntryTableController extends Controller
{
    public function entry()
    {
    	return view ('EntryTable.entry');
    }

    public function show(Request $request)
    {
    	//Include php partials
    	include 'variables.php';

    	//Erase the table
    	DB::table('feeds_data')->truncate();

    	//Narrow down range based on min and max FCR
    	$yes = DB::table('FCR_rates')
					->selectRaw('end - 0.0001 as end2, start + 0.0049 as mid, start + 0.0001 as start2' )
					->addSelect('rate')
					->where('start', '>=', $start_FCR)
					->where('end', '<=', $end_FCR)
					->orderBy('start', 'desc')
					->get()->toArray();

    	$n = count($yes); 

    	for ($x=0; $x<$n; $x++)
    	{
    		$FCR_ranges[$x] = $yes[$x]->end2;
    		//$FCR_ranges[$x*3] = $yes[$x]->end2;
    		//$FCR_ranges[$x*3+1] = $yes[$x]->mid;
    		//$FCR_ranges[$x*3+2] = $yes[$x]->start2;

    		$FCR_ranges_rate[$x] = $yes[$x]->rate;
			//$FCR_ranges_rate[$x*3] = $yes[$x]->rate;
    		//$FCR_ranges_rate[$x*3+1] = $yes[$x]->rate;
    		//$FCR_ranges_rate[$x*3+2] = $yes[$x]->rate;

    	}
    	
    	$n = count($FCR_ranges);
    	
    	//Create Array Variables
    	for ($i=0; $i<$n; $i++)
		{
			$FCRi_ranges_rate[$i] = DB::table('FCRi_rates')
    								->where('start','<=',$FCR_ranges[$i])
									->where('end','>=',$FCR_ranges[$i])
									->orderBy('rate','desc')
									->pluck('rate')->first();

			$Computed_BPI_A[$i] = round(($HR_A * $ALW_A * 100) / ($Age_A * $FCR_ranges[$i]));
			$Computed_BPI_B[$i] = round(($HR_B * $ALW_B * 100) / ($Age_B * $FCR_ranges[$i]));
			$Computed_BPI_C[$i] = round(($HR_C * $ALW_C * 100) / ($Age_C * $FCR_ranges[$i]));

			$Computed_BPI_A_rate[$i] = DB::table('BPI_rates')
					->where('start','<=', $Computed_BPI_A[$i])
					->where('end', '>=', $Computed_BPI_A[$i])
					->pluck('rate')->first();
			$Computed_BPI_B_rate[$i] = DB::table('BPI_rates')
					->where('start','<=', $Computed_BPI_B[$i])
					->where('end', '>=', $Computed_BPI_B[$i])
					->pluck('rate')->first();
			$Computed_BPI_C_rate[$i] = DB::table('BPI_rates')
					->where('start','<=', $Computed_BPI_C[$i])
					->where('end', '>=', $Computed_BPI_C[$i])
					->pluck('rate')->first();

			$Computed_Feeds_A[$i] = floor(($FCR_ranges[$i] * $Birds_A * $ALW_A) / 50);
			$Computed_Feeds_B[$i] = floor(($FCR_ranges[$i] * $Birds_B * $ALW_B) / 50);
			$Computed_Feeds_C[$i] = floor(($FCR_ranges[$i] * $Birds_C * $ALW_C) / 50);

		}

		$Optimal_Income = 0;
		//Calculate different combinations that are more than total actual feeds
		for ($i=0; $i<$n; $i++)
		{
			for ($j=0; $j<$n; $j++)
			{
				for($k=0; $k<$n; $k++)
				{
					$Current_Income = $Birds_A * ($Computed_BPI_A_rate[$i] + $FCR_ranges_rate[$i] + $FCRi_ranges_rate[$i] + $Actual_HR_rate_A);
					$Current_Income+= $Birds_B * ($Computed_BPI_B_rate[$j] + $FCR_ranges_rate[$j] + $FCRi_ranges_rate[$j] + $Actual_HR_rate_B);
					$Current_Income+= $Birds_C * ($Computed_BPI_C_rate[$k] + $FCR_ranges_rate[$k] + $FCRi_ranges_rate[$k] + $Actual_HR_rate_C);

					$Current_Total_Feeds = $Computed_Feeds_A[$i] + $Computed_Feeds_B[$j] + $Computed_Feeds_C[$k];

					if($Current_Total_Feeds >= $Total_actual_feeds)
					{
						if($Current_Income >= $Optimal_Income)
						{
							if(! is_null($FCRi_ranges_rate[$i]) && ! is_null($FCRi_ranges_rate[$j]) && ! is_null($FCRi_ranges_rate[$k]))
							{
								DB::table('feeds_data')
									->insert([
			    						'farm_A' => $Computed_Feeds_A[$i],
			    						'farm_B' => $Computed_Feeds_B[$j],
			    						'farm_C' => $Computed_Feeds_C[$k],
			    						'total_feeds' => $Computed_Feeds_A[$i] + $Computed_Feeds_B[$j] + $Computed_Feeds_C[$k],
			    						'total_income' => $Current_Income,
			    						'BPI_rate_A' => $Computed_BPI_A_rate[$i],
			    						'BPI_rate_B' => $Computed_BPI_B_rate[$j],
			    						'BPI_rate_C' => $Computed_BPI_C_rate[$k],
			    						'FCR_rate_A' => $FCR_ranges_rate[$i],
			    						'FCR_rate_B' => $FCR_ranges_rate[$j],
			    						'FCR_rate_C' => $FCR_ranges_rate[$k],
			    						'FCRi_rate_A' => $FCRi_ranges_rate[$i],
			    						'FCRi_rate_B' => $FCRi_ranges_rate[$j],
			    						'FCRi_rate_C' => $FCRi_ranges_rate[$k],
			    						'FCR_A' => $FCR_ranges[$i],
			    						'FCR_B' => $FCR_ranges[$j],
			    						'FCR_C' => $FCR_ranges[$k],
			    						'BPI_A' => $Computed_BPI_A[$i],
			    						'BPI_B' => $Computed_BPI_B[$j],
			    						'BPI_C' => $Computed_BPI_C[$k],
			    						'HR_rate_A' =>$Actual_HR_rate_A,
			    						'HR_rate_B' =>$Actual_HR_rate_B,
			    						'HR_rate_C' =>$Actual_HR_rate_C,
			    					]);

		    					$Optimal_Income = $Current_Income;
	    					}
	    				}
					}
					else 
					{ 
						break;
					}
				}
			}
		}

		$result = DB::table('feeds_data')
			->where('total_feeds',$Total_actual_feeds)
			->orderBy('total_income', 'desc')
			->first();

		if(!count($result))
		{
			$result = DB::table('feeds_data')
				->where('total_feeds','>=',$Total_actual_feeds)
				->orderBy('total_income', 'desc')
				->first();
		}
		
    	return view ('EntryTable.show', compact ('result', 'Birds_A', 'Birds_B', 'Birds_C', 'Age_A', 'Age_B', 'Age_C', 'ALW_A', 'ALW_B', 'ALW_C', 'HR_A', 'HR_B', 'HR_C', 'Feeds_A', 'Feeds_B', 'Feeds_C', 'FCR_A', 'FCR_B', 'FCR_C', 'BPI_A', 'BPI_B', 'BPI_C', 'Actual_FCR_rate_A', 'Actual_FCR_rate_B', 'Actual_FCR_rate_C', 'Actual_BPI_rate_A', 'Actual_BPI_rate_B', 'Actual_BPI_rate_C', 'Income_A', 'Income_B', 'Income_C', 'Actual_FCRi_rate_A', 'Actual_FCRi_rate_B', 'Actual_FCRi_rate_C', 'Actual_ALW_Income_A', 'Actual_ALW_Income_B', 'Actual_ALW_Income_C', 'Actual_HR_rate_A', 'Actual_HR_rate_B', 'Actual_HR_rate_C'));
    }

}