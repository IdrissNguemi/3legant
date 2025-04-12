<script setup>
import headerBackground from '@/assets/headerBackground.png'
</script>
<template>
  <div class="px-4">
    <div class="max-w-[1120px] w-full mx-auto space-y-8 pb-[40px]">
      <img :src="headerBackground" alt="image of a clean live room" class="w-full" />
      <div class="flex items-center space-x-4">
        <h1 class="text-[72px] leading-[76px] font-semibold max-w-[643px] w-full">
          Simply Unique<span class="text-[#6C7275]">/</span> Simply Better<span
            class="text-[#6C7275]"
            >.</span
          >
        </h1>
        <p class="text-[#6C7275] max-w-[424px] w-full">
          <span class="text-[#121212] text-[18px] leading-[30px] font-semibold">3legant</span> is a
          gift & decorations store based in HCMC, Vietnam. Est since 2019.
        </p>
      </div>
    </div>
  </div>
</template>
