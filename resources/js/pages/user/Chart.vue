<script setup>

import { onMounted, ref, computed } from 'vue';
import dayjs from "dayjs";


import axios from 'axios';
// Use runtime strings to public assets to avoid Vite import resolution



const appointments = ref([]);
const loading = ref(false);

const fetchAppointments = async () => {
    loading.value = true;
    try {
        const res = await axios.get("/api/appointments");
        appointments.value = res.data;
    } catch (error) {
        console.error("Error fetching appointments:", error);
    } finally {
        loading.value = false;
    }
};

// Separate appointments by date
const upcomingAppointments = computed(() =>
    (appointments.value || []).filter(a => new Date(a.date) >= new Date())
);

const pastAppointments = computed(() =>
    (appointments.value || []).filter(a => new Date(a.date) < new Date())
);




onMounted(fetchAppointments);


function formatTime(time) {
    return new Date(`1970-01-01T${time}`).toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' })
}
</script>

<template>
    <div class="col-md-12 mt-4">
        <div class="section-header d-flex align-items-center gap-3">
            <svg width="23" height="26" viewBox="0 0 23 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M16.75 1V6.33333M6.25 1V6.33333M1 11.6667H22M4.9375 15.6667H4.95456M8.88814 15.6667H8.8947M12.8256 15.6667H12.8322M16.7695 15.6667H16.7761M12.832 19.6667H12.8386M4.95064 19.6667H4.9572M8.88814 19.6667H8.8947M1 6.33333C1 5.62609 1.27656 4.94781 1.76884 4.44772C2.26113 3.94762 2.92881 3.66667 3.625 3.66667H19.375C20.0712 3.66667 20.7389 3.94762 21.2312 4.44772C21.7234 4.94781 22 5.62609 22 6.33333V22.3333C22 23.0406 21.7234 23.7189 21.2312 24.219C20.7389 24.719 20.0712 25 19.375 25H3.625C2.92881 25 2.26113 24.719 1.76884 24.219C1.27656 23.7189 1 23.0406 1 22.3333V6.33333Z"
                    stroke="#8A7356" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <h5 class="Seasons-fonts" style="color: #2E2D29;">
                Upcoming Bookings</h5>
        </div>
        <hr>

        <div v-if="loading" class="loading-container">
            <div class="loading-bar">
                <div class="loading-progress"></div>
            </div>
            <p class="loading-text">Loading Appointment...</p>
        </div>

        <div v-if="upcomingAppointments.length">
            <div class="booking-card my-2" v-for="(appointment, index) in upcomingAppointments">
                <div class="booking-left">
                    <img :src="'/storage/' + appointment.doctor?.image || '/default-image.png'" class="booking-thumb"
                        alt="Natural Healing thumbnail">
                </div>
                <div class="booking-middle">
                    <h4 class="booking-title Seasons-fonts">{{ appointment.doctorpackage?.type }}</h4>
                    <div class="practitioner">
                        <!-- <img :src="'/storage/' + appointment.doctor?.image || '/default-image.png'"
                            class="practitioner-avatar" alt="Darrell Steward"> -->
                        <div class="ms-3">
                            <span class="practitioner-name">{{ appointment.doctor?.name }}{{
                                appointment.doctor?.last_name
                                }}</span><br>
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
                        <svg width="16" height="19" viewBox="0 0 16 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M11.5 1.5V5.05556M4.5 1.5V5.05556M1 8.61111H15M3.625 11.2778H3.63638M6.25876 11.2778H6.26313M8.88376 11.2778H8.88813M11.513 11.2778H11.5174M8.88803 13.9444H8.89241M3.63376 13.9444H3.63813M6.25876 13.9444H6.26313M1 5.05556C1 4.58406 1.18437 4.13187 1.51256 3.79848C1.84075 3.46508 2.28587 3.27778 2.75 3.27778H13.25C13.7141 3.27778 14.1592 3.46508 14.4874 3.79848C14.8156 4.13187 15 4.58406 15 5.05556V15.7222C15 16.1937 14.8156 16.6459 14.4874 16.9793C14.1592 17.3127 13.7141 17.5 13.25 17.5H2.75C2.28587 17.5 1.84075 17.3127 1.51256 16.9793C1.18437 16.6459 1 16.1937 1 15.7222V5.05556Z"
                                stroke="#F4EFE6" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
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
                            <span class="tag" style="background-color: #C4B39A;">Online</span>
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
                </div>
            </div>
        </div>
        <div class="empty-card text-center" v-else>
            <svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect x="5" y="5" width="50" height="50" rx="8" fill="#E9E0D0" />
                <path d="M21 22H39M21 30H39M21 38H32" stroke="#8A7356" stroke-width="2" stroke-linecap="round" />
            </svg>
            <div class="mt-3 text-muted">No Upcoming Booking yet</div>
        </div>
        <div class="section-header d-flex align-items-center gap-3 mt-5">
            <svg width="23" height="26" viewBox="0 0 23 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M16.75 1V6.33333M6.25 1V6.33333M1 11.6667H22M4.9375 15.6667H4.95456M8.88814 15.6667H8.8947M12.8256 15.6667H12.8322M16.7695 15.6667H16.7761M12.832 19.6667H12.8386M4.95064 19.6667H4.9572M8.88814 19.6667H8.8947M1 6.33333C1 5.62609 1.27656 4.94781 1.76884 4.44772C2.26113 3.94762 2.92881 3.66667 3.625 3.66667H19.375C20.0712 3.66667 20.7389 3.94762 21.2312 4.44772C21.7234 4.94781 22 5.62609 22 6.33333V22.3333C22 23.0406 21.7234 23.7189 21.2312 24.219C20.7389 24.719 20.0712 25 19.375 25H3.625C2.92881 25 2.26113 24.719 1.76884 24.219C1.27656 23.7189 1 23.0406 1 22.3333V6.33333Z"
                    stroke="#8A7356" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <h5 class="Seasons-fonts" style="color: #2E2D29;">
                Past Bookings</h5>
        </div>
        <hr>

        <div class="empty-state">
            <div v-if="pastAppointments.length">
                <div class="booking-card my-3 mx-3" v-for="(appointment, index) in pastAppointments">
                    <div class="booking-left">
                        <img :src="'/storage/' + appointment.doctor?.image || '/default-image.png'"
                            class="booking-thumb" alt="Natural Healing thumbnail">
                    </div>
                    <div class="booking-middle">
                        <h4 class="booking-title Seasons-fonts">{{ appointment.doctorpackage?.type }}</h4>
                        <div class="practitioner">
                            <!-- <img :src="'/storage/' + appointment.doctor?.image || '/default-image.png'"
                                class="practitioner-avatar" alt="Darrell Steward"> -->
                            <div class="ms-3">
                                <span class="practitioner-name">{{ appointment.doctor?.name }}{{
                                    appointment.doctor?.last_name
                                }}</span><br>
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
                    </div>
                </div>
            </div>
            <div class="empty-card text-center" v-else>
                <svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect x="5" y="5" width="50" height="50" rx="8" fill="#E9E0D0" />
                    <path d="M21 22H39M21 30H39M21 38H32" stroke="#8A7356" stroke-width="2" stroke-linecap="round" />
                </svg>
                <div class="mt-3 text-muted">No Past Booking yet</div>
            </div>
        </div>
    </div>

