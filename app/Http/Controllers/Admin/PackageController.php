<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\Destination;
use App\Http\Requests\PackageRequest;
use App\Http\Requests\PackageUpdateRequest;

class PackageController extends Controller
{
  /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $packages = Package::orderBy('id','DESC')->paginate(15);
        return view('admin.packages.index', compact('packages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    { 
        $destinations =Destination::all();
        return view('admin.packages.create',compact ('destinations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PackageRequest $request)
    {
    //      dd($request);
       $packages=Package::create($request->all());
       {
        
        //file upload
        $file_name = time().'.'.$request->image->extension();//12341234.png

        $upload = $request->image->move(public_path('images/packages/'),$file_name); //upload to folder
        if($upload){
            $packages->image = "/images/packages/".$file_name; //upload to database
        }
       $packages->save();
       return redirect()->route('backend.packages.index');
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
        $package=Package::find($id);
        $destinations = Destination::all();
        return view('admin.packages.edit',compact('package','destinations'));
   
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(PackageUpdateRequest $request, int $id)
    {
        // echo $id;
         dd($request);
        $package=Package::find($id);
        $package->update($request->all());

        if($request->hasFile('image')){
        //file upload
        $file_name = time().'.'.$request->image->extension();//12341234.png

        $upload = $request->image->move(public_path('images/packages/'),$file_name); //upload to folder
        if($upload){
            $package->image = "/images/packages/".$file_name; //upload to database
        }
        }else{
            $package->image=$request->old_image;
        }


        $package->save();
        return redirect()->route('backend.packages.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //echo "<h1>$id<h1>";
        $package = Package::find($id);
        $package->delete();
        return redirect()->route('backend.packages.index');
    }
}
