<script setup>
import CardComponents from './CardComponents.vue'
import { onMounted, ref, watch } from 'vue'
import CustomButton from './CustomButton.vue'
import { useRoute } from 'vue-router'
import FilterComponent from './FilterComponent.vue'
import axios from 'axios'

const errorMessage = ref('')
const products = ref([])
const NewArrivalsProducts = ref([])
const filteredProducts = ref([])

watch(products, (newVal) => {
  NewArrivalsProducts.value = newVal.slice(0, 4)
  filteredProducts.value = newVal
})

const fetchProducts = async () => {
  try {
    const res = await axios.get('http://localhost:8000/api/products')
    products.value = res.data
    console.log(products)
  } catch (error) {
    errorMessage.value = 'Erreur lors du chargement des produits'
    console.error(error)
  }
}

const route = useRoute()

const filterByColor = (color) => {
  filteredProducts.value = products.value.filter((p) => p.productColor === color)
}

onMounted(fetchProducts)
</script>

<template>
  <section class="px-4">
    <div class="max-w-[1120px] w-full mx-auto space-y-[48px] pt-[48px]">
      <div class="flex items-end justify-between" v-if="route.name === 'home'">
        <h2 class="max-w-[149px] text-[40px] font-medium leading-[44px]">New Arrivals</h2>
        <CustomButton customButtonProps="More Products" link="/shop" />
      </div>
      <div v-if="route.name === 'shop'">
        <h2 class="text-[20px] font-semibold leading-[32px]">Furnitures</h2>
      </div>
      <div class="flex justify-between" v-if="route.name === 'home'">
        <CardComponents
          v-for="NewArrivalsProduct in NewArrivalsProducts"
          :key="NewArrivalsProduct.id"
          :product="NewArrivalsProduct"
        />
      </div>
      <div v-if="route.name === 'shop'" class="flex items-start justify-between">
        <FilterComponent @filterByColor="filterByColor" />
        <div class="grid grid-cols-3 gap-4 pb-[90px] max-w-[834px] w-full">
          <CardComponents
            v-for="product in filteredProducts"
            :key="product.id"
            :product="product"
          />
        </div>
      </div>
    </div>
  </section>
</template>
