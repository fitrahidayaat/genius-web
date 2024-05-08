@extends('layouts.child-other')

@section('title')
    Bantuan
@endsection

@section('left-sidebar')
    @include('template.left-sidebar-child')
@endsection
<style>

</style>
@section('content')
    <div class="w-full flex flex-col gap-6 py-10 px-8">
        <h1 class="font-bold text-4xl">FAQ</h1>

        @foreach ($qna_pairs as $qna)
            <button
                class="question-box w-full bg-white px-12 pt-8 pb-4  flex rounded-xl shadow-md flex-col gap-3 transition-all">
                <div class="flex justify-between w-full items-center">
                    <p class="transition-all font-bold question text-2xl">{{ $qna['question'] }}</p>
                    <svg class="arrow-down" width="17" height="10" viewBox="0 0 17 10" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 1L8.5 9L16 1" stroke="black" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                    <svg class="hidden arrow-up" width="17" height="10" viewBox="0 0 17 10" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M16 9L8.5 1L1 9" stroke="black" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>

                </div>
                <div class="invisible answer transition-all h-0">
                    <p class="invisible answer-text transition-all text-xl text-left opacity-0">{{ $qna['answer'] }}</p>
                </div>
            </button>
        @endforeach


        <script>
            const questionBoxes = document.querySelectorAll('.question-box');
            questionBoxes.forEach((questionBox) => {
                questionBox.addEventListener('click', () => {
                    const question = questionBox.querySelector('.question');
                    const answer = questionBox.querySelector('.answer');
                    const arrowUp = questionBox.querySelector('.arrow-up');
                    const arrowDown = questionBox.querySelector('.arrow-down');
                    const answerText = questionBox.querySelector('.answer-text');

                    answerText.classList.toggle('opacity-0');
                    answerText.classList.toggle('invisible');
                    answer.classList.toggle('h-0');
                    questionBox.classList.toggle('pb-4');
                    questionBox.classList.toggle('pb-8');
                    answer.classList.toggle('invisible');
                    question.classList.toggle('text-primary');
                    arrowUp.classList.toggle('hidden');
                    arrowDown.classList.toggle('hidden');
                });
            });
        </script>
    </div>
@endsection
