<template>
    <section class="all-blogs-section">
        <!-- Hero Header -->
        <div class="blog-hero">
            <div class="container">
                <div class="blog-hero-content">
                    <div class="breadcrumb-nav">
                        <router-link to="/" class="breadcrumb-link">Home</router-link>
                        <span class="breadcrumb-separator">/</span>
                        <span class="breadcrumb-current">All Blogs</span>
                    </div>
                    <h1 class="blog-hero-title">Wellness & Healing Articles</h1>
                    <!-- <p class="blog-hero-subtitle">
                        Discover transformative insights, healing techniques, and wellness wisdom from our community of holistic practitioners.
                    </p> -->
                </div>
            </div>
        </div>

        <!-- Search and Filter Section -->
        <!-- <div class="search-filter-section">
            <div class="container">
                <div class="search-filter-container">
                    <div class="search-box">
                        <input 
                            type="text" 
                            v-model="searchQuery" 
                            placeholder="Search articles..." 
                            class="search-input"
                            @input="filterBlogs"
                        >
                        <svg class="search-icon" width="20" height="20" viewBox="0 0 24 24" fill="none">
                            <path d="M21 21L16.514 16.506L21 21ZM19 10.5C19 15.194 15.194 19 10.5 19C5.806 19 2 15.194 2 10.5C2 5.806 5.806 2 10.5 2C15.194 2 19 5.806 19 10.5Z" stroke="#5B4C3A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <div class="filter-buttons">
                        <button 
                            class="filter-btn" 
                            :class="{ active: selectedCategory === '' }"
                            @click="filterByCategory('')"
                        >
                            All Articles
                        </button>
                        <button 
                            class="filter-btn" 
                            :class="{ active: selectedCategory === 'wellness' }"
                            @click="filterByCategory('wellness')"
                        >
                            Wellness
                        </button>
                        <button 
                            class="filter-btn" 
                            :class="{ active: selectedCategory === 'healing' }"
                            @click="filterByCategory('healing')"
                        >
                            Healing
                        </button>
                        <button 
                            class="filter-btn" 
                            :class="{ active: selectedCategory === 'meditation' }"
                            @click="filterByCategory('meditation')"
                        >
                            Meditation
                        </button>
                    </div>
                </div>
            </div>
        </div> -->

        <!-- Blogs Grid -->
        <div class="blogs-container">
            <div class="container">
                <div class="blogs-header">
                    <h2 class="blogs-count">{{ filteredBlogs.length }} Articles Found</h2>
                    <div class="view-toggle">
                        <button class="view-btn" :class="{ active: viewMode === 'grid' }" @click="viewMode = 'grid'">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none">
                                <rect x="3" y="3" width="7" height="7" stroke="currentColor" stroke-width="2"/>
                                <rect x="14" y="3" width="7" height="7" stroke="currentColor" stroke-width="2"/>
                                <rect x="3" y="14" width="7" height="7" stroke="currentColor" stroke-width="2"/>
                                <rect x="14" y="14" width="7" height="7" stroke="currentColor" stroke-width="2"/>
                            </svg>
                        </button>
                        <button class="view-btn" :class="{ active: viewMode === 'list' }" @click="viewMode = 'list'">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none">
                                <line x1="8" y1="6" x2="21" y2="6" stroke="currentColor" stroke-width="2"/>
                                <line x1="8" y1="12" x2="21" y2="12" stroke="currentColor" stroke-width="2"/>
                                <line x1="8" y1="18" x2="21" y2="18" stroke="currentColor" stroke-width="2"/>
                                <line x1="3" y1="6" x2="3.01" y2="6" stroke="currentColor" stroke-width="2"/>
                                <line x1="3" y1="12" x2="3.01" y2="12" stroke="currentColor" stroke-width="2"/>
                                <line x1="3" y1="18" x2="3.01" y2="18" stroke="currentColor" stroke-width="2"/>
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="blogs-grid" :class="{ 'list-view': viewMode === 'list' }">
                    <div 
                        class="blog-card-new" 
                        v-for="blog in filteredBlogs" 
                        :key="blog.id"
                    >
                        <div class="blog-image-container">
                            <img 
                                :src="blog?.image ? '/storage/' + blog.image : '/default-image.png'"
                                class="blog-image" 
                                alt="Blog Image"
                            >
                            <div class="blog-overlay">
                                <span class="read-time-badge">{{ blog.time }} mins read</span>
                            </div>
                        </div>
                        <div class="blog-content">
                            <div class="blog-badges">
                                <span class="category-badge">THN</span>
                                <span class="date-badge">{{ formatDate(blog.created_at) }}</span>
                            </div>
                            <h3 class="blog-title">{{ blog.title }}</h3>
                            <p class="blog-description">
                                {{ blog.description.length > 120 ? blog.description.substring(0, 120) + '...' : blog.description }}
                            </p>
                            <div class="blog-actions">
                                <button class="membership-btn">{{ blog.subscription }}</button>
                                <router-link :to="`/blog/${blog.id}`" class="read-more-link">
                                    Read More
                                    <svg width="12" height="12" viewBox="0 0 20 18" fill="none">
                                        <path d="M11.5 1.5L19 9L11.5 1.5ZM19 9L11.5 16.5L19 9ZM19 9L1 9L19 9Z" fill="currentColor"/>
                                    </svg>
                                </router-link>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Load More Button -->
                <div class="load-more-section" v-if="filteredBlogs.length > 0">
                    <button class="load-more-btn" @click="loadMoreBlogs">
                        Load More Articles
                    </button>
                </div>

                <!-- No Results -->
                <div class="no-results" v-if="filteredBlogs.length === 0">
                    <div class="no-results-content">
                        <svg class="no-results-icon" width="64" height="64" viewBox="0 0 24 24" fill="none">
                            <path d="M9 12L11 14L15 10M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z" stroke="#5B4C3A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <h3>No articles found</h3>
                        <p>Try adjusting your search or filter criteria</p>
                        <button class="clear-filters-btn" @click="clearFilters">Clear Filters</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import { ref, onMounted, computed } from 'vue'
