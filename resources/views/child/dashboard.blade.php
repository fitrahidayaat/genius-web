@extends('layouts.child-home')

@section('title')
    Dashboard
@endsection

@section('left-sidebar')
    @include('template.left-sidebar-child')
@endsection

@section('content')
    <div class="py-10 px-8 flex flex-col gap-8">
        <div class="flex flex-col gap-10">
            <div class="flex justify-between items-center">
                <h1 class="font-bold text-4xl">Leaderboard</h1>
                <a class="hover:text-primary transition-all" href="/leaderboard">Lihat
                    semua</a>
            </div>
            @include('template.top-3-leaderboard')
        </div>

        <div class="py-10 flex flex-col gap-8">
            <div class="flex flex-col gap-10">
                <div class="flex justify-start items-center gap-5">
                    <h1 class="font-bold text-4xl">Progres Misi</h1>
                </div>
            </div>

            <div class="flex flex-col bg-white rounded-3xl px-10 py-7 gap-5" id="completed">
                <h1 class="font-bold text-3xl">Misi Selesai</h1>
                <div class="flex flex-wrap">
                    @if (count($completed_missions) == 0)
                        <h1 class="text-center w-full">Tidak ada misi yang selesai</h1>
                    @endif
                    @foreach ($completed_missions as $mission)
                        <a class="flex flex-col items-center gap-3 hover:shadow-lg hover:text-primary-darker transition-all rounded-3xl p-5"
                            href="detail-mission?mission={{ $mission->id }}">
                            <img src="{{ asset('storage/' . $mission->image_path) }}" alt="" width="150"
                                height="150" class="rounded-3xl h-[150px] w-[150px] object-cover">
                            <h2 class="font-semibold max-w-[150px] text-center">{{ $mission->title }}</h2>
                        </a>
                    @endforeach
                </div>
            </div>

            <div class="flex flex-col bg-white rounded-3xl px-10 py-7 gap-5" id="ongoing">
                <h1 class="font-bold text-3xl">Misi Berjalan</h1>
                <div class="flex flex-wrap">
                    @if (count($ongoing_missions) == 0)
                        <h1 class="text-center w-full">Tidak ada misi yang berjalan</h1>
                    @endif
                    @foreach ($ongoing_missions as $mission)
                        <a class="flex flex-col items-center gap-3 hover:shadow-lg hover:text-primary-darker transition-all rounded-3xl p-5"
                            href="detail-mission?mission={{ $mission->id }}">
                            <img src="{{ asset('storage/' . $mission->image_path) }}" alt="" width="150"
                                height="150" class="rounded-3xl h-[150px] w-[150px] object-cover">
                            <h2 class="font-semibold max-w-[150px] text-center">{{ $mission->title }}</h2>
                        </a>
                    @endforeach
                </div>
            </div>

            <div class="flex flex-col bg-white rounded-3xl px-10 py-7 gap-5" id="failed">
                <h1 class="font-bold text-3xl">Misi Gagal</h1>
                <div class="flex flex-wrap">
                    @if (count($failed_missions) == 0)
                        <h1 class="text-center w-full">Tidak ada misi yang gagal</h1>
                    @endif
                    @foreach ($failed_missions as $mission)
                        <a class="flex flex-col items-center gap-3 hover:shadow-lg hover:text-primary-darker transition-all rounded-3xl p-5"
                            href="detail-mission?mission={{ $mission->id }}">
                            <img src="{{ asset('storage/' . $mission->image_path) }}" alt="" width="150"
                                height="150" class="rounded-3xl h-[150px] w-[150px] object-cover">
                            <h2 class="font-semibold max-w-[150px] text-center">{{ $mission->title }}</h2>
                        </a>
                    @endforeach
                </div>
            </div>


        </div>
    </div>
@endsection

@section('right-sidebar')
    @include('template.right-sidebar-child')
@endsection
