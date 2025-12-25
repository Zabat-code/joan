<?php

namespace App\Http\Controllers;

use App\Models\DocumentHeaderModel;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    private $MenuDynamic;

    public function __construct()
    {
        $this->MenuDynamic = DocumentHeaderModel::all();
    }
    public function index()
    {
        return view('dashboard.index', ['menuDynamic' => $this->MenuDynamic]);
    }
}
