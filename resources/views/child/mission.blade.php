@extends('layouts.child-other')

@section('title')
    Misi
@endsection

@section('left-sidebar')
    @include('template.left-sidebar-child')
@endsection

@section('content')
<div class="py-10 px-8 flex flex-col gap-8">
    <div class="flex flex-col gap-10">
        <div class="flex justify-start items-center gap-5">
            <h1 class="font-bold text-4xl">Pilih Misi</h1>
        </div>
    </div>

    <div class="bg-white rounded-3xl p-10 flex flex-col gap-8">
        {{-- <h1>{{ $untaken_missions_category_based['Belajar'] }}</h1> --}}
        @if (count($untaken_missions_category_based) == 0)
            <h1 class="text-center">Tidak ada misi yang tersedia</h1>
        @endif
        @foreach ($untaken_missions_category_based as $category => $missions)
            <div class="flex flex-col gap-5">
                <h1 class="font-bold text-3xl">Misi {{ $category }}</h1>
                <div class="flex flex-wrap">
                    @foreach ($missions as $mission)
                        <a class="flex flex-col items-center gap-3 hover:shadow-lg hover:text-primary-darker transition-all rounded-3xl p-5"
                            href="detail-mission?mission={{ $mission->id }}">
                            <img src="{{ asset('storage/' . $mission->image_path) }}" alt="" width="150" height="150" class="rounded-3xl object-cover bg-gray-50 h-[150px] w-[150px]">
                            <h2 class="font-semibold max-w-[150px] text-center">{{ $mission->title }}</h2>
                        </a>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>


</div>
@endsection

@section('right-sidebar')
    @include('template.right-sidebar-child')
@endsection
