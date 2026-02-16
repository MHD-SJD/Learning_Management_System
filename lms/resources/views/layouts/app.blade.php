<!DOCTYPE html>
<html>
<head>
    <title>LMS System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
.nav-link:hover {
    background-color: #0d6efd;
    color: white !important;
}
</style>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="/dashboard">LMS</a>

        <div class="d-flex">
            <span class="text-white me-3">
                {{ Auth::user()->name }}
            </span>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="btn btn-danger btn-sm">Logout</button>
            </form>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">

        <!-- Sidebar -->
        <div class="col-md-2 bg-light min-vh-100 p-3">
            <ul class="nav flex-column">

                <li class="nav-item">
                    <a class="nav-link" href="/dashboard">Dashboard</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/students">Students</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/lecturers">Lecturers</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/courses">Courses</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/exams">Exams</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/results">Results</a>
                </li>

            </ul>
        </div>

        <!-- Main Content -->
        <div class="col-md-10 p-4">
            @yield('content')
        </div>

    </div>
</div>

</body>
</html>
