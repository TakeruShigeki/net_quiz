<x-app-layout>

    @php
        $app_img="img/background01.jpg";
    @endphp
    <div class="min-h-screen
    bg-no-repeat bg-cover bg-center"
    style="background-attachment: fixed;background-image:url('{{ asset($app_img) }}')">
    <h2 class="font-semibold text-5xl leading-tight text-center text-shadow1">
        {{ __('モバイルクイズ') }}
    </h2>

@foreach ($quizzes as $quiz)
<div class="ml-64 leading-[6rem]">
    <a href="{{route('mobileQuizShow',[$quiz])}}">
        <span class="hover:text-blue-500 text-4xl font-semibold text-shadow1">・{{$quiz->quiz}}</span>
    </a>
</div>

    {{-- @foreach($quiz->choices as $choice)
    <div class=" bg-red-300">{{$choice->choice}}</div>

    @endforeach --}}
@endforeach

    </div>
        
    
</x-app-layout>