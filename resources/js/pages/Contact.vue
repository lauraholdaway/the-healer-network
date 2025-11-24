<template>
    <section class="contact-section " style="padding-top: 100px; background-color: #FBF9F7; padding-bottom: 200px;">
        <div class="container">
            <div class="row align-items-center">

                <!-- Left: Form Section -->
                <div class="col-md-6 mb-4 mb-md-0">
                    <h3 class="mb-2 " style=" font-size: 45px; color: #7D684E; font-family: 'TheSeasons', serif !important; font-weight: 400;">Let’s  Talk, Reach Out <br>
                        To Us</h3>
                    <p class="text-muted mb-4" style="font-weight: 300; font-size: 13px; color: #5B4C3A;">
                        Do you have any question or suggestion? We are here <br> to help.
                    </p>
                    <hr style="border: 1px solid #8A7356; margin-bottom: 30px; margin-top: 20px; width: 90%;">

                    <form @submit.prevent="submitForm" class="contact-form">
                        <div class="form-row">
                            <div class="form-group form-group-half">
                                <label for="firstName">First Name</label>
                                <input v-model="form.first_name" id="firstName" type="text" class="form-input"
                                    required />
                            </div>

                            <div class="form-group form-group-half">
                                <label for="secondName">Second Name</label>
                                <input v-model="form.second_name" id="secondName" type="text" class="form-input" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input v-model="form.email" id="email" type="email" class="form-input" required />
                        </div>

                        <div class="form-group">
                            <label for="message">Your Message</label>
                            <textarea v-model="form.message" id="message" class="form-textarea" rows="4"
                                required></textarea>
                        </div>

                        <button type="submit" class="send-button" :disabled="loading">
                            {{ loading ? 'Sending...' : 'Send Message' }}
                        </button>
                    </form>

                    <!-- Success Message -->
                    <div v-if="success" class="success-message">
                        {{ success }}
                    </div>
                </div>

                <!-- Right: Image -->
                <div class="col-md-6 text-center">
                    <img src="/public/asset/images/contactpage1.png" alt="Contact Phone"
                        class="contact-image rounded-4 shadow-sm" />
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
  background-color: #FBF9F7;
}

/* Main form container with warm beige background */
.contact-form {
  background-color: #F4EFE6;
  border-radius: 16px;
  padding: 20px;

  max-width: 500px;
}

/* Form row for horizontal layout */
.form-row {
  display: flex;
  gap: 12px;
  margin-bottom: 16px;
}

/* Form group spacing */
.form-group {
  margin-bottom: 16px;
}

/* Half-width form groups for side-by-side layout */
.form-group-half {
  flex: 1;
  margin-bottom: 0;
}

/* Labels styling */
.form-group label {
  display: block;
  margin-bottom: 6px;
  font-weight: 500;
  color: #5B4C3A;
  font-size: 13px;
  font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
}

/* Input fields styling */
.form-input {
  width: 100%;
  padding: 10px 12px;
  border: 1px solid #D6CDBD;
  border-radius: 6px;
  background-color: #FFFFFF;
  font-size: 13px;
  color: #2E2D29;
  transition: all 0.3s ease;
  box-sizing: border-box;
}

.form-input:focus {
  outline: none;
  border-color: #8C7B6A;
  box-shadow: 0 0 0 3px rgba(140, 123, 106, 0.1);
}

.form-input::placeholder {
  color: #A69B8A;
}

/* Textarea styling */
.form-textarea {
  width: 100%;
  padding: 10px 12px;
  border: 1px solid #D6CDBD;
  border-radius: 6px;
  background-color: #FFFFFF;
  font-size: 13px;
  color: #2E2D29;
  transition: all 0.3s ease;
  box-sizing: border-box;
  resize: vertical;
  min-height: 80px;
  font-family: inherit;
}

.form-textarea:focus {
  outline: none;
  border-color: #8C7B6A;
  box-shadow: 0 0 0 3px rgba(140, 123, 106, 0.1);
}

.form-textarea::placeholder {
  color: #A69B8A;
}

/* Send button styling */
.send-button {
  width: 180px;
  background-color: #8A7356;
  color: #F5F0E6;
  border: none;
  border-radius: 8px;
  padding: 10px 20px;
  font-size: 14px;
  font-weight: 500;
  cursor: pointer;
  transition: all 0.3s ease;
  font-family: 'Cormorant Garamond', serif !important;
  text-align: center;
}

.send-button:hover:not(:disabled) {
  background-color: #7A6B5D;
  transform: translateY(-1px);
  box-shadow: 0 4px 12px rgba(140, 123, 106, 0.3);
}

.send-button:active:not(:disabled) {
  transform: translateY(0);
}

.send-button:disabled {
  background-color: #A69B8A;
  cursor: not-allowed;
  transform: none;
  box-shadow: none;
}

/* Success message styling */
.success-message {
  background-color: #D4EDDA;
  color: #155724;
  padding: 12px 16px;
  border-radius: 8px;
  margin-top: 16px;
  border: 1px solid #C3E6CB;
  font-size: 14px;
}

/* Heading styling */
h3 {
  font-family: 'Georgia', serif;
  color: #2b1d0f;
}

.text-muted {
  color: #5b4c3a !important;
}

.contact-image {
  max-width: 80%;
  height: auto;
  min-height: 580px;
  object-fit: cover;
}

/* Responsive adjustments */
@media (max-width: 768px) {
  .contact-section {
    padding-top: 60px !important;
    padding-bottom: 60px !important;
  }

  h3 {
    font-size: 32px !important;
    text-align: center;
  }

  .text-muted {
    text-align: center;
    font-size: 12px !important;
  }

  hr {
    width: 100% !important;
    margin-left: auto;
    margin-right: auto;
  }

  .contact-form {
    padding: 16px;
    max-width: 100%;
    margin: 0 auto;
  }

  .form-row {
    flex-direction: column;
    gap: 0;
  }

  .form-group-half {
    margin-bottom: 16px;
  }

  .form-group {
    margin-bottom: 16px;
  }

  .send-button {
    width: 100%;
    padding: 12px 16px;
    font-size: 14px;
  }

  .contact-image {
    max-width: 100%;
    min-height: auto;
    height: auto;
    margin-top: 30px;
  }

  .success-message {
    font-size: 13px;
    padding: 10px 14px;
  }
}

/* Extra small devices (phones, less than 576px) */
@media (max-width: 576px) {
  .contact-section {
    padding-top: 40px !important;
    padding-bottom: 40px !important;
  }

  h3 {
    font-size: 28px !important;
  }

  .contact-form {
    padding: 14px;
  }

  .form-group label {
    font-size: 12px;
  }

  .form-input,
  .form-textarea {
    font-size: 12px;
    padding: 8px 10px;
  }

  .send-button {
    padding: 10px 14px;
    font-size: 13px;
  }
}
</style>
