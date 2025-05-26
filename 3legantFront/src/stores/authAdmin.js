// stores/authAdmin.js
import { defineStore } from 'pinia'

export const useAuthAdminStore = defineStore('authAdmin', {
  state: () => ({
    token: localStorage.getItem('access_token') || null,
  }),
  getters: {
    isAuthenticated: (state) => !!state.token,
  },
  actions: {
    setToken(token) {
      this.token = token
      localStorage.setItem('access_token', token)

    },
  },
})
