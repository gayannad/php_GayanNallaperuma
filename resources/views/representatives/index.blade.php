@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Sales Team</div>

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
                                <a href="{{route('representatives.create')}}" class="text-decoration-none">
                                    <button class="btn btn-secondary  float-end text-white">
                                        Add New
                                    </button>
                                </a>
                            </div>
                        </div>

                        <div class="mt-3 col-md-12">
                            <table class="table table-bordered table-responsive">
                                <tr class="bg-secondary text-white">
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Telephone</th>
                                    <th>Current Route</th>
                                    <th colspan="3" class="text-center">Action</th>
                                </tr>

                                @foreach($representatives as $key => $representative)
                                    <tr>
                                        <td>{{$representative->id}}</td>
                                        <td>{{$representative->full_name}}</td>
                                        <td>{{$representative->email}}</td>
                                        <td>{{$representative->telephone}}</td>
                                        <td>{{$representative->current_route}}</td>
                                        <td>
                                            <a data-bs-toggle="modal" href="#"
                                               data-bs-target="#representativeModal{{$key}}" data-bs-whatever="@mdo"
                                               title="View representative" data-toggle="tooltip">
                                                View
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{route('representatives.edit',$representative->id)}}"
                                               title="Edit representative" data-toggle="tooltip">Edit</a>
                                        </td>
                                        <td>
                                            <form action="{{ route('representatives.destroy', $representative->id) }}"
                                                  method="post">
                                                @csrf
                                                @method('DELETE')
                                                <a href="#" title="Delete representative" data-toggle="tooltip"
                                                   class="show_confirm">
                                                    Delete
                                                </a>
                                            </form>
                                        </td>
                                    </tr>


                                    <div class="modal fade" id="representativeModal{{$key}}" tabindex="-1"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title fw-bold"
                                                        id="exampleModalLabel">{{$representative->full_name}}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form>

                                                        <div class="mb-3 row">
                                                            <div class="col-md-4">
                                                                <label for="" class="col-form-label">ID:</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" disabled
                                                                       value="{{$representative->id}}">
                                                            </div>
                                                        </div>

                                                        <div class="mb-3 row">
                                                            <div class="col-md-4">
                                                                <label for="" class="col-form-label">Full Name:</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" disabled
                                                                       value="{{$representative->full_name}}">
                                                            </div>
                                                        </div>

                                                        <div class="mb-3 row">
                                                            <div class="col-md-4">
                                                                <label for="" class="col-form-label">Email
                                                                    Address:</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" disabled
                                                                       value="{{$representative->email}}">
                                                            </div>
                                                        </div>

                                                        <div class="mb-3 row">
                                                            <div class="col-md-4">
                                                                <label for="" class="col-form-label">Telephone:</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" disabled
                                                                       value="{{$representative->telephone}}">
                                                            </div>
                                                        </div>

                                                        <div class="mb-3 row">
                                                            <div class="col-md-4">
                                                                <label for="" class="col-form-label">Joined
                                                                    Date:</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" disabled
                                                                       value="{{$representative->joined_date}}">
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <div class="col-md-4">
                                                                <label for="" class="col-form-label">Current
                                                                    Route:</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" disabled
                                                                       value="{{$representative->current_route}}">
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <div class="col-md-4">
                                                                <label for="" class="col-form-label">Comments:</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <textarea class="form-control"
                                                                          id="message-text">{{$representative->comments}}</textarea>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </table>
                            {!! $representatives->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">

        //show confirm alert when delete representative

        $('.show_confirm').click(function (event) {
            var form = $(this).closest("form");
            event.preventDefault();
            swal({
                title: `Are you sure you want to delete this representative?`,
                text: "If you delete this, it will be gone forever.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    }
                });
        });

    </script>

    <style>
        .swal-title {
            font-size: 20px !important;
        }

        .swal-modal {
            width: 420px !important;
        }
    </style>
@endsection



