@extends('Layouts.backend_master')

@section('main-content')
<div class="w-full px-5 lg:ps-8  bg-[#F2F8FF]">
    <p class="font-solaimans text-15 text-black leading-4 py-4">{{ __('messages.Home') }} / {{ __('messages.Reminders') }}</p>
</div>
<div class="w-full hidden">
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
    <div class="border border-[#E3F0FF] bg-white shadow rounded-md py-3">
        <div class="lg:flex items-center justify-between py-2 ps-4 pe-2">
            <h3 class="font-solaimans text-20 leading-5">{{ __('messages.Reminders') }}</h3>
            <div class="md:flex items-center gap-1 mt-2 lg:mt-0">
                 <div class="w-full md:w-[35%] lg:w-full relative flex items-center justify-end">
                    <input id="search-folder"
                        class="w-[4.375em] ps-1 py-1 pe-8 transition-all duration-500 ease-in-out focus:translate-x-0  rounded-lg border focus:outline-none border-[#007A43]"
                        type="text">
                    <svg class="absolute md:right-[3%] lg:top-[18%] lg:right-1" xmlns="http://www.w3.org/2000/svg"
                        width="25" height="25" viewBox="0 0 25 25" fill="none">
                        <path
                            d="M15.75 0.666169C14.1605 0.665377 12.6045 1.12379 11.2694 1.98629C9.93418 2.84878 8.87658 4.07863 8.22377 5.52792C7.57095 6.97722 7.35071 8.58424 7.58954 10.1557C7.82837 11.7272 8.51609 13.1963 9.57 14.3862L1.5 23.5462L2.62 24.5462L10.67 15.4262C11.7055 16.2361 12.9195 16.7869 14.2109 17.0327C15.5023 17.2785 16.8338 17.2121 18.0944 16.8391C19.355 16.4662 20.5082 15.7974 21.458 14.8885C22.4078 13.9796 23.1267 12.8569 23.5548 11.614C23.9829 10.371 24.1078 9.04377 23.9191 7.74278C23.7303 6.44178 23.2335 5.20471 22.4699 4.1346C21.7063 3.06449 20.6981 2.19233 19.5292 1.59075C18.3603 0.989179 17.0646 0.675611 15.75 0.676169V0.666169ZM15.75 15.6662C13.9598 15.6662 12.2429 14.955 10.977 13.6891C9.71116 12.4233 9 10.7064 9 8.91617C9 7.12596 9.71116 5.40907 10.977 4.1432C12.2429 2.87733 13.9598 2.16617 15.75 2.16617C17.5402 2.16617 19.2571 2.87733 20.523 4.1432C21.7888 5.40907 22.5 7.12596 22.5 8.91617C22.5 10.7064 21.7888 12.4233 20.523 13.6891C19.2571 14.955 17.5402 15.6662 15.75 15.6662Z"
                            fill="#007A43" />
                    </svg>
                </div> 

                {{-- <button onclick="remainderClickByBtn.showModal()" class="bg-[#F8B200] py-1 px-2 flex items-center gap-2 text-white  rounded">
                    <span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="17" viewBox="0 0 16 17" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M13 9.69785C13.1 10.2979 13.2 10.7979 13.4 11.3979L14 13.0979L13.5 13.7979H10C10 14.2979 9.8 14.7979 9.4 15.1979C9 15.5979 8.5 15.7979 8 15.7979C7.5 15.7979 6.9 15.5979 6.6 15.1979C6.2 14.7979 6 14.2979 6 13.7979H2.5L2 13.0979L2.6 11.3979C2.8 10.5979 3 9.79785 3 8.99785V6.79785C3 6.09785 3.1 5.39785 3.4 4.79785C3.7 4.09785 4.1 3.59785 4.6 3.09785C5.1 2.59785 5.7 2.29785 6.4 2.09785C6.9 1.89785 7.5 1.79785 8 1.79785C7.8 2.09785 7.6 2.49785 7.4 2.89785C7.2 2.89785 7 2.89785 6.7 3.09785C6.2 3.19785 5.7 3.49785 5.3 3.89785C4.9 4.19785 4.5 4.69785 4.3 5.19785C4.1 5.69785 4 6.19785 4 6.79785V8.99785C4 9.89785 3.8 10.7979 3.6 11.6979L3.2 12.7979H12.8L12.4 11.6979C12.225 11.1719 12.126 10.5679 12.037 10.0239L12 9.79785C12.4 9.79785 12.7 9.79785 13 9.69785ZM8 14.7979C8.2 14.7979 8.5 14.6979 8.7 14.4979C8.9 14.2979 9 14.0979 9 13.7979H7C7 14.0979 7.1 14.2979 7.3 14.4979C7.5 14.6979 7.8 14.7979 8 14.7979ZM15 4.79785C15 5.5935 14.6839 6.35656 14.1213 6.91917C13.5587 7.48178 12.7956 7.79785 12 7.79785C11.2044 7.79785 10.4413 7.48178 9.87868 6.91917C9.31607 6.35656 9 5.5935 9 4.79785C9 4.0022 9.31607 3.23914 9.87868 2.67653C10.4413 2.11392 11.2044 1.79785 12 1.79785C12.7956 1.79785 13.5587 2.11392 14.1213 2.67653C14.6839 3.23914 15 4.0022 15 4.79785Z" fill="white"/>
                        </svg></span>

                        <a class="text-16 font-solaimans">{{ __('messages.Reminders') }}</a>
                </button> --}}

            </div>
        </div>

        <div class="w-full h-full py-3">
            @if ($reminders->count() == 0)
            <div style="display: flex;justify-content: center;">
                <img style="height:200px" src="{{asset('assets/image/nodata.gif')}}" alt="No Data Found">
            </div>
            @endif
            @foreach ($reminders as $key=>$reminder)
            <div class="border-b border-[#B3C8A6]" id="myTable">
                <div class="flex items-center justify-between py-3  ps-4 pe-10">
                    <span class="w-[2%]">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                        <path d="M15.0491 11.8947C14.7645 11.0306 14.6191 10.1269 14.6183 9.21718V6.96943C14.639 5.54516 14.1307 4.16383 13.1917 3.09268C12.256 2.01983 10.9573 1.33002 9.5445 1.15543C8.76375 1.07443 7.9695 1.15543 7.21575 1.4108C6.462 1.65268 5.77575 2.05655 5.1975 2.59543C4.61637 3.12041 4.15318 3.76266 3.8385 4.4798C3.52226 5.19667 3.3572 5.97104 3.35362 6.75455V9.22955C3.35198 10.1355 3.20654 11.0354 2.92275 11.8958L2.25 13.8859L2.78888 14.6262H6.732C6.732 15.2179 6.97388 15.7962 7.39125 16.2147C7.8075 16.6309 8.38687 16.8739 8.97975 16.8739C9.5715 16.8739 10.1497 16.6321 10.5671 16.2147C10.9845 15.7973 11.2275 15.2179 11.2275 14.6262H15.1706L15.7084 13.8859L15.0491 11.8947ZM9.77288 15.4351C9.66937 15.5406 9.54601 15.6247 9.4099 15.6824C9.27378 15.7402 9.1276 15.7704 8.97975 15.7714C8.83163 15.7704 8.68519 15.74 8.54887 15.6821C8.41254 15.6242 8.28905 15.5398 8.1855 15.4339C8.07972 15.3305 7.99544 15.2072 7.93752 15.0711C7.8796 14.935 7.84917 14.7887 7.848 14.6408H10.0969C10.1016 14.7884 10.0753 14.9354 10.0196 15.0722C9.96402 15.209 9.87922 15.3326 9.77288 15.4351ZM3.5685 13.5113L3.98588 12.2581C4.31135 11.2817 4.47958 10.2598 4.48425 9.23068V6.75455C4.48425 6.12118 4.61925 5.50243 4.87463 4.93655C5.13 4.3583 5.49338 3.84643 5.96475 3.42905C6.43613 2.9993 6.9885 2.6753 7.58025 2.48743C8.1855 2.28493 8.81775 2.21743 9.4365 2.28493C10.5705 2.43404 11.6102 2.99454 12.3581 3.85993C13.1062 4.72639 13.5084 5.83838 13.4876 6.98293V9.24418C13.4876 10.2668 13.6496 11.2894 13.986 12.2716L14.4034 13.5237H3.56963V13.5102L3.5685 13.5113Z" fill="#007A43"/>
                        </svg>
                    </span>
                    <p class="flex-1 ms-3 font-solaimans leading-5 text-15 w-[90%]">
                    {{$key+1}}.{{ $reminder->reminder_type }}
                    </p>
                    <a onclick="deleteReminder({{$reminder->id}})" class="text-red-500 w-[3%]"><i class="fa fa-light fa-trash-can" style="
                        font-size: 18px;
                    "></i></a>
                </div>
            </div>
            @endforeach
            {{$reminders->links()}}
            @if ($reminders->count() != 0)
            <div class="flex justify-center pt-4">
                <a onclick="deleteAll()" class="text-red-500"><i class="fa fa-light fa-trash-can" style="
                    font-size: 18px;
                "></i> {{ __('messages.delete_all')}} </a>
            </div>
            @endif
        </div>
    </div>
</section>
<script>
  $(document).ready(function(){
    $("#search-folder").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#myTable div").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
  });
  </script>
@endsection