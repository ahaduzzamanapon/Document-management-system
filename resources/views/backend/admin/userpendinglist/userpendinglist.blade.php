@extends('Layouts.backend_master')

@section('main-content')

<div class="w-full px-5 lg:ps-8  bg-[#F2F8FF]">
    <p class="font-solaimans text-15 text-black leading-4 py-4">Home / User list </p>
</div>
<section class="px-10  py-6">
    <div class=" bg-white rounded-md px-4 py-6 shadow">
        <div class="lg:flex justify-between items-center bg-white pb-3">
            <h3 class="font-solaimans text-20 leading-5 w-full lg:w-[40%] xl:w-[35%]">{{ __('messages.System Pending User list') }}</h3>
            <div class="w-[65%] md:flex items-center  mt-2 gap-3 lg:mt-0">
                <div class="w-full md:w-[35%] lg:w-full relative flex items-center justify-end">
                    <input id="search-folder"
                        class="w-[4.375em] ps-1 pe-8 py-1 transition-all duration-500 ease-in-out focus:translate-x-0  rounded-lg border focus:outline-none border-[#007A43]"
                        type="text">
                    <svg class="absolute md:right-[3%] lg:top-[18%] lg:right-1" xmlns="http://www.w3.org/2000/svg"
                        width="25" height="25" viewBox="0 0 25 25" fill="none">
                        <path
                            d="M15.75 0.666169C14.1605 0.665377 12.6045 1.12379 11.2694 1.98629C9.93418 2.84878 8.87658 4.07863 8.22377 5.52792C7.57095 6.97722 7.35071 8.58424 7.58954 10.1557C7.82837 11.7272 8.51609 13.1963 9.57 14.3862L1.5 23.5462L2.62 24.5462L10.67 15.4262C11.7055 16.2361 12.9195 16.7869 14.2109 17.0327C15.5023 17.2785 16.8338 17.2121 18.0944 16.8391C19.355 16.4662 20.5082 15.7974 21.458 14.8885C22.4078 13.9796 23.1267 12.8569 23.5548 11.614C23.9829 10.371 24.1078 9.04377 23.9191 7.74278C23.7303 6.44178 23.2335 5.20471 22.4699 4.1346C21.7063 3.06449 20.6981 2.19233 19.5292 1.59075C18.3603 0.989179 17.0646 0.675611 15.75 0.676169V0.666169ZM15.75 15.6662C13.9598 15.6662 12.2429 14.955 10.977 13.6891C9.71116 12.4233 9 10.7064 9 8.91617C9 7.12596 9.71116 5.40907 10.977 4.1432C12.2429 2.87733 13.9598 2.16617 15.75 2.16617C17.5402 2.16617 19.2571 2.87733 20.523 4.1432C21.7888 5.40907 22.5 7.12596 22.5 8.91617C22.5 10.7064 21.7888 12.4233 20.523 13.6891C19.2571 14.955 17.5402 15.6662 15.75 15.6662Z"
                            fill="#007A43" />
                    </svg>
                </div>

            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="table">
              <!-- head -->
              <thead class="bg-[#E9FFE4] w-full">
                <tr>
                  <th><h2 class="text-[#007A43] text-18 font-solaimans font-semibold">{{ __('messages.User Name') }} </h2></th>

                    <th class="ps-9"><h2 class="text-[#007A43] text-18 font-solaimans font-semibold ">{{ __('messages.date') }} & {{ __('messages.time') }}</h2></th>
                    <th><h2 class="text-[#007A43] text-18 font-solaimans font-semibold text-center"> {{ __('messages.Set Profile') }} </h2></th>
                </tr>
              </thead>
              <tbody>

               @foreach ($user_list as $user)
                <tr>
                    <th class="text-[#082303] font-solaimans text-16 flex items-center gap-2">
                      <figure>
                            <img class="w-9 h-8" src="{{ asset('uploads/prp-users/' . $user->photo) }}" alt="">
                      </figure>
                      <span class="text-[#082303] font-solaimans text-16 leading-4">
                        {{ $user->nameEn}}
                      </span>
                    </th>


                    <td>
                      <div class="flex items-center gap-4">
                        <span class="text-[#5C5F62] text-15 font-solaimans">
                            <?= date('Y-m-d',strtotime($user->created_at)) ?>
                          </span>
                          <span class="text-[#5C5F62] text-15 font-solaimans">
                          <?= date('h:i A',strtotime($user->created_at)) ?>
                          </span>
                      </div>
                    </td>
                  
                    <td>
                      <a href="{{ url('/user-profile/'.$user->id) }}">
                      <div class="flex items-center justify-center  gap-5">
                          <button class="border border-[#E1B000] flex items-center gap-1 px-3 py-1 rounded">
                              <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="15" viewBox="0 0 16 15" fill="none">
                                    <path d="M12.125 6.75C10.2594 6.75 8.75 8.25938 8.75 10.125C8.75 11.9906 10.2594 13.5 12.125 13.5C13.9906 13.5 15.5 11.9906 15.5 10.125C15.5 8.25938 13.9906 6.75 12.125 6.75ZM13.625 10.2727C13.625 10.3969 13.5219 10.5 13.3977 10.5H11.9773C11.8531 10.5 11.75 10.3969 11.75 10.2727V8.47734C11.75 8.35313 11.8531 8.25 11.9773 8.25H12.2727C12.3969 8.25 12.5 8.35313 12.5 8.47734V9.75H13.3977C13.5219 9.75 13.625 9.85313 13.625 9.97734V10.2727ZM8 10.125C8 9.47344 8.15703 8.85703 8.42656 8.30859C8.23906 8.27344 8.04688 8.25 7.85 8.25H7.45859C6.93828 8.48906 6.35938 8.625 5.75 8.625C5.14062 8.625 4.56406 8.48906 4.04141 8.25H3.65C1.91094 8.25 0.5 9.66094 0.5 11.4V12.375C0.5 12.9961 1.00391 13.5 1.625 13.5H9.76016C8.69844 12.7523 8 11.5195 8 10.125ZM5.75 7.5C7.40703 7.5 8.75 6.15703 8.75 4.5C8.75 2.84297 7.40703 1.5 5.75 1.5C4.09297 1.5 2.75 2.84297 2.75 4.5C2.75 6.15703 4.09297 7.5 5.75 7.5Z" fill="#E1B000"/>
                                </svg>

                              </span>
                              <span class="text-[#E1B000] font-solaimans text-16">Manage</span>
                          </button>
                          <span  class="text-red-500 "><i class="fa fa-light fa-trash-can" style="font-size: 18px;"></i></span>
                        </div>
                      </a>

                    </td>
                </tr>
                @endforeach

                <!-- row 1 -->










              </tbody>
            </table>
          </div>


    </div>
    </div>
</section>

@endsection
