<!-- resources/views/persons/show.blade.php -->

@include('layouts.app')

@section('title')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>

    </style>
</head>
<body>
    <h1>Person Details</h1>
    <p>Name : {{ $person->name }}</p>
    <p>UMK : {{ $person->umk->regency}}</p>
    <p>Job : {{ $person->job->title }}</p>
    <p>Sub Job : {{ $person->subJob->subtitle }}</p>

    <!-- Add links or forms for other actions (edit, delete, etc.) -->
    <a href="{{ route('persons.index') }}">Back to Persons List</a>

</body>
</html>
