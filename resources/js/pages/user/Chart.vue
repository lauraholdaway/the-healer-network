<script setup>
// Use runtime strings to public assets to avoid Vite import resolution
const IMAGES = {
    slider1: "/asset/images/slider1.jpg",
    slider2: "/asset/images/slider2.jpg",
    practitioner1: "/asset/images/practitionerimage1.png",
    practitioner2: "/asset/images/practitionerimage2.png",
};
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

        <div class="booking-card">
            <div class="booking-left">
                <img :src="IMAGES.slider1" class="booking-thumb" alt="Natural Healing thumbnail">
            </div>
            <div class="booking-middle">
                <h4 class="booking-title Seasons-fonts">Natural Healing</h4>
                <div class="practitioner">
                    <img :src="IMAGES.practitioner1" class="practitioner-avatar" alt="Darrell Steward">
                    <div class="ms-3">
                        <span class="practitioner-name">Darrell Steward</span><br>
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
                    Sunday 20th Sept, 2025 10:30 AM
                </div>
                <div class="chips">
                    <div class="chip">
                        <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="32" height="32" rx="16" fill="#DED1BA" />
                            <path d="M19.8974 14.0388V17.8847L23 20.5V11.5L19.8974 14.0388Z" stroke="#2E2D29"
                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M9.68989 11.5H17.5299C18.6717 11.5 19.8889 12.4023 19.8889 13.6023V19.7493C19.8908 19.9455 19.8121 20.1345 19.67 20.275C19.528 20.4155 19.334 20.4961 19.1306 20.4993H11.0627C9.76611 20.4993 9 19.3742 9 18.2492L9.00778 12.2493C8.99315 12.1545 9.00003 12.0578 9.02797 11.9659C9.0559 11.8739 9.10421 11.7889 9.16956 11.7168C9.23411 11.6455 9.31447 11.5891 9.40467 11.5519C9.49488 11.5146 9.59263 11.4974 9.69067 11.5015L9.68989 11.5Z"
                                stroke="#2E2D29" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <span class="tag">Online</span>
                    </div>
                    <div class="chip">
                        <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="32" height="32" rx="16" fill="#DED1BA" />
                            <path
                                d="M18.7222 16H16V12.1111M9 16C9 16.9193 9.18106 17.8295 9.53284 18.6788C9.88463 19.5281 10.4002 20.2997 11.0503 20.9497C11.7003 21.5998 12.4719 22.1154 13.3212 22.4672C14.1705 22.8189 15.0807 23 16 23C16.9193 23 17.8295 22.8189 18.6788 22.4672C19.5281 22.1154 20.2997 21.5998 20.9497 20.9497C21.5998 20.2997 22.1154 19.5281 22.4672 18.6788C22.8189 17.8295 23 16.9193 23 16C23 15.0807 22.8189 14.1705 22.4672 13.3212C22.1154 12.4719 21.5998 11.7003 20.9497 11.0503C20.2997 10.4002 19.5281 9.88463 18.6788 9.53284C17.8295 9.18106 16.9193 9 16 9C15.0807 9 14.1705 9.18106 13.3212 9.53284C12.4719 9.88463 11.7003 10.4002 11.0503 11.0503C10.4002 11.7003 9.88463 12.4719 9.53284 13.3212C9.18106 14.1705 9 15.0807 9 16Z"
                                stroke="#2E2D29" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <span class="tag">30 Minutes</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="booking-card mt-3">
            <div class="booking-left">
                <img :src="IMAGES.slider2" class="booking-thumb" alt="Emotional Support thumbnail">
            </div>
            <div class="booking-middle">
                <h4 class="booking-title">Emotional Mental Support</h4>
                <div class="practitioner">
                    <img :src="IMAGES.practitioner2" class="practitioner-avatar" alt="Alice Schawn">
                    <div class="ms-3">
                        <span class="practitioner-name">Alice Schawn</span><br>
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
                    Wednesday 25th Sept, 2025 07:30 AM
                </div>
                <div class="chips">
                    <div class="chip">
                        <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="32" height="32" rx="16" fill="#DED1BA" />
                            <path d="M19.8974 14.0388V17.8847L23 20.5V11.5L19.8974 14.0388Z" stroke="#2E2D29"
                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M9.68989 11.5H17.5299C18.6717 11.5 19.8889 12.4023 19.8889 13.6023V19.7493C19.8908 19.9455 19.8121 20.1345 19.67 20.275C19.528 20.4155 19.334 20.4961 19.1306 20.4993H11.0627C9.76611 20.4993 9 19.3742 9 18.2492L9.00778 12.2493C8.99315 12.1545 9.00003 12.0578 9.02797 11.9659C9.0559 11.8739 9.10421 11.7889 9.16956 11.7168C9.23411 11.6455 9.31447 11.5891 9.40467 11.5519C9.49488 11.5146 9.59263 11.4974 9.69067 11.5015L9.68989 11.5Z"
                                stroke="#2E2D29" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <span class="tag">Online</span>
                    </div>
                    <div class="chip">
                        <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="32" height="32" rx="16" fill="#DED1BA" />
                            <path
                                d="M18.7222 16H16V12.1111M9 16C9 16.9193 9.18106 17.8295 9.53284 18.6788C9.88463 19.5281 10.4002 20.2997 11.0503 20.9497C11.7003 21.5998 12.4719 22.1154 13.3212 22.4672C14.1705 22.8189 15.0807 23 16 23C16.9193 23 17.8295 22.8189 18.6788 22.4672C19.5281 22.1154 20.2997 21.5998 20.9497 20.9497C21.5998 20.2997 22.1154 19.5281 22.4672 18.6788C22.8189 17.8295 23 16.9193 23 16C23 15.0807 22.8189 14.1705 22.4672 13.3212C22.1154 12.4719 21.5998 11.7003 20.9497 11.0503C20.2997 10.4002 19.5281 9.88463 18.6788 9.53284C17.8295 9.18106 16.9193 9 16 9C15.0807 9 14.1705 9.18106 13.3212 9.53284C12.4719 9.88463 11.7003 10.4002 11.0503 11.0503C10.4002 11.7003 9.88463 12.4719 9.53284 13.3212C9.18106 14.1705 9 15.0807 9 16Z"
                                stroke="#2E2D29" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <span class="tag">30 Minutes</span>
                    </div>
                </div>
            </div>
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
            <div class="empty-card text-center">
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

