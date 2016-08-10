@extends('layouts.master')

@section('title', 'Past releases')

@section('content')
    <h1>Past releases</h1>

    @if(isset($error))
        {{ $error }}
    @else

        @include('shared.pagination')
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Zipball url</th>
                    <th>Tarball Url</th>
                </tr>
                </thead>
                <tbody>
                @foreach($results as $result)
                    <tr>
                        <td>{{ $result->name }}</td>
                        <td><a target="_blank" href="{{ $result->zipball_url }}">{{ $result->zipball_url }}</a></td>
                        <td><a target="_blank" href="{{ $result->tarball_url }}">{{ $result->tarball_url }}</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        @include('shared.pagination')

    @endif
@endsection