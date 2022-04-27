@extends('layouts.app')
@section('content')
    @include('pages.sales.view')

    <div class="col-12 col-md-12">
        <div class="card text-left">
            <div class="card-header d-flex justify-content-between bg-light">
                <h4 class="card-title">Sale Team List</h4>
                <a href="{{ route('sales.create') }}" class="btn btn-success">New </a>
            </div>
            <div class="card-body">
                <x-alert />
                <table class="table table-responsive-md">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Telephone</th>
                            <th>Joined Date</th>
                            <th>Current Route</th>
                            <th>Comments</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @forelse ($salesTeam as $key => $sale)
                            <tr class="sale-data">
                                <td scope="row">{{ $key + $salesTeam->firstItem() }}</td>
                                <td scope="row">{{ $sale->name }}</td>
                                <td scope="row">{{ $sale->email }}</td>
                                <td scope="row">{{ $sale->Telephone }}</td>
                                <td scope="row">{{ $sale->joint_date }}</td>
                                <td scope="row">{{ $sale->route->name }}</td>
                                <td scope="row">{{ Str::limit($sale->comments, 10, '...') }}</td>
                                <td>
                                    <div class="btn-group">

                                        <a class="btn btn-primary view-data" data-bs-toggle="modal">
                                            View
                                        </a>
                                        <input type="hidden" value="{{ $sale->id }}" class="sale-id">

                                        <a href="{{ route('sales.edit', ['sale' => $sale->id]) }}"
                                            class="btn btn-success">Edit
                                        </a>

                                        <form action="{{ route('sales.destroy', ['sale' => $sale->id]) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
                {{ $salesTeam->links() }}
            </div>
        </div>
    </div>

    @push('script')
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>

        <script>
            $('document').ready(function() {

                $('.view-data').click(function() {
                    var id = $(this).closest('.sale-data').find('.sale-id').val();

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        method: "GET",
                        url: "/salesTeam/sales/" + id,
                        data: {
                            'id': id,
                        },
                        success: function(response) {
                            console.log(response);
                            $('#sale_name').text(response.name)
                            $('#sale_email').text(response.email)
                            $('#sale_telephone').text(response.Telephone)
                            $('#sale_joined_date').text(response.joint_date)
                            $('#sale_comments').text(response.comments)
                            $('#sale_view').modal('show')

                        }
                    });
                })

            });
        </script>
    @endpush
@endsection
