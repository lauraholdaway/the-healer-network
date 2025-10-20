<template>
    <section class="py-5">
        <div class="container text-center mb-4">
            <h1 class="fw-bold m-color">Blogs</h1>
            <p class="text-muted">Explore our latest articles and insights</p>
        </div>

        <div class="container">
            <div class="row g-4">
                <!-- Blog Card -->
                <div class="col-md-4 col-sm-6  " v-for="blog in blogs" :key="blog.id">
                    <div class="card bg-custome border-0 shadow-sm h-100 blog-card">
                        <div class="card-img-top overflow-hidden rounded-top position-relative">
                            <img :src="`/storage/${blog.image}`" class="img-fluid blog-img"  alt="Blog Image" />
                            <span class="badge bg-color m-color position-absolute top-0 start-0 m-2">
                                {{ blog.time }}
                            </span>
                        </div>
                        <div class="card-body text-start">
                            <h3 class="card-title fw-bold text-dark">
                                {{ blog.title }}
                            </h3>
                            <p class="card-text text-muted small">
                                {{ blog.description.length > 80 ? blog.description.substring(0, 80) + '...' :
                                blog.description }}
                            </p>
                        </div>
                        <div class="card-footer  border-0 text-start pb-3">

                            <router-link :to="`/blog/${blog.id}`" class="btn btn-outline-custome btn-sm">
                                Read More
                            </router-link>
                        </div>
                    </div>
                </div>
                <!-- End Blog Card -->
            </div>
        </div>
    </section>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import axios from 'axios'

const blogs = ref([])

onMounted(async () => {
    try {
        const res = await axios.get('/api/blogs')
        blogs.value = res.data
    } catch (error) {
        console.error('Error fetching blogs:', error)
    }
})
</script>

<style scoped>
.m-color {
    color: #5B4C3A;
}

.blog-img {
    width: 21rem;
    object-fit: cover;
    transition: transform 0.4s ease;
}

.blog-card:hover .blog-img {
    transform: scale(1.05);
}

.blog-card {
    border-radius: 12px;
    transition: all 0.3s ease-in-out;
}

.blog-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
}
</style>
