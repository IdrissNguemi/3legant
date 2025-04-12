<script setup>
import CardComponents from './CardComponents.vue'
import { ref } from 'vue'
import CustomButton from './CustomButton.vue'
import { useRoute } from 'vue-router'

const route = useRoute()

const products = ref([
  {
    name: 'Loveseat Sofa',
    imagePath: '/src/assets/products/sofa.png',
    price: 199.99,
  },
  {
    name: 'Table Lamp',
    imagePath: '/src/assets/products/tableLamp.png',
    price: 24.99,
  },
  {
    name: 'Beige Table Lamp',
    imagePath: '/src/assets/products/BeigeTableLamp.png',
    price: 24.99,
  },
  {
    name: 'Bamboo basket',
    imagePath: '/src/assets/products/bambooBasket.png',
    price: 24.99,
  },
  {
    name: 'Bamboo basket',
    imagePath: '/src/assets/products/bambooBasket.png',
    price: 24.99,
  },
  {
    name: 'Bamboo basket',
    imagePath: '/src/assets/products/bambooBasket.png',
    price: 24.99,
  },
  {
    name: 'Bamboo basket',
    imagePath: '/src/assets/products/bambooBasket.png',
    price: 24.99,
  },
  {
    name: 'Bamboo basket',
    imagePath: '/src/assets/products/bambooBasket.png',
    price: 24.99,
  },
  {
    name: 'Bamboo basket',
    imagePath: '/src/assets/products/bambooBasket.png',
    price: 24.99,
  },
  {
    name: 'Bamboo basket',
    imagePath: '/src/assets/products/bambooBasket.png',
    price: 24.99,
  },
  {
    name: 'Bamboo basket',
    imagePath: '/src/assets/products/bambooBasket.png',
    price: 24.99,
  },
  {
    name: 'Bamboo basket',
    imagePath: '/src/assets/products/bambooBasket.png',
    price: 24.99,
  },
])
const NewArrivalsProducts = ref(products.value.slice(0, 4))
</script>

<template>
  <section class="px-4">
    <div class="max-w-[1120px] w-full mx-auto space-y-[48px] pt-[48px]">
      <div class="flex items-end justify-between" v-if="route.name === 'home'">
        <h2 class="max-w-[149px] text-[40px] font-medium leading-[44px]">New Arrivals</h2>
        <CustomButton customButtonProps="More Products" link="/shop" />
      </div>
      <div v-if="route.name === 'shop'">
        <h2 class="text-[20px] font-semibold leading-[32px]">Living Room</h2>
      </div>
      <div class="flex justify-between" v-if="route.name === 'home'">
        <CardComponents
          v-for="(NewArrivalsProduct, index) in NewArrivalsProducts"
          :key="index"
          :product="NewArrivalsProduct"
        />
      </div>
      <div class="grid grid-cols-4 gap-4 pb-[90px]" v-if="route.name === 'shop'">
        <CardComponents v-for="(product, index) in products" :key="index" :product="product" />
      </div>
    </div>
  </section>
</template>
