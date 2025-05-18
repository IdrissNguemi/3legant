<script setup>
import { ref } from 'vue'
import { useRouter } from 'vue-router'
import axios from 'axios'
import registerImage from '@/assets/registerImage.svg'
import AuthButton from '@/components/AuthButton.vue'
import { useAuthAdminStore } from '@/stores/authAdmin'

const admin = ref('')
const password = ref('')
const error = ref('')
const loading = ref(false)
const router = useRouter()
const authAdminStore = useAuthAdminStore()

const login = async () => {
  loading.value = true
  error.value = ''

  try {
    const response = await axios.post('http://localhost:8000/api/login-admin', {
      admin: admin.value,
      password: password.value,
    })

    const token = response.data.access_token
    authAdminStore.setToken(token)

    router.push('/admin')
  } catch (err) {
    error.value = err.response?.data?.message || 'Erreur lors de la connexion'
    console.error('Erreur login admin:', err)
  } finally {
    loading.value = false
  }
}
</script>

<template>
  <div class="flex max-w-[100vw] w-full h-screen">
    <img
      :src="registerImage"
      alt="image of a sofa"
      class="max-w-[736px] w-full h-screen object-cover"
    />
    <div class="w-full flex items-center pl-[88px]">
      <form @submit.prevent="login" class="space-y-[32px] max-w-[456px] w-full">
        <h2 class="font-medium text-[44px] leading-[110%]">3legant Admin</h2>

        <div v-if="error" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
          {{ error }}
        </div>

        <div class="flex flex-col space-y-6">
          <input
            type="text"
            v-model="admin"
            name="admin"
            class="text-[#141718] border-b border-solid border-[#E8ECEF] pb-[14px] leading-[26px] focus:outline-none"
            placeholder="Admin"
            required
          />
          <input
            type="password"
            v-model="password"
            name="password"
            class="text-[#141718] border-b border-solid border-[#E8ECEF] pb-[14px] leading-[26px] focus:outline-none"
            placeholder="Password"
            required
          />
        </div>

        <AuthButton
          :buttonProps="loading ? 'Connexion...' : 'Login'"
          :disabled="loading"
          type="submit"
        />
      </form>
    </div>
  </div>
</template>
