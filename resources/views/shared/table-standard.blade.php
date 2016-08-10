<div class="table-responsive">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Id</th>
            <th>Url</th>
            <th>Title</th>
            <th>Body</th>
            <th>Created at</th>
            <th>Updated at</th>
        </tr>
        </thead>
        <tbody>
        @foreach($results as $result)
            <tr>
                <td>{{ $result->id }}</td>
                <td><a target="_blank" href="{{ $result->url }}">{{ $result->url }}</a></td>
                <td>{{ $result->title }}</td>
                <td>{{ $result->body }}</td>
                <td>{{ $result->created_at }}</td>
                <td>{{ $result->updated_at }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>