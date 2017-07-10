<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Encargos;
use Datatables;

class TablaController extends Controller
{
    

	 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tabla()
    {

    	return Datatables::eloquent(Encargos::query())->make(true);
    }


}