</template>

<style scoped>
.section-header h5 {
    color: #5B4C3A;
}

@media (max-width: 768px) {
    .col-md-12 {
        padding: 15px;
        margin-top: 1rem !important;
    }

    .section-header {
        gap: 10px !important;
        margin-bottom: 10px;
        flex-wrap: wrap;
    }

    .section-header h5 {
        font-size: 20px !important;
    }

    .section-header svg {
        width: 20px;
        height: 23px;
        flex-shrink: 0;
    }

    .booking-card {
        padding: 15px;
        gap: 15px;
        flex-direction: column !important;
        align-items: stretch !important;
        width: 100%;
        margin: 0.75rem 0;
    }

    .booking-left {
        width: 100% !important;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .booking-thumb {
        width: 100% !important;
        max-width: 100%;
        height: auto !important;
        min-height: 200px;
        max-height: 400px;
        object-fit: contain;
        border-radius: 10px;
        display: block;
    }

    .booking-middle {
        width: 100% !important;
        flex: 1 1 auto;
    }

    .booking-title {
        font-size: 18px;
        margin-bottom: 12px;
        word-wrap: break-word;
        overflow-wrap: break-word;
    }

    .practitioner {
        flex-direction: row;
        align-items: center;
        gap: 10px;
        flex-wrap: wrap;
    }

    .practitioner .ms-3 {
        margin-left: 0 !important;
        flex: 1;
    }

    .practitioner-avatar {
        width: 35px;
        height: 35px;
        flex-shrink: 0;
    }

    .practitioner-name {
        font-size: 14px;
        font-weight: 500;
        word-wrap: break-word;
        overflow-wrap: break-word;
    }

    .rating {
        font-size: 13px;
        display: flex;
        align-items: center;
        gap: 4px;
    }

    .booking-right {
        width: 100% !important;
        text-align: left !important;
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .date-chip {
        font-size: 11px;
        padding: 8px 12px;
        width: 100%;
        justify-content: center;
        text-align: center;
        display: flex;
        align-items: center;
        gap: 6px;
        word-wrap: break-word;
        overflow-wrap: break-word;
    }

    .date-chip svg {
        width: 14px;
        height: 16px;
        flex-shrink: 0;
    }

    .chips {
        justify-content: flex-start !important;
        margin-top: 12px;
        flex-wrap: wrap;
        gap: 8px;
        width: 100%;
    }

    .chip {
        padding: 4px 10px;
        display: flex;
        align-items: center;
        gap: 6px;
        flex-shrink: 0;
    }

    .chip svg {
        width: 28px;
        height: 28px;
        flex-shrink: 0;
    }

    .tag {
        font-size: 11px;
        white-space: nowrap;
    }

    .empty-state {
        margin: 0 !important;
        width: 100%;
    }

    .empty-state .booking-card {
        margin: 0.75rem 0 !important;
    }

    hr {
        margin: 15px 0 !important;
    }

    .loading-container {
        padding: 20px;
        text-align: center;
    }
}

@media (max-width: 576px) {
    .col-md-12 {
        padding: 10px;
        margin-top: 10px !important;
    }

    .section-header {
        gap: 8px !important;
        margin-bottom: 8px;
        flex-wrap: wrap;
    }

    .section-header h5 {
        font-size: 18px !important;
    }

    .section-header svg {
        width: 18px;
        height: 20px;
        flex-shrink: 0;
    }

    .booking-card {
        padding: 12px;
        gap: 12px;
        flex-direction: column !important;
        align-items: stretch !important;
        width: 100%;
        margin: 0.5rem 0;
    }

    .booking-left {
        width: 100% !important;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .booking-thumb {
        width: 100% !important;
        max-width: 100%;
        height: auto !important;
        min-height: 180px;
        max-height: 350px;
        object-fit: contain;
        border-radius: 10px;
        display: block;
    }

    .booking-middle {
        width: 100% !important;
        flex: 1 1 auto;
    }

    .booking-title {
        font-size: 16px;
        margin-bottom: 10px;
        word-wrap: break-word;
        overflow-wrap: break-word;
        line-height: 1.3;
    }

    .practitioner {
        flex-direction: row;
        align-items: center;
        gap: 8px;
        flex-wrap: wrap;
    }

    .practitioner .ms-3 {
        margin-left: 0 !important;
        flex: 1;
        min-width: 0;
    }

    .practitioner-avatar {
        width: 32px;
        height: 32px;
        flex-shrink: 0;
    }

    .practitioner-name {
        font-size: 13px;
        font-weight: 500;
        word-wrap: break-word;
        overflow-wrap: break-word;
        line-height: 1.4;
    }

    .rating {
        font-size: 12px;
        display: flex;
        align-items: center;
        gap: 3px;
        margin-top: 4px;
    }

    .rating svg {
        width: 12px;
        height: 11px;
    }

    .booking-right {
        width: 100% !important;
        text-align: left !important;
        display: flex;
        flex-direction: column;
        gap: 8px;
    }

    .date-chip {
        font-size: 10px;
        padding: 6px 10px;
        white-space: normal;
        text-align: center;
        width: 100%;
        justify-content: center;
        display: flex;
        align-items: center;
        gap: 5px;
        word-wrap: break-word;
        overflow-wrap: break-word;
        line-height: 1.3;
    }

    .date-chip svg {
        width: 12px;
        height: 14px;
        flex-shrink: 0;
    }

    .chips {
        gap: 6px;
        flex-wrap: wrap;
        justify-content: flex-start !important;
        margin-top: 10px;
        width: 100%;
    }

    .chip {
        padding: 3px 8px;
        display: flex;
        align-items: center;
        gap: 5px;
        flex-shrink: 0;
    }

    .chip svg {
        width: 24px;
        height: 24px;
        flex-shrink: 0;
    }

    .tag {
        font-size: 10px;
        white-space: nowrap;
    }

    .empty-card {
        padding: 30px 15px;
    }

    .empty-card svg {
        width: 50px;
        height: 50px;
    }

    .empty-card .text-muted {
        font-size: 14px;
    }

    .empty-state {
        margin: 0 !important;
        width: 100%;
    }

    .empty-state .booking-card {
        margin: 0.5rem 0 !important;
    }

    hr {
        margin: 12px 0 !important;
    }

    .loading-container {
        padding: 15px;
        text-align: center;
    }

    .loading-text {
        font-size: 14px;
    }
}
</style>
