import { defineStore } from 'pinia'
import axios from 'axios'
import router from '../router'

export const useAuthStore = defineStore('auth', {
  state: () => ({
    user: JSON.parse(localStorage.getItem('user')) || null, // ✅ restore user too
    token: localStorage.getItem('token') || null,
    isInitialized: false,
  }),

  getters: {
    isAuthenticated: state => !!state.token,
  },

  actions: {
    setToken(token) {
      this.token = token
      if (token) {
        localStorage.setItem('token', token)
        axios.defaults.headers.common['Authorization'] = `Bearer ${token}`
      } else {
        localStorage.removeItem('token')
        delete axios.defaults.headers.common['Authorization']
      }
    },

    setUser(user) {
      this.user = user
      if (user) {
        localStorage.setItem('user', JSON.stringify(user))
      } else {
        localStorage.removeItem('user')
      }
    },

    async initialize() {
      if (this.isInitialized) return
      this.isInitialized = true

      if (this.token) {
        axios.defaults.headers.common['Authorization'] = `Bearer ${this.token}`
        try {
          const { data } = await axios.get('/api/user')
          this.setUser(data)
        } catch (e) {
          this.setToken(null)
          this.setUser(null)
        }
      }
    },



    async login(payload) {
      const { data } = await axios.post('/api/login', payload)
      this.setToken(data.access_token)
      this.setUser(data.user)
      return data
    },

    async register(payload) {
      const { data } = await axios.post('/api/register', payload)
      this.setToken(data.access_token)
      this.setUser(data.user)
      return data
    },

    async logout() {
      try {
        await axios.post('/api/logout')
      } catch (e) {
        // ignore if backend session expired
      }
      this.setToken(null)
      this.setUser(null)
      router.push('/')
    },
  }
})
