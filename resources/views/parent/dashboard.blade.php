@extends('layouts.parent-home')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
@section('title')
    Dashboard
@endsection

@section('page')
    dashboard
@endsection

@section('left-sidebar')
    @include('template.left-sidebar-parent')
@endsection

@section('content')
    <div class="py-10 px-8 flex flex-col gap-8">
        <div class="flex flex-col gap-10">
            <div class="flex justify-between items-center">
                <h1 class="font-bold text-4xl">Progres Misi</h1>
                <a href="/mission-progress?student={{ $current_student->id }}" class="hover:text-primary transition-all">Lihat
                    semua</a>
            </div>
            <div class="flex gap-6">
                <a href="/mission-progress?student={{ $current_student->id }}#completed"
                    class="flex flex-col h-48 w-72 justify-center items-center bg-white hover:shadow-xl transition-all rounded-3xl gap-2">
                    <span class="text-green-600 font-bold text-5xl">{{ $student->completedMissions->count() }}</span>
                    <span>Misi Selesai</span>
                </a>
                <a href="/mission-progress?student={{ $current_student->id }}#ongoing"
                    class="flex flex-col h-48 w-72 justify-center items-center bg-white hover:shadow-xl transition-all rounded-3xl gap-2">
                    <span class="text-yellow-600 font-bold text-5xl">{{ $student->ongoingMissions->count() }}</span>
                    <span>Misi Berjalan</span>
                </a>
                <a href="/mission-progress?student={{ $current_student->id }}#failed"
                    class="flex flex-col h-48 w-72 justify-center items-center bg-white hover:shadow-xl transition-all rounded-3xl gap-2">
                    <span class="text-red-600 font-bold text-5xl">{{ $student->failedMissions->count() }}</span>
                    <span>Misi Gagal</span>
                </a>
            </div>
        </div>

        <div class="flex flex-col gap-10">
            <div class="flex justify-between items-center">
                <h1 class="font-bold text-4xl">Monitoring</h1>
            </div>
            <div class="bg-white w-full flex justify-center px-6 py-10 rounded-3xl">
                <canvas id="monitor-chart" style="width:100%;max-width:700px"></canvas>
            </div>
        </div>

        <div class="flex flex-col gap-10">
            <div class="flex justify-between items-center">
                <h1 class="font-bold text-4xl">Leaderboard</h1>
                <a class="hover:text-primary transition-all" href="/leaderboard?student={{ $current_student->id }}">Lihat
                    semua</a>
            </div>
            @include('template.top-3-leaderboard')
        </div>
        <div class="h-10"></div>
    </div>

    <script>
        const xValues = ["Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu", "Minggu"];
        const yValues = [10, 7, 12, 9, 3, 18, 1];
        const barColors = ["red", "green", "blue", "orange", "brown", "yellow", "purple"];

        new Chart("monitor-chart", {
            type: "bar",

            data: {
                labels: xValues,
                datasets: [{
                    backgroundColor: barColors,
                    data: yValues
                }]
            },
            options: {
                legend: {
                    display: false
                },
            }
        });
    </script>
@endsection

@section('right-sidebar')
    @include('template.right-sidebar-parent')
@endsection
