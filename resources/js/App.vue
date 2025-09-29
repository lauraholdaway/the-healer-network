<script setup>
import Navbar from './components/Navbar.vue'
import Footer from './components/Footer.vue'
import { useRoute } from "vue-router";

const route = useRoute();
</script>
<template>
  <div>
    <!-- ✅ Navbar always visible -->
    <Navbar  v-if="!route.meta.hideNav"/>

    <!-- ✅ Page content changes here -->
    <router-view />
    <Footer v-if="!route.meta.hideFooter"/>
  </div>
</template>

