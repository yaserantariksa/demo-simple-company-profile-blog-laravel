<x-admin.layout.admin title="{{ $article->title }}" page="Edit Article" home="Article" :homeurl="route('articles.show', $article->slug)">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('articles.update', $article->slug) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" id="title"
                        class="form-control @error('title') is-invalid @enderror"
                        value="{{ old('title', $article->title) }}">
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <input type="text" name="user_id" value="{{ auth()->user()->id }}" hidden>
                <div class="mb-3">
                    <label for="featured_img" class="form-label">Featured Image</label>
                    <input type="file" name="featured_img" id="featured_img"
                        class="form-control @error('featured_img') is-invalid @enderror">
                    @error('featured_img')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <img src="{{ $article->featured_img ? asset('/storage/upload/' . $article->featured_img) : asset('/placeholder.png') }}"
                        alt="placeholder" class="my-3 img-thumbnail rounded mx-auto d-block" style="width: 300px;"
                        id="featured-image">
                </div>
                <div class="mb-3">
                    <label for="video_url" class="form-label">Video URL</label>
                    <input type="video_url" name="video_url" id="video_url"
                        class="form-control @error('video_url') is-invalid @enderror"
                        value="{{ old('video_url', $article->video_url) }}">
                    @error('video_url')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <textarea name="content" id="content" class="form-control @error('content') is-invalid @enderror" hidden>{{ old('content', $article->content) }}</textarea>
                    <x-admin.editor />
                    @error('content')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <select class="form-select mb-3" name="tags[]" id="tags" multiple aria-label="tags select">
                    <option disabled>Select tags... ( multiple: press CTRL + click )</option>
                    @foreach ($tags as $t)
                        <option value="{{ $t->id }}"
                            @if (old('tags', $article->tags) != null) @foreach (old('tags', $existing_tags_id) as $otid)
                            @if ($otid == $t->id)
                            {{ 'selected' }} @endif
                            @endforeach
                    @endif
                    >
                    {{ $t->title }}</option>
                    @endforeach
                </select>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" name="is_draft" id="is_draft"
                        onchange="isDraftChecked()" {{ old('is_draft', $article->is_draft) == null ? '' : 'checked' }}>
                    <label class="form-check-label" for="is_draft">
                        Draft
                    </label>
                </div>
                <input type="submit" class="btn btn-primary" id="publish_button">
            </form>
        </div>
    </div>
    {{-- and:Add New Artiicle Form --}}

    <script>
        // begin: Script to preview picked featured image
        const imagePicker = document.getElementById('featured_img');
        const imagePreviewer = document.getElementById('featured-image');

        imagePicker.onchange = e => {
            const [file] = imagePicker.files;
            if (file) {
                imagePreviewer.src = URL.createObjectURL(file);
            }
        }
        // end: Script to preview picked featured image

        // begin:Scripts to change value of submit button when checkbos is checked
        const isDraftCheckbox = document.getElementById('is_draft');
        const publishButton = document.getElementById('publish_button');

        if (isDraftCheckbox.checked == true) {
            publishButton.value = "Save as Draft";
        } else {
            publishButton.value = "Publish";
        }

        function isDraftChecked() {
            if (isDraftCheckbox.checked == true) {
                publishButton.value = "Save as Draft";
            } else {
                publishButton.value = "Publish";
            }
        }
        // end:Scripts to change value of submit button when checkbos is checked
    </script>
</x-admin.layout.admin>
