<x-app-layout>
    <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('ネットクイズ') }}
            </h2>
        </x-slot>
        @foreach ($quizzes as $quiz)
            <div>{{$quiz->quiz}}</div>
        @endforeach
    </x-app-layout>