<script setup>
//import livingRoom from '@/assets/categoryImages/livingRoom.png'
import vinliden from '@/assets/products/vinliden.png'
import persbol from '@/assets/products/persbol.png'
//import bedRoom from '@/assets/categoryImages/bedRoom.png'
import drawer from '@/assets/products/alexDrawer.png'
import CustomButton from './CustomButton.vue'
</script>
<template>
  <section class="px-4">
    <div class="max-w-[1120px] w-full mx-auto flex space-x-6">
      <div class="relative">
        <img
          :src="vinliden"
          alt="living room category image"
          class="max-w-[548px] h-[664px] bg-[#f3f5f7]"
        />
        <div class="absolute space-y-3 top-[28px] left-[28px]">
          <h2 class="text-[26px] font-semibold tracking-[-0.6px] leading-[38px]">
            Black Furnitures
          </h2>
          <CustomButton customButtonProps="Shop now" link="/shop" />
        </div>
      </div>
      <div class="space-y-6 w-full">
        <div class="relative">
          <img
            :src="persbol"
            alt="bedroom category image"
            class="w-[548px] h-[319px] w-full object-contain object-right bg-[#f3f5f7]"
          />
          <div class="absolute space-y-3 bottom-[40px] left-[32px]">
            <h2 class="text-[26px] font-semibold tracking-[-0.6px] leading-[38px]">
              Maroon Furnitures
            </h2>
            <CustomButton customButtonProps="Shop now" link="/shop" />
          </div>
        </div>
        <div class="relative">
          <img
            :src="drawer"
            alt="kitchen category image"
            class="w-[548px] h-[319px] w-full object-contain object-right bg-[#f3f5f7]"
          />
          <div class="absolute space-y-3 bottom-[40px] left-[32px]">
            <h2 class="text-[26px] font-semibold tracking-[-0.6px] leading-[38px]">
              White Furnitures
            </h2>
            <CustomButton customButtonProps="Shop now" link="/shop" />
          </div>
        </div>
      </div>
    </div>
  </section>
</template>
