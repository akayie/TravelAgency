@extends('layouts.admin')
@section('content')

<div class="container-fluid px-4">
                    <div class="my-3">
                        <h1 class="mt-4 d-inline">Payments</h1>
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
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Name</th>
                                            <th>Image</th>
                                            <th>Location</th>
                                            <th>Description</th>
                                            <th>#</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No.</th>
                                            <th>Name</th>
                                            <th>Image</th>
                                            <th>Location</th>
                                            <th>Description</th>
                                            <th>#</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @php 
                                            $i=1;
                                        @endphp
                                       @foreach($destinations as $destination)
                                       <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$destination->name}}</td> 
                                        <td><img src="{{$destination->image}}"class="w-25 h-25"/></td>
                                          <td>                                 
                                        @foreach ($destinations as $destination)
                                        <a href="{{ $destination->location }}" target="_blank">Map Location</a>
                                        @endforeach
                                        </td>
                                        <td>{{$destination->description}}</td> 
                                        <td>
                                        <a href="{{route('backend.destinations.edit',$destination->id)}}"class="btn btn-sm btn-warning">Edit</a>
                                             <button type="button" class="btn btn-sm btn-danger delete" data-id="{{$destination->id}}">Delete</button>
                                        </td>
                                        </tr>
                                        @endforeach
                                   </tbody>
                                </table>
                                {{$destinations->links()}}
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
            $('#deleteForm').attr('action',`destinations/${id}`);
            $('#deleteModal').modal('show');
        })
    })
</script>
@endsection