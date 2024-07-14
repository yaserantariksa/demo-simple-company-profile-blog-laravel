<x-website.layout.main>
    <x-slot:title>
        Blog
    </x-slot:title>

    <main class="container pb-5">
        <div class="pb-3">
            <h2>Tags</h2>
            <div class="d-flex flex-wrap gap-2">
                @foreach ($tags as $tag)
                    <span class="btn btn-primary btn-sm">#{{ $tag->title }}</span>
                @endforeach
            </div>
        </div>
        <div class=pb-3>
            <h2>Articles</h2>
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
            <div class="d-flex flex-column gap-3">
                @foreach ($articles as $article)
                    <div>
                        <div class="card">
                            <div class="card-header">
                                <h1 class="card-title">{{ $article->title }}</h1>
                                <p class="text-secondary fs-6">Written by {{ $article->user->name }}, publised at
                                    {{ $article->updated_at }}</p>
                            </div>
                            <div class="card-body row g-2">
                                @if ($article->featured_img)
                                    <div class="col-lg-4" style="max-height: 250px;">
                                        <img class="image-fluid w-100 h-100 object-fit-cover"
                                            src="{{ asset('storage/upload/' . $article->featured_img) }}"
                                            alt="{{ $article->title }}">
                                    </div>
                                @endif
                                <div class="mt-3 col">
                                    @if ($article->tags)
                                        <div class="d-flex gap-2">
                                            @foreach ($article->tags as $tag)
                                                <span>#{{ $tag->title }}</span>
                                            @endforeach
                                        </div>
                                    @endif
                                    <p>{!! Str::words($article->content, 40, ' >>>') !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="d-flex align-items-center justify-content-center">
            {{ $articles->links() }}
        </div>
    </main>

</x-website.layout.main>
