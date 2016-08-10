@extends('layouts.master')

@section('title', 'Home')

@section('content')
    <h1>Open pull requests</h1>
    @if(isset($error))
        {{ $error }}
    @else

        @include('shared.pagination')
        @include('shared.table-standard')
        @include('shared.pagination')

    @endif
@endsection