import axios from 'axios'

const blogs = ref([])
const searchQuery = ref('')
const selectedCategory = ref('')
const viewMode = ref('grid')
const currentPage = ref(1)
const blogsPerPage = ref(9)

// Computed property for filtered blogs
const filteredBlogs = computed(() => {
    let filtered = blogs.value

    // Filter by search query
    if (searchQuery.value) {
        filtered = filtered.filter(blog => 
            blog.title.toLowerCase().includes(searchQuery.value.toLowerCase()) ||
            blog.description.toLowerCase().includes(searchQuery.value.toLowerCase())
        )
    }

    // Filter by category (you can implement this based on your blog structure)
    if (selectedCategory.value) {
        filtered = filtered.filter(blog => 
            blog.category === selectedCategory.value || 
            blog.title.toLowerCase().includes(selectedCategory.value.toLowerCase())
        )
    }

    return filtered
})

// Methods
const filterBlogs = () => {
    // This will trigger the computed property automatically
}

const filterByCategory = (category) => {
    selectedCategory.value = category
}

const clearFilters = () => {
    searchQuery.value = ''
    selectedCategory.value = ''
}

const loadMoreBlogs = () => {
    currentPage.value++
    // You can implement pagination here
}

const formatDate = (dateString) => {
    if (!dateString) return ''
    const date = new Date(dateString)
    return date.toLocaleDateString('en-US', { 
        year: 'numeric', 
        month: 'short', 
        day: 'numeric' 
    })
}

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
/* Main Section */
.all-blogs-section {
    background-color: #FBF9F7;
    min-height: 100vh;
}

/* Hero Section */
.blog-hero {
    /* background: linear-gradient(135deg, #F5F0E8 0%, #E8DDD4 100%); */
    padding: 30px 0 60px;
    text-align: center;
}

.blog-hero-content {
    max-width: 800px;
    margin: 0 auto;
}

.breadcrumb-nav {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    margin-bottom: 20px;
    font-size: 14px;
}

.breadcrumb-link {
    color: #5B4C3A;
    text-decoration: none;
    transition: color 0.3s ease;
}

.breadcrumb-link:hover {
    color: #3d2f1f;
}

.breadcrumb-separator {
    color: #8B7355;
}

.breadcrumb-current {
    color: #8B7355;
    font-weight: 500;
}

.blog-hero-title {
    font-family: 'Cormorant Garamond', serif;
    font-size: 48px;
    font-weight: 700;
    color: #2E2D29;
    margin-bottom: 20px;
    line-height: 1.2;
}

.blog-hero-subtitle {
    font-size: 18px;
    color: #5B4C3A;
    line-height: 1.6;
    max-width: 600px;
    margin: 0 auto;
}

/* Search and Filter Section */
.search-filter-section {
    background-color: #F5F0E8;
    padding: 40px 0;
    border-bottom: 1px solid #E8DDD4;
}

.search-filter-container {
    display: flex;
    flex-direction: column;
    gap: 30px;
    align-items: center;
}

