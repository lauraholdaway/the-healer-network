@extends('layout.app')

@section('content')
    <section class="p-1">

        <div class="card p-3 shadow-sm my-2">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="mb-0"><b>Contact List</b></h3>
            </div>
        </div>



        <div class="card p-2 shadow-sm">
            <div class="overflow-auto">
                <table class="table table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Message</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($contacts as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->first_name }}</td>
                                <td>{{ $item->second_name }}</td>
                                <td>{{ $item->email ?? "" }}</td>
                                <td>{{ $item->message ?? "" }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>


            </div>

        </div>
    </section>
@endsection
