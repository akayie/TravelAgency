@extends('layouts.admin')
@section('content')
<div class="container-fluid px-4">
                    <div class="my-3">
                        <h1 class="mt-4 d-inline">Packages</h1>
                        <a href="{{route('backend.packages.create')}}" class="btn btn-primary float-end" >Create package</a>
                    </div>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{route('backend.packages.index')}}">Packages</a></li>
                            <li class="breadcrumb-item"><a href="{{route('backend.packages.create')}}">Create Package</a></li>
                        </ol>
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Packages List
                            </div>
                            <div class="card-body">
                                <form action="{{route('backend.packages.store')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                        
                                        <div class="mb-3">
                                        <label for="name" class="form-label">Package Name</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}" id="name" placeholder="" name="name">
                                        @error('name')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                        </div>

                                        
                                        <div class="mb-3">
                                        <label for="price" class="form-label">Price</label>
                                        <input type="text" class="form-control @error('price') is-invalid @enderror" value="{{old('price')}}" id="price" name="price" >
                                        @error('price')
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
                                        <label for="itinerary" class="form-label">Itinerary</label>
                                        <input type="text" class="form-control @error('itinerary') is-invalid @enderror" value="{{old('itinerary')}}" id="itinerary" placeholder="" name="itinerary">
                                        @error('itinerary')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                        </div>

                                        <div class="mb-3">
                                        <label for="duration" class="form-label">Duration</label>
                                        <input type="text" class="form-control @error('duration') is-invalid @enderror" value="{{old('duration')}}" id="duration" placeholder="" name="duration">
                                        @error('duration')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                        </div>

                                        <div class="mb-3">
                                        <label for="inclusion" class="form-label">Inclusion</label>
                                        <input type="text" class="form-control @error('inclusion') is-invalid @enderror" value="{{old('inclusion')}}" id="inclusion" placeholder="" name="inclusion">
                                        @error('inclusion')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                        </div>
                                        
                                        <div class="mb-3">
                                        <label for="exclusion" class="form-label"> Exclusion</label>
                                        <input type="text" class="form-control @error('exclusion') is-invalid @enderror" value="{{old('exclusion')}}" id="exclusion" placeholder="" name="exclusion">
                                        @error('exclusion')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label for="destination_id" class="form-label">Destinations</label>
                                            <select class="form-select form-select-sm @error('destination_id') is-invalid @enderror" value="{{old('destination_id')}}" aria-label="destination_id" name="destination_id">
                                            <option value="">Choose Destiantions</option>
                                            @foreach($destinations as $destination)
                                            <option value="{{$destination->id}}" {{old('destination_id') == $destination->id?'selected':''}}>{{$destination->name}}</option>
                                            @endforeach
                                            </select>
                                            @error('destination_id')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
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