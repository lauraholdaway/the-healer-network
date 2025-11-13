<template>
    <div class="card p-4 ">
        <div class="overflow-auto">
            <h3 class="Seasons-fonts">User Appointments</h3>

            <!-- Show loading -->
            <div v-if="loading" class="loading-container">
                <div class="loading-bar">
                    <div class="loading-progress"></div>
                </div>
                <p class="loading-text">Loading Practitioner...</p>
            </div>

            <!-- Show when no data -->
            <div v-else-if="appointments.length === 0">
                No appointments found.
            </div>

            <!-- Show appointments -->
            <div v-else>
                <div class="booking-card my-2" v-for="(appointment, index) in appointments">
                    <div class="booking-left">
                        <img :src="'/storage/' + appointment.user?.image || '/default-image.png'" class="booking-thumb"
                            alt="Natural Healing thumbnail">
                    </div>
                    <div class="booking-middle">
                        <h4 class="booking-title Seasons-fonts">{{ appointment.doctorpackage?.type }}</h4>
                        <div class="practitioner">
                            <!-- <img :src="'/storage/' + appointment.doctor?.image || '/default-image.png'"
                            class="practitioner-avatar" alt="Darrell Steward"> -->
                            <div class="ms-3">
                                <span class="practitioner-name">{{ appointment.user?.name }} {{
                                    appointment.user?.last_name }} <br> {{
                                        appointment.user?.email
                                    }} <br>
                                    {{ appointment.user?.number }}</span><br>
                                <span>{{ appointment?.payment }} {{ appointment?.currency }}</span> <br>
                                <span class="rating">
                                    <svg width="13" height="12" viewBox="0 0 13 12" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M6.5 9.64421L10.517 12L9.451 7.56L13 4.57263L8.3265 4.18737L6.5 0L4.6735 4.18737L0 4.57263L3.549 7.56L2.483 12L6.5 9.64421Z"
                                            fill="#5B4C3A" />
                                    </svg>
                                    5.0
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="booking-right">
                        <div class="date-chip">
                            <svg width="16" height="19" viewBox="0 0 16 19" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M11.5 1.5V5.05556M4.5 1.5V5.05556M1 8.61111H15M3.625 11.2778H3.63638M6.25876 11.2778H6.26313M8.88376 11.2778H8.88813M11.513 11.2778H11.5174M8.88803 13.9444H8.89241M3.63376 13.9444H3.63813M6.25876 13.9444H6.26313M1 5.05556C1 4.58406 1.18437 4.13187 1.51256 3.79848C1.84075 3.46508 2.28587 3.27778 2.75 3.27778H13.25C13.7141 3.27778 14.1592 3.46508 14.4874 3.79848C14.8156 4.13187 15 4.58406 15 5.05556V15.7222C15 16.1937 14.8156 16.6459 14.4874 16.9793C14.1592 17.3127 13.7141 17.5 13.25 17.5H2.75C2.28587 17.5 1.84075 17.3127 1.51256 16.9793C1.18437 16.6459 1 16.1937 1 15.7222V5.05556Z"
                                    stroke="#F4EFE6" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                            <!-- Sunday 20th Sept, 2025 10:30 AM -->
                            {{ dayjs(appointment.date).format('D MMM YYYY') }} - {{ formatTime(appointment.time) }}
                        </div>
                        <div class="chips">
                            <div class="chip" v-if="appointment.type === 'Online'">
                                <svg width="32" height="32" viewBox="0 0 32 32" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <rect width="32" height="32" rx="16" fill="#DED1BA" />
                                    <path d="M19.8974 14.0388V17.8847L23 20.5V11.5L19.8974 14.0388Z" stroke="#2E2D29"
                                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path
                                        d="M9.68989 11.5H17.5299C18.6717 11.5 19.8889 12.4023 19.8889 13.6023V19.7493C19.8908 19.9455 19.8121 20.1345 19.67 20.275C19.528 20.4155 19.334 20.4961 19.1306 20.4993H11.0627C9.76611 20.4993 9 19.3742 9 18.2492L9.00778 12.2493C8.99315 12.1545 9.00003 12.0578 9.02797 11.9659C9.0559 11.8739 9.10421 11.7889 9.16956 11.7168C9.23411 11.6455 9.31447 11.5891 9.40467 11.5519C9.49488 11.5146 9.59263 11.4974 9.69067 11.5015L9.68989 11.5Z"
                                        stroke="#2E2D29" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                                <span class="tag">Online</span>
                            </div>

                            <div class="chip" v-else>
                                <svg width="32" height="32" viewBox="0 0 32 32" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <rect width="32" height="32" rx="16" fill="#DED1BA" />
                                    <path
                                        d="M11.5 23V21.4444C11.5 20.6193 11.8161 19.828 12.3787 19.2446C12.9413 18.6611 13.7044 18.3333 14.5 18.3333H17.5C18.2956 18.3333 19.0587 18.6611 19.6213 19.2446C20.1839 19.828 20.5 20.6193 20.5 21.4444V23M13 12.1111C13 12.9362 13.3161 13.7276 13.8787 14.311C14.4413 14.8944 15.2044 15.2222 16 15.2222C16.7956 15.2222 17.5587 14.8944 18.1213 14.311C18.6839 13.7276 19 12.9362 19 12.1111C19 11.286 18.6839 10.4947 18.1213 9.91122C17.5587 9.32778 16.7956 9 16 9C15.2044 9 14.4413 9.32778 13.8787 9.91122C13.3161 10.4947 13 11.286 13 12.1111Z"
                                        stroke="#2E2D29" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>

                                <span class="tag">In Person</span>
                            </div>

                            <div class="chip">
                                <svg width="32" height="32" viewBox="0 0 32 32" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <rect width="32" height="32" rx="16" fill="#DED1BA" />
                                    <path
                                        d="M18.7222 16H16V12.1111M9 16C9 16.9193 9.18106 17.8295 9.53284 18.6788C9.88463 19.5281 10.4002 20.2997 11.0503 20.9497C11.7003 21.5998 12.4719 22.1154 13.3212 22.4672C14.1705 22.8189 15.0807 23 16 23C16.9193 23 17.8295 22.8189 18.6788 22.4672C19.5281 22.1154 20.2997 21.5998 20.9497 20.9497C21.5998 20.2997 22.1154 19.5281 22.4672 18.6788C22.8189 17.8295 23 16.9193 23 16C23 15.0807 22.8189 14.1705 22.4672 13.3212C22.1154 12.4719 21.5998 11.7003 20.9497 11.0503C20.2997 10.4002 19.5281 9.88463 18.6788 9.53284C17.8295 9.18106 16.9193 9 16 9C15.0807 9 14.1705 9.18106 13.3212 9.53284C12.4719 9.88463 11.7003 10.4002 11.0503 11.0503C10.4002 11.7003 9.88463 12.4719 9.53284 13.3212C9.18106 14.1705 9 15.0807 9 16Z"
                                        stroke="#2E2D29" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                                <span class="tag">
                                    {{ appointment.doctorpackage?.time }}
                                </span>
                            </div>

                        </div>
                        </br>
                        <div class="mt-3" v-if="appointment.status === 'cancelled'">

                            <b class="badge bg-danger  p-1">Cancelled</b>

                        </div>
                        <div class="mt-3" v-else>
                            <div v-if="appointment.type === 'offline'">
                                <b>User Address</b> : {{ appointment.user?.address }} <br>
                            </div>
                            <div class="d-flex" v-else>
                                <p v-if="appointment.zoom_start_url">
                                    <a :href="appointment.zoom_start_url" target="_blank" class="btn main-btn2">
                                        Join Meeting
                                    </a>
                                </p>
                                <p v-else>
                                    <button @click="startMeeting(appointment.id)" class="btn main-btn">Start
                                        Meeting</button>
                                </p>
                                <p>
                                    <button class="main-btn  p-2 mx-2" @click="makeNote(appointment.id)">Create
                                        Note</button>
                                </p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


        <div class="modal fade" id="changeModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title">Note</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <div class="shadow-sm">
                            <div v-for="Note in Getnote">
                                <p class="p-2">
                                    {{ Note.message }}
                                </p>

                            </div>
                        </div>
                        <form @submit.prevent="createNote">

                            <div class="mb-3">
                                <label class="form-label">Message</label>
                                <textarea v-model="form.message" class="form-control" rows="3"
                                    placeholder="Write a message..."></textarea>
                            </div>

                            <div class="text-end">
                                <button type="submit" class="btn main-btn">Save Note</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted } from "vue";
