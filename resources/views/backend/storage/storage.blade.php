@extends('Layouts.backend_master')
@section('main-content')
    <div class="w-full px-5 lg:ps-8  bg-[#F2F8FF]">
        <p class="font-solaimans text-15 text-black leading-4 py-4">{{ __('messages.Home') }} / {{ __('messages.Storage') }}
        </p>
    </div>
    <div class="hidden w-full" id="">
        <div class="drop-zone">
            <div>
                <form id="file_upload" enctype="multipart/form-data">
                    @csrf
                    <span class="drop-zone__prompt">Drop your files here or browse for files</span>
                    <input type="file" id="fileInput" name="myFile" class="drop-zone__input" multiple/>
                    <input type="hidden" name="category_id" id="category_id_file" value="">
                </form>
            </div>
        </div>
    </div>
    <section class="w-full h-auto pb-6 px-5 lg:ps-8 lg:pe-10">
        <div class="border border-[#E3F0FF] bg-white shadow rounded-md lg:flex">
            <div class="w-full lg:w-[27%] py-5 ps-5 pe-5">
                <div class="flex flex-col gap-1 lg:gap-4">
                    <h1 class="text-20 lg:text-24 xl:text-32 font-solaimans text-[#000000] leading-10">
                        {{ __('messages.Storage Space Managment') }}
                    </h1>
                    <p class="text-28  lg:text-30 xl:text-40 font-solaimans font-semibold leading-10 text-[#007A43]">
                        {{ $totalUsedSpace }}
                    </p>
                </div>
                <div class="w-full h-[2.188em] mt-8 mb-12 bg-[#EFEFEF] rounded-md">
                    <div class="w-full  h-full flex">
                        @foreach ($filetypeTotals as $key => $extension)
                            <div class="w-[{{ $extension['percentage'] }}%] h-full bg-[{{ $extension['color'] }}]"
                                title="{{ $key }}-{{ $extension['size'] }}">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="w-full lg:w-[73%] py-5">
                <div class="px-4 flex flex-wrap justify-center lg:justify-start items-center gap-[2em]">
                    @foreach ($filetypeTotals as $key => $data)
                        <?php
                        
                        if ($key == 'mp4') {
                            $key = 'video';
                        } elseif ($key == 'gz') {
                            $key = 'zip';
                        } elseif ($key == 'jpeg') {
                            $key = 'image';
                        } elseif ($key == 'java') {
                            $key = 'java-coffee-cup-logo';
                        } elseif ($key == 'pub') {
                            $key = 'ms-publisher';
                        } elseif ($key == 'docx') {
                            $key = 'ms-word';
                        } elseif ($key == 'accdb') {
                            $key = 'ms-word';
                        } elseif ($key == 'pptx') {
                            $key = 'powerpoint';
                        }
                        ?>
                        <div class="w-[40%] lg:w-[20.3%] xl:w-[16.8%] border border-[#F3F9FF] bg-[#F3F9FF] rounded-md">
                            <div>
                                <div class="flex justify-center p-4 items-center">
                                    <img src="https://img.icons8.com/color/96/{{ $key }}.png"
                                        alt="{{ $key }}" />
                                </div>
                                <div class="p-2 text-center">
                                    <h1 class="font-solaimans text-[{{ $data['color'] }}] font-semibold text-14 leading-3">
                                        {{ $key }}</h1>
                                    <p class="text-16 font-solaimans leading-4 mt-2">{{ $data['size'] }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    @if (Auth::user()->hasRole('admin') || Auth::user()->hasRole('Admin'))
        <section class="px-10  py-6">
            <div class=" bg-white rounded-md px-4 py-6 shadow">
                <div class="lg:flex justify-between items-center bg-white pb-3">
                    <h3 class="font-solaimans text-20 leading-5 w-full lg:w-[40%] xl:w-[25%]">
                        {{ __('messages.All Users Storage') }} </h3>
                    <div class="w-[80%] md:flex items-center  mt-2 gap-3 lg:mt-0">

                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="table">
                        <!-- head -->
                        <thead class="bg-[#E9FFE4] w-full">
                            <tr>
                                <th>
                                    <h2 class="text-[#007A43] text-18 font-solaimans font-semibold">
                                        {{ __('messages.User Name') }}</h2>
                                </th>
                                <th>
                                    <h2 class="text-[#007A43] text-18 font-solaimans font-semibold ">
                                        {{ __('messages.Storage') }} </h2>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($con_data as $data)
                                <tr>
                                    <th class="text-[#082303] font-solaimans text-16 flex items-center gap-2">
                                        <figure>
                                            <img class="w-9 h-8" src="{{ asset('uploads/prp-users/' . $data['photo']) }}"
                                                alt="">
                                        </figure>
                                        <a href="{{ url('/user-profile/' . $data['user_id']) }}">
                                            <span class="text-[#082303] font-solaimans text-16 leading-4">

                                                {{ __('messages.Current_Language') == 'en' ? $data['nameEn'] : $data['nameBn'] }}
                                            </span>
                                        </a>
                                    </th>
                                    <td>
                                        <div class="flex items-center gap-4">
                                            <span class="text-[#5C5F62] text-15 font-solaimans">
                                                {{ $data['total_used_space'] }}
                                            </span>
                                        </div>
                                    </td>

                </div>

                </td>
                </tr>
    @endforeach



    </tbody>
    </table>
    </div>


    </div>
    </div>
    </section>
    @endif

    <div>

    </div>
@endsection
