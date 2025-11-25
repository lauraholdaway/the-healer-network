<template>
    <div class="d-flex justify-content-center align-items-center gap-2">

        <!-- Appointment Type -->
        <div v-if="doctor?.appointmentType === 'online'" class="d-flex align-items-center gap-1">
            <svg width="32" height="32" viewBox="0 0 32 32" fill="none">
                <rect width="32" height="32" rx="16" fill="#DED1BA" />
                <path d="M19.8974 14.0388V17.8847L23 20.5V11.5L19.8974 14.0388Z" stroke="#2E2D29" stroke-width="1.5"
                    stroke-linecap="round" stroke-linejoin="round" />
                <path
                    d="M9.68989 11.5H17.5299C18.6717 11.5 19.8889 12.4023 19.8889 13.6023V19.7493C19.8908 19.9455 19.8121 20.1345 19.67 20.275C19.528 20.4155 19.334 20.4961 19.1306 20.4993H11.0627C9.76611 20.4993 9 19.3742 9 18.2492L9.00778 12.2493C8.99315 12.1545 9.00003 12.0578 9.02797 11.9659C9.0559 11.8739 9.10421 11.7889 9.16956 11.7168C9.23411 11.6455 9.31447 11.5891 9.40467 11.5519C9.49488 11.5146 9.59263 11.4974 9.69067 11.5015L9.68989 11.5Z"
                    stroke="#2E2D29" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <span class="tagb">Online</span>
        </div>
        <div v-else-if="doctor?.appointmentType === 'inpersone'" class="d-flex align-items-center gap-1">
            <svg width="32" height="32" viewBox="0 0 32 32" fill="none">
                <rect width="32" height="32" rx="16" fill="#DED1BA" />
                <path
                    d="M11.5 23V21.4444C11.5 20.6193 11.8161 19.828 12.3787 19.2446C12.9413 18.6611 13.7044 18.3333 14.5 18.3333H17.5C18.2956 18.3333 19.0587 18.6611 19.6213 19.2446C20.1839 19.828 20.5 20.6193 20.5 21.4444V23M13 12.1111C13 12.9362 13.3161 13.7276 13.8787 14.311C14.4413 14.8944 15.2044 15.2222 16 15.2222C16.7956 15.2222 17.5587 14.8944 18.1213 14.311C18.6839 13.7276 19 12.9362 19 12.1111C19 11.286 18.6839 10.4947 18.1213 9.91122C17.5587 9.32778 16.7956 9 16 9C15.2044 9 14.4413 9.32778 13.8787 9.91122C13.3161 10.4947 13 11.286 13 12.1111Z"
                    stroke="#2E2D29" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <span class="tagb">In Person</span>
        </div>

        <div v-else class="d-flex align-items-center gap-0">
            <svg width="32" height="32" viewBox="0 0 32 32" fill="none">
                <rect width="32" height="32" rx="16" fill="#DED1BA" />
                <path d="M19.8974 14.0388V17.8847L23 20.5V11.5L19.8974 14.0388Z" stroke="#2E2D29" stroke-width="1.5"
                    stroke-linecap="round" stroke-linejoin="round" />
                <path
                    d="M9.68989 11.5H17.5299C18.6717 11.5 19.8889 12.4023 19.8889 13.6023V19.7493C19.8908 19.9455 19.8121 20.1345 19.67 20.275C19.528 20.4155 19.334 20.4961 19.1306 20.4993H11.0627C9.76611 20.4993 9 19.3742 9 18.2492L9.00778 12.2493C8.99315 12.1545 9.00003 12.0578 9.02797 11.9659C9.0559 11.8739 9.10421 11.7889 9.16956 11.7168C9.23411 11.6455 9.31447 11.5891 9.40467 11.5519C9.49488 11.5146 9.59263 11.4974 9.69067 11.5015L9.68989 11.5Z"
                    stroke="#2E2D29" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <span class="tagb tagb-duration">Online</span>
        </div>

        <!-- Duration -->
        <div class="d-flex align-items-center gap-0">
            <svg width="32" height="32" viewBox="0 0 32 32" fill="none">
                <rect width="32" height="32" rx="16" fill="#DED1BA" />
                <path
                    d="M18.7222 16H16V12.1111M9 16C9 16.9193 9.18106 17.8295 9.53284 18.6788C9.88463 19.5281 10.4002 20.2997 11.0503 20.9497C11.7003 21.5998 12.4719 22.1154 13.3212 22.4672C14.1705 22.8189 15.0807 23 16 23C16.9193 23 17.8295 22.8189 18.6788 22.4672C19.5281 22.1154 20.2997 21.5998 20.9497 20.9497C21.5998 20.2997 22.1154 19.5281 22.4672 18.6788C22.8189 17.8295 23 16.9193 23 16C23 15.0807 22.8189 14.1705 22.4672 13.3212C22.1154 12.4719 21.5998 11.7003 20.9497 11.0503C20.2997 10.4002 19.5281 9.88463 18.6788 9.53284C17.8295 9.18106 16.9193 9 16 9C15.0807 9 14.1705 9.18106 13.3212 9.53284C12.4719 9.88463 11.7003 10.4002 11.0503 11.0503C10.4002 11.7003 9.88463 12.4719 9.53284 13.3212C9.18106 14.1705 9 15.0807 9 16Z"
                    stroke="#2E2D29" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <span class="tagb tagb-duration">{{ doctor.duration ?? '30 Minutes' }}</span>
        </div>

    </div>
</template>

<script setup>
defineProps({
    doctor: {
        type: Object,
        required: true
    }
});
</script>

<style scoped>
.tagb {
    color: #2E2D29;
    font-size: 14px;
    font-weight: 500;
    white-space: nowrap;
}

.tagb-duration {
    background-color: #C4B39A;
    padding: 4px 12px;
    border-radius: 50px;
}
</style>
