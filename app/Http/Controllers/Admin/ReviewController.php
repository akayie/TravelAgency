<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\User;
use App\Http\Requests\ReviewRequest;
use App\Http\Requests\ReviewUpdateRequest;

class ReviewController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reviews = Review::orderBy('id','DESC')->paginate(15);
        return view('admin.reviews.index', compact('reviews'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    { 
        $users =User::all();
        return view('admin.reviews.create',compact ('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ReviewRequest $request)
    {
    //      dd($request);
       $reviews=Review::create($request->all());
       {
        
        //file upload
        $file_name = time().'.'.$request->image->extension();//12341234.png

        $upload = $request->image->move(public_path('images/reviews/'),$file_name); //upload to folder
        if($upload){
            $reviews->image = "/images/reviews/".$file_name; //upload to database
        }
       $reviews->save();
       return redirect()->route('backend.reviews.index');
        }
    }
/**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

}
