<script setup>
import article1 from '@/assets/articlesImages/article1.png'
import article2 from '@/assets/articlesImages/article2.png'
import article3 from '@/assets/articlesImages/article3.png'
import CustomButton from './CustomButton.vue'
</script>

<template>
  <section class="px-4">
    <div class="max-w-[1120px] w-full mx-auto space-y-[48px] py-[80px]">
      <div class="flex items-end justify-between">
        <h2 class="max-w-[149px] text-[40px] font-medium leading-[44px]">Articles</h2>
        <CustomButton customButtonProps="More Articles" />
      </div>
      <div class="flex justify-between">
        <div class="space-y-6">
          <img :src="article1" alt="image of hoe to decorate a room" />
          <div class="space-y-2">
            <h2 class="text-[#23262F] text-[20px] leading-[28px] font-medium">
              7 ways to decor your home
            </h2>
            <CustomButton customButtonProps="Read More" link="/" />
          </div>
        </div>
        <div class="space-y-6">
          <img :src="article2" alt="image of hoe to decorate a room" />
          <div class="space-y-2">
            <h2 class="text-[#23262F] text-[20px] leading-[28px] font-medium">
              Kitchen organization
            </h2>
            <CustomButton customButtonProps="Read More" link="/" />
          </div>
        </div>
        <div class="space-y-6">
          <img :src="article3" alt="image of hoe to decorate a room" />
          <div class="space-y-2">
            <h2 class="text-[#23262F] text-[20px] leading-[28px] font-medium">
              Decor your bedroom
            </h2>
            <CustomButton customButtonProps="Read More" link="/" />
          </div>
        </div>
      </div>
    </div>
  </section>
</template>