import axios from "axios";
import dayjs from "dayjs";
import { useNotification } from "@kyvg/vue3-notification";
const { notify } = useNotification()
const appointments = ref([]);
const loading = ref(true);
const Getnote = ref(null)

const form = ref({
    id: null,
    message: '',

})
const fetchAppointments = async () => {
    try {
        const res = await axios.get("/api/doctor/userappointments"); // ✅ your API endpoint
        appointments.value = res.data;
    } catch (error) {
        console.error("Error fetching appointments:", error);
    } finally {
        loading.value = false;
    }
};


const startMeeting = async (id) => {
    try {
        await axios.post(`/api/doctor/createZoomMeeting/${id}`)
        fetchAppointments();
        alert("Zoom Meeting Created and email Send to User")
    } catch (error) {
        console.error(error);
        alert("Error creating meeting.");
    }
}

function makeNote(id) {
    form.value.app_id = id;
    form.value.message = '';

    // Fetch notes from API


    // Call the async function immediately
    GetNote(id);

    // Then show the modal
    const modal = new bootstrap.Modal(document.getElementById('changeModal'));
    modal.show();
}

const GetNote = async (id) => {
    try {
        const res = await axios.get(`/api/GetNote/${id}`);
        Getnote.value = res.data.data; // access the 'data' property
    } catch (error) {
        console.error("Error fetching Note:", error);
    }
};

const createNote = async () => {
    try {
        const data = await axios.post(`/api/createNote`, form.value)

        GetNote(data.data.data.app_id);

        fetchAppointments();
        notify({
            title: "Succes",
            text: "You have been save Note",
        });
        form.value = {
            message: ""
        }
    } catch (error) {
        notify({ type: "error", text: "" + error?.response?.data?.message || 'Unknown error' });
    }
}

function formatTime(time) {
    const [hours, minutes] = time.split(":");
    let h = parseInt(hours);
    const ampm = h >= 12 ? "PM" : "AM";
    h = h % 12 || 12;
    return `${h}:${minutes} ${ampm}`;
}
onMounted(fetchAppointments);
</script>
<style>
th {
    font-family: 'TheSeasons', serif !important;
}
</style>
