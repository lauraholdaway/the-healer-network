<template>
    <div class="container d-flex justify-content-center align-items-center py-5">
        <div class="card shadow-sm border-0 rounded-4 p-4 user-profile-card w-100" style="max-width: 900px;">
            <h5 class="mb-4 Seasons-fonts" style="color: #5B4C3A;">
                Basic Information</h5>

            <form @submit.prevent="updateProfile" enctype="multipart/form-data">
                <div class="row g-4">
                    <!-- Left Column (Inputs) -->
                    <div class="col-md-8">
                        <div class="row g-3">
                            <!-- First Name -->
                            <div class="col-md-6">
                                <label class="form-label"
                                    style="color: #737373; font-family: Arial, Helvetica, sans-serif, serif; font-weight: 300; font-size: 15px;">First
                                    Name</label>
                                <input type="text" v-model="form.name" class="form-control rounded-3"
                                    placeholder="John" />
                            </div>

                            <!-- Last Name -->
                            <div class="col-md-6">
                                <label class="form-label"
                                    style="color: #737373; font-family: Arial, Helvetica, sans-serif, serif; font-weight: 300; font-size: 15px;">Second
                                    Name</label>
                                <input type="text" v-model="form.last_name" class="form-control rounded-3"
                                    placeholder="Doe" />
                            </div>

                            <!-- Phone Number -->
                            <div class="col-md-12">
                                <label class="form-label"
                                    style="color: #737373; font-family: Arial, Helvetica, sans-serif, serif; font-weight: 300; font-size: 15px;">Phone
                                    Number</label>
                                <div class="phone-input-container">

                                    <input type="number" v-model="form.number" class="phone-number-input"
                                        placeholder="321 586 97 378" />
                                </div>
                            </div>
                            <!-- Location -->
                            <!-- Last Name -->
                            <div class="col-md-12">
                                <label class="form-label"
                                    style="color: #737373; font-family: Arial, Helvetica, sans-serif, serif; font-weight: 300; font-size: 15px;">
                                    Location</label>
                                <input type="text" v-model="form.address" class="form-control rounded-3"
                                    placeholder="Address" />
                            </div>
                        </div>


                        <!-- Buttons -->
                        <div class="mt-4 d-flex gap-3">
                            <button type="submit" class="btn save-update-btn">
                                Save And Update
                            </button>
                        </div>
                    </div>

                    <!-- Right Column (Profile Image) -->
                    <div class="col-md-4 d-flex flex-column align-items-center justify-content-center">
                        <div class="profile-uploader-container">
                            <!-- Outer Circle -->
                            <div class="outer-circle">
                                <!-- Inner Circle -->
                                <div class="inner-circle">
                                    <img v-if="imagePreview || auth.user.image"
                                        :src="imagePreview || (auth.user?.image ? '/storage/' + auth.user?.image : '/default-avatar.png')"
                                        alt="Profile Preview" class="profile-image" />

                                    <svg v-else xmlns="http://www.w3.org/2000/svg" class="user-icon-svg"
                                        viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </div>

                            <!-- Upload Button -->
                            <button @click="triggerFileInput" type="button" class="upload-button">
                                <svg width="21" height="18" viewBox="0 0 21 18" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" class="camera-icon">
                                    <path
                                        d="M3.5 4H4.5C5.03043 4 5.53914 3.78929 5.91421 3.41421C6.28929 3.03914 6.5 2.53043 6.5 2C6.5 1.73478 6.60536 1.48043 6.79289 1.29289C6.98043 1.10536 7.23478 1 7.5 1H13.5C13.7652 1 14.0196 1.10536 14.2071 1.29289C14.3946 1.48043 14.5 1.73478 14.5 2C14.5 2.53043 14.7107 3.03914 15.0858 3.41421C15.4609 3.78929 15.9696 4 16.5 4H17.5C18.0304 4 18.5391 4.21071 18.9142 4.58579C19.2893 4.96086 19.5 5.46957 19.5 6V15C19.5 15.5304 19.2893 16.0391 18.9142 16.4142C18.5391 16.7893 18.0304 17 17.5 17H3.5C2.96957 17 2.46086 16.7893 2.08579 16.4142C1.71071 16.0391 1.5 15.5304 1.5 15V6C1.5 5.46957 1.71071 4.96086 2.08579 4.58579C2.46086 4.21071 2.96957 4 3.5 4Z"
                                        stroke="#5B4C3A" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path
                                        d="M7.5 10C7.5 10.7956 7.81607 11.5587 8.37868 12.1213C8.94129 12.6839 9.70435 13 10.5 13C11.2956 13 12.0587 12.6839 12.6213 12.1213C13.1839 11.5587 13.5 10.7956 13.5 10C13.5 9.20435 13.1839 8.44129 12.6213 7.87868C12.0587 7.31607 11.2956 7 10.5 7C9.70435 7 8.94129 7.31607 8.37868 7.87868C7.81607 8.44129 7.5 9.20435 7.5 10Z"
                                        stroke="#5B4C3A" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                                <span class="upload-text">Upload Image</span>
                            </button>

                            <!-- Hidden Input -->
                            <input type="file" ref="fileInput" @change="onFileChange" accept="image/*"
                                class="hidden-input" />
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script setup>
import { ref, computed, watch, onMounted, onUnmounted } from "vue";
import axios from "axios";
import { useAuthStore } from "@/stores/auth";
import { reactive } from "vue";
import { useNotification } from "@kyvg/vue3-notification";

