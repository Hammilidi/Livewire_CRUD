<div>
    {{-- The whole world belongs to you. --}}
    @if ($UpdateMode == 2)
        @include('livewire.update')
        {{-- @include('livewire.posts') --}}
    @elseif(!$UpdateMode)
        @include('livewire.create')
    @else
        @include('livewire.posts')
    @endif
    <table class="table table-bordered mt-5">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $value)
                <tr>
                    <td>{{ $value->id }}</td>
                    <td>{{ $value->name }}</td>
                    <td>{{ $value->email }}</td>

                    <td>
                        <button wire:click="edit({{ $value->id }})" class="btn btn-primary">Edit</button>
                        <button wire:click="delete({{ $value->id }})" class="btn btn-danger">Delete</button>
                        <button wire:click="posts({{ $value->id }})" class="btn btn-success">Posts</button>
                    </td>
                </tr>
            @endforeach
</div>
