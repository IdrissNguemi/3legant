<script setup>
import bannerImage from '@/assets/bannerImage/bannerImage.png'
import CustomButton from './CustomButton.vue'
</script>

<template>
  <section class="flex">
    <div class="max-w-[50vw] w-full">
      <img :src="bannerImage" alt="modern room image" class="max-w-[50vw] w-full" />
    </div>
    <div class="bg-[#F3F5F7] flex items-center max-w-[50vw] w-full">
      <div class="max-w-[452px] w-full space-y-4 pl-[72px]">
        <p class="text-[16px] leading-[16px] font-bold text-[#377DFF]">SALE UP TO 35% OFF</p>
        <h2 class="text-[40px] leading-[44px] font-semibold text-[#141718]">
          HUNDREDS of New lower prices!
        </h2>
        <p class="text-[20px] leading-[32px] text-[#141718]">
          It’s more affordable than ever to give every room in your home a stylish makeover
        </p>
        <CustomButton customButtonProps="Shop now" link="/shop" />
      </div>
    </div>
  </section>
</template>
