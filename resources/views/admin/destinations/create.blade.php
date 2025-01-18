@extends('layouts.admin')
@section('content')
<div class="container-fluid px-4">
                    <div class="my-3">
                        <h1 class="mt-4 d-inline">Items</h1>
                        <a href="{{route('backend.destinations.create')}}" class="btn btn-primary float-end" >Create Destination</a>
                    </div>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{route('backend.destinations.index')}}">Destinations</a></li>
                            <li class="breadcrumb-item"><a href="{{route('backend.destinations.create')}}">Create Destination</a></li>
                        </ol>
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Destinations List
                            </div>
                            <div class="card-body">
                                <form action="{{route('backend.destinations.store')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                        <table class="table table-bordered">
                                  
                                        <div class="mb-3">
                                        <label for="name" class="form-label">Destination Name</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}" id="name" placeholder="" name="name">
                                        @error('name')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                        </div>

                                        <div class="col-md-12 mb-3">
                                        <label for="image" class="form-label">Image</label>
                                        <input type="file" accept="image/*" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
                                       
                                         @error('image')
                                        <div class="invalid-feedback">{{$message}}</div>
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

                                        <div class="col-md-12 mb-3">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" rows="2" name="description">{{old('description')}}</textarea>
                                        @error('description')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                        </div>
                                    </div>
                                   
                                    <button class="w-100 btn btn-primary" type="submit">Save</button>
                                    </div>
                                    
                                </form>
                                </div>
                                </table>
                         
                            </div> 
                        </div>
                    </div>

@endsection