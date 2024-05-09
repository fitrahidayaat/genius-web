@extends('layouts.parent-other')

@section('title')
    Misi
@endsection

@section('left-sidebar')
    @include('template.left-sidebar-parent')
@endsection

@section('content')
    <div class="py-10 px-8 flex flex-col gap-8">
        <div class="flex flex-col gap-10">
            <div class="flex justify-start items-center gap-5">
                <h1 class="font-bold text-4xl">Buat Misi</h1>
            </div>
        </div>
        <div class="bg-white rounded-3xl p-10 flex flex-col gap-8 items-center">
            <form action="/create-mission" method="post" enctype="multipart/form-data" class="flex flex-col gap-5">
                @csrf
                <label for="image">
                    <img id="image_preview" src="{{ asset('/storage/default-mission.jpg') }}" alt=""
                        class="rounded-3xl object-contain w-[942px] h-[417px] bg-gray-100">
                </label>
                <input type="file" id="image" name="image" hidden accept="image/*">
                <script>
                    document.getElementById('image').onchange = function(e) {
                        // Create a file reader
                        var reader = new FileReader();

                        // Read the image file as a data URL.
                        reader.readAsDataURL(this.files[0]);
                        // Set the image source to the data URL of the uploaded image
                        reader.onload = function(event) {
                            document.getElementById('image_preview').src = event.target.result;
                        };
                    };
                </script>

                <div class="flex flex-col gap-3">
                    <label for="title" class="font-bold text-xl">Judul Misi</label>
                    <input required type="text" name="title" id="title"
                        class="input-text border py-3 px-5 rounded-full w-full border-gray-300">
                </div>

                {{-- category --}}
                <div class="flex flex-col gap-3">
                    <label for="category" class="font-bold text-xl">Kategori</label>
                    <select required name="category" id="category"
                        class="input-text border py-3 px-5 rounded-full w-full border-gray-300">
                        <option value="Belajar">Belajar</option>
                        <option value="Bermain">Perawatan</option>
                        <option value="Beribadah">Beribadah</option>
                    </select>
                </div>

                {{-- description --}}
                <div class="flex flex-col gap-3">
                    <label for="description" class="font-bold text-xl">Deskripsi</label>
                    <textarea required name="description" id="description"
                        class="input-text border py-3 px-5 rounded-lg w-full border-gray-300"></textarea>
                </div>

                {{-- deadline with complete data, including the hours --}}
                <div class="flex flex-col gap-3">
                    <label for="deadline" class="font-bold text-xl">Tanggal Deadline</label>
                    <input required type="date" name="date" id="deadline"
                        class="input-text border py-3 px-5 rounded-full w-full border-gray-300">
                </div>

                <div class="flex flex-col gap-3">

                    <label for="deadline" class="font-bold text-xl">Waktu Deadline</label>
                    <input required type="time" name="time" id="deadline"
                        class="input-text border py-3 px-5 rounded-full w-full border-gray-300">
                </div>

                <div class="flex flex-col gap-3">
                    <label for="point" class="font-bold text-xl">Poin</label>
                    <input type="number" min="0" value="0" name="point" id="point"
                        class="input-text border py-3 px-5 rounded-full w-full border-gray-300">
                </div>

                <div class="flex justify-end gap-5">
                    <button class="border px-8 py-3 rounded-full border-black hover:bg-slate-200">Batal</button>
                    <button type="submit"
                        class="bg-primary hover:bg-primary-darker text-white px-8 py-3 rounded-full">Simpan Misi</button>
                </div>

            </form>

        </div>

    </div>
@endsection
