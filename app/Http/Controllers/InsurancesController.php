<?php

namespace App\Http\Controllers;

use App\Models\InsuranceModel;
use Illuminate\Http\Request;

class InsurancesController extends Controller
{
    public function list(){
        return InsuranceModel::where('state',1)->get();
    }
}
