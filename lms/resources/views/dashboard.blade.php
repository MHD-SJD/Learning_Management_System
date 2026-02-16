@extends('layouts.app')

@section('content')

<h2 class="mb-4">Dashboard</h2>

<div class="row">

    <div class="col-md-3">
        <div class="card text-white bg-primary mb-3">
            <div class="card-body">
                <h5>Students</h5>
                <h3>{{ \App\Models\Student::count() }}</h3>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-white bg-success mb-3">
            <div class="card-body">
                <h5>Lecturers</h5>
                <h3>{{ \App\Models\Lecturer::count() }}</h3>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-white bg-warning mb-3">
            <div class="card-body">
                <h5>Courses</h5>
                <h3>{{ \App\Models\Course::count() }}</h3>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-white bg-danger mb-3">
            <div class="card-body">
                <h5>Exams</h5>
                <h3>{{ \App\Models\Exam::count() }}</h3>
            </div>
        </div>
    </div>

</div>

@endsection