// import { getCountries, getCountryData } from 'country-list';
const { notify } = useNotification()

const auth = useAuthStore();
const preview = ref(null);
const imagePreview = ref(null);
const fileInput = ref(null);

// Comprehensive country data with phone codes and flags


// Location data


const selectedCountryCode = ref('+92');
const phoneNumber = ref('');
const isDropdownOpen = ref(false);
const searchQuery = ref('');

// Location selector variables
const selectedLocation = ref('Perth, Australia');
const isLocationDropdownOpen = ref(false);
const locationSearchQuery = ref('');


// Computed property for selected country
const selectedCountry = computed(() => {
    return countries.value.find(country => country.code === selectedCountryCode.value) || countries.value[0];
});

// Filtered countries based on search
const filteredCountries = computed(() => {
    if (!searchQuery.value) {
        return countries.value;
    }
    return countries.value.filter(country =>
        country.name.toLowerCase().includes(searchQuery.value.toLowerCase()) ||
        country.code.includes(searchQuery.value)
    );
});

// Filtered locations based on search
const filteredLocations = computed(() => {
    if (!locationSearchQuery.value) {
        return locations.value;
    }
    return locations.value.filter(location =>
        location.label.toLowerCase().includes(locationSearchQuery.value.toLowerCase())
    );
});

// Dropdown functions
const toggleDropdown = () => {
    isDropdownOpen.value = !isDropdownOpen.value;
};

const selectCountry = (country) => {
    selectedCountryCode.value = country.code;
    isDropdownOpen.value = false;
};

// Location dropdown functions
const toggleLocationDropdown = () => {
    isLocationDropdownOpen.value = !isLocationDropdownOpen.value;
};

const selectLocation = (location) => {
    selectedLocation.value = location.value;
    form.value.address = location.value;
    isLocationDropdownOpen.value = false;
};

// Close dropdown when clicking outside
const closeDropdown = (event) => {
    if (!event.target.closest('.country-selector')) {
        isDropdownOpen.value = false;
    }
    if (!event.target.closest('.location-selector')) {
        isLocationDropdownOpen.value = false;
    }
};

// Add event listener for clicking outside
onMounted(() => {
    document.addEventListener('click', closeDropdown);
});

onUnmounted(() => {
    document.removeEventListener('click', closeDropdown);
});

// Form data initialized from current user
const form = ref({
    name: auth.user?.name || "",
    last_name: auth.user?.last_name || "",
    number: auth.user?.number || "",
    address: auth.user?.address || "",
    image: null,
});



// Watch for changes and update form.number
watch([selectedCountryCode, phoneNumber], () => {
    form.value.number = selectedCountryCode.value + ' ' + phoneNumber.value;
});

// Handle file input
const handleImageUpload = (event) => {
    const file = event.target.files[0];
    if (file) {
        form.value.image = file;
        preview.value = URL.createObjectURL(file);
    }
};

// Trigger file input
function triggerFileInput() {
    fileInput.value?.click();
}

// Handle file change
function onFileChange(event) {
    const file = event.target.files?.[0];
    if (file) {
        const reader = new FileReader();
        reader.onloadend = () => {
            imagePreview.value = reader.result;
        };
        reader.readAsDataURL(file);

        // Also update the form data
        form.value.image = file;
        preview.value = URL.createObjectURL(file);
    }
}

