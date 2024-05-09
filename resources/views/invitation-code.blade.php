@extends('layouts.auth')

@section('title')
    Registrasi
@endsection

@section('content')
    <main class="flex flex-col justify-center items-center my-10">
        <div class="rounded-3xl bg-white px-10 py-20 flex flex-col gap-6">
            <h1 class="font-bold text-4xl text-center">Kode Invite</h1>
            <form method="post" action="/invitation-code" class="flex flex-col gap-3 w-full">
                @csrf
                <label for="code">Kode</label>
                <input id="code" type="text" name="code" class="border rounded-full w-96 px-5 py-3 text-xl" required>
                @if ($errors->any())
                    <h1 class="text-red-500">{{ $errors->first() }}</h1>
                    
                @endif
                <button type="submit" class="mt-5 bg-primary text-white rounded-full py-4 hover:bg-primary-darker">Lanjutkan</button>
            </form>
        </div>
    </main>
@endsection
