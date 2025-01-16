<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{

  public function getAllCities()
  {
      $cities = City::all(); 
      return response()->json($cities);
  }
   

    public function searchCities(Request $request)
    {
        $query = $request->query('query');
        $cities = City::where('name', 'LIKE', "%{$query}%")->get(); 
        return response()->json($cities);
    }

}
