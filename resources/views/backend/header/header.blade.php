<div class="sticky top-0 z-50 w-full  bg-[#007A43]">

    <div class="scroll-hide w-full h-auto py-3 shadow-md lg:hidden">
        <div class="flex justify-center items-center">
            <div class="flex items-center gap-1">
                <svg class="w-[0.875em] h-[0.875em] text-white" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 14 14" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M12.6875 1.75H11.375V0.875H10.5V1.75H3.5V0.875H2.625V1.75H1.3125L0.875 2.1875V12.6875L1.3125 13.125H12.6875L13.125 12.6875V2.1875L12.6875 1.75ZM12.25 12.25H1.75V4.375H12.25V12.25ZM12.25 3.5H1.75V2.625H12.25V3.5ZM3.5 7H2.625V7.875H3.5V7ZM2.625 8.75H3.5V9.625H2.625V8.75ZM3.5 10.5H2.625V11.375H3.5V10.5ZM5.25 7H6.125V7.875H5.25V7ZM6.125 8.75H5.25V9.625H6.125V8.75ZM5.25 10.5H6.125V11.375H5.25V10.5ZM6.125 5.25H5.25V6.125H6.125V5.25ZM7.875 7H8.75V7.875H7.875V7ZM8.75 8.75H7.875V9.625H8.75V8.75ZM7.875 10.5H8.75V11.375H7.875V10.5ZM8.75 5.25H7.875V6.125H8.75V5.25ZM10.5 7H11.375V7.875H10.5V7ZM11.375 8.75H10.5V9.625H11.375V8.75ZM10.5 5.25H11.375V6.125H10.5V5.25Z" fill="white"/>
                </svg>
                <p class="font-normal text-white text-14 font-solaimans not-italic leading-[14px]">12/06/23</p>
            </div>
            <div class="flex items-center ms-[0.4375em] gap-1">
                <svg class="w-[0.875em] h-[0.875em] text-white" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 14 14" fill="none">
                    <path d="M7 0.21875C3.25391 0.21875 0.21875 3.25391 0.21875 7C0.21875 10.7461 3.25391 13.7812 7 13.7812C10.7461 13.7812 13.7812 10.7461 13.7812 7C13.7812 3.25391 10.7461 0.21875 7 0.21875ZM7 12.4688C3.97852 12.4688 1.53125 10.0215 1.53125 7C1.53125 3.97852 3.97852 1.53125 7 1.53125C10.0215 1.53125 12.4688 3.97852 12.4688 7C12.4688 10.0215 10.0215 12.4688 7 12.4688ZM8.68984 9.61406L6.36836 7.92695C6.28359 7.86406 6.23438 7.76563 6.23438 7.66172V3.17188C6.23438 2.99141 6.38203 2.84375 6.5625 2.84375H7.4375C7.61797 2.84375 7.76562 2.99141 7.76562 3.17188V7.04648L9.59219 8.37539C9.73984 8.48203 9.76992 8.68711 9.66328 8.83477L9.14922 9.54297C9.04258 9.68789 8.8375 9.7207 8.68984 9.61406Z" fill="white"/>
                    </svg>
                <p class="font-normal text-white text-14 font-solaimans not-italic leading-[0.875em]">12:06 PM</p>
            </div>
            
        </div>
    </div>

    <div class="sticky top-0 z-50  px-5 lg:px-[2.4375em] flex justify-between items-center py-[0.9375em]">
        <div class="flex lg:w-[40%]  items-center gap-2">
            <p class="lg:hidden hamburger"><i class="fa fa-solid fa-bars text-white"></i></p>
            <div class="absolute lg:relative top-[100%] left-0 z-10  w-[75%] lg:w-[15.7%] h-auto hidden lg:hidden bg-white shadow-md sidebar1">
            
                @include('backend.sidebar.sidebar')
            
            
            </div>
            @php
            $settings= DB::table('settings')->select('*')->first();
            @endphp
            <a href="/"><img class="w-full h-12" src=" {{ __('messages.Current_Language') == 'en' ? asset('settings/'.$settings->logo_en) : asset('settings/'.$settings->logo_bn) }}" alt=""></a>
        </div>
        {{-- <div class="w-[20%] xl:w-[20%] ms-2  xl:ms-3 relative hidden lg:block">
            <input class="search-input w-full h-full bg-white rounded-[2.25em] py-2 flex-shrink-0 focus:outline-none px-12" placeholder="Search Your File" type="text">
            <svg class="w-5 h-5 absolute top-[0.625em] left-[1.0625em] " xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 20 20" fill="none">
                <path d="M18.3299 8.8889H16.6667V7.22223C16.6667 6.30209 15.9201 5.55557 15 5.55557H9.44445L7.22222 3.33334H1.66667C0.746528 3.33334 0 4.07987 0 5.00001V15C0 15.9201 0.746528 16.6667 1.66667 16.6667H15.5556C16.1285 16.6667 16.6632 16.3715 16.9688 15.882L19.7431 11.4375C20.4375 10.3299 19.6389 8.8889 18.3299 8.8889ZM1.66667 5.20834C1.66667 5.09376 1.76042 5.00001 1.875 5.00001H6.53125L8.75347 7.22223H14.7917C14.9063 7.22223 15 7.31598 15 7.43057V8.8889H5.27778C4.69444 8.8889 4.15278 9.19445 3.85069 9.69445L1.66667 13.3125V5.20834ZM15.5556 15H2.5L5.18056 10.5556H18.3333L15.5556 15Z" fill="#007A43"/>
            </svg>
        </div> --}}
        <div class="ms-3 lg:w-[60%]  flex justify-end items-center gap-2">
            <div class="lg:flex items-center hidden">
                <div class="flex items-center gap-1">
                    <svg class="w-[0.875em] h-[0.875em] text-white" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 14 14" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12.6875 1.75H11.375V0.875H10.5V1.75H3.5V0.875H2.625V1.75H1.3125L0.875 2.1875V12.6875L1.3125 13.125H12.6875L13.125 12.6875V2.1875L12.6875 1.75ZM12.25 12.25H1.75V4.375H12.25V12.25ZM12.25 3.5H1.75V2.625H12.25V3.5ZM3.5 7H2.625V7.875H3.5V7ZM2.625 8.75H3.5V9.625H2.625V8.75ZM3.5 10.5H2.625V11.375H3.5V10.5ZM5.25 7H6.125V7.875H5.25V7ZM6.125 8.75H5.25V9.625H6.125V8.75ZM5.25 10.5H6.125V11.375H5.25V10.5ZM6.125 5.25H5.25V6.125H6.125V5.25ZM7.875 7H8.75V7.875H7.875V7ZM8.75 8.75H7.875V9.625H8.75V8.75ZM7.875 10.5H8.75V11.375H7.875V10.5ZM8.75 5.25H7.875V6.125H8.75V5.25ZM10.5 7H11.375V7.875H10.5V7ZM11.375 8.75H10.5V9.625H11.375V8.75ZM10.5 5.25H11.375V6.125H10.5V5.25Z" fill="white"/>
                    </svg>
                    <p id="date" class="font-normal text-white lg:text-12 xl:text-14 font-solaimans not-italic leading-[14px]">
                        {{ __('messages.Current_Language') == 'en' ? date('d-M-Y'):Converter::bn_date(date('d-M-Y')) }} 

                      </p> 
                </div>
                <div class="flex items-center ms-[0.4375em] gap-1">
                    <svg class="w-[0.875em] h-[0.875em] text-white" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 14 14" fill="none">
                        <path d="M7 0.21875C3.25391 0.21875 0.21875 3.25391 0.21875 7C0.21875 10.7461 3.25391 13.7812 7 13.7812C10.7461 13.7812 13.7812 10.7461 13.7812 7C13.7812 3.25391 10.7461 0.21875 7 0.21875ZM7 12.4688C3.97852 12.4688 1.53125 10.0215 1.53125 7C1.53125 3.97852 3.97852 1.53125 7 1.53125C10.0215 1.53125 12.4688 3.97852 12.4688 7C12.4688 10.0215 10.0215 12.4688 7 12.4688ZM8.68984 9.61406L6.36836 7.92695C6.28359 7.86406 6.23438 7.76563 6.23438 7.66172V3.17188C6.23438 2.99141 6.38203 2.84375 6.5625 2.84375H7.4375C7.61797 2.84375 7.76562 2.99141 7.76562 3.17188V7.04648L9.59219 8.37539C9.73984 8.48203 9.76992 8.68711 9.66328 8.83477L9.14922 9.54297C9.04258 9.68789 8.8375 9.7207 8.68984 9.61406Z" fill="white"/>
                        </svg>
                    <p id="time" class="font-normal text-white lg:text-12 xl:text-14 font-solaimans not-italic leading-[0.875em]">
                        {{ __('messages.Current_Language') == 'en' ? date('h:i A'):Converter::bn_time(date('h:i A')) }} 
                    </p>
                </div>
            </div>
                
            <div  class="flex items-center gap-4 cursor-pointer">
               <span onclick="showNotificationHandle(event)">
                <title>Notification</title>
                <span style="position: absolute;height: fit-content;width: fit-content;background: red;color: black;border-radius: 50px;font-weight: bold;font-size: 12px;padding: 0px 3px;margin: -6px 0px 0px 16px;">{{count(Notification::get_remainder())+count(Notification::get_shared())}}</span>
                <svg  title="Notification" class="w-5 h-5 text-white cursor-pointer click-notification" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="none">
                    <path d="M10 20C11.3797 20 12.4989 18.8809 12.4989 17.5H7.5012C7.5012 18.8809 8.62034 20 10 20ZM18.4137 14.152C17.659 13.341 16.2469 12.1211 16.2469 8.125C16.2469 5.08984 14.1188 2.66016 11.2492 2.06406V1.25C11.2492 0.559766 10.6899 0 10 0C9.31018 0 8.75081 0.559766 8.75081 1.25V2.06406C5.88128 2.66016 3.75315 5.08984 3.75315 8.125C3.75315 12.1211 2.34104 13.341 1.58636 14.152C1.35198 14.4039 1.24807 14.7051 1.25003 15C1.25432 15.6406 1.75706 16.25 2.50393 16.25H17.4961C18.243 16.25 18.7461 15.6406 18.75 15C18.752 14.7051 18.6481 14.4035 18.4137 14.152Z" fill="white"/>
                </svg>
               </span>
                <div onclick="window.location='{{ url('/user-profile') }}'" class="flex items-center gap-1">
                
                    <img class="w-8 h-8 rounded-[3.125em]" src="{{ url('/uploads/prp-users/'. Auth::user()->photo) }}" alt="">
                
                    <p class="font-solaimans lg:text-12  xl:text-14 leading-4 font-normal not-italic text-white hidden lg:block">                {{ __('messages.Current_Language') == 'en' ? Auth::user()->nameEn : Auth::user()->nameBn }}
                    </p>
                </div>
            </div>
                

           
            
        </div>
    </div>
</div>
