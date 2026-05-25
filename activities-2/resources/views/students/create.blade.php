<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<div class="sidebar">
    <h2></h2>
    <a href="{{ route('students.index') }}"> Dashboard</a>
    <a href="{{ route('students.create') }}"> Add Student</a>
</div>

<div class="main-content">
    <div class="container">
        <h1> Add New Student</h1>

        @if($errors->any())
            <div class="error">
                <ul>
                    @foreach($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('students.store') }}" method="POST">
            @csrf
            <label>Name:</label>
            <input type="text" name="name" required>

            <label>Course:</label>
            <input type="text" name="course" required>

            <label>Year Level:</label>
            <input type="number" name="year_level" required>

            <label>Email:</label>
            <input type="email" name="email" required>

            <label>Address:</label>
            <input type="text" name="address" required>

            <button type="submit"> Save Student</button>
        </form>

        <br>
        <a href="{{ route('students.index') }}">⬅ Back to List</a>
    </div>
</div>

</body>
</html>