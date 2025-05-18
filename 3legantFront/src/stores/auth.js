import { defineStore } from 'pinia'
import axios from 'axios'

export const useAuthStore = defineStore('auth', {
  state: () => ({
    // Utiliser la même clé 'token' partout pour la cohérence
    token: localStorage.getItem('token') || null,
  }),
  getters: {
    isAuthenticated: (state) => !!state.token,
  },
  actions: {
    login(token) {
      this.token = token
      // Utiliser la même clé 'token' que dans le composant Login
      localStorage.setItem('token', token)
      // Configurer l'en-tête d'autorisation pour toutes les requêtes
      axios.defaults.headers.common['Authorization'] = `Bearer ${token}`
    },
    logout() {
      // Réinitialiser le token dans le state
      this.token = null
      // Supprimer le token avec la même clé que celle utilisée pour le stockage
      localStorage.removeItem('token')
      // Supprimer l'en-tête d'autorisation
      delete axios.defaults.headers.common['Authorization']
    },
    // Méthode pour vérifier et restaurer la session au chargement de l'application
    checkAuth() {
      const token = localStorage.getItem('token')
      if (token) {
        this.token = token
        axios.defaults.headers.common['Authorization'] = `Bearer ${token}`
      }
    }
  },
})
