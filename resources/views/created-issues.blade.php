@extends('layouts.master')

@section('title', 'Created issues')



@section('content')
    <h1>Created Issues</h1>

    @if(isset($error))
        {{ $error }}
    @else
        @include('shared.pagination')
        @include('shared.table-standard')
        @include('shared.pagination')
    @endif
@endsection