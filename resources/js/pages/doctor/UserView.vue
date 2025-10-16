<template>
    <div class="container mt-4 bg-white p-2">
        <div class="d-flex justify-content-between">
            <div>
                <h4 class=""> <svg width="23" height="26" viewBox="0 0 23 26" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M16.75 1V6.33333M6.25 1V6.33333M1 11.6667H22M4.9375 15.6667H4.95456M8.88814 15.6667H8.8947M12.8256 15.6667H12.8322M16.7695 15.6667H16.7761M12.832 19.6667H12.8386M4.95064 19.6667H4.9572M8.88814 19.6667H8.8947M1 6.33333C1 5.62609 1.27656 4.94781 1.76884 4.44772C2.26113 3.94762 2.92881 3.66667 3.625 3.66667H19.375C20.0712 3.66667 20.7389 3.94762 21.2312 4.44772C21.7234 4.94781 22 5.62609 22 6.33333V22.3333C22 23.0406 21.7234 23.7189 21.2312 24.219C20.7389 24.719 20.0712 25 19.375 25H3.625C2.92881 25 2.26113 24.719 1.76884 24.219C1.27656 23.7189 1 23.0406 1 22.3333V6.33333Z"
                            stroke="#8A7356" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <b class="mt-2 ms-3">Bookings</b>
                </h4>
            </div>
            <form @submit.prevent="getime">
                <div class="row justify-content-center mb-3">
                    <div class="col-auto">
                        <select class="form-select" v-model="selectedMonth" @change="updateCalendar">
                            <option v-for="month in months" :key="month.value" :value="month.value">
                                {{ month.name }}
                            </option>
                        </select>
                    </div>
                    <div class="col-auto">
                        <select class="form-select" v-model="selectedYear" @change="updateCalendar">
                            <option v-for="year in years" :key="year" :value="year">
                                {{ year }}
                            </option>
                        </select>
                    </div>
                </div>
            </form>
        </div>
        <hr>

        <div class="table-responsive ">
            <table class="table table-bordered">
                <thead>
                    <tr class="bg-info" style="background-color: #F4EFE6 !important;">
                        <th style="background-color: #F4EFE6 !important;">Day</th>
                        <th style="background-color: #F4EFE6 !important;">Date</th>
                        <th style="background-color: #F4EFE6 !important;">Available Times</th>
                    </tr>
                </thead>

                <tbody>
                    <tr v-for="(data, index) in Alldates" :key="index">
                        <td>{{ dayjs(data.date).format('dddd') }}</td>
                        <td>{{ dayjs(data.date).format('D MMM YYYY') }}</td>
                        <td>
                            <div class="d-flex flex-wrap gap-2">
                                <div v-for="(time, tIndex) in data.times" :key="tIndex" class="btn btn-custome">
                                    <span class="time">{{ formatTime(time) }}</span>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
</template>

<script setup>
import { ref, onMounted } from "vue";
import axios from "axios";
import { useRouter, useRoute } from "vue-router";
import { useAuthStore } from "../../stores/auth";
import dayjs from "dayjs";

const auth = useAuthStore();
const router = useRouter();
const route = useRoute();

const Alldates = ref([]);
const selectedMonth = ref(dayjs().format("MM")); // current month
const selectedYear = ref(dayjs().format("YYYY")); // current year

const months = ref([
    { name: "January", value: "01" },
    { name: "February", value: "02" },
    { name: "March", value: "03" },
    { name: "April", value: "04" },
    { name: "May", value: "05" },
    { name: "June", value: "06" },
    { name: "July", value: "07" },
    { name: "August", value: "08" },
    { name: "September", value: "09" },
    { name: "October", value: "10" },
    { name: "November", value: "11" },
    { name: "December", value: "12" },
]);

const years = ref([2024, 2025, 2026]);

async function getime() {
    try {
        const res = await axios.get(
            `/api/availability/${auth.user.id}/${selectedMonth.value}/${selectedYear.value}`
        );
        Alldates.value = res.data;
    } catch (err) {
        console.error("Failed to load availability:", err);
    }
}

// Refresh calendar on month/year change
function updateCalendar() {
    getime();
}

onMounted(getime);
function formatTime(time) {
    const [hours, minutes] = time.split(":");
    let h = parseInt(hours);
    const ampm = h >= 12 ? "PM" : "AM";
    h = h % 12 || 12;
    return `${h}:${minutes} ${ampm}`;
}
</script>
<style scoped>
.table {
    width: 100%;
}

.booking-slot {
    background-color: #5B4C3A;
    border: 1px solid #5B4C3A;
    color: white;
    border-radius: 5px;
    padding: 5px;
    margin: 2px 0;
    text-align: center;
    border-radius: 20px;
}

.time {
    font-size: 0.9em;
    color: #6c757d;
}
</style>
