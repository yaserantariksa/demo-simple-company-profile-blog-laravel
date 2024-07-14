<x-admin.layout.admin title="Articles" page="Articles" home="Dashboard" :homeurl="route('dashboard')">
    <div class="mb-3">
        <div class="card">
            <div class="card-body">
                <form action="" method="get">
                    <input type="text" name="search" id="search" class="form-control mb-3"
                        value="{{ $search }}">
                    <input type="submit" value="Search" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
    {{-- begin:Article List Table --}}
    {{-- begin:Tag List Table --}}
    <div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="width: 15px;">No</th>
                    <th>Article Title</th>
                    <th style="width: 200px">Tags</th>
                    <th style="width: 120px;">Updated at</th>
                    <th style="width: 100px;">Status</th>
                    <th class="text-center" style="width: 100px;">Action</th>
                </tr>
            </thead>
            <tbody>
                @if (count($articles) != 0)
                    @foreach ($articles as $i => $article)
                        <tr class="align-middle">
                            <td class="text-center">{{ $i + 1 }}</td>
                            <td><a href="{{ route('articles.show', $article->slug) }}">{{ $article->title }}</a>
                            </td>
                            <td>
                                @foreach ($article->tags as $tag)
                                    #{{ $tag->title }},
                                @endforeach
                            </td>
                            <td>{{ $article->updated_at }}</td>
                            <td>{{ $article->is_draft ? 'Draft' : 'Published' }}</td>
                            <td class="text-center">
                                <a href="{{ route('articles.edit', $article->slug) }}"
                                    class="btn btn-primary ms-auto">Edit</a>
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
        {{ $articles->links() }}
    </div>
    {{-- end:Tag List Table --}}
    {{-- end:Article List Table --}}
</x-admin.layout.admin>
