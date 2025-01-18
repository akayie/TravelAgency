@extends('layouts.admin')
@section('content')
<div class="container-fluid px-4">
                    <div class="my-3">
                        <h1 class="mt-4 d-inline">Edit Payment</h1>
                        <a href="{{route('backend.payments.index')}}" class="btn btn-primary float-end" >Cancel</a>
                    </div>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{route('backend.payments.index')}}">Payments</a></li>
                            <li class="breadcrumb-item"><a href="{{route('backend.payments.create')}}">Edit Payment</a></li>
                        </ol>
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Edit Payments
                            </div>
                            <div class="card-body">
                                <form action="{{route('backend.payments.update',$payment->id)}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    <table class="table table-bordered">  
                                    <div class="col-md-12 mb-3">
                                            <label for="name" class="form-label">Payment</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="" name="name" value="{{$payment->name}}">
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
                                                <button class="nav-link active" id="logologo-tab" data-bs-toggle="tab" data-bs-target="#logologo-tab-pane" type="button" role="tab" aria-controls="logologo-tab-pane" aria-selected="true">Image</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="new_logo-tab" data-bs-toggle="tab" data-bs-target="#new_logo-tab-pane" type="button" role="tab" aria-controls="new_logo-tab-pane" aria-selected="false">New Image</button>
                                            </li>
                                        </ul>
                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade show active" id="logo-tab-pane" role="tabpanel" aria-labelledby="logo-tab" tabindex="0">
                                                <img src="{{$payment->logo}}" alt="" class="w-25 h-25 my-3">
                                                <input type="hidden" name="old_logo" id="" value="{{$payment->logo}}">
                                            </div>
                                            <input type="file" accept="logo/*" class="form-control @error('logo') is-invalid @enderror" id="logo" name="logo" value="{{old('logo')}}">
                                       
                                             @error('logo')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                             @enderror
                                    </div>

                                    <div> 
                                        <button class="w-100 btn btn-warning mt-5" type="submit">Update</button>
                                    </div>
                                    
                                </form>
                            </div>
                                </table>
                         
                            </div> 
                        </div>
                    

@endsection