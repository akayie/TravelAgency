@extends('layouts.admin')
@section('content')
<div class="container-fluid px-4">
                    <div class="my-3">
                        <h1 class="mt-4 d-inline">Edit Package</h1>
                        <a href="{{route('backend.packages.index')}}" class="btn btn-danger float-end" >Cancel</a>
                    </div>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{route('backend.packages.index')}}">Packages</a></li>
                            <li class="breadcrumb-item"><a href="{{route('backend.packages.create')}}">Edit Package</a></li>
                        </ol>
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Edit Packages 
                            </div>
                            <div class="card-body">
                                <form action="{{route('backend.packages.update',$package->id)}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                        <table class="table table-bordered">
                                        <div class="mb-3">
                                        <label for="name" class="form-label">Package Name</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{$package->name}}" id="name" placeholder="" name="name">
                                        @error('name')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                        </div>

                                        <div class="mb-3">
                                        <label for="price" class="form-label">Price</label>
                                        <input type="text" class="form-control @error('price') is-invalid @enderror" value="{{$package->price}}" id="price" name="price" >
                                        @error('price')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                        </div>

                                        <div class="col-md-12 mb-3">
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-package" role="presentation">
                                                <button class="nav-link active" id="imageimage-tab" data-bs-toggle="tab" data-bs-target="#imageimage-tab-pane" type="button" role="tab" aria-controls="imageimage-tab-pane" aria-selected="true">Image</button>
                                            </li>
                                            <li class="nav-package" role="presentation">
                                                <button class="nav-link" id="new_image-tab" data-bs-toggle="tab" data-bs-target="#new_image-tab-pane" type="button" role="tab" aria-controls="new_image-tab-pane" aria-selected="false">New Image</button>
                                            </li>
                                        </ul>
                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade show active" id="image-tab-pane" role="tabpanel" aria-labelledby="image-tab" tabindex="0">
                                                <img src="{{$package->image}}" alt="" class="w-25 h-25 my-3">
                                                <input type="hidden" name="old_image" id="" value="{{$package->image}}">
                                            </div>
                                            <div class="tab-pane fade" id="new_image-tab-pane" role="tabpanel" aria-labelledby="new_image-tab" tabindex="0">
                                            <input type="file" accept="image/*" class="form-control @error('image') is-invalid @enderror" id="image" name="image" value="{{old('image')}}">
                                       
                                            </div>
                                        </div>
                                        
                                         @error('image')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                        </div>
                                        <div class="col-md-12 mb-3">
                                        <label for="itinerary" class="form-label">Itinerary</label>
                                        <textarea class="form-control @error('itinerary') is-invalid @enderror" id="itinerary" rows="2" name="itinerary">{{$package->itinerary}}</textarea>
                                        @error('itinerary')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                        </div>

                                        <div class="col-md-12 mb-3">
                                        <label for="duration" class="form-label">Duration</label>
                                        <textarea class="form-control @error('duration') is-invalid @enderror" id="duration" rows="2" name="duration">{{$package->duration}}</textarea>
                                        @error('duration')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                        </div>
                                        
                                        <div class="col-md-12 mb-3">
                                        <label for="inclusion" class="form-label">Inclusion</label>
                                        <textarea class="form-control @error('inclusion') is-invalid @enderror" id="inclusion" rows="2" name="inclusion">{{$package->inclusion}}</textarea>
                                        @error('inclusion')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                        </div>
                                        
                                        <div class="col-md-12 mb-3">
                                        <label for="exclusion" class="form-label">Exclusion</label>
                                        <textarea class="form-control @error('exclusion') is-invalid @enderror" id="exclusion" rows="2" name="exclusion">{{$package->exclusion}}</textarea>
                                        @error('exclusion')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                        </div>
                                        
                                        <div class="col-md-12 mb-3">
                                        <label for="destination" class="form-label">Destination</label>
                                        <select class="form-select form-select-sm @error('destination') is-invalid @enderror" aria-label="destination" name="destination">
                                        <option value="">Choose Destinations</option>
                                        @foreach($destinations as $destination)
                                        <option value="{{$destination->id}}" {{$destination->destination_id  == $destination->id?'selected':''}}>{{$destination->name}}</option>
                                        @endforeach
                                        </select>
                                        @error('destination')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                        </div>

                                    </div>
                                   
                                    <button class="w-100 btn btn-warning" type="submit">Update</button>
                                    </div>
                                    
                                </form>
                                </div>
                                </table>
                         
                            </div> 
                        </div>
                    </div>

@endsection