.search-box {
    position: relative;
    width: 100%;
    max-width: 500px;
}

.search-input {
    width: 100%;
    padding: 16px 50px 16px 20px;
    border: 2px solid #DED1BA;
    border-radius: 25px;
    background-color: #FBF9F7;
    color: #5B4C3A;
    font-size: 16px;
    outline: none;
    transition: all 0.3s ease;
}

.search-input:focus {
    border-color: #5B4C3A;
    box-shadow: 0 0 0 3px rgba(91, 76, 58, 0.1);
}

.search-input::placeholder {
    color: #8B7355;
}

.search-icon {
    position: absolute;
    right: 20px;
    top: 50%;
    transform: translateY(-50%);
    pointer-events: none;
}

.filter-buttons {
    display: flex;
    gap: 12px;
    flex-wrap: wrap;
    justify-content: center;
}

.filter-btn {
    padding: 12px 24px;
    border: 2px solid #DED1BA;
    border-radius: 25px;
    background-color: #FBF9F7;
    color: #5B4C3A;
    font-size: 14px;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.3s ease;
    font-family: 'Cormorant Garamond', serif;
}

.filter-btn:hover {
    border-color: #5B4C3A;
    background-color: #5B4C3A;
    color: #FBF9F7;
}

.filter-btn.active {
    background-color: #5B4C3A;
    color: #FBF9F7;
    border-color: #5B4C3A;
}

/* Blogs Container */
.blogs-container {
    padding: 60px 0;
}

.blogs-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 40px;
}

.blogs-count {
    font-family: 'Cormorant Garamond', serif;
    font-size: 24px;
    font-weight: 600;
    color: #2E2D29;
}

.view-toggle {
    display: flex;
    gap: 8px;
    background-color: #F5F0E8;
    padding: 4px;
    border-radius: 8px;
}

/* Hide view toggle on mobile devices */
@media (max-width: 768px) {
    .view-toggle {
        display: none;
    }
}

.view-btn {
    padding: 10px 14px;
    border: 2px solid #DED1BA;
    background-color: transparent;
    color: #8B7355;
    cursor: pointer;
    border-radius: 8px;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
}

.view-btn:hover {
    border-color: #5B4C3A;
    color: #5B4C3A;
    background-color: rgba(91, 76, 58, 0.1);
}

.view-btn.active {
    background-color: #5B4C3A;
    color: #FBF9F7;
    border-color: #5B4C3A;
    box-shadow: 0 2px 8px rgba(91, 76, 58, 0.3);
}

/* Blog Grid */
.blogs-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 30px;
    margin-bottom: 60px;
}

.blogs-grid.list-view {
    grid-template-columns: 1fr;
}

.blogs-grid.list-view .blog-card-new {
    display: flex;
    flex-direction: row;
    height: 200px;
}

.blogs-grid.list-view .blog-image-container {
    width: 300px;
    height: 100%;
    flex-shrink: 0;
}

.blogs-grid.list-view .blog-content {
    flex: 1;
    padding: 20px;
}

/* Blog Cards */
.blog-card-new {
    background-color: #FBF9F7;
    border: none;
    border-radius: 20px;
    height: 500px;
    display: flex;
    flex-direction: column;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
}

.blog-card-new:hover {
    transform: translateY(-8px);
    box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
}

.blog-image-container {
    position: relative;
    height: 250px;
    overflow: hidden;
    border-radius: 20px 20px 0 0;
}

.blog-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.blog-card-new:hover .blog-image {
    transform: scale(1.05);
}

.blog-overlay {
    position: absolute;
    top: 15px;
    left: 15px;
}

.read-time-badge {
    background-color: rgba(91, 76, 58, 0.9);
    color: #FBF9F7;
    padding: 6px 12px;
    border-radius: 15px;
    font-size: 11px;
    font-weight: 500;
    font-family: 'Cormorant Garamond', serif;
}

.blog-content {
    padding: 25px;
    display: flex;
    flex-direction: column;
    flex-grow: 1;
    background-color: #F5F0E8;
}

.blog-badges {
    display: flex;
    gap: 8px;
    margin-bottom: 15px;
}

.category-badge,
.date-badge {
    background-color: #E8DDD4;
    color: #5B4C3A;
    padding: 4px 12px;
    border-radius: 15px;
    font-size: 11px;
    font-weight: 500;
    font-family: 'Cormorant Garamond', serif;
}

.blog-title {
    font-family: 'Cormorant Garamond', serif;
    font-size: 24px;
    font-weight: 600;
    color: #2E2D29;
    margin-bottom: 15px;
    line-height: 1.3;
}

