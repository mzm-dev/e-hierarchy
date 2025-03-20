@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Edit Family
            </div>
            <div class="card-body">
                <form action="{{ route('families.update', $family) }}" method="POST">
                    @method('patch')
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $family->name) }}"
                            class="form-control @error('name')is-invalid @enderror">

                        @error('name')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror

                    </div>
                    <div class="form-group">
                        <label class="form-label">Ibu/Bapa</label>
                        <select name="parent_id" class="form-control">
                            <option value="">Tiada</option>
                            @foreach ($families as $fmly)
                                <option value="{{ $fmly->id }}"
                                    {{ old('parent_id', $family->parent_id ?? null) == $fmly->id ? 'selected' : '' }}>
                                    {{ $fmly->name }}</option>
                            @endforeach
                        </select>
                        @error('parent_id')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="relationship_id">Relationship</label>
                        <select name="relationship_id" id="relationship_id"
                            class="form-control @error('relationship_id')is-invalid @enderror">
                            <option>Select Relationship</option>
                            @foreach ($relationships as $key => $relationship)
                                <option value="{{ $key }}"
                                    {{ old('relationship_id', $family->relationship_id ?? null) == $key ? 'selected' : '' }}>
                                    {{ $relationship }}</option>
                            @endforeach
                        </select>

                        @error('relationship_id')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror

                    </div>
                    <div class="form-group">
                        <label for="dob">DOB</label>
                        <input type="date" name="dob" id="dob"
                            value="{{ old('dob', date('Y-m-d', strtotime($family->dob)) ?? '') }}"
                            class="form-control @error('dob')is-invalid @enderror">
                        @error('dob')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror

                    </div>

                    <button type="submit" class="btn btn-success">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
