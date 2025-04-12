<script setup>
import { RouterLink } from 'vue-router'
</script>
<template>
  <footer class="px-4 bg-[#141718] pt-[80px] pb-[32px]">
    <div class="max-w-[1121px] w-full mx-auto space-y-[49px]">
      <div class="w-full flex items-center justify-between">
        <div class="flex items-center space-x-[32px]">
          <p class="text-[24px] leading-[24px] font-semibold text-white">3legant.</p>
          <div class="h-[24px] w-[1px] bg-[#6C7275]"></div>
          <p class="text-[14px] text-[#E8ECEF] leading-[22px]">Gift & Decoration Store</p>
        </div>
        <div class="flex items-center space-x-[40px]">
          <RouterLink to="/" class="text-[14px] leading-[24px] font-medium text-[#FEFEFE]"
            >Home</RouterLink
          >
          <RouterLink to="/" class="text-[14px] leading-[24px] font-medium text-[#FEFEFE]"
            >Shop</RouterLink
          >
          <RouterLink to="/" class="text-[14px] leading-[24px] font-medium text-[#FEFEFE]"
            >Product</RouterLink
          >
          <RouterLink to="/" class="text-[14px] leading-[24px] font-medium text-[#FEFEFE]"
            >Contact Us</RouterLink
          >
        </div>
      </div>
      <div
        class="w-full flex items-center justify-between py-4 border-t-[0.5px] border-solid border-[#6C7275]"
      >
        <div class="flex items-center space-x-[28px]">
          <p class="text-[12px] leading-[20px] text-[#E8ECEF]">
            Copyright © 2023 3legant. All rights reserved
          </p>
          <div class="flex items-center space-x-[28px]">
            <RouterLink to="/" class="text-[14px] leading-[24px] font-medium text-[#FEFEFE]"
              >Privacy Policy</RouterLink
            >
            <RouterLink to="/" class="text-[14px] leading-[24px] font-medium text-[#FEFEFE]"
              >Terms of Use</RouterLink
            >
          </div>
        </div>
        <div class="flex items-center space-x-6">
          <RouterLink to="/"
            ><svg
              class="vector"
              width="20"
              height="20"
              viewBox="0 0 20 20"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M17 4C17 4.55228 16.5523 5 16 5C15.4477 5 15 4.55228 15 4C15 3.44772 15.4477 3 16 3C16.5523 3 17 3.44772 17 4Z"
                fill="#FEFEFE"
              />
              <path
                d="M0 4C0 1.79086 1.79086 0 4 0H16C18.2091 0 20 1.79086 20 4V16C20 18.2091 18.2091 20 16 20H4C1.79086 20 0 18.2091 0 16V4Z"
                stroke="#FEFEFE"
                stroke-width="1.5"
              />
              <path
                d="M17 4C17 4.55228 16.5523 5 16 5C15.4477 5 15 4.55228 15 4C15 3.44772 15.4477 3 16 3C16.5523 3 17 3.44772 17 4Z"
                stroke="#FEFEFE"
                stroke-width="1.5"
              />
              <path
                d="M15 10C15 12.7614 12.7614 15 10 15C7.23858 15 5 12.7614 5 10C5 7.23858 7.23858 5 10 5C12.7614 5 15 7.23858 15 10Z"
                stroke="#FEFEFE"
                stroke-width="1.5"
              />
            </svg>
          </RouterLink>
          <RouterLink to="/"
            ><svg
              class="social-outline-facebook"
              width="24"
              height="24"
              viewBox="0 0 24 24"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M18 3H15C12.2386 3 10 5.23858 10 8V10H6V14H10V21H14V14H18V10H14V8C14 7.44772 14.4477 7 15 7H18V3Z"
                stroke="#FEFEFE"
                stroke-width="1.5"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
            </svg>
          </RouterLink>
          <RouterLink to="/"
            ><svg
              class="social-outline-youtube"
              width="24"
              height="24"
              viewBox="0 0 24 24"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <rect x="2" y="3" width="20" height="18" rx="4" stroke="#FEFEFE" stroke-width="1.5" />
              <path
                d="M10.4472 8.72361L15.2111 11.1056C15.9482 11.4741 15.9482 12.5259 15.2111 12.8944L10.4472 15.2764C9.78231 15.6088 9 15.1253 9 14.382V9.61803C9 8.87465 9.78231 8.39116 10.4472 8.72361Z"
                stroke="#FEFEFE"
                stroke-width="1.5"
                stroke-linecap="round"
              />
            </svg>
          </RouterLink>
        </div>
      </div>
    </div>
  </footer>
</template>
