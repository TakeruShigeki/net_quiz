<x-app-layout>
    <x-slot name="header">
        
            問題作成
        
        <x-message :message="session('message')" />
    </x-slot>
    
        {{-- 最初に作成した部分 --}}
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mx-4 sm:p-8">
            <form method="post" action="{{route('quiz.store')}}" enctype="multipart/form-data">
            @csrf
                    <div class="md:flex items-center mt-8">
                        <div class="w-full flex flex-col">
                        <label for="quiz" class="font-semibold leading-none mt-4">問題文</label>
                        <textarea name="quiz" id="quiz" cols="30" rows="10" required></textarea>
                        
                        </div>
                    </div>
                    @php
            $choicesId=array(
                '1'=>'choices1',
                '2'=>'choices2',
                '3'=>'choices3',
                '4'=>'choices4',);
            @endphp
            @foreach( $choicesId as $key=>$choice)
            {{$key}}
            <input type="checkbox" name={{$key}}>
            <textarea name={{$choice}} class="w-auto py-2 placeholder-gray-300 border border-gray-300 rounded-md" rows="1" required></textarea>
            @endforeach

                    
                    <x-primary-button class="mt-4">
                        送信する
                    </x-primary-button>
                    
                </form>
            </div>
        </div>
        {{-- 最初に作成した部分ここまで --}}

</x-app-layout>