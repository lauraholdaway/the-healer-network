<template>
    <div class="container my-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="h4 mb-0 Seasons-fonts">Appointment Details</h2>
            <div>
                <button class="btn btn-sm main-btn2 me-2" @click="goBack">Back</button>
                <button v-if="resultdatas.payment_id" class="btn btn-sm btn-outline-custome" @click="">Print</button>
            </div>
        </div>
        <hr>

        <div class="cards shadow-sm">
            <div class="card-body">
                <div class="row g-3">
                    <!-- Left column: Basic info -->
                    <div class="col-lg-8">
                        <div class="row gy-3">
                            <div class="col-12">
                                <h5 class="card-title mb-1">{{ resultdatas.name || '—' }}</h5>
                                <small class="text-muted">Status: <span :class="statusClass">{{ resultdatas.status ||
                                        '—' }}</span></small>
                            </div>
                            <div class="col-md-6">
                                <h5>Appointment Date & time</h5>
                                <ul class="list-unstyled mb-0">
                                    <li><strong>Date:</strong> {{ formatDate(resultdatas.date) }}</li>
                                    <li><strong>Time:</strong> {{ formatTime(resultdatas.time) || '—' }} <small
                                            class="text-muted">({{ resultdatas.timezone || 'local' }})</small></li>
                                    <li><strong>Type:</strong> {{ resultdatas.type || '—' }}</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul class="list-unstyled mb-0">
                                    <li><strong>Country:</strong> {{ resultdatas.country || '—' }}</li>
                                    <li><strong>Payment Method:</strong> {{ resultdatas.payment_method || '—' }}</li>
                                    <li><strong>Payment:</strong> {{ formatMoney(resultdatas.payment) }} {{
                                        resultdatas.currency || '—' }}</li>
                                </ul>
                            </div>

                            <div class="col-12">
                                <hr />
                                <h6>Package</h6>
                                <div v-if="resultdatas.doctorpackage">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <strong>{{ resultdatas.doctorpackage.type }}</strong>
                                            <div class="small text-muted">Duration: {{ resultdatas.doctorpackage.time ||
                                                '—' }}</div>
                                        </div>
                                        <div class="ms-auto text-end">
                                            <div class="fw-bold">{{ formatMoney(resultdatas.doctorpackage.price) }}
                                            </div>
                                            <div class="small text-muted">Package ID: {{ resultdatas.doctorpackage.id }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div v-else class="text-muted">No package info</div>
                            </div>

                            <div class="col-12">
                                <hr />
                                <h6>User</h6>
                                <div class="d-flex gap-3 align-items-center">
                                    <img :src="user?.image ? '/storage/' + user.image : '/default-avatar.png'"
                                        alt="user image" class="avatar rounded-circle">
                                    <div>
                                        <div class="fw-semibold">{{ resultdatas.user?.name || resultdatas.name || '—' }}
                                        </div>
                                        <div class="small text-muted">{{ resultdatas.user?.email || resultdatas.email ||
                                            '—' }}</div>
                                        <div class="small text-muted">Phone: {{ resultdatas.user?.number || '—' }}</div>
                                        <div class="small text-muted">Address: {{ resultdatas.user?.address || '—' }}
                                        </div>
                                        <div class="small text-muted">Zip: {{ resultdatas.user?.zip || resultdatas.zip
                                            || '—' }}</div>
                                    </div>
                                </div>
                            </div>



                            <div class="col-12" v-if="resultdatas.type ==='online' ">
                                <hr />
                                <h6>Meeting & Zoom</h6>
                                <div class="d-flex flex-wrap gap-2">
                                    <a v-if="resultdatas.zoom_join_url" :href="resultdatas.zoom_join_url"
                                        target="_blank" class="btn btn-sm btn-primary">Join Zoom</a>
                                    <a v-if="resultdatas.zoom_start_url" :href="resultdatas.zoom_start_url"
                                        target="_blank" class="btn btn-sm btn-outline-primary">Start Zoom</a>
                                    <button v-if="remoteId" class="btn btn-sm btn-success" @click="copy(remoteId)">Copy
                                        Meeting ID</button>
                                    <span v-if="!resultdatas.zoom_join_url && !remoteId" class="text-muted">No meeting
                                        link available</span>
                                </div>
                            </div>


                        </div>
                    </div>

                    <!-- Right column: Meta & actions -->
                    <div class="col-lg-4">
                        <div class="card border-0 h-100">
                            <div class="card-body d-flex flex-column">
                                <div class="mb-3 text-center">
                                    <h6 class="mb-1">Booking</h6>
                                    <div class="fs-4 fw-bold">{{ resultdatas.name ? '#' + resultdatas.id : '—' }}</div>
                                    <div class="small text-muted">Created: {{ formatDateTime(resultdatas.created_at) }}
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="d-flex justify-content-between">
                                        <strong>Doctor Name</strong>
                                        <div class="small text-muted ">{{ resultdatas.doctor?.name || '—' }} {{
                                            resultdatas.doctor?.last_name || '-' }}</div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <strong>Doctor Email</strong>
                                        <div class="small text-muted">{{ resultdatas.doctor?.email || '-' }}</div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="d-flex justify-content-between">
                                        <strong>Payment Status</strong>
                                        <span :class="paymentBadgeClass" class="badge">{{ resultdatas.payment ? 'Paid' :
                                            'Pending' }}</span>
                                    </div>
                                    <div class="mt-1">

                                        <div class="small text-muted mt-1">Payment ID: {{ resultdatas.payment_id || '—'
                                            }}</div>
                                    </div>
                                </div>
                                <div class="mt-auto">
                                    <button class="btn btn-primary w-100 mb-2" @click="contactDoctor">Contact
                                        Doctor</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted, computed } from 'vue'
