@extends('layout.app')

@section('content')
<div class="container">
    <div class="container card p-3 m-1">
        <div class="card p-3 shadow-sm my-2">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="mb-0"><b>Edit Modality</b></h3>

            </div>
        </div>
    <form action="{{ route('modalities.update', $modality->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" value="{{ $modality->title }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="1" {{ $modality->status ? 'selected' : '' }}>Active</option>
                <option value="0" {{ !$modality->status ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>
        <button class="btn btn-success">Update</button>
        <a href="{{ route('modalities.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
