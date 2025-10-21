<template>
    <!-- Breadcrumb Section -->
    <section class="breadcrumb-section py-3 bg-light">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item">
                        <router-link to="/" class="text-decoration-none m-color">Home</router-link>
                    </li>
                    <li class="breadcrumb-item">
                        <router-link to="/blogs" class="text-decoration-none m-color">Blogs</router-link>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">{{ datas?.title || 'Blog Post' }}</li>
                </ol>
            </nav>
        </div>
    </section>

    <!-- Loading State -->
    <section v-if="loading" class="py-5">
        <div class="container text-center">
            <div class="spinner-border m-color" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
            <p class="mt-3 text-muted">Loading blog post...</p>
        </div>
    </section>

    <!-- Blog Content -->
    <section v-else-if="datas" class="blog-detail-section py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-xl-8">
                    <!-- Featured Image -->
                    <div class="blog-featured-image mb-4">
                        <div class="image-wrapper rounded overflow-hidden shadow">
                            <img 
                                :src="`/storage/${datas.image}`" 
                                :alt="datas.title" 
                                class="img-fluid w-100 blog-main-img"
                            >
                        </div>
                    </div>

                    <!-- Blog Header -->
                    <div class="blog-header mb-4">
                        <h1 class="blog-title fw-bold m-color mb-3">{{ datas.title }}</h1>
                        
                        <!-- Blog Meta -->
                        <div class="blog-meta d-flex flex-wrap align-items-center gap-3 mb-4 pb-4 border-bottom">
                            <div class="meta-item d-flex align-items-center">
                                <i class="bi bi-calendar3 me-2 text-muted"></i>
                                <span class="text-muted">{{ datas.time || formatDate(datas.created_at) }}</span>
                            </div>
                            <div class="meta-item d-flex align-items-center" v-if="datas.author">
                                <i class="bi bi-person me-2 text-muted"></i>
                                <span class="text-muted">{{ datas.author }}</span>
                            </div>
                            <div class="meta-item d-flex align-items-center" v-if="datas.category">
                                <i class="bi bi-tag me-2 text-muted"></i>
                                <span class="badge bg-custome m-color">{{ datas.category }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Blog Content -->
                    <div class="blog-content mb-5">
                        <div class="content-wrapper" v-html="datas.description"></div>
                    </div>

                    <!-- Share Section -->
                    <!-- <div class="blog-share py-4 border-top border-bottom mb-5">
                        <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                            <h5 class="mb-0 fw-semibold m-color">Share this article</h5>
                            <div class="social-share d-flex gap-2">
                                <button 
                                    @click="shareOnFacebook" 
                                    class="btn btn-outline-primary btn-sm rounded-circle share-btn"
                                    title="Share on Facebook"
                                >
                                    <i class="bi bi-facebook"></i>
                                </button>
                                <button 
                                    @click="shareOnTwitter" 
                                    class="btn btn-outline-info btn-sm rounded-circle share-btn"
                                    title="Share on Twitter"
                                >
                                    <i class="bi bi-twitter"></i>
                                </button>
                                <button 
                                    @click="shareOnLinkedIn" 
                                    class="btn btn-outline-primary btn-sm rounded-circle share-btn"
                                    title="Share on LinkedIn"
                                >
                                    <i class="bi bi-linkedin"></i>
                                </button>
                                <button 
                                    @click="copyLink" 
                                    class="btn btn-outline-secondary btn-sm rounded-circle share-btn"
                                    title="Copy Link"
                                >
                                    <i class="bi bi-link-45deg"></i>
                                </button>
                            </div>
                        </div>
                    </div> -->

                    <!-- Back to Blogs Button -->
                    <div class="text-center">
                        <router-link to="/blogs" class="btn btn-outline-custome px-4 py-2">
                            <i class="bi bi-arrow-left me-2"></i>
                            Back to All Blogs
                        </router-link>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Error State -->
    <section v-else class="py-5">
        <div class="container text-center">
            <div class="error-state">
                <i class="bi bi-exclamation-circle display-1 text-muted mb-3"></i>
                <h3 class="text-muted">Blog post not found</h3>
                <router-link to="/blogs" class="btn btn-outline-custome mt-3">
                    View All Blogs
                </router-link>
            </div>
        </div>
    </section>
</template>

<script setup>
import axios from 'axios';
import { ref, onMounted } from 'vue';
import { useRoute } from 'vue-router';

const route = useRoute();
const datas = ref(null);
const loading = ref(true);

// Format date helper
const formatDate = (dateString) => {
    if (!dateString) return '';
    const options = { year: 'numeric', month: 'long', day: 'numeric' };
    return new Date(dateString).toLocaleDateString('en-US', options);
};

// Fetch blog data
const fetchdata = async () => {
    loading.value = true;
    try {
        const res = await axios.get(`/api/blog/${route.params.id}`);
        datas.value = res.data;
    } catch (error) {
        console.error('Error fetching blog:', error);
        datas.value = null;
    } finally {
        loading.value = false;
    }
};

// Share functions
const shareOnFacebook = () => {
    const url = encodeURIComponent(window.location.href);
    window.open(`https://www.facebook.com/sharer/sharer.php?u=${url}`, '_blank', 'width=600,height=400');
};

const shareOnTwitter = () => {
    const url = encodeURIComponent(window.location.href);
    const text = encodeURIComponent(datas.value?.title || 'Check out this blog');
    window.open(`https://twitter.com/intent/tweet?url=${url}&text=${text}`, '_blank', 'width=600,height=400');
};

const shareOnLinkedIn = () => {
    const url = encodeURIComponent(window.location.href);
    window.open(`https://www.linkedin.com/sharing/share-offsite/?url=${url}`, '_blank', 'width=600,height=400');
};

const copyLink = () => {
    navigator.clipboard.writeText(window.location.href).then(() => {
        alert('Link copied to clipboard!');
    }).catch(err => {
        console.error('Failed to copy link:', err);
    });
};

onMounted(fetchdata);
</script>

<style scoped>
.m-color {
    color: #5B4C3A;
}

.bg-custome {
    background-color: #F5F1ED;
}

.btn-outline-custome {
    border: 2px solid #5B4C3A;
    color: #5B4C3A;
    transition: all 0.3s ease;
}

.btn-outline-custome:hover {
    background-color: #5B4C3A;
    color: white;
}

.blog-title {
    font-size: 2rem;
    line-height: 1.4;
    margin-bottom: 1rem;
}

@media (max-width: 768px) {
    .blog-title {
        font-size: 1.5rem;
    }
}

.blog-meta {
    font-size: 0.875rem;
}

.meta-item i {
    font-size: 1rem;
}

.blog-featured-image {
    max-height: 450px;
    overflow: hidden;
    border-radius: 12px;
}

.blog-main-img {
    object-fit: cover;
    height: 450px;
    width: 100%;
    transition: transform 0.4s ease;
}

@media (max-width: 768px) {
    .blog-main-img {
        height: 250px;
    }
    
    .blog-featured-image {
        max-height: 250px;
    }
}

.image-wrapper:hover .blog-main-img {
    transform: scale(1.05);
}

.blog-content {
    font-size: 1rem;
    line-height: 1.75;
    color: #333;
    text-align: justify;
}

.blog-content :deep(h1) {
    color: #5B4C3A;
    font-weight: 700;
    font-size: 1.75rem;
    margin-top: 2rem;
    margin-bottom: 1rem;
}

.blog-content :deep(h2) {
    color: #5B4C3A;
    font-weight: 600;
    font-size: 1.5rem;
    margin-top: 1.75rem;
    margin-bottom: 0.875rem;
}

.blog-content :deep(h3) {
    color: #5B4C3A;
    font-weight: 600;
    font-size: 1.25rem;
    margin-top: 1.5rem;
    margin-bottom: 0.75rem;
}

.blog-content :deep(h4),
.blog-content :deep(h5),
.blog-content :deep(h6) {
    color: #5B4C3A;
    font-weight: 600;
    font-size: 1.125rem;
    margin-top: 1.25rem;
    margin-bottom: 0.625rem;
}

.blog-content :deep(p) {
    margin-bottom: 1rem;
    font-size: 1rem;
    line-height: 1.75;
}

.blog-content :deep(img) {
    max-width: 100%;
    height: auto;
    border-radius: 10px;
    margin: 1.5rem auto;
    display: block;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.blog-content :deep(ul),
.blog-content :deep(ol) {
    margin-bottom: 1rem;
    padding-left: 2rem;
    line-height: 1.75;
}

.blog-content :deep(li) {
    margin-bottom: 0.5rem;
}

.blog-content :deep(blockquote) {
    border-left: 4px solid #5B4C3A;
    padding: 1rem 1.5rem;
    margin: 1.5rem 0;
    font-style: italic;
    color: #666;
    background-color: #F5F1ED;
    border-radius: 6px;
}

.blog-content :deep(a) {
    color: #5B4C3A;
    text-decoration: underline;
    transition: color 0.3s ease;
}

.blog-content :deep(a:hover) {
    color: #7a6350;
}

.blog-content :deep(strong),
.blog-content :deep(b) {
    font-weight: 600;
    color: #2c2c2c;
}

.blog-content :deep(em),
.blog-content :deep(i) {
    font-style: italic;
}

.share-btn {
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
}

.share-btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.breadcrumb-item.active {
    color: #5B4C3A;
}

.breadcrumb-item + .breadcrumb-item::before {
    color: #6c757d;
}

.error-state i {
    font-size: 5rem;
}

/* Loading spinner color */
.spinner-border.m-color {
    color: #5B4C3A;
    border-color: #5B4C3A;
    border-right-color: transparent;
}
</style>
