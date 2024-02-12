<?php

namespace App\Http\Controllers;

use App\Models\Travel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TravelController extends Controller
{
    public function travelAuthUsers()
    {
        return Travel::with('flight_travel')->where('user_id', Auth::user()->id, '=')->get();
    }

    public function showUserFlightsByAirLineCountry($country){
        $userId = auth()->id();
        $flights = DB::table('travel')
            ->join('flights', 'travel.flight_id', '=', 'flights.flight_id')
            ->join('airlines', 'flights.airline_id', '=', 'airlines.airline_id')
            ->where('airlines.country', $country)
            ->where('travel.user_id', $userId)
            ->select('flights.*')
            ->get();

        return $flights;
    }
}
