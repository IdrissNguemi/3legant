<script setup>
import livingRoom from '@/assets/categoryImages/livingRoom.png'
import bedRoom from '@/assets/categoryImages/bedRoom.png'
import kitchen from '@/assets/categoryImages/kitchen.png'
import CustomButton from './CustomButton.vue'
</script>
<template>
  <section class="px-4">
    <div class="max-w-[1120px] w-full mx-auto flex space-x-6">
      <div class="relative">
        <img :src="livingRoom" alt="living room category image" />
        <div class="absolute space-y-3 top-[48px] left-[48px]">
          <h2 class="text-[32px] font-semibold tracking-[-0.6px] leading-[38px]">Living Room</h2>
          <CustomButton customButtonProps="Shop now" link="/shop" />
        </div>
      </div>
      <div class="space-y-6">
        <div class="relative">
          <img :src="bedRoom" alt="bedroom category image" />
          <div class="absolute space-y-3 bottom-[40px] left-[32px]">
            <h2 class="text-[32px] font-semibold tracking-[-0.6px] leading-[38px]">Bedroom</h2>
            <CustomButton customButtonProps="Shop now" link="/shop" />
          </div>
        </div>
        <div class="relative">
          <img :src="kitchen" alt="kitchen category image" />
          <div class="absolute space-y-3 bottom-[40px] left-[32px]">
            <h2 class="text-[32px] font-semibold tracking-[-0.6px] leading-[38px]">Kitchen</h2>
            <CustomButton customButtonProps="Shop now" link="/shop" />
          </div>
        </div>
      </div>
    </div>
  </section>
</template>
