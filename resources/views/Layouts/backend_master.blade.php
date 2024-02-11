<?php

?>
<!doctype html>
<html data-theme="light">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite('resources/css/app.css')
    <title>{{ __('messages.title') }}</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/image/logo.png') }}">
    <!-- <script src="https://cdn.jsdelivr.net/npm/mammoth@1.4.9/mammoth.browser.min.js"></script> -->
    <script src="{{ asset('assets/js/mammoth.browser.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- CSS -->
    <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>

    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/chosen/1.1.0/chosen.min.css">
    {{-- <script src="{{asset('assets/css/chosen.min.css')}}"></script> --}}
    {{-- <meta http-equiv="Content-Security-Policy" content="default-src 'self'; frame-ancestors 'none';"> --}}

    <!-- JS -->
    {{-- <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/chosen/1.1.0/chosen.jquery.min.js"></script> --}}
    <script src="{{ asset('assets/js/chosen.jquery.min.js') }}"></script>

    {{-- google font start --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Roboto&display=swap" rel="stylesheet">
    {{-- font-awesome-icon --}}
    <link rel="stylesheet" href="{{ asset('assets/font-awesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/font/SolaimanLipi.ttf') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">
    <!-- <link href="{{ asset('assets/css/sweetalert2.min.css') }}"> -->

    <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.js"></script> -->
    <script src="{{ asset('assets/js/sweetalert2.min.js') }}"></script>


    <script src="https://kit.fontawesome.com/eb7c20eb69.js" crossorigin="anonymous"></script>

    {{-- <link href="https://cdn.jsdelivr.net/npm/daisyui@3.7.3/dist/full.css" rel="stylesheet" type="text/css" />
<script src="https://cdn.tailwindcss.com"></script> --}}
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" /> --}}
    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.7.3/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        /* .modal-box::-webkit-scrollbar-track
        {
            -webkit-box-shadow: inset 0 0 6px rgba(204, 198, 198, 0.3);
            border-radius: 10px;
            background-color: #F5F5F5;


        }

    .modal-box::-webkit-scrollbar
        {
            width: 7px;
            background-color: #F5F5F5;
        }

    .modal-box::-webkit-scrollbar-thumb
        {
            border-radius: 10px;
            margin-right: 30px;

            -webkit-box-shadow: inset 0 0 6px rgba(146, 141, 141, 0.3);
            background-color: #555;
        } */

        /* .imgBox{
    background-image: url('photo.png');
    position: relative;
    top: 7px;
    left: 5px;
    height: 145px;
    width: 145px;
    cursor: pointer;
}

.whiteBox{
    display: inline-block;
    height: 155px;
    width: 155px;
    margin: 10px;
    background-color: white;
    border: 3px black solid;
} */

        .hold {
            cursor: no-drop;
            opacity: 0.4;
        }




        .dashed {
            border: 2px dashed #007A43;
            animation: dash 2s linear infinite;
        }

        @keyframes dash {
            from {
                background-position: 0;
            }

            to {
                background-position: 20px;
            }
        }


        .hide {
            display: none;
        }

        .chosen-container .chosen-results {
            color: #000000;
            position: relative;
            overflow-x: hidden;
            overflow-y: auto;
            margin: 0 4px 4px 0;
            padding: 0 0 0 10px;
            max-height: 240px;
            -webkit-overflow-scrolling: touch;
        }

        /* .default{
            padding: 18px 13px!important;
        } */
        /* .chosen-container{
            width: 100%!important;
        } */
        /* Customize the scrollbar track */
        .content_body::-webkit-scrollbar {
            width: 6px;
        }

        /* Customize the scrollbar thumb */
        .content_body::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 15px;
        }

        @keyframes slide {
            0% {
                height: auto;
                opacity: 1;
            }

            100% {
                height: 0;
                opacity: 0;
            }
        }

        section {
            animation-duration: 0.5s;
            animation-fill-mode: forwards;
        }

        #files_info_dr {
            height: 70%;
            bottom: 0;
            width: 28%;
            display: flex;

            align-items: center;
            justify-content: center;
            background-color: #ffffff;
            color: white;
            position: fixed;
            right: 0;
            transform: translateX(100%);
            transition: transform 0.3s linear;
            margin-left: 200px;
        }

        #files_info_dr.active {
            transform: translateX(0);
        }

        a {
            cursor: pointer;
        }

        .files_info_header {
            top: 0;
            position: absolute;
            width: 100%;

            display: flex;
            padding: 12px;
            color: black;
            gap: 9px;
            flex-direction: row;
            align-items: center;
        }

        .files_info_content {
            top: 54px;
            position: absolute;
            left: 7px;
            color: black;
            width: 100%;
        }

        .tag_name {
            color: black;
            font-size: 16px;
        }

        .tag_d {
            color: #898989;
            font-size: 16px;
        }

        .drop-zone {
            max-width: 100%;
            height: 200px;
            padding: 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            font-family: "Quicksand", sans-serif;
            font-weight: 500;
            font-size: 20px;
            cursor: pointer;
            color: #cccccc;
            border: 4px dashed #009578;
            border-radius: 10px;
            flex-direction: column;
        }

        .drop-zone--over {
            border-style: solid;
        }

        .drop-zone__input {
            display: none;
        }

        .drop-zone__thumb {
            width: 25%;
            height: 80%;
            border-radius: 10px;
            overflow: hidden;
            background-color: #cccccc;
            background-size: cover;
            position: relative;
        }

        .drop-zone__thumb::after {
            content: attr(data-label);
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            padding: 5px 0;
            color: #ffffff;
            background: rgba(0, 0, 0, 0.75);
            font-size: 14px;
            text-align: center;
        }

        .active {
            background-color: #EBFBEC;
            color: black !important;
        }


        #bottomDrawer {
            position: fixed;
            bottom: -300px;
            /* Initially hidden */
            right: 0;

            background-color: transparent;
            transition: transform 0.3s ease-in-out;
            padding: 20px;
            z-index: 999;
        }

        #toggleButton {
            position: fixed;
            bottom: 20px;
            left: 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            z-index: 2;
        }

        #bottomDrawer.open {
            transform: translateY(-300px);
            /* Move it up to show */
        }

        /* cheakbox design */
        .checkbox-con {
            display: flex;
            align-items: center;
            color: white;
        }

        .checkbox-con input[type="checkbox"] {
            appearance: none;
            width: 66px;
            height: 20px;
            border: 2px solid #ff0000;
            border-radius: 20px;
            background: #f1e1e1;
            position: relative;
            box-sizing: border-box;
            cursor: pointer;
        }

        .checkbox-con input[type="checkbox"]::before {
            content: "";
            width: 14px;
            height: 14px;
            background: rgba(234, 7, 7, 0.5);
            border: 2px solid #ea0707;
            border-radius: 50%;
            position: absolute;
            top: -12%;
            left: 0;
            transform: translate(26%, 22%);
            transition: all 0.3s ease-in-out;
        }

        .checkbox-con input[type="checkbox"]::after {
            content: url("data:image/svg+xml,%3Csvg xmlns='://www.w3.org/2000/svg' width='23' height='23' viewBox='0 0 23 23' fill='none'%3E%3Cpath fill-rule='evenodd' clip-rule='evenodd' d='M6.55021 5.84315L17.1568 16.4498L16.4497 17.1569L5.84311 6.55026L6.55021 5.84315Z' fill='%23EA0707' fill-opacity='0.89'/%3E%3Cpath fill-rule='evenodd' clip-rule='evenodd' d='M17.1567 6.55021L6.55012 17.1568L5.84302 16.4497L16.4496 5.84311L17.1567 6.55021Z' fill='%23EA0707' fill-opacity='0.89'/%3E%3C/svg%3E");
            position: absolute;
            top: 0;
            left: 30px;
        }

        .checkbox-con input[type="checkbox"]:checked {
            border: 2px solid #02c202;
            background: #e2f1e1;
        }

        .checkbox-con input[type="checkbox"]:checked::before {
            background: rgba(2, 194, 2, 0.5);
            border: 2px solid #02c202;
            transform: translate(322%, 21%);
            transition: all 0.3s ease-in-out;
        }

        .checkbox-con input[type="checkbox"]:checked::after {
            content: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='15' height='13' viewBox='0 0 15 13' fill='none'%3E%3Cpath fill-rule='evenodd' clip-rule='evenodd' d='M14.8185 0.114533C15.0314 0.290403 15.0614 0.605559 14.8855 0.818454L5.00187 12.5L0.113036 6.81663C-0.0618274 6.60291 -0.0303263 6.2879 0.183396 6.11304C0.397119 5.93817 0.71213 5.96967 0.886994 6.18339L5.00187 11L14.1145 0.181573C14.2904 -0.0313222 14.6056 -0.0613371 14.8185 0.114533Z' fill='%2302C202' fill-opacity='0.9'/%3E%3C/svg%3E");
            position: absolute;
            top: -3px;
            left: 8px;
        }

        .checkbox-con label {
            margin-left: 10px;
            cursor: pointer;
            user-select: none;
        }

        .remove-animation {
            opacity: 1;
            transition: opacity 0.3s ease-in-out;
            /* Define the transition */
        }

        /* Define the final state of the element */
        .remove-animation.removing {
            opacity: 0;
        }


        .hide-comments {
            margin-right: -1000px;
            transition: opacity 0.3s ease-in-out;
        }

        .active-comment {
            margin-right: 1000px;
            transition: opacity 0.3s ease-in-out;
            opacity: 1;
            z-index: 999;
        }

        #commentSection {
            position: fixed;
            top: 0;
            right: -500px;
            /* Start the drawer off-screen to the left */
            display: none;
            height: 100%;
            background-color: #fff;
            transition: left 0.3s ease;
            z-index: 999;
            /* Add a transition for smooth animation */
        }

        #versionSection {
            position: fixed;
            top: 0;
            right: -500px;
            /* Start the drawer off-screen to the left */
            display: none;
            height: 100%;
            background-color: #fff;
            transition: left 0.3s ease;
            z-index: 999;
            /* Add a transition for smooth animation */
        }

        #notificationSection {
            position: fixed;
            top: 5%;
            right: 8%;
            /* Start the drawer off-screen to the left */

            height: 500px;
            display: none;
            background-color: #fff;
            /* transition: top 0.3s ease; */
            z-index: 999;
        }

        #activiteSection {
            position: fixed;
            top: 0;
            right: -500px;
            /* Start the drawer off-screen to the left */

            height: 100%;
            display: none;
            background-color: #fff;
            transition: left 0.3s ease;
            z-index: 999;
        }

        @media screen and (max-width: 1280px) and (min-width: 1025px) {
            #notificationSection {
                position: fixed;
                top: 10%;
                right: 8%;
                /* Start the drawer off-screen to the left */

                height: 500px;
                display: none;
                background-color: #fff;
                /* transition: top 0.3s ease; */
                z-index: 999;
            }
        }

        /* comment section css */
        /* #commentSection{
    margin-right: -1000px;
} */




        /* Modal Styles */
        .modal-boxs {
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 20px;
            border-radius: 10px;
            max-width: 300px;
            /* Adjust the width as needed */
            margin: 0 auto;
            scrollbar-width: thin;

        }

        h5 {
            font-size: 24px;
            font-weight: bold;
            color: #333;
            margin-bottom: 10px;
        }

        #par {
            font-size: 18px;
            color: #666;
            display: flex;
            flex-wrap: nowrap;
            gap: 4px;
            justify-content: center;
            flex-direction: row;
        }

        .progress-bar-container {
            width: 100%;
            border-radius: 5px;
        }

        .progress-bar {
            width: 0%;
            height: 9px;
            background-color: #00aaff;
            border-radius: 5px;
            transition: width 0.3s ease-in-out;
        }
    </style>
    <script>
        var langTranslations = @json(__('messages'));
    </script>
</head>

