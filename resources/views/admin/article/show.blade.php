<x-admin.layout.admin title="{{ $article->title }}" page="Article" home="Articles" :homeurl="route('articles.index')">
    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h1 class="card-title fs-2">Title: {{ $article->title }}</h1>
            <div class="ms-auto">
                <a href="{{ route('articles.edit', $article->slug) }}" class="btn btn-primary">Edit</a>
                <a href="{{ route('articles.destroy', $article->slug) }}" class="btn btn-danger"
                    data-confirm-delete="true">Delete</a>
            </div>
        </div>
        <div class="card-body">
            <div class="mb-3">
                @foreach ($article->tags as $t)
                    <span class="btn btn-warning btn-sm">{{ $t->title }}</span>
                @endforeach
            </div>
            <p class="text-secondary">
                Written by {{ $article->user->name }},
                {{ $article->is_draft ? 'save as draft' : 'published' }} at
                {{ $article->updated_at }}
            </p>
            <div class="container mb-3 d-flex flex-wrap align-items-center justify-content-center gap-2">
                @if ($article->featured_img)
                    <img src="{{ asset('storage/upload/' . $article->featured_img) }}" alt="{{ $article->title }}"
                        class="img-fluid object-fit-cover border rounded" style="width: 560px; height: 315px;">
                @endif
                @if ($video_key)
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $video_key }}"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                @endif
            </div>
            <article>
                {!! $article->content !!}
            </article>
        </div>
    </div>
</x-admin.layout.admin>
