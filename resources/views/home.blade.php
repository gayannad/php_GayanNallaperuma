@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Sales Team</div>

                    <div class="card-body">
                        <button class="btn btn-light btn-lg">
                            <i class="fa fa-users">
                                <a href="{{route('representatives.index')}}">Sales Team</a>
                            </i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
