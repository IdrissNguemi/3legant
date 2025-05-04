<script setup>
import { useCartStore } from '@/stores/cartStore'
import { computed } from 'vue'

const orderCode = parseInt(Math.random() * 1000000000)
const orderDate = new Date(Date.now()).toLocaleDateString('en-US', {
  month: 'long',
  day: 'numeric',
  year: 'numeric',
})

const cartStore = useCartStore()

const totalCheckoutedItems = computed(() => cartStore.cartTotal)
</script>

<template>
  <div
    class="max-w-[738px] w-full rounded-[8px] shadow-xl mx-auto px-[30px] py-[80px] space-y-[40px] text-center mt-[80px]"
  >
    <h2 class="text-[28px] text-[#6C7275] font-semibold leading-[34px] tracking-[-0.6px]">
      Thank you! 🎉
    </h2>
    <h1
      class="text-[40px] text-[#23262F] font-semibold leading-[44px] tracking-[-0.4px] max-w-[492px]"
    >
      Your order has been received
    </h1>
    <div class="max-w-[340px] w-full mx-auto space-y-[20px]">
      <p class="flex items-center justify-between">
        <span class="text-[#6C7275] text-[14px] leading-[22px] font-medium">Order code:</span>
        <span class="text-[#141718] text-[14px] leading-[22px] font-semibold"
          >#{{ orderCode }}</span
        >
      </p>
      <p class="flex items-center justify-between">
        <span class="text-[#6C7275] text-[14px] leading-[22px] font-medium">Date:</span>
        <span class="text-[#141718] text-[14px] leading-[22px] font-semibold">{{ orderDate }}</span>
      </p>
      <p class="flex items-center justify-between">
        <span class="text-[#6C7275] text-[14px] leading-[22px] font-medium">Total:</span>
        <span class="text-[#141718] text-[14px] leading-[22px] font-semibold"
          >${{ totalCheckoutedItems }}</span
        >
      </p>
      <p class="flex items-center justify-between">
        <span class="text-[#6C7275] text-[14px] leading-[22px] font-medium">Payment method:</span>
        <span class="text-[#141718] text-[14px] leading-[22px] font-semibold">Credit Card</span>
      </p>
    </div>
    <a
      class="bg-[#101010] py-2 px-6 text-[14px] leading-[32px] text-white rounded-[4px] w-max block mx-auto"
      href="/"
    >
      Back home
    </a>
  </div>
</template>
