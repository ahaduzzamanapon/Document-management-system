@extends('Layouts.backend_master')

@section('main-content')
<div class="w-full px-5 lg:ps-8  bg-[#F2F8FF]">
    <p class="font-solaimans text-15 text-black leading-4 py-4">{{ __('messages.Home') }} / {{ __('messages.Roles') }} {{ __('messages.and') }} {{ __('messages.Permissions') }} / {{ __('messages.Permissions') }} </p>
</div>

<div class=" bg-white py-3 w-full rounded">
    <div class="mt-3 ps-5 pe-10">
        <div class="lg:flex justify-between items-center">
            <h3 class="font-solaimans text-20 leading-5 w-full lg:w-[25%] xl:w-[20%]">Role & Permission </h3>
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
                <button onclick="addUser_Modal.showModal()" class="bg-[#F8B200] mt-2  md:mt-0 w-full md:w-[25%] lg:w-[20%] p-2  rounded-md">
                    <div class="w-full h-full flex">
                        <svg class="w-[20%]" xmlns="http://www.w3.org/2000/svg" width="16" height="17" viewBox="0 0 16 17" fill="none">
                            <path d="M10.8 10.2979C9.90312 10.2979 9.47188 10.7979 8 10.7979C6.52812 10.7979 6.1 10.2979 5.2 10.2979C2.88125 10.2979 1 12.1791 1 14.4979V15.2979C1 16.126 1.67188 16.7979 2.5 16.7979H13.5C14.3281 16.7979 15 16.126 15 15.2979V14.4979C15 12.1791 13.1187 10.2979 10.8 10.2979ZM13.5 15.2979H2.5V14.4979C2.5 13.0104 3.7125 11.7979 5.2 11.7979C5.65625 11.7979 6.39687 12.2979 8 12.2979C9.61563 12.2979 10.3406 11.7979 10.8 11.7979C12.2875 11.7979 13.5 13.0104 13.5 14.4979V15.2979ZM8 9.79785C10.4844 9.79785 12.5 7.78223 12.5 5.29785C12.5 2.81348 10.4844 0.797852 8 0.797852C5.51562 0.797852 3.5 2.81348 3.5 5.29785C3.5 7.78223 5.51562 9.79785 8 9.79785ZM8 2.29785C9.65312 2.29785 11 3.64473 11 5.29785C11 6.95098 9.65312 8.29785 8 8.29785C6.34688 8.29785 5 6.95098 5 5.29785C5 3.64473 6.34688 2.29785 8 2.29785Z" fill="white"/>
                        </svg>
                        <a class="font-solaimans text-12 xl:text-14 text-white font-medium leading-normal w-[80%]">New User</a>
                    </div>
                </button>
            </div>
        </div>
    </div>
