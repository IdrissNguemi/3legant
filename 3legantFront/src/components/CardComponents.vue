<script setup>
import { defineProps, ref } from 'vue'
import { RouterLink } from 'vue-router'

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
  <RouterLink :to="`/shop/${product.id}`" class="block">
    <div @mouseenter="setHovered" @mouseleave="setNotHovered">
      <div class="">
        <img
          :src="`http://localhost:8000/storage/${product.productImagePath}`"
          :alt="product.productName"
          class="bg-[#f3f5f7] max-w-[262px] max-h-[349px]"
        />
      </div>
      <div class="space-y-1">
        <h3 class="font-semibold text-[16px] text-[#141718] leading-[26px]">
          {{ product.productName }}
        </h3>
        <span class="font-semibold text-[14px] text-[#141718] leading-[22px]"
          >${{ product.productPrice }}</span
        >
      </div>
    </div>
  </RouterLink>
</template>
