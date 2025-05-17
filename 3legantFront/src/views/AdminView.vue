<script setup>
import { ref, onMounted } from 'vue'
import axios from 'axios'

const productName = ref('')
const productPrice = ref('')
const productColor = ref('')
const productDescription = ref('')
const productImagePath = ref(null)
const products = ref([])
const isEditing = ref(false)
const editingProductId = ref(null)
const successMessage = ref('')
const errorMessage = ref('')

const fetchProducts = async () => {
  try {
    const res = await axios.get('http://localhost:8000/api/products')
    products.value = res.data
  } catch (error) {
    errorMessage.value = 'Erreur lors du chargement des produits'
    console.error(error)
  }
}

const submitProduct = async () => {
  try {
    const formData = new FormData()
    formData.append('productName', productName.value)
    formData.append('productPrice', productPrice.value)
    formData.append('productColor', productColor.value)
    formData.append('productDescription', productDescription.value)

    // Si un fichier est sélectionné, l'ajouter au formData
    if (productImagePath.value) {
      formData.append('productImage', productImagePath.value)
    }

    if (isEditing.value) {
      await axios.post(
        `http://localhost:8000/api/products/${editingProductId.value}?_method=PUT`,
        formData,
        {
          headers: {
            'Content-Type': 'multipart/form-data',
          },
        },
      )
      successMessage.value = 'Produit mis à jour avec succès'
    } else {
      await axios.post('http://localhost:8000/api/products', formData, {
        headers: {
          'Content-Type': 'multipart/form-data',
        },
      })
      successMessage.value = 'Produit ajouté avec succès'
    }

    resetForm()
    fetchProducts()
  } catch (error) {
    errorMessage.value = 'Erreur lors de la soumission du produit'
    console.error(error)
  }
}

const deleteProduct = async (product) => {
  try {
    await axios.delete(`http://localhost:8000/api/products/${product.id}`)
    successMessage.value = 'Produit supprimé avec succès'
    fetchProducts()
  } catch (error) {
    errorMessage.value = 'Erreur lors de la suppression du produit'
    console.error(error)
  }
}

const editProduct = (product) => {
  productName.value = product.productName
  productPrice.value = product.productPrice
  productColor.value = product.productColor || product.priceColor // Correction de l'erreur dans le nom de la propriété
  productDescription.value = product.productDescription
  isEditing.value = true
  editingProductId.value = product.id
}

const resetForm = () => {
  productName.value = ''
  productPrice.value = ''
  productColor.value = ''
  productDescription.value = ''
  productImagePath.value = null
  isEditing.value = false
  editingProductId.value = null
  // On ne réinitialise pas les messages pour que l'utilisateur puisse les voir
  setTimeout(() => {
    successMessage.value = ''
    errorMessage.value = ''
  }, 3000)
}

onMounted(fetchProducts)
</script>

<template>
  <main class="max-w-[1120px] w-full mx-auto px-4 mt-10 space-y-8">
    <h1 class="text-[24px] text-[#121212] leading-[36px] font-bold">3legant Admin Panel</h1>

    <div class="space-y-6">
      <h2 class="text-[18px] text-[#121212] leading-[36px] font-semibold">Add new products</h2>

      <form class="space-y-4" @submit.prevent="submitProduct">
        <div v-if="successMessage" class="bg-green-100 text-green-800 p-2 rounded">
          {{ successMessage }}
        </div>
        <div v-if="errorMessage" class="bg-red-100 text-red-800 p-2 rounded">
          {{ errorMessage }}
        </div>

        <div class="flex items-center space-x-4">
          <div class="max-w-[560px] w-full">
            <input
              type="text"
              v-model="productName"
              placeholder="Product Name"
              class="w-full py-2 px-2 border border-solid border-gray-400 rounded-[4px]"
              required
            />
          </div>

          <div class="flex items-center space-x-4 max-w-[560px] w-full">
            <input
              type="number"
              v-model="productPrice"
              placeholder="Price"
              class="w-full py-2 px-2 border border-solid border-gray-400 rounded-[4px]"
              required
            />
            <select
              v-model="productColor"
              class="w-full py-2 px-2 border border-solid border-gray-400 rounded-[4px]"
              required
            >
              <option disabled value="">Select color</option>
              <option value="white">White</option>
              <option value="black">Black</option>
              <option value="maroon">Maroon</option>
            </select>
          </div>
        </div>

        <div class="flex items-start space-x-4">
          <textarea
            v-model="productDescription"
            placeholder="Describe the product"
            class="max-w-[560px] w-full border border-solid border-gray-400 rounded-[4px] h-[100px] p-2 resize-none"
            required
          ></textarea>
          <input
            type="file"
            @change="productImagePath = $event.target.files[0]"
            class="max-w-[560px] w-full"
            accept="image/*"
          />
        </div>

        <button type="submit" class="bg-black text-white px-4 py-2 rounded hover:bg-gray-800">
          {{ isEditing ? 'Mettre à jour le produit' : 'Ajouter le produit' }}
        </button>
      </form>
    </div>
    <div class="space-y-6">
      <h2 class="text-[18px] text-[#121212] leading-[36px] font-semibold">Products added</h2>
      <div class="space-y-4">
        <div v-for="product in products" :key="product.id" class="border p-4 flex justify-between">
          <div>
            <img
              v-if="product.productImagePath"
              :src="`http://localhost:8000/storage/${product.productImagePath}`"
              :alt="product.productName"
              class="max-h-[100px] object-contain"
              @error="
                $event.target.src = 'https://via.placeholder.com/100x100?text=Image+non+disponible'
              "
            />
            <h3 class="font-semibold">
              {{ product.productName }} - {{ product.productColor || product.priceColor }}
            </h3>
            <p>{{ product.productDescription }}</p>
            <span class="text-gray-700">${{ product.productPrice }}</span>
          </div>
          <div class="space-x-2">
            <button @click="editProduct(product)" class="bg-black px-3 py-1 text-white rounded">
              Update
            </button>
            <button @click="deleteProduct(product)" class="bg-red-600 px-3 py-1 text-white rounded">
              Delete
            </button>
          </div>
        </div>
      </div>
    </div>
  </main>
</template>
