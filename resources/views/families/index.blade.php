@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Relationship Manager
            </div>
            <div class="card-body">
                <a href="{{ route('families.create') }}" class="btn btn-primary mb-3">Create Relationship</a>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Relationship</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($families as $family)
                            @if ($family->parent_id == null)
                                <tr>
                                    <td>{{ $family->name }}</td>
                                    <td>{{ $family->hubungan->name }}</td>
                                    <td>
                                        <a href="{{ route('families.show', $family->id) }}"
                                            class="btn btn-info btn-sm">Show</a>
                                        <a href="{{ route('families.edit', $family->id) }}"
                                            class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('families.destroy', $family->id) }}" method="POST"
                                            style="display:inline;" onclick="return confirm('Are you sure?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endif
                            @foreach ($family->children as $child)
                                <tr>
                                    <td>&#10551; {{ $child->name }}</td>
                                    <td>{{ $child->hubungan->name }}</td>
                                    <td>
                                        <a href="{{ route('families.show', $child->id) }}"
                                            class="btn btn-info btn-sm">Show</a>
                                        <a href="{{ route('families.edit', $child->id) }}"
                                            class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('families.destroy', $child->id) }}" method="POST"
                                            style="display:inline;" onclick="return confirm('Are you sure?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @empty
                            <tr>
                                <td colspan="4">No families available.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $families->links() }}
            </div>
        </div>
    </div>
@endsection
