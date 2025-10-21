@extends('layout.app')

@section('content')
    <section class="p-1">

        <div class="card p-3 shadow-sm my-2">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="mb-0"><b>Blogs List</b></h3>
                <div>
                  <a href="{{ route('Blogs.create') }}" class="btn btn-primary mb-3">Create Blog</a>
            </div>
            </div>

        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card p-2 shadow-sm">
            <div class="overflow-auto">
                <table class="table table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>image</th>
                            <th>name</th>
                            <th>Time</th>
                            <th>status</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($blogs as $blog)
                            <tr>
                                <td>1</td>
                                <td>
                                    @if ($blog->image)
                                        <img src="{{ asset('storage/' . $blog->image) }}" class="card-img-top"
                                            style="height:100px;object-fit:cover;">
                                    @endif
                                </td>
                                <td>{{ $blog->title }}</td>
                                <td>{{ $blog->time }}</td>
                                <td>
                                    {{ ucfirst($blog->status) }} • {{ $blog->subscription ?? 'Free' }}
                                </td>
                                <td>{!! Str::limit(strip_tags($blog->description), 150) !!}</td>
                                <td>
                                    <a href="{{ route('Blogs.edit', $blog) }}" class="btn btn-sm btn-warning">Edit</a>

                                    <form action="{{ route('Blogs.destroy', $blog) }}" method="POST"
                                        style="display:inline-block" onsubmit="return confirm('Delete?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

{{ $blogs->links() }}
            </div>

        </div>
    </section>
@endsection
