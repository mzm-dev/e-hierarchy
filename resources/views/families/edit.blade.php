@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Edit Relationship
            </div>
            <div class="card-body">
                <form action="{{ route('families.update', $relationship) }}" method="POST">
                    @method('patch')
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" value="{{ old('name', $relationship->name) }}" id="name"
                            class="form-control @error('name') is-invalid @enderror">

                        @error('name')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-success">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
