@extends('layout.app')

@section('content')
    <section class="p-1">

        <div class="card p-3 shadow-sm my-2">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="mb-0"><b>Practitioner List</b></h3>
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
                            <th>Image</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Primary Contact</th>
                            <th>Mobile</th>
                            <th>Address</th>
                            <th>Practice Location</th>
                            <th>About</th>
                            <th>Clients / Month</th>
                            <th>Free Trials</th>
                            <th>Provide Free?</th>
                            <th>Referred By</th>
                            <th>status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($doctors as $doctor)
                            <tr>
                                <td>{{ $doctor->id }}</td>
                                <td>
                                    @if (!empty($doctor->user->image))
                                        <img src="{{ asset('storage/' . $doctor->user->image) }}" width="50"
                                            height="50" class="rounded-circle">
                                    @else
                                        <img src="https://via.placeholder.com/50" class="rounded-circle">
                                    @endif
                                </td>
                                <td>{{ $doctor->user->name ?? '' }} {{ $doctor->user->last_name ?? '' }}</td>
                                <td>{{ $doctor->user->email ?? '' }}</td>
                                <td>{{ $doctor->primary_contact_number ?? '' }}</td>
                                <td>{{ $doctor->mobile_number ?? '' }}</td>
                                <td>{{ $doctor->address ?? '' }}</td>
                                <td>{{ $doctor->practice_location ?? '' }}</td>

                                <td>{{ \Illuminate\Support\Str::words($doctor->about ?? '', 10, '...') }}</td>
                                <td>{{ $doctor->clients_per_month ?? '' }}</td>
                                <td>{{ $doctor->free_trial_sessions ?? '' }}</td>
                                <td>{{ $doctor->happy_to_provide_free_session ? 'Yes' : 'No' }}</td>
                                <td>{{ $doctor->referred_by ?? '' }}</td>
                                <td>
                                    @if(!empty($doctor->user->id))
                                    <span id="status-{{ $doctor->user->id ?? '0' }}"
                                        class="{{ $doctor->user->status ? 'text-success' : 'text-danger' }}">
                                        {{ $doctor->user->status ? 'Active' : 'Inactive' }}
                                    </span>
                                    @endif
                                </td>
                                <td>
                                    @if(!empty($doctor->user->id))


                                    <button class="btn btn-sm btn-outline-danger toggle-status"
                                        data-id="{{ $doctor->user->id }}">
                                        {{ $doctor->user->status ? 'Deactivate' : 'Activate' }}
                                    </button>
                                    @endif

                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>


            </div>

        </div>
    </section>

<script>
    $(document).on('click', '.toggle-status', function () {
        let id = $(this).data('id');

        $.ajax({
            url: `/userstatus/${id}/toggle-status`,
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (res) {
                let statusText = res.status == 1 ? 'Active' : 'Inactive';
                let statusClass = res.status == 1 ? 'text-success' : 'text-danger';
                $(`#status-${id}`).text(statusText).attr('class', statusClass);
            },
            error: function (xhr) {
                console.error("Error:", xhr.responseText);
                alert("Something went wrong! CSRF maybe?");
            }
        });
    });
</script>

@endsection
