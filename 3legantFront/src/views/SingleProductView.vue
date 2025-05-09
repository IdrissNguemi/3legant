<script setup>
import NavBar from '@/components/NavBar.vue'
import FooterComponent from '@/components/FooterComponent.vue'
import NewArrivalsComponent from '@/components/NewArrivalsComponent.vue'
import { RouterLink, useRoute } from 'vue-router'
import { ref, onMounted, watch } from 'vue'
import { useCartStore } from '@/stores/cartStore'
import axios from 'axios'

const products = ref([])
const errorMessage = ref('')
const product = ref(null)

const route = useRoute()
const cartStore = useCartStore()
const selectedColor = ref('Black')
const quantity = ref(1)

const fetchProducts = async () => {
  try {
    const res = await axios.get('http://localhost:8000/api/products')
    products.value = res.data
    findCurrentProduct()
  } catch (error) {
    errorMessage.value = 'Erreur lors du chargement des produits'
    console.error(error)
  }
}

// Fonction pour trouver le produit courant basé sur l'ID de l'URL
const findCurrentProduct = () => {
  const productId = parseInt(route.params.id)
  product.value = products.value.find((p) => p.id === productId) || null
}

// Surveiller les changements dans la route pour mettre à jour le produit
watch(
  () => route.params.id,
  () => {
    findCurrentProduct()
  },
)

// Fonctions pour gérer la quantité
const decreaseQuantity = () => {
  if (quantity.value > 1) {
    quantity.value--
  }
}

const increaseQuantity = () => {
  quantity.value++
}

const addToCart = () => {
  if (product.value) {
    const productToCart = {
      ...product.value,
      color: selectedColor.value,
    }

    // Ajouter au store pinia
    cartStore.addToCart(productToCart, quantity.value)
  }
}

onMounted(fetchProducts)
</script>

<template>
  <NavBar />
  <main>
    <div class="px-4">
      <div class="max-w-[1120px] w-full mx-auto mb-[50px]">
        <div class="flex items-center space-x-4 py-4">
          <RouterLink to="/" class="text-[#605F5F] font-semibold text-medium leading-[24px]"
            >Home</RouterLink
          >
          <div class="flex items-center justify-center">
            <svg
              class="icon-chevron-right"
              width="12"
              height="12"
              viewBox="0 0 12 12"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M4.58423 3L7.58423 6L4.58423 9"
                stroke="#605F5F"
                stroke-width="0.75"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
            </svg>
          </div>
          <RouterLink to="/shop" class="text-[#605F5F] font-semibold text-medium leading-[24px]"
            >Shop</RouterLink
          >
          <div class="flex items-center justify-center">
            <svg
              class="icon-chevron-right"
              width="12"
              height="12"
              viewBox="0 0 12 12"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M4.58423 3L7.58423 6L4.58423 9"
                stroke="#605F5F"
                stroke-width="0.75"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
            </svg>
          </div>
          <span class="text-[#121212] font-semibold text-medium leading-[24px]">{{
            product?.productName || 'Chargement...'
          }}</span>
        </div>
        <div v-if="product" class="flex justify-between space-x-[40px]">
          <img
            :src="`http://localhost:8000/storage/${product.productImagePath}`"
            :alt="product.productName"
            class="max-w-[548px] max-h-[610px] object-cover w-full bg-[#f3f5f7]"
          />
          <div class="space-y-6 w-full">
            <div class="flex flex-col space-y-4 pb-6 border-b border-b-solid borrder-b-[#E8ECEF]">
              <h1 class="text-[40px] font-semibold leading-[44px] text-[#141718]">
                {{ product.productName }}
              </h1>
              <p class="text-[16px] leading-[26px] text-[#6C7275]">
                {{ product.productDescription }}
              </p>
              <h2 class="text-[28px] font-semibold leading-[34px] text-[#121212]">
                ${{ product.productPrice.toFixed(2) }}
              </h2>
            </div>
            <div class="flex space-x-6">
              <div class="flex items-center border rounded-md max-w-[127px] w-full py-3 px-4">
                <button @click="decreaseQuantity" class="w-5 h-5 text-gray-500">−</button>
                <span class="px-2 py-1 text-center flex-1">{{ quantity }}</span>
                <button @click="increaseQuantity" class="w-5 h-5 text-gray-500">+</button>
              </div>
              <button
                @click="addToCart"
                class="w-full text-white bg-[#141718] rounded-[8px] py-[10px]"
              >
                <span class="mx-auto w-fit">Add to Cart</span>
              </button>
            </div>
          </div>
        </div>
        <div v-else>
          <p>Chargement du produit...</p>
        </div>
      </div>
    </div>
    <NewArrivalsComponent />
  </main>
  <FooterComponent />
</template>
