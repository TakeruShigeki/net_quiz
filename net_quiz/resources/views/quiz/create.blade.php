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
                    <p>1</p>
                    <input type="text" name="choice1">
                    <input type="checkbox" name="1">
                    解説
                    <input type="text" name="5">
                    <p>2</p>
                    <input type="text" name="choice2">
                    <input type="checkbox" name="2" >
                    解説
                    <input type="text" name="6">
                    <p>3</p>
                    <input type="text" name="choice3">
                    <input type="checkbox" name="3" >
                    解説
                    <input type="text" name="7">
                    <p>4</p>
                    <input type="text" name="choice4">
                    <input type="checkbox" name="4" >
                    解説
                    <input type="text" name="8">

                    <x-primary-button class="mt-4">
                        送信する
                    </x-primary-button>
                    
                </form>
            </div>
        </div>
        {{-- 最初に作成した部分ここまで --}}

</x-app-layout>