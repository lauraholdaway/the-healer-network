<template>
    <footer class="footer-container">
        <div class="container">
            <div class="footer-main">
                <!-- Logo Section -->
                <div class="footer-logo">
                    <img src="/public/asset/images/dark-logo.png" width="150px" alt="THN Logo">
                </div>

                <!-- Wellbeing Articles -->
                <div class="footer-section first-section">
                    <h6 class="section-title">Wellbeing articles</h6>
                    <ul class="footer-links">
                        <li v-for="blog in blogs"><router-link :to="`/blog/${blog.id}`">{{ limitWords(blog?.title, 3)
                        }}</router-link>
                        </li>
                    </ul>
                </div>

                <!-- Support -->
                <div class="footer-section support-section">
                    <h6 class="section-title">Support</h6>
                    <ul class="footer-links">
                        <li><a href="#">Client FAQs</a></li>
                        <li><a href="#">Healer FAQs</a></li>
                        <li><a href="#">Get In Touch</a></li>
                    </ul>
                </div>

                <!-- Subscribe -->
                <div class="footer-section subscribe-section">
                    <h6 class="section-title">Subscribe</h6>
                    <p class="subscribe-description">
                        Subscribe to our newsletter to receive monthly updates of upcoming events, newly added holistic
                        healers and top tips to enhance your wellbeing.
                    </p>
                    <form @submit.prevent='savEmail' class="subscribe-form">
                        <input type="email" v-model="form.email" class="email-input" placeholder="Your email address">
                        <button type="submit" class="subscribe-btn">Subscribe</button>
                    </form>
                </div>
            </div>
            <!-- Footer Bottom -->
            <hr class="footer-separator">
            <div class="footer-bottom">
                <div class="copyright">© All copyrights reserved - THN 2025</div>
                <div class="social-section">
                    <span class="social-text">Follow Us On Socials</span>
                    <div class="social-icons">
                        <a href="#" class="social-icon facebook">
                            <img src="/public/asset/images/facebookicon.svg" alt="Facebook">
                        </a>
                        <a href="#" class="social-icon instagram">
                            <img src="/public/asset/images/instagramicon.svg" alt="Instagram">
                        </a>
                        <a href="#" class="social-icon twitter">
                            <img src="/public/asset/images/xicon.svg" alt="X">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</template>
<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';
import { useNotification } from "@kyvg/vue3-notification";
const blogs = ref([])
const { notify } = useNotification()
const form = ref({
    email: ''
})

const savEmail = async () => {
    try {

        await axios.post('/api/saveEmail', form.value)

        notify({
            title: "Email",
            text: "You have been Subscrib Newsleter",
        });

    } catch (error) {
        notify({ type: "error", text: "" + error?.response?.data?.message || 'Unknown error' });
    }
}

onMounted(async () => {
    try {
        const res = await axios.get('/api/blogs');
        blogs.value = res.data;
    } catch (error) {
        console.error('Blogs API', error);
    }
});

function limitWords(text, count) {
    const words = text.split(' ')
    return words.length > count ? words.slice(0, count).join(' ') + '...' : text
}
</script>

<style scoped>
.footer-container {
  background-color: #F5F1E8;
  color: #4A4A4A;
  padding: 80px 0 30px;
  font-family: 'Inter', sans-serif;
  margin-top: 60px;
}


@media (min-width: 1700px) {
  .footer-container {
    padding: 80px 0 30px;
  }

  .footer-logo {
    margin-top: 0;
  }

  .footer-section {
    padding-top: 120px;
  }
}
.footer-container .container {
  text-align: left;
}

.footer-main {
  display: flex;
  gap: 40px;
  align-items: flex-start;
  justify-content: flex-start;
  margin-bottom: 40px;
}

.footer-logo {
  flex: 0.1;
  border-right: 1px solid #DED1BA;
  padding-right: 30px;
  padding-left: 0;
  padding-top: 20px;
  padding-bottom: 20px;
  text-align: left;
  align-self: stretch;
  display: flex;
  align-items: flex-start;
}

.footer-logo img {
  max-width: 150px;
  height: auto;
  border: none;
  outline: none;
}

.footer-section {
  flex: 0.8;
  border-right: 1px solid #DED1BA;
  padding-right: 30px;
  padding-left: 0;
  padding-top: 120px;
  padding-bottom: 20px;
  text-align: left;
  align-self: stretch;
}

.first-section {
  padding-left: 0;
  margin-top: 0;
}

.support-section {
  border-right: 1px solid #DED1BA;
  margin-top: 0;
}

.subscribe-section {
  border-right: none;
  border-bottom: none;
  flex: 2;
  padding-left: 0;
  text-align: left;
  margin-top: 0;
}

.section-title {
  font-family: 'Playfair Display', serif;
  font-size: 18px;
  font-weight: 600;
  color: #4A4A4A;
  margin-bottom: 15px;
  text-transform: capitalize;
  text-align: left;
  margin-left: 0;
  padding-left: 0;
  position: relative;
  padding-bottom: 12px;
}

.section-title::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
  height: 1px;
  background-color: #DED1BA;
}

.footer-links {
  list-style: none;
  padding: 0;
  margin: 0;
}

.footer-links li {
  margin-bottom: 12px;
}

.footer-links a {
  color: #4A4A4A;
  text-decoration: none;
  font-size: 14px;
  font-weight: 400;
  transition: color 0.3s ease;
}

