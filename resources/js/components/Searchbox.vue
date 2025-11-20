<template>
    <form @submit.prevent="searchDoctor">
        <div class="row search-box bg-white p-3 mb-5 d-flex align-items-center search-box-container">
            <!-- Concern or Practice -->
            <div class="col-12 col-md-4 text-start search-box-section">
                <div class="d-flex flex-column">
                    <span class="mb- search-box-title">What support are you looking for?</span>
                    <input type="text" v-model="form.modality" class="form-control border-0  shadow-none search-input"
                        placeholder="Find a healer near you or book online sessions from anywhere in the world." />
                </div>
            </div>

            <!-- Locations -->
            <div class="col-12 col-md-5 text-start search-box-section">
                <div class="d-flex flex-column">
                    <label class="form-label mb-0 text-start search-box-title">Locations</label>
                    <div class="d-flex align-items-center gap-2 location-input-wrapper">
                        <input type="text" v-model="form.location"
                            class="location-text form-control border-0 shadow-none" placeholder="Anywhere / Online" />
                        <button type="button" class="rounded-pill btn-sm location-btn current-location-btn my-current-location-btn flex-shrink-0"
                            @click="getCurrentLocation">
                            My Current Location
                            <img :src="Location" alt="Location" class="ms-1 location-icon">
                        </button>
                    </div>
                </div>
            </div>

            <!-- Search Button -->
            <div class="px-2 col-12 col-md-3 search-button-wrapper">
                <button type="submit" class="rounded-pill search-submit-btn search-here-btn" style="color: white; justify-content: flex-start; text-align: left;">
                    <img :src="searchIcon" alt="Search" class="search-icon" style="margin-right: 8px;">
                    Submit 
                </button>
            </div>
        </div>
    </form>
</template>

<script setup>
import { ref } from "vue";
import { useRouter } from "vue-router";
import searchIcon from "../../../public/asset/images/Searchicon.svg";
import Location from "../../../public/asset/images/Location.svg";

const router = useRouter();

const form = ref({
    modality: "",
    location: "",
});

const searchDoctor = () => {
    router.push({
        name: "Searchdoctorpage",
        query: {
            modality: form.value.modality,
            location: form.value.location,
        },
    });
};



const getCurrentLocation = () => {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
            async (position) => {
                const lat = position.coords.latitude;
                const lon = position.coords.longitude;

                // Optional: Use reverse geocoding to get city name
                try {
                    const res = await fetch(
                        `https://nominatim.openstreetmap.org/reverse?lat=${lat}&lon=${lon}&format=json`
                    );
                    const data = await res.json();
                    form.value.location = data.address.city || data.address.town || data.display_name;
                } catch (err) {
                    form.value.location = `${lat}, ${lon}`; // fallback
                }
            },
            (error) => {
                alert("Unable to fetch your location. Please allow location access.");
            }
        );
    } else {
        alert("Geolocation is not supported by this browser.");
    }
};
</script>

<style scoped>
/* Apply Avenir font family to all elements in this component */
.search-box,
.search-box *,
.search-box span,
.search-box label,
.search-box button,
.search-box .fw-bold {
    font-family: 'Avenir', sans-serif !important;
}

.search-box {
    width: 95%;
    max-width: 1500px;
    margin: 0 auto;
    padding-top: 15px !important;
    padding-bottom: 15px !important;
}

.search-box-container {
    background-color: white;
    border-radius: 20px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.03);
}

/* Desktop styles */
.search-box-section {
    border-right: 1px solid #DED1BA;
    padding: 0.5rem 1rem;
}

.search-box-section:last-of-type {
    border-right: none;
}

.search-box-title {
    color: #5B4C3A;
    font-size: 16px;
    font-weight: bold;
    margin-bottom: 0.0rem;
}

.search-box-text {
    color: #8A7356;
    font-size: 14px;
    font-weight: 400;
}

.search-box input.form-control {
    padding-left: 0 !important;
    padding-right: 0 !important;
    color: #8A7356;
    font-size: 14px;
    
   
    
    
}

