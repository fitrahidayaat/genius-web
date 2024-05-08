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
                <h1 class="font-bold text-4xl">Misi Dibuat</h1>
            </div>
        </div>
        <div class="bg-white rounded-3xl p-10 flex flex-col gap-8">
            <button
                class="flex justify-between items-center w-full bg-primary rounded-full hover:bg-primary-darker py-5 px-5 text-white">
                <div></div>
                <div>Buat Misi Baru</div>
                <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M18.3875 16.37H15.6085V19.303H14.3835V16.37H11.6185V15.236H14.3835V12.31H15.6085V15.236H18.3875V16.37Z"
                        fill="white" />
                    <rect x="0.5" y="0.5" width="29" height="29" rx="14.5" stroke="white" />
                </svg>

            </button>
            @foreach ($created_missions_category_based as $category => $missions)
                <div class="flex flex-col gap-5">
                    <h1 class="font-bold text-3xl">Misi {{ $category }}</h1>
                    <div class="flex flex-wrap">
                        @foreach ($missions as $mission)
                            <a class="flex flex-col items-center gap-3 hover:shadow-lg hover:text-primary-darker transition-all rounded-3xl p-5"
                                href="">
                                <img src="{{ asset('storage/' . $mission->image_path) }}" alt="" width="150"
                                    class="rounded-3xl">
                                <h2 class="font-semibold max-w-[150px] text-center">{{ $mission->title }}</h2>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>

    </div>
@endsection
