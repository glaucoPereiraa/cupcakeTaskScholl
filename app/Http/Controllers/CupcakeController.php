<?php

namespace App\Http\Controllers;

use App\Models\Cupcake;

class CupcakeController extends Controller
{
    public function index()
    {
        $cupcakes = Cupcake::paginate(6);

        return view('cupcakes.index', compact('cupcakes'));
    }

    public function show(Cupcake $cupcake)
    {
        return view('cupcakes.show', compact('cupcake'));
    }
}
