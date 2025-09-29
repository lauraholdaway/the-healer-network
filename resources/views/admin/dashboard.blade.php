@extends('layout.app')

@section('content')
<section>
    <div class="container my-5">
        <div class="user-dashboard">
            <h1 class="mb-4 text-center">Doctor & User Appointment Dashboard</h1>

            <div class="row">
                <!-- Cards Section -->
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm text-center p-4">
                        <h5>Total Doctors</h5>
                        <h2 class="text-primary">{{ $doctorCount }}</h2>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm text-center p-4">
                        <h5>Total Users</h5>
                        <h2 class="text-success">{{ $userCount }}</h2>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm text-center p-4">
                        <h5>Total Appointments</h5>
                        <h2 class="text-danger">{{ $appointmentCount }}</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Chart Section -->
                <div class="col-md-6 mb-4">
                    <div class="card shadow-sm p-3">
                        <h5 class="mb-3">Appointments Overview</h5>
                        <canvas id="appointmentsChart"></canvas>
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <div class="card shadow-sm p-3">
                        <h5 class="mb-3">Doctor vs User Count</h5>
                        <canvas id="doctorUserChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Appointment Table -->
            <div class="card shadow-sm p-4">
                <h5 class="mb-3">Latest Appointments</h5>
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>User</th>
                            <th>Doctor</th>
                            <th>Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($appointments as $appointment)
                        <tr>
                            <td>{{ $appointment->id }}</td>
                            <td>{{ $appointment->user->name }}</td>
                            <td>{{ $appointment->doctor->name }}</td>
                            <td>{{ $appointment->date }}</td>
                            <td>
                                <span class="badge badge-{{ $appointment->status == 'completed' ? 'success' : 'warning' }}">
                                    {{ ucfirst($appointment->status) }}
                                </span>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center">No Appointments Found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Appointments Chart
    const ctx1 = document.getElementById('appointmentsChart').getContext('2d');
    new Chart(ctx1, {
        type: 'line',
        data: {
            labels: @json($appointmentMonths),
            datasets: [{
                label: 'Appointments',
                data: @json($appointmentCounts),
                borderColor: 'blue',
                backgroundColor: 'rgba(0, 123, 255, 0.2)',
                fill: true,
                tension: 0.4
            }]
        }
    });

    // Doctor vs User Chart
    const ctx2 = document.getElementById('doctorUserChart').getContext('2d');
    new Chart(ctx2, {
        type: 'doughnut',
        data: {
            labels: ['Doctors', 'Users'],
            datasets: [{
                data: [{{ $doctorCount }}, {{ $userCount }}],
                backgroundColor: ['#007bff', '#28a745']
            }]
        }
    });
</script>
@endsection
