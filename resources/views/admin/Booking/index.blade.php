@extends('layout.app')

@section('content')
    <section class="p-1">

        <div class="card p-3 shadow-sm my-2">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="mb-0"><b>Appointment List</b></h3>
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
                            <th>Doctor</th>
                            <th>User</th>
                            <th>Date & Time</th>
                            <th>Type</th>
                            <th>Payment</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($appointments as $item)
                            <tr>
                                <td>1</td>
                                <td>{{ $item->doctor->name }}</td>
                                <td>{{ $item->user->name }}</td>
                                <td>{{ $item->time }} {{ $item->date }}</td>
                                <td>{{ $item->doctorpackage->type }}</td>
                                <td>{{ $item->doctorpackage->price }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>


            </div>

        </div>
    </section>
@endsection
