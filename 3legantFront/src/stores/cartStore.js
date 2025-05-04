import { defineStore } from 'pinia'

export const useCartStore = defineStore('cart', {
  state: () => ({
    items: [],
  }),
  getters: {
    cartCount: (state) => state.items.reduce((total, item) => total + item.quantity, 0),
    cartTotal: (state) =>
      state.items.reduce((total, item) => {
        return total + item.price * item.quantity
      }, 0),
    cartItems: (state) => state.items,
  },

  actions: {
    addToCart(product, quantity = 1) {
      const existingItem = this.items.find((item) => item.id === product.id)
      if (existingItem) {
        existingItem.quantity += quantity
      } else {
        this.items.push({
          id: product.id,
          name: product.name,
          price: product.price,
          imagePath: product.imagePath,
          //color: product.color || 'black',
          quantity: quantity,
        })
      }
    },

    updateQuantity(productId, quantity) {
      const item = this.items.find((item) => item.id === productId)

      if (item) {
        item.quantity = quantity
      }
    },

    removeFromCart(productId) {
      const index = this.items.findIndex((item) => item.id === productId)
      if (index !== -1) {
        this.items.splice(index, 1)
      }
    },

    totalItems() {
      return this.items.reduce((total, item) => total + item.quantity, 0)
    },
  },
})
