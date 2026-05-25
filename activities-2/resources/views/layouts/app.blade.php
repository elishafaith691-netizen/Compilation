<!DOCTYPE html>
<html>
<head>
    <title>Student System</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<div class="sidebar">
    <h2>📘 Student Sys</h2>
    <a href="{{ route('dashboard') }}">🏠 Dashboard</a>
    <a href="{{ route('students.create') }}">➕ Add Student</a>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" style="width:90%; margin:10px;">Logout</button>
    </form>
</div>

<div class="main-content">
    @yield('content')
</div>

</body>
</html>