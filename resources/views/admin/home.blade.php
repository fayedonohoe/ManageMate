@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    </br>
                    <a href="{{ route('admin.managers.index') }}">View Managers</a>
                    </br>
                    <a href="{{ route('admin.employees.index') }}">View Employees</a>
                    </br>
                    <!-- <a href="{{ route('admin.visits.index') }}">View Visits (Index currently not functioning)</a>
                    </br>
                    <a href="{{ route('admin.visits.create') }}">Record a Visit</a>
                    </br>
                    Example Visit Functioning: http://127.0.0.1:8000/admin/visits/1 -->

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
