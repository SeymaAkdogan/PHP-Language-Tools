@extends('base')
@section('content')

<style>
    #btn {
        background-color: #ea649c;
        color: white;
        font-size: 24px;
        font-family: 'Roboto', sans-serif;
    }
</style>

<div class="bg-white xl:mx-36 lg:mx-36 md:mx-24 sm:mx-8 my-4 sm:rounded-full" style="border-radius:10px;">
    @isset($info)
    <div class="alert alert-info text-gray-500" style="background-color: #85e0f2;">
        <div class="row">
            <div class="col-md-6">
                <span class="font-bold text-xl">{{ $info }}</span> <br>
                NUMBER OF CORRECT ANSWERS: {{$true_questions_count}}
                <br>
                WRONG ANSWER NUMBER : {{$false_questions_count}}
            </div>
            <div class="col-md-6">
            <a href="/" class="btn font-light text-white float-right" style="background-color: #188ca3;">START OVER</a>
            </div>
        </div>

    </div>
    @endisset
    <div class="my-3 flex justify-center pt-2 xl:mx-24 lg:mx-24 md:mx-12 sm:mx-8">
        <img src="/images/{{$question->image}}" id="question_img" class="xl:h-96 lg:h-96 md:h-96 sm:h-24" alt="..." style="border-radius:20px;">

    </div>
    <h4 class="flex justify-center my-2" style="font-size: 24px;">
        {{ Str::title($word) }}
    </h4>
    <div class="input flex justify-center">
        <form action="check_answer/{{ $word }}/{{$question->id}}" class="w-2/5" method="post">
            @csrf
            <input type="text " class="form-control border-1 border-pink-300 shadow-2xl shadow-pink-900 hover:border-pink-300 hover:shadow-pink-900 active:shadow-2xl active:shadow-pink-900 focus:shadow-2xl focus:shadow-pink-900 focus:border-pink-300" id="answer" name="answer">

            <div class="flex justify-center">
                <button type="submit" class="btn btn-lg my-3 font-light" id="btn">Let's See</button>
            </div>
        </form>
    </div>
    <div class="flex justify-center pb-6 sm:mx-2">
        <div class="grid gap-2 grid-cols-2" style="color: #ea649c;font-size: 20px;">
            <div class="pr-24 sm:p-0">
                <i class="fas fa-thumbs-up text-xl"></i> {{ $true_questions_count}} / {{$questions_count}}
            </div>
            <div class="pl-24 sm:mr-4">
                <i class="fas fa-thumbs-down text-xl"></i> {{$false_questions_count}} / {{$questions_count}}
            </div>
        </div>
    </div>

</div>

@endsection
