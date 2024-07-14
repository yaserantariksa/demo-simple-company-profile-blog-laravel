<x-admin.layout.admin title="Tags" page="Tags" home="Dashboard" :homeurl="route('dashboard')">
    {{-- begin:New Tag Input --}}
    <div class="card">
        <div class="card-body">
            <form action="" method="post">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Add New Tag</label>
                    <input type="text" name="title" id="title"
                        class="form-control @error('title') is-invalid @enderror">
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <input type="submit" value="Save" class="btn btn-primary">
            </form>
        </div>
        {{-- end:New Tag Input --}}
        {{-- begin:Tag List Table --}}
        <div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 15px;">No</th>
                        <th>Tag Title</th>
                        <th class="text-center" style="width: 200px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($tags) != 0)
                        @foreach ($tags as $i => $tag)
                            <tr class="align-middle">
                                <td class="text-center">{{ $i + 1 }}</td>
                                <td>{{ $tag->title }}</td>
                                <td class="text-center">
                                    <a href="{{ route('tags.destroy', $tag->slug) }}" class="btn btn-danger"
                                        data-confirm-delete="true">Delete</a>

                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="3" class="text-center">Tag data is not exist yet! </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
        {{-- end:Tag List Table --}}
    </div>
    {{-- end:New Tag Input --}}
</x-admin.layout.admin>
