<script setup>
import OrderSummary from '@/components/OrderSummary.vue'
import { useCartStore } from '@/stores/cartStore'
import { computed, ref } from 'vue'
import OrderCompleted from './OrderCompleted.vue'

// Get the cart store
const cartStore = useCartStore()

// Get cart items from store
const cartItems = computed(() => cartStore.cartItems)
const cartTotal = computed(() => cartStore.cartTotal)

// Methods for quantity control
const decreaseQuantity = (item) => {
  if (item.quantity > 1) {
    cartStore.updateQuantity(item.id, item.quantity - 1)
  }
}

const increaseQuantity = (item) => {
  cartStore.updateQuantity(item.id, item.quantity + 1)
}

const removeItem = (itemId) => {
  cartStore.removeFromCart(itemId)
}

const isOrderCompleted = ref(false)

const handleCheckoutCompleted = (value) => {
  if (value) {
    isOrderCompleted.value = true
  } else {
    isOrderCompleted.value = false
  }
}

console.log(cartItems)
</script>
<template>
  <section class="px-4">
    <div class="max-w-[1120px] w-full mx-auto py-[50px] flex flex-col items-center">
      <div class="flex flex-col items-center space-y-[40px] max-w-[832px] w-full">
        <h1 class="text-[54px] leading-[58px] font-semibold">Cart</h1>
        <div class="flex items-start space-x-8">
          <div
            class="flex items-center space-x-[17px] pb-[26px] border-b-[2px] border-solid border-[#141718]"
          >
            <div
              class="flex items-center justify-center text-[16px] leading-[26px] text-white font-semibold px-[18px] py-[8px] rounded-full bg-[#23262F]"
            >
              1
            </div>
            <span class="text-[16px] leading-[26px] text-[#23262F] max-w-[197px] w-full"
              >Shopping cart & Checkout</span
            >
          </div>
          <div
            :class="
              isOrderCompleted === true
                ? 'flex items-center space-x-[17px] pb-[26px] border-b-[2px] border-b-solid border-b-[#141718]'
                : 'flex items-center space-x-[17px] pb-[26px]'
            "
          >
            <div
              :class="
                isOrderCompleted === true
                  ? 'flex items-center justify-center text-[16px] leading-[26px] text-white font-semibold px-[17px] py-[8px] rounded-full bg-[#23262F]'
                  : 'flex items-center justify-center text-[16px] leading-[26px] text-white font-semibold px-[17px] py-[8px] rounded-full bg-[#B1B5C3]'
              "
            >
              2
            </div>
            <span
              :class="[
                isOrderCompleted === true ? 'text-[#23262F]' : 'text-[#B1B5C3]',
                'text-[16px] leading-[26px] max-w-[197px] w-full',
              ]"
              >Order complete</span
            >
          </div>
        </div>
      </div>
      <div
        v-if="isOrderCompleted === false"
        class="w-full py-[80px] flex items-start justify-between"
      >
        <div class="max-w-[643px] w-full">
          <div v-if="cartItems.length === 0" class="text-center py-28">
            <p class="text-gray-500 text-lg">Your cart is empty</p>
            <router-link to="/shop" class="mt-4 inline-block underline">
              Continue Shopping
            </router-link>
          </div>

          <table v-else class="w-full">
            <thead>
              <tr class="border-b border-gray-200">
                <th class="text-left py-4 px-2 font-medium text-gray-800">Product</th>
                <th class="text-left py-4 px-2 font-medium text-gray-800">Quantity</th>
                <th class="text-left py-4 px-2 font-medium text-gray-800">Price</th>
                <th class="text-right py-4 px-2 font-medium text-gray-800">Subtotal</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="item in cartItems" :key="item.id" class="border-b border-gray-100">
                <td class="py-4 px-2">
                  <div class="flex items-center">
                    <img
                      :src="item.imagePath"
                      :alt="item.name"
                      class="w-[80px] h-[96px] object-cover mr-4"
                    />
                    <div class="space-y-2">
                      <p class="text-[14px] leading-[22px] font-semibold text-[#141718]">
                        {{ item.name }}
                      </p>
                      <p class="text-[#6C7275] text-[12px] leading-[20px]">
                        Color: {{ item.color }}
                      </p>
                      <button
                        @click="removeItem(item.id)"
                        class="text-[#6C7275] font-semibold text-[14px] leading-[22px] flex items-start space-x-1"
                      >
                        <svg
                          class="icons-close-line"
                          width="24"
                          height="25"
                          viewBox="0 0 24 25"
                          fill="none"
                          xmlns="http://www.w3.org/2000/svg"
                        >
                          <path
                            fill-rule="evenodd"
                            clip-rule="evenodd"
                            d="M5.29289 5.79289C5.68342 5.40237 6.31658 5.40237 6.70711 5.79289L12 11.0858L17.2929 5.79289C17.6834 5.40237 18.3166 5.40237 18.7071 5.79289C19.0976 6.18342 19.0976 6.81658 18.7071 7.20711L13.4142 12.5L18.7071 17.7929C19.0976 18.1834 19.0976 18.8166 18.7071 19.2071C18.3166 19.5976 17.6834 19.5976 17.2929 19.2071L12 13.9142L6.70711 19.2071C6.31658 19.5976 5.68342 19.5976 5.29289 19.2071C4.90237 18.8166 4.90237 18.1834 5.29289 17.7929L10.5858 12.5L5.29289 7.20711C4.90237 6.81658 4.90237 6.18342 5.29289 5.79289Z"
                            fill="#6C7275"
                          />
                        </svg>
                        Remove
                      </button>
                    </div>
                  </div>
                </td>
                <td class="py-4 px-2">
                  <div class="flex items-center border rounded-md w-24">
                    <button @click="decreaseQuantity(item)" class="px-2 py-1 text-gray-500">
                      −
                    </button>
                    <span class="px-2 py-1 text-center flex-1">{{ item.quantity }}</span>
                    <button @click="increaseQuantity(item)" class="px-2 py-1 text-gray-500">
                      +
                    </button>
                  </div>
                </td>
                <td class="py-4 px-2 text-gray-800">${{ item.price.toFixed(2) }}</td>
                <td class="py-4 px-2 font-semibold text-[#121212] text-right">
                  ${{ (item.price * item.quantity).toFixed(2) }}
                </td>
              </tr>
            </tbody>
          </table>
        </div>

        <OrderSummary
          :total="cartTotal"
          :cartItems="cartItems"
          @checkoutCompleted="handleCheckoutCompleted"
        />
      </div>
      <div v-else-if="isOrderCompleted === true">
        <OrderCompleted />
      </div>
    </div>
  </section>
</template>
