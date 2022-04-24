<div>
    <h2 class="text-center">Posts</h2>
    <table class="table table-bordered mt-5">
        <thead>
            <tr>
                <th>No</th>
                <th>Title</th>
                <th>Message</th>
            </tr>
        </thead>
        <tbody>
            {{-- {{ $posts }} --}}
            @foreach ($posts as $value)
                <tr>
                    <td>{{ $value->id }}</td>
                    <td>{{ $value->title }}</td>
                    <td>{{ $value->message }}</td>
                </tr>
            @endforeach
</div>
