@extends('layout.app')

@section('content')
    <div class="container card p-3 m-1">
        <div class="card p-3 shadow-sm my-2">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="mb-0"><b>Update Blogs</b></h3>

            </div>
        </div>

 <div class="container">
    @include('admin.blogs.form')
</div>
    </div>
@endsection
