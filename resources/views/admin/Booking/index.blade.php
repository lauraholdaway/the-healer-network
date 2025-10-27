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
                            <th>Date</th>
                            <th>Time</th>
                            <th>Package</th>
                            <th>Payment</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($appointments as $item)
                            <tr>
                                <td></td>
                                <td>{{ $item->doctor->name ?? '_' }}</td>
                                <td>{{ $item->user->name ?? '' }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->date ?? '')->format('d M Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->time ?? '')->format('h:i A') }}</td>
                                <td>{{ $item->doctorpackage->type ?? '-' }} ({{ $item->doctorpackage->time ?? '-' }})</td>
                                <td>{{ $item->payment ?? '-' }} {{ $item->currency ?? 'usd' }}
                                </td>
                                <td>
                                    <p>{{ $item->status ?? '-' }}</p>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>


            </div>

        </div>
    </section>
@endsection
