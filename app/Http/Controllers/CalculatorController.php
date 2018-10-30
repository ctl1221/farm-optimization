<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CalculatorController extends Controller
{

	public function entry()
    {
    	return view ('Calculator.entry');
    }

    public function calculateHR (Request $request)
    {

    	DB::table('birds_data')->truncate();

    	$Live_Birds_A = $request->Live_Birds_A;
		$Live_Birds_B = $request->Live_Birds_B;
		$Live_Birds_C = $request->Live_Birds_C;
		$Live_Birds_D = $request->Live_Birds_D;
		$Live_Birds_E = $request->Live_Birds_E;
		$Qty_Started_A = $request->Qty_Started_A;
		$Qty_Started_B = $request->Qty_Started_B;
		$Qty_Started_C = $request->Qty_Started_C;
		$Qty_Started_D = $request->Qty_Started_D;
		$Qty_Started_E = $request->Qty_Started_E;

		//Find HR and Total Original Income
		$HR_A = ($Live_Birds_A / $Qty_Started_A) * 100;
		$HR_B = ($Live_Birds_B / $Qty_Started_B) * 100;
		$HR_C = ($Live_Birds_C / $Qty_Started_C) * 100;

		$Live_Birds_A_Rate = DB::table('HR_rates')
								->where('start', '<=', $HR_A)
								->where('end', '>=', $HR_A)
								->pluck('rate')->first();

		$Live_Birds_A_Income = $Live_Birds_A * $Live_Birds_A_Rate;

		$Live_Birds_B_Rate = DB::table('HR_rates')
								->where('start', '<=', $HR_B)
								->where('end', '>=', $HR_B)
								->pluck('rate')->first();

		$Live_Birds_B_Income = $Live_Birds_B * $Live_Birds_B_Rate;

		$Live_Birds_C_Rate = DB::table('HR_rates')
								->where('start', '<=', $HR_C)
								->where('end', '>=', $HR_C)
								->pluck('rate')->first();

		$Live_Birds_C_Income = $Live_Birds_C * $Live_Birds_C_Rate;

		$Total_Original_Income = $Live_Birds_A_Income + $Live_Birds_B_Income + $Live_Birds_C_Income;

		//Create variables
		$yes = DB::table('HR_rates')
						->selectRaw('start + 0.05 as start2, end -0.05 as end2')
						->addSelect ('rate')
						->where('start', '>=', '96')
						->where('end', '<=', '98.5')
						->orderBy('start','asc')
						->get()->toArray();

		$m = count($yes);

		for ($x=0; $x<$m; $x++)
		{
			$Percentage_range[$x*2+0] = $yes[$x]->start2;
			$Percentage_range[$x*2+1] = $yes[$x]->end2;

			$HR_rates[$x*2+0] =$yes[$x]->rate;
			$HR_rates[$x*2+1] =$yes[$x]->rate;
		}

		$Total_Live_Birds = $Live_Birds_A + $Live_Birds_B + $Live_Birds_C;

		$n = count($Percentage_range);

		for ($i=0; $i<$n; $i++)
		{
			$Computed_Birds_A[$i] = round($Qty_Started_A * $Percentage_range[$i] / 100);
			$Computed_Birds_B[$i] = round($Qty_Started_B * $Percentage_range[$i] / 100);
			$Computed_Birds_C[$i] = round($Qty_Started_C * $Percentage_range[$i] / 100);
		}

		//Calculate for the different possible combinations
		$Optimal_Income = 0;
		for ($i=0; $i<$n; $i++)
		{
			for ($j=0; $j<$n; $j++)
			{
				for ($k=0; $k<$n; $k++)
				{
					$Computed_Total_Birds = $Computed_Birds_A[$i] + $Computed_Birds_B[$j] + $Computed_Birds_C[$k];

					$Computed_HR_Income = $Computed_Birds_A[$i] * $HR_rates[$i];
					$Computed_HR_Income += $Computed_Birds_B[$j] * $HR_rates[$j];
					$Computed_HR_Income += $Computed_Birds_C[$k] * $HR_rates[$k];

					if($Computed_HR_Income >= $Optimal_Income)
					{	
						if($Computed_HR_Income >= $Total_Original_Income)
						{
							DB::table('birds_data')
								->insert([
									'Computed_Birds_A' => $Computed_Birds_A[$i],
									'Computed_Birds_B' => $Computed_Birds_B[$j],
									'Computed_Birds_C' => $Computed_Birds_C[$k],
									'Computed_Total_Birds' => $Computed_Total_Birds,
									'Computed_HR_Income' => $Computed_HR_Income,
									'HR_rate_A' => $HR_rates[$i],
									'HR_rate_B' => $HR_rates[$j],
									'HR_rate_C' => $HR_rates[$k],
								]);
							$Optimal_Income = $Computed_HR_Income;
						}
					}
				}
			}
		}

		//dd("Hello");

		$result = DB::table('birds_data')
			->where('Computed_Total_Birds', '<=', $Total_Live_Birds)
			->orderBy('Computed_HR_Income', 'desc')
			->first();


    	return view ('Calculator.HR', compact ('result', 'Qty_Started_A', 'Qty_Started_B', 'Qty_Started_C', 'Live_Birds_A', 'Live_Birds_B', 'Live_Birds_C', 'Computed_Birds_A', 'Computed_Birds_B', 'Computed_Birds_C', 'Total_Live_Birds', 'Computed_HR_Income', 'Total_Original_Income', 'HR_A','HR_B', 'HR_C'));
    }

    public function calculateFeeds(Request $request)
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

    	$o = count($yes); 

    	for ($x=0; $x<$o; $x++)
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

    	//dd($FCR_ranges);
 
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
			$Computed_BPI_D[$i] = round(($HR_D * $ALW_D * 100) / ($Age_D * $FCR_ranges[$i]));

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
			$Computed_BPI_D_rate[$i] = DB::table('BPI_rates')
					->where('start','<=', $Computed_BPI_D[$i])
					->where('end', '>=', $Computed_BPI_D[$i])
					->pluck('rate')->first();

			$Computed_Feeds_A[$i] = floor(($FCR_ranges[$i] * $Birds_A * $ALW_A) / 50);
			$Computed_Feeds_B[$i] = floor(($FCR_ranges[$i] * $Birds_B * $ALW_B) / 50);
			$Computed_Feeds_C[$i] = floor(($FCR_ranges[$i] * $Birds_C * $ALW_C) / 50);
			$Computed_Feeds_D[$i] = floor(($FCR_ranges[$i] * $Birds_D * $ALW_D) / 50);

		}

		$Optimal_Income = 0;

		//Calculate different combinations that are more than total actual feeds
		for ($i=0; $i<$n; $i++)
		{
			for ($j=0; $j<$n; $j++)
			{
				for($k=0; $k<$n; $k++)
				{
					for($l=0; $l<$n; $l++)
					{
						$Current_Income = $Birds_A * ($Computed_BPI_A_rate[$i] + $FCR_ranges_rate[$i] + $FCRi_ranges_rate[$i] + $Actual_HR_rate_A);
						$Current_Income+= $Birds_B * ($Computed_BPI_B_rate[$j] + $FCR_ranges_rate[$j] + $FCRi_ranges_rate[$j] + $Actual_HR_rate_B);
						$Current_Income+= $Birds_C * ($Computed_BPI_C_rate[$k] + $FCR_ranges_rate[$k] + $FCRi_ranges_rate[$k] + $Actual_HR_rate_C);
						$Current_Income+= $Birds_D * ($Computed_BPI_D_rate[$l] + $FCR_ranges_rate[$l] + $FCRi_ranges_rate[$l] + $Actual_HR_rate_D);

						$Current_Total_Feeds = $Computed_Feeds_A[$i] + $Computed_Feeds_B[$j] + $Computed_Feeds_C[$k] + $Computed_Feeds_D[$l] ;

						if($Current_Total_Feeds >= $Total_actual_feeds)
						{
							if($Current_Income >= $Optimal_Income)
							{
								if(! is_null($FCRi_ranges_rate[$i]) && ! is_null($FCRi_ranges_rate[$j]) && ! is_null($FCRi_ranges_rate[$k]) && ! is_null($FCRi_ranges_rate[$l]))
								{
									if($Current_Income >= $Income_A + $Income_B + $Income_C + $Income_D)
									{
										DB::table('feeds_data')
											->insert([
					    						'farm_A' => $Computed_Feeds_A[$i],
					    						'farm_B' => $Computed_Feeds_B[$j],
					    						'farm_C' => $Computed_Feeds_C[$k],
					    						'farm_D' => $Computed_Feeds_D[$l],
					    						'total_feeds' => $Computed_Feeds_A[$i] + $Computed_Feeds_B[$j] + $Computed_Feeds_C[$k] + $Computed_Feeds_D[$l],
					    						'total_income' => $Current_Income,
					    						'BPI_rate_A' => $Computed_BPI_A_rate[$i],
					    						'BPI_rate_B' => $Computed_BPI_B_rate[$j],
					    						'BPI_rate_C' => $Computed_BPI_C_rate[$k],
					    						'BPI_rate_D' => $Computed_BPI_C_rate[$l],
					    						'FCR_rate_A' => $FCR_ranges_rate[$i],
					    						'FCR_rate_B' => $FCR_ranges_rate[$j],
					    						'FCR_rate_C' => $FCR_ranges_rate[$k],
					    						'FCR_rate_D' => $FCR_ranges_rate[$l],
					    						'FCRi_rate_A' => $FCRi_ranges_rate[$i],
					    						'FCRi_rate_B' => $FCRi_ranges_rate[$j],
					    						'FCRi_rate_C' => $FCRi_ranges_rate[$k],
					    						'FCRi_rate_D' => $FCRi_ranges_rate[$l],
					    						'FCR_A' => $FCR_ranges[$i],
					    						'FCR_B' => $FCR_ranges[$j],
					    						'FCR_C' => $FCR_ranges[$k],
					    						'FCR_D' => $FCR_ranges[$l],
					    						'BPI_A' => $Computed_BPI_A[$i],
					    						'BPI_B' => $Computed_BPI_B[$j],
					    						'BPI_C' => $Computed_BPI_C[$k],
					    						'BPI_D' => $Computed_BPI_C[$l],
					    						'HR_rate_A' =>$Actual_HR_rate_A,
					    						'HR_rate_B' =>$Actual_HR_rate_B,
					    						'HR_rate_C' =>$Actual_HR_rate_C,
					    						'HR_rate_D' =>$Actual_HR_rate_D
					    					]);
				    					$Optimal_Income = $Current_Income;
				    				}
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
		}

		$result = DB::table('feeds_data')
			->where('total_feeds',$Total_actual_feeds)
			->orderBy('total_income', 'desc')
			->first();

		if(!$result)
		{
			$result = DB::table('feeds_data')
				->where('total_feeds','>=',$Total_actual_feeds)
				->orderBy('total_income', 'desc')
				->first();
		}
		
    	return view ('Calculator.Feeds', compact ('result', 'Birds_A', 'Birds_B', 'Birds_C', 'Birds_D', 'Age_A', 'Age_B', 'Age_C', 'Age_D', 'ALW_A', 'ALW_B', 'ALW_C', 'ALW_D', 'HR_A', 'HR_B', 'HR_C', 'HR_D', 'Feeds_A', 'Feeds_B', 'Feeds_C', 'Feeds_D', 'FCR_A', 'FCR_B', 'FCR_C', 'FCR_D', 'BPI_A', 'BPI_B', 'BPI_C', 'BPI_D', 'Actual_FCR_rate_A', 'Actual_FCR_rate_B', 'Actual_FCR_rate_C', 'Actual_FCR_rate_D', 'Actual_BPI_rate_A', 'Actual_BPI_rate_B', 'Actual_BPI_rate_C', 'Actual_BPI_rate_D', 'Income_A', 'Income_B', 'Income_C', 'Income_D', 'Actual_FCRi_rate_A', 'Actual_FCRi_rate_B', 'Actual_FCRi_rate_C', 'Actual_FCRi_rate_D', 'Actual_ALW_Income_A', 'Actual_ALW_Income_B', 'Actual_ALW_Income_C', 'Actual_ALW_Income_D', 'Actual_HR_rate_A', 'Actual_HR_rate_B', 'Actual_HR_rate_C' , 'Actual_HR_rate_D'));
    }
}
