@extends('layouts.admin')
@section('content')
<div class="container-fluid px-4">
                    <div class="my-3">
                        <h1 class="mt-4 d-inline">Reviews</h1>
                        <a href="{{route('backend.reviews.create')}}" class="btn btn-primary float-end" >Create Reviews</a>
                    </div>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{route('backend.reviews.index')}}">Reviews</a></li>
                            <li class="breadcrumb-item"><a href="{{route('backend.reviews.create')}}">Create Review</a></li>
                        </ol>
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Review List
                            </div>
                            <div class="card-body">
                                <form action="{{route('backend.reviews.store')}}" method="post" enctype="multipart/form-data">
                                    @csrf

                                        <div class="col-md-12 mb-3">
                                        <label for="image" class="form-label">Image</label>
                                        <input type="file" accept="image/*" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
                                       
                                         @error('image')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                        </div>

                                    <div class="mb-3">
                                    <div class="rating @error('rating') is-invalid @enderror">
                                        <input type="radio" name="rating" id="star5"><label for="star5" class="fa fa-star"></label>
                                        <input type="radio" name="rating" id="star4"><label for="star4" class="fa fa-star"></label>
                                        <input type="radio" name="rating" id="star3"><label for="star3" class="fa fa-star"></label>
                                        <input type="radio" name="rating" id="star2"><label for="star2" class="fa fa-star"></label>
                                        <input type="radio" name="rating" id="star1"><label for="star1" class="fa fa-star"></label>
                                    </div>
                                    
                                    @error('rating')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="comment" class="form-label">Comment</label>
                                        <input type="text" class="form-control @error('comment') is-invalid @enderror" id="comment" placeholder="" name="comment">
                                        @error('comment')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label for="user_id" class="form-label">User name</label>
                                            <select class="form-select form-select-sm @error('user_id') is-invalid @enderror" value="{{old('user_id')}}" aria-label="user_id" name="user_id">
                                            <option value="">Choose User</option>
                                            @foreach($users as $user)
                                            <option value="{{$user->id}}" {{old('user_id') == $destination->id?'selected':''}}>{{$user->name}}</option>
                                            @endforeach
                                            </select>
                                            @error('user_id')
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

<script>
    $(document).ready(function () {
        $('#submit-rating').click(function () {
            var ratingValue = $('input[name="rating"]:checked').val();

            if (!ratingValue) {
                alert('Please select a rating!');
                return;
            }

            $.ajax({
                url: '{{ route('rating.store') }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    rating: ratingValue
                },
                success: function (response) {
                    alert(response.message);
                },
                error: function (error) {
                    alert('An error occurred while submitting your rating.');
                }
            });
        });
    });
</script>
