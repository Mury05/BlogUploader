<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BlogUploader - @yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tiny.cloud/1/ghvru42l4s7gxo9wkfhapqwif5ee7xk762cfh392jwlcjyuf/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#content', // ID ou classe de l'élément textarea
            plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak code',
            toolbar: 'undo redo | styles | bold italic | alignleft aligncenter alignright | link image | code', // Ajouter le bouton d'image à la toolbar
            toolbar_mode: 'floating',
            height: 400,
            menubar: false,
            automatic_uploads: true, // Active le téléversement automatique
            images_upload_url: '/upload', // URL pour l'upload d'images
            file_picker_types: 'image', // Types de fichiers autorisés pour le picker
            file_picker_callback: function (callback, value, meta) {
                if (meta.filetype === 'image') {
                    var input = document.createElement('input');
                    input.setAttribute('type', 'file');
                    input.setAttribute('accept', 'image/*');
                    input.onchange = function () {
                        var file = this.files[0];
                        var reader = new FileReader();
                        reader.onload = function () {
                            // Appelle le callback pour insérer l'image
                            callback(reader.result, {
                                alt: file.name
                            });
                        };
                        reader.readAsDataURL(file);
                    };
                    input.click();
                }
            }
        });
    </script>

</head>

<body class="font-sans antialiased bg-gray-100 ">

    <div class="mx-auto">
        @section('header')
            {{-- This is the master header. --}}
        @show

        <div class="mt-5 mx-auto max-w-screen-2xl">
            <x-notifications.toast/>
            @yield('content')
        </div>
    </div>

</body>

</html>
