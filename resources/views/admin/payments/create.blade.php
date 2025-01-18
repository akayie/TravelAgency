@extends('layouts.admin')
@section('content')
<div class="container-fluid px-4">
                    <div class="my-3">
                        <h1 class="mt-4 d-inline">Payments</h1>
                        <a href="{{route('backend.payments.create')}}" class="btn btn-primary float-end" >Create Payments</a>
                    </div>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{route('backend.payments.index')}}">Payments</a></li>
                            <li class="breadcrumb-item"><a href="{{route('backend.payments.create')}}">Create Payment</a></li>
                        </ol>
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Payment List
                            </div>
                            <div class="card-body">
                                <form action="{{route('backend.payments.store')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                        
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Payment</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="" name="name">
                                        @error('name')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                        </div>
                                        <div class="col-md-12 mb-3">
                                        <label for="logo" class="form-label">Image</label>
                                        <input type="file" accept="image/*" class="form-control @error('image') is-invalid @enderror" id="logo" name="logo">
                                       
                                         @error('image')
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