.search-box input.form-control::placeholder {
    color: #8A7356;
    opacity: 1;
}

.search-box .search-input,
.search-input.form-control {
   
    border-radius: 0 !important;
}

.location-text {
    color: #8A7356;
    padding-left: 0 !important;
    padding-right: 0 !important;
    width: 200px;
    flex-shrink: 0;
    font-size: 14px;
}

.location-text::placeholder {
    color: #8A7356;
    opacity: 1;
}

.location-input-wrapper {
    flex-wrap: nowrap;
}

.location-btn {
    font-size: 10px;
    background-color: #5B4C3A;
    color: white;
    border: none;
    padding: 5px 15px;
    white-space: nowrap;
}

.my-current-location-btn {
    font-size: 8px;
    padding: 3px 10px;
    margin-left: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    white-space: nowrap;
    background-color: #5B4C3A;
    color: white;
    border: none;
    min-height: 26px;
    flex-shrink: 0;
    transition: all 0.3s ease;
}

.my-current-location-btn:hover {
    background-color: #4A3D2F;
}

.my-current-location-btn img,
.location-icon {
    width: 10px !important;
    height: 10px !important;
    filter: brightness(0) invert(1);
    flex-shrink: 0;
}

.search-here-btn {
    font-size: 14px;
}

.search-submit-btn {
    background-color: #5B4C3A;
    color: white !important;
    border: none;
    padding: 12px 30px;
    font-weight: 400;
    display: flex;
    align-items: center;
    justify-content: flex-start;
    text-align: left;
    width: 200px;
    white-space: nowrap;
    transition: all 0.3s ease;
}

.search-submit-btn:hover {
    background-color: #4A3D2F;
}

.search-icon {
    width: 16px !important;
    height: 16px !important;
    filter: brightness(0) invert(1);
    flex-shrink: 0;
}

.search-button-wrapper {
    margin-left: auto;
    display: flex;
    justify-content: flex-end;
    margin-right: 0;
}
@media (min-width: 993px) and (max-width: 1199px) {
    .search-box {
        width: 95%;
    }
    .search-box-section {
        padding: 0.5rem 0.75rem;
    }
    .search-box-title {
        font-size: 15px;
    }
    .search-box input.form-control {
        font-size: 15px;
        padding: 9px 0px;
        color: #8A7356;
    }
    .search-box input.form-control::placeholder {
        color: #8A7356;
        font-size: 15px;
    }
    .location-text {
        width: 180px;
        font-size: 15px;
        color: #8A7356;
    }
    .location-text::placeholder {
        color: #8A7356;
        font-size: 15px;
    }
    .location-input-wrapper {
        flex-wrap: nowrap;
        gap: 6px;
    }
    .my-current-location-btn {
        font-size: 8px;
        padding: 3px 10px;
        margin-left: 6px;
        display: flex;
        align-items: center;
        justify-content: center;
        white-space: nowrap;
        min-height: 24px;
        flex-shrink: 0;
    }
    .my-current-location-btn img,
    .location-icon {
        width: 9px !important;
        height: 9px !important;
        margin-left: 4px;
        flex-shrink: 0;
    }
    .search-submit-btn {
        width: 180px;
        padding: 11px 26px;
        font-size: 14px;
        min-height: 42px;
    }
    .search-icon {
        width: 15px !important;
        height: 15px !important;
    }
}

