@extends('Layouts.backend_master')

@section('main-content')
<div class="w-full px-5 lg:ps-8  bg-[#F2F8FF]">
    <p class="font-solaimans text-15 text-black leading-4 py-4">{{__('messages.Home')}} /  {{__('messages.All Users Storage')}}</p>
</div>
<section class="px-10  py-6">
    <div class=" bg-white rounded-md px-4 py-6 shadow">
        <div class="lg:flex justify-between items-center bg-white pb-3">
            <h3 class="font-solaimans text-20 leading-5 w-full lg:w-[40%] xl:w-[25%]">{{__('messages.All Users Storage')}} </h3>
            <div class="w-[80%] md:flex items-center  mt-2 gap-3 lg:mt-0">
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
                  <th><h2 class="text-[#007A43] text-18 font-solaimans font-semibold">{{__('messages.User Name')}}</h2></th>
               
                    <th class="ps-9"><h2 class="text-[#007A43] text-18 font-solaimans font-semibold ">{{__('messages.Storage')}} </h2></th>
                    <th><h2 class="text-[#007A43] text-18 font-solaimans font-semibold text-center">{{__('messages.folder')}}/ {{__('messages.file')}}</h2></th>
                    <th><h2 class="text-[#007A43] text-18 font-solaimans font-semibold text-center">{{__('messages.manage')}}</h2></th>
                    
  
                </tr> 
              </thead>
              <tbody>
                <tr>
                    <th class="text-[#082303] font-solaimans text-16 flex items-center gap-2">
                      <figure>
                          <img class="w-9 h-8" src="{{ asset('assets/image/user2.png') }}" alt="">
                      </figure>
                      <span class="text-[#082303] font-solaimans text-16 leading-4">
                        Dianne Russell
                      </span>
                    </th>
                    <td>
                      <div class="flex items-center gap-4">
                        <span class="text-[#5C5F62] text-15 font-solaimans">
                            2.5GB
                        </span>
                      </div>
                    </td>
                    <td>
                        <div class="flex items-center justify-center  gap-5">
                            
                                <button  class="border border-[#00A6B0] flex items-center gap-1 px-3 py-1 rounded">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="15" viewBox="0 0 16 15" fill="none">
                                            <path d="M2.03809 13.125H12.3506L12.8006 12.7781L15.2662 6.21563L14.8162 5.625H13.7568V3.28125L13.2881 2.8125H7.85996L7.05371 2.01563L6.72559 1.875H2.03809L1.56934 2.34375V12.6562L2.03809 13.125ZM2.50684 2.8125H6.52871L7.33496 3.60937L7.66309 3.75H12.8193V5.625H8.60059L8.27246 5.76562L7.46621 6.5625H3.91309L3.47246 6.88125L2.53496 9.76875L2.50684 2.8125ZM12.0037 12.1875H2.68496L4.25059 7.5H7.66309L7.99121 7.35938L8.79746 6.5625H14.2256L12.0037 12.1875Z" fill="#00A6B0"/>
                                        </svg>
                                    
                                    </span>
                                    <a class="text-[#00A6B0] font-solaimans text-16">{{ __('messages.view') }}</a>
                                </button>
                            
                        </div>
                      </td>
                    <td>
                      <div class="flex items-center justify-center  gap-5 dropdown">
                          <button class="border border-[#007A43] flex items-center gap-1 px-3 py-1 rounded">
                              <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                    <path d="M15.1338 5.44949L11.3839 1.70032C10.6022 0.918704 9.25 1.46607 9.25 2.58417V4.0737C8.14453 4.12266 7.06172 4.24428 6.10521 4.54219C5.18932 4.82735 4.46276 5.26042 3.94609 5.82917C3.31823 6.52084 3 7.39063 3 8.41511C3 10.0218 3.86401 11.3436 5.21016 12.1849C6.18792 12.7971 7.43016 11.8554 7.05964 10.7333C6.6556 9.50628 6.61286 8.88639 9.25 8.6823V10.0833C9.25 11.2029 10.6033 11.7477 11.3839 10.9672L15.1338 7.21719C15.6221 6.72917 15.6221 5.93751 15.1338 5.44949ZM10.5 10.0833V7.37917C7.14867 7.42922 4.83573 7.98308 5.87266 11.125C5.10391 10.6445 4.25 9.77292 4.25 8.41511C4.25 5.56787 7.61302 5.31753 10.5 5.29402V2.58334L14.25 6.33334L10.5 10.0833ZM11.1443 12.2837C11.3367 12.2287 11.5206 12.1472 11.6905 12.0414C11.8982 11.9125 12.1667 12.0629 12.1667 12.3074V13.4167C12.1667 14.107 11.607 14.6667 10.9167 14.6667H1.75C1.05964 14.6667 0.5 14.107 0.5 13.4167V4.25001C0.5 3.55964 1.05964 3.00001 1.75 3.00001H5.1875C5.36008 3.00001 5.5 3.13993 5.5 3.31251V3.42933C5.5 3.55738 5.42221 3.67331 5.30289 3.71975C4.94607 3.85857 4.61549 4.02019 4.31201 4.20373C4.26274 4.2338 4.20618 4.2498 4.14846 4.25001H1.90625C1.86481 4.25001 1.82507 4.26647 1.79576 4.29577C1.76646 4.32507 1.75 4.36482 1.75 4.40626V13.2604C1.75 13.3019 1.76646 13.3416 1.79576 13.3709C1.82507 13.4002 1.86481 13.4167 1.90625 13.4167H10.7604C10.8019 13.4167 10.8416 13.4002 10.8709 13.3709C10.9002 13.3416 10.9167 13.3019 10.9167 13.2604V12.5842C10.9167 12.4444 11.0099 12.3223 11.1443 12.2837Z" fill="#007A43"/>
                                  </svg>
                              
                              </span>
                              <a class="text-[#007A43] font-solaimans text-16">{{ __('messages.manage') }}</a>
                          </button>
                          <ul tabindex="0" class="dropdown-content !p-0 z-[1] menu  shadow bg-base-100  w-24 mt-[6.875em]">
                            <a href=""><li class="hover:!bg-gray-300"><span class="text-16 font-solaimans"> {{ __('messages.edit') }}</span></li></a>
                            <a href=""><li class="hover:!bg-gray-300"><span class="text-16 font-solaimans">{{ __('messages.delete') }}</span></li></a>  
                          </ul>
                          {{-- <div class="">
                            <label tabindex="0" class="btn m-1">Click</label>
                            
                          </div> --}}
                      </div>
                             
                    </td>
                  </tr>
                
                
              </tbody>
            </table>
          </div>

       
    </div>
    </div>
</section>
@endsection