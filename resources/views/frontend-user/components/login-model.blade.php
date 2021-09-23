<div class="min-w-screen h-screen hidden animated fadeIn faster  text-gray-600 fixed  left-0 top-0 flex justify-center items-center inset-0 z-50 outline-none focus:outline-none bg-no-repeat bg-center bg-cover" 
    id="modal-login-id">
   	<div class="w-full h-full overflow-auto ">
           <div class="absolute bg-black opacity-80 inset-0 z-0" onclick="showModelLogin()"></div>
    <div class="w-full  max-w-lg p-5 relative mx-auto mt-4 rounded-xl shadow-lg  bg-white ">
      
          <div class="">
           <form method="POST" action="{{ route('login',app()->getLocale()) }}">
            @csrf
        <div class="text-center p-5 flex-auto justify-center">
            <img src="{{asset('/images/logo/PickBazar.png')}}" alt="" srcset="" class="img-responsive mx-auto" style="max-width: 12rem;">
            <h2 class="text-center text-sm md:text-base mt-4 sm:mt-5 mb-8 sm:mb-10">Login with your email & password</h3>
                <div class="mb-5 grid justify-items-start mb-5">
                    <label for="email" class="text-left mb-3">Email</label>
                    <input id="email" name="email" type="email" class="px-4  w-full   border border-border-base rounded-md focus:border-accent h-12">
                </div>
                <div class="mb-5">
                    <div class="flex items-center justify-between">
                        <label for="password" class="mb-3">Password</label>
                        <button type="button" class="text-xs text-green-600 transition-colors duration-200 focus:outline-none focus:text-green-600 focus:font-semibold hover:text-green-hover">Forgot password?</button>
                    </div>
                    <div class="relative">
                        <input id="password" name="password" type="password" class="px-4  w-full   border border-border-base rounded-md focus:border-green h-12" placeholder="************">
                        <label for="password" class="absolute right-4 top-5 -mt-2 cursor-pointer text-black">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                        </label>
                    </div>
                </div>

                            
        </div>
        
        <div class="px-3  mx-2 text-center space-x-4 md:block">
            <button type="submit" class="w-full bg-green-600 text-white py-3 rounded-md">
                Login
            </button>
            <div class="flex flex-col items-center justify-center relative text-sm text-heading mt-8 sm:mt-11 mb-6 sm:mb-8">
                <hr class="w-full"><span class="absolute start-2/4 -top-2.5 px-2 -ms-4 bg-white">Or</span></div>
        </div>
        </form>
         <div class="px-3  mx-2 my-2">
            <a href="{{route('login_github',app()->getLocale())}}" class="w-full bg-blue-600 text-white py-3 rounded-md flex justify-center items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="19.986" height="20.39" viewBox="0 0 19.986 20.39" class="w-4 h-4 me-3">
                        <path data-name="Path 2" d="M10.195 20.39c5.883 0 9.791-4.13 9.791-9.958a8.711 8.711 0 00-.166-1.7H10.2v3.5h5.787a5.522 5.522 0 01-5.787 4.402 6.441 6.441 0 010-12.88 5.727 5.727 0 014.062 1.571l2.764-2.655A9.749 9.749 0 0010.195 0a10.195 10.195 0 000 20.39z" fill="currentColor">

                        </path></svg><span class="ml-2">Login with Google</span>
            </a>
                
        </div>
         <div class="px-3  mx-2 my-2">
            <button class="w-full bg-gray-600 text-white py-3 rounded-md flex justify-center items-center">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 27.442 27.442" class="h-5 me-2 text-white" fill="currentColor">
                                <path d="M19.494 0H7.948a1.997 1.997 0 00-1.997 1.999v23.446c0 1.102.892 1.997 1.997 1.997h11.546a1.998 1.998 0 001.997-1.997V1.999A1.999 1.999 0 0019.494 0zm-8.622 1.214h5.7c.144 0 .261.215.261.481s-.117.482-.261.482h-5.7c-.145 0-.26-.216-.26-.482s.115-.481.26-.481zm2.85 24.255a1.275 1.275 0 110-2.55 1.275 1.275 0 010 2.55zm6.273-4.369H7.448V3.373h12.547V21.1z">

                                </path>
            </svg><span class="ml-2">Login with Mobile number</span>
            </button>
                
        </div>
         
        <div class="flex flex-col items-center justify-center relative text-sm text-heading mt-8 sm:mt-11 mb-6 sm:mb-8"><hr class="w-full"></div>
        <div class="text-sm sm:text-base text-gray-600 text-center">Don't have any account? 
            <button onclick="showModelRegister()" class="ms-1 underline text-green-600 font-semibold transition-colors duration-200 focus:outline-none hover:text-accent-hover focus:text-accent-hover hover:no-underline focus:no-underline">Register</button></div>
      </div>
        </div>
       </div>
</div>
<script type="text/javascript">
  function showModelLogin() {
        var elementLogin = document.getElementById("modal-login-id");
         var elementRegister = document.getElementById("modal-register-id");
         if(!elementRegister.classList.contains("hidden"))elementRegister.classList.toggle("hidden");
        elementLogin.classList.toggle("hidden");
      }
</script>