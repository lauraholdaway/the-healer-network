<template>
    <form @submit.prevent="searchDoctor">
        <div class="row search-box bg-white shadow p-3 d-flex align-items-center" style="border-radius: 20px;">
            <!-- Concern or Practice -->
            <div class="col-12 col-md-4 text-start search-box-section">
                <div class="d-flex flex-column">
                    <span class=" mb-1 search-box-title">What support are you looking for?</span>
                    <input type="text" v-model="form.modality" class="form-control border-0 shadow-none"
                        placeholder="Find a healer near you or&#10;book online sessions from anywhere in the world." />
                </div>

            </div>

            <!-- Locations -->
            <div class="col-12 col-md-5 text-start search-box-section">

                <div class="d-flex justify-content-between">
                    <div>
                        <label class="form-label  mb-0 text-start search-box-title">Locations</label>
                        <input type="text" v-model="form.location"
                            class="location-text form-control border-0 shadow-none" placeholder="Anywhere / Online" />
                    </div>
                    <div>
                        <button type="button" class="btn rounded-pill btn-sm location-btn current-location-btn mt-4 ms-1"
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
                <button type="submit" class="btn w-100 rounded-pill search-submit-btn">
                    <img :src="searchIcon" alt="Search" class="me-2" style="width: 16px; height: 16px;">
                    Search here...
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
}

.location-btn {
    font-size: 10px;
    background-color: #5B4C3A;
    color: white;
    border: none;
    padding: 5px 15px;
    white-space: nowrap;
}

.search-submit-btn {
    background-color: #6B5B4E;
    color: #C0B2A4;
    border: none;
    padding: 12px 20px;
    font-weight: 400;
}

/* Mobile responsive styles */
@media (max-width: 768px) {
    .search-box {
        padding: 1rem !important;
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

    .location-text {
        padding-right: 10px;
        font-size: 13px;
    }

    .location-btn {
        font-size: 9px;
        padding: 4px 12px;
    }

    .search-button-wrapper {
        padding: 0.5rem 0.5rem !important;
        margin-top: 0.5rem;
    }

    .search-submit-btn {
        padding: 10px 15px;
        font-size: 14px;
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
    }

    .search-submit-btn img {
        width: 14px !important;
        height: 14px !important;
    }
}
</style>
