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

            <div class="w-full flex justify-end">
                <button class="bg-primary hover:bg-primary-darker text-white px-8 py-3 rounded-full">Edit Misi</button>
            </div>
        </div>

        <div class="bg-white rounded-3xl p-10 flex flex-col gap-8 items-center">
            <h1 class="text-primary font-bold text-2xl">
                Submissions
                {{-- {{ $submissions }} --}}
            </h1>
            <div class="flex flex-col w-full gap-5">
                @if ($submissions->where('status', 'pending')->count() == 0)
                    <h1 class="text-center">Belum ada pending submission</h1>
                @else
                    @foreach ($submissions->where('status', 'pending') as $submission)
                        <button
                            class="question-box shadow-md transition-all flex flex-col w-full border rounded-3xl px-12 pt-8 pb-4 gap-2 detail-submission-button">
                            <div class="flex justify-between w-full items-center ">
                                <p>{{ $submission->student->user->name }}</p>
                                <svg class="arrow-down" width="17" height="10" viewBox="0 0 17 10" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 1L8.5 9L16 1" stroke="black" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                                <svg class="hidden arrow-up" width="17" height="10" viewBox="0 0 17 10"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16 9L8.5 1L1 9" stroke="black" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </div>

                            <div class="flex invisible answer h-0 detail-submission transition-all flex-col w-full">
                                <div
                                    class="invisible answer-text transition-all opacity-0 flex flex-col gap-3 w-full items-start">
                                    <a href="{{ asset('storage/' . $submission->file_path) }}"
                                        class="hover:underline text-primary hover:text-primary-darker">
                                        {{ $submission->file_path }}
                                    </a>
                                    <div class="flex gap-2 justify-end w-full">
                                        <form action="/submission-accept" method="post">
                                            @csrf
                                            <input type="number" name="id" value={{ $submission->id }} hidden>
                                            <input
                                                class="bg-green-500 hover:bg-green-600 px-5 py-2 text-white rounded-full cursor-pointer"
                                                type="submit" value="Terima"></input>
                                        </form>
                                        <form action="/submission-reject" method="post">
                                            @csrf
                                            <input type="number" name="id" value={{ $submission->id }} hidden>
                                            <input
                                                class="bg-red-500 hover:bg-red-600 px-5 py-2 text-white rounded-full cursor-pointer"
                                                type="submit" value="Tolak"></input>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </button>
                    @endforeach
                @endif
                <script type="text/javascript">
                    const questionBoxes = document.querySelectorAll('.question-box');
                    questionBoxes.forEach((questionBox) => {
                        questionBox.addEventListener('click', () => {
                            const answer = questionBox.querySelector('.answer');
                            const arrowUp = questionBox.querySelector('.arrow-up');
                            const arrowDown = questionBox.querySelector('.arrow-down');
                            const answerText = questionBox.querySelector('.answer-text');
                            const acceptButton = questionBox.querySelector('.accept-button');
                            const rejectButton = questionBox.querySelector('.reject-button');

                            answerText.classList.toggle('opacity-0');
                            answerText.classList.toggle('invisible');
                            answer.classList.toggle('h-0');
                            questionBox.classList.toggle('pb-4');
                            questionBox.classList.toggle('pb-8');
                            answer.classList.toggle('invisible');
                            arrowUp.classList.toggle('hidden');
                            arrowDown.classList.toggle('hidden');
                            acceptButton.classList.toggle('invisible');
                            rejectButton.classList.toggle('invisible');
                            acceptButton.classList.toggle('opacity-0');
                            rejectButton.classList.toggle('opacity-0');
                        });
                    });
                </script>
            </div>
        </div>



    </div>
@endsection
