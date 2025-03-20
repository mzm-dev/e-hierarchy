@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Show Family
            </div>
            <div class="card-body">
                <dl class="row">
                    <dt class="col-sm-3">Name</dt>
                    <dd class="col-sm-9">{{ $family->name }}</dd>
                    <dt class="col-sm-3">DOB</dt>
                    <dd class="col-sm-9">{{ $family->dob }}</dd>
                    <dt class="col-sm-3">Parent</dt>
                    <dd class="col-sm-9">{{ $family->parent->name ?? 'Tiada' }}</dd>
                    <dt class="col-sm-3">Relationship</dt>
                    <dd class="col-sm-9">{{ $family->hubungan->name }}</dd>

                    <dt class="col-sm-3">Children</dt>
                    <dd class="col-sm-9">
                        <ul>
                            @forelse ($family->children as $child)
                                <li>
                                    {{ $child->name }} ({{ $child->hubungan->name }})
                                </li>
                            @empty
                                <li>Tiada Maklumat</li>
                            @endforelse
                        </ul>
                    </dd>
                </dl>
            </div>
        </div>
    </div>
@endsection