@media (min-width: 1200px) and (max-width: 1399px) {
    .search-box {
        width: 94%;
    }
    .search-box-section {
        padding: 0.5rem 0.9rem;
    }
    .search-box-title {
        font-size: 16px;
    }
    .search-box input.form-control {
        font-size: 15px;
        padding: 9px 0px;
        color: #8A7356;
    }
    .search-box input.form-control::placeholder {
        color: #8A7356;
        font-size: 15px;
    }
    .search-submit-btn {
        width: 200px;
        padding: 12px 28px;
        font-size: 15px;
    }
    .location-text {
        width: 200px;
        font-size: 15px;
        color: #8A7356;
    }
    .location-text::placeholder {
        color: #8A7356;
        font-size: 15px;
    }
    .location-input-wrapper {
        flex-wrap: nowrap;
        gap: 8px;
    }
    .my-current-location-btn {
        font-size: 8px;
        padding: 3px 10px;
        margin-left: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        white-space: nowrap;
        min-height: 26px;
        flex-shrink: 0;
    }
    .my-current-location-btn img,
    .location-icon {
        width: 10px !important;
        height: 10px !important;
        margin-left: 4px;
        flex-shrink: 0;
    }
    .search-submit-btn {
        width: 200px;
        padding: 12px 28px;
        font-size: 15px;
        min-height: 44px;
    }
    .search-icon {
        width: 16px !important;
        height: 16px !important;
    }
}

@media (min-width: 1400px) {
    .search-box {
        width: 93%;
    }
    .search-box-section {
        padding: 0.5rem 1rem;
    }
    .search-box-title {
        font-size: 18px;
        font-weight: bold;
    }
    .search-box input.form-control {
        font-size: 16px;
        padding: 10px 0px;
        color: #8A7356;
    }
    .search-box input.form-control::placeholder {
        color: #8A7356;
        font-size: 16px;
    }
    .location-text {
        font-size: 16px;
        padding-left: 0 !important;
        padding-right: 0 !important;
        width: 200px;
        color: #8A7356;
    }
    .location-text::placeholder {
        color: #8A7356;
        font-size: 16px;
    }
    .search-submit-btn {
        font-size: 16px;
        padding: 14px 24px;
        width: 250px;
        min-height: 50px;
    }
    .search-icon {
        width: 18px !important;
        height: 18px !important;
    }
    .my-current-location-btn {
        font-size: 9px;
        font-weight: 300;
        padding: 3px 10px;
        margin-left: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        white-space: nowrap;
        min-height: 28px;
        flex-shrink: 0;
    }
    .my-current-location-btn img,
    .location-icon {
        width: 10px !important;
        height: 10px !important;
        margin-left: 4px;
        flex-shrink: 0;
    }
    .location-input-wrapper {
        flex-wrap: nowrap;
        gap: 8px;
    }
}

/* Medium tablet / Small desktop (850px - 950px) - specifically optimized for 894px */
@media (min-width: 850px) and (max-width: 950px) {
    .search-box {
        width: 96%;
        max-width: 860px;
        padding: 1rem !important;
        margin: 0 auto;
    }
    .search-box-section {
        padding: 0.65rem 0.6rem !important;
    }
    .search-box-title {
        font-size: 14px;
        margin-bottom: 0.4rem;
    }
    .search-box input.form-control {
        font-size: 14px;
        padding: 8px 0px;
        color: #8A7356;
    }
    .search-box input.form-control::placeholder {
        color: #8A7356;
        font-size: 14px;
    }
    .location-text {
        width: 140px !important;
        font-size: 14px;
        color: #8A7356;
        flex-shrink: 0;
    }
    .location-text::placeholder {
        color: #8A7356;
        font-size: 14px;
    }
    .location-input-wrapper {
        flex-wrap: nowrap;
        gap: 5px;
        align-items: center;
    }
    .my-current-location-btn {
        font-size: 7px;
        padding: 2px 6px;
        margin-left: 4px;
        white-space: nowrap;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        min-height: 22px;
    }
    .my-current-location-btn img,
    .location-icon {
        width: 8px !important;
        height: 8px !important;
        margin-left: 3px;
        flex-shrink: 0;
    }
    .search-submit-btn {
        width: 140px;
        padding: 10px 18px;
        font-size: 13px;
        min-height: 40px;
        white-space: nowrap;
    }
    .search-icon {
        width: 14px !important;
        height: 14px !important;
        flex-shrink: 0;
        margin-right: 6px;
    }
    .search-button-wrapper {
        padding: 0 0.5rem !important;
        display: flex;
        justify-content: flex-end;
    }
}

