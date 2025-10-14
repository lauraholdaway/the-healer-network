<template>
    <div class=" p-2 m-2">
        <h4>Practitioner Appointments</h4>
        <hr>

        <div v-if="loading">Loading appointments...</div>
        <div v-else-if="appointments.length === 0">No appointments found.</div>

        <table v-else class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Doctor</th>
                    <th>Package</th>
                    <th>Payment</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Meeting</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(appt, index) in appointments" :key="appt.id">
                    <td>{{ index + 1 }}</td>
                    <td>
                        <img :src="'/storage/' + appt.doctor.image" alt="" style="width: 100px; border-radius: 50%" />
                    </td>
                    <td>{{ appt.doctor?.name }}</td>
                    <td>{{ appt.doctorpackage?.type }}</td>
                    <td>{{ appt.doctorpackage?.price }}</td>
                    <td>{{ appt.date }}</td>
                    <td>{{ appt.status }}</td>
                    <td>
                        <p v-if="appt.zoom_join_url">
                            <a :href="appt.zoom_join_url" target="_blank" class="btn main-btn2">
                                Join Meeting
                            </a>
                        </p>
                        <p v-else>
                            <span class="text-muted">Waiting for doctor to start...</span>
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script setup>
import { ref, onMounted, onBeforeUnmount } from "vue";
import axios from "axios";

const appointments = ref([]);
const loading = ref(true);
let intervalId = null;

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
