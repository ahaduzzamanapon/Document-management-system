@extends('Layouts.backend_master')

@section('main-content')
<div class="w-full px-5 lg:ps-8  bg-[#F2F8FF]">
    <p class="font-solaimans text-15 text-black leading-4 py-4">Home / Share File Manager </p>
</div>
<section class="px-10  py-6">
    <div class=" bg-white rounded-md px-4 py-6 shadow">
        <div class="lg:flex justify-between items-center bg-white pb-3">
            <h3 class="font-solaimans text-20 leading-5 w-full lg:w-[25%] xl:w-[20%]">Share File Manager </h3>
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
                <button onclick="creareUserModal.showModal()" class="bg-[#F8B200] mt-2  md:mt-0 w-full md:w-[25%] lg:w-[20%] p-2  rounded-md">
                    <div class="w-full h-full flex">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="17" viewBox="0 0 16 17" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M13 9.69794C13.1 10.2979 13.2 10.7979 13.4 11.3979L14 13.0979L13.5 13.7979H10C10 14.2979 9.8 14.7979 9.4 15.1979C9 15.5979 8.5 15.7979 8 15.7979C7.5 15.7979 6.9 15.5979 6.6 15.1979C6.2 14.7979 6 14.2979 6 13.7979H2.5L2 13.0979L2.6 11.3979C2.8 10.5979 3 9.79794 3 8.99794V6.79794C3 6.09794 3.1 5.39794 3.4 4.79794C3.7 4.09794 4.1 3.59794 4.6 3.09794C5.1 2.59794 5.7 2.29794 6.4 2.09794C6.9 1.89794 7.5 1.79794 8 1.79794C7.8 2.09794 7.6 2.49794 7.4 2.89794C7.2 2.89794 7 2.89794 6.7 3.09794C6.2 3.19794 5.7 3.49794 5.3 3.89794C4.9 4.19794 4.5 4.69794 4.3 5.19794C4.1 5.69794 4 6.19794 4 6.79794V8.99794C4 9.89794 3.8 10.7979 3.6 11.6979L3.2 12.7979H12.8L12.4 11.6979C12.225 11.1719 12.126 10.5679 12.037 10.0239L12 9.79794C12.4 9.79794 12.7 9.79794 13 9.69794ZM8 14.7979C8.2 14.7979 8.5 14.6979 8.7 14.4979C8.9 14.2979 9 14.0979 9 13.7979H7C7 14.0979 7.1 14.2979 7.3 14.4979C7.5 14.6979 7.8 14.7979 8 14.7979ZM15 4.79794C15 5.59359 14.6839 6.35665 14.1213 6.91926C13.5587 7.48187 12.7956 7.79794 12 7.79794C11.2044 7.79794 10.4413 7.48187 9.87868 6.91926C9.31607 6.35665 9 5.59359 9 4.79794C9 4.00229 9.31607 3.23923 9.87868 2.67662C10.4413 2.11401 11.2044 1.79794 12 1.79794C12.7956 1.79794 13.5587 2.11401 14.1213 2.67662C14.6839 3.23923 15 4.00229 15 4.79794Z" fill="white"/>
                            </svg>
                        <a class="font-solaimans text-12 xl:text-14 text-white font-medium leading-normal w-[80%]">Reminder</a>
                    </div>
                </button>
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="table">
              <!-- head -->
              <thead class="bg-[#E9FFE4] w-full">
                <tr>
                  <th><h2 class="text-[#007A43] text-18 font-solaimans font-semibold">Shared by Name </h2></th>
                 
                    <th><h2 class="text-[#007A43] text-18 font-solaimans font-semibold text-end">Date & Time </h2></th>
                    <th><h2 class="text-[#007A43] text-18 font-solaimans font-semibold text-end">Folder/ File Name </h2></th>
                    <th><h2 class="text-[#007A43] text-18 font-solaimans font-semibold text-end">Folder/ File </h2></th>
                  
                </tr> 
              </thead>
              <tbody>
                <!-- row 1 -->
                <tr>
                  <th class="text-[#082303] font-solaimans text-16 flex items-center gap-2">
                    <figure>
                        <img class="w-9 h-8" src="{{ asset('uploads/prp-users/' . Auth::user()->photo) }}" alt="">
                    </figure>
                    <span class="text-[#082303] font-solaimans text-16 leading-4">
                        Dianne Russell
                    </span>
                  </th>
                  
                  <td >
                    <div class="flex items-center gap-3 justify-end">
                      <span class="text-[#5C5F62] text-15 font-solaimans">
                        28/10/2012
                    </span>
                    <span class="text-[#5C5F62] text-15 font-solaimans">
                        10:32 pm
                    </span>
                    </div>
                  </td>
                  <td class="ps-0 lg:ps-[10%] xl:ps-[15%]">
                   <span class="text-[#5C5F62] text-16 font-solaimans leading-4"> Angel</span>
                 </td>
                  <td class="flex justify-end">
                            <button class="border border-[#00A6B0] flex items-center gap-1 px-3 py-1 rounded">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="15" viewBox="0 0 16 15" fill="none">
                                    <path d="M2.03906 13.125H12.3516L12.8016 12.7781L15.2672 6.21563L14.8172 5.625H13.7578V3.28125L13.2891 2.8125H7.86094L7.05469 2.01563L6.72656 1.875H2.03906L1.57031 2.34375V12.6562L2.03906 13.125ZM2.50781 2.8125H6.52969L7.33594 3.60937L7.66406 3.75H12.8203V5.625H8.60156L8.27344 5.76562L7.46719 6.5625H3.91406L3.47344 6.88125L2.53594 9.76875L2.50781 2.8125ZM12.0047 12.1875H2.68594L4.25156 7.5H7.66406L7.99219 7.35938L8.79844 6.5625H14.2266L12.0047 12.1875Z" fill="#00A6B0"/>
                                    </svg>
                            
                            </span>
                            <a class="text-[#00A6B0] font-solaimans text-16">View</a>
                        </button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
    </div>
    </div>
</section>
@endsection