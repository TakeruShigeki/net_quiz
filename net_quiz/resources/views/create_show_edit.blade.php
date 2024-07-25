<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-shadow4">
            クイズ作成
        </h2>
    </x-slot> --}}

    @php
        $app_img="img/background01.jpg";
    @endphp
    <div class="min-h-screen
    bg-no-repeat bg-cover bg-center"
    style="background-attachment: fixed;background-image:url('{{ asset($app_img) }}')">
    
        {{-- 最初に作成した部分 --}}
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mx-4 sm:p-8">
              @php
              if ($screen_id=="create") {
                $action=route('storeQuiz');
                $method="post";
        
              }elseif ($screen_id=="show") {
                $action="";
                $method="";
              }
                  
              @endphp
              <form action="{{$action}}" method="{{$method}}" >
                @if ($screen_id!="show")
                @csrf
                @endif

                
                  {{-- ↓ クイズの種類--}}
                  @if ($screen_id!="show")
                  <h1 class="font-semibold leading-none mt-4 text-shadow1">クイズの種類</h1>
                  <select name="quiz_kind " class="rounded-md" >
                    <option value="0">ネットクイズ</option>
                    <option value="1">モバイルクイズ</option>
                </select>
                  @endif
                  
                  {{-- ↑ クイズの種類--}}
                
                  <div class="w-full flex flex-col">
                    
                    @if ($screen_id=="create")
                    <label for="body" class="font-semibold leading-none mt-4 text-shadow1">問題文</label> 
                  
                    <textarea name="quiz" class="w-auto py-2 border border-gray-300 rounded-md " id="body" cols="30" rows="10"></textarea>
                    @elseif($screen_id=="show")
                    <div class=" text-shadow1 font-semibold text-4xl ml-64 ">{{$quiz->quiz}}</div>
                    @endif
                </div>
                {{-- ↓ここからは選択肢 --}}
                    <div class="md:flex items-center mt-8">
                        <div class="w-full flex flex-col">
                          @if ($screen_id=="create")
                        <label for="title" class="font-semibold leading-none mt-4 text-shadow1 ">選択肢1</label>
                        
                            
                        
                        <input type="text" name="choice1" class="w-auto py-2 placeholder-gray-300 border border-gray-300 rounded-md" id="title" placeholder="Enter Title">
                      
                        </div>
                        
                    </div>
                    <div class="text-shadow1 font-semibold">
                    <label for="answer">
                      <input type="radio" id="answer" name="choice" value="0" checked>
                      正解
                    </label>
                    </div>

                    <div class="md:flex items-center mt-8">
                      <div class="w-full flex flex-col">
                      <label for="title" class="font-semibold leading-none mt-4 text-shadow1">選択肢2</label>
                      <input type="text" name="choice2" class="w-auto py-2 placeholder-gray-300 border border-gray-300 rounded-md" id="title" placeholder="Enter Title">
                      </div>
                  </div>
                  <div class="text-shadow1 font-semibold">
                  <label for="answer">
                    <input type="radio" id="answer" name="choice" value="1">
                    正解
                  </label>
                  </div>

                  <div class="md:flex items-center mt-8">
                    <div class="w-full flex flex-col">
                    <label for="title" class="font-semibold leading-none mt-4 text-shadow1">選択肢3</label>
                    <input type="text" name="choice3" class="w-auto py-2 placeholder-gray-300 border border-gray-300 rounded-md" id="title" placeholder="Enter Title">
                    </div>
                </div>
                <div class="text-shadow1 font-semibold">
                <label for="answer">
                  <input type="radio" id="answer" name="choice" value="2">
                  正解
                </label>
                </div>

              <div class="md:flex items-center mt-8">
                <div class="w-full flex flex-col">
                <label for="title" class="font-semibold leading-none mt-4 text-shadow1">選択肢４</label>
                <input type="text" name="choice4" class="w-auto py-2 placeholder-gray-300 border border-gray-300 rounded-md" id="title" placeholder="Enter Title">
                </div>
            </div>
            <div class="text-shadow1 font-semibold">
            <label for="answer">
              <input type="radio" id="answer" name="choice" value="3">
              正解
          </label>
          @elseif($screen_id=="show")
          <div class=" text-shadow1 font-semibold text-3xl ml-64 ">
            @foreach($quiz->choices as $key=>$choice)
            <label for="answer" class="flex items-center space-x-4 m-8">
              <input type="radio" id="answer" name="choice" value="{{$key}}" >
              <div class="">
                {{$choice->choice}}</div>
            </label>
            
    
            @endforeach</div>
          @endif

        </div>
        </div>
                  
                  
              
              
              
            
    
                    {{-- ↑ここからは選択肢 --}}
    
                    @if ($screen_id=="show")
                    <x-primary-button class="mt-4 ml-64 ">
                      送信する
                  </x-primary-button>
                  
                  @elseif($screen_id=="create")
                  <x-primary-button class="mt-4 ml-12">
                    送信する
                  </x-primary-button>
                  @endif
                        
                    
                        
                    
                    
                    
                    
                </form>
            </div>
        </div>
      </div>
        {{-- 最初に作成した部分ここまで --}}

</x-app-layout>