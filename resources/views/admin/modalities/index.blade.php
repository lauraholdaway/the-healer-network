@extends('layout.app')

@section('content')
<div class="container">


    <div class="card p-3 shadow-sm my-2">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="mb-0"><b>Modalities List</b></h3>
    <a href="{{ route('modalities.create') }}" class="btn btn-primary mb-3">Add Modality</a>

            </div>
        </div>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($modalities as $index => $modality)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $modality->title }}</td>
                    <td>
                        @if ($modality->status)
                            <span class="badge bg-success">Active</span>
                        @else
                            <span class="badge bg-danger">Inactive</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('modalities.edit', $modality->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        {{-- <form action="{{ route('modalities.destroy', $modality->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this modality?')">Delete</button>
                        </form> --}}
                    </td>
                </tr>
            @empty
                <tr><td colspan="4">No modalities found.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
