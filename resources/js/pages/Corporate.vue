<template>
  <div class="flex flex-col items-center justify-center h-screen bg-gray-100 text-center my-5 p-5">
    <div class="bg-white shadow-lg rounded-2xl p-10 max-w-md p-5">
      <h1 class="text-2xl font-semibold text-gray-800 mb-2">
        🚧 Page Under Development
      </h1>
      <p class="text-gray-600">
        The developer is currently working on this page. It will be available
        once the manager approves it.
      </p>
      <button
        class="btn main-btn"
      >
        Get Started
      </button>
    </div>
  </div>
</template>

<style scoped>
/* Add subtle fade-in animation */
@keyframes fadeIn {
  from {
    opacity: 0;
    transform: translateY(10px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

div {
  animation: fadeIn 0.6s ease-in-out;
}
</style>
