<template>
    <div class=" p-2 m-2">
        <h4 class="Seasons-fonts">Practitioner Appointments</h4>
        <hr>
        <div v-if="loading" class="loading-container">
            <div class="loading-bar">
                <div class="loading-progress"></div>
            </div>
            <p class="loading-text">Loading Practitioner...</p>
        </div>
        <div v-else-if="appointments.length === 0">No appointments found.</div>

        <table v-else class="table table-bordered">
            <thead>
                <tr>
                    <th class="Seasons-fonts">#</th>
                    <th class="Seasons-fonts">Image</th>
                    <th class="Seasons-fonts">Healar</th>
                    <th class="Seasons-fonts">Package</th>
                    <th class="Seasons-fonts">Payment</th>
                    <th class="Seasons-fonts">Date</th>
                    <th class="Seasons-fonts">Status</th>
                    <th class="Seasons-fonts">Meeting</th>
                    <th class="Seasons-fonts">Rating</th>
                    <th class="Seasons-fonts">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(appt, index) in appointments" :key="appt.id">
                    <td>{{ index + 1 }}</td>
                    <td>
                        <img :src="'/storage/' + appt.doctor?.image || '/default-image.png'" alt=""
                            style="width: 100px; border-radius: 50%" />
                    </td>
                    <td>{{ appt.doctor?.name }}</td>
                    <td>{{ appt.doctorpackage?.type }}</td>
                    <td>{{ appt.doctorpackage?.price }} {{ appt?.currency }}</td>
                    <td>
                        {{ dayjs(appt.date).format('D MMM YYYY') }}
                        <br> {{ formatTime(appt.time) }}
                    </td>
                    <td>{{ appt.type }}</td>
                    <td>
                        <div v-if="appt.type === 'offline'">

                            <b>Healar Address</b> : {{ appt.doctor_details?.practice_location }} <br>
                            <b>Phone number</b> : {{ appt.doctor_details?.primary_contact_number }}
                        </div>
                        <div v-else>
                            <p v-if="appt.zoom_join_url">
                                <a :href="appt.zoom_join_url" target="_blank" class="btn main-btn2">
                                    Join Meeting
                                </a>
                            </p>
                            <p v-else>
                                <span class="text-muted">Waiting for doctor to start...</span>
                            </p>
                        </div>
                    </td>
                    <td>
                        <button class=" btn btn-sm btn-outline-custome"
                            @click="modelRating(appt.id, appt.doctor_id, appt.user_id, appt.id)">
                            Submit Rating
                        </button>
                    </td>
                    <td>
                        <div class="d-flex">
                            <!-- <router-link class="btn btn-outline-custome "
                                :to="`Appointmentview/${appt.id}`">View</router-link> -->
                            <div v-if="appt.status === 'cancelled'">
                                <b class="badge bg-danger  p-1">Cancelled</b>
                            </div>
                            <div v-else>
                                <button class=" btn btn-sm btn-outline-custome"
                                    @click="openmodal(appt.id, appt.doctor_id)">
                                    Change Appointment
                                </button>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Rating Modal -->
    <div class="modal fade" id="modelRating" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Save Rating</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form @submit.prevent="ratingSave">

                        <div v-if="errorMessage" class="alert alert-danger py-2 ">
                            {{ errorMessage }}
                        </div>
                        <!-- Star Rating -->
                        <div class="mb-3 text-center">
                            <label class="form-label d-block mb-2">Select Rating</label>
                            <div>
                                <i v-for="star in 5" :key="star" class="bi"
                                    :class="star <= ratingform.rating ? 'bi-star-fill text-warning fs-3' : 'bi-star fs-3 text-secondary'"
                                    style="cursor: pointer;" @click="ratingform.rating = star">
                                </i>
                            </div>
                        </div>

                        <!-- Message -->
                        <div class="mb-3">
                            <label class="form-label">Message</label>
                            <textarea v-model="ratingform.msg" class="form-control" rows="3"
                                placeholder="Write a message..."></textarea>
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn main-btn">Save Rating</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>


    <!-- open model here  -->
    <div class="modal fade" id="changeModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Change Appointment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form @submit.prevent="updateAppointment">
                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select v-model="form.status" class="form-select">
                                <option value="">Select Status</option>
                                <option value="cancelled">Cancelled</option>
                            </select>
                        </div>

                        <div v-if="form.status !== 'cancelled'" class="accordion-item mb-3"
                            v-for="(tm, index) in doctortime" :key="index"
                            style="border: 1px solid #E8E2D5; border-radius: 12px; overflow: hidden;">
                            <h2 class="accordion-header" :id="`heading${index}`">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    :data-bs-target="`#collapse${index}`" aria-expanded="false"
                                    :aria-controls="`collapse${index}`"
                                    style="background-color: #F4EFE6; color: #7D684E; font-weight: bold; border: none; padding: 15px 20px;">
                                    {{ new Date(tm.date).toLocaleString('en-US', {
                                    day: '2-digit', month: 'short', year:
                                    'numeric'
                                    }) }}
                                </button>
                            </h2>

                            <div :id="`collapse${index}`" class="accordion-collapse collapse"
                                :aria-labelledby="`heading${index}`" data-bs-parent="#accordionExample">
                                <div class="accordion-body" style="background-color: #FFFFFF; padding: 20px;">
                                    <div class="d-flex flex-wrap gap-3" role="group" aria-label="Time Slot">
                                        <template v-for="(time, tIndex) in tm.times" :key="tIndex">
                                            <input type="radio" class="btn-check" :name="`time-group-${index}`"
                                                :id="`time${index}-${tIndex}`" :value="time" v-model="form.selectedTime"
                                                @change="handleTimeSelect(time, tm.date)" />

                                            <label class="btn btn-outline-custom" :for="`time${index}-${tIndex}`"
                                                style="border: 2px solid #E8E2D5; color: #7D684E; background-color: #F4EFE6; border-radius: 8px; padding: 10px 20px; font-weight: 500; min-width: 100px;">
                                                {{ formatTime(time) }}
                                            </label>
                                        </template>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Message</label>
                            <textarea v-model="form.message" class="form-control" rows="3"
                                placeholder="Write a message..."></textarea>
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn main-btn">Update Appointment</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted, onBeforeUnmount } from "vue";
import axios from "axios";
import dayjs from "dayjs";

