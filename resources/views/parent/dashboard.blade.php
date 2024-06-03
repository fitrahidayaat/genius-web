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
@if ($current_student)

    @section('content')
        <div class="py-10 px-8 flex flex-col gap-8">
            <div class="flex flex-col gap-10">
                <div class="flex justify-between items-center">
                    <h1 class="font-bold text-4xl">Progres Misi</h1>
                    <a href="/mission-progress?student={{ $current_student->id }}"
                        class="hover:text-primary transition-all">Lihat
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
                    <a class="hover:text-primary transition-all"
                        href="/leaderboard?student={{ $current_student->id }}">Lihat
                        semua</a>
                </div>
                @include('template.top-3-leaderboard')
            </div>
            <div class="h-10"></div>
            {{ $current_student_submissions }}
            <script>
                const submissions = @json($current_student_submissions);
                // Get the date a week ago
                // Get the date for each of the last 7 days
                let last7Days = Array.from({
                    length: 7
                }, (v, i) => {
                    let d = new Date();
                    d.setDate(d.getDate() - i);
                    return `${d.getDate()} ${["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"][d.getMonth()]} ${d.getFullYear()}`;
                }).reverse();

                // Prepare your data
                let dates = submissions.map(submission => {
                    let date = new Date(submission.created_at);
                    return `${date.getDate()} ${["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"][date.getMonth()]} ${date.getFullYear()}`;
                });

                let counts = {};
                dates.forEach(date => {
                    counts[date] = (counts[date] || 0) + 1;
                });

                let xValues = last7Days;
                let yValues = last7Days.map(date => counts[date] || 0);
                let barColors = xValues.map(() => 'green'); // Change this to the color you want

                // Create the chart
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
                        title: {
                            display: true,
                            text: "Student Submissions Count per Day (Last Week)"
                        }
                    }
                });
            </script>

        </div>
    @endsection

    @section('right-sidebar')
        @include('template.right-sidebar-parent')
    @endsection
@else
    @section('content')
        <div class="flex flex-col items-center mt-36">
            <h1 class="text-lg">Belum ada akun anak yang tertaut, berikan kode invitasi berikut kepada anak-anak anda</h1>
            <h1 class="text-4xl font-bold mt-5">{{ $user->teacher->code }}</h1>
        </div>
        <h1>{{ $page }}</h1>
    @endsection
    {{-- @section('right-sidebar')
        gaada
    @endsection --}}
@endif
