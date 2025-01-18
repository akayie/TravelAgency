@extends('layouts.admin')
@section('content')
<div class="container-fluid px-4">
                    <div class="my-3">
                        <h1 class="mt-4 d-inline">Edit Destinations</h1>
                        <a href="{{route('backend.destinations.index')}}" class="btn btn-primary float-end" >Cancel</a>
                    </div>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{route('backend.destinations.index')}}">Destinations</a></li>
                            <li class="breadcrumb-item"><a href="{{route('backend.destinations.create')}}">Edit Destination</a></li>
                        </ol>
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Edit Destiantions
                            </div>
                            <div class="card-body">
                            <form action="{{route('backend.destinations.update',$destination->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                                    @method('put')
                                    <table class="table table-bordered">  
                                    <div class="col-md-12 mb-3">
                                            <label for="name" class="form-label">Destination</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="" name="name" value="{{$destination->name}}">
                                            </select>
                                            @error('name')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link active" id="iamgeimage-tab" data-bs-toggle="tab" data-bs-target="#iamgeimage-tab-pane" type="button" role="tab" aria-controls="iamgeimage-tab-pane" aria-selected="true">Image</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="new-image-tab" data-bs-toggle="tab" data-bs-target="#new-image-tab-pane" type="button" role="tab" aria-controls="new-image-tab-pane" aria-selected="false">New Image</button>
                                            </li>
                                        </ul>
                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade show active" id="image-tab-pane" role="tabpanel" aria-labelledby="image-tab" tabindex="0">
                                            <img src="{{$destination->image}}" alt="" class="w-25 h-25 my-3">
                                            <input type="hidden" name="old_image" id="" value="{{$destination->image}}">
                                            </div>
                                            <input type="file" accept="image/*" class="form-control @error('image') is-invalid @enderror" id="image" name="image" value="{{old('image')}}">
                                       
                                             @error('image')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                             @enderror
                                    </div>
                                    <div class="mb-3">
                                            <label for="location">Google Map Link for Location:</label>
                                            <input type="url" name="location" id="location" class="form-control @error('location') is-invalid @enderror">
                                        </form>
                                        @error('location')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                        </div>
                                    <div> 
                                    <div class="col-md-12 mb-3">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" rows="2" name="description">{{$destination->description}}</textarea>
                                        @error('description')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                        </div>
                                        <button class="w-100 btn btn-warning mt-5" type="submit">Update</button>
                                    </div>
                                    
                                </form>
                            </div>
                                </table>
                         
                            </div> 
                        </div>
                    

@endsection