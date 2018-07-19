<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculatorController extends Controller
{
    public function calculate()
    {


    	return view ('Calculator.HR', compact (''));
    }
}
