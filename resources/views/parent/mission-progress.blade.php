@extends('layouts.parent-home')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
@section('title')
    Mission Progress
@endsection

@section('page')
    Mission Progress
@endsection

@section('left-sidebar')
    @include('template.left-sidebar-parent')
@endsection

@section('content')
    <div class="py-10 px-8 flex flex-col gap-8">
        <div class="flex flex-col gap-10">
            <div class="flex justify-start items-center gap-5">
                <a href="/dashboard?student={{ $current_student->id }}">
                    <svg width="24" height="16" viewBox="0 0 24 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M0.292893 7.29289C-0.097631 7.68342 -0.0976311 8.31658 0.292893 8.7071L6.65685 15.0711C7.04738 15.4616 7.68054 15.4616 8.07107 15.0711C8.46159 14.6805 8.46159 14.0474 8.07107 13.6569L2.41421 8L8.07107 2.34314C8.46159 1.95262 8.46159 1.31946 8.07107 0.928931C7.68054 0.538406 7.04738 0.538406 6.65685 0.928931L0.292893 7.29289ZM24 7L1 7L1 9L24 9L24 7Z"
                            fill="black" />
                    </svg>
                </a>
                <h1 class="font-bold text-4xl">Progres Misi</h1>
            </div>
        </div>

        <div class="flex flex-col bg-white rounded-3xl px-10 py-7 gap-5" id="completed">
            <h1 class="font-bold text-3xl">Misi Selesai</h1>
            <div class="flex flex-wrap">
                @foreach ($current_student_completed_missions as $mission)
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
                @foreach ($current_student_ongoing_missions as $mission)
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
                @foreach ($current_student_failed_missions as $mission)
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
@endsection

@section('right-sidebar')
    @include('template.right-sidebar-parent')
@endsection
