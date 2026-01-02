@extends('layout.app')

@section('content')
<div class="card">
    <div class="card-body">
        <h4>Google Meet Integration</h4>

        @if(setting('google_access_token'))
            <div class="alert alert-success">
                ✅ Google Workspace Connected
            </div>
        @else
            <div class="alert alert-warning">
                ⚠ Google Workspace Not Connected
            </div>
        @endif

        <a href="{{ route('admin.google.auth') }}"
           class="btn btn-primary">
            🔗 Connect Google Workspace
        </a>

        <p class="mt-3 text-muted">
            This will connect <strong>info@thehealernetwork.com</strong>
            and enable Google Meet for all online appointments.
        </p>
    </div>
</div>
@endsection