</div>
<div class="bg-white ps-5 pe-10">
    <div class="lg:flex gap-2 lg:gap-8">
        <div class="w-full lg:w-[25%] shadow-lg py-3">
            <div class="w-full bg-[#E9FFE4] py-3 divide-y divide-gray-200">
                <div class="flex items-center justify-between px-4">
                    <h2 class="text-[#007A43] text-15 leading-4 font-solaimans font-semibold ">User Role Name</h2>
               
                </div>
            </div>
            <div class="pt-1">
                <ul>
                    <li class="w-full bg-[#007A43] py-3">
                        <a href="" class="text-white px-4 font-solaimans text-14 leading-4 flex items-center gap-3">President of Sales <span><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                            <path d="M3.11625 1.125H4.75875L14.04 10.4062L14.22 10.6538L16.875 15.2887L15.2887 16.875L10.6537 14.22L10.4062 14.04L1.125 4.75875V3.11625L3.11625 1.125ZM15.2887 15.2887L13.59 11.9137L11.9588 13.545L15.2887 15.2887ZM10.98 12.9712L12.9713 10.98L3.97125 1.98L1.98 3.97125L10.98 12.9712Z" fill="white"/>
                            </svg></span></a>
                    </li>
                    
                    <li class="w-full  py-3 border-b">
                        <a href="" class="text-[#082303] px-4 font-solaimans text-14 leading-4 flex items-center gap-3">Medical Assistant <span><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                            <path d="M3.11625 1.125H4.75875L14.04 10.4062L14.22 10.6538L16.875 15.2887L15.2887 16.875L10.6537 14.22L10.4062 14.04L1.125 4.75875V3.11625L3.11625 1.125ZM15.2887 15.2887L13.59 11.9137L11.9588 13.545L15.2887 15.2887ZM10.98 12.9712L12.9713 10.98L3.97125 1.98L1.98 3.97125L10.98 12.9712Z" fill="white"/>
                            </svg></span></a>
                    </li>
                    
                    <li class="w-full  py-3 border-b">
                        <a href="" class="text-[#082303] px-4 font-solaimans text-14 leading-4 flex items-center gap-3">Dog Trainer<span><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                            <path d="M3.11625 1.125H4.75875L14.04 10.4062L14.22 10.6538L16.875 15.2887L15.2887 16.875L10.6537 14.22L10.4062 14.04L1.125 4.75875V3.11625L3.11625 1.125ZM15.2887 15.2887L13.59 11.9137L11.9588 13.545L15.2887 15.2887ZM10.98 12.9712L12.9713 10.98L3.97125 1.98L1.98 3.97125L10.98 12.9712Z" fill="white"/>
                            </svg></span></a>
                    </li>
                    
                    <li class="w-full  py-3 border-b">
                        <a href="" class="text-[#082303] px-4 font-solaimans text-14 leading-4 flex items-center gap-3">Marketing Coordinator <span><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                            <path d="M3.11625 1.125H4.75875L14.04 10.4062L14.22 10.6538L16.875 15.2887L15.2887 16.875L10.6537 14.22L10.4062 14.04L1.125 4.75875V3.11625L3.11625 1.125ZM15.2887 15.2887L13.59 11.9137L11.9588 13.545L15.2887 15.2887ZM10.98 12.9712L12.9713 10.98L3.97125 1.98L1.98 3.97125L10.98 12.9712Z" fill="white"/>
                            </svg></span></a>
                    </li>
                    
                    <li class="w-full  py-3 border-b">
                        <a href="" class="text-[#082303] px-4 font-solaimans text-14 leading-4 flex items-center gap-3">Web Designer<span><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                            <path d="M3.11625 1.125H4.75875L14.04 10.4062L14.22 10.6538L16.875 15.2887L15.2887 16.875L10.6537 14.22L10.4062 14.04L1.125 4.75875V3.11625L3.11625 1.125ZM15.2887 15.2887L13.59 11.9137L11.9588 13.545L15.2887 15.2887ZM10.98 12.9712L12.9713 10.98L3.97125 1.98L1.98 3.97125L10.98 12.9712Z" fill="white"/>
                            </svg></span></a>
                    </li>
                    
                    <li class="w-full  py-3 border-b">
                        <a href="" class="text-[#082303] px-4 font-solaimans text-14 leading-4 flex items-center gap-3">Nursing Assistant<span><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                            <path d="M3.11625 1.125H4.75875L14.04 10.4062L14.22 10.6538L16.875 15.2887L15.2887 16.875L10.6537 14.22L10.4062 14.04L1.125 4.75875V3.11625L3.11625 1.125ZM15.2887 15.2887L13.59 11.9137L11.9588 13.545L15.2887 15.2887ZM10.98 12.9712L12.9713 10.98L3.97125 1.98L1.98 3.97125L10.98 12.9712Z" fill="white"/>
                            </svg></span></a>
                    </li>
                    
                </ul>
            </div>
        </div>
        <div class="w-full lg:w-[75%] shadow-md py-3">
            <div class="">
                <table class="min-w-full">
                    <thead class="bg-[#E9FFE4] ">
                        <tr class="w-full">
                            <th class="text-left ps-2 lg:pe-7 xl:pe-[26.313em] py-2 text-[#007A43] font-semibold text-15 "><span>User Permission</span> </th>
                            <th class=" py-2 text-left text-[#007A43] font-semibold text-15"><span class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                    <path d="M15.6809 11.5928L12.2502 8.16211C11.5735 7.48535 10.5627 7.35352 9.74829 7.75488L6.62524 4.63184V2.8125L2.87524 0L1.00024 1.875L3.81274 5.625H5.63208L8.75513 8.74805C8.35669 9.5625 8.4856 10.5732 9.16235 11.25L12.593 14.6807C13.0208 15.1084 13.7122 15.1084 14.137 14.6807L15.6809 13.1367C16.1057 12.709 16.1057 12.0176 15.6809 11.5928ZM10.718 6.5918C11.5471 6.5918 12.3264 6.91406 12.9124 7.5L13.4807 8.06836C13.9436 7.86621 14.3831 7.58496 14.7639 7.2041C15.8508 6.11719 16.22 4.58789 15.8743 3.19922C15.8098 2.93555 15.4788 2.84473 15.2854 3.03809L13.1057 5.21777L11.1165 4.88672L10.7854 2.89746L12.9651 0.717773C13.1584 0.524414 13.0647 0.193359 12.7981 0.125977C11.4094 -0.216797 9.88013 0.152344 8.79614 1.23633C7.96118 2.07129 7.5686 3.17285 7.58911 4.27148L9.99438 6.67676C10.2317 6.62109 10.4778 6.5918 10.718 6.5918ZM7.67407 8.99414L6.01294 7.33301L1.5481 11.8008C0.815674 12.5332 0.815674 13.7197 1.5481 14.4521C2.28052 15.1846 3.46704 15.1846 4.19946 14.4521L7.82056 10.8311C7.5979 10.248 7.53052 9.6123 7.67407 8.99414ZM2.87524 13.8281C2.48853 13.8281 2.17212 13.5117 2.17212 13.125C2.17212 12.7354 2.4856 12.4219 2.87524 12.4219C3.26489 12.4219 3.57837 12.7354 3.57837 13.125C3.57837 13.5117 3.26489 13.8281 2.87524 13.8281Z" fill="#007A43"/>
                                    </svg>Edit    
                            </span></th>
                            <th class=" text-left py-2 text-[#007A43] font-semibold text-15"><span class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15" fill="none">
                                    <path d="M7.49999 4.58333C7.22398 4.58765 6.95001 4.6315 6.68644 4.71354C6.80836 4.92795 6.87327 5.17003 6.87499 5.41667C6.87499 5.60818 6.83726 5.79781 6.76398 5.97475C6.69069 6.15168 6.58327 6.31245 6.44785 6.44786C6.31243 6.58328 6.15167 6.6907 5.97473 6.76399C5.7978 6.83728 5.60816 6.875 5.41665 6.875C5.17001 6.87329 4.92793 6.80837 4.71353 6.68646C4.54437 7.27312 4.56408 7.89814 4.76988 8.47298C4.97568 9.04782 5.35712 9.54333 5.86019 9.88934C6.36325 10.2353 6.96242 10.4143 7.57284 10.4008C8.18326 10.3874 8.77397 10.1822 9.26131 9.8144C9.74864 9.44658 10.1079 8.93474 10.2882 8.3514C10.4685 7.76806 10.4606 7.14278 10.2658 6.56413C10.071 5.98549 9.699 5.48281 9.20261 5.12731C8.70621 4.7718 8.11055 4.58149 7.49999 4.58333ZM14.9094 7.11979C13.4971 4.36432 10.7013 2.5 7.49999 2.5C4.29868 2.5 1.50207 4.36563 0.0906108 7.12005C0.0310383 7.23789 0 7.36809 0 7.50013C0 7.63217 0.0310383 7.76237 0.0906108 7.88021C1.50285 10.6357 4.29868 12.5 7.49999 12.5C10.7013 12.5 13.4979 10.6344 14.9094 7.87995C14.9689 7.76211 15 7.63191 15 7.49987C15 7.36783 14.9689 7.23763 14.9094 7.11979ZM7.49999 11.25C4.93097 11.25 2.57577 9.81771 1.30389 7.5C2.57577 5.18229 4.93071 3.75 7.49999 3.75C10.0693 3.75 12.4242 5.18229 13.6961 7.5C12.4245 9.81771 10.0693 11.25 7.49999 11.25Z" fill="#007A43"/>
                                    </svg> View </span></th>
                                <th class=" py-2 text-[#007A43] font-semibold text-15">
                                    <span class="flex items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15" fill="none">
                                            <path d="M8.78906 12.1875H9.49219C9.58543 12.1875 9.67485 12.1505 9.74078 12.0845C9.80671 12.0186 9.84375 11.9292 9.84375 11.8359V5.50781C9.84375 5.41457 9.80671 5.32515 9.74078 5.25922C9.67485 5.19329 9.58543 5.15625 9.49219 5.15625H8.78906C8.69582 5.15625 8.6064 5.19329 8.54047 5.25922C8.47454 5.32515 8.4375 5.41457 8.4375 5.50781V11.8359C8.4375 11.9292 8.47454 12.0186 8.54047 12.0845C8.6064 12.1505 8.69582 12.1875 8.78906 12.1875ZM13.5938 2.34375H11.1794L10.1833 0.682617C10.0583 0.474321 9.88146 0.30196 9.67003 0.182331C9.4586 0.0627019 9.21978 -0.000115529 8.97686 1.59506e-07H6.02314C5.78032 -1.43194e-05 5.54162 0.0628512 5.3303 0.182475C5.11898 0.3021 4.94224 0.474406 4.81729 0.682617L3.82061 2.34375H1.40625C1.28193 2.34375 1.1627 2.39314 1.07479 2.48104C0.986886 2.56895 0.9375 2.68818 0.9375 2.8125L0.9375 3.28125C0.9375 3.40557 0.986886 3.5248 1.07479 3.61271C1.1627 3.70061 1.28193 3.75 1.40625 3.75H1.875V13.5938C1.875 13.9667 2.02316 14.3244 2.28688 14.5881C2.5506 14.8518 2.90829 15 3.28125 15H11.7188C12.0917 15 12.4494 14.8518 12.7131 14.5881C12.9768 14.3244 13.125 13.9667 13.125 13.5938V3.75H13.5938C13.7181 3.75 13.8373 3.70061 13.9252 3.61271C14.0131 3.5248 14.0625 3.40557 14.0625 3.28125V2.8125C14.0625 2.68818 14.0131 2.56895 13.9252 2.48104C13.8373 2.39314 13.7181 2.34375 13.5938 2.34375ZM5.97187 1.4915C5.98754 1.46543 6.00971 1.44386 6.03621 1.42892C6.0627 1.41398 6.09263 1.40616 6.12305 1.40625H8.87695C8.90732 1.40622 8.93719 1.41405 8.96363 1.42899C8.99007 1.44393 9.01219 1.46547 9.02783 1.4915L9.53936 2.34375H5.46064L5.97187 1.4915ZM11.7188 13.5938H3.28125V3.75H11.7188V13.5938ZM5.50781 12.1875H6.21094C6.30418 12.1875 6.3936 12.1505 6.45953 12.0845C6.52546 12.0186 6.5625 11.9292 6.5625 11.8359V5.50781C6.5625 5.41457 6.52546 5.32515 6.45953 5.25922C6.3936 5.19329 6.30418 5.15625 6.21094 5.15625H5.50781C5.41457 5.15625 5.32515 5.19329 5.25922 5.25922C5.19329 5.32515 5.15625 5.41457 5.15625 5.50781V11.8359C5.15625 11.9292 5.19329 12.0186 5.25922 12.0845C5.32515 12.1505 5.41457 12.1875 5.50781 12.1875Z" fill="#007A43"/>
                                            </svg>Delete
                                    </span>
                                    </th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr>
                                <td class="px-4 py-3 font-solaimans text-[#082303] leading-4 text-15">File Upload</td>
                                <td class="px-4 py-3 leading-4 text-15">
                                    <input type="checkbox" ></td>
                                <td class="px-4 py-3 leading-4 text-15"> <input type="checkbox" ></td>
                                <td class="px-4 py-3 leading-4 text-15"> <input type="checkbox" ></td>

                            </tr>
                            <tr>
                                <td class="px-4 py-3 font-solaimans text-[#082303] leading-4 text-15">Share Files </td>
                                <td class="px-4 py-3 leading-4 text-15">
                                    <input type="checkbox" ></td>
                                <td class="px-4 py-3 leading-4 text-15"> <input type="checkbox" ></td>
                                <td class="px-4 py-3 leading-4 text-15"> <input type="checkbox" ></td>

                            </tr>
                            <tr>
                                <td class="px-4 py-3 font-solaimans text-[#082303] leading-4 text-15">Multipole version</td>
                                <td class="px-4 py-3 leading-4 text-15">
                                    <input type="checkbox" ></td>
                                <td class="px-4 py-3 leading-4 text-15"> <input type="checkbox" ></td>
                                <td class="px-4 py-3 leading-4 text-15"> <input type="checkbox" ></td>

                            </tr>
                            <tr>
                                <td class="px-4 py-3 font-solaimans text-[#082303] leading-4 text-15">Roles </td>
                                <td class="px-4 py-3 leading-4 text-15">
                                    <input type="checkbox" ></td>
                                <td class="px-4 py-3 leading-4 text-15"> <input type="checkbox" ></td>
                                <td class="px-4 py-3 leading-4 text-15"> <input type="checkbox" ></td>

                            </tr>
                            <tr>
                                <td class="px-4 py-3 font-solaimans text-[#082303] leading-4 text-15">Folder </td>
                                <td class="px-4 py-3 leading-4 text-15">
                                    <input type="checkbox" ></td>
                                <td class="px-4 py-3 leading-4 text-15"> <input type="checkbox" ></td>
                                <td class="px-4 py-3 leading-4 text-15"> <input type="checkbox" ></td>

                            </tr>
                            <tr>
                                <td class="px-4 py-3 font-solaimans text-[#082303] leading-4 text-15">Storage</td>
                                <td class="px-4 py-3 leading-4 text-15">
                                    <input type="checkbox" ></td>
                                <td class="px-4 py-3 leading-4 text-15"> <input type="checkbox" ></td>
                                <td class="px-4 py-3 leading-4 text-15"> <input type="checkbox" ></td>

                            </tr>
                            <tr>
                                <td class="px-4 py-3 font-solaimans text-[#082303] leading-4 text-15">Edit roles</td>
                                <td class="px-4 py-3 leading-4 text-15">
                                    <input type="checkbox" ></td>
                                <td class="px-4 py-3 leading-4 text-15"> <input type="checkbox" ></td>
                                <td class="px-4 py-3 leading-4 text-15"> <input type="checkbox" ></td>

                            </tr>
                            <tr>
                                <td class="px-4 py-3 font-solaimans text-[#082303] leading-4 text-15">Performance</td>
                                <td class="px-4 py-3 leading-4 text-15">
                                    <input type="checkbox" ></td>
                                <td class="px-4 py-3 leading-4 text-15"> <input type="checkbox" ></td>
                                <td class="px-4 py-3 leading-4 text-15"> <input type="checkbox" ></td>

                            </tr>
                            <tr>
                                <td class="px-4 py-3 font-solaimans text-[#082303] leading-4 text-15">Notification</td>
                                <td class="px-4 py-3 leading-4 text-15">
                                    <input type="checkbox" ></td>
                                <td class="px-4 py-3 leading-4 text-15"> <input type="checkbox" ></td>
                                <td class="px-4 py-3 leading-4 text-15"> <input type="checkbox" ></td>

                            </tr>
                            <tr>
                                <td class="px-4 py-3 font-solaimans text-[#082303] leading-4 text-15">Files</td>
                                <td class="px-4 py-3 leading-4 text-15">
                                    <input type="checkbox" ></td>
                                <td class="px-4 py-3 leading-4 text-15"> <input type="checkbox" ></td>
                                <td class="px-4 py-3 leading-4 text-15"> <input type="checkbox" ></td>

                            </tr>
                            <tr>
                                <td class="px-4 py-3 font-solaimans text-[#082303] leading-4 text-15">Automate Reminder</td>
                                <td class="px-4 py-3 leading-4 text-15">
                                    <input type="checkbox" ></td>
                                <td class="px-4 py-3 leading-4 text-15"> <input type="checkbox" ></td>
                                <td class="px-4 py-3 leading-4 text-15"> <input type="checkbox" ></td>

                            </tr>

                           
                            
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection