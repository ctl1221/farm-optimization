<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RatesController extends Controller
{
    public function BPI()
    {

    	$BPI_rates = DB::table('BPI_rates')
    				->get();

    	return view ('Rates.BPI', compact ('BPI_rates'));
    }

    public function FCR()
    {

    	$FCR_rates = DB::table('FCR_rates')
    				->get();

    	return view ('Rates.FCR', compact ('FCR_rates'));
    }

    public function FCRi()
    {

    	$FCRi_rates = DB::table('FCRi_rates')
    				->get();

    	return view ('Rates.FCRi', compact ('FCRi_rates'));
    }

    public function HR()
    {

    	$HR_rates = DB::table('HR_rates')
    				->get();

    	return view ('Rates.HR', compact ('HR_rates'));
    }

     public function ALW()
    {

    	$ALW_rates = DB::table('ALW_rates')
    				->get();

    	return view ('Rates.ALW', compact ('ALW_rates'));
    }


}