/* Tablet responsive styles */
@media (min-width: 769px) and (max-width: 849px) {
    .search-box {
        width: 95%;
        padding: 1rem !important;
    }
    .search-box-section {
        padding: 0.75rem 0.5rem !important;
    }
    .search-box-title {
        font-size: 15px;
    }
    .search-box input.form-control {
        font-size: 14px;
        padding: 8px 0px;
        color: #8A7356;
    }
    .search-box input.form-control::placeholder {
        color: #8A7356;
        font-size: 14px;
    }
    .search-submit-btn {
        width: 160px;
        padding: 10px 20px;
        font-size: 13px;
        min-height: 40px;
    }
    .search-icon {
        width: 14px !important;
        height: 14px !important;
    }
    .location-text {
        width: 160px !important;
        font-size: 14px;
        color: #8A7356;
    }
    .location-text::placeholder {
        color: #8A7356;
        font-size: 14px;
    }
    .location-input-wrapper {
        flex-wrap: nowrap;
        gap: 6px;
        align-items: center;
    }
    .my-current-location-btn {
        font-size: 7px;
        padding: 2px 8px;
        margin-left: 6px;
        white-space: nowrap;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        min-height: 22px;
    }
    .my-current-location-btn img,
    .location-icon {
        width: 8px !important;
        height: 8px !important;
        margin-left: 3px;
        flex-shrink: 0;
    }
}

@media (min-width: 951px) and (max-width: 992px) {
    .search-box {
        width: 95%;
        padding: 1rem !important;
    }
    .search-box-section {
        padding: 0.75rem 0.5rem !important;
    }
    .search-box-title {
        font-size: 15px;
    }
    .search-box input.form-control {
        font-size: 14px;
        padding: 8px 0px;
        color: #8A7356;
    }
    .search-box input.form-control::placeholder {
        color: #8A7356;
        font-size: 14px;
    }
    .search-submit-btn {
        width: 160px;
        padding: 10px 20px;
        font-size: 13px;
        min-height: 40px;
    }
    .search-icon {
        width: 14px !important;
        height: 14px !important;
    }
    .location-text {
        width: 160px !important;
        font-size: 14px;
        color: #8A7356;
    }
    .location-text::placeholder {
        color: #8A7356;
        font-size: 14px;
    }
    .location-input-wrapper {
        flex-wrap: nowrap;
        gap: 6px;
        align-items: center;
    }
    .my-current-location-btn {
        font-size: 7px;
        padding: 2px 8px;
        margin-left: 6px;
        white-space: nowrap;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        min-height: 22px;
    }
    .my-current-location-btn img,
    .location-icon {
        width: 8px !important;
        height: 8px !important;
        margin-left: 3px;
        flex-shrink: 0;
    }
}

/* Small to medium mobile devices (481px - 576px) */
@media (min-width: 481px) and (max-width: 576px) {
    .search-box {
        padding: 0.9rem !important;
        width: 100%;
    }
    .search-box-section {
        padding: 0.85rem 0.5rem !important;
    }
    .search-box-title {
        font-size: 14px;
    }
    .search-box input.form-control {
        font-size: 14px;
        padding: 8px 0px;
        color: #8A7356;
    }
    .search-box input.form-control::placeholder {
        color: #8A7356;
        font-size: 14px;
    }
    .location-input-wrapper {
        flex-direction: row;
        flex-wrap: wrap;
        gap: 8px;
    }
    .location-text {
        flex: 1;
        min-width: 0;
        width: auto !important;
        font-size: 13px;
        color: #8A7356;
    }
    .location-text::placeholder {
        color: #8A7356;
        font-size: 13px;
    }
    .my-current-location-btn {
        flex-shrink: 0;
        white-space: nowrap;
        font-size: 8px;
        padding: 4px 10px;
        margin-left: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        width: auto;
        min-height: 28px;
    }
    .my-current-location-btn img,
    .location-icon {
        width: 9px !important;
        height: 9px !important;
        margin-left: 4px;
        flex-shrink: 0;
    }
    .search-button-wrapper {
        padding: 0.5rem 0.5rem !important;
        margin-top: 0.5rem;
    }
    .search-submit-btn {
        padding: 10px 20px;
        font-size: 14px;
        width: 100%;
        min-height: 44px;
    }
    .search-icon {
        width: 15px !important;
        height: 15px !important;
    }
}

