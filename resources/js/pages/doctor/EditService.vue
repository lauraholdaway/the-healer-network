<template>
    <section class="edit-service-page">
        <div class="content-card">
            <!-- Header Section -->
            <div class="page-header d-flex justify-content-between">


                <div class="title-section">
                    <svg width="21" height="26" viewBox="0 0 21 26" fill="none" xmlns="http://www.w3.org/2000/svg"
                        class="title-icon">
                        <path
                            d="M6.42857 3.66667H3.71429C2.99441 3.66667 2.30402 3.94762 1.795 4.44772C1.28597 4.94781 1 5.62609 1 6.33333V22.3333C1 23.0406 1.28597 23.7189 1.795 24.219C2.30402 24.719 2.99441 25 3.71429 25H17.2857C18.0056 25 18.696 24.719 19.205 24.219C19.714 23.7189 20 23.0406 20 22.3333V6.33333C20 5.62609 19.714 4.94781 19.205 4.44772C18.696 3.94762 18.0056 3.66667 17.2857 3.66667H14.5714M6.42857 3.66667C6.42857 2.95942 6.71454 2.28115 7.22357 1.78105C7.73259 1.28095 8.42298 1 9.14286 1H11.8571C12.577 1 13.2674 1.28095 13.7764 1.78105C14.2855 2.28115 14.5714 2.95942 14.5714 3.66667M6.42857 3.66667C6.42857 4.37391 6.71454 5.05219 7.22357 5.55229C7.73259 6.05238 8.42298 6.33333 9.14286 6.33333H11.8571C12.577 6.33333 13.2674 6.05238 13.7764 5.55229C14.2855 5.05219 14.5714 4.37391 14.5714 3.66667M6.42857 13H6.44214M11.8571 13H14.5714M6.42857 18.3333H6.44214M11.8571 18.3333H14.5714"
                            stroke="#8A7356" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <h1 class="page-title Seasons-fonts">Update Service</h1>
                </div>
                <div class="header-top">
                    <router-link to="/Docterdashboard/Myservice" class="back-btn">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M19 12H5M5 12L12 19M5 12L12 5" stroke="#8A7356" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        Go Back
                    </router-link>
                </div>
            </div>
            <hr class="divider">

            <!-- Form Section -->
            <form @submit.prevent="updateService" class="service-form">
                <div class="row">
                    <!-- Service Title -->
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Service Title</label>
                        <input v-model="form.title" type="text" class="form-control" placeholder="Enter service title"
                            required>
                    </div>

                    <!-- Rate Per Session -->
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Rate Per Session</label>
                        <input v-model="form.rate_per_session" type="number" class="form-control" placeholder="0"
                            min="0">
                    </div>

                    <!-- Currency -->
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Currency</label>
                        <select v-model="form.currency" class="form-select">
                            <option value="USD">US Dollars</option>
                            <option value="PKR">PKR</option>
                            <option value="EUR">Euro</option>
                        </select>
                    </div>
                </div>


                <!-- Description -->
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea v-model="form.description" class="form-control" rows="5"
                        placeholder="Describe your service in detail..."></textarea>
                </div>

                <!-- Ideal For & Session Type -->
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Ideal For</label>
                        <input v-model="form.ideal_for" type="text" class="form-control"
                            placeholder="Who is this service ideal for?">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Session Type</label>
                        <select v-model="form.session_type" class="form-select">
                            <option>In Person & Online</option>
                            <option>In Person Only</option>
                            <option>Online Only</option>
                        </select>
                    </div>
                </div>
                <div class="form-actions">
                    <router-link to="/Docterdashboard/Myservice" class="cancel-btn">
                        Cancel
                    </router-link>
                    <button type="submit" class="submit-btn">
                        Update Service
                    </button>
                </div>
            </form>
        </div>
    </section>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import axios from 'axios'
import { useRoute, useRouter } from 'vue-router'

const route = useRoute()
const router = useRouter()

const form = ref({
    title: '',
    description: '',
    rate_per_session: 0,
    currency: 'USD',
    ideal_for: '',
    session_type: 'In Person & Online'
})

const fetchService = async () => {
    const res = await axios.get(`/api/services/${route.params.id}`)
    form.value = res.data
}

const updateService = async () => {
    await axios.put(`/api/services/${route.params.id}`, form.value)
    router.push({ name: 'Myservice' })
}

onMounted(fetchService)
</script>

