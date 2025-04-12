<script setup>
import { defineProps } from 'vue'
import { RouterLink } from 'vue-router'

defineProps({
  customButtonProps: String,
  link: String,
})
</script>

<template>
  <RouterLink
    :to="link"
    class="space-x-1 flex items-center pb-1 border-b border-solid border-[#141718] max-w-max"
  >
    <span>{{ customButtonProps }}</span>
    <svg
      class="icon-arrow-right"
      width="20"
      height="20"
      viewBox="0 0 20 20"
      fill="none"
      xmlns="http://www.w3.org/2000/svg"
    >
      <path
        d="M4.16666 10H15.8333"
        stroke="#141718"
        stroke-width="1.25"
        stroke-linecap="round"
        stroke-linejoin="round"
      />
      <path
        d="M10.8333 15L15.8333 10"
        stroke="#141718"
        stroke-width="1.25"
        stroke-linecap="round"
        stroke-linejoin="round"
      />
      <path
        d="M10.8333 5L15.8333 10"
        stroke="#141718"
        stroke-width="1.25"
        stroke-linecap="round"
        stroke-linejoin="round"
      />
    </svg>
  </RouterLink>
</template>
