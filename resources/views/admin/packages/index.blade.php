@extends('layouts.admin')
@section('content')

<div class="container-fluid px-4">
                    <div class="my-3">
                        <h1 class="mt-4 d-inline">Packages</h1>
                        <a href="{{route('backend.packages.create')}}" class="btn btn-primary float-end" >Create Package</a>
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
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                        <th>No.</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>image</th>
                                            <th>Itinerary</th>
                                            <th>duration</th>
                                            <th>inclusion</th>
                                            <th>exclusion</th>
                                            <th>destination</th>
                                            <th>#</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>No.</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>image</th>
                                            <th>Itinerary</th>
                                            <th>duration</th>
                                            <th>inclusion</th>
                                            <th>exclusion</th>
                                            <th>destination</th>
                                            <th>#</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @php 
                                            $i=1;
                                        @endphp
                                       @foreach($packages as $package)
                                       <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$package->name}}</td> 
                                        <td>{{$package->price}}</td> 
                                        <td><img src="{{$package->image}}"class="w-25 h-25"/></td>  
                                        <td>{{$package->itinerary}}</td> 
                                        <td>{{$package->duration}}</td> 
                                        <td>{{$package->inclusion}}</td> 
                                        <td>{{$package->exclusion}}</td> 
                                        <td>{{$package->destination->name}}</td>                             
                                        <td>
                                        <a href="{{route('backend.packages.edit',$package->id)}}"class="btn btn-sm btn-warning">Edit</a>
                                             <button type="button" class="btn btn-sm btn-danger delete" data-id="{{$package->id}}">Delete</button>
                                        </td>
                                        </tr>
                                        @endforeach
                                   </tbody>
                                </table>
                                {{$packages->links()}}
                            </div>
                        </div>
                    </div>


<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger text-light">
        <h1 class="modal-title fs-5 " id="exampleModalLabel">Delete</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h3>Are you sure delete?</h3>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
        <form action="" id="deleteForm" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger">Yes</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
@section('script')
<script>
    $(document).ready(function(){
        $('tbody').on('click','.delete',function(){
        //alert('hello');
            let id=$(this).data('id');
            // console.log(id);
            $('#deleteForm').attr('action',`packages/${id}`);
            $('#deleteModal').modal('show');
        })
    })
</script>
@endsection


