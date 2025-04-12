<script setup>
import { defineProps, ref } from 'vue'

const cardHovered = ref(false)

// Remplacer le toggle par des fonctions distinctes
const setHovered = () => {
  cardHovered.value = true
}

const setNotHovered = () => {
  cardHovered.value = false
}

defineProps({
  product: Object,
})
</script>

<template>
  <!-- Remplacer les événements pour utiliser les nouvelles fonctions -->
  <div @mouseenter="setHovered" @mouseleave="setNotHovered" class="space-y-3">
    <div class="relative">
      <img :src="product.imagePath" :alt="product.name" />
      <div class="absolute space-y-2 flex flex-col top-[16px] left-[16px]">
        <span
          class="px-[14px] py-1 text-[16px] font-bold leading-[16px] bg-white text-[#141718] rounded-[4px]"
          >NEW</span
        >
        <span
          class="px-[14px] py-1 text-[16px] font-bold leading-[16px] bg-[#38CB89] text-white rounded-[4px]"
          >-50%</span
        >
      </div>
      <button
        :class="[
          cardHovered ? 'block' : 'hidden',
          'absolute py-[9px] bottom-[16px] left-[16px] bg-[#141718] text-white rounded-[8px] text-[#FEFEFE] text-[16px] font-medium leading-[28px] tracking-[-0.4px] max-w-[230px] w-full',
        ]"
      >
        Add to cart
      </button>
    </div>
    <div class="space-y-1">
      <h3 class="font-semibold text-[16px] text-[#141718] leading-[26px]">{{ product.name }}</h3>
      <span class="font-semibold text-[14px] text-[#141718] leading-[22px]"
        >${{ product.price }}</span
      >
    </div>
  </div>
</template>
