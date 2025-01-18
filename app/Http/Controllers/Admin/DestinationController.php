<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Destination;
use App\Http\Requests\DestinationRequest;
use App\Http\Requests\DestinationUpdateRequest;

class DestinationController extends Controller
{
    public function index(){ 
        $destinations = Destination::orderBy('id','DESC')->paginate(15);
        return view('admin.destinations.index', compact('destinations'));
       }
       /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $destinations =Destination::all();
        return view('admin.destinations.create',compact ('destinations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DestinationRequest $request)
    {
    //      dd($request);
       $destinations=Destination::create($request->all());
       {
        
        //file upload
        $file_name = time().'.'.$request->image->extension();//12341234.png

        $upload = $request->image->move(public_path('images/destinations/'),$file_name); //upload to folder
        if($upload){
            $destinations->image = "/images/destinations/".$file_name; //upload to database
        }
       $destinations->save();
       return redirect()->route('backend.destinations.index');
        }
    }
     /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $destination=Destination::find($id);
        $destinations = Destination::all();
        return view('admin.destinations.edit',compact('destination','destinations'));
   
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DestinationUpdateRequest $request, string $id)
    {
        // echo $id;
        // dd($request);
        $destination=Destination::find($id);
        $destination->update($request->all());
        if($request->hasFile('image')){
        //file upload
        $file_name = time().'.'.$request->image->extension();//12341234.png

        $upload = $request->image->move(public_path('images/destinations/'),$file_name); //upload to folder
        if($upload){
            $destiantion->image = "/images/destinations/".$file_name; //upload to database
        }
        }else{
            $destination->image=$request->old_image;
        }


        $destination->save();
        return redirect()->route('backend.destinations.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // echo "<h1>$id<h1>";
        $destination = Destination::find($id);
        $destination->delete();
        return redirect()->route('backend.destinations.index');
    }
}
