<div class="mb-3">
    <style>
        #editor {
            height: 700px;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/styles/atom-one-dark.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/katex.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/katex.min.css" />

    <div id="editor">
    </div>

    <!-- Initialize Quill editor -->
    <script>
        const toolbarOptions = [
            ['bold', 'italic', 'underline', 'strike'], // toggled buttons
            ['blockquote', 'code-block'],
            ['link'],
            // ['link', 'image', 'video', 'formula'],

            [{
                'header': 1
            }, {
                'header': 2
            }], // custom button values
            [{
                'list': 'ordered'
            }, {
                'list': 'bullet'
            }, {
                'list': 'check'
            }],
            [{
                'script': 'sub'
            }, {
                'script': 'super'
            }], // superscript/subscript
            [{
                'indent': '-1'
            }, {
                'indent': '+1'
            }], // outdent/indent
            [{
                'direction': 'rtl'
            }], // text direction

            [{
                'size': ['small', false, 'large', 'huge']
            }], // custom dropdown
            [{
                'header': [1, 2, 3, 4, 5, 6, false]
            }],

            [{
                'color': []
            }, {
                'background': []
            }], // dropdown with defaults from theme
            [{
                'font': []
            }],
            [{
                'align': []
            }],

            ['clean'] // remove formatting button
        ];
        document.addEventListener('DOMContentLoaded', (e) => {
            const quill = new Quill('#editor', {
                modules: {
                    syntax: true,
                    toolbar: toolbarOptions,
                },
                placeholder: 'Start to write article..',
                theme: 'snow',
            });

            const qlEditor = quill.root;
            const inputContent = document.getElementById('content');

            const qlEditorObserver = new MutationObserver(() => {
                inputContent.value = qlEditor.innerHTML;
            });

            qlEditorObserver.observe(qlEditor, {
                characterData: true,
                subtree: true,
            });

            if (inputContent.value != null) {
                qlEditor.innerHTML = inputContent.value;
            }

        });
    </script>
</div>
