<template>
<section class="contact-section py-5">
  <div class="container">
    <div class="row align-items-center">

      <!-- Left: Form Section -->
      <div class="col-md-6 mb-4 mb-md-0">
        <h3 class="fw-semibold mb-2">Let's Talk, Reach Out To Us</h3>
        <p class="text-muted mb-4">
          Do you have any question or suggestion? We are here to help.
        </p>

        <form @submit.prevent="submitForm" class="p-4 rounded-4 form-box">
          <div class="row g-3">
            <div class="col-md-6">
              <input v-model="form.first_name" type="text" class="form-control" placeholder="First Name" required />
            </div>
            <div class="col-md-6">
              <input v-model="form.second_name" type="text" class="form-control" placeholder="Second Name" />
            </div>
            <div class="col-12">
              <input v-model="form.email" type="email" class="form-control" placeholder="Email" required />
            </div>
            <div class="col-12">
              <textarea v-model="form.message" class="form-control" rows="4" placeholder="Your Message" required></textarea>
            </div>
            <div class="col-12">
              <button type="submit" class="btn send-btn w-100 main-btn" :disabled="loading">
                {{ loading ? 'Sending...' : 'Send Message' }}
              </button>
            </div>
          </div>
        </form>

        <!-- Success Message -->
        <div v-if="success" class="alert alert-success mt-3">
          {{ success }}
        </div>
      </div>

      <!-- Right: Image -->
      <div class="col-md-6 text-center">
        <img src="/public/asset/images/contactpage.png" alt="Contact Phone" class="img-fluid rounded-4 shadow-sm" />
      </div>
    </div>
  </div>
</section>
</template>

<script>
import axios from "axios";

export default {
  name: "ContactForm",
  data() {
    return {
      form: {
        first_name: "",
        second_name: "",
        email: "",
        message: "",
      },
      loading: false,
      success: "",
    };
  },
  methods: {
    async submitForm() {
      this.loading = true;
      this.success = "";
      try {
        const response = await axios.post("/api/contact", this.form);
        this.success = response.data.message;
        this.form = { first_name: "", second_name: "", email: "", message: "" };
      } catch (error) {
        console.error(error);
        alert("Failed to send message. Please try again.");
      } finally {
        this.loading = false;
      }
    },
  },
};
</script>

<style scoped>
.contact-section {
  background-color: #f8f4ee;
}

.form-box {
  background-color: #f4efe6;
  border: 1px solid #e5ddcc;
}

.form-control {
  border: 1px solid #d6cdbd;
  border-radius: 8px;
  padding: 10px 14px;
}

.form-control:focus {
  border-color: #bfa57a;
  box-shadow: none;
}

.send-btn {
  background-color: #6c5433;
  color: #fff;
  font-weight: 500;
  border-radius: 8px;
  padding: 10px;
  transition: 0.3s ease;
}

.send-btn:hover {
  background-color: #5b462b;
}

h3 {
  font-family: 'Georgia', serif;
  color: #2b1d0f;
}

.text-muted {
  color: #5b4c3a !important;
}
</style>
