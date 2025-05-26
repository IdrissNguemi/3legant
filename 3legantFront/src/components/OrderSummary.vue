<script setup>
import { ref, computed } from 'vue'
const emit = defineEmits(['checkoutCompleted'])
const isCompleted = ref(false)

const props = defineProps({
  total: Number,
  cartItems: {
    type: Array,
    default: () => [],
  },
})

const isCartEmpty = computed(() => {
  return props.cartItems.length === 0
})

const onCheckout = () => {
  isCompleted.value = true
  emit('checkoutCompleted', isCompleted.value)
}
</script>

<template>
  <div
    class="border border-solid border-[#6C7275] rounded-[6px] p-6 max-w-[413px] w-full space-y-8"
  >
    <div class="space-y-4">
      <h2>Cart Summary</h2>
      <button
        class="bg-[#F3F5F7] border border-solid border-[#141718] rounded-[4px] px-4 py-[13px] flex items-center justify-between w-full"
      >
        <div class="flex items-center space-x-3">
          <input
            type="radio"
            name="payment"
            value="cash"
            id="cash"
            checked
            class="w-[18px] h-[18px]"
          />
          <span class="text-[#141718] leading-[26px]">Free Shipping</span>
        </div>
        <span class="text-[#141718] leading-[26px]">$0.00</span>
      </button>
      <div
        class="py-[13px] border-b border-solid border-[#EAEAEA] flex items-center justify-between"
      >
        <span class="leading-[26px] text-[#141718]">Subtotal</span>
        <span class="leading-[26px] text-[#141718] font-semibold">${{ total.toFixed(2) }}</span>
      </div>
      <div
        class="py-[13px] border-b border-solid border-[#EAEAEA] flex items-center justify-between"
      >
        <span class="leading-[26px] text-[#141718]">Tax</span>
        <span class="leading-[26px] text-[#141718] font-semibold">$0.00</span>
      </div>
      <div class="py-[13px] flex items-center justify-between">
        <span class="leading-[32px] text-[20px] text-[#141718] font-semibold">Total</span>
        <span class="leading-[32px] text-[20px] text-[#141718] font-semibold"
          >${{ total.toFixed(2) }}</span
        >
      </div>
    </div>
    <button
      class="flex items-center justify-center py-[10px] rounded-[8px] w-full text-[18px] leading-[32px] tracking-[-0.4px]"
      :class="[
        isCartEmpty
          ? 'bg-gray-300 text-gray-500 cursor-not-allowed'
          : 'bg-[#141718] text-white hover:bg-gray-800',
      ]"
      @click="onCheckout()"
      :disabled="isCartEmpty"
    >
      Checkout
    </button>
  </div>
</template>
