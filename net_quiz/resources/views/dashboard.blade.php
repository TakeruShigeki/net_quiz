<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('問題一覧') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="bg-blue-100 rounded max-w-6xl py-20 mx-auto">
            <a href="{{route('mobileQuizIndex')}}">

            
        <div class="text-blue-600 text-4xl font-bold text-center my-20 ">モバイルクイズ</div>
        </a>
        <a href="{{route('netQuizIndex')}}">
        <div class="text-blue-600 text-4xl font-bold text-center my-20">ネットクイズ</div>
        </a>
        <a href="">
        <div class="text-blue-600 text-4xl font-bold text-center my-20">お気に入り</div>
        </a>
        </div>
        
    </div>
</x-app-layout>