const appointments = ref([]);
const loading = ref(true);
let intervalId = null;
const doctortime = ref([])
const selectedTime = ref(null)
const selectedDate = ref(null)
const errorMessage = ref(null)



// Form and data refs
const form = ref({
    id: null,
    status: '',
    message: '',
    selectedTime: null,
    selectedDate: null,
})

// Open modal and load doctor availability
function openmodal(id, doctorid) {
    form.value.id = id
    form.value.message = ''
    form.value.status = ''
    form.value.selectedTime = null
    form.value.selectedDate = null

    const modal = new bootstrap.Modal(document.getElementById('changeModal'))
    modal.show()

    checkDoctortime(doctorid)
}

const ratingform = ref({
    id: null,
    doctor_id: null,
    user_id: null,
    appt_id: null,
    msg: '',
    rating: '',
})
function modelRating(id, doctor_id, user_id, appt_id) {
    ratingform.value.id = id;
    ratingform.value.doctor_id = doctor_id;
    ratingform.value.user_id = user_id;
    ratingform.value.appt_id = appt_id;
    ratingform.value.rating = '';
    ratingform.value.msg = '';
    const modal = new bootstrap.Modal(document.getElementById('modelRating'));
    modal.show();
}

// Fetch doctor available times
const checkDoctortime = async (doctorid) => {
    try {
        const res = await axios.get(`/api/availability/${doctorid}`)
        doctortime.value = res.data
    } catch (error) {
        console.error("Error fetching doctor time:", error)
    }
}

// When user selects a time
function handleTimeSelect(time, date) {
    selectedTime.value = time
    selectedDate.value = date
    form.value.selectedTime = time
    form.value.selectedDate = date
}

// Save appointment changes
const updateAppointment = async () => {
    try {
        await axios.post(`/api/updateAppStatus`, form.value)
        const modal = bootstrap.Modal.getInstance(document.getElementById('changeModal'))
        modal.hide()
        fetchAppointments();
        alert('Appointment time updated successfully!')
    } catch (error) {
        console.error("Error updating appointment:", error)
    }
}

const ratingSave = async () => {
    errorMessage.value = null // clear previous error
    try {
        await axios.post(`/api/saverating`, ratingform.value)
        const model = bootstrap.Modal.getInstance(document.getElementById('modelRating'))
        model.hide()
        alert('Save rating')
    } catch (error) {
        // Handle validation or server error
        if (error.response && error.response.data && error.response.data.message) {
            errorMessage.value = error.response.data.message
        } else if (error.response && error.response.data && typeof error.response.data === 'object') {
            // Laravel validation errors
            const errors = Object.values(error.response.data.errors || {}).flat()
            errorMessage.value = errors.join(', ')
        } else {
            errorMessage.value = 'Something went wrong while saving the rating.'
        }
        console.error('Error saving rating:', error)
    }
}

// Format time display
function formatTime(time) {
    return new Date(`1970-01-01T${time}`).toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' })
}

const fetchAppointments = async () => {
    try {
        const res = await axios.get("/api/appointments");
        // detect any new zoom links and alert the user once
        res.data.forEach((newAppt, i) => {
            const oldAppt = appointments.value[i];
            if (
                oldAppt &&
                !oldAppt.zoom_join_url &&
                newAppt.zoom_join_url
            ) {
                alert(`📢 Doctor started meeting for ${newAppt.doctor?.name}!`);
            }
        });
        appointments.value = res.data;
    } catch (error) {
        console.error("Error fetching appointments:", error);
    } finally {
        loading.value = false;
    }
};

onMounted(() => {
    fetchAppointments();
    // 🔁 Poll every 10 seconds for updates
    intervalId = setInterval(fetchAppointments, 10000);
});

onBeforeUnmount(() => {
    if (intervalId) clearInterval(intervalId);
});


</script>