.blog-description {
    font-family: 'Cormorant Garamond', serif;
    color: #5B4C3A;
    font-size: 14px;
    line-height: 1.6;
    margin-bottom: 25px;
    flex-grow: 1;
}

.blog-actions {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: auto;
}

.membership-btn {
    background-color: #F5F0E8;
    color: #5B4C3A;
    border: 1px solid #DED1BA;
    border-radius: 12px;
    padding: 10px 20px;
    font-size: 12px;
    font-family: 'Cormorant Garamond', serif;
    font-weight: 500;
    transition: all 0.3s ease;
    cursor: pointer;
}

.membership-btn:hover {
    background-color: #5B4C3A;
    color: #F5F0E8;
    border-color: #5B4C3A;
}

.read-more-link {
    color: #5B4C3A;
    text-decoration: none;
    font-family: 'Cormorant Garamond', serif;
    font-weight: 500;
    font-size: 14px;
    transition: color 0.3s ease;
    display: flex;
    align-items: center;
    gap: 6px;
}

.read-more-link:hover {
    color: #2E2D29;
}

/* Load More Section */
.load-more-section {
    text-align: center;
    margin-top: 40px;
}

.load-more-btn {
    background-color: #5B4C3A;
    color: #FBF9F7;
    border: none;
    border-radius: 25px;
    padding: 16px 32px;
    font-size: 16px;
    font-weight: 500;
    font-family: 'Cormorant Garamond', serif;
    cursor: pointer;
    transition: all 0.3s ease;
}

.load-more-btn:hover {
    background-color: #4b4032;
    transform: translateY(-2px);
}

/* No Results */
.no-results {
    text-align: center;
    padding: 80px 20px;
}

.no-results-content {
    max-width: 400px;
    margin: 0 auto;
}

.no-results-icon {
    margin-bottom: 20px;
    opacity: 0.6;
}

.no-results h3 {
    font-family: 'Cormorant Garamond', serif;
    font-size: 24px;
    color: #2E2D29;
    margin-bottom: 10px;
}

.no-results p {
    color: #5B4C3A;
    margin-bottom: 30px;
}

.clear-filters-btn {
    background-color: #5B4C3A;
    color: #FBF9F7;
    border: none;
    border-radius: 20px;
    padding: 12px 24px;
    font-size: 14px;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.3s ease;
}

.clear-filters-btn:hover {
    background-color: #4b4032;
}

/* Responsive Design */
@media (max-width: 1024px) {
    .blog-hero-title {
        font-size: 40px;
    }
    
    .blogs-grid {
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 25px;
    }
}

@media (max-width: 768px) {
    .blog-hero {
        padding: 60px 0 40px;
    }
    
    .blog-hero-title {
        font-size: 32px;
    }
    
    .blog-hero-subtitle {
        font-size: 16px;
    }
    
    .search-filter-container {
        gap: 20px;
    }
    
    .filter-buttons {
        gap: 8px;
    }
    
    .filter-btn {
        padding: 10px 20px;
        font-size: 13px;
    }
    
    .blogs-header {
        flex-direction: column;
        gap: 20px;
        align-items: flex-start;
    }
    
    .blogs-grid {
        grid-template-columns: 1fr;
        gap: 20px;
    }
    
    .blog-card-new {
        height: auto;
        min-height: 450px;
    }
    
    .blog-image-container {
        height: 200px;
    }
    
    .blog-content {
        padding: 20px;
    }
    
    .blog-title {
        font-size: 20px;
    }
}

@media (max-width: 576px) {
    .blog-hero {
        padding: 40px 0 30px;
    }
    
    .blog-hero-title {
        font-size: 28px;
    }
    
    .search-input {
        padding: 14px 45px 14px 18px;
        font-size: 14px;
    }
    
    .filter-buttons {
        justify-content: flex-start;
        overflow-x: auto;
        padding-bottom: 10px;
    }
    
    .filter-btn {
        white-space: nowrap;
        flex-shrink: 0;
    }
    
    .blog-card-new {
        min-height: 400px;
    }
    
    .blog-image-container {
        height: 180px;
    }
    
    .blog-content {
        padding: 15px;
    }
    
    .blog-title {
        font-size: 18px;
    }
    
    .blog-description {
        font-size: 13px;
    }
    
    .blog-actions {
        flex-direction: column;
        gap: 12px;
        align-items: stretch;
    }
    
    .membership-btn {
        text-align: center;
    }
    
    .read-more-link {
        text-align: center;
        justify-content: center;
    }
}
</style>
