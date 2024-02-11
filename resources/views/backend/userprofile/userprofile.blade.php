@extends('Layouts.backend_master')

@section('main-content')
<div class="w-full px-5 lg:ps-8  bg-[#F2F8FF]">
    <p class="font-solaimans text-15 text-black leading-4 py-4">{{ __('messages.Home') }} / {{ __('messages.Profile Update') }}</p>
</div>
<section class="px-10  py-6">
    <div class=" bg-white rounded-md px-4 py-6 shadow">
        <div class="flex items-center gap-3">
            <h2 class="text-20 font-solaimans">{{__('messages.Profile')}}</h2>
        </div>
        <form action="{{url('/update_user_profile')}}" method="post">
            @csrf
            <input type="hidden" name="user_id" value="{{$user['id']}}">
            <div class="w-full flex gap-4 py-2">

                <div class="w-[18%]">
                    <figure class="relative">
                        <img src="{{ asset('uploads/prp-users/' . $user['photo']) }}" alt="">
                    </figure>
                </div>
                <div class="w-[82%]">
                    <div>
                        <input type="text" class="w-full border border-[#DFDFDF] py-2 px-3 focus:outline-none" value="{{ $user['nameEn'] }}" placeholder="User Name" readonly>
                    </div>
                    <div class="mt-3">
                        <input type="text" class="w-full border border-[#DFDFDF] py-2 px-3 focus:outline-none" value="{{ $user['nameBn'] }}" placeholder="User Name" readonly>
                    </div>
                    @if(Auth::user()->can('add_role'))
                    <div class="mt-3">
                        <select class="w-full border border-[#DFDFDF] !py-2 px-3 focus:outline-none"  name="roleselect">
                            <option>Select Role</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->name }}" @if ($user->hasRole($role->name)) selected @endif>{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @endif
                    <div class="mt-3">
                        <input type="text" class="w-full border border-[#DFDFDF] py-2 px-3 focus:outline-none" value="{{ $user['username'] }}" placeholder="User Name" readonly>
                    </div>
                    <div class="mt-3">
                        <input type="text" class="w-full border border-[#DFDFDF] py-2 px-3 focus:outline-none" value="{{ $user['email'] }}" placeholder="User Name" readonly>
                    </div>
                    <div class="mt-3">
                        <input type="text" class="w-full border border-[#DFDFDF] py-2 px-3 focus:outline-none" value="{{ $user['phone'] }}" placeholder="User Name" readonly>
                    </div>
                    @if(Auth::user()->can('add_role'))
                        <div class="mt-3 flex justify-end">
                            <button type="submit" class="bg-[#007A43] py-2 px-4  rounded !border-none text-white font-p-posts" placeholder="User Name">
                                {{ __('messages.update') }}
                            </button>
                        </div>
                    @endif
                </div>
            </div>
        </form>
    </div>
</section>

@endsection