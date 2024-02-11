@extends('Layouts.backend_master')

@section('main-content')
    <style>
        .file-input__input {
            width: 0.1px;
            height: 0.1px;
            opacity: 0;
            overflow: hidden;
            position: absolute;
            z-index: -1;
        }

        /*
    .file-input__label {
      cursor: pointer;
      display: inline-flex;
      align-items: center;
      border-radius: 4px;
      font-size: 14px;
      font-weight: 600;
      color: #fff;
      
      
      background-color: #F2F8FF;
      
    } */

        .file-input__label svg {
            height: 16px;
            margin-right: 4px;
        }
    </style>
    <div class="w-full px-5 lg:ps-8  bg-[#F2F8FF]">
        <p class="font-solaimans text-15 text-black leading-4 py-4">{{ __('messages.Home') }} / {{ __('messages.Settings') }}</p>
    </div>

    <div class="ps-5 pe-10">
        <div class="bg-white py-3 px-2 shadow-sm">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-4">
                    <h1 class="text-20 font-solaimans leading-5">{{ __('messages.Settings') }} {{ __('messages.Details') }}</h1>
                </div>
                <div>
                    {{-- <a href="{{ url('create_user') }}" class="bg-[#F8B200] mt-2  md:mt-0 w-full  p-2  rounded-md font-solaimans text-white">
                        <i class="fa-solid fa-plus"></i>
                        <span>Add User</span>
                    </a> --}}
                </div>
            </div>
           
            <div class="mt-6">
                <form action="{{ url('/add_setting') }}" method="POST" enctype="multipart/form-data" class="w-full h-full"
                    accept-charset="UTF-8" enctype="multipart/form-data">
                    @csrf

                    <div class="flex gap-4 w-full h-full">
                        <div class="w-[50%] h-full">
                            <div>
                     
                                <div onclick="fileUploadSettingen()" class="w-full py-2 px-2 focus:outline-none border border-[#DFDFDF] rounded  flex justify-end cursor-pointer">
                                    <label class="py-1 flex items-center gap-1 bg-[#F2F8FF] rounded px-2 cursor-pointer lg:text-12 xl:text-14 font-solaimans" style="white-space: nowrap;">{{__('messages.upload')}} {{__('messages.Logo')}} {{__('messages.English')}}</label>
                                    <div style="width: 100%; justify-content: right; display: flex; padding: 4px 21px;">
                                        <input type="file" name="logo_input_en" id="logo_input_en" class="file-input__input" onchange="previewImageen(this);" placeholder="Enter" />
                                        <img id="image-preview_en" src="{{asset('settings/'.$settings['0']->logo_en)}}" alt="Image Preview" class="w-[120px] min-h-[20px] pe-2" />
                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15" fill="none">
                                                 <path
                                            d="M8.67188 11.2498H6.32812C5.93848 11.2498 5.625 10.9363 5.625 10.5466V5.62476H3.05566C2.53418 5.62476 2.27344 4.99487 2.64258 4.62573L7.09863 0.166748C7.31836 -0.0529785 7.67871 -0.0529785 7.89844 0.166748L12.3574 4.62573C12.7266 4.99487 12.4658 5.62476 11.9443 5.62476H9.375V10.5466C9.375 10.9363 9.06152 11.2498 8.67188 11.2498ZM15 11.0154V14.2966C15 14.6863 14.6865 14.9998 14.2969 14.9998H0.703125C0.313477 14.9998 0 14.6863 0 14.2966V11.0154C0 10.6257 0.313477 10.3123 0.703125 10.3123H4.6875V10.5466C4.6875 11.4519 5.42285 12.1873 6.32812 12.1873H8.67188C9.57715 12.1873 10.3125 11.4519 10.3125 10.5466V10.3123H14.2969C14.6865 10.3123 15 10.6257 15 11.0154ZM11.3672 13.5935C11.3672 13.2712 11.1035 13.0076 10.7812 13.0076C10.459 13.0076 10.1953 13.2712 10.1953 13.5935C10.1953 13.9158 10.459 14.1794 10.7812 14.1794C11.1035 14.1794 11.3672 13.9158 11.3672 13.5935ZM13.2422 13.5935C13.2422 13.2712 12.9785 13.0076 12.6562 13.0076C12.334 13.0076 12.0703 13.2712 12.0703 13.5935C12.0703 13.9158 12.334 14.1794 12.6562 14.1794C12.9785 14.1794 13.2422 13.9158 13.2422 13.5935Z"
                                            fill="#007A43" />
                                        </svg>
                                        <span class="text-[#007A43] font-solaimans text-15 ms-1">{{__('messages.upload')}}</span>
                                    </div>
                                </div>
                                
                                <div onclick="fileUploadSettingbn()" class="w-full py-2 px-2 focus:outline-none border border-[#DFDFDF] rounded mt-3 flex justify-end cursor-pointer">
                                    <label class="py-1 flex items-center gap-1 bg-[#F2F8FF] rounded px-2 cursor-pointer lg:text-12 xl:text-14 font-solaimans" style="white-space: nowrap;">{{__('messages.upload')}} {{__('messages.Logo')}} {{__('messages.Bangla')}}</label>
                                    <div style="width: 100%; justify-content: right; display: flex; padding: 4px 21px;">
                                        <input type="file" name="logo_input_bn" id="logo_input_bn" class="file-input__input" onchange="previewImagebn(this);" placeholder="Enter" />
                                        <img id="image-preview_bn" src="{{asset('settings/'.$settings['0']->logo_bn)}}" alt="Image Preview" class="w-[100px] min-h-[20px] pe-2"/>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15" fill="none">
                                                 <path
                                            d="M8.67188 11.2498H6.32812C5.93848 11.2498 5.625 10.9363 5.625 10.5466V5.62476H3.05566C2.53418 5.62476 2.27344 4.99487 2.64258 4.62573L7.09863 0.166748C7.31836 -0.0529785 7.67871 -0.0529785 7.89844 0.166748L12.3574 4.62573C12.7266 4.99487 12.4658 5.62476 11.9443 5.62476H9.375V10.5466C9.375 10.9363 9.06152 11.2498 8.67188 11.2498ZM15 11.0154V14.2966C15 14.6863 14.6865 14.9998 14.2969 14.9998H0.703125C0.313477 14.9998 0 14.6863 0 14.2966V11.0154C0 10.6257 0.313477 10.3123 0.703125 10.3123H4.6875V10.5466C4.6875 11.4519 5.42285 12.1873 6.32812 12.1873H8.67188C9.57715 12.1873 10.3125 11.4519 10.3125 10.5466V10.3123H14.2969C14.6865 10.3123 15 10.6257 15 11.0154ZM11.3672 13.5935C11.3672 13.2712 11.1035 13.0076 10.7812 13.0076C10.459 13.0076 10.1953 13.2712 10.1953 13.5935C10.1953 13.9158 10.459 14.1794 10.7812 14.1794C11.1035 14.1794 11.3672 13.9158 11.3672 13.5935ZM13.2422 13.5935C13.2422 13.2712 12.9785 13.0076 12.6562 13.0076C12.334 13.0076 12.0703 13.2712 12.0703 13.5935C12.0703 13.9158 12.334 14.1794 12.6562 14.1794C12.9785 14.1794 13.2422 13.9158 13.2422 13.5935Z"
                                            fill="#007A43" />
                                        </svg>
                                        <span class="text-[#007A43] font-solaimans text-15 ms-1">{{__('messages.upload')}}</span>
                                    </div>
                                </div>
                                
                                <script>
                                    function previewImageen(input) {
                                        const imagePreview = document.getElementById('image-preview_en');
                                
                                        if (input.files && input.files[0]) {
                                            const reader = new FileReader();
                                            reader.onload = function (e) {
                                                imagePreview.src = e.target.result;
                                                imagePreview.style.display = 'block';
                                            };
                                            reader.readAsDataURL(input.files[0]);
                                        } else {
                                            imagePreview.src = '';
                                            imagePreview.style.display = 'none';
                                        }
                                    }
                                    
                                    function previewImagebn(input) {
                                        const imagePreview = document.getElementById('image-preview_bn');
                                
                                        if (input.files && input.files[0]) {
                                            const reader = new FileReader();
                                            reader.onload = function (e) {
                                                imagePreview.src = e.target.result;
                                                imagePreview.style.display = 'block';
                                            };
                                            reader.readAsDataURL(input.files[0]);
                                        } else {
                                            imagePreview.src = '';
                                            imagePreview.style.display = 'none';
                                        }
                                    }
                                </script>
                                
                            </div>
                            <div
                                class="w-full py-2 px-2 focus:outline-none border border-[#DFDFDF] rounded mt-3 flex justify-end cursor-pointer">
                                <label class="py-1 flex items-center gap-1 bg-[#F2F8FF] rounded px-2 cursor-pointer lg:text-12 xl:text-14 font-solaimans"
                                    style="white-space: nowrap;">{{__('messages.Change_Language')}}</label>
                                <select class="py-1 px-2 w-full focus:outline-none text-13" id="language-select" name="language">
                                    <option value="en" {{ __('messages.Current_Language') == 'en' ? 'selected' : '' }}>
                                        English</option>
                                    <option value="bn" {{ __('messages.Current_Language') == 'bn' ? 'selected' : '' }}>
                                        বাংলা</option>
                                </select>
                            </div>
                            <div class="hidden w-full h-[233px] border border-[#DCDCDC] rounded py-2 mt-5">
                                <div class="py-2 px-2 flex items-center justify-between">
                                    <h1 class="text-20 font-solaimans font-medium">{{ __('messages.Reminders') }} {{ __('messages.Settings') }}</h1>
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            viewBox="0 0 16 16" fill="none">
                                            <path
                                                d="M2.33822 15.699H12.3592C12.9803 15.6973 13.5753 15.4536 14.0136 15.0215C14.452 14.5894 14.6979 14.0042 14.6974 13.3943V8.44951C14.6974 8.27552 14.627 8.10864 14.5017 7.98561C14.3764 7.86257 14.2065 7.79345 14.0293 7.79345C13.8521 7.79345 13.6822 7.86257 13.5569 7.98561C13.4316 8.10864 13.3613 8.27552 13.3613 8.44951V13.3943C13.3621 13.6563 13.2571 13.908 13.0693 14.0941C12.8814 14.2802 12.626 14.3855 12.3592 14.3869H2.33822C2.07138 14.3855 1.816 14.2802 1.62813 14.0941C1.44025 13.908 1.33524 13.6563 1.33613 13.3943V3.57037C1.33524 3.30832 1.44025 3.05663 1.62813 2.87053C1.816 2.68444 2.07138 2.57914 2.33822 2.57775H7.34869C7.52587 2.57775 7.6958 2.50863 7.82108 2.38559C7.94637 2.26256 8.01675 2.09569 8.01675 1.92169C8.01675 1.74769 7.94637 1.58082 7.82108 1.45778C7.6958 1.33475 7.52587 1.26563 7.34869 1.26562H2.33822C1.71712 1.26736 1.1221 1.51101 0.683735 1.94311C0.245367 2.3752 -0.000532507 2.96043 8.65882e-07 3.57037V13.3943C-0.000532507 14.0042 0.245367 14.5894 0.683735 15.0215C1.1221 15.4536 1.71712 15.6973 2.33822 15.699Z"
                                                fill="black" />
                                            <path
                                                d="M6.31585 6.86602L5.78875 9.23703C5.76489 9.34457 5.76897 9.45628 5.80061 9.56188C5.83224 9.66747 5.89043 9.76355 5.96979 9.84126C6.05025 9.91702 6.14813 9.97262 6.25512 10.0033C6.36211 10.0341 6.47506 10.039 6.58441 10.0177L8.99345 9.4988C9.11853 9.47182 9.23309 9.41011 9.32347 9.321L15.4122 3.34165C15.5983 3.15888 15.746 2.94189 15.8467 2.70308C15.9475 2.46426 15.9993 2.2083 15.9993 1.94981C15.9993 1.69131 15.9475 1.43535 15.8467 1.19654C15.746 0.957724 15.5983 0.740738 15.4122 0.55797C15.0306 0.199849 14.5231 0 13.9952 0C13.4674 0 12.9599 0.199849 12.5783 0.55797L6.4989 6.54323C6.40766 6.63138 6.34412 6.74342 6.31585 6.86602ZM13.5229 1.4863C13.65 1.36673 13.8192 1.29997 13.9952 1.29997C14.1712 1.29997 14.3405 1.36673 14.4675 1.4863C14.5911 1.61005 14.6604 1.77647 14.6604 1.94981C14.6604 2.12314 14.5911 2.28956 14.4675 2.41332L13.9952 2.87715L13.0506 1.94948L13.5229 1.4863ZM7.57715 7.33444L12.1026 2.87912L13.0379 3.8022L8.51044 8.25884L7.31126 8.51733L7.57715 7.33444Z"
                                                fill="black" />
                                        </svg>
                                    </span>
                                </div>
                                <hr>
                                <div class="px-3 py-2">
                                    <div class="relative mt-4">
                                        <label class="text-14 font-solaimans bg-white absolute -top-3 left-4">{{ __('messages.Reminders') }}
                                            {{ __('messages.Alert') }}</label>
                                            
                                        <select name="reminder_alert_day" id=""
                                            class="w-full px-2 py-2 border border-[#E8E1E0] rounded focus:outline-none">
                                            <option  <?=($settings['0']->reminder_alert_day)? '':'' ?> class="text-14 font-solaimans text-[#8D8382]">Before 1 day</option>
                                            <option value="2" class="text-14 font-solaimans text-[#8D8382]">Before 2 day</option>
                                            <option value="3" class="text-14 font-solaimans text-[#8D8382]">Before 3 day</option>
                                            <option value="4" class="text-14 font-solaimans text-[#8D8382]">Before 4 day</option>
                                            <option value="5" class="text-14 font-solaimans text-[#8D8382]">Before 5 day</option>
                                        </select>
                                    </div>
                                    <div class="relative mt-4">
                                        <label class="text-15 font-solaimans bg-white absolute -top-3 left-4">Remainder Alert
                                            time</label>
                                        <select name="" id=""
                                            class="w-full px-2 py-2 border border-[#E8E1E0] rounded focus:outline-none">
                                            <option value="" class="text-14 font-solaimans text-[#8D8382]">Alert before
                                                Mins</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="w-[50%] h-full border border-[#DCDCDC] px-3">
                            <div class="py-2">
                                <h1 class="font-solaimans text-18 font-medium">{{ __('messages.Permissions') }} {{ __('messages.Settings') }}</h1>
                            </div>
                            <hr>
                            <div class="flex items-center justify-between py-3">
                                <div>
                                    <h1 class="text-15 font-solaimans font-medium">Stop Upload files</h1>
                                    <p class="text-10 font-solaimans text-[#989898]">Stopping All Uploading files For All</p>
                                </div>
                             
                                <div class="flex items-center gap-3">
                                    <label class="font-solaimans font-semibold text-15">No</label>
                                    <input type="checkbox" name="upload_files"  {{(Setting::upload_file()==0)? 'checked':''}} class="toggle toggle-success" />
                                    <label class="font-solaimans font-semibold text-15">Yes</label>
                                </div>
                            </div>
                            <hr>

                            <div class="flex items-center justify-between py-3">
                                <div class="">
                                    <h1 class="text-15 font-solaimans font-medium">Stop Creating Folder</h1>
                                    <p class="text-10 font-solaimans text-[#989898]">No-one / any roles can’t create any
                                        folder</p>
                                </div>
                                <div class="flex items-center gap-3">
                                    <label class="font-solaimans font-semibold text-15">No</label>
                                    <input type="checkbox" name="create_folder"  {{(Setting::create_folder()==0)? 'checked':''}} class="toggle toggle-success" />
                                    <label class="font-solaimans font-semibold text-15">Yes</label>
                                </div>
                            </div>
                            <hr>

                            <div class="flex items-center justify-between py-3">
                                <div>
                                    <h1 class="text-15 font-solaimans font-medium">Stop All User Login</h1>
                                    <p class="text-10 font-solaimans text-[#989898]">No-one can’t login in the system</p>
                                </div>
                                <div class="flex items-center gap-3">
                                    <label class="font-solaimans font-semibold text-15">No</label>
                                    <input type="checkbox" name="user_login"  {{(Setting::user_login()==0)? 'checked':''}} class="toggle toggle-success" />
                                    <label class="font-solaimans font-semibold text-15">Yes</label>
                                </div>
                            </div>
                            <hr>

                            <div class="flex items-center justify-between py-3">
                                <div>
                                    <h1 class="text-15 font-solaimans font-medium">Stop All remainder</h1>
                                    <p class="text-10 font-solaimans text-[#989898]">Any remainder will stop & not showing any
                                        alert</p>
                                </div>
                                <div class="flex items-center gap-3">
                                    <label class="font-solaimans font-semibold text-15">No</label>
                                    <input type="checkbox" name="remainder"  {{(Setting::remainder()==0)? 'checked':''}} class="toggle toggle-success" />
                                    <label class="font-solaimans font-semibold text-15">Yes</label>
                                </div>
                            </div>
                            <hr>

                            <div class="flex items-center justify-between py-3">
                                <div>
                                    <h1 class="text-15 font-solaimans font-medium">Stop Showing Previous Version</h1>
                                    <p class="text-10 font-solaimans text-[#989898]">Stop Showing Previous Version for any
                                        file</p>
                                </div>
                                <div class="flex items-center gap-3">
                                    <label class="font-solaimans font-semibold text-15">No</label>
                                    <input type="checkbox" name="previous_version"  {{(Setting::previous_version()==0)? 'checked':''}} class="toggle toggle-success" />
                                    <label class="font-solaimans font-semibold text-15">Yes</label>
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>
                    <div class="flex items-center justify-end gap-3 py-4">
                        <button type="submit" class="bg-[#007A43] px-2 py-1 rounded text-white text-14 font-solaimans">{{ __('messages.save') }}
                            </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        let fileInputbn = document.getElementById('logo_input_bn');

        function fileUploadSettingbn() {
            fileInputbn.click();
        }
        let fileInputen = document.getElementById('logo_input_en');

        function fileUploadSettingen() {
            fileInputen.click();
        }
    </script>
@endsection
