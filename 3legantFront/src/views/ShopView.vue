<script setup>
import FooterComponent from '@/components/FooterComponent.vue'
import NavBar from '@/components/NavBar.vue'
import NewArrivalsComponent from '@/components/NewArrivalsComponent.vue'
import NewsLetter from '@/components/NewsLetter.vue'
import { RouterLink } from 'vue-router'
</script>

<template>
  <NavBar />
  <main>
    <div class="px-4">
      <div class="max-w-[1120px] w-full mx-auto space-y-8">
        <div
          style="background-image: url('/shopPageHeaderBackground.png')"
          class="bg-cover bg-no-repeat w-full h-[392px] flex items-center justify-center"
        >
          <div class="flex flex-col items-center space-y-6">
            <div class="flex items-center space-x-4">
              <RouterLink to="/" class="text-[#605F5F] font-semibold text-medium leading-[24px]"
                >Home</RouterLink
              >
              <div class="flex items-center justify-center">
                <svg
                  class="icon-chevron-right"
                  width="12"
                  height="12"
                  viewBox="0 0 12 12"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M4.58423 3L7.58423 6L4.58423 9"
                    stroke="#605F5F"
                    stroke-width="0.75"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                </svg>
              </div>
              <RouterLink to="/" class="text-[#121212] font-semibold text-medium leading-[24px]"
                >Shop</RouterLink
              >
            </div>
            <h1 class="text-[#121212] text-[54px] leadign-[58px] tracking-[-1px] font-semibold">
              Shop Page
            </h1>
            <p class="text-[#121212] text-[20px] leadign-[32px]">
              Let&apos;s design the place you always imagined.
            </p>
          </div>
        </div>
      </div>
    </div>
    <NewArrivalsComponent />
    <NewsLetter />
  </main>
  <FooterComponent />
</template>
