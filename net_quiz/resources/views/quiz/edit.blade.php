<x-app-layout>
    <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            問題の編集画面
    </h2>

    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mx-4 sm:p-8">
        <form method="post" action="{{route('quiz.update', $quiz)}}" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="md:flex items-center mt-8">
                    <div class="w-full flex flex-col">
                    <label for="body" class="font-semibold leading-none mt-4">問題文</label>
                    <input type="text" name="quiz" class="w-auto py-2 border border-gray-300 rounded-md" id="quiz" value="{{old('quiz', $quiz->quiz)}}" placeholder="Enter Title">
                    </div>
                </div>

                <div class="w-full flex flex-col">
                
                    <label class="font-semibold leading-none mt-4">選択</label>
                        
                    <textarea name="body" class="w-auto py-2 border border-gray-300 rounded-md" id="body" cols="30" rows="10">{{old('body')}}</textarea>
                </div>


                <x-primary-button class="mt-4">
                    送信する
                </x-primary-button>
                
            </form>
        </div>
    </div>

</x-app-layout>