/* Medium mobile devices (577px - 768px) */
@media (min-width: 577px) and (max-width: 768px) {
    .search-box {
        padding: 1rem !important;
        width: 100%;
    }
    .search-box-section {
        padding: 0.9rem 0.5rem !important;
    }
    .search-box-title {
        font-size: 14px;
    }
    .search-box input.form-control {
        font-size: 14px;
        padding: 8px 0px;
        color: #8A7356;
    }
    .search-box input.form-control::placeholder {
        color: #8A7356;
        font-size: 14px;
    }
    .location-input-wrapper {
        flex-direction: row;
        flex-wrap: wrap;
        gap: 8px;
    }
    .location-text {
        flex: 1;
        min-width: 0;
        width: auto !important;
        font-size: 13px;
        color: #8A7356;
    }
    .location-text::placeholder {
        color: #8A7356;
        font-size: 13px;
    }
    .my-current-location-btn {
        flex-shrink: 0;
        white-space: nowrap;
        font-size: 8px;
        padding: 4px 10px;
        margin-left: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        width: auto;
        min-height: 28px;
    }
    .my-current-location-btn img,
    .location-icon {
        width: 9px !important;
        height: 9px !important;
        margin-left: 4px;
        flex-shrink: 0;
    }
    .search-button-wrapper {
        padding: 0.5rem 0.5rem !important;
        margin-top: 0.5rem;
    }
    .search-submit-btn {
        padding: 10px 20px;
        font-size: 14px;
        width: 100%;
        min-height: 44px;
    }
    .search-icon {
        width: 15px !important;
        height: 15px !important;
    }
}

/* Mobile responsive styles */
@media (max-width: 768px) {
    .search-box {
        padding: 1rem !important;
        width: 100%;
        margin: 0 auto;
    }
    .search-box-section {
        border-right: none !important;
        border-bottom: 1px solid #DED1BA;
        padding: 1rem 0.5rem !important;
        margin-bottom: 0.5rem;
        width: 100%;
    }
    .search-box-section:last-of-type {
        border-bottom: none;
        margin-bottom: 0;
    }
    .search-box-title {
        font-size: 14px;
        margin-bottom: 0.5rem;
    }
    .search-box-text {
        font-size: 12px;
    }
    .search-box input.form-control {
        font-size: 14px;
        padding: 8px 0px;
        width: 100%;
        color: #8A7356;
    }
    .search-box input.form-control::placeholder {
        color: #8A7356;
        font-size: 14px;
    }
    .location-wrapper {
        justify-content: flex-start;
        width: 100%;
    }
    .location-input-wrapper {
        flex-wrap: wrap;
        gap: 10px;
        width: 100%;
        align-items: stretch;
    }
    .location-text {
        padding-left: 0 !important;
        padding-right: 0 !important;
        font-size: 13px;
        width: 100% !important;
        max-width: 100% !important;
        color: #8A7356;
    }
    .location-text::placeholder {
        color: #8A7356;
        font-size: 13px;
    }
    .location-btn {
        font-size: 9px;
        padding: 4px 12px;
    }
    .my-current-location-btn {
        width: 100%;
        justify-content: center;
        display: flex;
        align-items: center;
        padding: 6px 10px;
        font-size: 8px;
        margin-left: 0;
        white-space: nowrap;
        flex-shrink: 0;
        min-height: 30px;
    }
    .my-current-location-btn img,
    .location-icon {
        width: 9px !important;
        height: 9px !important;
        margin-left: 4px;
        flex-shrink: 0;
    }
    .search-button-wrapper {
        padding: 0.5rem 0.5rem !important;
        margin-top: 0.5rem;
        margin-left: 0 !important;
        display: block !important;
        justify-content: initial !important;
        width: 100%;
    }
    .search-submit-btn {
        padding: 12px 20px;
        font-size: 14px;
        width: 100%;
        max-width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 46px;
        white-space: nowrap;
    }
    .search-submit-btn img {
        width: 16px !important;
        height: 16px !important;
        margin-right: 8px;
    }
}