.booking-card {
    background: #FFFFFF;
    border: 1px solid #DED1BA;
    border-radius: 12px;
    padding: 14px;
    display: flex;
    align-items: center;
    gap: 16px;
}

.booking-left {
    flex: 0 0 auto;
}

.booking-thumb {
    width: 110px;
    height: 100px;
    object-fit: cover;
    border-radius: 10px;
}

.booking-middle {
    flex: 1 1 auto;
}

.booking-title {
    margin: 0 0 8px 0;
    color: #2E2D29;
}

.practitioner {
    display: flex;
    align-items: center;
}

.practitioner-avatar {
    width: 35px;
    height: 35px;
    border-radius: 50%;
}

.practitioner-name {
    font-weight: 500;
    font-size: 15px;
    color: #2E2D29;
    line-height: 1.4;

}

.rating {
    color: #5B4C3A;
    font-weight: 600;
}

.booking-right {
    flex: 0 0 auto;
    text-align: right;
}

.date-chip {
    background: #2E2D29;
    color: #fff;
    border-radius: 24px;
    padding: 6px 12px;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    font-size: 12px;
}

.chips {
    margin-top: 10px;
    display: flex;
    gap: 10px;
    justify-content: flex-end;
}

.chip {

    border-radius: 24px;
    padding: 4px 10px;
    display: inline-flex;
    align-items: center;
    gap: 1px;
}

.tag {
    color: #2E2D29;
    font-weight: 600;
    font-size: 12px;
}

.empty-state {
    margin-bottom: 30px;
    background: #FFFFFF;
    border: 1px solid #DED1BA;
    border-radius: 12px;
}

.empty-card {
    padding: 40px 20px;
}

/* Mobile Responsive Styles */
@media (max-width: 992px) {
    .section-header h5 {
        font-size: 24px !important;
    }

    .booking-card {
        flex-direction: column;
        align-items: flex-start;
    }

    .booking-left {
        width: 100%;
    }

    .booking-thumb {
        width: 100%;
        height: 180px;
    }

    .booking-middle {
        width: 100%;
    }

    .booking-right {
        width: 100%;
        text-align: left;
    }

    .date-chip {
        font-size: 11px;
        padding: 8px 12px;
        width: 100%;
        justify-content: center;
    }

    .chips {
        justify-content: flex-start;
        margin-top: 12px;
    }
}

@media (max-width: 768px) {
    .col-md-12 {
        padding: 15px;
    }

    .section-header h5 {
        font-size: 20px !important;
    }

    .section-header svg {
        width: 20px;
        height: 23px;
    }

    .booking-card {
        padding: 12px;
        gap: 12px;
    }

    .booking-title {
        font-size: 18px;
    }

    .practitioner-avatar {
        width: 35px;
        height: 35px;
    }

    .practitioner-name {
        font-size: 14px;
        font-weight: 500;
    }

    .rating {
        font-size: 13px;
    }

    .date-chip {
        font-size: 10px;
        padding: 6px 10px;
    }

    .date-chip svg {
        width: 14px;
        height: 16px;
    }

    .chip {
        padding: 3px 8px;
    }

    .chip svg {
        width: 28px;
        height: 28px;
    }

    .tag {
        font-size: 11px;
    }
}

@media (max-width: 480px) {
    .col-md-12 {
        padding: 10px;
        margin-top: 10px !important;
    }

    .section-header {
        gap: 10px !important;
    }

    .section-header h5 {
        font-size: 18px !important;
    }

    .section-header svg {
        width: 18px;
        height: 20px;
    }

    .booking-card {
        padding: 10px;
        gap: 10px;
    }

    .booking-thumb {
        height: 150px;
    }

    .booking-title {
        font-size: 16px;
    }

    .practitioner {
        gap: 8px;
    }

    .practitioner-avatar {
        width: 32px;
        height: 32px;
    }

    .practitioner-name {
        font-size: 13px;
        font-weight: 500;
    }

    .rating {
        font-size: 12px;
    }

    .date-chip {
        font-size: 9px;
        padding: 5px 8px;
        white-space: normal;
        text-align: center;
    }

    .date-chip svg {
        width: 12px;
        height: 14px;
        flex-shrink: 0;
    }

    .chips {
        gap: 8px;
        flex-wrap: wrap;
    }

    .chip {
        padding: 2px 6px;
    }

    .chip svg {
        width: 24px;
        height: 24px;
    }

    .tag {
        font-size: 10px;
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
}
</style>
