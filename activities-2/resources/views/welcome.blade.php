@extends('layouts.app')

@section('content')

<h1>Dashboard</h1>

<h3>Total Students: {{ $totalStudents }}</h3>

<table>
@foreach($students as $student)
<tr>
    <td>{{ $student->name }}</td>
    <td>{{ $student->course }}</td>
</tr>
@endforeach
</table>

@endsection