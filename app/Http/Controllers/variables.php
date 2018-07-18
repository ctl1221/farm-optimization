<?php

$Birds_A = $request->Birds_A;
$Birds_B = $request->Birds_B;
$Birds_C = $request->Birds_C;
$Age_A = $request->Age_A;
$Age_B = $request->Age_B;
$Age_C = $request->Age_C;
$ALW_A = $request->ALW_A;
$ALW_B = $request->ALW_B;
$ALW_C = $request->ALW_C;
$HR_A = $request->HR_A;
$HR_B = $request->HR_B;
$HR_C = $request->HR_C;
$Feeds_A = $request->Feeds_A;
$Feeds_B = $request->Feeds_B;
$Feeds_C = $request->Feeds_C;
$Total_actual_feeds = $Feeds_A + $Feeds_B + $Feeds_C;
$start_FCR = $request->start_FCR;
$end_FCR = $request->end_FCR;
$FCR_A = round(($Feeds_A * 50) / ($Birds_A * $ALW_A),4);
$FCR_B = round(($Feeds_B * 50) / ($Birds_B * $ALW_B),4);
$FCR_C = round(($Feeds_C * 50) / ($Birds_C * $ALW_C),4);
$BPI_A = round(($HR_A * $ALW_A * 100) / ($Age_A * $FCR_A));
$BPI_B = round(($HR_B * $ALW_B * 100) / ($Age_B * $FCR_B));
$BPI_C = round(($HR_C * $ALW_C * 100) / ($Age_C * $FCR_C));
$Actual_FCR_rate_A = DB::table('FCR_rates')
				->where('start','<=',$FCR_A)
				->where('end','>=',$FCR_A)
				->pluck('rate')->first();
$Actual_FCR_rate_B = DB::table('FCR_rates')
				->where('start','<=',$FCR_B)
				->where('end','>=',$FCR_B)
				->pluck('rate')->first();
$Actual_FCR_rate_C = DB::table('FCR_rates')
				->where('start','<=',$FCR_C)
				->where('end','>=',$FCR_C)
				->pluck('rate')->first();
$Actual_FCRi_rate_A = DB::table('FCRi_rates')
				->where('start','<=',$FCR_A)
				->where('end','>=',$FCR_A)
				->pluck('rate')->first();
$Actual_FCRi_rate_B = DB::table('FCRi_rates')
				->where('start','<=',$FCR_B)
				->where('end','>=',$FCR_B)
				->pluck('rate')->first();
$Actual_FCRi_rate_C = DB::table('FCRi_rates')
				->where('start','<=',$FCR_C)
				->where('end','>=',$FCR_C)
				->pluck('rate')->first();
$Actual_BPI_rate_A = DB::table('BPI_rates')
				->where('start','<=',$BPI_A)
				->where('end','>=',$BPI_A)
				->pluck('rate')->first();
$Actual_BPI_rate_B = DB::table('BPI_rates')
				->where('start','<=',$BPI_B)
				->where('end','>=',$BPI_B)
				->pluck('rate')->first();
$Actual_BPI_rate_C = DB::table('BPI_rates')
				->where('start','<=',$BPI_C)
				->where('end','>=',$BPI_C)
				->pluck('rate')->first();
$Income_A = $Birds_A * ($Actual_FCR_rate_A + $Actual_FCRi_rate_A + $Actual_BPI_rate_A);
$Income_B = $Birds_B * ($Actual_FCR_rate_B + $Actual_FCRi_rate_B + $Actual_BPI_rate_B);
$Income_C = $Birds_C * ($Actual_FCR_rate_C + $Actual_FCRi_rate_C + $Actual_BPI_rate_C);


?>