<body class="flex flex-col justify-between 2xl:container mx-auto content_body bg-[#F2F8FF]">
    <div>
        @include('backend.header.header')

        <div class="w-full h-full lg:flex ">
            <div
                class="absolute lg:relative top-[27%] left-0 z-10  w-[75%] lg:w-[20%] xl:w-[17.7%] min-h-screen  hidden lg:block bg-white shadow-md sidebar">
                @include('backend.sidebar.sidebar')
                <!-- <button id="toggleButton">Toggle Drawer</button> -->

            </div>
            <div class="w-full lg:w-[80%] xl:w-[82.3%] h-full !bg-[#F2F8FF] pb-10">
                @yield('main-content')
            </div>
        </div>
        <div id="bottomDrawer" class="close w-[6em] lg:w-[8em] xl:w-[10.625em]  h-[12em] lg:h-[18em] xl:h-[20em]">
            <div>
                <img id="reminderdrag" class="w-full h-full" src="{{ asset('assets/image/reminderdrag.gif') }}"
                    alt="">
                <img id="deletePopUp" class="w-full h-full" src="{{ asset('assets/image/deletePopUp.gif') }}"
                    alt="">
            </div>
        </div>
        <!-- file info -->
        <div id="files_info_dr" class="shadow-lg rounded-2xl">
            <div class="files_info_header bg-[#007A43] text-white" style="border-radius: 8px 0px 0px 0px;">
                <i class="fa-solid fa-folder"></i><span id="File_title_info"
                    style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;width: 80%;">CV</span>
                <i class="fa-solid fa-xmark" style="right: 15px;position: absolute;cursor: pointer;"
                    id="files_info_dr_close"></i>
            </div>
            <div class="files_info_content">
                <div>
                    <span style="font-weight: bold;font-size: 18px;" class="font-solaimans">
                        {{ __('messages.Folder details') }}</span>
                </div>
                <div style="display: flex;flex-direction: column;gap: 17px;width: 100%;margin-top: 12px;">
                    <div>
                        <span class="tag_name font-solaimans">{{ __('messages.Name') }}</span><br>
                        <span class="tag_d font-solaimans" id="File_name_info">Name</span>
                    </div>
                    <div>
                        <span class="tag_name font-solaimans"> {{ __('messages.Owner') }}</span><br>
                        <span class="tag_d font-solaimans" id="File_Owner_info">Name</span>
                    </div>
                    <div>
                        <span class="tag_name font-solaimans"> {{ __('messages.create at') }}</span><br>
                        <span class="tag_d font-solaimans" id="File_create_at_info">Name</span>
                    </div>
                    <div>
                        <span class="tag_name font-solaimans">{{ __('messages.Last Update date') }}</span><br>
                        <span class="tag_d font-solaimans" id="File_update_at_info">Name</span>
                    </div>
                    <div>
                        <span class="tag_name font-solaimans">{{ __('messages.Download permissions') }}</span><br>
                        <span class="tag_d font-solaimans" id="File_download_info">View and Download</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full hidden">
            <div class="drop-zone">
                <div>
                    <form id="file_upload" enctype="multipart/form-data">
                        @csrf
                        <span class="drop-zone__prompt">Drop your files here or browse for files</span>
                        <input type="file" id="fileInput" name="myFile" class="drop-zone__input" multiple />
                        <input type="hidden" name="category_id" id="category_id_file" value="">
                    </form>
                </div>
            </div>
        </div>
        <!-- Modal toggle -->
        <!-- Open the modal using ID.showModal() method -->
        <dialog id="my_modal_5" class="modal modal-bottom sm:modal-middle">
            <div class="modal-box max-w-xs">
                <h3 class="font-bold text-lg font-solaimans">
                    {{ __('messages.New folder') }}
                </h3>
                <div class="my-2">
                    <form method="POST" id="category-form">
                        @csrf
                        <input type="hidden" name="parent_category_id" id="parent_category_id" value="0">
                        <input type="text" id="category-name"
                            class="border w-full border-gray-400 py-2 px-2 rounded-lg shadow-lg focus:outline-none"
                            placeholder=" {{ __('messages.Folder Name') }}" required>
                        <div class="text-end mt-3 space-x-2">
                            <button id="modal-close"
                                class="text-[#007A43] font-solaimans hover:bg-gray-300 rounded-lg px-1 py-1"
                                type="button">{{ __('messages.cancel') }}</button>
                            <button
                                class="text-[#007A43] font-solaimans hover:bg-gray-300 rounded-lg px-1 py-1 transition-shadow"
                                type="submit">{{ __('messages.create') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </dialog>
        <dialog id="file_locking_modal" class="modal modal-bottom sm:modal-middle">
            <div class="modal-box max-w-xs">
                <h3 class="font-bold text-lg font-solaimans">
                    {{ __('messages.file_lock') }}
                </h3>
                <div class="my-2">
                    <form method="POST" id="file_locking_form">
                        @csrf
                        <input type="hidden" name="lokingfileid" id="lokingfileid">
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input class="sr-only peer" value="1" type="checkbox"  name="lock_file_check_box" id="lock_file_check_box" checked>
                            <div class="group peer ring-0 bg-gray-50 border-2 border-gray-900 rounded-full outline-none duration-700 after:duration-200 w-24 h-12  shadow-md peer-checked:bg-gradient-to-r  peer-focus:outline-none  after:content-[''] after:rounded-full after:absolute after:bg-gray-900 after:outline-none after:h-10 after:w-10 after:top-1 after:left-1  peer-checked:after:translate-x-12 peer-hover:after:scale-95">
                              <svg y="0" xmlns="http://www.w3.org/2000/svg" x="0" width="100" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid meet" height="100" class="absolute  top-1 left-12 fill-green-600 w-10 h-10">
                                    <path d="M50,18A19.9,19.9,0,0,0,30,38v8a8,8,0,0,0-8,8V74a8,8,0,0,0,8,8H70a8,8,0,0,0,8-8V54a8,8,0,0,0-8-8H38V38a12,12,0,0,1,23.6-3,4,4,0,1,0,7.8-2A20.1,20.1,0,0,0,50,18Z" class="svg-fill-primary">
                                    </path>
                                </svg>
                              <svg y="0" xmlns="http://www.w3.org/2000/svg" x="0" width="100" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid meet" height="100" class="absolute top-1 left-1 fill-red-600  w-10 h-10">
                           <path fill-rule="evenodd" d="M30,46V38a20,20,0,0,1,40,0v8a8,8,0,0,1,8,8V74a8,8,0,0,1-8,8H30a8,8,0,0,1-8-8V54A8,8,0,0,1,30,46Zm32-8v8H38V38a12,12,0,0,1,24,0Z">
                           </path>
                          </svg>
                            </div>
                          </label>
                          <br>
                          <span id="lockingerror" style="color:red"></span>
                          
                          <input type="text" id="lock_file_password" name="lock_file_password"
                          class="border w-full border-gray-400 py-2 px-2 rounded-lg shadow-lg focus:outline-none"
                          placeholder=" {{ __('messages.Please enter the password') }}" required>
                          <div class="text-end mt-3 space-x-2">
                            <button onclick="close_modal('file_locking_modal')"
                                class="text-[#007A43] font-solaimans hover:bg-gray-300 rounded-lg px-1 py-1"
                                type="button">{{ __('messages.cancel') }}</button>
                            <button
                                class="text-[#007A43] font-solaimans hover:bg-gray-300 rounded-lg px-1 py-1 transition-shadow"
                                type="submit">{{ __('messages.Submit') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </dialog>


        <dialog id="edit_modal" class="modal modal-bottom sm:modal-middle" data="true">
            <div class="modal-box max-w-xs">
                <h3 class="font-bold font-solaimans text-lg">{{ __('messages.Rename Folder') }}</h3>
                <div class="my-2">
                    <form method="POST" id="category_rename_form">
                        @csrf
                        <input type="hidden" name="cat_id" id="cat_id" value="">
                        <input type="hidden" name="cat_id" id="datatype" value="">
                        <input type="text" id="category_name_rename"
                            class="border w-full border-gray-400 py-2 px-2 rounded-lg shadow-lg focus:outline-none"
                            value="">
                        <div class="text-end mt-3 space-x-2">
                            <button id="modal-close"
                                class="text-[#007721] font-solaimans hover:bg-gray-300 rounded-lg px-1 py-1"
                                type="button" onclick="rename_modal_close()">{{ __('messages.cancel') }}</button>
                            <button
                                class="text-[#007721] font-solaimans hover:bg-gray-300 rounded-lg px-1 py-1 transition-shadow"
                                type="submit">{{ __('messages.save') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </dialog>


        <style>
            /* Modal Styles */
            .modal-boxs {
                background-color: #fff;
                box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                text-align: center;
                padding: 20px;
                border-radius: 10px;
                max-width: 300px;
                /* Adjust the width as needed */
                margin: 0 auto;
                scrollbar-width: thin;

            }

            h5 {
                font-size: 24px;
                font-weight: bold;
                color: #333;
                margin-bottom: 10px;
            }

            #par {
                font-size: 18px;
                color: #666;
                display: flex;
                flex-wrap: nowrap;
                gap: 4px;
                justify-content: center;
                flex-direction: row;
            }

            .progress-bar-container {
                width: 100%;
                /* background-color: #ccc; */
                border-radius: 5px;
                display: flex;
                flex-direction: column;
                gap: 5px;
            }

            .progress-bar {
                width: 0%;
                height: 25px;
                background-color: #00aaff;
                border-radius: 5px;
                color: white;
                border: 1px solid;
                transition: width 0.3s ease-in-out;
            }
        </style>

        <dialog id="my_modaluploade" class="modal modal-bottom sm:modal-middle">
            <div class="modal-boxs">
                <div>
                    <h5>Uploading Please wait...</h5>
                </div>
                <div class="progress-bar-container">
                    <!-- <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0"
                        aria-valuemax="100">
                    </div> -->
                </div>
            </div>
        </dialog>


        <dialog id="preview_modal" class="modal modal-bottom sm:modal-middle">
            <div class="modal-boxs"
                style="height: 100%;max-width: 100%;width: 100%;padding-top: 71px;border-radius: 0;background: transparent black;background: rgb(0 0 0 / 75%);">
                <div
                    style="position: fixed;top: 0;display: flex;width: 100%;background: rgb(26 26 26 / 75%);padding: 20px 18px;flex-direction: row;opacity: 1;">
                    <div>
                        <a class="cursor-pointer" onclick="preview_modal_close()"><i
                                class="fa-sharp fa-solid fa-arrow-left fa-lg" style="color: #ffffff;"></i></a>
                        <span style="color: white;margin-left: 10px;" id="previewfle_name"> </span>
                    </div>
                    <div style="right: 27px;position: absolute;display: flex;flex-direction: row;gap: 26px;">
                        @if (Auth::user()->can('download'))
                            <div id="downloadbtn"></div>
                            <div> <a id="print_preview" terget="_blank" href=""><span><i
                                            class="fa-solid fa-print" style="color: #ffffff;"></i></span></a></div>
                        @endif
                    </div>
                </div>
                <div style="height: 100%;width: 70%;">
                    <div id="fileContents"
                        style="height: 100%;display: flex;justify-content: center;width: 100%;flex-direction: column;align-items: center;">
                    </div>
                </div>
            </div>
        </dialog>
        <dialog id="File_path" class="modal">
            <div class="modal-box w-1/2 h-[60%] max-w-5xl">
                <div style="height: 100%;width: 100%;">
                    <div class="flex justify-between items-center px-4 py-3 shadow-md">
                        <div class="flex items-center gap-4">
                            <a class="cursor-pointer" onclick="file_modal_close()" style="float: right;"><i
                                    class="fa-sharp fa-solid fa-arrow-left fa-lg" style="color: #00000;"></i>
                            </a>
                            <h4 class="text-16 font-solaimans font-medium">{{ __('messages.Move Folder') }}</h4>
                        </div>
                        <a class="cursor-pointer" onclick="file_modal_close()" style="float: right;"><i
                                class="fa fa-light fa-xmark"></i></a>
                    </div>
                    <div class="w-full py-3 flex  bg-[#F2F8FF]">
                        <p class="font-solaimans text-15 ms-4 text-black leading-4" id="bar_camb">
                            <!-- bar_camb -->
                        </p>
                    </div>
                    <div class="w-full h-[60%] overflow-y-scroll">
                        <div id="add_content_directory"
                            class="w-full flex flex-wrap items-center justify-start gap-4 py-3 px-5">
                            <!-- add_content_directory -->
                        </div>
                    </div>
                    <div class="flex items-center justify-end gap-3 me-5 mt-4">
                        <button onclick="file_modal_close()"
                            class="text-[#007721] hover:bg-gray-300 rounded-lg px-1 py-1">{{ __('messages.cancel') }}</button>
                        <button onclick=movecat()
                            class="text-[#007721] hover:bg-gray-300 rounded-lg px-1 py-1 transition-shadow">{{ __('messages.move') }}</button>
                    </div>
                </div>
            </div>
        </dialog>
        {{-- Remainder modal click by btn --}}

        <!-- Open the modal using ID.showModal() method -->

        <dialog id="setRemaider_Modal" class="modal modal-bottom sm:modal-middle">
            <div class="modal-box" style="min-width:50%;">
                <h3 class="text-18 font-solaimans leading-5 text-black font-normal py-2">
                    {{ __('messages.Add New Reminder') }}</h3>
                <div>
                    <form id="setRemaider_form">
                        <input type="hidden" id="cat_id_set_remainder" name="cat_id_set_remainder">
                        <input type="hidden" id="file_type_set_remainder" name="file_type_set_remainder">
                        <select id="setRemaider_user" class="multipleChosen h-8 w-full border border-gray-300"
                            multiple="true" name="users[]">
                            @php
                                $users = DB::table('users')
                                    ->select('*')
                                    ->get();
                            @endphp
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}"
                                    <?= $user->id == Auth::user()->id ? 'selected' : '' ?>>
                                    <?= $user->id == Auth::user()->id ? 'Own' : $user->nameEn ?></option>
                            @endforeach
                        </select>
                        <div class="flex items-center gap-3">
                            <div class="w-[50%]">
                                <label for=""
                                    class="font-solaimans text-15">{{ __('messages.date') }}</label>
                                <input type="date" value="{{ date('Y-m-d') }}" min="{{ date('Y-m-d') }}"
                                    name="reminder_date" id="reminder_date"
                                    class="py-2 rounded px-2 w-full border border-slate-300 focus:outline-offset-0"
                                    required>
                            </div>
                            <div class="w-[50%]">
                                <label for=""
                                    class="font-solaimans text-15">{{ __('messages.time') }}</label>
                                <input type="time"
                                    class="py-2 rounded px-2 w-full border border-slate-300 focus:outline-offset-0"
                                    name="reminder_time" id="reminder_time" required>
                            </div>
                        </div>
                        <div>
                            <label for="" class="font-solaimans text-15"> {{ __('messages.Description') }}
                            </label>
                            <textarea name="reminder_description" id="reminder_description"
                                class="w-full h-20 border border-slate-300 focus:outline-offset-0" required></textarea>
                        </div>
                        <div class="text-right mt-2">
                            <button onclick="setRemaider_modal_close(event,'setRemaider_Modal')"
                                class="py-1 px-3 border border-[#007A43] font-solaimans rounded">{{ __('messages.cancel') }}</button>
                            <button class="py-1 px-3 bg-[#007A43] text-white font-solaimans rounded"
                                type="submit">{{ __('messages.add remainder') }} </button>
                        </div>
                    </form>
                </div>
            </div>
        </dialog>



        {{-- shared modal start --}}
        <dialog id="shareModal" class="modal modal-bottom sm:modal-middle">
            <div class="modal-box" style="min-width:50%;">
                <h3 class="text-18 font-solaimans leading-5 text-black font-normal py-2">{{ __('messages.share') }}
                </h3>
                <div>
                    <form id="setRemaider_form_multi" method="POST" action="{{ url('/share_file') }}">
                        @csrf
                        <input type="hidden" name="document_id_for_share" id="document_id_for_share">
                        <input type="hidden" name="document_type_for_share" id="document_type_for_share">
                        <label for="">{{ __('messages.share with user') }}</label>
                        <select class="multipleChosen h-8 w-full border border-gray-300" multiple="true"
                            name="users[]">
                            @php
                                $users = DB::table('users')
                                    ->select('*')
                                    ->get();
                            @endphp
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}"
                                    <?= $user->id == Auth::user()->id ? 'selected' : '' ?>>
                                    <?= $user->id == Auth::user()->id ? 'Own' : $user->nameEn ?></option>
                            @endforeach
                        </select>
                        <style>
                            .multiple-val-input {
                                height: auto;
                                min-height: 34px;
                                cursor: text;
                            }

                            .multiple-val-input ul {
                                float: left;
                                padding: 0;
                                margin: 0;
                            }

                            .multiple-val-input ul li {
                                list-style: none;
                                float: left;
                                padding: 3px 5px 3px 5px;
                                margin-bottom: 3px;
                                margin-right: 3px;
                                position: relative;
                                line-height: 13px;
                                cursor: default;
                                border: 1px solid #aaaaaa;
                                border-radius: 3px;
                                -webkit-box-shadow: 0 0 2px #fff inset, 0 1px 0 rgba(0, 0, 0, 0.05);
                                box-shadow: 0 0 2px #fff inset, 0 1px 0 rgba(0, 0, 0, 0.05);
                                background-clip: padding-box;
                                -webkit-touch-callout: none;
                                -webkit-user-select: none;
                                -moz-user-select: none;
                                -ms-user-select: none;
                                user-select: none;
                                background-color: #e4e4e4;
                                background-image: -webkit-gradient(linear, 0% 0%, 0% 100%, color-stop(20%, #f4f4f4), color-stop(50%, #f0f0f0), color-stop(52%, #e8e8e8), color-stop(100%, #eee));
                                background-image: -webkit-linear-gradient(top, #f4f4f4 20%, #f0f0f0 50%, #e8e8e8 52%, #eee 100%);
                                background-image: -moz-linear-gradient(top, #f4f4f4 20%, #f0f0f0 50%, #e8e8e8 52%, #eee 100%);
                                background-image: linear-gradient(to top, #f4f4f4 20%, #f0f0f0 50%, #e8e8e8 52%, #eee 100%);
                            }

                            .multiple-val-input ul li a {
                                display: inline;
                                color: #333;
                                text-decoration: none;
                            }

                            .multiple-val-input ul li a,
                            .multiple-val-input ul li div {
                                display: inline;
                                margin-left: 3px;
                            }

                            .multiple-val-input input[type="text"] {
                                float: left;
                                border: none;
                                outline: none;
                                height: 20px;
                                background: rgb(255, 255, 255);
                                min-width: 50px;
                                width: 150px;
                            }

                            .invalid-email {
                                border: 1px solid red !important;
                            }

                            .multiple-val-input span.input_hidden {
                                font-size: 14px;
                                position: absolute;
                                clip: rect(0, 0, 0, 0);
                            }
                        </style>
                        <div class="hidden" style="margin: 6px 3px 1px 1px;">
                            <label for="">{{ __('messages.share with email') }}</label>
                            <div class="multiple-val-input" style="border: 1px solid gray;padding: 6px;">
                                <ul>
                                    <input type="text">
                                    <span class="input_hidden" style="padding-left:20px;padding-right:20px;"></span>
                                </ul>
                            </div>
                        </div>
                        <script>
                            $('.multiple-val-input').on('click', function() {
                                $(this).find('input:text').focus();
                            });

                            $('.multiple-val-input ul input:text').on('input propertychange', function() {
                                const inputField = $(this);
                                const inputValue = inputField.val();
                                const isValidEmail = validateEmail(inputValue);

                                if (isValidEmail) {
                                    inputField.siblings('span.input_hidden').text(inputValue);
                                    inputField.removeClass('invalid-email');
                                    const inputWidth = inputField.siblings('span.input_hidden').width();
                                    inputField.width(inputWidth);
                                } else {
                                    inputField.addClass('invalid-email');
                                }
                            });

                            $('.multiple-val-input ul input:text').on('keypress', function(event) {
                                const inputField = $(this);
                                if (event.which == 13 || event.which == 44) {
                                    const toAppend = inputField.val();
                                    if (validateEmail(toAppend)) {
                                        $('<li><a href="#">×</a><div>' + toAppend +
                                                '</div> <input type="hidden" name="users_email[]" value="' + toAppend + '"></li>')
                                            .insertBefore(inputField);
                                        inputField.val('');
                                    } else {
                                        inputField.addClass('invalid-email');
                                        return false;
                                    }
                                    return false;
                                }
                            });

                            $(document).on('click', '.multiple-val-input ul li a', function(e) {
                                e.preventDefault();
                                $(this).parents('li').remove();
                            });

                            function validateEmail(email) {
                                // Regular expression for email validation
                                const emailRegex = /^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/;
                                return emailRegex.test(email);
                            }
                        </script>

                        <div class="my-3">
                            <label class="text-16 font-solaimans">{{ __('messages.Access Type') }}</label>
                            <div class="flex items-center gap-4">
                                <div>
                                    <input type="radio" name="access_type" value=1 class="" checked />
                                    <label>{{ __('messages.View Only') }}</label>
                                </div>
                                <div>
                                    <input type="radio" name="access_type" value=2 class="" />
                                    <label>{{ __('messages.View & Download') }}</label>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center gap-3 hidden">
                            <div class="w-[50%]">
                                <label for="">{{ __('messages.date') }}</label>
                                <input type="date" name="date" value="{{ date('Y-m-d') }}"
                                    min="{{ date('Y-m-d') }}" name="date" id="reminder_date"
                                    class="py-2 rounded px-2 w-full border border-slate-300 focus:outline-offset-0"
                                    required>
                            </div>
                            <div class="w-[50%]">
                                <label for="">{{ __('messages.time') }}</label>
                                <input name="time" type="time" value="{{ date('H:i') }}"
                                    class="py-2 rounded px-2 w-full border border-slate-300 focus:outline-offset-0"
                                    required>
                            </div>
                        </div>
                        <div>
                            <label for="">{{ __('messages.Description') }}</label>
                            <textarea name="description" id="reminder_description"
                                class="w-full h-20 px-3 py-2 border border-slate-300 focus:outline-offset-0 focus:outline-none" required></textarea>
                        </div>
                        <div class="text-right mt-2">
                            <button onclick="modalClose(event,'shareModal')"
                                class="py-1 px-3 border border-[#007A43] font-solaimans rounded">{{ __('messages.cancel') }}</button>
                            <button class="py-1 px-3 bg-[#007A43] text-white font-solaimans rounded"
                                type="submit">{{ __('messages.share') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </dialog>
        {{-- edit --}}
        <dialog id="shareModaledit" class="modal modal-bottom sm:modal-middle">
            <div class="modal-box" style="min-width:50%;">
                <h3 class="text-18 font-solaimans leading-5 text-black font-normal py-2">{{ __('messages.share') }}
                </h3>
                <div>
                    <form id="setRemaider_form_multi" method="POST" action="{{ url('/share_file') }}">
                        @csrf
                        <input type="hidden" name="document_id_for_share" id="document_id_for_share">
                        <input type="hidden" name="document_type_for_share" id="document_type_for_share">
                        <input type="hidden" name="sheared_id" id="sheared_id">

                        <label for="">{{ __('messages.share with user') }}</label>
                        <select class="multipleChosen h-8 w-full border border-gray-300" multiple="true"
                            name="users[]">
                            @php
                                $users = DB::table('users')
                                    ->select('*')
                                    ->get();
                            @endphp
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}"
                                    <?= $user->id == Auth::user()->id ? 'selected' : '' ?>>
                                    <?= $user->id == Auth::user()->id ? 'Own' : $user->nameEn ?></option>
                            @endforeach
                        </select>
                        <style>
                            .multiple-val-input {
                                height: auto;
                                min-height: 34px;
                                cursor: text;
                            }

                            .multiple-val-input ul {
                                float: left;
                                padding: 0;
                                margin: 0;
                            }

                            .multiple-val-input ul li {
                                list-style: none;
                                float: left;
                                padding: 3px 5px 3px 5px;
                                margin-bottom: 3px;
                                margin-right: 3px;
                                position: relative;
                                line-height: 13px;
                                cursor: default;
                                border: 1px solid #aaaaaa;
                                border-radius: 3px;
                                -webkit-box-shadow: 0 0 2px #fff inset, 0 1px 0 rgba(0, 0, 0, 0.05);
                                box-shadow: 0 0 2px #fff inset, 0 1px 0 rgba(0, 0, 0, 0.05);
                                background-clip: padding-box;
                                -webkit-touch-callout: none;
                                -webkit-user-select: none;
                                -moz-user-select: none;
                                -ms-user-select: none;
                                user-select: none;
                                background-color: #e4e4e4;
                                background-image: -webkit-gradient(linear, 0% 0%, 0% 100%, color-stop(20%, #f4f4f4), color-stop(50%, #f0f0f0), color-stop(52%, #e8e8e8), color-stop(100%, #eee));
                                background-image: -webkit-linear-gradient(top, #f4f4f4 20%, #f0f0f0 50%, #e8e8e8 52%, #eee 100%);
                                background-image: -moz-linear-gradient(top, #f4f4f4 20%, #f0f0f0 50%, #e8e8e8 52%, #eee 100%);
                                background-image: linear-gradient(to top, #f4f4f4 20%, #f0f0f0 50%, #e8e8e8 52%, #eee 100%);
                            }

                            .multiple-val-input ul li a {
                                display: inline;
                                color: #333;
                                text-decoration: none;
                            }

                            .multiple-val-input ul li a,
                            .multiple-val-input ul li div {
                                display: inline;
                                margin-left: 3px;
                            }

                            .multiple-val-input input[type="text"] {
                                float: left;
                                border: none;
                                outline: none;
                                height: 20px;
                                background: rgb(255, 255, 255);
                                min-width: 50px;
                                width: 150px;
                            }

                            .invalid-email {
                                border: 1px solid red !important;
                            }

                            .multiple-val-input span.input_hidden {
                                font-size: 14px;
                                position: absolute;
                                clip: rect(0, 0, 0, 0);
                            }
                        </style>
                        <div class="hidden" style="margin: 6px 3px 1px 1px;">
                            <label for="">{{ __('messages.share with email') }}</label>
                            <div class="multiple-val-input" style="border: 1px solid gray;padding: 6px;">
                                <ul>
                                    <input type="text">
                                    <span class="input_hidden" style="padding-left:20px;padding-right:20px;"></span>
                                </ul>
                            </div>
                        </div>
                        <script>
                            $('.multiple-val-input').on('click', function() {
                                $(this).find('input:text').focus();
                            });

                            $('.multiple-val-input ul input:text').on('input propertychange', function() {
                                const inputField = $(this);
                                const inputValue = inputField.val();
                                const isValidEmail = validateEmail(inputValue);

                                if (isValidEmail) {
                                    inputField.siblings('span.input_hidden').text(inputValue);
                                    inputField.removeClass('invalid-email');
                                    const inputWidth = inputField.siblings('span.input_hidden').width();
                                    inputField.width(inputWidth);
                                } else {
                                    inputField.addClass('invalid-email');
                                }
                            });

                            $('.multiple-val-input ul input:text').on('keypress', function(event) {
                                const inputField = $(this);
                                if (event.which == 13 || event.which == 44) {
                                    const toAppend = inputField.val();
                                    if (validateEmail(toAppend)) {
                                        $('<li><a href="#">×</a><div>' + toAppend +
                                                '</div> <input type="hidden" name="users_email[]" value="' + toAppend + '"></li>')
                                            .insertBefore(inputField);
                                        inputField.val('');
                                    } else {
                                        inputField.addClass('invalid-email');
                                        return false;
                                    }
                                    return false;
                                }
                            });

                            $(document).on('click', '.multiple-val-input ul li a', function(e) {
                                e.preventDefault();
                                $(this).parents('li').remove();
                            });

                            function validateEmail(email) {
                                // Regular expression for email validation
                                const emailRegex = /^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/;
                                return emailRegex.test(email);
                            }
                        </script>

                        <div class="my-3">
                            <label class="text-16 font-solaimans">{{ __('messages.Access Type') }}</label>
                            <div class="flex items-center gap-4">
                                <div>
                                    <input type="radio" name="access_type" value=1 class="" checked />
                                    <label>{{ __('messages.View Only') }}</label>
                                </div>
                                <div>
                                    <input type="radio" name="access_type" value=2 class="" />
                                    <label>{{ __('messages.View & Download') }}</label>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center gap-3 hidden">
                            <div class="w-[50%]">
                                <label for="">{{ __('messages.date') }}</label>
                                <input type="date" name="date" value="{{ date('Y-m-d') }}"
                                    min="{{ date('Y-m-d') }}" name="date" id="reminder_date"
                                    class="py-2 rounded px-2 w-full border border-slate-300 focus:outline-offset-0"
                                    required>
                            </div>
                            <div class="w-[50%]">
                                <label for="">{{ __('messages.time') }}</label>
                                <input name="time" type="time" value="{{ date('H:i') }}"
                                    class="py-2 rounded px-2 w-full border border-slate-300 focus:outline-offset-0"
                                    required>
                            </div>
                        </div>
                        <div>
                            <label for="">{{ __('messages.Description') }}</label>
                            <textarea name="description" id="reminder_description"
                                class="w-full h-20 px-3 py-2 border border-slate-300 focus:outline-offset-0 focus:outline-none" required></textarea>
                        </div>
                        <div class="text-right mt-2">
                            <button onclick="modalClose(event,'shareModal')"
                                class="py-1 px-3 border border-[#007A43] font-solaimans rounded">{{ __('messages.cancel') }}</button>
                            <button class="py-1 px-3 bg-[#007A43] text-white font-solaimans rounded"
                                type="submit">{{ __('messages.share') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </dialog>
        <!-- create user open Modal Role and permission-->


        <dialog id="reminder_show_modal" class="modal modal-bottom sm:modal-middle">
        </dialog>



        <dialog id="creareUserModal" class="modal modal-bottom sm:modal-middle">
            <div class="modal-box" style="min-width: 60%;">
                <div class="flex items-center justify-between">
                    <h3 class="text-16 font-solaimans leading-4">Add User Role Name & Permission</h3>
                    <span onclick="modalClose(event,'creareUserModal')" class="cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <path
                                d="M15.1275 12L19.8183 7.30922C20.3939 6.73359 20.3939 5.80031 19.8183 5.22422L18.7758 4.18172C18.2002 3.60609 17.2669 3.60609 16.6908 4.18172L12 8.8725L7.30922 4.18172C6.73359 3.60609 5.80031 3.60609 5.22422 4.18172L4.18172 5.22422C3.60609 5.79984 3.60609 6.73312 4.18172 7.30922L8.8725 12L4.18172 16.6908C3.60609 17.2664 3.60609 18.1997 4.18172 18.7758L5.22422 19.8183C5.79984 20.3939 6.73359 20.3939 7.30922 19.8183L12 15.1275L16.6908 19.8183C17.2664 20.3939 18.2002 20.3939 18.7758 19.8183L19.8183 18.7758C20.3939 18.2002 20.3939 17.2669 19.8183 16.6908L15.1275 12Z"
                                fill="#007A43" />
                        </svg>
                    </span>
                </div>
                <div class="py-3">
                    <form action="{{ url('/add_user_role_permission') }}" method="POST">
                        @csrf
                        <div>
                            <input name="role_name" type="text"
                                class="w-full px-2 py-2 border border-[#DFDFDF] focus:outline-none rounded"
                                placeholder="Write a new role name" required>
                        </div>
                        <div class="w-full shadow-md py-3 ">
                            <div class="">
                                <table class="min-w-full">
                                    <thead class="bg-[#E9FFE4] ">
                                        <tr class="w-full">
                                            <th class="text-left ps-2  py-2 text-[#007A43] font-semibold text-15 ">
                                                <span>User Permission</span>
                                            </th>
                                            <th class="text-left ps-2  py-2 text-[#007A43] font-semibold text-15 ">
                                                <div class="flex items-center gap-3">
                                                    <span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="15"
                                                            height="15" viewBox="0 0 15 15" fill="none">
                                                            <path
                                                                d="M14.6809 11.5928L11.2502 8.16211C10.5735 7.48535 9.56274 7.35352 8.74829 7.75488L5.62524 4.63184V2.8125L1.87524 0L0.000244118 1.875L2.81274 5.625H4.63208L7.75513 8.74805C7.35669 9.5625 7.4856 10.5732 8.16235 11.25L11.593 14.6807C12.0208 15.1084 12.7122 15.1084 13.137 14.6807L14.6809 13.1367C15.1057 12.709 15.1057 12.0176 14.6809 11.5928ZM9.71802 6.5918C10.5471 6.5918 11.3264 6.91406 11.9124 7.5L12.4807 8.06836C12.9436 7.86621 13.3831 7.58496 13.7639 7.2041C14.8508 6.11719 15.22 4.58789 14.8743 3.19922C14.8098 2.93555 14.4788 2.84473 14.2854 3.03809L12.1057 5.21777L10.1165 4.88672L9.7854 2.89746L11.9651 0.717773C12.1584 0.524414 12.0647 0.193359 11.7981 0.125977C10.4094 -0.216797 8.88013 0.152344 7.79614 1.23633C6.96118 2.07129 6.5686 3.17285 6.58911 4.27148L8.99438 6.67676C9.23169 6.62109 9.47778 6.5918 9.71802 6.5918ZM6.67407 8.99414L5.01294 7.33301L0.548096 11.8008C-0.184326 12.5332 -0.184326 13.7197 0.548096 14.4521C1.28052 15.1846 2.46704 15.1846 3.19946 14.4521L6.82056 10.8311C6.5979 10.248 6.53052 9.6123 6.67407 8.99414ZM1.87524 13.8281C1.48853 13.8281 1.17212 13.5117 1.17212 13.125C1.17212 12.7354 1.4856 12.4219 1.87524 12.4219C2.26489 12.4219 2.57837 12.7354 2.57837 13.125C2.57837 13.5117 2.26489 13.8281 1.87524 13.8281Z"
                                                                fill="#007A43" />
                                                        </svg>
                                                    </span>
                                                    <h2 class="text-[#007A43] text-16 font-solaimans font-semibold">
                                                        Action
                                                    </h2>
                                                </div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        <tr>
                                            <td class="px-4 py-3 font-solaimans text-[#082303] leading-4 text-15">
                                                File/Folder</td>
                                            <td>
                                                <div>
                                                    <input name='permission[]' value="file_upload" type="checkbox">
                                                    <label for=""
                                                        class="text-15 font-solaimans">Upload</label>

                                                    <input name='permission[]' value="file_sharing" type="checkbox">
                                                    <label for=""
                                                        class="text-15 font-solaimans">Sharing</label>

                                                    <input name='permission[]' value="rename" type="checkbox">
                                                    <label for=""
                                                        class="text-15 font-solaimans">Rename</label>

                                                    <input name='permission[]' value="comment" type="checkbox">
                                                    <label for=""
                                                        class="text-15 font-solaimans">Comment</label>

                                                    <input name='permission[]' value="download" type="checkbox">
                                                    <label for=""
                                                        class="text-15 font-solaimans">Download</label>
                                                    <input name='permission[]' value="reminder_with_user"
                                                        type="checkbox">
                                                    <label class="text-15 font-solaimans">Set Reminder</label>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class="hidden">
                                            <td class="px-4 py-3 font-solaimans text-[#082303] leading-4 text-15">
                                                Reminder
                                            </td>
                                            <td>
                                                <div>

                                                    <input name='permission[]' value="reminder_own" type="checkbox">
                                                    <label class="text-15 font-solaimans">(Own)</label>


                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="hidden">
                                            <td class="px-4 py-3 font-solaimans text-[#082303] leading-4 text-15">
                                                Reminder
                                                With User</td>
                                            <td>
                                                <div>
                                                    <input name='permission[]' value="reminder_with_user"
                                                        type="checkbox">
                                                </div>
                                            </td>
                                        </tr>



                                        <tr>
                                            <td class="px-4 py-3 font-solaimans text-[#082303] leading-4 text-15">Add
                                                User
                                                Role</td>
                                            <td>
                                                <div>
                                                    <input name='permission[]' value="add_role" type="checkbox">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="px-4 py-3 font-solaimans text-[#082303] leading-4 text-15">View
                                                User List</td>
                                            <td>
                                                <div>
                                                    <input name='permission[]' value="view_user_list"
                                                        type="checkbox">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="hidden">
                                            <td class="px-4 py-3 font-solaimans text-[#082303] leading-4 text-15">
                                                Manage
                                                Pending List</td>
                                            <td>
                                                <div>
                                                    <input name='permission[]' value="manage_pending_list"
                                                        type="checkbox">
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="flex justify-center gap-2 !border-none mt-3">
                            <button type="submit"
                                class="bg-[#007A43] py-2 px-4  rounded !border-none text-white font-solaimans">
                                {{ __('messages.Create New Role') }}
                            </button>
                            <button onclick="modalClose(event,'creareUserModal')"
                                class="py-2 px-4  rounded border border-[#007A43] text-[#007A43] text-15 font-solaimans">
                                {{ __('messages.cancel') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </dialog>

        <dialog id="updateUserModal" class="modal modal-bottom sm:modal-middle">
            <div class="modal-box" style="min-width: 60%;">
                <div class="flex items-center justify-between">
                    <h3 class="text-16 font-solaimans leading-4">Update User Role Name & Permission</h3>
                    <span onclick="modalClose(event,'updateUserModal')" class="cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <path
                                d="M15.1275 12L19.8183 7.30922C20.3939 6.73359 20.3939 5.80031 19.8183 5.22422L18.7758 4.18172C18.2002 3.60609 17.2669 3.60609 16.6908 4.18172L12 8.8725L7.30922 4.18172C6.73359 3.60609 5.80031 3.60609 5.22422 4.18172L4.18172 5.22422C3.60609 5.79984 3.60609 6.73312 4.18172 7.30922L8.8725 12L4.18172 16.6908C3.60609 17.2664 3.60609 18.1997 4.18172 18.7758L5.22422 19.8183C5.79984 20.3939 6.73359 20.3939 7.30922 19.8183L12 15.1275L16.6908 19.8183C17.2664 20.3939 18.2002 20.3939 18.7758 19.8183L19.8183 18.7758C20.3939 18.2002 20.3939 17.2669 19.8183 16.6908L15.1275 12Z"
                                fill="#007A43" />
                        </svg>
                    </span>
                </div>
                <div class="py-3">
                    <form action="{{ url('/update_user_role_permission') }}" method="POST">
                        @csrf
                        <input type="hidden" name="role_id" id="role_id">
                        <div>
                            <input name="role_name" id="role_name_update" type="text"
                                class="w-full px-2 py-2 border border-[#DFDFDF] focus:outline-none rounded"
                                placeholder="Write a new role name" required>
                        </div>
                        <div class="w-full shadow-md py-3 ">
                            <div class="">
                                <table class="min-w-full">
                                    <thead class="bg-[#E9FFE4] ">
                                        <tr class="w-full">
                                            <th class="text-left ps-2  py-2 text-[#007A43] font-semibold text-15 ">
                                                <span>User Permission</span>
                                            </th>
                                            <th class="text-left ps-2  py-2 text-[#007A43] font-semibold text-15 ">
                                                <div class="flex items-center gap-3">
                                                    <span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="15"
                                                            height="15" viewBox="0 0 15 15" fill="none">
                                                            <path
                                                                d="M14.6809 11.5928L11.2502 8.16211C10.5735 7.48535 9.56274 7.35352 8.74829 7.75488L5.62524 4.63184V2.8125L1.87524 0L0.000244118 1.875L2.81274 5.625H4.63208L7.75513 8.74805C7.35669 9.5625 7.4856 10.5732 8.16235 11.25L11.593 14.6807C12.0208 15.1084 12.7122 15.1084 13.137 14.6807L14.6809 13.1367C15.1057 12.709 15.1057 12.0176 14.6809 11.5928ZM9.71802 6.5918C10.5471 6.5918 11.3264 6.91406 11.9124 7.5L12.4807 8.06836C12.9436 7.86621 13.3831 7.58496 13.7639 7.2041C14.8508 6.11719 15.22 4.58789 14.8743 3.19922C14.8098 2.93555 14.4788 2.84473 14.2854 3.03809L12.1057 5.21777L10.1165 4.88672L9.7854 2.89746L11.9651 0.717773C12.1584 0.524414 12.0647 0.193359 11.7981 0.125977C10.4094 -0.216797 8.88013 0.152344 7.79614 1.23633C6.96118 2.07129 6.5686 3.17285 6.58911 4.27148L8.99438 6.67676C9.23169 6.62109 9.47778 6.5918 9.71802 6.5918ZM6.67407 8.99414L5.01294 7.33301L0.548096 11.8008C-0.184326 12.5332 -0.184326 13.7197 0.548096 14.4521C1.28052 15.1846 2.46704 15.1846 3.19946 14.4521L6.82056 10.8311C6.5979 10.248 6.53052 9.6123 6.67407 8.99414ZM1.87524 13.8281C1.48853 13.8281 1.17212 13.5117 1.17212 13.125C1.17212 12.7354 1.4856 12.4219 1.87524 12.4219C2.26489 12.4219 2.57837 12.7354 2.57837 13.125C2.57837 13.5117 2.26489 13.8281 1.87524 13.8281Z"
                                                                fill="#007A43" />
                                                        </svg>
                                                    </span>
                                                    <h2 class="text-[#007A43] text-16 font-solaimans font-semibold">
                                                        Action
                                                    </h2>
                                                </div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        <tr>
                                            <td class="px-4 py-3 font-solaimans text-[#082303] leading-4 text-15">
                                                File/Folder
                                            </td>
                                            <td>
                                                <div>
                                                    <input name='permission[]' value="file_upload"
                                                        id="file_upload_update" type="checkbox">
                                                    <label for="">Upload</label>

                                                    <input name='permission[]' value="file_sharing"
                                                        id="file_sharing_update" type="checkbox">
                                                    <label for="">Sharing</label>

                                                    <input name='permission[]' value="rename" id="rename_update"
                                                        type="checkbox">
                                                    <label for="">Rename</label>

                                                    <input name='permission[]' value="comment" id="comment_update"
                                                        type="checkbox">
                                                    <label for="">Comment</label>

                                                    <input name='permission[]' value="download" id="download_update"
                                                        type="checkbox">
                                                    <label for="">Download</label>

                                                    <input name='permission[]' value="reminder_with_user"
                                                        id="reminder_with_user_update" type="checkbox">
                                                    <label class="text-15 font-solaimans">Set Reminder</label>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class="hidden">

                                            <td>
                                                <div>
                                                    <input name='permission[]' value="reminder_own"
                                                        id="reminder_own_update" type="checkbox">
                                                    <label class="text-15 font-solaimans">(Own)</label>
                                                </div>
                                            </td>
                                        </tr>




                                        <tr>
                                            <td class="px-4 py-3 font-solaimans text-[#082303] leading-4 text-15">Add
                                                User
                                                Role</td>
                                            <td>
                                                <div>
                                                    <input name='permission[]' value="add_role" id="add_role_update"
                                                        type="checkbox">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="px-4 py-3 font-solaimans text-[#082303] leading-4 text-15">View
                                                User List</td>
                                            <td>
                                                <div>
                                                    <input name='permission[]' value="view_user_list"
                                                        id="view_user_list_update" type="checkbox">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="hidden">
                                            <td class="px-4 py-3 font-solaimans text-[#082303] leading-4 text-15">
                                                Manage
                                                Pending List</td>
                                            <td>
                                                <div>
                                                    <input name='permission[]' value="manage_pending_list"
                                                        id="manage_pending_list_update" type="checkbox">
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="flex justify-center gap-2 !border-none mt-3">
                            <button type="submit"
                                class="bg-[#007A43] py-2 px-4  rounded !border-none text-white font-solaimans">
                                {{ __('messages.Update Role') }}
                            </button>
                            <button onclick="modalClose(event,'updateUserModal')"
                                class="py-2 px-4  rounded border border-[#007A43] text-[#007A43] text-15 font-solaimans">
                                {{ __('messages.cancel') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </dialog>



        {{-- comment section design  --}}

        <section id="commentSection" class="hidden h-screen bg-white lg:w-[40%] xl:w-[35%] shadow-xl">
            <div>
                <div class="flex items-center justify-between bg-[#E1B000] py-3 px-2">
                    <div class="  flex items-center gap-4">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none">
                                <path
                                    d="M2.25 21H18.75L19.47 20.445L23.415 9.945L22.695 9H21V5.25L20.25 4.5H11.565L10.275 3.225L9.75 3H2.25L1.5 3.75V20.25L2.25 21ZM3 4.5H9.435L10.725 5.775L11.25 6H19.5V9H12.75L12.225 9.225L10.935 10.5H5.25L4.545 11.01L3.045 15.63L3 4.5ZM18.195 19.5H3.285L5.79 12H11.25L11.775 11.775L13.065 10.5H21.75L18.195 19.5Z"
                                    fill="white" />
                            </svg>
                        </span>
                        <h1 class="text-16 font-solaimans text-white font-semibold" id="comment_file_name">Folder name
                        </h1>
                    </div>
                    <span class="cursor-pointer" onclick="closeComment()"><i class="fa fa-solid fa-xmark"
                            style="color: #ffffff;"></i></span>
                </div>
                <div class="w-full lg:h-[15em] xl:h-[26em] overflow-y-scroll px-5 py-3" id="comment_render_section">

                </div>
                <div class="px-5 py-3">
                    <form id="add_comment">
                        <input type="hidden" name="comment_document_id" id="comment_document_id">
                        <input type="hidden" name="comment_file_type" id="comment_file_type">
                        <textarea name="comment" id="comment_input" class="w-full p-2 border border-[#DFDFDF] h-24 focus:outline-none"></textarea>
                        <div class="mt-3 flex justify-end">

                            <button type="submit"
                                class="px-2 py-1 bg-[#007A43] text-white rounded">{{ __('messages.comments') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>


        <div id="bottomDrawer" class="closed w-[6em] lg:w-[8em] xl:w-[10.625em]  h-[12em] lg:h-[18em] xl:h-[20em]">
            <div>
                <img id="reminderdrag" class="w-full h-full" src="{{ asset('assets/image/reminderdrag.gif') }}"
                    alt="">
                <img id="deletePopUp" class="w-full h-full" src="{{ asset('assets/image/deletePopUp.gif') }}"
                    alt="">
            </div>
        </div>

    </div>
    </section>



    {{-- version details show design --}}
    <section id="versionSection" class="h-screen bg-white lg:w-[40%] xl:w-[35%] shadow-xl">
        <div>
            <div class="flex items-center justify-between bg-[#00A6B0] py-3 px-2">
                <div class="flex items-center gap-4">
                    <h1 class="text-14 font-solaimans font-medium text-white">{{ __('messages.Version details') }}
                    </h1>
                </div>
                <span class="cursor-pointer" onclick="closeFileVersion()"><i class="fa fa-solid fa-xmark"
                        style="color: #ffffff;"></i></span>
            </div>
            <div class="flex items-center gap-3 py-3 px-2">
                <span><i class="fa-solid fa-file" style="color: #00a5af;"></i></span>
                <h3 class="font-solaimans text-[#082303] text-14" id="version_file_name"></h3>
            </div>
            <div class="w-full h-[26em] overflow-y-scroll px-5 py-3" id="version_file_section">
                <div class="px-3">
                    <ul class="list-disc" id="version_file_render">

                    </ul>
                </div>
            </div>
            <div class="px-10">
                <div class="px-5 border border-[#DFDFDF] py-8">
                    <form id="add_versionFile" enctype="multipart/form-data">
                        <div class="flex justify-center" style="flex-direction: column;gap: 9px;">
                            <input type="file" id="version_file" name="version_file">
                            <input type="hidden" name="document_id" id="document_idvertion" value="1">
                            <div class="progress" id="progressvertioncon" style="display: none; height: fit-content">
                                <div id="vertion_proggress"
                                    class="progress-bar progress-bar-success progress-bar-striped active"
                                    role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"
                                    style="width: 0%;text-align: center;">
                                    0%
                                </div>
                            </div>
                            <input type="submit"
                                class="flex items-center gap-3 bg-[#F8B200] shadow-sm px-4 py-1 rounded"
                                style="width: fit-content" value="{{ __('messages.Upload New Version') }}">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    {{-- activites file show design --}}
    <section id="activiteSection" class="h-screen bg-white lg:w-[40%] xl:w-[35%] shadow-xl">
        <div>
            <div class="flex items-center justify-between bg-[#F6C515] py-3 px-2">
                <div class="flex items-center gap-4">
                    <h1 class="text-14 font-solaimans font-medium text-white">Activities details</h1>
                </div>
                <span class="cursor-pointer" onclick="closeActiviteFile()"><i class="fa fa-solid fa-xmark"
                        style="color: #ffffff;"></i></span>
            </div>
            <div class="flex items-center gap-3 py-3 px-2">
                <span><i class="fa-solid fa-file" style="color: #00a5af;"></i></span>
                <h3 class="font-solaimans text-[#082303] text-14">FXYZile name</h3>
            </div>
            <div class="w-full h-[27em] overflow-y-scroll px-5 py-3" id="version_file_section">
                <div class="px-3">
                    <ul class="list-disc">
                        <li>
                            <div>
                                <div class="flex items-center justify-between">

                                    <h1 class="text-[#5C5F62]">Version 1</h1>

                                    <div class="flex items-center gap-4">
                                        <div class="flex items-center gap-2">
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                    viewBox="0 0 14 14" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M12.6875 1.75H11.375V0.875H10.5V1.75H3.5V0.875H2.625V1.75H1.3125L0.875 2.1875V12.6875L1.3125 13.125H12.6875L13.125 12.6875V2.1875L12.6875 1.75ZM12.25 12.25H1.75V4.375H12.25V12.25ZM12.25 3.5H1.75V2.625H12.25V3.5ZM3.5 7H2.625V7.875H3.5V7ZM2.625 8.75H3.5V9.625H2.625V8.75ZM3.5 10.5H2.625V11.375H3.5V10.5ZM5.25 7H6.125V7.875H5.25V7ZM6.125 8.75H5.25V9.625H6.125V8.75ZM5.25 10.5H6.125V11.375H5.25V10.5ZM6.125 5.25H5.25V6.125H6.125V5.25ZM7.875 7H8.75V7.875H7.875V7ZM8.75 8.75H7.875V9.625H8.75V8.75ZM7.875 10.5H8.75V11.375H7.875V10.5ZM8.75 5.25H7.875V6.125H8.75V5.25ZM10.5 7H11.375V7.875H10.5V7ZM11.375 8.75H10.5V9.625H11.375V8.75ZM10.5 5.25H11.375V6.125H10.5V5.25Z"
                                                        fill="#5C5F62" />
                                                </svg>
                                            </span>
                                            <p class="text-12 text-[#5C5F62] font-solaimans">12/06/23</p>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                    viewBox="0 0 14 14" fill="none">
                                                    <path
                                                        d="M7 0.21875C3.25391 0.21875 0.21875 3.25391 0.21875 7C0.21875 10.7461 3.25391 13.7812 7 13.7812C10.7461 13.7812 13.7812 10.7461 13.7812 7C13.7812 3.25391 10.7461 0.21875 7 0.21875ZM7 12.4688C3.97852 12.4688 1.53125 10.0215 1.53125 7C1.53125 3.97852 3.97852 1.53125 7 1.53125C10.0215 1.53125 12.4688 3.97852 12.4688 7C12.4688 10.0215 10.0215 12.4688 7 12.4688ZM8.68984 9.61406L6.36836 7.92695C6.28359 7.86406 6.23438 7.76563 6.23438 7.66172V3.17188C6.23438 2.99141 6.38203 2.84375 6.5625 2.84375H7.4375C7.61797 2.84375 7.76562 2.99141 7.76562 3.17188V7.04648L9.59219 8.37539C9.73984 8.48203 9.76992 8.68711 9.66328 8.83477L9.14922 9.54297C9.04258 9.68789 8.8375 9.7207 8.68984 9.61406Z"
                                                        fill="#5C5F62" />
                                                </svg>
                                            </span>
                                            <p class="text-12 text-[#5C5F62] font-solaimans">12:06 PM</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-[50%] px-3 pt-3 bg-[#F4F4F4] rounded-md mt-3">
                                    <div class="w-full bg-white rounded-md flex items-center justify-center">
                                        <div class="px-11 py-8">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="38" height="39"
                                                viewBox="0 0 38 39" fill="none">
                                                <path
                                                    d="M21.375 10.3594V0H6.53125C5.54414 0 4.75 0.815039 4.75 1.82812V37.1719C4.75 38.185 5.54414 39 6.53125 39H31.4688C32.4559 39 33.25 38.185 33.25 37.1719V12.1875H23.1562C22.1766 12.1875 21.375 11.3648 21.375 10.3594ZM25.6129 19.5H27.3867C27.9582 19.5 28.3813 20.0408 28.2551 20.6197L25.4348 33.4166C25.3457 33.8355 24.982 34.125 24.5664 34.125H21.7461C21.3379 34.125 20.9816 33.8355 20.8852 33.4318C18.9703 25.548 19.3414 27.2467 18.9852 25.0148H18.948C18.8664 26.1041 18.7699 26.3402 17.048 33.4318C16.9516 33.8355 16.5953 34.125 16.1871 34.125H13.4336C13.018 34.125 12.6543 33.8279 12.5652 33.409L9.75977 20.6121C9.63359 20.0408 10.0566 19.5 10.6281 19.5H12.4465C12.8695 19.5 13.2406 19.8047 13.3223 20.2389C14.4801 26.1803 14.8141 28.5797 14.8809 29.5471C14.9996 28.7701 15.4227 27.0563 17.0629 20.2008C17.1594 19.7895 17.5156 19.5076 17.9313 19.5076H20.091C20.5066 19.5076 20.8629 19.7971 20.9594 20.2084C22.7406 27.8561 23.0969 29.6537 23.1562 30.065C23.1414 29.2119 22.9633 28.7092 24.7594 20.2236C24.8336 19.7971 25.1973 19.5 25.6129 19.5ZM33.25 9.28535V9.75H23.75V0H24.2027C24.6777 0 25.1305 0.19043 25.4645 0.533203L32.7305 7.99805C33.0645 8.34082 33.25 8.80547 33.25 9.28535Z"
                                                    fill="#0030DA" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="flex justify-between items-center pt-3 pb-4">
                                        <h1 class="text-12 lg:text-14 font-solaimans leading-3">Ducking-designers..
                                        </h1>
                                        <svg class="file-delete w-[1.125em] h-[1.125] cursor-pointer"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18" fill="none">
                                            <path
                                                d="M9 13.5C9.29837 13.5 9.58452 13.6185 9.79549 13.8295C10.0065 14.0405 10.125 14.3266 10.125 14.625C10.125 14.9234 10.0065 15.2095 9.79549 15.4205C9.58452 15.6315 9.29837 15.75 9 15.75C8.70163 15.75 8.41548 15.6315 8.20451 15.4205C7.99353 15.2095 7.875 14.9234 7.875 14.625C7.875 14.3266 7.99353 14.0405 8.20451 13.8295C8.41548 13.6185 8.70163 13.5 9 13.5ZM9 7.875C9.29837 7.875 9.58452 7.99353 9.79549 8.2045C10.0065 8.41548 10.125 8.70163 10.125 9C10.125 9.29837 10.0065 9.58452 9.79549 9.7955C9.58452 10.0065 9.29837 10.125 9 10.125C8.70163 10.125 8.41548 10.0065 8.20451 9.7955C7.99353 9.58452 7.875 9.29837 7.875 9C7.875 8.70163 7.99353 8.41548 8.20451 8.2045C8.41548 7.99353 8.70163 7.875 9 7.875ZM9 2.25C9.29837 2.25 9.58452 2.36853 9.79549 2.5795C10.0065 2.79048 10.125 3.07663 10.125 3.375C10.125 3.67337 10.0065 3.95952 9.79549 4.1705C9.58452 4.38147 9.29837 4.5 9 4.5C8.70163 4.5 8.41548 4.38147 8.20451 4.1705C7.99353 3.95952 7.875 3.67337 7.875 3.375C7.875 3.07663 7.99353 2.79048 8.20451 2.5795C8.41548 2.36853 8.70163 2.25 9 2.25Z"
                                                fill="black" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="flex items-center gap-2 mt-5">

                                    <h2 class="text-12 font-solaimans text-[#5C5F62]">Uploaded By</h2>
                                    <div class="flex items-center gap-3">
                                        <img src="{{ asset('assets/image/user1.png') }}" alt="">
                                        <h2 class="text-16 font-solaimans font-semibold">Wade Warren</h2>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li>
                            <div class="py-4">
                                <h2 class="text-12 font-solaimans text-[#5C5F62]">Comment By</h2>
                                <div class="flex items-center justify-between mt-3">

                                    <div class="flex items-center gap-3">
                                        <img src="{{ asset('assets/image/user1.png') }}" alt="">
                                        <h2 class="text-16 font-solaimans font-semibold">Wade Warren</h2>
                                    </div>

                                    <div class="flex items-center gap-4">
                                        <div class="flex items-center gap-2">
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                    viewBox="0 0 14 14" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M12.6875 1.75H11.375V0.875H10.5V1.75H3.5V0.875H2.625V1.75H1.3125L0.875 2.1875V12.6875L1.3125 13.125H12.6875L13.125 12.6875V2.1875L12.6875 1.75ZM12.25 12.25H1.75V4.375H12.25V12.25ZM12.25 3.5H1.75V2.625H12.25V3.5ZM3.5 7H2.625V7.875H3.5V7ZM2.625 8.75H3.5V9.625H2.625V8.75ZM3.5 10.5H2.625V11.375H3.5V10.5ZM5.25 7H6.125V7.875H5.25V7ZM6.125 8.75H5.25V9.625H6.125V8.75ZM5.25 10.5H6.125V11.375H5.25V10.5ZM6.125 5.25H5.25V6.125H6.125V5.25ZM7.875 7H8.75V7.875H7.875V7ZM8.75 8.75H7.875V9.625H8.75V8.75ZM7.875 10.5H8.75V11.375H7.875V10.5ZM8.75 5.25H7.875V6.125H8.75V5.25ZM10.5 7H11.375V7.875H10.5V7ZM11.375 8.75H10.5V9.625H11.375V8.75ZM10.5 5.25H11.375V6.125H10.5V5.25Z"
                                                        fill="#5C5F62" />
                                                </svg>
                                            </span>
                                            <p class="text-12 text-[#5C5F62] font-solaimans">12/06/23</p>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                    viewBox="0 0 14 14" fill="none">
                                                    <path
                                                        d="M7 0.21875C3.25391 0.21875 0.21875 3.25391 0.21875 7C0.21875 10.7461 3.25391 13.7812 7 13.7812C10.7461 13.7812 13.7812 10.7461 13.7812 7C13.7812 3.25391 10.7461 0.21875 7 0.21875ZM7 12.4688C3.97852 12.4688 1.53125 10.0215 1.53125 7C1.53125 3.97852 3.97852 1.53125 7 1.53125C10.0215 1.53125 12.4688 3.97852 12.4688 7C12.4688 10.0215 10.0215 12.4688 7 12.4688ZM8.68984 9.61406L6.36836 7.92695C6.28359 7.86406 6.23438 7.76563 6.23438 7.66172V3.17188C6.23438 2.99141 6.38203 2.84375 6.5625 2.84375H7.4375C7.61797 2.84375 7.76562 2.99141 7.76562 3.17188V7.04648L9.59219 8.37539C9.73984 8.48203 9.76992 8.68711 9.66328 8.83477L9.14922 9.54297C9.04258 9.68789 8.8375 9.7207 8.68984 9.61406Z"
                                                        fill="#5C5F62" />
                                                </svg>
                                            </span>
                                            <p class="text-12 text-[#5C5F62] font-solaimans">12:06 PM</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="py-4">
                                    <p class="text-14 text-[#082303] font-solaimans">Nemo enim ipsam voluptatem quia
                                        voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur ma</p>
                                </div>
                            </div>
                        </li>

                        <li>
                            <div>
                                <div class="flex items-center justify-between">

                                    <h1 class="text-[#5C5F62]">Version 2</h1>

                                    <div class="flex items-center gap-4">
                                        <div class="flex items-center gap-2">
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                    viewBox="0 0 14 14" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M12.6875 1.75H11.375V0.875H10.5V1.75H3.5V0.875H2.625V1.75H1.3125L0.875 2.1875V12.6875L1.3125 13.125H12.6875L13.125 12.6875V2.1875L12.6875 1.75ZM12.25 12.25H1.75V4.375H12.25V12.25ZM12.25 3.5H1.75V2.625H12.25V3.5ZM3.5 7H2.625V7.875H3.5V7ZM2.625 8.75H3.5V9.625H2.625V8.75ZM3.5 10.5H2.625V11.375H3.5V10.5ZM5.25 7H6.125V7.875H5.25V7ZM6.125 8.75H5.25V9.625H6.125V8.75ZM5.25 10.5H6.125V11.375H5.25V10.5ZM6.125 5.25H5.25V6.125H6.125V5.25ZM7.875 7H8.75V7.875H7.875V7ZM8.75 8.75H7.875V9.625H8.75V8.75ZM7.875 10.5H8.75V11.375H7.875V10.5ZM8.75 5.25H7.875V6.125H8.75V5.25ZM10.5 7H11.375V7.875H10.5V7ZM11.375 8.75H10.5V9.625H11.375V8.75ZM10.5 5.25H11.375V6.125H10.5V5.25Z"
                                                        fill="#5C5F62" />
                                                </svg>
                                            </span>
                                            <p class="text-12 text-[#5C5F62] font-solaimans">12/06/23</p>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                    viewBox="0 0 14 14" fill="none">
                                                    <path
                                                        d="M7 0.21875C3.25391 0.21875 0.21875 3.25391 0.21875 7C0.21875 10.7461 3.25391 13.7812 7 13.7812C10.7461 13.7812 13.7812 10.7461 13.7812 7C13.7812 3.25391 10.7461 0.21875 7 0.21875ZM7 12.4688C3.97852 12.4688 1.53125 10.0215 1.53125 7C1.53125 3.97852 3.97852 1.53125 7 1.53125C10.0215 1.53125 12.4688 3.97852 12.4688 7C12.4688 10.0215 10.0215 12.4688 7 12.4688ZM8.68984 9.61406L6.36836 7.92695C6.28359 7.86406 6.23438 7.76563 6.23438 7.66172V3.17188C6.23438 2.99141 6.38203 2.84375 6.5625 2.84375H7.4375C7.61797 2.84375 7.76562 2.99141 7.76562 3.17188V7.04648L9.59219 8.37539C9.73984 8.48203 9.76992 8.68711 9.66328 8.83477L9.14922 9.54297C9.04258 9.68789 8.8375 9.7207 8.68984 9.61406Z"
                                                        fill="#5C5F62" />
                                                </svg>
                                            </span>
                                            <p class="text-12 text-[#5C5F62] font-solaimans">12:06 PM</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-[50%] px-3 pt-3 bg-[#F4F4F4] rounded-md mt-3">
                                    <div class="w-full bg-white rounded-md flex items-center justify-center">
                                        <div class="px-11 py-8">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="38" height="39"
                                                viewBox="0 0 38 39" fill="none">
                                                <path
                                                    d="M21.375 10.3594V0H6.53125C5.54414 0 4.75 0.815039 4.75 1.82812V37.1719C4.75 38.185 5.54414 39 6.53125 39H31.4688C32.4559 39 33.25 38.185 33.25 37.1719V12.1875H23.1562C22.1766 12.1875 21.375 11.3648 21.375 10.3594ZM25.6129 19.5H27.3867C27.9582 19.5 28.3813 20.0408 28.2551 20.6197L25.4348 33.4166C25.3457 33.8355 24.982 34.125 24.5664 34.125H21.7461C21.3379 34.125 20.9816 33.8355 20.8852 33.4318C18.9703 25.548 19.3414 27.2467 18.9852 25.0148H18.948C18.8664 26.1041 18.7699 26.3402 17.048 33.4318C16.9516 33.8355 16.5953 34.125 16.1871 34.125H13.4336C13.018 34.125 12.6543 33.8279 12.5652 33.409L9.75977 20.6121C9.63359 20.0408 10.0566 19.5 10.6281 19.5H12.4465C12.8695 19.5 13.2406 19.8047 13.3223 20.2389C14.4801 26.1803 14.8141 28.5797 14.8809 29.5471C14.9996 28.7701 15.4227 27.0563 17.0629 20.2008C17.1594 19.7895 17.5156 19.5076 17.9313 19.5076H20.091C20.5066 19.5076 20.8629 19.7971 20.9594 20.2084C22.7406 27.8561 23.0969 29.6537 23.1562 30.065C23.1414 29.2119 22.9633 28.7092 24.7594 20.2236C24.8336 19.7971 25.1973 19.5 25.6129 19.5ZM33.25 9.28535V9.75H23.75V0H24.2027C24.6777 0 25.1305 0.19043 25.4645 0.533203L32.7305 7.99805C33.0645 8.34082 33.25 8.80547 33.25 9.28535Z"
                                                    fill="#0030DA" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="flex justify-between items-center pt-3 pb-4">
                                        <h1 class="text-12 lg:text-14 font-solaimans leading-3">Ducking-designers..
                                        </h1>
                                        <svg class="file-delete w-[1.125em] h-[1.125] cursor-pointer"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18" fill="none">
                                            <path
                                                d="M9 13.5C9.29837 13.5 9.58452 13.6185 9.79549 13.8295C10.0065 14.0405 10.125 14.3266 10.125 14.625C10.125 14.9234 10.0065 15.2095 9.79549 15.4205C9.58452 15.6315 9.29837 15.75 9 15.75C8.70163 15.75 8.41548 15.6315 8.20451 15.4205C7.99353 15.2095 7.875 14.9234 7.875 14.625C7.875 14.3266 7.99353 14.0405 8.20451 13.8295C8.41548 13.6185 8.70163 13.5 9 13.5ZM9 7.875C9.29837 7.875 9.58452 7.99353 9.79549 8.2045C10.0065 8.41548 10.125 8.70163 10.125 9C10.125 9.29837 10.0065 9.58452 9.79549 9.7955C9.58452 10.0065 9.29837 10.125 9 10.125C8.70163 10.125 8.41548 10.0065 8.20451 9.7955C7.99353 9.58452 7.875 9.29837 7.875 9C7.875 8.70163 7.99353 8.41548 8.20451 8.2045C8.41548 7.99353 8.70163 7.875 9 7.875ZM9 2.25C9.29837 2.25 9.58452 2.36853 9.79549 2.5795C10.0065 2.79048 10.125 3.07663 10.125 3.375C10.125 3.67337 10.0065 3.95952 9.79549 4.1705C9.58452 4.38147 9.29837 4.5 9 4.5C8.70163 4.5 8.41548 4.38147 8.20451 4.1705C7.99353 3.95952 7.875 3.67337 7.875 3.375C7.875 3.07663 7.99353 2.79048 8.20451 2.5795C8.41548 2.36853 8.70163 2.25 9 2.25Z"
                                                fill="black" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="flex items-center gap-2 mt-5">

                                    <h2 class="text-12 font-solaimans text-[#5C5F62]">Uploaded By</h2>
                                    <div class="flex items-center gap-3">
                                        <img src="{{ asset('assets/image/user1.png') }}" alt="">
                                        <h2 class="text-16 font-solaimans font-semibold">Wade Warren</h2>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li>
                            <div class="py-4">
                                <h2 class="text-12 font-solaimans text-[#5C5F62]">Shared By</h2>
                                <div class="flex items-center justify-between mt-3">

                                    <div class="flex items-center gap-3">
                                        <img src="{{ asset('assets/image/user1.png') }}" alt="">
                                        <h2 class="text-16 font-solaimans font-semibold">Wade Warren</h2>
                                    </div>

                                    <div class="flex items-center gap-4">
                                        <div class="flex items-center gap-2">
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                    viewBox="0 0 14 14" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M12.6875 1.75H11.375V0.875H10.5V1.75H3.5V0.875H2.625V1.75H1.3125L0.875 2.1875V12.6875L1.3125 13.125H12.6875L13.125 12.6875V2.1875L12.6875 1.75ZM12.25 12.25H1.75V4.375H12.25V12.25ZM12.25 3.5H1.75V2.625H12.25V3.5ZM3.5 7H2.625V7.875H3.5V7ZM2.625 8.75H3.5V9.625H2.625V8.75ZM3.5 10.5H2.625V11.375H3.5V10.5ZM5.25 7H6.125V7.875H5.25V7ZM6.125 8.75H5.25V9.625H6.125V8.75ZM5.25 10.5H6.125V11.375H5.25V10.5ZM6.125 5.25H5.25V6.125H6.125V5.25ZM7.875 7H8.75V7.875H7.875V7ZM8.75 8.75H7.875V9.625H8.75V8.75ZM7.875 10.5H8.75V11.375H7.875V10.5ZM8.75 5.25H7.875V6.125H8.75V5.25ZM10.5 7H11.375V7.875H10.5V7ZM11.375 8.75H10.5V9.625H11.375V8.75ZM10.5 5.25H11.375V6.125H10.5V5.25Z"
                                                        fill="#5C5F62" />
                                                </svg>
                                            </span>
                                            <p class="text-12 text-[#5C5F62] font-solaimans">12/06/23</p>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                    viewBox="0 0 14 14" fill="none">
                                                    <path
                                                        d="M7 0.21875C3.25391 0.21875 0.21875 3.25391 0.21875 7C0.21875 10.7461 3.25391 13.7812 7 13.7812C10.7461 13.7812 13.7812 10.7461 13.7812 7C13.7812 3.25391 10.7461 0.21875 7 0.21875ZM7 12.4688C3.97852 12.4688 1.53125 10.0215 1.53125 7C1.53125 3.97852 3.97852 1.53125 7 1.53125C10.0215 1.53125 12.4688 3.97852 12.4688 7C12.4688 10.0215 10.0215 12.4688 7 12.4688ZM8.68984 9.61406L6.36836 7.92695C6.28359 7.86406 6.23438 7.76563 6.23438 7.66172V3.17188C6.23438 2.99141 6.38203 2.84375 6.5625 2.84375H7.4375C7.61797 2.84375 7.76562 2.99141 7.76562 3.17188V7.04648L9.59219 8.37539C9.73984 8.48203 9.76992 8.68711 9.66328 8.83477L9.14922 9.54297C9.04258 9.68789 8.8375 9.7207 8.68984 9.61406Z"
                                                        fill="#5C5F62" />
                                                </svg>
                                            </span>
                                            <p class="text-12 text-[#5C5F62] font-solaimans">12:06 PM</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="flex items-center gap-6 px-12">
                                    <div class="flex items-center">
                                        <img class="w-[2.25em] h-[2.25em] rounded-full -me-2"
                                            src="{{ asset('assets/image/user1.png') }}" alt="">
                                        <img class="w-[2.25em] h-[2.25em] rounded-full -me-2"
                                            src="{{ asset('assets/image/user2.png') }}" alt="">
                                        <img class="w-[2.25em] h-[2.25em] rounded-full -me-2"
                                            src="{{ asset('assets/image/user2.png') }}" alt="">
                                    </div>
                                    <a href=""
                                        class="border border-[#007A43] flex items-center gap-1 py-1 px-2 rounded">

                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 16 16" fill="none">
                                                <path
                                                    d="M15.1338 5.44916L11.3839 1.69999C10.6022 0.918378 9.25 1.46575 9.25 2.58385V4.07338C8.14453 4.12234 7.06172 4.24395 6.10521 4.54187C5.18932 4.82702 4.46276 5.2601 3.94609 5.82885C3.31823 6.52051 3 7.39031 3 8.41478C3 10.0215 3.86401 11.3433 5.21016 12.1846C6.18792 12.7968 7.43016 11.8551 7.05964 10.733C6.6556 9.50596 6.61286 8.88606 9.25 8.68197V10.083C9.25 11.2026 10.6033 11.7474 11.3839 10.9669L15.1338 7.21687C15.6221 6.72885 15.6221 5.93718 15.1338 5.44916ZM10.5 10.083V7.37885C7.14867 7.4289 4.83573 7.98275 5.87266 11.1247C5.10391 10.6442 4.25 9.7726 4.25 8.41478C4.25 5.56754 7.61302 5.31721 10.5 5.29369V2.58301L14.25 6.33301L10.5 10.083ZM11.1443 12.2834C11.3367 12.2284 11.5206 12.1468 11.6905 12.0411C11.8982 11.9121 12.1667 12.0626 12.1667 12.3071V13.4163C12.1667 14.1067 11.607 14.6663 10.9167 14.6663H1.75C1.05964 14.6663 0.5 14.1067 0.5 13.4163V4.24968C0.5 3.55932 1.05964 2.99968 1.75 2.99968H5.1875C5.36008 2.99968 5.5 3.1396 5.5 3.31218V3.429C5.5 3.55705 5.42221 3.67299 5.30289 3.71942C4.94607 3.85825 4.61549 4.01986 4.31201 4.2034C4.26274 4.23347 4.20618 4.24948 4.14846 4.24968H1.90625C1.86481 4.24968 1.82507 4.26614 1.79576 4.29544C1.76646 4.32475 1.75 4.36449 1.75 4.40593V13.2601C1.75 13.3015 1.76646 13.3413 1.79576 13.3706C1.82507 13.3999 1.86481 13.4163 1.90625 13.4163H10.7604C10.8019 13.4163 10.8416 13.3999 10.8709 13.3706C10.9002 13.3413 10.9167 13.3015 10.9167 13.2601V12.5839C10.9167 12.4441 11.0099 12.3219 11.1443 12.2834Z"
                                                    fill="#007A43" />
                                            </svg>
                                        </span>
                                        <span class="text-14 font-solaimans text-[#007A43]"> Manage</span>

                                    </a>
                                </div>


                            </div>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </section>

    {{-- notification file system --}}
    <section id="notificationSection" class="h-auto bg-white lg:w-[30%]  shadow-xl py-5 px-4">
        <div class="h-full overflow-y-scroll">
            <?php $remainders = Notification::get_remainder();
            ?>
            @if ($remainders->count() > 0)
                <h3>{{ __('messages.Reminders') }}</h3>
            @endif
            @foreach ($remainders as $rem)
                <div class="flex cursor-pointer items-center gap-4 py-2"
                    onclick="gotofile('{{ $rem->id }}','{{ $rem->document_id }}','{{ $rem->file_type }}')">

                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="18" viewBox="0 0 16 15"
                        fill="none">
                        <path
                            d="M8.00002 15C9.03479 15 9.87414 14.1606 9.87414 13.125H6.1259C6.1259 14.1606 6.96525 15 8.00002 15ZM14.3103 10.614C13.7443 10.0058 12.6852 9.09082 12.6852 6.09375C12.6852 3.81738 11.0891 1.99512 8.93693 1.54805V0.9375C8.93693 0.419824 8.5174 0 8.00002 0C7.48264 0 7.06311 0.419824 7.06311 0.9375V1.54805C4.91096 1.99512 3.31486 3.81738 3.31486 6.09375C3.31486 9.09082 2.25578 10.0058 1.68977 10.614C1.51399 10.8029 1.43606 11.0288 1.43752 11.25C1.44074 11.7305 1.81779 12.1875 2.37795 12.1875H13.6221C14.1822 12.1875 14.5596 11.7305 14.5625 11.25C14.564 11.0288 14.4861 10.8026 14.3103 10.614Z"
                            fill="#F7C515" />
                    </svg>
                    <div class="flex flex-col gap-1">
                        <p class="font-solaimans text-[#082303] text-12"><span
                                class="font-solaimans text-[#00A6B0] !text-18">{{ __('messages.Current_Language') == 'en' ? $rem->nameEn : $rem->nameBn }}</span>
                            {{ __('messages.You have a reminder') }}</p>
                        <p>{{ $rem->reminder_type }}</p>
                    </div>

                </div>
            @endforeach
            <hr>
            <?php $sheared = Notification::get_shared(); ?>
            @if ($sheared->count() > 0)
                <h3>{{ __('messages.share') }}</h3>
            @endif
            @foreach ($sheared as $shear)
                <div class="flex cursor-pointer items-center gap-4 py-2"
                    onclick="gotofileshare({{ $shear->document_id }},'{{ $shear->document_type }}')">
                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="18" viewBox="0 0 16 15"
                        fill="none">
                        <path
                            d="M8.00002 15C9.03479 15 9.87414 14.1606 9.87414 13.125H6.1259C6.1259 14.1606 6.96525 15 8.00002 15ZM14.3103 10.614C13.7443 10.0058 12.6852 9.09082 12.6852 6.09375C12.6852 3.81738 11.0891 1.99512 8.93693 1.54805V0.9375C8.93693 0.419824 8.5174 0 8.00002 0C7.48264 0 7.06311 0.419824 7.06311 0.9375V1.54805C4.91096 1.99512 3.31486 3.81738 3.31486 6.09375C3.31486 9.09082 2.25578 10.0058 1.68977 10.614C1.51399 10.8029 1.43606 11.0288 1.43752 11.25C1.44074 11.7305 1.81779 12.1875 2.37795 12.1875H13.6221C14.1822 12.1875 14.5596 11.7305 14.5625 11.25C14.564 11.0288 14.4861 10.8026 14.3103 10.614Z"
                            fill="#F7C515" />
                    </svg>
                    <div class="flex flex-col gap-1">
                        <p class="font-solaimans text-[#082303] text-12"><span
                                class="font-solaimans text-[#00A6B0] !text-18">{{ __('messages.Current_Language') == 'en' ? $shear->nameEn : $shear->nameBn }}</span>
                            {{ __('messages.Sheard a file/folder') }}</p>
                        <p>{{ $shear->description }}</p>

                    </div>
                </div>
            @endforeach
            @if ($remainders->count() == 0 && $sheared->count() == 0)
                <div style="display: flex;justify-content: center;">
                    <img style="height:200px" src="{{ asset('assets/image/nodata.gif') }}" alt="No Data Found">
                </div>
            @endif
        </div>
    </section>

    {{-- dropdown bottom show --}}


    </div>
    <div id="modalCreateFolder" class="absolute w-[15.625em] h-auto bg-white z-30 py-2 shadow-md hidden show-upload">
        <button class="px-2 w-full py-2 hover:bg-gray-400" onclick="chckprmitionh_folder()">
            <p class="font-solaimans"> <i class="fa fa-light fa-folder-open" style="color: #007a48;"></i>
                {{ __('messages.New folder') }}
            </p>
        </button>
        <hr>
        <button onclick="chckprmitionh_handlefilepick('uploadFile')" class="px-2 w-full py-2 hover:bg-gray-400">
            <p class="font-solaimans">
                <i class="fa fa-light fa-file-circle-plus" style="color: #007a48;"></i>
                {{ __('messages.File Upload') }}
            </p>
        </button>
    </div>
    <div class="mt-4">
        @include('backend.footer.footer')
    </div>
    <script src="{{ asset('assets/js/chart.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script src="{{ asset('assets/js/category.js') }}"></script>
    <script src="{{ asset('assets/js/files.js') }}"></script>
    <script src="{{ asset('assets/js/file_hendel.js') }}"></script>
    <script src="{{ asset('assets/js/hidden_menu.js') }}"></script>
    <script src="{{ asset('assets/js/search.js') }}"></script>
    <script src="{{ asset('assets/js/drag.js') }}"></script>
    <script src="{{ asset('assets/js/role.js') }}"></script>
    {{-- <script src="{{ asset('assets/js/blockrightclick.js') }}"></script> --}}
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    <script>
        function chckprmitionh_handlefilepick(type) {
            var ability = {{ Setting::upload_file() }}
            if (ability === 1) {
                handlefilepick(type)
            } else {
                showMessage('error', '{{ __('messages.You do not have permission to upload files') }}');
            }
        }

        function chckprmitionh_folder() {
            var ability = {{ Setting::upload_file() }}
            if (ability === 1) {

                my_modal_5.showModal();
                $('#category-name').val('')
                modalCreateFolderClose()

            } else {
                showMessage('error', '{{ __('messages.You do not have permission to upload files') }}');
            }
        }

        function checkFileRemainder(el) {
            var ability = {{ Setting::remainder() }}
            if (ability === 1) {
                $('#setRemaider_form').trigger("reset");
                var elements = document.getElementsByClassName("search-choice-close");

                // Loop through the elements and click on the ones where data-option-array-index is not equal to "0"
                for (var i = 0; i < elements.length; i++) {
                    if (elements[i].getAttribute("data-option-array-index") !== "0") {
                        elements[i].click();
                    }
                }
                setRemaider_Modal.showModal();
                set_cat_id_remainder(el);
                dropdownFileHide()

            } else {
                showMessage('error', '{{ __('messages.You do not have permission to set remainder') }}');
            }
        }

        function checkFileVersion(ev, th) {
            var ability = {{ Setting::previous_version() }}
            if (ability === 1) {
                openFileVersion(ev);
                dropdownFileHide();
                get_file_version(th)
            } else {
                showMessage('error', '{{ __('messages.You do not have permission to get previous version') }}');
            }
        }
    </script>


    <script>
        var $clickedElement = $('.open-file');
        var $showElement = $('.show-upload');
        var offsetTop = -100;

        $clickedElement.click(function(event) {
            console.log("asing element");
            event.stopPropagation();
            @if (!Auth::user()->can('file_upload'))
                showMessage('error', 'You do not have permission to upload files');
                return false();
            @endif
            // Calculate the position relative to the clicked element
            var showElementPosition = {
                top: $(this).offset().top + $(this).outerHeight() + offsetTop + 100,
                left: $(this).offset().left
            };
            // Calculate the maximum allowed position based on the viewport dimensions
            var maxTopPosition = $(window).height() - $showElement.outerHeight();
            var maxLeftPosition = $(window).width() - $showElement.outerWidth();

            console.log("top", maxTopPosition + "left" + maxLeftPosition);
            // Adjust the position if it exceeds the maximum values
            showElementPosition.top = Math.min(showElementPosition.top, maxTopPosition);
            showElementPosition.left = Math.min(showElementPosition.left, maxLeftPosition);

            // Set the position of the $showElement
            $showElement.css({
                top: showElementPosition.top + 'px',
                left: showElementPosition.left + 'px'
            });
            $showElement.slideDown('fast');
        });



        $(document).click(function() {
            $showElement.hide();
        });



        $showElement.click(function(event) {
            event.stopPropagation(); // Prevent the click event from propagating to the document
        });
    </script>
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: ` {{ session('success') }}`,
                timer: 2000,
                showConfirmButton: false
            })
        </script>
    @endif
    <script>
        function confirmDelete(event) {
            Swal.fire({
                title: '{{ __('messages.Are you sure') }}?',
                imageUrl: '{{ asset('deletegif.gif') }}',
                imageWidth: 100,
                imageHeight: 110,
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '{{ __('messages.Yes, delete it') }}!',
                cancelButtonText: '{{ __('messages.cancel') }}',
            }).then((result) => {
                if (result.isConfirmed) {
                    delete_files(event);
                }
            })
        }

        function upload_file() {
            $('.drop-zone__thumb').html('');
            $('.show-upload').css('display', 'none');
            my_modaluploade.showModal();
            var location = window.location.href;
            var fileInput = document.getElementById('fileInput');
            var totalFiles = fileInput.files.length;
            var uploadedfile = 0;
            if (totalFiles > 0) {
                var progressBarContainer = $('.progress-bar-container');
                progressBarContainer.html(''); // Clear any existing progress bars

                for (var i = 0; i < totalFiles; i++) {
                    var file = fileInput.files[i];
                    var formData = new FormData();
                    formData.append('file', file);

                    if (location.endsWith("user")) {
                        formData.append('category_id_file', 1);
                    } else {
                        formData.append('category_id_file', $('#category_id_file').val());
                    }

                    var name = $(
                        `<span style="text-align: left;overflow: hidden;white-space: nowrap;text-overflow: ellipsis;height: 20px;width: 90%;">${file.name}</span>`
                    );
                    progressBarContainer.append(name);

                    var progressBar = $(`
                <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                </div>`);
                    progressBarContainer.append(progressBar);
                    var counts = 0;
                    var counte = 0;
                    var uplodar = [];
                    var errar = [];
                    // Create a separate AJAX request for each file
                    uploadFile(file.name, formData, progressBar, function(name, countsu) {
                        if (countsu == 'suc') {
                            counts++
                            uplodar.push(name);
                        } else {
                            counte++
                            errar.push(name);
                        }

                        uploadedfile++;
                        if (uploadedfile === totalFiles) {
                            my_modaluploade.close();
                            if (totalFiles === counts) {
                                showMessage('success', 'All files uploaded successfully.')
                                var clocation = window.location.href;
                                if (clocation.endsWith("user")) {
                                    console.log('hello');
                                    localStorage.setItem("myVariable", 1);
                                    var modifiedUrl = clocation.replace('/user', '/files');
                                    window.location.href = modifiedUrl;
                                } else {
                                    fetch_data($('#category_id_file').val());
                                }
                            } else {
                                var htmlt = '';

                                // Add a parent container with a class for styling
                                htmlt += '<div class="file-list-container">';

                                // Left-aligned header for uploaded files
                                htmlt += `<div class="file-list-header">Uploaded Files (${counts})</div>`;

                                // Create a container for uploaded files
                                htmlt += '<div class="file-list">';
                                // Iterate through uploaded files and display each one
                                for (var i = 0; i < uplodar.length; i++) {
                                    htmlt += `<span class="file-list-item">${i+1} . ${uplodar[i]}</span>`;
                                }

                                htmlt += '</div>'; // Close the uploaded files container

                                // Left-aligned header for failed files
                                htmlt += `<div class="file-list-header">Failed Files (${counte}) </div>`;

                                // Create a container for failed files
                                htmlt += '<div class="file-list">';
                                // Iterate through failed files and display each one
                                for (var i = 0; i < errar.length; i++) {
                                    htmlt += `<span class="file-list-item">${i+1} . ${errar[i]}</span>`;
                                }

                                htmlt += '</div>'; // Close the failed files container
                                htmlt +=
                                    `<span style="border: 1px solid red;height: 20px;border-radius: 20px;width: fit-content;padding: 1px 7px;font-size: 11px;">Error: File is too large</span>`;

                                htmlt += '</div>'; // Close the parent container

                                // Add CSS styles
                                htmlt += `<style>
                        .file-list-container {
                            display: flex;
                            flex-direction: column;
                            gap: 20px;
                            align-items: left;
                        }
                        .file-list-header {
                            font-weight: bold;
                            text-align: left;
                        }
                        .file-list {
                            display: flex;
                            flex-direction: column;
                        }
                        .file-list-title {
                            white-space: nowrap;
                            text-overflow: ellipsis;
                            overflow: hidden;
                            height: 20px;
                            width: 90%;
                        }
                        .file-list-item {
                            white-space: nowrap;
                            text-overflow: ellipsis;
                            overflow: hidden;
                            float: left;
                            text-align: left;
                            width: 90%;
                        }
                        .my-custom-button-class {
                            background-color: #007A43!important;
                            padding: 5px;
                            width: 72px;
                        }
                        </style>`;
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    html: htmlt,
                                    customClass: {
                                        confirmButton: 'my-custom-button-class'
                                    }
                                }).then(function() {
                                    var clocation = window.location.href;
                                    if (clocation.endsWith("user")) {
                                        console.log('hello');
                                        localStorage.setItem("myVariable", 1);
                                        var modifiedUrl = clocation.replace('/user', '/files');
                                        window.location.href = modifiedUrl;
                                    } else {
                                        fetch_data($('#category_id_file').val());
                                    }
                                });
                            }
                        }
                    });
                }
            }
        }

        function uploadFile(name, formData, progressBar, callback) {
            var url = '{{ url('files/upload') }}';
            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                xhr: function() {
                    var xhr = new window.XMLHttpRequest();
                    xhr.upload.addEventListener("progress", function(e) {
                        if (e.lengthComputable) {
                            var percentComplete = (e.loaded / e.total) * 100;
                            progressBar.css('width', Math.round(percentComplete) + '%');
                            progressBar.html(Math.round(percentComplete) + '%');
                            if (percentComplete == 100) {
                                progressBar.html(`<i class="fa-solid fa-spinner fa-spin-pulse"></i>`);
                            }
                        }
                    }, false);
                    return xhr;
                },
                success: function(data) {
                    progressBar.html('Upload Success');
                    callback(name, 'suc');

                },
                error: function(xhr) {
                    progressBar.html(xhr.statusText);
                    callback(name, 'err');
                }
            });
        }

        function confirmDelete(event) {
            Swal.fire({
                title: '{{ __('messages.Are you sure') }}?',
                imageUrl: '{{ asset('deletegif.gif') }}',
                imageWidth: 100,
                imageHeight: 110,
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '{{ __('messages.Yes, delete it') }}!',
                cancelButtonText: '{{ __('messages.cancel') }}',
            }).then((result) => {
                if (result.isConfirmed) {
                    delete_files(event);
                }
            })
        }
    </script>
    <script>
        function displayFileContents(id, startid = null) {

            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            });
            $.ajax({
                url: "{{ route('get_file') }}",
                type: "POST",
                data: {
                    id: id,
                    startid: startid
                },
                success: function(data) {
                    if (data.document['is_lock'] == 1) {
                        // lock start
                        Swal.fire({
                            title: "{{ __('messages.Enter the password for access the file') }}",
                            input: "text",
                            inputPlaceholder: "{{ __('messages.Please enter the password') }}",
                            inputAttributes: {
                                autocapitalize: "off"
                            },
                            showCancelButton: true,
                            confirmButtonText: "{{ __('messages.Confirm Password') }}",
                            cancelButtonText: "{{ __('messages.cancel') }}",
                            showLoaderOnConfirm: true,
                            preConfirm: (password) => {
                                if (password == null || password.trim() === "") {
                                    Swal.showValidationMessage(
                                        "{{ __('messages.Please enter the password') }}");
                                } else if (password === data.document['lock_code']) {
                                    return password;
                                } else {
                                    Swal.showValidationMessage(
                                        "{{ __('messages.Incorrect password. Please try again') }}"
                                    );
                                }
                            }
                        }).then((result) => {
                            if (result.isConfirmed) {
                                if (data.document == null) {
                                    showMessage('error', 'The owner has removed this file');
                                    return;
                                }
                                var imgbaseurl = '{{ asset('uploads/') }}';
                                if (data != 'error') {
                                    var contents = data.document;
                                    var name = contents.title;
                                    preview_modal.showModal();
                                    $('#previewfle_name').html(name);
                                    const fileContentsContainer = $('#fileContents');
                                    fileContentsContainer.empty();
                                    if (contents.filetype == 'pdf') {
                                        pdfViewer = $(
                                            '<iframe style="width: 100%; height: 100%;" src="{{ asset('uploads/') }}' +
                                            '/' +
                                            contents.file_path +
                                            '#toolbar=0" title="PDF Viewer"></iframe>');
                                        if (data.accesstype == '2') {
                                            var downloadbtn =
                                                `<a onclick="downloadFile('${contents.id}')" style="border: 1px solid #228325;font-size: 14px;padding: 5px;border-radius: 16px;color: white;display: flex;flex-direction: row;justify-content: center;align-items: center;gap: 5px;"><i class="fa-solid fa-download" style="color: #ffffff;"></i>Download</a>`
                                        }
                                    } else if (contents.filetype == 'png' || contents.filetype ==
                                        'jpg' || contents
                                        .filetype == 'jpeg') {
                                        pdfViewer = $('<img src="{{ asset('uploads/') }}' + '/' +
                                            contents.file_path +
                                            '" style="width: 400px; height: 400px;" />');
                                        if (data.accesstype == '2') {
                                            var downloadbtn =
                                                `<a onclick="downloadFile('${contents.id}')" style="border: 1px solid #228325;font-size: 14px;padding: 5px;border-radius: 16px;color: white;display: flex;flex-direction: row;justify-content: center;align-items: center;gap: 5px;"><i class="fa-solid fa-download" style="color: #ffffff;"></i>Download</a>`
                                        }
                                    } else {
                                        var pdfViewer = '';
                                        pdfViewer += `<div style="width: 100%; height: 10%;" class="flex justify-center">
                                        <div class="text-center text-white" style="align-content: center;font-size: 22px;display: inline-grid;"> Preview not available</div>
                                        </div>`;
                                        if (data.accesstype == '2') {
                                            var downloadbtn =
                                                `<a onclick="downloadFile('${contents.id}')" style="border: 1px solid #228325;font-size: 14px;padding: 5px;border-radius: 16px;color: white;display: flex;flex-direction: row;justify-content: center;align-items: center;gap: 5px;"><i class="fa-solid fa-download" style="color: #ffffff;"></i>Download</a>`
                                        }
                                        if (data.accesstype == '2') {
                                            pdfViewer += `<div class="flex justify-center">
                                            <div class="text-center text-white" style="align-content: center; font-size: 22px; display: inline-grid;">
                                                <a style="border: 1px solid #228325;font-size: 14px;padding: 5px;border-radius: 16px;color: white;display: flex;flex-direction: row;justify-content: center;align-items: center;gap: 5px;" href="${imgbaseurl}/${contents.file_path}" download><i class="fa-solid fa-download" style="color: #ffffff;"></i>Download</a>
                                            </div>
                                        </div>`
                                        }
                                    }
                                    $('#print_preview').attr('href',
                                        `${imgbaseurl}/${contents.file_path}`);
                                    fileContentsContainer.append(pdfViewer);
                                    $('#downloadbtn').html(downloadbtn);
                                } else {
                                    console.log('error');
                                }
                            }
                        });

                    }else{
                        if (data.document == null) {
                                    showMessage('error', 'The owner has removed this file');
                                    return;
                                }
                                var imgbaseurl = '{{ asset('uploads/') }}';
                                if (data != 'error') {
                                    var contents = data.document;
                                    var name = contents.title;
                                    preview_modal.showModal();
                                    $('#previewfle_name').html(name);
                                    const fileContentsContainer = $('#fileContents');
                                    fileContentsContainer.empty();
                                    if (contents.filetype == 'pdf') {
                                        pdfViewer = $(
                                            '<iframe style="width: 100%; height: 100%;" src="{{ asset('uploads/') }}' +
                                            '/' +
                                            contents.file_path +
                                            '#toolbar=0" title="PDF Viewer"></iframe>');
                                        if (data.accesstype == '2') {
                                            var downloadbtn =
                                                `<a onclick="downloadFile('${contents.id}')" style="border: 1px solid #228325;font-size: 14px;padding: 5px;border-radius: 16px;color: white;display: flex;flex-direction: row;justify-content: center;align-items: center;gap: 5px;"><i class="fa-solid fa-download" style="color: #ffffff;"></i>Download</a>`
                                        }
                                    } else if (contents.filetype == 'png' || contents.filetype ==
                                        'jpg' || contents
                                        .filetype == 'jpeg') {
                                        pdfViewer = $('<img src="{{ asset('uploads/') }}' + '/' +
                                            contents.file_path +
                                            '" style="width: 400px; height: 400px;" />');
                                        if (data.accesstype == '2') {
                                            var downloadbtn =
                                                `<a onclick="downloadFile('${contents.id}')" style="border: 1px solid #228325;font-size: 14px;padding: 5px;border-radius: 16px;color: white;display: flex;flex-direction: row;justify-content: center;align-items: center;gap: 5px;"><i class="fa-solid fa-download" style="color: #ffffff;"></i>Download</a>`
                                        }
                                    } else {
                                        var pdfViewer = '';
                                        pdfViewer += `<div style="width: 100%; height: 10%;" class="flex justify-center">
                                        <div class="text-center text-white" style="align-content: center;font-size: 22px;display: inline-grid;"> Preview not available</div>
                                        </div>`;
                                        if (data.accesstype == '2') {
                                            var downloadbtn =
                                                `<a onclick="downloadFile('${contents.id}')" style="border: 1px solid #228325;font-size: 14px;padding: 5px;border-radius: 16px;color: white;display: flex;flex-direction: row;justify-content: center;align-items: center;gap: 5px;"><i class="fa-solid fa-download" style="color: #ffffff;"></i>Download</a>`
                                        }
                                        if (data.accesstype == '2') {
                                            pdfViewer += `<div class="flex justify-center">
                                            <div class="text-center text-white" style="align-content: center; font-size: 22px; display: inline-grid;">
                                                <a style="border: 1px solid #228325;font-size: 14px;padding: 5px;border-radius: 16px;color: white;display: flex;flex-direction: row;justify-content: center;align-items: center;gap: 5px;" href="${imgbaseurl}/${contents.file_path}" download><i class="fa-solid fa-download" style="color: #ffffff;"></i>Download</a>
                                            </div>
                                        </div>`
                                        }
                                    }
                                    $('#print_preview').attr('href',
                                        `${imgbaseurl}/${contents.file_path}`);
                                    fileContentsContainer.append(pdfViewer);
                                    $('#downloadbtn').html(downloadbtn);
                                } else {
                                    console.log('error');
                                }
                    }
                }
            });





        }
        $(document).ready(function() {
            // Chosen
            $(".multipleChosen").chosen({
                placeholder_text_multiple: "Select Users" // placeholder
            });
        });
    </script>
    <script>
        function downloadFile(id) {


            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            });
            $.ajax({
                url: "{{ route('download_file') }}",
                type: "POST",
                data: {
                    id: id
                },
                success: function(data) {
                    console.log(data);

                    // Extract properties from the data
                    var title = data.title;
                    var imgbaseurl = '{{ asset('uploads/') }}/';
                    var file_path = imgbaseurl + data.file_path;
                    // Create an anchor element for downloading the file
                    var link = document.createElement('a');
                    link.href = file_path;

                    // Set the download attribute to specify the file name
                    link.download = title;

                    // Trigger a click event to initiate the download
                    link.click();

                }
            });

        }
    </script>
    <script>
        $(document).on("submit", "#add_versionFile", function(e) {
            e.preventDefault();

            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            });
            $.ajax({
                url: "{{ route('add_version') }}",
                type: "POST",
                data: new FormData(this),
                processData: false,
                contentType: false,
                xhr: function() {
                    var xhr = new window.XMLHttpRequest();
                    var progressBar = $('#vertion_proggress');
                    var progressBarContainer = $('#progressvertioncon');
                    progressBarContainer.css('display', 'block');
                    progressBar.html('');

                    xhr.upload.addEventListener("progress", function(e) {
                        if (e.lengthComputable) {
                            var percentComplete = (e.loaded / e.total) * 100;
                            progressBar.css('width', Math.round(percentComplete) + '%');
                            progressBar.html(Math.round(percentComplete) + '%');
                            if (percentComplete == 100) {
                                progressBar.html(
                                    `<i class="fa-solid fa-spinner fa-spin-pulse"></i>`);
                            }
                        }
                    }, false);
                    return xhr;
                },
                success: function(data) {
                    if (data == 'success') {
                        location.reload();
                    } else {
                        showMessage('error', 'File not exit');

                        var progressBarContainer = $('#progressvertioncon');
                        var progressBar = $('#vertion_proggress');

                        progressBarContainer.css('display', 'none');

                        progressBar.css('width', '0%');
                        progressBar.html('0%');
                    }
                },
                error: function(xhr, status) {
                    showMessage('error', xhr.responseText);
                    var progressBarContainer = $('#progressvertioncon');
                    var progressBar = $('#vertion_proggress');

                    progressBarContainer.css('display', 'none');

                    progressBar.css('width', '0%');
                    progressBar.html('0%');

                },
            });
        });
    </script>
    <script>
        function file_lock(ev, el) {
            ev.preventDefault();
            ev.stopPropagation();
            file_locking_modal.showModal();
            let selectedcatid = $(el).attr("data-catid");
            let dataname = $(el).attr("data-name");

            $.ajax({
                type: "GET",
                url: `/get_file_locking_data/${selectedcatid}`,
                data: {},
                success: function (response) {
                    if (response.is_lock == 1) { 
                        $('#lock_file_check_box').prop('checked', true);                      
                    }else{
                        $('#lock_file_check_box').prop('checked', false);
                    }
                    $('#lokingfileid').val(selectedcatid);
                },
                error: function (xhr, status, error) {
                   
                },
            });
            
        }
    </script>
    <script>
         $(document).on("submit", "#file_locking_form", function(e) {
            e.preventDefault();

            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            });
            $.ajax({
                url: "{{ route('file_locking_form') }}",
                type: "POST",
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function(data) {
                    if (data.status == 'success') {
                        close_modal('file_locking_modal');
                        showMessage('success', data.message);
                    }else{
                        $('#lockingerror').text(data.message);
                    }
                    $('#lock_file_password').val('');
                },
                error: function(xhr, status) {
                },
            });
        });
   
    </script>
    <script>
        function close_modal(data) {
          let dialog = document.getElementById(data);
        dialog.close();
        }
    </script>
</body>

</html>
