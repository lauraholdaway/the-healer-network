<template>
    <form @submit.prevent="searchDoctor">
        <div class="row search-box bg-white shadow p-3 d-flex align-items-center" style="border-radius: 20px;">
            <!-- Concern / Practice -->
            <div class="col-md-4 text-start" style="border-right: 1px solid #DED1BA;">
                <label class="form-label fw-bold text-dark mb-0">Concern / Practice</label>
                <input type="text" v-model="form.modality" class="form-control border-0 shadow-none"
                    placeholder='Try "Anxiety" or "Naturopathy"' />
            </div>

            <!-- Location -->
            <div class="col-md-4 text-start" style="border-right: 1px solid #DED1BA;">
                <label class="form-label fw-bold text-dark mb-0 text-start">Location</label>
                <div class="d-flex gap-2">
                    <input type="text" v-model="form.location" class="form-control border-0 shadow-none"
                        placeholder="Anywhere" />
                    <button type="button" class="btn btn-outline-dark rounded-pill btn-sm"
                        style="font-size: 10px; width: 320px; background-color: #5B4C3A; color: white;">
                        My Current Location
                    </button>
                </div>
            </div>

            <!-- Search Button -->
            <div class="px-2 col-md-4">
                <button type="submit" class="btn main-btn px-5 w-100 rounded-4">
                    Search
                </button>
            </div>
        </div>
    </form>
</template>

<script setup>
import { ref } from "vue";
import { useRouter } from "vue-router";

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
</script>
