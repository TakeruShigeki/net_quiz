<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-shadow4">
            クイズ作成
        </h2>
    </x-slot>
    
        {{-- 最初に作成した部分 --}}
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mx-4 sm:p-8">
              <form action="{{ route('storeQuiz') }}" method="post" >
                @csrf
                
                  {{-- ↓ クイズの種類--}}
                  <h1>クイズの種類</h1>
                  <select name="quiz_kind" >
                    <option value="0">ネットクイズ</option>
                    <option value="1">モバイルクイズ</option>
                </select>
                  {{-- ↑ クイズの種類--}}
                  
                  <div class="w-full flex flex-col">
                    <label for="body" class="font-semibold leading-none mt-4">問題文</label>
                    <textarea name="quiz" class="w-auto py-2 border border-gray-300 rounded-md" id="body" cols="30" rows="10"></textarea>
                </div>
                {{-- ↓ここからは選択肢 --}}
                    <div class="md:flex items-center mt-8">
                        <div class="w-full flex flex-col">
                        <label for="title" class="font-semibold leading-none mt-4">選択肢1</label>
                        
                        <input type="text" name="choice1" class="w-auto py-2 placeholder-gray-300 border border-gray-300 rounded-md" id="title" placeholder="Enter Title">
                        </div>
                        
                    </div>
                    <label for="answer">
                      <input type="radio" id="answer" name="choice" value="0" checked>
                      正解
                  </label>

                    <div class="md:flex items-center mt-8">
                      <div class="w-full flex flex-col">
                      <label for="title" class="font-semibold leading-none mt-4">選択肢2</label>
                      <input type="text" name="choice2" class="w-auto py-2 placeholder-gray-300 border border-gray-300 rounded-md" id="title" placeholder="Enter Title">
                      </div>
                  </div>
                  <label for="answer">
                    <input type="radio" id="answer" name="choice" value="1">
                    正解
                </label>

                  <div class="md:flex items-center mt-8">
                    <div class="w-full flex flex-col">
                    <label for="title" class="font-semibold leading-none mt-4">選択肢3</label>
                    <input type="text" name="choice3" class="w-auto py-2 placeholder-gray-300 border border-gray-300 rounded-md" id="title" placeholder="Enter Title">
                    </div>
                </div>
                <label for="answer">
                  <input type="radio" id="answer" name="choice" value="2">
                  正解
              </label>

              <div class="md:flex items-center mt-8">
                <div class="w-full flex flex-col">
                <label for="title" class="font-semibold leading-none mt-4">選択肢４</label>
                <input type="text" name="choice4" class="w-auto py-2 placeholder-gray-300 border border-gray-300 rounded-md" id="title" placeholder="Enter Title">
                </div>
            </div>
            <label for="answer">
              <input type="radio" id="answer" name="choice" value="3">
              正解
          </label>
        </div>
                  
                  
              
              
              
            
    
                    {{-- ↑ここからは選択肢 --}}
    
                    

                    <x-primary-button class="mt-4">
                        送信する
                    </x-primary-button>
                    
                </form>
            </div>
        </div>
        {{-- 最初に作成した部分ここまで --}}

</x-app-layout>