// Update profile
const updateProfile = async () => {
    try {
        const formData = new FormData();
        formData.append("name", form.value.name);
        formData.append("last_name", form.value.last_name);
        formData.append("number", form.value.number);
        formData.append("address", form.value.address);

        if (form.value.image) {
            formData.append("image", form.value.image);
        }

        const { data } = await axios.post("/api/user/update", formData, {
            headers: { "Content-Type": "multipart/form-data" },
        });

        auth.user = data.user;
        notify({
            title: "Success",
            text: "Profile updated successfully!",
        });
    } catch (error) {

        notify({
            title: "Error",
            type: "error",
            text: error?.response?.data?.message || "Unknown error",
        });
    }
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
.profile-uploader-container {
    position: relative;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

.outer-circle {
    width: 280px;
    height: 280px;
    border-radius: 50%;
    background-color: #F4EFE6;
    display: flex;
    align-items: center;
    justify-content: center;

}

.inner-circle {
    width: 150px;
    height: 150px;
    border-radius: 50%;
    background-color: #C4B39A;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
}

.profile-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.user-icon-svg {
    width: 96px;
    height: 96px;
    color: #F4EFE6;
}

.upload-button {

    position: absolute;
        bottom: 0px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        padding: 10px 14px;

        background-color: #C1B39D;
            color: #695D51;
            border: 3px solid white;
            border-radius: 8px;

            cursor: pointer;
                transition: all 0.3s ease;
                transform: scale(1);
            }

                        .upload-button:hover {
                            background-color: #C1B39D;
                            transform: scale(1.05);
                        }

                        .camera-icon {
                            width: 20px;
                            height: 20px;
                        }

                        .upload-text {
                            font-family: 'Cormorant Garamond', serif;
                            font-size: 16px;
                            color: #5B4C3A;
                            font-weight: 400;
                        }

                        .hidden-input {
                            display: none;
                        }

                        /* Phone Input Container Styles */
                        .phone-input-container {
                            display: flex;
                            border: 1px solid #D4C6B5;
                            border-radius: 8px;
                            background-color: white;
                            overflow: hidden;
                        }

                        .country-selector {
                            display: flex;
                            align-items: center;
                            background-color: #F4EFE6;
                            border-right: 1px solid #D4C6B5;
                            padding: 0 12px;
                            min-width: 120px;
                            position: relative;
                            cursor: pointer;
                            user-select: none;
                        }

                        .country-flag {
                            width: 20px;
                            height: 15px;
                            margin-right: 8px;
                            border-radius: 2px;
                        }

                        .country-code {
                            color: #5B4C3A;
                            font-size: 14px;
                            font-weight: 500;
                            margin-right: 8px;
                        }

                        .dropdown-arrow {
                            width: 16px;
                            height: 16px;
                            color: #5B4C3A;
                            transition: transform 0.3s ease;
                        }

                        .dropdown-arrow.rotated {
                            transform: rotate(180deg);
                        }

                        .country-dropdown {
                            position: absolute;
                            top: 100%;
                            left: 0;
                            right: 0;
                            background: white;
                            border: 1px solid #D4C6B5;
                            border-radius: 8px;
                            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
                            max-height: 300px;
                            overflow: hidden;
                            z-index: 1000;
                            min-width: 300px;
                        }

                        .search-container {
                            padding: 8px;
                            border-bottom: 1px solid #D4C6B5;
                            background-color: #F4EFE6;
                        }

                        .search-input {
                            width: 100%;
                            padding: 8px 12px;
                            border: 1px solid #D4C6B5;
                            border-radius: 6px;
                            font-size: 14px;
                            color: #5B4C3A;
                            background: white;
                            outline: none;
                        }

                        .search-input:focus {
                            border-color: #C1B39D;
                            box-shadow: 0 0 0 2px rgba(193, 179, 157, 0.2);
                        }

                        .search-input::placeholder {
                            color: #B9A997;
                        }

                        .countries-list {
                            max-height: 240px;
                            overflow-y: auto;
                        }

                        .country-option {
                            display: flex;
                            align-items: center;
                            padding: 10px 12px;
                            cursor: pointer;
                            transition: background-color 0.2s ease;
                            border-bottom: 1px solid #F4EFE6;
                        }

                        .country-option:last-child {
                            border-bottom: none;
                        }

                        .country-option:hover {
                            background-color: #F4EFE6;
                        }

                        .country-option.selected {
                            background-color: #C1B39D;
                            color: white;
                        }

                        .option-flag {
                            width: 20px;
                            height: 15px;
                            margin-right: 10px;
                            border-radius: 2px;
                            flex-shrink: 0;
                        }

                        .option-code {
                            font-size: 14px;
                            font-weight: 600;
                            margin-right: 10px;
                            min-width: 50px;
                            flex-shrink: 0;
                        }

                        .option-name {
                            font-size: 14px;
                            color: #5B4C3A;
                            flex: 1;
                            overflow: hidden;
                            text-overflow: ellipsis;
                            white-space: nowrap;
                        }

                        .country-option.selected .option-name {
                            color: white;
                        }

                        .no-results {
                            padding: 20px;
                            text-align: center;
                            color: #B9A997;
                            font-style: italic;
                        }

                        .phone-number-input {
                            flex: 1;
                            border: none;
                            padding: 12px 16px;
                            background: transparent;
                            color: #5B4C3A;
                            font-size: 16px;
                            outline: none;
                        }

                        .phone-number-input::placeholder {
                            color: #B9A997;
                        }

                        .phone-input-container:focus-within {
                            border-color: #C1B39D;
                            box-shadow: 0 0 0 0.2rem rgba(193, 179, 157, 0.25);
                        }

                        /* Location Input Container Styles */
                        .location-input-container {
                            display: flex;
                            border: 1px solid #D4C6B5;
                            border-radius: 8px;
                            background-color: white;
                            overflow: hidden;
                        }

                        .location-selector {
                            display: flex;
                            align-items: center;
                            background-color: white;
                            padding: 12px 16px;
                            width: 100%;
                            position: relative;
                            cursor: pointer;
                            user-select: none;
                        }

                        .location-icon {
                            width: 16px;
                            height: 16px;
                            margin-right: 12px;
                            color: #737373;
                            flex-shrink: 0;
                        }

                        .location-text {
                            color: #737373;
                            font-size: 16px;
                            font-weight: 400;
                            flex: 1;
                            text-align: left;
                        }

                        .location-dropdown {
                            position: absolute;
                            top: 100%;
                            left: 0;
                            right: 0;
                            background: white;
                            border: 1px solid #D4C6B5;
                            border-radius: 8px;
                            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
                            max-height: 300px;
                            overflow: hidden;
                            z-index: 1000;
                            min-width: 100%;
                        }

                        .locations-list {
                            max-height: 240px;
                            overflow-y: auto;
                        }

                        .location-option {
                            display: flex;
                            align-items: center;
                            padding: 12px 16px;
                            cursor: pointer;
                            transition: background-color 0.2s ease;
                            border-bottom: 1px solid #F4EFE6;
                        }

                        .location-option:last-child {
                            border-bottom: none;
                        }

                        .location-option:hover {
                            background-color: #F4EFE6;
                        }

                        .location-option.selected {
                            background-color: #C1B39D;
                            color: white;
                        }

                        .option-location-icon {
                            width: 16px;
                            height: 16px;
                            margin-right: 12px;
                            color: #737373;
                            flex-shrink: 0;
                        }

                        .location-option.selected .option-location-icon {
                            color: white;
                        }

                        .location-option .option-name {
                            font-size: 16px;
                            color: #737373;
                            flex: 1;
                            overflow: hidden;
                            text-overflow: ellipsis;
                            white-space: nowrap;
                        }

                        .location-option.selected .option-name {
                            color: white;
                        }

                        .location-input-container:focus-within {
                            border-color: #C1B39D;
                            box-shadow: 0 0 0 0.2rem rgba(193, 179, 157, 0.25);
                        }

                        /* Save And Update Button Styles */
                        .save-update-btn {
                            background-color: #C1B39D;
                            color: #4F3C1E;
                            border: none;
                            border-radius: 8px;
                            padding: 12px 24px;
                            font-family: 'Cormorant Garamond', serif;
                            font-size: 16px;
                            font-weight: 500;
                            text-transform: capitalize;
                            cursor: pointer;
                            transition: all 0.3s ease;
                            box-shadow: none;
                        }

                        .save-update-btn:hover {
                            background-color: #B8A892;
                            color: #737373;
                            transform: translateY(-1px);
                            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
                        }

                        .save-update-btn:active {
                            transform: translateY(0);
                            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.1);
                        }

                        .save-update-btn:focus {
                            outline: none;
                            box-shadow: 0 0 0 3px rgba(193, 179, 157, 0.3);
                        }

                        /* Mobile Responsive Styles */
                        @media (max-width: 768px) {
                            .container {
                                padding: 1rem !important;
                            }

                            .user-profile-card {
                                max-width: 100% !important;
                                margin: 0 !important;
                                padding: 1.5rem !important;
                            }

                            .row.g-4 {
                                --bs-gutter-x: 1rem;
                                --bs-gutter-y: 1rem;
                            }

                            .row.g-3 {
                                --bs-gutter-x: 0.75rem;
                                --bs-gutter-y: 0.75rem;
                            }

                            /* Profile Image Section */
                            .col-md-4 {
                                margin-top: 2rem;
                            }

                            .outer-circle {
                                width: 200px !important;
                                height: 200px !important;
                            }

                            .inner-circle {
                                width: 120px !important;
                                height: 120px !important;
                            }

                            .user-icon-svg {
                                width: 72px !important;
                                height: 72px !important;
                            }

                            .upload-button {
                                padding: 8px 12px !important;
                                font-size: 14px !important;
                            }

                            .camera-icon {
                                width: 16px !important;
                                height: 16px !important;
                            }

                            /* Form Inputs */
                            .form-control {
                                font-size: 16px !important;
                                /* Prevents zoom on iOS */
                            }

                            /* Phone Input */
                            .phone-input-container {
                                flex-direction: column;
                            }

                            .country-selector {
                                min-width: 100% !important;
                                border-right: none !important;
                                border-bottom: 1px solid #D4C6B5;
                                padding: 12px !important;
                            }

                            .phone-number-input {
                                padding: 12px 16px !important;
                            }

                            .country-dropdown {
                                min-width: 100% !important;
                                left: 0 !important;
                                right: 0 !important;
                            }

                            /* Location Input */
                            .location-dropdown {
                                min-width: 100% !important;
                                left: 0 !important;
                                right: 0 !important;
                            }

                            /* Button */
                            .save-update-btn {
                                width: 100% !important;
                                padding: 14px 24px !important;
                                font-size: 16px !important;
                            }

                            /* Typography */
                            h5 {
                                font-size: 20px !important;
                                text-align: center;
                            }

                            .form-label {
                                font-size: 14px !important;
                            }

                            /* Dropdown Lists */
                            .countries-list,
                            .locations-list {
                                max-height: 200px !important;
                            }

                            .country-option,
                            .location-option {
                                padding: 12px 16px !important;
                            }

                            .option-name {
                                font-size: 14px !important;
                            }

                            .option-code {
                                font-size: 13px !important;
                            }
                        }

                        @media (max-width: 576px) {
                            .container {
                                padding: 0.5rem !important;
                            }

                            .user-profile-card {
                                padding: 1rem !important;
                                border-radius: 12px !important;
                            }

                            .outer-circle {
                                width: 160px !important;
                                height: 160px !important;
                            }

                            .inner-circle {
                                width: 100px !important;
                                height: 100px !important;
                            }

                            .user-icon-svg {
                                width: 60px !important;
                                height: 60px !important;
                            }

                            .upload-button {
                                padding: 6px 10px !important;
                                font-size: 13px !important;
                            }

                            .upload-text {
                                font-size: 14px !important;
                            }

                            h5 {
                                font-size: 18px !important;
                            }

                            .form-label {
                                font-size: 13px !important;
                            }

                            .form-control {
                                font-size: 15px !important;
                                padding: 10px 12px !important;
                            }

                            .save-update-btn {
                                padding: 12px 20px !important;
                                font-size: 15px !important;
                            }

                            .country-selector,
                            .location-selector {
                                padding: 10px 12px !important;
                            }

                            .phone-number-input {
                                padding: 10px 12px !important;
                            }

                            .location-text {
                                font-size: 15px !important;
                            }

                            .country-code {
                                font-size: 13px !important;
                            }

                            .search-input {
                                font-size: 13px !important;
                                padding: 6px 10px !important;
                            }
                        }
</style>
