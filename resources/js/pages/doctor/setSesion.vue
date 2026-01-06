<template>
    <div class="content flex-grow-1 p-4 card">
        <div class="p-4 session-card">
            <h3 class="mb-4 Seasons-fonts">📅Healer Availability</h3>
            <!-- Add Date & Time -->
            <div class="row mb-3">
                <div class="col-md-4">
                    <label class="form-label">Date</label>
                    <input v-model="currentDate" type="date" class="form-control" />
                </div>
                <div class="col-md-4">
                    <label class="form-label">Time</label>
                    <input v-model="currentTime" type="time" class="form-control" />
                </div>
                <div class="col-md-4 mt-4">
                    <button class="btn btn-outline-success w-100 main-btn2" @click="addSlot">+ Add Slot</button>
                </div>
            </div>

            <!-- Availability Preview -->
            <div v-for="(item, index) in availability" :key="index" class="mb-3">
                <h6 class="fw-bold">{{ item.date }}</h6>
                <ul class="list-inline">
                    <li v-for="(t, i) in item.times" :key="i" class="list-inline-item bg-light p-2 rounded border">
                        ⏰ {{ t }}
                        <button class="btn btn-sm btn-danger ms-2" @click="removeTime(index, i)">x</button>
                    </li>
                </ul>
            </div>

            <!-- Save -->
            <div class="text-end">
                <button class="btn btn-primary px-4 main-btn Seasons-fonts text-white" @click="saveAvailability">Save
                    Availability</button>
            </div>
        </div>

        <hr>
        <div>
            <div class="d-flex align-items-center gap-2 mb-3">
                <input type="date" v-model="fromDate" class="form-control" style="max-width: 200px;" />
                <input type="date" v-model="toDate" class="form-control" style="max-width: 200px;" />
                <button class="btn main-btn2" @click="getime">Filter</button>
            </div>
        </div>
        <div>
            <table class="table table-bordered table-hover">
                <thead class="table-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Date</th>
                        <th scope="col">Time</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(tm, index) in timedata" :key="tm.id">
                        <th scope="row" class="Avenir">{{ index + 1 }}</th>
                        <td>
                            {{ dayjs(tm.date).format("D MMM YYYY") }}
                        </td>
                        <td>
                            <div v-for="(ontime, index) in tm.times" :key='indec'>
                                {{ formatTime(ontime) }}
                            </div>

                        </td>
                        <td> <button class="btn btn-sm btn-danger" @click="deletePackage(tm.id)"> <i
                                    class="bi bi-trash3"></i></button>
                        </td>
                    </tr>
                    <tr v-if="timedata.length === 0">
                        <td colspan="4" class="text-center">No Time found</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted } from "vue";
import axios from "axios";
import dayjs from "dayjs";

import { useAuthStore } from "../../stores/auth";
import { useNotification } from "@kyvg/vue3-notification";

const doctorId = ref("");
const availability = ref([]);
const currentDate = ref("");
const currentTime = ref("");
const { notify } = useNotification();
const auth = useAuthStore()

function addSlot() {
    if (!currentDate.value || !currentTime.value) {
        alert("Please select both date and time");
        return;
    }

    let existing = availability.value.find((s) => s.date === currentDate.value);
    if (existing) {
        if (!existing.times.includes(currentTime.value)) {
            existing.times.push(currentTime.value);
        }
    } else {
        availability.value.push({ date: currentDate.value, times: [currentTime.value] });
    }

    currentTime.value = "";
}

function removeTime(dateIndex, timeIndex) {
    availability.value[dateIndex].times.splice(timeIndex, 1);
    if (availability.value[dateIndex].times.length === 0) {
        availability.value.splice(dateIndex, 1);
    }
}
async function saveAvailability() {
    try {
        const res = await axios.post("/api/doctor/availability", {
            doctor_id: auth.user.id,
            availability: availability.value,
        });

        const { saved, skipped } = res.data;

        if (saved.length > 0 && skipped.length === 0) {
            notify({
                title: "Success",
                text: `Saved: ${saved.join(", ")}`
            });
        }
        else if (saved.length > 0 && skipped.length > 0) {
            notify({
                title: "Partial Success",
                text: `Saved: ${saved.join(", ")} | Already exists: ${skipped.join(", ")}`
            });
        }
        else if (saved.length === 0 && skipped.length > 0) {
            notify({
                title: "Already Exists",
                text: `These dates already exist: ${skipped.join(", ")}`
            });
        }

        // Empty inputs
        currentTime.value = "";
        currentDate.value = "";
        availability.value = [];

        getime();

    } catch (err) {
        console.error("Failed to save availability :", err);
        notify({
            title: "Error",
            text: "Failed to save availability"
        });
    }
}



const timedata = ref([]);
const fromDate = ref(null);
const toDate = ref(null);
const getime = async () => {
    try {
        let url = `/api/Doctoravailable/${auth.user.id}`;

        // Add from/to filters if both are selected
        if (fromDate.value && toDate.value) {
            url += `?from=${fromDate.value}&to=${toDate.value}`;
        }

        const res = await axios.get(url);
        timedata.value = res.data;
    } catch (err) {
        console.error("Failed to load doctor availability:", err);
    }
};

async function deletePackage(id) {
    if (!confirm("Are you sure you want to delete this Date?"))
        return;
    try {
        await axios.delete(`/api/availability/delete/${id}`);
        timedata.value = timedata.value.filter((tm) => tm.id !== id);
        notify({
            title: "Succes",
            text: "Date Delete Successfuly",
        });
        getime();
    }
    catch (err) { console.error("Failed to delete Date:", err); }
}

onMounted(getime);



function formatTime(time) {
    const [hours, minutes] = time.split(":");
    let h = parseInt(hours);
    const ampm = h >= 12 ? "PM" : "AM";
    h = h % 12 || 12; // convert 0 -> 12
    return `${h}:${minutes} ${ampm}`;
}
</script>

<style scoped>
.session-card {
    border: 1px solid #eee;
    border-radius: 10px;
    box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.08);
}
</style>