import { useRoute, useRouter } from 'vue-router'
import axios from 'axios'

const route = useRoute()
const router = useRouter()

const resultdatas = ref({})

const getdata = async () => {
    try {
        const res = await axios.get(`/api/doctor/oneappointment/${route.params.id}`)
        resultdatas.value = res.data
    } catch (err) {
        console.error('Error fetching data:', err)
    }
}

onMounted(getdata)

function formatTime(time) {
    if (!time || typeof time !== 'string') return ('-')
    const [hours, minutes] = time.split(":");
    let h = parseInt(hours);
    const ampm = h >= 12 ? "PM" : "AM";
    h = h % 12 || 12;
    return `${h}:${minutes} ${ampm}`;
}

// Helpers
const formatDate = (d) => {
    if (!d) return '—'
    try {
        const dt = new Date(d)
        return dt.toLocaleDateString()
    } catch { return d }
}

const formatDateTime = (d) => {
    if (!d) return '—'
    try {
        const dt = new Date(d)
        return dt.toLocaleString()
    } catch { return d }
}

const formatMoney = (v) => {
    if (!v && v !== 0) return '—'
    if (typeof v === 'string') v = parseFloat(v)
    return new Intl.NumberFormat(undefined, { style: 'currency', currency: resultdatas.value.currency || 'USD' }).format(v)
}

const copy = async (text) => {
    try {
        await navigator.clipboard.writeText(text || '')
        alert('Copied to clipboard')
    } catch {
        alert('Unable to copy')
    }
}

const goBack = () => router.back()
const contactDoctor = () => {
    // replace with your contact flow
    alert('Open contact flow with doctor_id: ' + (resultdatas.value.doctor_id || '—'))
}
const print = () => {
    // open invoice page (replace with real route)

}


const statusClass = computed(() => {
    const s = (resultdatas.value.status || '').toLowerCase()
    if (s === 'confirmed') return 'badge bg-success text-white'
    if (s === 'pending') return 'badge bg-warning text-dark'
    if (s === 'cancelled' || s === 'rejected') return 'badge bg-danger text-white'
    return 'badge bg-secondary text-white'
})

const paymentBadgeClass = computed(() => resultdatas.value.payment ? 'badge bg-success' : 'badge bg-warning text-dark')



</script>

<style scoped>
.avatar {
    width: 64px;
    height: 64px;
    object-fit: cover;
    border: 2px solid rgba(0, 0, 0, 0.05);
}

.card-title {
    font-size: 1.05rem;
}

.card {
    border-radius: 12px;
}

@media (max-width: 767px) {
    .avatar {
        width: 48px;
        height: 48px
    }
}
</style>
