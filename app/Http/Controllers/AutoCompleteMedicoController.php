<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuarios;

class AutoCompleteMedicoController extends Controller
{
    public function index()
    {
        return view('autocomplete');
    }

    public function autocompleteSearch(Request $request)
    {
        $query = $request->get('query');
        $filterResult = Usuarios::where('numero_documento', 'like', '%'.$query.'%')->get();

        return response()->json($filterResult);
    }
}
