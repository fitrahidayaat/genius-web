@extends('layouts.child-other')

@section('title')
    Misi
@endsection

@section('left-sidebar')
    @include('template.left-sidebar-child')
@endsection

@section('content')
    @if ($errors->any())
        <h1 class="text-white  px-5 pt-7 pb-5 bg-red-500 w-full transition-all">{{ $errors->first() }}</h1>
    @endif
    <div class="py-10 px-8 flex flex-col gap-8 w-full">
        <div class="flex flex-col gap-10">
            <div class="flex justify-start items-center gap-5">
                <h1 class="font-bold text-4xl">Buat Misi</h1>
            </div>
        </div>
        <div class="bg-white rounded-3xl p-10 flex flex-col gap-8 items-center">
            <div class="flex flex-col items-center">
                <h1 class="text-primary font-bold text-2xl">{{ $mission->title }}</h1>
                <h2 class="text-lg font-semibold">Kategori {{ $mission->category }}</h2>
            </div>
            <div>
                <img src="{{ asset('storage/' . $mission->image_path) }}" alt=""
                    class="rounded-3xl object-contain w-[942px] h-[417px] bg-gray-100">
            </div>
            <div class="flex flex-col items-start justify-start w-full gap-2">
                <p class="font-bold">Perintah</p>
                <p>{{ $mission->description }}</p>
            </div>
            <div class="flex flex-col items-start justify-start w-full gap-2">
                <p class="font-bold">Deadline</p>
                <p>{{ date('l, j F Y, h:i A', strtotime($mission->due_date)) }}</p>
            </div>
            <div class="flex flex-col items-start justify-start w-full gap-2">
                <p class="font-bold">Poin</p>
                <p>{{ $mission->points }}</p>
            </div>
            <div class="flex flex-col items-start justify-start w-full gap-2">
                <p class="font-bold">Pembuat Misi</p>
                <p>{{ $mission->teacher->user->name }}</p>
            </div>
        </div>

        <div class="bg-white rounded-3xl p-10 flex flex-col gap-8 items-center w-full">
            <h1 class="text-primary text-3xl font-bold">Submission</h1>
            {{-- check submission status accepted, reject, or pending --}}
            @if ($submission == null)
                <form action="/submit-mission" method="post" class="w-full flex flex-col items-end gap-6"
                    enctype="multipart/form-data">
                    @csrf
                    {{-- check if already has a submission --}}
                    <label for="image"
                        class="w-full border-4 rounded-3xl border-dashed flex justify-center items-center flex-col py-5 h-72">
                        <img id="image_preview" src="/img/image-placeholder.png" alt="" class="">
                        <p class="img-link">Bukti Foto</p>
                    </label>
                    <input type="file" id="image" name="image" hidden accept="image/*">

                    <input type="number" name="mission_id" value={{ $mission->id }} hidden />
                    <input type="number" name="student_id" value={{ $user->student->id }} hidden />
                    <button type="submit" class="bg-primary hover:bg-primary-darker text-white rounded-full px-7 py-3">
                        Submit
                    </button>
                </form>
            @elseif ($submission->status == 'pending')
                <div class="flex w-full justify-between">
                    <a href="{{ asset('storage/' . $submission->file_path) }}"
                        class="text-primary hover:text-primary-darker hover:underline"
                        target="_blank">{{ $submission->file_path }}</a>
                    <h1 class=" text-yellow-500 text-lg">{{ $submission->comment }}</h1>
                </div>
            @elseif ($submission->status == 'rejected')
                <div class="flex w-full justify-between">
                    <a href="{{ asset('storage/' . $submission->file_path) }}"
                        class="text-primary hover:text-primary-darker hover:underline"
                        target="_blank">{{ $submission->file_path }}</a>
                    <h1 class="text-center text-red-500 text-lg">{{ $submission->comment }}</h1>
                </div>

                <form action="/submit-mission" method="post" class="w-full flex flex-col items-end gap-6"
                    enctype="multipart/form-data">
                    @csrf
                    {{-- check if already has a submission --}}
                    <label for="image"
                        class="w-full border-4 rounded-3xl border-dashed flex justify-center items-center flex-col py-5">
                        <img id="image_preview" src="/img/image-placeholder.png" alt="" class="">
                        <p class="img-link">Bukti Foto</p>
                    </label>
                    <input type="file" id="image" name="image" hidden accept="image/*">

                    <input type="number" name="mission_id" value={{ $mission->id }} hidden />
                    <input type="number" name="student_id" value={{ $user->student->id }} hidden />
                    <button type="submit" class="bg-primary hover:bg-primary-darker text-white rounded-full px-7 py-3">
                        Submit
                    </button>
                </form>
            @else
                <div class="flex w-full justify-between">
                    <a href="{{ asset('storage/' . $submission->file_path) }}"
                        class="text-primary hover:text-primary-darker hover:underline"
                        target="_blank">{{ $submission->file_path }}</a>
                    <h1 class=" text-green-500 text-lg">{{ $submission->comment }}</h1>
                </div>
            @endif
        </div>
    </div>

    <script>
        document.getElementById('image').onchange = function(e) {
            // Create a file reader
            let reader = new FileReader();

            // Read the image file as a data URL.
            reader.readAsDataURL(this.files[0]);
            // Set the image source to the data URL of the uploaded image
            reader.onload = function(event) {
                document.getElementById('image_preview').classList.add('hidden');
                const img_link = document.querySelector('.img-link');
                // name of the file
                img_link.innerHTML = e.target.files[0].name;
                img_link.classList.add('hover:text-primary', 'hover:underline', 'cursor-pointer');
                // save to cache
                localStorage.setItem('image', event.target.result);
                // make it when it's clicked, it will open the image by accessing the cache
                img_link.onclick = function() {
                    let win = window.open();

                    // // make it center
                    win.document.write(
                        '<style>body{background-color:black; display:flex; justify-content:center; align-items:center;}</style><img src="' +
                        localStorage
                        .getItem('image') + '" />');
                };
            };
        };
    </script>
@endsection
