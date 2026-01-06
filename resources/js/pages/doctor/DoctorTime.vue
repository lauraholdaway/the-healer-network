<template>
    <div class="content flex-grow-1 p-4">
        <div class="card p-4 session-card">
            <h3 class="mb-4 Seasons-fonts">💰 Healer Packages</h3>
            <!-- Packages -->
            <div v-for="(pkg, index) in packages" :key="index" class="row mb-3 border p-2 rounded">
                <div class="col-md-3">
                    <label class="form-label">Price</label>
                    <input v-model="pkg.price" type="number" class="form-control" placeholder="Enter price" />
                </div>
                <div class="col-md-3">
                    <label class="form-label">Type</label>
                    <input v-model="pkg.type" type="text" class="form-control" placeholder="e.g. Online / In-person" />
                </div>
                <div class="col-md-3">
                    <label class="form-label">Time / Minutes</label>
                    <input v-model="pkg.time" type="text" class="form-control" placeholder="e.g. 60 Minutes" />
                </div>
                <div class="col-md-2 mt-4">
                    <button class="btn btn-danger w-100" @click="removePackage(index)">Remove</button>
                </div>
            </div>

            <button class="btn btn-outline-primary mb-4 main-btn2" @click="addPackage">+ Add Package</button>

            <!-- Save -->
            <div class="text-end">
                <button class="btn btn-success px-4 main-btn" @click="savePackages">Save Packages</button>
            </div>
            <br>
            <hr>
            <table class="table table-bordered table-hover">
                <thead class="table-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Price</th>
                        <th scope="col">Type</th>
                        <th scope="col">Time</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(pkg, index) in packagesdata" :key="pkg.id">
                        <th scope="row" class="Avenir">{{ index + 1 }}</th>
                        <td>{{ pkg.price }}</td>
                        <td>{{ pkg.type }}</td>
                        <td>{{ pkg.time }}</td>
                        <td> <button class="btn btn-sm btn-danger" @click="deletePackage(pkg.id)"><i
                                    class="bi bi-trash3"></i></button>
                        </td>
                    </tr>
                    <tr v-if="packagesdata.length === 0">
                        <td colspan="4" class="text-center">No packages found</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div>
        </div>

    </div>
</template>

<script setup>
import { ref, onMounted } from "vue";
import { useAuthStore } from "../../stores/auth";
import axios from "axios";
import { useNotification } from "@kyvg/vue3-notification";
const { notify } = useNotification();


const doctorId = ref("");
const packages = ref([{ price: "", type: "" ,time: "" }]);
const auth = useAuthStore();

function addPackage() {
    packages.value.push({ price: "", type: "" ,time: "" });
}

function removePackage(index) {
    packages.value.splice(index, 1);
}



async function savePackages() {
    try {
        await axios.post("/api/doctor/packages", {
            doctor_id: auth.user.id,
            packages: packages.value,
        });


        notify({
            title: "Succes",
            text: "Packages saved Successfuly",
        });

        packages.value = "";
        getPackages();


    } catch (err) {
        console.error("Packages saved :", err);
        alert("Error Packages saved !");
    }
}

const packagesdata = ref([]);
async function getPackages() {
    try {
        const res = await axios.get(`/api/package/${auth.user.id}`);
        packagesdata.value = res.data;
    }
    catch (err) { console.error("Failed to load packages:", err); }
}

async function deletePackage(id) {
    if (!confirm("Are you sure you want to delete this package?"))
        return;
    try { await axios.delete(`/api/packages/delete/${id}`);
         packages.value = packages.value.filter((pkg) => pkg.id !== id);
        getPackages();
        notify({
            title: "Succes",
            text: "Date Package Successfuly",
        });
        }
    catch (err) { console.error("Failed to delete package:", err); }
}


onMounted(() => {
    getPackages();
});
</script>

<style scoped>
.session-card {
    border: 1px solid #eee;
    border-radius: 10px;
    box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.08);
}
</style>
