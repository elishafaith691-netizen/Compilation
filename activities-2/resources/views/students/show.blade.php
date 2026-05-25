<!DOCTYPE html>
<html>
<head>
    <title>Student Details</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<!-- SIDEBAR -->
<div class="sidebar">
    <h2> </h2>
    <a href="{{ route('students.index') }}">Dashboard</a>
    <a href="{{ route('students.create') }}"> Add Student</a>
</div>

<!-- MAIN CONTENT -->
<div class="main-content">
    <div class="container">
        <h1>Student Details</h1>

        <p><b>ID:</b> {{ $student->id }}</p>
        <p><b>Name:</b> {{ $student->name }}</p>
        <p><b>Course:</b> {{ $student->course }}</p>
        <p><b>Year Level:</b> {{ $student->year_level }}</p>
        <p><b>Email:</b> {{ $student->email }}</p>
        <p><b>Address:</b> {{ $student->address }}</p>

        <br>
        <a href="{{ route('students.index') }}">⬅ Back to List</a>
    </div>
</div>

</body>
</html>