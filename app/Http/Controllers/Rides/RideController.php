<?php

namespace App\Http\Controllers\Rides;

use Carbon\Carbon;
use App\Models\Ride;
use App\Models\TaxiLocation;
use Illuminate\Http\Request;
use App\Models\RideConfirmation;
use App\Http\Controllers\Controller;

class RideController extends Controller
{
    public function create(Request $request)
    {
        $ride = auth()->user()->rides()->create([
        'from' => $request->from,
        'to' => $request->to,
        'price' => $request->price,
        'distance' => $request->distance,
        ]);

        RideConfirmation::create([
            'ride_id' => $ride->id,
            'taxi_id' => $request->taxi,
        ]);

        return redirect('student-home')->with('status', 'Profile updated!');
    }
    public function accept_ride(Request $request)
    {

        $this->validate($request, [
            'ride' => 'required',
          ]);
        $ride_confirmation = RideConfirmation::where('ride_id' ,$request->ride)->latest()->first();


        $ride_confirmation->update([
            'confirmation' => TRUE
        ]);

        

        $ride = Ride::find($request->ride);

          //dd($ride, auth('taxi')->user()->id);

        $ride->update([
            'taxi_id' => auth('taxi')->user()->id
        ]);
        $taxi_location = TaxiLocation::where('taxi_id', auth('taxi')->user()->id);
        $taxi_location->delete();
        return redirect('taxi-home')->with('success', "Ride Accepted"); 
    }

    public function complete_ride(Request $request)
    {

        $this->validate($request, [
            'ride' => 'required',
          ]);
          $ride_confirmation = RideConfirmation::where('ride_id' ,$request->ride)->latest()->first();
        
          $ride = Ride::find($request->ride);

          //dd($ride, auth('taxi')->user()->id);

          $ride->update([
            'completed' => Carbon::now(),
        ]);

        $ride_confirmation->delete();
        
        TaxiLocation::create([
            'taxi_id' => auth('taxi')->user()->id,
            'location_id' => $ride->to,
        ]);
        
        return redirect('taxi-home')->with('success', "Ride Completed");   
    }
}
