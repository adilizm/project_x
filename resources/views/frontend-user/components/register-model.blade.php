 <!-- Register -->
  <div class="min-w-screen h-screen hidden   text-gray-600 fixed  left-0 top-0 flex justify-center items-center inset-0 z-50" 
    id="modal-register-id">
   	<div class="w-full h-full">
           <div class="absolute bg-black opacity-80 inset-0 z-0" onclick="showModelRegister()"></div>
        <div class="w-full  max-w-lg p-5 relative mx-auto mt-4 rounded-xl shadow-lg  bg-white ">
      <!--content-->
          <div class="">
       <!-- body -->
        <div class="text-center p-5 flex-auto justify-center">
            <img src="{{asset('/images/logo/PickBazar.png')}}" alt="" srcset="" class="img-responsive mx-auto" style="max-width: 12rem;">
            <p class="text-center text-sm md:text-base leading-relaxed px-2 sm:px-0 text-gray-600 mt-4 sm:mt-5 mb-7 sm:mb-10">By signing up, you agree to our
                <span class="mx-1 underline cursor-pointer text-green-600 hover:no-underline">terms</span>&amp;
                <span class="ms-1 underline cursor-pointer text-green-600 hover:no-underline">policy</span>
            </p>
        <form novalidate="">
           <div class="mb-5">
                <div class="flex items-center justify-between mb-2">
                    <label for="password" class="font-semibold text-sm text-gray-600">Name</label>
                </div>
                <input id="email" name="name" type="text" class="px-4 flex items-center w-full appearance-none  text-heading text-sm focus:outline-none  border border-border-base rounded focus:border-green-600 h-12" >
            </div>
            <div class="mb-5">
                <div class="flex items-center justify-between mb-2">
                    <label for="password" class="font-semibold text-sm text-gray-600">E-mail</label>
                </div>
                <input id="email" name="email" type="email" class="px-4 flex items-center w-full appearance-none  text-heading text-sm focus:outline-none  border border-border-base rounded focus:border-green-600 h-12" >
            </div>
            <div class="mb-5">
                <div class="flex items-center justify-between mb-2">
                    <label for="password" class="font-semibold text-sm text-gray-600">Password</label>
                </div>
                <div class="relative">
                    <input id="password" name="password" type="password" class="px-4 flex items-center w-full appearance-none  text-heading text-sm focus:outline-none  border border-border-base rounded focus:border-green-600 h-12" >
                    <label for="password" class="absolute right-4 top-5 -mt-2 text-gray-600 cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                    </label>
                </div>
            </div>
            <div class="mt-8">
                        <button data-variant="normal" class="inline-flex items-center justify-center flex-shrink-0 font-semibold leading-none rounded outline-none transition duration-300 ease-in-out focus:outline-none focus:shadow focus:ring-1 focus:ring-green-600 bg-green-600 text-white border border-transparent hover:bg-green-600-hover px-5 py-0 h-12 w-full h-12">Register</button>
            </div>
        </form> 
             

                            
        </div>
        <!-- footer -->
        <div class="flex flex-col items-center justify-center relative text-sm text-heading mt-8 sm:mt-11 mb-6 sm:mb-8"><hr class="w-full"><span class="absolute start-2/4 -top-2.5 px-2 -ms-4 bg-white">Or</span></div>
         <div class="text-sm sm:text-base text-gray-600 text-center">Already have an account? 
             <button onclick="showModelLogin()" class="underline text-green-600 font-semibold transition-colors duration-200 focus:outline-none hover:text-green-hover focus:text-green-hover hover:no-underline focus:no-underline">Login
             </button>
            </div>
         
         
      </div>
        </div>
    </div>
  </div>

<script type="text/javascript">
   function showModelRegister() {
        var elementRegister = document.getElementById("modal-register-id");
        var elementLogin = document.getElementById("modal-login-id");
        if(!elementLogin.classList.contains("hidden"))elementLogin.classList.toggle("hidden");
        elementRegister.classList.toggle("hidden");
      }
</script>