/* Small mobile devices (401px - 480px) */
@media (min-width: 401px) and (max-width: 480px) {
    .search-box {
        padding: 0.85rem !important;
        border-radius: 15px !important;
    }
    .search-box-section {
        padding: 0.8rem 0.5rem !important;
    }
    .search-box-title {
        font-size: 13px;
        margin-bottom: 0.4rem;
    }
    .search-box input.form-control {
        font-size: 13px;
        padding: 7px 0px;
        color: #8A7356;
    }
    .search-box input.form-control::placeholder {
        color: #8A7356;
        font-size: 13px;
    }
    .location-input-wrapper {
        flex-wrap: wrap !important;
        gap: 8px !important;
        flex-direction: column;
        align-items: stretch;
    }
    .location-text {
        width: 100% !important;
        max-width: 100% !important;
        font-size: 13px;
        color: #8A7356;
    }
    .location-text::placeholder {
        color: #8A7356;
        font-size: 13px;
    }
    .my-current-location-btn {
        width: 100%;
        justify-content: center;
        display: flex;
        align-items: center;
        padding: 5px 10px;
        font-size: 8px;
        margin-left: 0;
        white-space: nowrap;
        flex-shrink: 0;
        min-height: 28px;
    }
    .my-current-location-btn img,
    .location-icon {
        width: 8px !important;
        height: 8px !important;
        margin-left: 3px;
        flex-shrink: 0;
    }
    .search-submit-btn {
        padding: 10px 16px;
        font-size: 13px;
        width: 100%;
        max-width: 100%;
        min-height: 42px;
    }
    .search-submit-btn img {
        width: 14px !important;
        height: 14px !important;
        margin-right: 6px;
    }
}

/* Extra small devices */
@media (max-width: 480px) {
    .search-box {
        border-radius: 15px !important;
        padding: 0.75rem !important;
    }
    .search-box-section {
        padding: 0.75rem 0.5rem !important;
    }
    .search-box-title {
        font-size: 13px;
        margin-bottom: 0.4rem;
    }
    .search-box-text {
        font-size: 11px;
    }
    .search-box input.form-control {
        font-size: 13px;
        padding: 7px 0px;
        color: #8A7356;
    }
    .search-box input.form-control::placeholder {
        color: #8A7356;
        font-size: 13px;
    }
    .location-input-wrapper {
        flex-wrap: wrap !important;
        gap: 8px !important;
        flex-direction: column;
        align-items: stretch;
    }
    .location-text {
        width: 100% !important;
        max-width: 100% !important;
        font-size: 13px;
        color: #8A7356;
    }
    .location-text::placeholder {
        color: #8A7356;
        font-size: 13px;
    }
    .location-btn {
        font-size: 8px;
        padding: 3px 10px;
    }
    .location-btn img {
        width: 10px !important;
        height: 10px !important;
    }
    .my-current-location-btn {
        width: 100%;
        justify-content: center;
        display: flex;
        align-items: center;
        padding: 5px 8px;
        font-size: 8px;
        margin-left: 0;
        white-space: nowrap;
        flex-shrink: 0;
        min-height: 26px;
    }
    .my-current-location-btn img,
    .location-icon {
        width: 8px !important;
        height: 8px !important;
        margin-left: 3px;
        flex-shrink: 0;
    }
    .search-button-wrapper {
        padding: 0.5rem 0.5rem !important;
    }
    .search-submit-btn {
        padding: 10px 15px;
        font-size: 13px;
        width: 100%;
        max-width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 42px;
        white-space: nowrap;
    }
    .search-submit-btn img {
        width: 14px !important;
        height: 14px !important;
        margin-right: 6px;
    }
}

