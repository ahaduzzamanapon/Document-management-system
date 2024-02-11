@extends('Layouts.backend_master')

@section('main-content')
<div class="w-full px-5 lg:ps-8  bg-[#F2F8FF]">
    <p class="font-solaimans text-15 text-black leading-4 py-4">{{ __('messages.Home') }} /  {{__('messages.addNewUser') }}</p>
</div>
<section class="px-10  py-6">
    <div class=" bg-white rounded-md px-4 py-6 shadow">
        <div class="flex items-center gap-3">
            <h2 class="text-20 font-solaimans">{{__('messages.Profile')}}</h2>
        </div>
        @if($errors->any())
            @foreach($errors->all() as $error)
           
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong class="font-solaimans color-red" style="color: red">{{ $error }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endforeach
        @endif
        <form action="{{url('/add_user')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="user_id" >
            <div class="w-full flex gap-4 py-2">

                <div class="w-[18%]  xl:max-h-48 border border-sky-200 relative">
                    
                        <img id="previewImage" class="w-full h-full" src="{{asset('assets/image/df.jpg')}}" accept="image/*" alt="">
                        
                    
                    <input type="file" id="profileImage" value="{{old('profile_image')}}" name="profile_image" onchange="showSelectedImage()" class="hidden">
                    <span onclick="choiceProfilePicture()" class="absolute right-1 bottom-1 cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M16.7625 15.7043L18.0958 14.3709C18.3042 14.1626 18.6667 14.3084 18.6667 14.6084V20.6668C18.6667 21.7709 17.7708 22.6668 16.6667 22.6668H2C0.895833 22.6668 0 21.7709 0 20.6668V6.00011C0 4.89595 0.895833 4.00011 2 4.00011H13.3958C13.6917 4.00011 13.8417 4.35845 13.6333 4.57095L12.3 5.90428C12.2375 5.96678 12.1542 6.00011 12.0625 6.00011H2V20.6668H16.6667V15.9376C16.6667 15.8501 16.7 15.7668 16.7625 15.7043ZM23.2875 7.29595L12.3458 18.2376L8.57917 18.6543C7.4875 18.7751 6.55833 17.8543 6.67917 16.7543L7.09583 12.9876L18.0375 2.04595C18.9917 1.09178 20.5333 1.09178 21.4833 2.04595L23.2833 3.84595C24.2375 4.80011 24.2375 6.34595 23.2875 7.29595ZM19.1708 8.58345L16.75 6.16261L9.00833 13.9084L8.70417 16.6293L11.425 16.3251L19.1708 8.58345ZM21.8708 5.26261L20.0708 3.46261C19.9 3.29178 19.6208 3.29178 19.4542 3.46261L18.1667 4.75011L20.5875 7.17095L21.875 5.88345C22.0417 5.70845 22.0417 5.43345 21.8708 5.26261Z" fill="#007A43"/>
                          </svg>
                    </span>
                </div>
                <div class="w-[82%]">
                    <div>
                        <label for="name" class="font-solaimans text-15 text-black leading-4">{{__('messages.NameEn') }}: <span class="text-red-700">*</span></label>
                        <input name="nameEn" type="text" value="{{old('nameEn')}}" class="w-full border border-[#DFDFDF] py-2 px-3 focus:outline-none"  placeholder="{{__('messages.NameEn') }}" required>
                    </div>
                    <div class="mt-3">
                        <label for="name" class="font-solaimans text-15 text-black leading-4">{{__('messages.NameBn') }}:  <span class="text-red-700">*</span></label>
                        <input name="nameBn" type="text" value="{{old('nameBn')}}" class="w-full border border-[#DFDFDF] py-2 px-3 focus:outline-none"  placeholder="{{__('messages.NameBn') }}" required>
                    </div>
                    
                    <div class="mt-3">
                        <label for="name" class="font-solaimans text-15 text-black leading-4">{{__('messages.selectRole') }}: <span style="color:gray">(optional)</span></label>
                    <select class="w-full border border-[#DFDFDF] py-2 px-3 focus:outline-none" name="roleselect" required>
                        <option>Select Role</option>
                        @foreach ($roles as $role)
                            <option value="{{ $role->name }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                    </div>
                   
                    <div class="mt-3">
                        <label for="name" class="font-solaimans text-15 text-black leading-4">{{__('messages.UserName') }}: <span class="text-red-700">*</span></label>
                        <input type="text" name="username" value="{{old('username')}}" class="w-full border border-[#DFDFDF] py-2 px-3 focus:outline-none"  placeholder="{{__('messages.UserName') }}" required>
                    </div>
                    <div class="mt-3">
                        <label for="name" class="font-solaimans text-15 text-black leading-4">{{__('messages.email') }}: <span class="text-red-700">*</span></label>
                        <input type="text" name="email" value="{{old('email')}}" class="w-full border border-[#DFDFDF] py-2 px-3 focus:outline-none"  placeholder="{{__('messages.email') }}" required>
                    </div>
                    <div class="mt-3">
                        <label for="name" class="font-solaimans text-15 text-black leading-4">{{__('messages.phoneNumber') }}:: <span class="text-red-700">*</span></label>
                        <input type="text" name="phone" value="{{old('phone')}}" class="w-full border border-[#DFDFDF] py-2 px-3 focus:outline-none"  placeholder="{{__('messages.phoneNumber') }}" required>
                    </div>
                    <div class="mt-3">
                        <label for="name" class="font-solaimans text-15 text-black leading-4">{{__('messages.Passwords') }}: <span class="text-red-700">*</span></label>
                        <input type="text" name="password" value="{{old('password')}}" class="w-full border border-[#DFDFDF] py-2 px-3 focus:outline-none"  placeholder="{{__('messages.Passwords') }}" required>
                    </div>
                    
                    <div class="mt-3 flex justify-end">
                        <button type="submit" class="bg-[#007A43] py-2 px-4  rounded !border-none text-white font-p-posts" placeholder="User Name">
                            {{__('messages.addUser') }}
                        </button>
                    </div>
                    
                </div>
            </div>
        </form>
    </div>
</section>

@endsection