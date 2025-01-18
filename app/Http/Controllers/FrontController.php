<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Destination;

class FrontController extends Controller
{
    public function travel()
   {
      $destinations=Destination::all();
     // var_dump($destinations);
    return view('front.travel',compact('destinations'));
   } 

   
   public function TravelDetails()
   {
      // echo $id;
     $destination = Destination::all();
      var_dump($destination);
    return view('front.traveldetails');
   }

}
