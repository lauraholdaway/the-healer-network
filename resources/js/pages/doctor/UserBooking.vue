<template>
  <div class="card p-4 mx-1">
    <h3>User Appointments</h3>

    <!-- Show loading -->
    <div v-if="loading">Loading appointments...</div>

    <!-- Show when no data -->
    <div v-else-if="appointments.length === 0">
      No appointments found.
    </div>

    <!-- Show appointments -->
    <table v-else class="table table-bordered">
      <thead>
        <tr>
          <th>#</th>
          <th>image</th>
          <th>User</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Package</th>
          <th>payment</th>
          <th>Date</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(appt, index) in appointments" :key="appt.id">
          <td>{{ index + 1 }}</td>
          <td>
            <img :src="'/storage/' + appt.user.image" alt="" style="width: 100px;border-radius: 50%;">
          </td>
          <td>{{ appt.user?.name }}</td>
          <td>{{ appt.user?.email }}</td>
          <td>{{ appt.user?.number }}</td>
          <td>{{ appt.doctorpackage?.type }}</td>
          <td>{{ appt.doctorpackage?.price }}</td>
          <td>{{ appt.date }}</td>
          <td>{{ appt.status }}</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script setup>
import { ref, onMounted } from "vue";
import axios from "axios";

const appointments = ref([]);
const loading = ref(true);

onMounted(async () => {
  try {
    const res = await axios.get("/api/doctor/userappointments"); // 👈 your API endpoint
    appointments.value = res.data;
  } catch (error) {
    console.error("Error fetching appointments:", error);
  } finally {
    loading.value = false;
  }
});
</script>
