@extends('layouts.child-other')

@section('title')
    Pengaturan
@endsection

@section('left-sidebar')
    @include('template.left-sidebar-child')
@endsection

@section('content')
    <div class=" flex flex-col">
        @if ($errors->any())
            <h1 class="text-white  px-5 pt-7 pb-5 bg-red-500 w-full transition-all">{{ $errors->first() }}</h1>
        @endif
        @if (session()->has('message'))
            <h1 class="text-white  px-5 pt-7 pb-5 bg-green-500 w-full transition-all">{{ session('message') }}</h1>
        @endif
        <div class="flex flex-col gap-10 py-10 px-8">
            <div class="flex justify-between items-center">
                <h1 class="font-bold text-4xl">Progres Misi</h1>
            </div>
            <div class="bg-white w-full rounded-3xl px-6 py-6 flex flex-col">

                <form class="flex flex-col gap-4" action="/edit-profile" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="flex flex-col items-center gap-3">
                        <p class="text-primary font-semibold text-lg">Edit Profil</p>
                        <label for="image" class="cursor-pointer">
                            <img class="rounded-full" id="image_preview" src="{{ asset('storage/' . $user->image_path) }}" alt=""
                                width="100" />
                        </label>
                        <input type="file" id="image" name="image" accept="image/*" class="hidden">
                        <script>
                            document.getElementById('image').onchange = function(e) {
                                // Create a file reader
                                var reader = new FileReader();
                                
                                // Read the image file as a data URL.
                                reader.readAsDataURL(this.files[0]);
                                // Set the image source to the data URL of the uploaded image
                                reader.onload = function(event) {
                                    console.log('tes');
                                    document.getElementById('image_preview').src = event.target.result;
                                };
                            };
                        </script>
                    </div>
                    <div class="flex flex-col gap-2">
                        <label for="name" class="font-semibold">Nama Lengkap</label>
                        <input required type="text" name="name" id="name"
                            class="input-text border py-3 px-5 rounded-full" value="{{ $user->name }}">
                    </div>
                    <div class="flex flex-col gap-2">
                        <label for="email" class="font-semibold">Email</label>
                        <input readonly type="email" name="email" id="email"
                            class="input-email border py-3 px-5 rounded-full" value="{{ $user->email }}">
                    </div>
                    <div class="flex flex-col gap-2">
                        <label for="old-password" class="font-semibold">Kata Sandi Lama</label>
                        <input required type="password" name="old-password" id="old-password"
                            class="input-old-password border py-3 px-5 rounded-full" value="">
                    </div>
                    <div class="flex flex-col gap-2">
                        <label for="new-password" class="font-semibold">Kata Sandi Baru</label>
                        <input required type="password" name="new-password" id="new-password"
                            class="input-new-password border py-3 px-5 rounded-full" value="">
                    </div>

                    <div class="flex justify-end gap-5">
                        <button class="bg-white border border-black rounded-full px-7 py-3 hover:bg-gray-200">Batal</button>
                        <button class="bg-primary border text-white rounded-full px-7 py-3 hover:bg-primary-darker"
                            type="submit">Simpan</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
