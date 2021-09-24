@extends('frontend-user.profile.index')
@section('user-section')


{{-- <div class="w-full hidden overflow-hidden lg:flex">
   <div class="pe-5 lg:pe-8 w-full md:w-1/3" style="height: calc(-60px + 100vh);">
      <div class="flex flex-col h-full pb-5 md:border md:border-border-200">
         <h3 class="text-xl font-semibold py-5 text-heading px-5">My Orders</h3>
         <div class="os-host os-host-foreign os-theme-thin-dark w-full os-host-overflow os-host-overflow-y os-host-resize-disabled os-host-scrollbar-horizontal-hidden os-host-transition" style="height: calc(100% - 80px);">
            <div class="os-resize-observer-host observed">
               <div class="os-resize-observer" style="left: 0px; right: auto;"></div>
            </div>
            <div class="os-size-auto-observer observed" style="height: calc(100% + 1px); float: left;">
               <div class="os-resize-observer"></div>
            </div>
            <div class="os-content-glue" style="margin: 0px; width: 278px; height: 435px;"></div>
            <div class="os-padding">
               <div class="os-viewport os-viewport-native-scrollbars-invisible" style="overflow-y: scroll;">
                  <div class="os-content" style="padding: 0px; height: 100%; width: 100%;">
                     <div class="px-5">
                        <div role="button" class="bg-gray-100 rounded overflow-hidden w-full flex flex-shrink-0 flex-col mb-4 border-2 border-transparent cursor-pointer last:mb-0 !border-green-600">
                           <div class="flex justify-between items-center border-b border-border-200 py-3 px-5 md:px-3 lg:px-5 "><span class="flex font-bold text-sm lg:text-base text-heading mr-4 flex-shrink-0">Order<span class="font-normal">#2027</span></span><span class="text-sm text-blue-500 bg-blue-100 px-3 py-2 rounded whitespace-nowrap truncate max-w-full" title="Order Received">Order Received</span></div>
                           <div class="flex flex-col p-5 md:p-3 lg:px-4 lg:py-5">
                              <p class="text-sm text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Order Date</span><span class="me-auto">:</span><span class="ml-1">September 24, 2021</span></p>
                              <p class="text-sm text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Delivery Time</span><span class="me-auto">:</span><span class="ml-1 truncate">Express Delivery</span></p>
                              <p class="text-sm font-bold text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Amount</span><span class="me-auto">:</span><span class="ml-1">$4.60</span></p>
                              <p class="text-sm font-bold text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Total Price</span><span class="me-auto">:</span><span class="ml-1">$54.69</span></p>
                           </div>
                        </div>
                        <div role="button" class="bg-gray-100 rounded overflow-hidden w-full flex flex-shrink-0 flex-col mb-4 border-2 border-transparent cursor-pointer last:mb-0">
                           <div class="flex justify-between items-center border-b border-border-200 py-3 px-5 md:px-3 lg:px-5 "><span class="flex font-bold text-sm lg:text-base text-heading mr-4 flex-shrink-0">Order<span class="font-normal">#2025</span></span><span class="text-sm text-blue-500 bg-blue-100 px-3 py-2 rounded whitespace-nowrap truncate max-w-full" title="Order Received">Order Received</span></div>
                           <div class="flex flex-col p-5 md:p-3 lg:px-4 lg:py-5">
                              <p class="text-sm text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Order Date</span><span class="me-auto">:</span><span class="ml-1">September 24, 2021</span></p>
                              <p class="text-sm text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Delivery Time</span><span class="me-auto">:</span><span class="ml-1 truncate">Evening</span></p>
                              <p class="text-sm font-bold text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Amount</span><span class="me-auto">:</span><span class="ml-1">$3.20</span></p>
                              <p class="text-sm font-bold text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Total Price</span><span class="me-auto">:</span><span class="ml-1">$53.26</span></p>
                           </div>
                        </div>
                        <div role="button" class="bg-gray-100 rounded overflow-hidden w-full flex flex-shrink-0 flex-col mb-4 border-2 border-transparent cursor-pointer last:mb-0">
                           <div class="flex justify-between items-center border-b border-border-200 py-3 px-5 md:px-3 lg:px-5 "><span class="flex font-bold text-sm lg:text-base text-heading mr-4 flex-shrink-0">Order<span class="font-normal">#2023</span></span><span class="text-sm text-blue-500 bg-blue-100 px-3 py-2 rounded whitespace-nowrap truncate max-w-full" title="Order Received">Order Received</span></div>
                           <div class="flex flex-col p-5 md:p-3 lg:px-4 lg:py-5">
                              <p class="text-sm text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Order Date</span><span class="me-auto">:</span><span class="ml-1">September 24, 2021</span></p>
                              <p class="text-sm text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Delivery Time</span><span class="me-auto">:</span><span class="ml-1 truncate">Express Delivery</span></p>
                              <p class="text-sm font-bold text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Amount</span><span class="me-auto">:</span><span class="ml-1">$8.50</span></p>
                              <p class="text-sm font-bold text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Total Price</span><span class="me-auto">:</span><span class="ml-1">$58.67</span></p>
                           </div>
                        </div>
                        <div role="button" class="bg-gray-100 rounded overflow-hidden w-full flex flex-shrink-0 flex-col mb-4 border-2 border-transparent cursor-pointer last:mb-0">
                           <div class="flex justify-between items-center border-b border-border-200 py-3 px-5 md:px-3 lg:px-5 "><span class="flex font-bold text-sm lg:text-base text-heading mr-4 flex-shrink-0">Order<span class="font-normal">#2021</span></span><span class="text-sm text-blue-500 bg-blue-100 px-3 py-2 rounded whitespace-nowrap truncate max-w-full" title="Order Received">Order Received</span></div>
                           <div class="flex flex-col p-5 md:p-3 lg:px-4 lg:py-5">
                              <p class="text-sm text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Order Date</span><span class="me-auto">:</span><span class="ml-1">September 24, 2021</span></p>
                              <p class="text-sm text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Delivery Time</span><span class="me-auto">:</span><span class="ml-1 truncate">90 min express delivery</span></p>
                              <p class="text-sm font-bold text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Amount</span><span class="me-auto">:</span><span class="ml-1">$27.00</span></p>
                              <p class="text-sm font-bold text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Total Price</span><span class="me-auto">:</span><span class="ml-1">$77.54</span></p>
                           </div>
                        </div>
                        <div role="button" class="bg-gray-100 rounded overflow-hidden w-full flex flex-shrink-0 flex-col mb-4 border-2 border-transparent cursor-pointer last:mb-0">
                           <div class="flex justify-between items-center border-b border-border-200 py-3 px-5 md:px-3 lg:px-5 "><span class="flex font-bold text-sm lg:text-base text-heading mr-4 flex-shrink-0">Order<span class="font-normal">#2019</span></span><span class="text-sm text-blue-500 bg-blue-100 px-3 py-2 rounded whitespace-nowrap truncate max-w-full" title="Order Received">Order Received</span></div>
                           <div class="flex flex-col p-5 md:p-3 lg:px-4 lg:py-5">
                              <p class="text-sm text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Order Date</span><span class="me-auto">:</span><span class="ml-1">September 24, 2021</span></p>
                              <p class="text-sm text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Delivery Time</span><span class="me-auto">:</span><span class="ml-1 truncate">90 min express delivery</span></p>
                              <p class="text-sm font-bold text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Amount</span><span class="me-auto">:</span><span class="ml-1">$27.00</span></p>
                              <p class="text-sm font-bold text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Total Price</span><span class="me-auto">:</span><span class="ml-1">$77.54</span></p>
                           </div>
                        </div>
                        <div role="button" class="bg-gray-100 rounded overflow-hidden w-full flex flex-shrink-0 flex-col mb-4 border-2 border-transparent cursor-pointer last:mb-0">
                           <div class="flex justify-between items-center border-b border-border-200 py-3 px-5 md:px-3 lg:px-5 "><span class="flex font-bold text-sm lg:text-base text-heading mr-4 flex-shrink-0">Order<span class="font-normal">#2017</span></span><span class="text-sm text-blue-500 bg-blue-100 px-3 py-2 rounded whitespace-nowrap truncate max-w-full" title="Order Received">Order Received</span></div>
                           <div class="flex flex-col p-5 md:p-3 lg:px-4 lg:py-5">
                              <p class="text-sm text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Order Date</span><span class="me-auto">:</span><span class="ml-1">September 24, 2021</span></p>
                              <p class="text-sm text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Delivery Time</span><span class="me-auto">:</span><span class="ml-1 truncate">Express Delivery</span></p>
                              <p class="text-sm font-bold text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Amount</span><span class="me-auto">:</span><span class="ml-1">$18.00</span></p>
                              <p class="text-sm font-bold text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Total Price</span><span class="me-auto">:</span><span class="ml-1">$68.36</span></p>
                           </div>
                        </div>
                        <div role="button" class="bg-gray-100 rounded overflow-hidden w-full flex flex-shrink-0 flex-col mb-4 border-2 border-transparent cursor-pointer last:mb-0">
                           <div class="flex justify-between items-center border-b border-border-200 py-3 px-5 md:px-3 lg:px-5 "><span class="flex font-bold text-sm lg:text-base text-heading mr-4 flex-shrink-0">Order<span class="font-normal">#2015</span></span><span class="text-sm text-blue-500 bg-blue-100 px-3 py-2 rounded whitespace-nowrap truncate max-w-full" title="Order Received">Order Received</span></div>
                           <div class="flex flex-col p-5 md:p-3 lg:px-4 lg:py-5">
                              <p class="text-sm text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Order Date</span><span class="me-auto">:</span><span class="ml-1">September 24, 2021</span></p>
                              <p class="text-sm text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Delivery Time</span><span class="me-auto">:</span><span class="ml-1 truncate">Express Delivery</span></p>
                              <p class="text-sm font-bold text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Amount</span><span class="me-auto">:</span><span class="ml-1">$35.00</span></p>
                              <p class="text-sm font-bold text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Total Price</span><span class="me-auto">:</span><span class="ml-1">$85.70</span></p>
                           </div>
                        </div>
                        <div role="button" class="bg-gray-100 rounded overflow-hidden w-full flex flex-shrink-0 flex-col mb-4 border-2 border-transparent cursor-pointer last:mb-0">
                           <div class="flex justify-between items-center border-b border-border-200 py-3 px-5 md:px-3 lg:px-5 "><span class="flex font-bold text-sm lg:text-base text-heading mr-4 flex-shrink-0">Order<span class="font-normal">#2013</span></span><span class="text-sm text-blue-500 bg-blue-100 px-3 py-2 rounded whitespace-nowrap truncate max-w-full" title="Order Received">Order Received</span></div>
                           <div class="flex flex-col p-5 md:p-3 lg:px-4 lg:py-5">
                              <p class="text-sm text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Order Date</span><span class="me-auto">:</span><span class="ml-1">September 24, 2021</span></p>
                              <p class="text-sm text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Delivery Time</span><span class="me-auto">:</span><span class="ml-1 truncate">Morning</span></p>
                              <p class="text-sm font-bold text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Amount</span><span class="me-auto">:</span><span class="ml-1">$270.00</span></p>
                              <p class="text-sm font-bold text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Total Price</span><span class="me-auto">:</span><span class="ml-1">$325.40</span></p>
                           </div>
                        </div>
                        <div role="button" class="bg-gray-100 rounded overflow-hidden w-full flex flex-shrink-0 flex-col mb-4 border-2 border-transparent cursor-pointer last:mb-0">
                           <div class="flex justify-between items-center border-b border-border-200 py-3 px-5 md:px-3 lg:px-5 "><span class="flex font-bold text-sm lg:text-base text-heading mr-4 flex-shrink-0">Order<span class="font-normal">#2011</span></span><span class="text-sm text-blue-500 bg-blue-100 px-3 py-2 rounded whitespace-nowrap truncate max-w-full" title="Order Received">Order Received</span></div>
                           <div class="flex flex-col p-5 md:p-3 lg:px-4 lg:py-5">
                              <p class="text-sm text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Order Date</span><span class="me-auto">:</span><span class="ml-1">September 24, 2021</span></p>
                              <p class="text-sm text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Delivery Time</span><span class="me-auto">:</span><span class="ml-1 truncate">Morning</span></p>
                              <p class="text-sm font-bold text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Amount</span><span class="me-auto">:</span><span class="ml-1">$270.00</span></p>
                              <p class="text-sm font-bold text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Total Price</span><span class="me-auto">:</span><span class="ml-1">$325.40</span></p>
                           </div>
                        </div>
                        <div role="button" class="bg-gray-100 rounded overflow-hidden w-full flex flex-shrink-0 flex-col mb-4 border-2 border-transparent cursor-pointer last:mb-0">
                           <div class="flex justify-between items-center border-b border-border-200 py-3 px-5 md:px-3 lg:px-5 "><span class="flex font-bold text-sm lg:text-base text-heading mr-4 flex-shrink-0">Order<span class="font-normal">#2009</span></span><span class="text-sm text-blue-500 bg-blue-100 px-3 py-2 rounded whitespace-nowrap truncate max-w-full" title="Order Received">Order Received</span></div>
                           <div class="flex flex-col p-5 md:p-3 lg:px-4 lg:py-5">
                              <p class="text-sm text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Order Date</span><span class="me-auto">:</span><span class="ml-1">September 24, 2021</span></p>
                              <p class="text-sm text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Delivery Time</span><span class="me-auto">:</span><span class="ml-1 truncate">Express Delivery</span></p>
                              <p class="text-sm font-bold text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Amount</span><span class="me-auto">:</span><span class="ml-1">$12.20</span></p>
                              <p class="text-sm font-bold text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Total Price</span><span class="me-auto">:</span><span class="ml-1">$62.44</span></p>
                           </div>
                        </div>
                        <div role="button" class="bg-gray-100 rounded overflow-hidden w-full flex flex-shrink-0 flex-col mb-4 border-2 border-transparent cursor-pointer last:mb-0">
                           <div class="flex justify-between items-center border-b border-border-200 py-3 px-5 md:px-3 lg:px-5 "><span class="flex font-bold text-sm lg:text-base text-heading mr-4 flex-shrink-0">Order<span class="font-normal">#2007</span></span><span class="text-sm text-blue-500 bg-blue-100 px-3 py-2 rounded whitespace-nowrap truncate max-w-full" title="Order Received">Order Received</span></div>
                           <div class="flex flex-col p-5 md:p-3 lg:px-4 lg:py-5">
                              <p class="text-sm text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Order Date</span><span class="me-auto">:</span><span class="ml-1">September 24, 2021</span></p>
                              <p class="text-sm text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Delivery Time</span><span class="me-auto">:</span><span class="ml-1 truncate">Express Delivery</span></p>
                              <p class="text-sm font-bold text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Amount</span><span class="me-auto">:</span><span class="ml-1">$27.60</span></p>
                              <p class="text-sm font-bold text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Total Price</span><span class="me-auto">:</span><span class="ml-1">$78.15</span></p>
                           </div>
                        </div>
                        <div role="button" class="bg-gray-100 rounded overflow-hidden w-full flex flex-shrink-0 flex-col mb-4 border-2 border-transparent cursor-pointer last:mb-0">
                           <div class="flex justify-between items-center border-b border-border-200 py-3 px-5 md:px-3 lg:px-5 "><span class="flex font-bold text-sm lg:text-base text-heading mr-4 flex-shrink-0">Order<span class="font-normal">#2005</span></span><span class="text-sm text-blue-500 bg-blue-100 px-3 py-2 rounded whitespace-nowrap truncate max-w-full" title="Order Received">Order Received</span></div>
                           <div class="flex flex-col p-5 md:p-3 lg:px-4 lg:py-5">
                              <p class="text-sm text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Order Date</span><span class="me-auto">:</span><span class="ml-1">September 24, 2021</span></p>
                              <p class="text-sm text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Delivery Time</span><span class="me-auto">:</span><span class="ml-1 truncate">Morning</span></p>
                              <p class="text-sm font-bold text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Amount</span><span class="me-auto">:</span><span class="ml-1">$660.00</span></p>
                              <p class="text-sm font-bold text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Total Price</span><span class="me-auto">:</span><span class="ml-1">$723.20</span></p>
                           </div>
                        </div>
                        <div role="button" class="bg-gray-100 rounded overflow-hidden w-full flex flex-shrink-0 flex-col mb-4 border-2 border-transparent cursor-pointer last:mb-0">
                           <div class="flex justify-between items-center border-b border-border-200 py-3 px-5 md:px-3 lg:px-5 "><span class="flex font-bold text-sm lg:text-base text-heading mr-4 flex-shrink-0">Order<span class="font-normal">#2003</span></span><span class="text-sm text-blue-500 bg-blue-100 px-3 py-2 rounded whitespace-nowrap truncate max-w-full" title="Order Received">Order Received</span></div>
                           <div class="flex flex-col p-5 md:p-3 lg:px-4 lg:py-5">
                              <p class="text-sm text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Order Date</span><span class="me-auto">:</span><span class="ml-1">September 24, 2021</span></p>
                              <p class="text-sm text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Delivery Time</span><span class="me-auto">:</span><span class="ml-1 truncate">Express Delivery</span></p>
                              <p class="text-sm font-bold text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Amount</span><span class="me-auto">:</span><span class="ml-1">$1.60</span></p>
                              <p class="text-sm font-bold text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Total Price</span><span class="me-auto">:</span><span class="ml-1">$51.63</span></p>
                           </div>
                        </div>
                        <div role="button" class="bg-gray-100 rounded overflow-hidden w-full flex flex-shrink-0 flex-col mb-4 border-2 border-transparent cursor-pointer last:mb-0">
                           <div class="flex justify-between items-center border-b border-border-200 py-3 px-5 md:px-3 lg:px-5 "><span class="flex font-bold text-sm lg:text-base text-heading mr-4 flex-shrink-0">Order<span class="font-normal">#2001</span></span><span class="text-sm text-blue-500 bg-blue-100 px-3 py-2 rounded whitespace-nowrap truncate max-w-full" title="Order Received">Order Received</span></div>
                           <div class="flex flex-col p-5 md:p-3 lg:px-4 lg:py-5">
                              <p class="text-sm text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Order Date</span><span class="me-auto">:</span><span class="ml-1">September 24, 2021</span></p>
                              <p class="text-sm text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Delivery Time</span><span class="me-auto">:</span><span class="ml-1 truncate">Express Delivery</span></p>
                              <p class="text-sm font-bold text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Amount</span><span class="me-auto">:</span><span class="ml-1">$1.60</span></p>
                              <p class="text-sm font-bold text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Total Price</span><span class="me-auto">:</span><span class="ml-1">$51.63</span></p>
                           </div>
                        </div>
                        <div role="button" class="bg-gray-100 rounded overflow-hidden w-full flex flex-shrink-0 flex-col mb-4 border-2 border-transparent cursor-pointer last:mb-0">
                           <div class="flex justify-between items-center border-b border-border-200 py-3 px-5 md:px-3 lg:px-5 "><span class="flex font-bold text-sm lg:text-base text-heading mr-4 flex-shrink-0">Order<span class="font-normal">#1999</span></span><span class="text-sm text-blue-500 bg-blue-100 px-3 py-2 rounded whitespace-nowrap truncate max-w-full" title="Order Received">Order Received</span></div>
                           <div class="flex flex-col p-5 md:p-3 lg:px-4 lg:py-5">
                              <p class="text-sm text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Order Date</span><span class="me-auto">:</span><span class="ml-1">September 24, 2021</span></p>
                              <p class="text-sm text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Delivery Time</span><span class="me-auto">:</span><span class="ml-1 truncate">90 min express delivery</span></p>
                              <p class="text-sm font-bold text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Amount</span><span class="me-auto">:</span><span class="ml-1">$4.20</span></p>
                              <p class="text-sm font-bold text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Total Price</span><span class="me-auto">:</span><span class="ml-1">$39.28</span></p>
                           </div>
                        </div>
                        <div role="button" class="bg-gray-100 rounded overflow-hidden w-full flex flex-shrink-0 flex-col mb-4 border-2 border-transparent cursor-pointer last:mb-0">
                           <div class="flex justify-between items-center border-b border-border-200 py-3 px-5 md:px-3 lg:px-5 "><span class="flex font-bold text-sm lg:text-base text-heading mr-4 flex-shrink-0">Order<span class="font-normal">#1997</span></span><span class="text-sm text-blue-500 bg-blue-100 px-3 py-2 rounded whitespace-nowrap truncate max-w-full" title="Order Received">Order Received</span></div>
                           <div class="flex flex-col p-5 md:p-3 lg:px-4 lg:py-5">
                              <p class="text-sm text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Order Date</span><span class="me-auto">:</span><span class="ml-1">September 24, 2021</span></p>
                              <p class="text-sm text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Delivery Time</span><span class="me-auto">:</span><span class="ml-1 truncate">90 min express delivery</span></p>
                              <p class="text-sm font-bold text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Amount</span><span class="me-auto">:</span><span class="ml-1">$20.98</span></p>
                              <p class="text-sm font-bold text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Total Price</span><span class="me-auto">:</span><span class="ml-1">$71.40</span></p>
                           </div>
                        </div>
                        <div role="button" class="bg-gray-100 rounded overflow-hidden w-full flex flex-shrink-0 flex-col mb-4 border-2 border-transparent cursor-pointer last:mb-0">
                           <div class="flex justify-between items-center border-b border-border-200 py-3 px-5 md:px-3 lg:px-5 "><span class="flex font-bold text-sm lg:text-base text-heading mr-4 flex-shrink-0">Order<span class="font-normal">#1995</span></span><span class="text-sm text-blue-500 bg-blue-100 px-3 py-2 rounded whitespace-nowrap truncate max-w-full" title="Order Received">Order Received</span></div>
                           <div class="flex flex-col p-5 md:p-3 lg:px-4 lg:py-5">
                              <p class="text-sm text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Order Date</span><span class="me-auto">:</span><span class="ml-1">September 24, 2021</span></p>
                              <p class="text-sm text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Delivery Time</span><span class="me-auto">:</span><span class="ml-1 truncate">90 min express delivery</span></p>
                              <p class="text-sm font-bold text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Amount</span><span class="me-auto">:</span><span class="ml-1">$4.10</span></p>
                              <p class="text-sm font-bold text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Total Price</span><span class="me-auto">:</span><span class="ml-1">$54.18</span></p>
                           </div>
                        </div>
                        <div role="button" class="bg-gray-100 rounded overflow-hidden w-full flex flex-shrink-0 flex-col mb-4 border-2 border-transparent cursor-pointer last:mb-0">
                           <div class="flex justify-between items-center border-b border-border-200 py-3 px-5 md:px-3 lg:px-5 "><span class="flex font-bold text-sm lg:text-base text-heading mr-4 flex-shrink-0">Order<span class="font-normal">#1992</span></span><span class="text-sm text-blue-500 bg-blue-100 px-3 py-2 rounded whitespace-nowrap truncate max-w-full" title="Order Received">Order Received</span></div>
                           <div class="flex flex-col p-5 md:p-3 lg:px-4 lg:py-5">
                              <p class="text-sm text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Order Date</span><span class="me-auto">:</span><span class="ml-1">September 24, 2021</span></p>
                              <p class="text-sm text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Delivery Time</span><span class="me-auto">:</span><span class="ml-1 truncate">Express Delivery</span></p>
                              <p class="text-sm font-bold text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Amount</span><span class="me-auto">:</span><span class="ml-1">$9.60</span></p>
                              <p class="text-sm font-bold text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Total Price</span><span class="me-auto">:</span><span class="ml-1">$59.79</span></p>
                           </div>
                        </div>
                        <div role="button" class="bg-gray-100 rounded overflow-hidden w-full flex flex-shrink-0 flex-col mb-4 border-2 border-transparent cursor-pointer last:mb-0">
                           <div class="flex justify-between items-center border-b border-border-200 py-3 px-5 md:px-3 lg:px-5 "><span class="flex font-bold text-sm lg:text-base text-heading mr-4 flex-shrink-0">Order<span class="font-normal">#1989</span></span><span class="text-sm text-blue-500 bg-blue-100 px-3 py-2 rounded whitespace-nowrap truncate max-w-full" title="Order Received">Order Received</span></div>
                           <div class="flex flex-col p-5 md:p-3 lg:px-4 lg:py-5">
                              <p class="text-sm text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Order Date</span><span class="me-auto">:</span><span class="ml-1">September 24, 2021</span></p>
                              <p class="text-sm text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Delivery Time</span><span class="me-auto">:</span><span class="ml-1 truncate">Express Delivery</span></p>
                              <p class="text-sm font-bold text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Amount</span><span class="me-auto">:</span><span class="ml-1">$9.60</span></p>
                              <p class="text-sm font-bold text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Total Price</span><span class="me-auto">:</span><span class="ml-1">$59.79</span></p>
                           </div>
                        </div>
                        <div role="button" class="bg-gray-100 rounded overflow-hidden w-full flex flex-shrink-0 flex-col mb-4 border-2 border-transparent cursor-pointer last:mb-0">
                           <div class="flex justify-between items-center border-b border-border-200 py-3 px-5 md:px-3 lg:px-5 "><span class="flex font-bold text-sm lg:text-base text-heading mr-4 flex-shrink-0">Order<span class="font-normal">#1987</span></span><span class="text-sm text-blue-500 bg-blue-100 px-3 py-2 rounded whitespace-nowrap truncate max-w-full" title="Order Received">Order Received</span></div>
                           <div class="flex flex-col p-5 md:p-3 lg:px-4 lg:py-5">
                              <p class="text-sm text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Order Date</span><span class="me-auto">:</span><span class="ml-1">September 24, 2021</span></p>
                              <p class="text-sm text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Delivery Time</span><span class="me-auto">:</span><span class="ml-1 truncate">Noon</span></p>
                              <p class="text-sm font-bold text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Amount</span><span class="me-auto">:</span><span class="ml-1">$1.60</span></p>
                              <p class="text-sm font-bold text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Total Price</span><span class="me-auto">:</span><span class="ml-1">$51.63</span></p>
                           </div>
                        </div>
                        <div role="button" class="bg-gray-100 rounded overflow-hidden w-full flex flex-shrink-0 flex-col mb-4 border-2 border-transparent cursor-pointer last:mb-0">
                           <div class="flex justify-between items-center border-b border-border-200 py-3 px-5 md:px-3 lg:px-5 "><span class="flex font-bold text-sm lg:text-base text-heading mr-4 flex-shrink-0">Order<span class="font-normal">#1985</span></span><span class="text-sm text-blue-500 bg-blue-100 px-3 py-2 rounded whitespace-nowrap truncate max-w-full" title="Order Received">Order Received</span></div>
                           <div class="flex flex-col p-5 md:p-3 lg:px-4 lg:py-5">
                              <p class="text-sm text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Order Date</span><span class="me-auto">:</span><span class="ml-1">September 24, 2021</span></p>
                              <p class="text-sm text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Delivery Time</span><span class="me-auto">:</span><span class="ml-1 truncate">Express Delivery</span></p>
                              <p class="text-sm font-bold text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Amount</span><span class="me-auto">:</span><span class="ml-1">$1.60</span></p>
                              <p class="text-sm font-bold text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Total Price</span><span class="me-auto">:</span><span class="ml-1">$51.63</span></p>
                           </div>
                        </div>
                        <div role="button" class="bg-gray-100 rounded overflow-hidden w-full flex flex-shrink-0 flex-col mb-4 border-2 border-transparent cursor-pointer last:mb-0">
                           <div class="flex justify-between items-center border-b border-border-200 py-3 px-5 md:px-3 lg:px-5 "><span class="flex font-bold text-sm lg:text-base text-heading mr-4 flex-shrink-0">Order<span class="font-normal">#1983</span></span><span class="text-sm text-blue-500 bg-blue-100 px-3 py-2 rounded whitespace-nowrap truncate max-w-full" title="Order Received">Order Received</span></div>
                           <div class="flex flex-col p-5 md:p-3 lg:px-4 lg:py-5">
                              <p class="text-sm text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Order Date</span><span class="me-auto">:</span><span class="ml-1">September 24, 2021</span></p>
                              <p class="text-sm text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Delivery Time</span><span class="me-auto">:</span><span class="ml-1 truncate">Express Delivery</span></p>
                              <p class="text-sm font-bold text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Amount</span><span class="me-auto">:</span><span class="ml-1">$12.50</span></p>
                              <p class="text-sm font-bold text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Total Price</span><span class="me-auto">:</span><span class="ml-1">$62.75</span></p>
                           </div>
                        </div>
                        <div role="button" class="bg-gray-100 rounded overflow-hidden w-full flex flex-shrink-0 flex-col mb-4 border-2 border-transparent cursor-pointer last:mb-0">
                           <div class="flex justify-between items-center border-b border-border-200 py-3 px-5 md:px-3 lg:px-5 "><span class="flex font-bold text-sm lg:text-base text-heading mr-4 flex-shrink-0">Order<span class="font-normal">#1981</span></span><span class="text-sm text-blue-500 bg-blue-100 px-3 py-2 rounded whitespace-nowrap truncate max-w-full" title="Order Received">Order Received</span></div>
                           <div class="flex flex-col p-5 md:p-3 lg:px-4 lg:py-5">
                              <p class="text-sm text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Order Date</span><span class="me-auto">:</span><span class="ml-1">September 24, 2021</span></p>
                              <p class="text-sm text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Delivery Time</span><span class="me-auto">:</span><span class="ml-1 truncate">Noon</span></p>
                              <p class="text-sm font-bold text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Amount</span><span class="me-auto">:</span><span class="ml-1">$10.60</span></p>
                              <p class="text-sm font-bold text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Total Price</span><span class="me-auto">:</span><span class="ml-1">$60.81</span></p>
                           </div>
                        </div>
                        <div role="button" class="bg-gray-100 rounded overflow-hidden w-full flex flex-shrink-0 flex-col mb-4 border-2 border-transparent cursor-pointer last:mb-0">
                           <div class="flex justify-between items-center border-b border-border-200 py-3 px-5 md:px-3 lg:px-5 "><span class="flex font-bold text-sm lg:text-base text-heading mr-4 flex-shrink-0">Order<span class="font-normal">#1979</span></span><span class="text-sm text-blue-500 bg-blue-100 px-3 py-2 rounded whitespace-nowrap truncate max-w-full" title="Order Received">Order Received</span></div>
                           <div class="flex flex-col p-5 md:p-3 lg:px-4 lg:py-5">
                              <p class="text-sm text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Order Date</span><span class="me-auto">:</span><span class="ml-1">September 24, 2021</span></p>
                              <p class="text-sm text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Delivery Time</span><span class="me-auto">:</span><span class="ml-1 truncate">Noon</span></p>
                              <p class="text-sm font-bold text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Amount</span><span class="me-auto">:</span><span class="ml-1">$10.60</span></p>
                              <p class="text-sm font-bold text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Total Price</span><span class="me-auto">:</span><span class="ml-1">$60.81</span></p>
                           </div>
                        </div>
                        <div role="button" class="bg-gray-100 rounded overflow-hidden w-full flex flex-shrink-0 flex-col mb-4 border-2 border-transparent cursor-pointer last:mb-0">
                           <div class="flex justify-between items-center border-b border-border-200 py-3 px-5 md:px-3 lg:px-5 "><span class="flex font-bold text-sm lg:text-base text-heading mr-4 flex-shrink-0">Order<span class="font-normal">#1977</span></span><span class="text-sm text-blue-500 bg-blue-100 px-3 py-2 rounded whitespace-nowrap truncate max-w-full" title="Order Received">Order Received</span></div>
                           <div class="flex flex-col p-5 md:p-3 lg:px-4 lg:py-5">
                              <p class="text-sm text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Order Date</span><span class="me-auto">:</span><span class="ml-1">September 24, 2021</span></p>
                              <p class="text-sm text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Delivery Time</span><span class="me-auto">:</span><span class="ml-1 truncate">Noon</span></p>
                              <p class="text-sm font-bold text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Amount</span><span class="me-auto">:</span><span class="ml-1">$10.60</span></p>
                              <p class="text-sm font-bold text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Total Price</span><span class="me-auto">:</span><span class="ml-1">$60.81</span></p>
                           </div>
                        </div>
                        <div role="button" class="bg-gray-100 rounded overflow-hidden w-full flex flex-shrink-0 flex-col mb-4 border-2 border-transparent cursor-pointer last:mb-0">
                           <div class="flex justify-between items-center border-b border-border-200 py-3 px-5 md:px-3 lg:px-5 "><span class="flex font-bold text-sm lg:text-base text-heading mr-4 flex-shrink-0">Order<span class="font-normal">#1970</span></span><span class="text-sm text-blue-500 bg-blue-100 px-3 py-2 rounded whitespace-nowrap truncate max-w-full" title="Order Received">Order Received</span></div>
                           <div class="flex flex-col p-5 md:p-3 lg:px-4 lg:py-5">
                              <p class="text-sm text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Order Date</span><span class="me-auto">:</span><span class="ml-1">September 24, 2021</span></p>
                              <p class="text-sm text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Delivery Time</span><span class="me-auto">:</span><span class="ml-1 truncate">90 min express delivery</span></p>
                              <p class="text-sm font-bold text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Amount</span><span class="me-auto">:</span><span class="ml-1">$274.75</span></p>
                              <p class="text-sm font-bold text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Total Price</span><span class="me-auto">:</span><span class="ml-1">$310.25</span></p>
                           </div>
                        </div>
                        <div role="button" class="bg-gray-100 rounded overflow-hidden w-full flex flex-shrink-0 flex-col mb-4 border-2 border-transparent cursor-pointer last:mb-0">
                           <div class="flex justify-between items-center border-b border-border-200 py-3 px-5 md:px-3 lg:px-5 "><span class="flex font-bold text-sm lg:text-base text-heading mr-4 flex-shrink-0">Order<span class="font-normal">#1968</span></span><span class="text-sm text-blue-500 bg-blue-100 px-3 py-2 rounded whitespace-nowrap truncate max-w-full" title="Order Received">Order Received</span></div>
                           <div class="flex flex-col p-5 md:p-3 lg:px-4 lg:py-5">
                              <p class="text-sm text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Order Date</span><span class="me-auto">:</span><span class="ml-1">September 24, 2021</span></p>
                              <p class="text-sm text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Delivery Time</span><span class="me-auto">:</span><span class="ml-1 truncate">11.00 AM - 2.00 PM</span></p>
                              <p class="text-sm font-bold text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Amount</span><span class="me-auto">:</span><span class="ml-1">$13.20</span></p>
                              <p class="text-sm font-bold text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Total Price</span><span class="me-auto">:</span><span class="ml-1">$63.46</span></p>
                           </div>
                        </div>
                        <div role="button" class="bg-gray-100 rounded overflow-hidden w-full flex flex-shrink-0 flex-col mb-4 border-2 border-transparent cursor-pointer last:mb-0">
                           <div class="flex justify-between items-center border-b border-border-200 py-3 px-5 md:px-3 lg:px-5 "><span class="flex font-bold text-sm lg:text-base text-heading mr-4 flex-shrink-0">Order<span class="font-normal">#1966</span></span><span class="text-sm text-blue-500 bg-blue-100 px-3 py-2 rounded whitespace-nowrap truncate max-w-full" title="Order Received">Order Received</span></div>
                           <div class="flex flex-col p-5 md:p-3 lg:px-4 lg:py-5">
                              <p class="text-sm text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Order Date</span><span class="me-auto">:</span><span class="ml-1">September 24, 2021</span></p>
                              <p class="text-sm text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Delivery Time</span><span class="me-auto">:</span><span class="ml-1 truncate">11.00 AM - 2.00 PM</span></p>
                              <p class="text-sm font-bold text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Amount</span><span class="me-auto">:</span><span class="ml-1">$13.20</span></p>
                              <p class="text-sm font-bold text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Total Price</span><span class="me-auto">:</span><span class="ml-1">$63.46</span></p>
                           </div>
                        </div>
                        <div role="button" class="bg-gray-100 rounded overflow-hidden w-full flex flex-shrink-0 flex-col mb-4 border-2 border-transparent cursor-pointer last:mb-0">
                           <div class="flex justify-between items-center border-b border-border-200 py-3 px-5 md:px-3 lg:px-5 "><span class="flex font-bold text-sm lg:text-base text-heading mr-4 flex-shrink-0">Order<span class="font-normal">#1964</span></span><span class="text-sm text-blue-500 bg-blue-100 px-3 py-2 rounded whitespace-nowrap truncate max-w-full" title="Order Received">Order Received</span></div>
                           <div class="flex flex-col p-5 md:p-3 lg:px-4 lg:py-5">
                              <p class="text-sm text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Order Date</span><span class="me-auto">:</span><span class="ml-1">September 24, 2021</span></p>
                              <p class="text-sm text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Delivery Time</span><span class="me-auto">:</span><span class="ml-1 truncate">Express Delivery</span></p>
                              <p class="text-sm font-bold text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Amount</span><span class="me-auto">:</span><span class="ml-1">$0.60</span></p>
                              <p class="text-sm font-bold text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Total Price</span><span class="me-auto">:</span><span class="ml-1">$50.61</span></p>
                           </div>
                        </div>
                        <div role="button" class="bg-gray-100 rounded overflow-hidden w-full flex flex-shrink-0 flex-col mb-4 border-2 border-transparent cursor-pointer last:mb-0">
                           <div class="flex justify-between items-center border-b border-border-200 py-3 px-5 md:px-3 lg:px-5 "><span class="flex font-bold text-sm lg:text-base text-heading mr-4 flex-shrink-0">Order<span class="font-normal">#1962</span></span><span class="text-sm text-blue-500 bg-blue-100 px-3 py-2 rounded whitespace-nowrap truncate max-w-full" title="Order Received">Order Received</span></div>
                           <div class="flex flex-col p-5 md:p-3 lg:px-4 lg:py-5">
                              <p class="text-sm text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Order Date</span><span class="me-auto">:</span><span class="ml-1">September 24, 2021</span></p>
                              <p class="text-sm text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Delivery Time</span><span class="me-auto">:</span><span class="ml-1 truncate">Express Delivery</span></p>
                              <p class="text-sm font-bold text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Amount</span><span class="me-auto">:</span><span class="ml-1">$0.60</span></p>
                              <p class="text-sm font-bold text-heading w-full flex justify-between items-center mb-4 last:mb-0"><span class="w-24 overflow-hidden flex-shrink-0">Total Price</span><span class="me-auto">:</span><span class="ml-1">$50.61</span></p>
                           </div>
                        </div>
                        <div class="flex justify-center mt-8 lg:mt-12"><button data-variant="normal" class="inline-flex items-center justify-center flex-shrink-0 font-semibold leading-none rounded outline-none transition duration-300 ease-in-out focus:outline-none focus:shadow focus:ring-1 focus:ring-green-700 bg-green-600 text-pwhite border border-transparent hover:bg-green-600-hover px-5 py-0 h-12 text-sm md:text-base font-semibold h-11">Load More</button></div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="os-scrollbar os-scrollbar-horizontal os-scrollbar-unusable os-scrollbar-auto-hidden">
               <div class="os-scrollbar-track os-scrollbar-track-off">
                  <div class="os-scrollbar-handle" style="width: 100%; transform: translate(0px);"></div>
               </div>
            </div>
            <div class="os-scrollbar os-scrollbar-vertical os-scrollbar-auto-hidden">
               <div class="os-scrollbar-track os-scrollbar-track-off">
                  <div class="os-scrollbar-handle" style="height: 5.34969%; transform: translate(0px);"></div>
               </div>
            </div>
            <div class="os-scrollbar-corner"></div>
         </div>
      </div>
   </div>
   <div class="flex flex-col w-full lg:w-2/3 border border-border-200">
      <div class="flex flex-col md:flex-row items-center md:justify-between p-5 border-b border-border-200">
         <h2 class="flex font-semibold text-sm md:text-xl text-heading mb-2">Order Details <span class="px-2">-</span> zFz7Li7qRb2w</h2>
         <a class="font-semibold text-sm text-green-600 flex items-center transition duration-200 no-underline hover:text-green-600-hover focus:text-green-600-hover" href="/orders/zFz7Li7qRb2w">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" width="20" class="mr-2">
               <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
               <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
            </svg>
            Sub Orders
         </a>
      </div>
      <div class="flex flex-col sm:flex-row border-b border-border-200">
         <div class="w-full md:w-3/5 flex flex-col px-5 py-4 border-b sm:border-b-0 sm:border-r border-border-200">
            <div class="mb-4"><span class="text-sm text-heading font-bold mb-2 block">Shipping Address</span><span class="text-sm text-body">dfg, dfg, dfg, dfg, dfg</span></div>
            <div><span class="text-sm text-heading font-bold mb-2 block">Billing Address</span><span class="text-sm text-body">cxvcxv, vcvxc, cvcx, tytry, cvcx</span></div>
         </div>
         <div class="w-full md:w-2/5 flex flex-col px-5 py-4">
            <div class="flex justify-between mb-3"><span class="text-sm text-body">Sub Total</span><span class="text-sm text-heading">$4.60</span></div>
            <div class="flex justify-between mb-3"><span class="text-sm text-body">Discount</span><span class="text-sm text-heading">$0.00</span></div>
            <div class="flex justify-between mb-3"><span class="text-sm text-body">Delivery Fee</span><span class="text-sm text-heading">$50.00</span></div>
            <div class="flex justify-between mb-3"><span class="text-sm text-body">Tax</span><span class="text-sm text-heading">$0.09</span></div>
            <div class="flex justify-between"><span class="text-sm font-bold text-heading">Total</span><span class="text-sm font-bold text-heading">$54.69</span></div>
         </div>
      </div>
      <div>
         <div class="w-full flex justify-center items-center px-6">
            <div class="os-host os-host-foreign os-theme-thin-dark w-full h-full os-host-overflow os-host-overflow-x os-host-resize-disabled os-host-scrollbar-vertical-hidden os-host-transition">
               <div class="os-resize-observer-host observed">
                  <div class="os-resize-observer" style="left: 0px; right: auto;"></div>
               </div>
               <div class="os-size-auto-observer observed" style="height: calc(100% + 1px); float: left;">
                  <div class="os-resize-observer"></div>
               </div>
               <div class="os-content-glue" style="margin: 0px; height: 180px; width: 574px;"></div>
               <div class="os-padding">
                  <div class="os-viewport os-viewport-native-scrollbars-invisible" style="overflow-x: scroll;">
                     <div class="os-content" style="padding: 0px; height: auto; width: 100%;">
                        <div class="flex flex-col py-7 md:items-start md:justify-start w-full md:flex-row">
                           <div class="progress-box_progress_container__3V3vU">
                              <div class="progress-box_progress_wrapper__36diV progress-box_checked__ZaAO4">
                                 <div class="progress-box_status_wrapper__30B4b">
                                    <div class="w-3 h-4">
                                       <svg xmlns="http://www.w3.org/2000/svg" width="20.894" height="16" viewBox="0 0 20.894 16" class="w-full">
                                          <path data-name="_ionicons_svg_ios-checkmark (3)" d="M169.184,175.473l-1.708-1.756a.367.367,0,0,0-.272-.116.352.352,0,0,0-.272.116l-11.837,11.925-4.308-4.308a.375.375,0,0,0-.543,0l-1.727,1.727a.387.387,0,0,0,0,.553l5.434,5.434a1.718,1.718,0,0,0,1.135.553,1.8,1.8,0,0,0,1.126-.534h.01l12.973-13.041A.415.415,0,0,0,169.184,175.473Z" transform="translate(-148.4 -173.6)" fill="currentColor"></path>
                                       </svg>
                                    </div>
                                 </div>
                                 <div class="progress-box_bar__ReJij"></div>
                              </div>
                              <div class="flex flex-col items-start ml-5 md:items-center md:ms-0"><span class="text-base text-gray-500 capitalize font-semibold text-start md:text-center md:px-2">Order Received</span></div>
                           </div>
                           <div class="progress-box_progress_container__3V3vU">
                              <div class="progress-box_progress_wrapper__36diV">
                                 <div class="progress-box_status_wrapper__30B4b">2</div>
                                 <div class="progress-box_bar__ReJij"></div>
                              </div>
                              <div class="flex flex-col items-start ml-5 md:items-center md:ms-0"><span class="text-base text-gray-500 capitalize font-semibold text-start md:text-center md:px-2">Order Processing</span></div>
                           </div>
                           <div class="progress-box_progress_container__3V3vU">
                              <div class="progress-box_progress_wrapper__36diV">
                                 <div class="progress-box_status_wrapper__30B4b">3</div>
                                 <div class="progress-box_bar__ReJij"></div>
                              </div>
                              <div class="flex flex-col items-start ml-5 md:items-center md:ms-0"><span class="text-base text-gray-500 capitalize font-semibold text-start md:text-center md:px-2">Ready To Dispatch</span></div>
                           </div>
                           <div class="progress-box_progress_container__3V3vU">
                              <div class="progress-box_progress_wrapper__36diV">
                                 <div class="progress-box_status_wrapper__30B4b">4</div>
                                 <div class="progress-box_bar__ReJij"></div>
                              </div>
                              <div class="flex flex-col items-start ml-5 md:items-center md:ms-0"><span class="text-base text-gray-500 capitalize font-semibold text-start md:text-center md:px-2">Order Dispatched</span></div>
                           </div>
                           <div class="progress-box_progress_container__3V3vU">
                              <div class="progress-box_progress_wrapper__36diV">
                                 <div class="progress-box_status_wrapper__30B4b">5</div>
                                 <div class="progress-box_bar__ReJij"></div>
                              </div>
                              <div class="flex flex-col items-start ml-5 md:items-center md:ms-0"><span class="text-base text-gray-500 capitalize font-semibold text-start md:text-center md:px-2">At Local Facility</span></div>
                           </div>
                           <div class="progress-box_progress_container__3V3vU">
                              <div class="progress-box_progress_wrapper__36diV">
                                 <div class="progress-box_status_wrapper__30B4b">6</div>
                                 <div class="progress-box_bar__ReJij"></div>
                              </div>
                              <div class="flex flex-col items-start ml-5 md:items-center md:ms-0"><span class="text-base text-gray-500 capitalize font-semibold text-start md:text-center md:px-2">Out For Delivery</span></div>
                           </div>
                           <div class="progress-box_progress_container__3V3vU">
                              <div class="progress-box_progress_wrapper__36diV">
                                 <div class="progress-box_status_wrapper__30B4b">8</div>
                                 <div class="progress-box_bar__ReJij"></div>
                              </div>
                              <div class="flex flex-col items-start ml-5 md:items-center md:ms-0"><span class="text-base text-gray-500 capitalize font-semibold text-start md:text-center md:px-2">Failed to collect payment</span></div>
                           </div>
                           <div class="progress-box_progress_container__3V3vU">
                              <div class="progress-box_progress_wrapper__36diV">
                                 <div class="progress-box_status_wrapper__30B4b">9</div>
                                 <div class="progress-box_bar__ReJij"></div>
                              </div>
                              <div class="flex flex-col items-start ml-5 md:items-center md:ms-0"><span class="text-base text-gray-500 capitalize font-semibold text-start md:text-center md:px-2">falied to contact Consignee</span></div>
                           </div>
                           <div class="progress-box_progress_container__3V3vU">
                              <div class="progress-box_progress_wrapper__36diV">
                                 <div class="progress-box_status_wrapper__30B4b">10</div>
                                 <div class="progress-box_bar__ReJij"></div>
                              </div>
                              <div class="flex flex-col items-start ml-5 md:items-center md:ms-0"><span class="text-base text-gray-500 capitalize font-semibold text-start md:text-center md:px-2">Shipment Refused by Consignee</span></div>
                           </div>
                           <div class="progress-box_progress_container__3V3vU">
                              <div class="progress-box_progress_wrapper__36diV">
                                 <div class="progress-box_status_wrapper__30B4b">11</div>
                                 <div class="progress-box_bar__ReJij"></div>
                              </div>
                              <div class="flex flex-col items-start ml-5 md:items-center md:ms-0"><span class="text-base text-gray-500 capitalize font-semibold text-start md:text-center md:px-2">Delivered</span></div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="os-scrollbar os-scrollbar-horizontal">
                  <div class="os-scrollbar-track os-scrollbar-track-off">
                     <div class="os-scrollbar-handle" style="width: 39.9861%; transform: translate(0px);"></div>
                  </div>
               </div>
               <div class="os-scrollbar os-scrollbar-vertical os-scrollbar-unusable">
                  <div class="os-scrollbar-track os-scrollbar-track-off">
                     <div class="os-scrollbar-handle" style="height: 100%; transform: translate(0px);"></div>
                  </div>
               </div>
               <div class="os-scrollbar-corner"></div>
            </div>
         </div>
         <div class="rc-table orderDetailsTable w-full rc-table-fixed-header rc-table-scroll-horizontal">
            <div class="rc-table-container">
               <div style="overflow: hidden;" class="rc-table-header">
                  <table style="table-layout: fixed;">
                     <colgroup>
                        <col style="width: 340px;">
                        <col style="width: 136px;">
                        <col style="width: 136px;">
                        <col style="width: 12px;">
                     </colgroup>
                     <thead class="rc-table-thead">
                        <tr>
                           <th title="Item" class="rc-table-cell rc-table-cell-ellipsis" style="text-align: left;"><span class="ps-20">Item</span></th>
                           <th class="rc-table-cell" style="text-align: center;">Quantity</th>
                           <th class="rc-table-cell" style="text-align: right;">Price</th>
                           <th class="rc-table-cell rc-table-cell-scrollbar"></th>
                        </tr>
                     </thead>
                  </table>
               </div>
               <div style="overflow: auto scroll; max-height: 500px;" class="rc-table-body">
                  <table style="width: 350px; min-width: 100%; table-layout: fixed;">
                     <colgroup>
                        <col style="width: 250px;">
                        <col style="width: 100px;">
                        <col style="width: 100px;">
                     </colgroup>
                     <tbody class="rc-table-tbody">
                        <tr aria-hidden="true" class="rc-table-measure-row" style="height: 0px; font-size: 0px;">
                           <td style="padding: 0px; border: 0px none; height: 0px;">
                              <div style="height: 0px; overflow: hidden;">&nbsp;</div>
                           </td>
                           <td style="padding: 0px; border: 0px none; height: 0px;">
                              <div style="height: 0px; overflow: hidden;">&nbsp;</div>
                           </td>
                           <td style="padding: 0px; border: 0px none; height: 0px;">
                              <div style="height: 0px; overflow: hidden;">&nbsp;</div>
                           </td>
                        </tr>
                        <tr data-row-key="2021-03-08T10:24:53.000000Z" class="rc-table-row rc-table-row-level-0">
                           <td class="rc-table-cell rc-table-cell-ellipsis" style="text-align: left;">
                              <div class="flex items-center">
                                 <div class="w-16 h-16 flex flex-shrink-0 rounded overflow-hidden relative">
                                    <div style="display: block; overflow: hidden; position: absolute; inset: 0px; box-sizing: border-box; margin: 0px;"><img alt="Apples" sizes="100vw" srcset="/_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F1%2Fconversions%2FApples-thumbnail.jpg&amp;w=640&amp;q=75 640w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F1%2Fconversions%2FApples-thumbnail.jpg&amp;w=750&amp;q=75 750w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F1%2Fconversions%2FApples-thumbnail.jpg&amp;w=828&amp;q=75 828w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F1%2Fconversions%2FApples-thumbnail.jpg&amp;w=1080&amp;q=75 1080w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F1%2Fconversions%2FApples-thumbnail.jpg&amp;w=1200&amp;q=75 1200w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F1%2Fconversions%2FApples-thumbnail.jpg&amp;w=1920&amp;q=75 1920w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F1%2Fconversions%2FApples-thumbnail.jpg&amp;w=2048&amp;q=75 2048w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F1%2Fconversions%2FApples-thumbnail.jpg&amp;w=3840&amp;q=75 3840w" src="/_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F1%2Fconversions%2FApples-thumbnail.jpg&amp;w=3840&amp;q=75" decoding="async" data-nimg="true" class="w-full h-full object-cover" style="position: absolute; inset: 0px; box-sizing: border-box; padding: 0px; border: medium none; margin: auto; display: block; width: 0px; height: 0px; min-width: 100%; max-width: 100%; min-height: 100%; max-height: 100%;"></div>
                                 </div>
                                 <div class="flex flex-col ml-4 overflow-hidden">
                                    <div class="flex mb-1"><span class="text-sm text-body truncate inline-block overflow-hidden">Apples x&nbsp;</span><span class="text-sm text-heading font-semibold truncate inline-block overflow-hidden">1lb</span></div>
                                    <span class="text-sm text-green-600 font-semibold mb-1 truncate inline-block overflow-hidden">$1.60</span>
                                 </div>
                              </div>
                           </td>
                           <td class="rc-table-cell" style="text-align: center;">
                              <p class="text-base">1</p>
                           </td>
                           <td class="rc-table-cell" style="text-align: right;">
                              <p>$1.60</p>
                           </td>
                        </tr>
                        <tr data-row-key="2021-03-08T10:26:13.000000Z" class="rc-table-row rc-table-row-level-0">
                           <td class="rc-table-cell rc-table-cell-ellipsis" style="text-align: left;">
                              <div class="flex items-center">
                                 <div class="w-16 h-16 flex flex-shrink-0 rounded overflow-hidden relative">
                                    <div style="display: block; overflow: hidden; position: absolute; inset: 0px; box-sizing: border-box; margin: 0px;"><img alt="Baby Spinach" sizes="100vw" srcset="/_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F2%2Fconversions%2FBabySpinach-thumbnail.jpg&amp;w=640&amp;q=75 640w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F2%2Fconversions%2FBabySpinach-thumbnail.jpg&amp;w=750&amp;q=75 750w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F2%2Fconversions%2FBabySpinach-thumbnail.jpg&amp;w=828&amp;q=75 828w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F2%2Fconversions%2FBabySpinach-thumbnail.jpg&amp;w=1080&amp;q=75 1080w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F2%2Fconversions%2FBabySpinach-thumbnail.jpg&amp;w=1200&amp;q=75 1200w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F2%2Fconversions%2FBabySpinach-thumbnail.jpg&amp;w=1920&amp;q=75 1920w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F2%2Fconversions%2FBabySpinach-thumbnail.jpg&amp;w=2048&amp;q=75 2048w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F2%2Fconversions%2FBabySpinach-thumbnail.jpg&amp;w=3840&amp;q=75 3840w" src="/_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F2%2Fconversions%2FBabySpinach-thumbnail.jpg&amp;w=3840&amp;q=75" decoding="async" data-nimg="true" class="w-full h-full object-cover" style="position: absolute; inset: 0px; box-sizing: border-box; padding: 0px; border: medium none; margin: auto; display: block; width: 0px; height: 0px; min-width: 100%; max-width: 100%; min-height: 100%; max-height: 100%;"></div>
                                 </div>
                                 <div class="flex flex-col ml-4 overflow-hidden">
                                    <div class="flex mb-1"><span class="text-sm text-body truncate inline-block overflow-hidden">Baby Spinach x&nbsp;</span><span class="text-sm text-heading font-semibold truncate inline-block overflow-hidden">2lb</span></div>
                                    <span class="text-sm text-green-600 font-semibold mb-1 truncate inline-block overflow-hidden">$0.60</span>
                                 </div>
                              </div>
                           </td>
                           <td class="rc-table-cell" style="text-align: center;">
                              <p class="text-base">5</p>
                           </td>
                           <td class="rc-table-cell" style="text-align: right;">
                              <p>$3.00</p>
                           </td>
                        </tr>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</div> --}}


@endsection