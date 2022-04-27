@extends('layouts.app')
@section('content')
    <div class=" col-md-6 offset-md-3">
        <section class="">
            <div>
                <div class="card text-left">
                    <div class="card-header">Edit SaleTeam</div>
                    <form action="{{ route('sales.update', ['sale' => $salesTeam->id]) }}" method="POST">
                        {{-- @method('PUT') --}}
                        {{ method_field('PATCH') }}
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Name</label>
                                        <input type="text" name="name" value="{{ old('name', $salesTeam->name) }}"
                                            class="form-control">
                                        @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="email" name="email" value="{{ old('email', $salesTeam->email) }}"
                                            class="form-control">
                                        @error('email')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Telephone</label>
                                        <input type="number" name="Telephone"
                                            value="{{ old('Telephone', $salesTeam->Telephone) }}" class="form-control">
                                        @error('Telephone')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Joined Date</label>
                                        <input type="date" name="joint_date"
                                            value="{{ old('joint_date', $salesTeam->joint_date) }}"
                                            class="form-control">
                                        @error('joint_date')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="s">Route</label>
                                        <select name="route_id" class="form-select" aria-label="Default select example">
                                            <option value="{{ $salesTeam->route_id }}">{{ $salesTeam->route_id }}</option>
                                            @forelse (App\helpers\Helpers::getRoutes() as  $route)
                                                <option value="{{ $route->id }}">{{ $route->name }}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                        @error('route_id')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Description</label>
                                        <textarea type="text" name="comments" value="{{ old('comments') }}" class="form-control">
                                        {{ old('comments', $salesTeam->comments) }}
                                    </textarea>
                                        @error('comments')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection
