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
        </div>
        <hr>

        <div class="table-responsive ">
            <table class="table table-bordered">
                <thead class="" style="">
                    <tr class="bg-info" style="background-color: #F4EFE6 !important;">
                        <th style="background-color: #F4EFE6 !important;" v-for="(day, index) in Alldates" :key="index">
                            {{ day.date }}</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(datas, index) in Alldates" :key="index">
                        <td v-for="(tms, timeIndex) in datas.times" :key="timeIndex">
                            <div class="btn btn-custome">
                                <svg width="17" height="16" viewBox="0 0 17 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M11.0777 8H8.35547V4.11111M1.35547 8C1.35547 8.91925 1.53653 9.82951 1.88831 10.6788C2.24009 11.5281 2.75571 12.2997 3.40572 12.9497C4.05573 13.5998 4.82741 14.1154 5.67668 14.4672C6.52596 14.8189 7.43622 15 8.35547 15C9.27472 15 10.185 14.8189 11.0343 14.4672C11.8835 14.1154 12.6552 13.5998 13.3052 12.9497C13.9552 12.2997 14.4708 11.5281 14.8226 10.6788C15.1744 9.82951 15.3555 8.91925 15.3555 8C15.3555 7.08075 15.1744 6.1705 14.8226 5.32122C14.4708 4.47194 13.9552 3.70026 13.3052 3.05025C12.6552 2.40024 11.8835 1.88463 11.0343 1.53284C10.185 1.18106 9.27472 1 8.35547 1C7.43622 1 6.52596 1.18106 5.67668 1.53284C4.82741 1.88463 4.05573 2.40024 3.40572 3.05025C2.75571 3.70026 2.24009 4.47194 1.88831 5.32122C1.53653 6.1705 1.35547 7.08075 1.35547 8Z"
                                        stroke="#2E2D29" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                                <span class="time">{{ tms }}</span>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script setup>
import { ref, computed, onMounted } from "vue";
import axios from "axios";
import { useRouter, useRoute } from "vue-router";
import { useAuthStore } from "../../stores/auth";

// --- Reactive state ---
const selectedMonth = ref("10");
const selectedYear = ref("2025");
const auth = useAuthStore()
const router = useRouter()
const route = useRoute()
const Alldates = ref([])
const months = ref([
    { name: "October", value: "10" },
    // Add more months as needed
]);


const years = ref([2025, 2026]); // Add more years as needed



// --- Methods ---
function getBookings(day, hour) {
    return bookings.value.filter(
        (booking) => booking.day === day && booking.hour === hour
    );
}

function updateCalendar() {
    // Logic to update calendar based on selected month and year
    console.log(`Updating for ${selectedMonth.value}/${selectedYear.value}`);
}

async function getime() {
    try {
        const res = await axios.get(`/api/availability/${auth.user.id}`);
        Alldates.value = res.data;
    }
    catch (err) { console.error("Failed to load packages:", err); }
}
onMounted(getime)
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
