<script setup>
import { useAuthStore } from '@/stores/auth'
import { useCartStore } from '@/stores/cartStore'
import { computed, ref, onMounted } from 'vue'
import { RouterLink, useRouter } from 'vue-router'

const cartStore = useCartStore()
const authStore = useAuthStore()
const router = useRouter()


const totalCartItems = computed(() => cartStore.totalItems())
const isProfileClicked = ref(false)

const closeDropdown = (event) => {
  if (isProfileClicked.value && !event.target.closest('.profile-dropdown')) {
    isProfileClicked.value = false
  }
}

onMounted(() => {
  authStore.checkAuth()
  document.addEventListener('click', closeDropdown)
})

const onClickOnProfile = () => {
  isProfileClicked.value = !isProfileClicked.value
}

const logout = () => {
  authStore.logout()
  isProfileClicked.value = false
  router.push('/')
}
</script>

<template>
  <nav class="px-4">
    <div class="max-w-[1120px] w-full mx-auto flex items-center justify-between py-[18px]">
      <div>
        <p class="text-[24px] leading-[24px] font-semibold">3legant.</p>
      </div>
      <div class="flex items-center space-x-[40px]">
        <RouterLink to="/" class="text-[14px] leading-[24px] font-medium text-[#6C7275]"
          >Home</RouterLink
        >
        <RouterLink to="/shop" class="text-[14px] leading-[24px] font-medium text-[#6C7275]"
          >Shop</RouterLink
        >
      </div>
      <div class="flex items-center space-x-4">
        <button class="flex items-center justify-center relative profile-dropdown" @click.stop="onClickOnProfile">
          <svg
            class="interface-outline-user-circle"
            width="24"
            height="24"
            viewBox="0 0 24 24"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              d="M18.5588 19.5488C17.5654 16.8918 15.0036 15 12 15C8.99638 15 6.4346 16.8918 5.44117 19.5488M18.5588 19.5488C20.6672 17.7154 22 15.0134 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 15.0134 3.33285 17.7154 5.44117 19.5488M18.5588 19.5488C16.8031 21.0756 14.5095 22 12 22C9.49052 22 7.19694 21.0756 5.44117 19.5488M15 9C15 10.6569 13.6569 12 12 12C10.3431 12 9 10.6569 9 9C9 7.34315 10.3431 6 12 6C13.6569 6 15 7.34315 15 9Z"
              stroke="#141718"
              stroke-width="1.5"
              stroke-linejoin="round"
            />
          </svg>
          <div
            class="profile-dropdown"
            :class="[isProfileClicked === false ? 'hidden' : 'absolute top-[26px] left-[0px] bg-white rounded-[4px] border border-solid border-gray-400 space-y-2 p-2 w-max z-10']"
          >
            <template v-if="!authStore.isAuthenticated">
              <RouterLink to="/register" class="pb-2 border-b border-solid border-gray-300 text-[14px] leading-[24px] font-medium text-[#6C7275] hover:text-[#121212] w-max block pr-6">Register</RouterLink>
              <RouterLink to="/login" class="text-[14px] leading-[24px] font-medium text-[#6C7275] hover:text-[#121212] w-max block pr-6">Login</RouterLink>
            </template>
            <template v-else>
              <button @click="logout" class="text-[14px] leading-[24px] font-medium text-[#6C7275] hover:text-[#121212] w-max block pr-6">Disconnect</button>
            </template>
          </div>
        </button>
        <RouterLink class="flex items-center space-x-[5px]" to="/cart">
          <svg
            class="outline-shopping-bag"
            width="24"
            height="24"
            viewBox="0 0 24 24"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              d="M9 6L9 7C9 8.65685 10.3431 10 12 10C13.6569 10 15 8.65685 15 7V6"
              stroke="#141718"
              stroke-width="1.5"
              stroke-linecap="round"
              stroke-linejoin="round"
            />
            <path
              d="M15.6115 3H8.38851C6.43316 3 4.7644 4.41365 4.44294 6.3424L2.77627 16.3424C2.36992 18.7805 4.25009 21 6.72185 21H17.2782C19.7499 21 21.6301 18.7805 21.2237 16.3424L19.5571 6.3424C19.2356 4.41365 17.5669 3 15.6115 3Z"
              stroke="#141718"
              stroke-width="1.5"
              stroke-linejoin="round"
            />
          </svg>
          <div class="rounded-full flex items-center justify-center w-[20px] h-[20px] bg-[#141718]">
            <span class="text-white text-[12px] font-bold leading-[10px]">{{ totalCartItems }}</span>
          </div>
        </RouterLink>
      </div>
    </div>
  </nav>
</template>
