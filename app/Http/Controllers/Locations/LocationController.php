<?php

namespace App\Http\Controllers\Locations;

use App\Models\Location;
use App\Models\TaxiLocation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LocationController extends Controller
{
  public function create(Request $request)
  {
    $this->validate($request, [
      'name' => 'required|string|max:255',
      'address' => 'required|string|max:255',
      'longitude' => 'required|numeric',
      'latitude' => 'required|numeric'
    ]);
    
    Location::create([
      'name' => $request->name,
      'address' => $request->address,
      'latitude' => $request->latitude,
      'longitude' => $request->longitude,
    ]);

  }

  public function travelFromTo(Request $request)
  {
    $from = Location::find($request->input('from'));
    $to = Location::find($request->input('to'));
    $distance = $this->distance($request->input('from'), $request->input('to'));  
    $price = $distance  * 60;
 
  $taxi_location = TaxiLocation::all();

  $distances = array();
  foreach ($taxi_location as $tl) {
    $dist = $this->distance($request->input('from'), $tl->location->id);
    array_push($distances, ['taxi' => $tl,'range' => $dist]);
  }

 $closest_taxi = collect($distances)->where('range', collect($distances)->min('range'))->first();


    //$taxis = TaxiLocation::where('location_id', $from)->get();

    $ride_info = collect([
      'from' => $from->name,
      'from_id' => $from->id,
      'to' => $to->name,
      'to_id' => $to->id,
      'distance' => ceil($distance),
      'price' => ceil($price),
      'locations' => Location::all(),
      'taxi' => $closest_taxi,
    ]);

    
    return redirect('student-home#services')->with('ride_info', $ride_info);
    return view('students.student.dashboard', [
      'from' => $from->name,
      'from_id' => $from->id,
      'to' => $to->name,
      'to_id' => $to->id,
      'distance' => ceil($distance),
      'price' => ceil($price),
      'locations' => Location::all(),
      'taxi' => $closest_taxi,
    ]);
  }

  private function distance($from, $to)
  {
    $from = Location::find($from);
    $to = Location::find($to);
    $lat1 = $from->latitude;
    $lon1 = $from->longitude;
    $lat2 = $to->latitude;
    $lon2 = $to->longitude;
    $unit = "K";
    if (($lat1 == $lat2) && ($lon1 == $lon2)) {
        return 0;
      }
      else {
        $theta = $lon1 - $lon2;
        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $miles = $dist * 60 * 1.1515;
        $unit = strtoupper($unit);
    
        if ($unit == "K") {
          return ($miles * 1.609344);
        } else if ($unit == "N") {
          return ($miles * 0.8684);
        } else {
          return $miles;
        }
      }
  }
}
