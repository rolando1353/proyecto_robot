<div class="benefit mb-16 md:mb-0 mr-8 bg-gray-100 border 
          border-gray-200 px-8 pb-8 relative rounded cursor-pointer 
           hover:border-bot-dark-blue" style="width: 300px">
    <div class="benefit-icon flex justify-center items-center relative -top-10">
        <img style="width: 90px; "src="{{asset('images/'.$icon)}}" alt="benefit">
    </div>

    <h3 class="benefit-title text-center relative -top-4 text-2xl font-bold text-bot-dark-blue">{{$title}}</h3>

    <div class="benefit-title text-center text-1xl">
        {{$description}}
    </div>
</div>