<style scoped>
/* Main Page Container */
.edit-service-page {
    padding: 20px;
    background: transparent;
    min-height: 100vh;
}

/* White Card Container */
.content-card {
    background: #ffffff;
    border-radius: 12px;
    padding: 30px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
    max-width: 1000px;
}

/* Page Header */
.page-header {
    margin-bottom: 24px;
}

.header-top {
    margin-bottom: 20px;
}

.back-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    color: #8A7356;
    text-decoration: none;
    font-weight: 500;
    padding: 8px 16px;
    border-radius: 8px;
    border: 1px solid #DED1BA;
    transition: all 0.3s ease;
    background: transparent;
}

.back-btn:hover {
    background: #F4EFE6;
    color: #5B4C3A;
    border-color: #C1B39D;
    text-decoration: none;
}

.back-btn svg {
    width: 20px;
    height: 20px;
}

.title-section {
    display: flex;
    align-items: center;
    gap: 12px;
}

.title-icon {
    width: 21px;
    height: 26px;
}

.page-title {
    font-size: 28px;
    font-weight: 600;
    color: #8A7356;
    margin: 0;
    font-style: italic;
}

.divider {
    border: none;
    border-top: 1px solid #DED1BA;
    margin: 24px 0;
}

/* Form Styles */
.service-form {
    margin-top: 24px;
}

.form-row {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 20px;
    margin-bottom: 20px;
}

.form-group {
    display: flex;
    flex-direction: column;
}

.form-group-large {
    grid-column: span 2;
}

.form-label {
    font-size: 14px;
    font-weight: 500;
    color: #5B4C3A;
    margin-bottom: 8px;
}

.form-input,
.form-select,
.form-textarea {
    padding: 12px 16px;
    border: 1px solid #DED1BA;
    border-radius: 8px;
    font-size: 14px;
    color: #333;
    transition: all 0.3s ease;
    background: #ffffff;
}

.form-input:focus,
.form-select:focus,
.form-textarea:focus {
    outline: none;
    border-color: #8A7356;
    box-shadow: 0 0 0 3px rgba(138, 115, 86, 0.1);
}

.form-input::placeholder,
.form-textarea::placeholder {
    color: #999;
}

.form-textarea {
    resize: vertical;
    min-height: 120px;
    font-family: inherit;
    line-height: 1.5;
}

.form-select {
    cursor: pointer;
    appearance: none;
    background-image: url("data:image/svg+xml,%3Csvg width='12' height='8' viewBox='0 0 12 8' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1 1.5L6 6.5L11 1.5' stroke='%238A7356' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right 12px center;
    padding-right: 40px;
}

/* Form Actions */
.form-actions {
    display: flex;
    gap: 12px;
    justify-content: flex-end;
    margin-top: 32px;
    padding-top: 24px;
    border-top: 1px solid #DED1BA;
}

.cancel-btn {
    padding: 12px 24px;
    border-radius: 8px;
    font-weight: 500;
    text-decoration: none;
    transition: all 0.3s ease;
    border: 1px solid #DED1BA;
    color: #8A7356;
    background: transparent;
    cursor: pointer;
}

.cancel-btn:hover {
    background: #F4EFE6;
    color: #5B4C3A;
    border-color: #C1B39D;
    text-decoration: none;
}

.submit-btn {
    padding: 12px 32px;
    border-radius: 8px;
    font-weight: 500;
    border: none;
    background: #8A7356;
    color: white;
    cursor: pointer;
    transition: all 0.3s ease;
}

.submit-btn:hover {
    background: #5B4C3A;
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(138, 115, 86, 0.3);
}

.submit-btn:active {
    transform: translateY(0);
}

/* Responsive Design */
@media (max-width: 768px) {
    .edit-service-page {
        padding: 16px;
    }

    .content-card {
        padding: 20px;
    }

    .page-title {
        font-size: 24px;
    }

    .form-row {
        grid-template-columns: 1fr;
        gap: 16px;
    }

    .form-group-large {
        grid-column: span 1;
    }

    .form-actions {
        flex-direction: column-reverse;
    }

    .cancel-btn,
    .submit-btn {
        width: 100%;
        text-align: center;
    }
}

@media (max-width: 480px) {
    .content-card {
        padding: 16px;
    }

    .page-title {
        font-size: 20px;
    }

    .back-btn {
        padding: 6px 12px;
        font-size: 14px;
    }
}
</style>
