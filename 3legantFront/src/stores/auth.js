// stores/authAdmin.js
import { defineStore } from 'pinia'

export const useAuthAdminStore = defineStore('authAdmin', {
  state: () => ({
    token: localStorage.getItem('admin_token') || null,
  }),
  getters: {
    isAuthenticated: (state) => !!state.token,
  },
  actions: {
    login(token) {
      this.token = token
      localStorage.setItem('admin_token', token)
    },
  },
})