/* Very small devices (320px - 400px) */
@media (min-width: 320px) and (max-width: 400px) {
    .search-box {
        padding: 0.7rem !important;
        border-radius: 15px !important;
    }
    .search-box-section {
        padding: 0.7rem 0.4rem !important;
    }
    .search-box-title {
        font-size: 12px;
        margin-bottom: 0.3rem;
    }
    .search-box input.form-control {
        font-size: 12px;
        padding: 6px 0px;
        color: #8A7356;
    }
    .search-box input.form-control::placeholder {
        color: #8A7356;
        font-size: 12px;
    }
    .location-text {
        font-size: 12px;
        color: #8A7356;
    }
    .location-text::placeholder {
        color: #8A7356;
        font-size: 12px;
    }
    .my-current-location-btn {
        width: 100%;
        justify-content: center;
        display: flex;
        align-items: center;
        padding: 4px 6px;
        font-size: 7px;
        margin-left: 0;
        white-space: nowrap;
        flex-shrink: 0;
        min-height: 24px;
    }
    .my-current-location-btn img,
    .location-icon {
        width: 8px !important;
        height: 8px !important;
        margin-left: 2px;
        flex-shrink: 0;
    }
    .search-submit-btn {
        padding: 9px 12px;
        font-size: 12px;
        width: 100%;
        max-width: 100%;
        min-height: 40px;
    }
    .search-submit-btn img {
        width: 13px !important;
        height: 13px !important;
        margin-right: 5px;
    }
}

@media (min-width: 1500px) and (max-width: 1599px) {
    .search-box {
        width: 92%;
    }
    .search-submit-btn {
        width: 240px;
        padding: 13px 23px;
        font-size: 16px;
        min-height: 48px;
    }
    .search-icon {
        width: 17px !important;
        height: 17px !important;
    }
    .location-text {
        width: 220px;
    }
    .my-current-location-btn {
        font-size: 9px;
        padding: 3px 10px;
        margin-left: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        white-space: nowrap;
        min-height: 28px;
        flex-shrink: 0;
    }
    .my-current-location-btn img,
    .location-icon {
        width: 10px !important;
        height: 10px !important;
        margin-left: 4px;
        flex-shrink: 0;
    }
}

@media (min-width: 1600px) {
    .search-box {
        width: 91%;
    }
    .my-current-location-btn {
        font-size: 8px;
        padding: 3px 10px;
        margin-left: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        white-space: nowrap;
        min-height: 26px;
        flex-shrink: 0;
    }
    .my-current-location-btn img,
    .location-icon {
        width: 10px !important;
        height: 10px !important;
        margin-left: 4px;
        flex-shrink: 0;
    }
    .search-submit-btn {
        width: 240px;
        font-size: 16px;
        padding: 14px 24px;
        min-height: 48px;
    }
    .search-icon {
        width: 17px !important;
        height: 17px !important;
    }
    .location-text {
        width: 220px;
    }
}

@media (min-width: 1700px) {
    .search-box {
        width: 90%;
    }
    .location-input-wrapper {
        gap: 6px !important;
    }
    .location-text {
        font-size: 15px;
        padding-left: 0 !important;
        padding-right: 0 !important;
        width: 230px;
        color: #8A7356;
    }
    .location-text::placeholder {
        color: #8A7356;
        font-size: 15px;
    }
    .my-current-location-btn {
        font-size: 9px;
        padding: 3px 10px;
        margin-left: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        white-space: nowrap;
        min-height: 28px;
        flex-shrink: 0;
    }
    .my-current-location-btn img,
    .location-icon {
        width: 10px !important;
        height: 10px !important;
        margin-left: 4px;
        flex-shrink: 0;
    }
    .search-submit-btn {
        width: 260px;
        font-size: 17px;
        padding: 15px 28px;
        min-height: 52px;
    }
    .search-icon {
        width: 19px !important;
        height: 19px !important;
    }
}
</style>
