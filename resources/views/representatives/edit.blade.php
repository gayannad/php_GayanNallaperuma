@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Representative</div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif

                        <div class="card-group row">
                            <div>
                                <a href="{{route('representatives.index')}}"
                                   class="text-decoration-none">
                                    <button class="btn btn-secondary float-end text-white">
                                        Back to List
                                    </button>
                                </a>
                            </div>
                        </div>

                        <div class="mt-3">
                            <form action="{{route('representatives.update',$representative->id)}}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="row mt-2">
                                    <div class="col-md-4">
                                        <label for="id" class="form-label">ID:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" name="id" disabled class="form-control" value="{{$representative->id}}">
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <div class="col-md-4">
                                        <label for="full_name" class="form-label">Full Name:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" name="full_name" value="{{$representative->full_name}}"
                                               class="form-control @error('full_name') is-invalid @enderror">
                                        <input type="hidden" name="id" value="{{$representative->id}}">
                                        @error('full_name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                         </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <div class="col-md-4">
                                        <label for="email_address" class="form-label">Email Address:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="email" name="email" value="{{$representative->email}}"
                                               class="form-control @error('email') is-invalid @enderror">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                         </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <div class="col-md-4">
                                        <label for="telephone" class="form-label">Telephone:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" name="telephone" value="{{ $representative->telephone}}"
                                               class="form-control @error('telephone') is-invalid @enderror">
                                        @error('telephone')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                         </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <div class="col-md-4">
                                        <label for="joined_date" class="form-label">Joined Date:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="date" name="joined_date" value="{{ $representative->joined_date }}"
                                               class="form-control @error('joined_date') is-invalid @enderror"
                                               >
                                        @error('joined_date')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                         </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <div class="col-md-4">
                                        <label for="current_route" class="form-label">Current Route:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" name="current_route" value="{{ $representative->current_route }}"
                                               class="form-control @error('current_route') is-invalid @enderror">
                                        @error('current_route')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                         </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <div class="col-md-4">
                                        <label for="comments" class="form-label">Comments:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <textarea name="comments" id="" cols="30" rows="5"
                                                  class="form-control">{{$representative->comments}}</textarea>
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <div>
                                        <button type="submit" class="btn btn-primary float-end">
                                            Save
                                        </button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