.footer-links a:hover {
  color: #8B7355;
}

.subscribe-description {
  font-size: 12px;
  line-height: 1.6;
  color: #4A4A4A;
  margin-bottom: 25px;
}

.subscribe-form {
  display: flex;
  gap: 10px;
  align-items: center;
}

.email-input {
  flex: 1;
  padding: 14px 20px;
  border: 1px solid #DED1BA;
  border-radius: 25px;

  color: #4A4A4A;
  font-size: 14px;
  background-color: #DED1BA;
  outline: none;
  transition: all 0.3s ease;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.email-input::placeholder {

  color: #8B8B8B;
}

.email-input:focus {
  border-color: #8B7355;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
}

.subscribe-btn {
  padding: 14px 28px;
  background-color: #5B4C3A;
  color: white;
  border: none;
  border-radius: 25px;
  font-size: 14px;
  font-weight: 500;
  cursor: pointer;
  transition: all 0.3s ease;
  white-space: nowrap;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.subscribe-btn:hover {
  background-color: #4b4032;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
}

.footer-top-separator {
  border: none;
  height: 1px;
  background-color: #DED1BA;
  margin: 0 0 40px 0;
}

.footer-separator {
  border: none;
  height: 1px;
  background-color: #DED1BA;
  margin: 30px 0 20px 0;
  display: none;
}

.footer-bottom {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding-top: 20px;
}

.copyright {
  font-size: 14px;
  color: #4A4A4A;
}

.social-section {
  display: flex;
  align-items: center;
  gap: 15px;
}

.social-text {
  font-size: 14px;
  color: #4A4A4A;
  font-weight: 500;
  font-family: 'Playfair Display', serif;
}

.social-icons {
  display: flex;
  gap: 8px;
}

.social-icon {
  width: 32px;
  height: 32px;
  border-radius: 50%;
  background-color: #5B4C3A;
  color: white;
  display: flex;
  align-items: center;
  justify-content: center;
  text-decoration: none;
  transition: background-color 0.3s ease;
}

.social-icon:hover {
  background-color: #8B7355;
}

.social-icon img {
  width: 16px;
  height: 16px;
  filter: brightness(0) invert(1);
}

/* Responsive Design */

@media (max-width: 1500px) {
  .footer-section {
    padding-top: 20px;
  }

  .footer-logo img {
  max-width: 100px;
  height: auto;
  border: none;
  outline: none;
}
}

/* Large Tablets and Small Laptops */
@media (max-width: 1024px) {
  .footer-main {
    gap: 30px;
  }

  .footer-section {
    padding-right: 20px;
  }

  .subscribe-description {
    font-size: 11px;
  }
}

/* Tablets */
@media (max-width: 768px) {
  .footer-container {
    padding: 50px 0 25px;
  }

  .footer-main {
    flex-direction: column;
    gap: 25px;
  }

  .footer-section {
    border-right: none;
    border-bottom: 2px solid #DED1BA;
    padding-right: 0;
    padding-bottom: 25px;
    flex: 1;
  }

  .subscribe-section {
    border-bottom: none;
    padding-bottom: 0;
  }

  .section-title {
    font-size: 17px;
  }

  .footer-links a {
    font-size: 13px;
  }

  .subscribe-description {
    font-size: 12px;
  }

  .footer-bottom {
    flex-direction: column;
    gap: 20px;
    text-align: center;
  }

  .social-section {
    flex-direction: column;
    gap: 12px;
  }

  .copyright {
    font-size: 13px;
  }
}

/* Mobile Devices */
@media (max-width: 576px) {
  .footer-container {
    padding: 40px 0 20px;
  }

  .footer-main {
    gap: 20px;
  }

  .footer-logo img {
    max-width: 90px;
  }

  .footer-section {
    padding-bottom: 20px;
  }

  .section-title {
    font-size: 16px;
    margin-bottom: 12px;
  }

  .footer-links li {
    margin-bottom: 10px;
  }

  .footer-links a {
    font-size: 12px;
  }

  .subscribe-description {
    font-size: 11px;
    line-height: 1.5;
    margin-bottom: 20px;
  }

  .subscribe-form {
    flex-direction: column;
    align-items: stretch;
    gap: 12px;
  }

  .email-input {
    padding: 12px 18px;
    font-size: 13px;
  }

  .subscribe-btn {
    width: 100%;
    padding: 12px 24px;
    font-size: 13px;
  }

  .footer-separator {
    margin: 25px 0;
  }

  .footer-bottom {
    padding-top: 15px;
    gap: 15px;
  }

  .copyright {
    font-size: 12px;
  }

  .social-text {
    font-size: 13px;
  }

  .social-icon {
    width: 30px;
    height: 30px;
  }

  .social-icon img {
    width: 14px;
    height: 14px;
  }
}

/* Extra Small Devices */
@media (max-width: 380px) {
  .footer-container {
    padding: 30px 0 15px;
  }

  .footer-logo img {
    max-width: 75px;
  }

  .section-title {
    font-size: 15px;
  }

  .footer-links a {
    font-size: 11px;
  }

  .subscribe-description {
    font-size: 10px;
  }

  .email-input,
  .subscribe-btn {
    font-size: 12px;
    padding: 10px 16px;
  }

  .copyright,
  .social-text {
    font-size: 11px;
  }

  .social-icon {
    width: 28px;
    height: 28px;
  }

  .social-icons {
    gap: 6px;
  }
}
</style>
