<script setup>
import { RouterLink, useRouter } from 'vue-router'
import registerImage from '@/assets/registerImage.svg'
import { ref } from 'vue'
import axios from 'axios'
import AuthButton from '@/components/AuthButton.vue'

// Définition des variables réactives pour le formulaire
const name = ref('')
const email = ref('')
const password = ref('')
const error = ref('')
const loading = ref(false)
const router = useRouter()

// Fonction de soumission du formulaire
const register = async () => {
  try {
    loading.value = true
    error.value = ''

    // URL de votre API Laravel (à ajuster selon votre configuration)
    const apiUrl = 'http://localhost:8000/api/register'

    // Envoi des données au backend
    const response = await axios.post(apiUrl, {
      name: name.value,
      email: email.value,
      password: password.value,
    })

    // Traitement de la réponse
    if (response.data.message) {
      // Redirection vers la page de connexion après inscription réussie
      router.push('/login')
    }
  } catch (err) {
    // Gestion des erreurs
    if (err.response && err.response.data) {
      // Affichage des erreurs de validation du serveur
      if (err.response.data.errors) {
        const firstError = Object.values(err.response.data.errors)[0]
        error.value = Array.isArray(firstError) ? firstError[0] : firstError
      } else {
        error.value = err.response.data.message || "Une erreur est survenue lors de l'inscription"
      }
    } else {
      error.value = 'Erreur de connexion au serveur'
    }
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
      <form @submit.prevent="register" class="space-y-[32px] max-w-[456px] w-full">
        <div class="space-y-6">
          <h2 class="font-medium text-[44px] leading-[110%]">Sign up</h2>
          <p class="leading-[26px] text-base text-[#6c7275]">
            Already have an account?
            <RouterLink to="/login" class="text-[#38cb89] font-semibold">Login</RouterLink>
          </p>
        </div>

        <!-- Message d'erreur -->
        <div v-if="error" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
          {{ error }}
        </div>

        <div class="flex flex-col space-y-6">
          <input
            type="text"
            v-model="name"
            name="name"
            class="text-[#141718] border-b border-solid border-[#E8ECEF] pb-[14px] leading-[26px] focus:outline-none"
            placeholder="Your name"
            required
          />
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
            minlength="8"
          />
        </div>

        <AuthButton
          :buttonProps="loading ? 'Creating account...' : 'Sign Up'"
          :disabled="loading"
        />
      </form>
    </div>
  </div>
</template>
