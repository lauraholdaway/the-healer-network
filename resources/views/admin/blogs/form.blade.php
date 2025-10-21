@php
    $isEdit = isset($Blog);
@endphp

<form action="{{ $isEdit ? route('Blogs.update', $Blog) : route('Blogs.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if($isEdit) @method('PUT') @endif

    <div class="mb-3">
        <label>Title</label>
        <input type="text" name="title" value="{{ old('title', $Blog->title ?? '') }}" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Image</label>
        <input type="file" name="image" class="form-control">
        @if($isEdit && $Blog->image)
            <img src="{{ asset('storage/'.$Blog->image) }}" style="height:100px;margin-top:10px;">
        @endif
    </div>
    <div class="mb-3">
        <label>Time</label>
        <input type="text" name="time" value="{{ old('time', $Blog->time ?? '') }}" class="form-control" required>
    </div>
   <div class="mb-3">
    <label for="description">Description</label>
    <textarea name="description" id="description" class="form-control" rows="6">
        {{ old('description', $Blog->description ?? '') }}
    </textarea>
</div>



    <div class="mb-3">
        <label>Status</label>
        <select name="status" class="form-select" required>
            <option value="draft" {{ old('status', $Blog->status ?? '') == 'draft' ? 'selected' : '' }}>Draft</option>
            <option value="published" {{ old('status', $Blog->status ?? '') == 'published' ? 'selected' : '' }}>Published</option>
        </select>
    </div>
    <div class="mb-3">
        <label>Subscription</label>
        <input type="text" name="subscription" value="{{ old('subscription', $Blog->subscription ?? '') }}" class="form-control" placeholder="e.g. free, premium">
    </div>

    <button class="btn btn-success">{{ $isEdit ? 'Update' : 'Create' }}</button>
</form>

{{-- ✅ CKEditor CDN --}}
<script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('description');
</script>
