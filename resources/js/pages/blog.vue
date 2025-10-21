<template>
    <section>
        <div class="container p-5">
            <div>
                <h3 class="fw-semibold mb-2">Blog</h3>
                <p class="text-muted mb-4">
                    Read The Blogs.
                </p>
            </div>
            <div>
                <div v-if="datas">
                    <div>
                        <img :src="`/storage/${datas.image}`" alt="Blog image" class="img-fluid">
                    </div>
                    <br>
                    <h2>{{ datas.title }}</h2>
                    <br>
                    <div v-html="datas.description"></div>
                </div>
                <div v-else>
                    <p>Loading...</p>
                </div>
            </div>
        </div>
    </section>
</template>
<script setup>
import axios from 'axios';
import { ref, onMounted } from 'vue';
import { useRoute } from 'vue-router';

const route = useRoute();
const datas = ref(null)

const fetchdata = async () => {
    try {
        const res = await axios.get(`/api/blog/${route.params.id}`)
        datas.value = res.data;
    } catch (error) {
        console.log(error);
    }
}
onMounted(fetchdata)
</script>
