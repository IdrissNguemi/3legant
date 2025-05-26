<script setup>
import { RouterLink, useRouter } from 'vue-router'
import registerImage from '@/assets/registerImage.svg'
import { ref } from 'vue'
import axios from 'axios'
import AuthButton from '@/components/AuthButton.vue'
import { useAuthStore } from '@/stores/auth'

const authStore = useAuthStore()
const email = ref('')
const password = ref('')
const error = ref('')
const loading = ref(false)
const router = useRouter()

const login = async () => {
  try {
    loading.value = true
    error.value = ''

    const apiUrl = 'http://localhost:8000/api/login'

    const response = await axios.post(apiUrl, {
      email: email.value,
      password: password.value,
    })

    if (response.data.access_token) {
      // Utiliser le store d'authentification pour la connexion
      authStore.login(response.data.access_token)
      // Configurer les headers Axios
      axios.defaults.headers.common['Authorization'] = `Bearer ${response.data.access_token}`
      router.push('/')
    }
  } catch (err) {
    if (err.response && err.response.data) {
      if (err.response.data.errors) {
        const firstError = Object.values(err.response.data.errors)[0]
        error.value = Array.isArray(firstError) ? firstError[0] : firstError
      } else {
        error.value = err.response.data.message || 'Identifiants incorrects'
      }
    } else {
      error.value = 'Erreur de connexion au serveur'
    }
    console.error('Erreur de connexion:', err)
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
        <div class="space-y-6">
          <h2 class="font-medium text-[44px] leading-[110%]">Login</h2>
          <p class="leading-[26px] text-base text-[#6c7275]">
            Don't have an account?
            <RouterLink to="/register" class="text-[#38cb89] font-semibold">Sign Up</RouterLink>
          </p>
        </div>

        <div v-if="error" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
          {{ error }}
        </div>

        <div class="flex flex-col space-y-6">
          <input
            type="email"
            v-model="email"
            name="email"
            class="text-[#141718] border-b border-solid border-[#E8ECEF] pb-[14px] leading-[26px] focus:outline-none"
            placeholder="Email address"
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
