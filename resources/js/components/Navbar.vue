<template>
  <nav class="navbar navbar-expand-lg navbar-light  shadow-sm p-0 m-0">
    <div class="container-fluid p-0 m-0">
      <!-- ✅ Logo -->
      <router-link to="/" class="navbar-brand d-flex align-items-center ps-md-5">
       <img src="/public/asset/images/white_logo.png" alt="Logo" style="height: 60px;" />

      </router-link>

      <!-- ✅ Toggler for mobile -->
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#mainNavbar"
        aria-controls="mainNavbar"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- ✅ Menu Items -->
      <div class="collapse navbar-collapse text-end text-white  ps-md-5" id="mainNavbar">
        <ul class="navbar-nav mx-auto ">
          <li class="nav-item">
            <router-link class="nav-link" to="/">Home</router-link>
          </li>
          <li class="nav-item">
            <router-link class="nav-link" to="/about">About</router-link>
          </li>

          <li class="nav-item dropdown">
            <a
              class="nav-link dropdown-toggle"
              href="#"
              id="findHealerDropdown"
              role="button"
              data-bs-toggle="dropdown"
              aria-expanded="false"
            >
              Services
            </a>
            <ul class="dropdown-menu" aria-labelledby="findHealerDropdown">
              <li><router-link class="dropdown-item" to="/Services">Services</router-link></li>
              <li><router-link class="dropdown-item" to="/locations">Services</router-link></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a
              class="nav-link dropdown-toggle"
              href="#"
              id="findHealerDropdown"
              role="button"
              data-bs-toggle="dropdown"
              aria-expanded="false"
            >
              Find My Healer
            </a>
            <ul class="dropdown-menu" aria-labelledby="findHealerDropdown">
              <li><router-link class="dropdown-item" to="/healers">All Healers</router-link></li>
              <li><router-link class="dropdown-item" to="/locations">By Location</router-link></li>
            </ul>
          </li>
          <li class="nav-item">
            <router-link class="nav-link d-md-none d-sm-flix text-white" to="/login">Book Now</router-link>
          </li>
        </ul>

        <!-- ✅ Auth Buttons -->
        <div class="d-flex shopnowBTN">

          <button
            v-if="!isAuthenticated"
            @click="$router.push('/login')"
            class="booknow border-0"
          >
            Book Now →
          </button>


          <div v-else class="d-flex align-items-center">
            <span class="me-3 fw-semibold">{{ user?.name }}</span>
            <button @click="logout" class="btn btn-outline-danger btn-sm">Logout</button>
          </div>
        </div>
      </div>
    </div>
  </nav>
</template>

<script setup>
import { ref } from 'vue'

// Example state (later connect to Vuex/Pinia or API)
const isAuthenticated = ref(false)
const user = ref({ name: 'John Doe' })

const logout = () => {
  isAuthenticated.value = false
  user.value = null
  // TODO: call Laravel API logout
}
</script>
