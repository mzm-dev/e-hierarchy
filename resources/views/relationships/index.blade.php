@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Relationship Manager
            </div>
            <div class="card-body">
                <a href="{{ route('relationships.create') }}" class="btn btn-primary mb-3">Create Relationship</a>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($relationships as $relationship)
                            <tr>
                                <td>{{ $relationship->name }}</td>
                                <td>
                                    <a href="{{ route('relationships.edit', $relationship->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('relationships.destroy', $relationship->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">No relationships available.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $relationships->links() }}
            </div>
        </div>
    </div>
@endsection
