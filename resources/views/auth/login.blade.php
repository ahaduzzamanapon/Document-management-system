<!doctype html>
<html data-theme="light">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/mammoth@1.4.9/mammoth.browser.min.js"></script>

    <title>{{ __('messages.title') }}
    </title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/image/logo.png') }}">

    {{-- google font start --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Roboto&display=swap" rel="stylesheet">
    {{-- font-awesome-icon --}}
    <link rel="stylesheet" href="{{ asset('assets/font-awesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.js"></script>
    <script src="https://kit.fontawesome.com/eb7c20eb69.js" crossorigin="anonymous"></script>

    {{-- <link href="https://cdn.jsdelivr.net/npm/daisyui@3.7.3/dist/full.css" rel="stylesheet" type="text/css" />
<script src="https://cdn.tailwindcss.com"></script> --}}
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" /> --}}
    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.7.3/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>

    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<body class="2xl:container mx-auto">

    <div class="w-full h-[100vh]">
        <div class="w-full h-full  bg-cover bg-center bg-no-repeat"
            style="background-image: url({{ asset('assets/image/bg_parlament.jpg') }})">

            <div class="w-ful  h-full flex flex-col  items-center pt-10">
                <div class="w-[85%] md:w-[50%] lg:w-[40%] xl:w-[35%]  shadow-lg pt-7 pb-1 px-5 bg-white rounded-lg">

                    @if (Session::has('error'))
                        <div class="flex justify-between mb-3 text-red-200 shadow-inner rounded p-3 bg-red-600">
                            <p class="self-center"><strong>{{ __('messages.alert_type') }}! </strong>{{ __(Session::get('error')) }}</p>
                            <strong class="text-xl align-center cursor-pointer alert-del">&times;</strong>
                        </div>
                    @endif

                    @if (Session::has('success'))
                        <div class="flex justify-between text-green-200 shadow-inner rounded p-3 bg-green-600">
                            <p class="self-center">
                                <strong>{{ __('messages.success_type') }}</strong>{{ __(Session::get('success')) }}
                            </p>
                            <strong class="text-xl align-center cursor-pointer alert-del">&times;</strong>
                        </div>
                    @endif

                    <div>
                        <div class="w-full">
                            <div class="flex justify-center">

                                <img class="h-28" src="{{ asset('assets/image/login_logo.png') }}" alt="">
                            </div>

                        </div>
                    </div>
                    <div class="px-4 pt-3 lg:ps-10 lg:pe-16 lg:pt-4 xl:pt-7">
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="form-control w-full">
                                <input type="text" name="username" placeholder="{{ __('messages.User Email/ ID') }}"
                                    class="py-1   px-2 rounded-sm focus:outline-none !border border-[#0000005C] w-full"
                                    required />
                                <label class="label">
                                    <span class="text-[#007A43] !font-solaimans !text-12">{{ __('messages.Write Your Email/ID') }}</span>
                                </label>

                            </div>

                            <div class="form-control w-full relative">
                                <input type="password" name="password" id="passwordFeild" placeholder="{{ __('messages.Passwords') }}"
                                    class="py-1   ps-2 pe-10 rounded-sm focus:outline-none !border border-[#0000005C] w-full"
                                    required />
                                <span class="absolute top-1  right-2  xl:right-3 cursor-pointer">
                                    <i class="toggle-password fa fa-fw fa-eye-slash"></i>
                                </span>
                                <label class="label">
                                    <span class="text-[#007A43] !font-solaimans !text-12">{{ __('messages.Write Your System Password') }}</span>
                                </label>

                            </div>
                            <div class="pt-3 flex  justify-center">
                                <button type="submit"
                                    class="bg-[#007A43] text-white font-solaimans lg:text-16  py-1 px-1  lg:px-2 xl:px-3 flex items-center gap-1 rounded">{{ __('messages.Login') }}
                                    <span><svg class="w-[1.25em] h-[1.25em]" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 22 23" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M15.1525 5.68375L15.1662 5.67L16.5275 7.03125V3.9375L15.84 3.25H3.465L2.76375 3.9375V4.61538L2.75 4.625V18.7738L3.245 19.4062L10.12 21.7712L11 21.125V19.75H15.84L16.5275 19.0625V15.9688L15.1525 17.3438V18.375H11V6.97625L10.5463 6.34375L5.5495 4.625H15.1525V5.68375ZM9.625 20.135L4.125 18.2925V5.615L9.625 7.4575V20.135ZM13.8738 10.8538H20.7075V12.2287H13.9288L16.115 14.4288L15.1388 15.3912L11.7425 12.0087V11.0325L15.1662 7.6225L16.1287 8.585L13.8738 10.8538Z"
                                                fill="white" />
                                        </svg></span>
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="flex justify-end">
                        <img src="{{ asset('assets/image/login_image.png') }}" alt="">
                    </div>
                    {{-- <div class="mt-1 mb-2">
                        <h1 class="text-center text-14 lg:text-16 font-solaimans">কারিগরি সহায়তায় <a href="https://mysoftheaven.com/" target="_blank" class="cursor-pointer underline text-blue-400" >@MysoftHeaven(BD)Ltd</a></h1>
                    </div> --}}
                </div>

            </div>
            <div class="fixed w-full bottom-0 left-0">
                @include('backend.footer.footer')
            </div>
        </div>


    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script>
        // Script For Close alert

        var alert_del = document.querySelectorAll('.alert-del');
        alert_del.forEach((x) =>
            x.addEventListener('click', function() {
                x.parentElement.classList.add('hidden');
            })
        );
    </script>


    <script>
        $(".toggle-password").click(function() {

            $(this).toggleClass("fa-eye fa-eye-slash");

            let password = $('#passwordFeild');
            // input = $(this).parent().find("input");
            if (password.attr("type") == "password") {
                password.attr("type", "text");
            } else {
                password.attr("type", "password");
            }
        });
    </script>


</body>

</html>
