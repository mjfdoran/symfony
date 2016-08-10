@extends('layouts.master')

@section('title', 'Commit statistics')

@section('content')
    <h1>Commit statistics</h1>
    @if(isset($error))
        {{ $error }}
    @else
        <p>The total number of commits in the last 12 months is: {{ $results['thisWeeksCommits'] }}</p>
        <p>The total number of commits in the last 12 months is: {{ $results['thisYearsCommits'] }}</p>
        <p>The average number of commits a week in the last 12 months is: {{ $results['averageWeeklyCommits'] }}</p>
    @endif
@endsection
