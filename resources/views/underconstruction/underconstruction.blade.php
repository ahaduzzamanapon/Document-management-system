@extends('Layouts.backend_master')

@section('main-content')
<div class="w-full h-full  bg-[#F2F8FF5E] "  >
       
    <div class="w-ful  h-full flex flex-col justify-center items-center">
        <div class="w-[85%] md:w-[50%] lg:w-[40%]  shadow-lg pt-7 pb-1 px-5 bg-[#FFF] rounded-lg mt-9">

            
    
            
    
                <div>
                    <div class="w-full">
                     <div class="flex justify-center">
                                
                         <img  src="{{ asset('assets/image/logo.png') }}" alt="">
                     </div>
                        <div class="flex items-center justify-center gap-2">
                            
                         <div>
                             <h1 class="text-16 lg:text-18 xl:text-20 text-[#007A43] font-solaimans font-extrabold">Bangladesh Parliament Secretary</h1>
                             <div class="ps-4 lg:ps-9">
                                 <h3 class="text-[#6C6C6C] text-12 lg:text-14 font-solaimans font-medium">Documentation Management System</h3>
                             </div>
                         </div>
                    </div>
                </div>
                <div class="px-4 pt-3 lg:ps-10 lg:pe-16 lg:pt-3">
                         <img class="w-full h-[300px]" src="{{ asset('assets/image/under_construction.gif') }}" alt="">
                </div>
                <div class="pt-3 flex  justify-center">
                 <button onclick="history.go(-1)" type="submit" class="bg-[#007A43] text-white font-solaimans lg:text-16 xl:text-18 py-1 px-1 xl:py-2 lg:px-2 xl:px-4 flex items-center gap-1">back
                     <span>
                         <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 23 23" fill="none">
                             <path fill-rule="evenodd" clip-rule="evenodd" d="M15.6525 5.68375L15.6662 5.67L17.0275 7.03125V3.9375L16.34 3.25H3.965L3.26375 3.9375V4.61538L3.25 4.625V18.7738L3.745 19.4062L10.62 21.7712L11.5 21.125V19.75H16.34L17.0275 19.0625V15.9688L15.6525 17.3438V18.375H11.5V6.97625L11.0463 6.34375L6.0495 4.625H15.6525V5.68375ZM10.125 20.135L4.625 18.2925V5.615L10.125 7.4575V20.135ZM14.3738 10.8538H21.2075V12.2287H14.4288L16.615 14.4288L15.6388 15.3912L12.2425 12.0087V11.0325L15.6662 7.6225L16.6287 8.585L14.3738 10.8538Z" fill="white"/>
                           </svg>
                     </span>
                 </button>
               </div>
                
                <div class="mt-2 mb-2">
                 <h1 class="text-center text-14 lg:text-16 font-solaimans">কারিগরি সহায়তায় <a href="https://mysoftheaven.com/" target="_blank" class="cursor-pointer underline text-blue-400" >@MysoftHeaven(BD)Ltd</a></h1>
             </div>
        </div>
        
    </div>
</div>
@endsection