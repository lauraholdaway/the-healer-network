<template>
    <div class="container py-4">
        <div class="cards p-4 shadow-sm">
            <router-link to="/Docterdashboard/Myservice" class="btn btn-outline-custome m-0">Go Back</router-link>
            <div class="d-flex mt-2">
                <svg width="21" height="26" viewBox="0 0 21 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M6.42857 3.66667H3.71429C2.99441 3.66667 2.30402 3.94762 1.795 4.44772C1.28597 4.94781 1 5.62609 1 6.33333V22.3333C1 23.0406 1.28597 23.7189 1.795 24.219C2.30402 24.719 2.99441 25 3.71429 25H17.2857C18.0056 25 18.696 24.719 19.205 24.219C19.714 23.7189 20 23.0406 20 22.3333V6.33333C20 5.62609 19.714 4.94781 19.205 4.44772C18.696 3.94762 18.0056 3.66667 17.2857 3.66667H14.5714M6.42857 3.66667C6.42857 2.95942 6.71454 2.28115 7.22357 1.78105C7.73259 1.28095 8.42298 1 9.14286 1H11.8571C12.577 1 13.2674 1.28095 13.7764 1.78105C14.2855 2.28115 14.5714 2.95942 14.5714 3.66667M6.42857 3.66667C6.42857 4.37391 6.71454 5.05219 7.22357 5.55229C7.73259 6.05238 8.42298 6.33333 9.14286 6.33333H11.8571C12.577 6.33333 13.2674 6.05238 13.7764 5.55229C14.2855 5.05219 14.5714 4.37391 14.5714 3.66667M6.42857 13H6.44214M11.8571 13H14.5714M6.42857 18.3333H6.44214M11.8571 18.3333H14.5714"
                        stroke="#8A7356" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>

                <h4 class="mb-3 ms-2 Seasons-fonts">Add New Services</h4>
            </div>
            <hr>
            <p class="m-color">Please provide the service title, a detailed description, the rate per session, and
                specify the ideal audience or use case for this service.</p>
            <form @submit.prevent="saveService">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label>Title</label>
                        <input v-model="form.title" class="form-control" required>
                    </div>
                    <div class="col-md-3">
                        <label>Rate Per Session</label>
                        <input type="number" v-model="form.rate_per_session" class="form-control" min="0">
                    </div>
                    <div class="col-md-3">
                        <label>Currency</label>
                        <select v-model="form.currency" class="form-select">
                            <option value="USD">US Dollars</option>
                            <option value="PKR">PKR</option>
                            <option value="EUR">Euro</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label>Description</label>
                    <textarea v-model="form.description" class="form-control"></textarea>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label>Ideal For</label>
                        <input v-model="form.ideal_for" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label>Session Type</label>
                        <select v-model="form.session_type" class="form-select">
                            <option>In Person & Online</option>
                            <option>In Person Only</option>
                            <option>Online Only</option>
                        </select>
                    </div>
                </div>

                <button class="btn main-btn" type="submit">
                    {{ editing ? 'Update Service' : 'Add Service' }}
                </button>
            </form>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import axios from 'axios'
import { useRouter } from 'vue-router'
const form = ref({
    title: '',
    description: '',
    rate_per_session: 0,
    currency: 'USD',
    ideal_for: '',
    session_type: 'In Person & Online'
})
const services = ref([])
const editing = ref(false)
const router = useRouter()
let editId = null



const saveService = async () => {
    if (editing.value) {
        await axios.put(`/api/services/${editId}`, form.value)
    } else {
        await axios.post('/api/services', form.value)
    }
    router.push('/Docterdashboard/Myservice')
    resetForm()
}

const editService = (s) => {
    form.value = { ...s }
    editing.value = true
    editId = s.id
}



const resetForm = () => {
    form.value = {
        title: '',
        description: '',
        rate_per_session: 0,
        currency: 'USD',
        ideal_for: '',
        session_type: 'In Person & Online'
    }
    editing.value = false
    editId = null
}

</script>
