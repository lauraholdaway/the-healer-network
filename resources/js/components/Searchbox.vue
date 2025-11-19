<template>
    <form @submit.prevent="searchDoctor">
        <div class="row search-box bg-white p-3 mb-5 d-flex align-items-center" style="border-radius: 20px; box-shadow: 0 1px 3px rgba(0, 0, 0, 0.03);">
            <!-- Concern or Practice -->
            <div class="col-12 col-md-4 text-start search-box-section">
                <div class="d-flex flex-column">
                    <span class=" mb-1 search-box-title">What support are you looking for?</span>
                    <input type="text" v-model="form.modality" class="form-control border-0 shadow-none"
                        placeholder="Find a healer near you or book online sessions from anywhere in the world." />
                </div>
            </div>

            <!-- Locations -->
            <div class="col-12 col-md-5 text-start search-box-section">
                <div class="d-flex flex-column">
                    <label class="form-label  mb-0 text-start search-box-title">Locations</label>
                    <div class="d-flex align-items-center gap-2 location-input-wrapper">
                        <input type="text" v-model="form.location"
                            class="location-text form-control border-0 shadow-none" placeholder="Anywhere / Online" />
                        <button type="button" class="rounded-pill btn-sm location-btn current-location-btn my-current-location-btn flex-shrink-0"
                            @click="getCurrentLocation">
                            My Current Location
                            <img :src="Location" alt="Location" class="ms-1"
                                style="width: 12px; height: 12px; filter: brightness(0) invert(1);">
                        </button>
                    </div>
                </div>
            </div>

            <!-- Search Button -->
            <div class="px-2 col-12 col-md-3 search-button-wrapper">
                <button type="submit" class="rounded-pill search-submit-btn search-here-btn">
                    <img :src="searchIcon" alt="Search" class="me-2 search-icon" style="width: 16px; height: 16px;">
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
    width: 100%;
    max-width: 100%;
    margin: 0 auto;
    padding-top: 15px !important;
    padding-bottom: 15px !important;
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
}

.search-box-text {
    color: #8A7356;
    font-size: 14px;
    font-weight: 400;
}

.location-text {
    color: #8A7356;
    padding-right: 20px;
    width: 200px;
    flex-shrink: 0;
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
    font-size: 9px;
    padding: 4px 12px;
    margin-left: 8px;
}

.my-current-location-btn img {
    width: 10px !important;
    height: 10px !important;
}

.search-here-btn {
    font-size: 14px;
}

.search-submit-btn {
    background-color: #5B4C3A;
    color: #C0B2A4;
    border: none;
    padding: 12px 30px;
    font-weight: 400;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    width: 200px;
}

.search-icon {
    filter: brightness(0) invert(1);
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
    .search-submit-btn {
        width: 180px;
    }
    .location-input-wrapper {
        flex-wrap: nowrap;
    }
}

@media (min-width: 1200px) and (max-width: 1399px) {
    .search-box {
        width: 94%;
    }
    .search-submit-btn {
        width: 200px;
    }
    .location-input-wrapper {
        flex-wrap: nowrap;
    }
}

@media (min-width: 1400px) {
    .search-box {
        width: 93%;
    }
    .search-box-title {
        font-size: 18px;
        font-weight: bold;
    }
    .search-box input.form-control {
        font-size: 16px;
        padding: 10px 15px;
    }
    .location-text {
        font-size: 16px;
        padding: 10px 15px;
    }
    .search-submit-btn {
        font-size: 16px;
        padding: 14px 24px;
        width: 250px;
    }
    .my-current-location-btn {
        font-size: 14px;
        font-weight: 300;
        padding: 5px 14px;
        margin-left: 8px;
    }
    .my-current-location-btn img {
        width: 15px !important;
        height: 15px !important;
    }
    .location-input-wrapper {
        flex-wrap: nowrap;
    }
}

/* Tablet responsive styles */
@media (min-width: 769px) and (max-width: 992px) {
    .search-box {
        width: 95%;
    }
    .search-submit-btn {
        width: 180px;
    }
    .location-text {
        width: 180px !important;
    }
    .location-input-wrapper {
        flex-wrap: nowrap;
    }
}

/* Mobile responsive styles */
@media (max-width: 768px) {
    .search-box {
        padding: 1rem !important;
        width: 100%;
    }
    .search-box-section {
        border-right: none !important;
        border-bottom: 1px solid #DED1BA;
        padding: 1rem 0.5rem !important;
        margin-bottom: 0.5rem;
    }
    .search-box-section:last-of-type {
        border-bottom: none;
    }
    .search-box-title {
        font-size: 14px;
    }
    .search-box-text {
        font-size: 12px;
    }
    .location-wrapper {
        justify-content: flex-start;
    }
    .location-input-wrapper {
        flex-wrap: wrap;
        gap: 10px;
    }
    .location-text {
        padding-right: 10px;
        font-size: 13px;
        width: 100% !important;
        max-width: 100% !important;
    }
    .location-btn {
        font-size: 9px;
        padding: 4px 12px;
    }
    .my-current-location-btn {
        width: 100%;
        justify-content: center;
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
        padding: 10px 15px;
        font-size: 14px;
        width: 100%;
        max-width: 100%;
    }
}

/* Extra small devices */
@media (max-width: 480px) {
    .search-box {
        border-radius: 15px !important;
    }
    .search-box-title {
        font-size: 13px;
    }
    .search-box-text {
        font-size: 11px;
    }
    .location-btn {
        font-size: 8px;
        padding: 3px 10px;
    }
    .location-btn img {
        width: 10px !important;
        height: 10px !important;
    }
    .search-submit-btn {
        padding: 8px 12px;
        font-size: 13px;
        width: 100%;
        max-width: 100%;
    }
    .search-submit-btn img {
        width: 14px !important;
        height: 14px !important;
    }
    .location-input-wrapper {
        flex-wrap: wrap !important;
        gap: 8px !important;
    }
    .location-text {
        width: 100% !important;
        max-width: 100% !important;
    }
    .my-current-location-btn {
        width: 100%;
        justify-content: center;
    }
}

@media (min-width: 1600px) {
    .my-current-location-btn {
        font-size: 8px;
        padding: 3px 10px;
    }
    .my-current-location-btn img {
        width: 9px !important;
        height: 9px !important;
    }
}

@media (min-width: 1700px) {
    .location-input-wrapper {
        gap: 4px !important;
    }
    .location-text {
        font-size: 13px;
        padding: 8px 12px;
    }
    .my-current-location-btn {
        font-size: 11px;
        padding: 6px 14px;
    }
    .my-current-location-btn img {
        width: 14px !important;
        height: 14px !important;
    }
}
</style>
