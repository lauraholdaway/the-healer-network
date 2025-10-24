<style scoped>
.service-card {
    background-color: #faf8f6;
    border: 1px solid #eee;
    border-radius: 20px;
    transition: all 0.3s ease;
}

.service-card:hover {
    transform: translateY(-5px);
    box-shadow: 0px 6px 20px rgba(0, 0, 0, 0.1);
}

.icon-wrapper {
    font-size: 2rem;
    color: #a66d55;
}

h5 {
    color: #3b2d2a;
}

.tag {
    font-size: 0.9rem;
    font-weight: 500;
    margin-left: 5px;
}

.docter-type {
    background: #5B4C3A;
    border-radius: 20px;
    font-size: 0.85rem;
}

.price {
    color: #5B4C3A;
}

.testimonial-section {
    background-color: #EEE9E3;
}

.subheading {
    font-size: 1.1rem;
    color: #5B4C3A;
}



.card-text {
    font-size: 0.95rem;
    color: #555;
}

.card {
    transition: all 0.3s ease;
    background-color: #E5D9CB;

}

.card:hover {
    transform: translateY(-5px);
}

/* Doctor Profile Section */
.cards {
    border: 1px solid #DED1BA;
    border-radius: 20px;
    padding: 8px;
    background-color: #FAF8F6;
    position: relative;
    overflow: hidden;
}

.cards::before {
    content: '';
    position: absolute;
    top: -20%;
    right: -10%;
    width: 200px;
    height: 200px;

    background-size: contain;
    z-index: 1;
}

.doctor-type-tag {
    background: #5B4C3A;
    color: white;
    padding: 6px 16px;
    border-radius: 20px;
    font-size: 0.85rem;
    font-weight: 500;
    display: inline-block;
    margin-bottom: 1rem;
}

.doctor-name {
    color: #2E2D29;
    font-size: 2rem;
    font-weight: 700;
    margin-bottom: 0.8rem;
    line-height: 1.2;
}

.rating-section {
    display: flex;
    align-items: center;
    gap: 1rem;
    margin-bottom: 1rem;
}

.stars {
    color: #2E2D29;
    font-size: 1.1rem;
}

.rating-text {
    background: #5B4C3A;
    color: white;
    padding: 6px 12px;
    border-radius: 15px;
    font-weight: 500;
    font-size: 0.9rem;
}

.doctor-description {
    color: #2E2D29;
    line-height: 1.5;
    margin-bottom: 1.5rem;
    font-size: 0.95rem;
    position: relative;
    z-index: 2;
}

.book-session-btn {
    background: #C1B39D;
    color: white;
    border: none;
    padding: 12px 24px;
    border-radius: 10px;
    font-weight: 600;
    font-size: 1rem;
    transition: all 0.3s ease;
    text-decoration: none;
    display: inline-block;
    position: relative;
    z-index: 2;
}

.book-session-btn:hover {
    background: #8A7356;
    color: white;
    text-decoration: none;
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(46, 45, 41, 0.3);
}

/* Modern Rating Container */
.modern-rating-container {
    background: #DED1BA;
    border-radius: 50px;
    padding: 12px 24px;
    display: flex;
    align-items: center;
    gap: 16px;

    transition: all 0.3s ease;
}

.modern-rating-container:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(91, 76, 58, 0.2);
}

.rating-number {
    font-family: 'Georgia', serif;
    font-size: 1.5rem;
    font-weight: 600;
    color: #5B4C3A;
    margin: 0;
    line-height: 1;
}

.rating-stars {
    display: flex;
    gap: 4px;
    align-items: center;
}

.rating-stars i {
    font-size: 1.2rem;
    color: #5B4C3A;
    transition: all 0.2s ease;
}

.rating-stars i:hover {
    transform: scale(1.1);
    color: #8A7356;
}

/* Responsive Design for Rating */
@media (max-width: 768px) {
    .modern-rating-container {
        padding: 10px 20px;
        gap: 12px;
    }

    .rating-number {
        font-size: 1.3rem;
    }

    .rating-stars i {
        font-size: 1.1rem;
    }
}

@media (max-width: 576px) {
    .modern-rating-container {
        padding: 8px 16px;
        gap: 10px;
        flex-direction: column;
        border-radius: 25px;
    }

    .rating-number {
        font-size: 1.2rem;
    }

    .rating-stars i {
        font-size: 1rem;
    }
}

/* Testimonial Cards Styling */
.testimonial-card {
    background-color: #E5D9CB;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
    border: none;
    height: 400px;
    /* Fixed height for all cards */
        display: flex;
        flex-direction: column;
    }

.testimonial-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
}

.testimonial-content {
    display: flex;
    flex-direction: column;
    height: 100%;
}

.testimonial-image {
    flex-shrink: 0;
    height: 220px;
    /* Increased height for better image display */
    overflow: hidden;
    position: relative;
    background-color: #f0f0f0;
}

.testimonial-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center top;
    transition: transform 0.3s ease;
}

.testimonial-image:hover img {
    transform: scale(1.05);
}

.testimonial-text {
    padding: 20px;
    flex-grow: 1;
    display: flex;
    flex-direction: column;
    background-color: #E5D9CB;
    min-height: 180px;
    /* Minimum height for text area */
}

.testimonial-title {
    font-size: 1.1rem;
    font-weight: 600;
    color: #2E2D29;
    margin-bottom: 12px;
    line-height: 1.3;
}

.testimonial-description {
    font-size: 0.95rem;
    color: #555;
    line-height: 1.5;
    margin-bottom: 15px;
    flex-grow: 1;
    overflow: hidden;
    display: -webkit-box;
    -webkit-line-clamp: 4;
    line-clamp: 4;
    -webkit-box-orient: vertical;
}

.testimonial-rating {
    display: flex;
    gap: 3px;
    margin-top: auto;
    padding-top: 10px;
}

.testimonial-rating i {
    color: #5B4C3A;
    font-size: 1.1rem;
}

/* Responsive adjustments for testimonial cards */
@media (max-width: 768px) {
    .testimonial-card {
        height: 380px;
        /* Slightly smaller for tablets */
    }

    .testimonial-image {
        height: 200px;
    }

    .testimonial-text {
        padding: 15px;
        min-height: 180px;
    }

    .testimonial-title {
        font-size: 1rem;
    }

    .testimonial-description {
        font-size: 0.9rem;
        -webkit-line-clamp: 3;
        line-clamp: 3;
    }
}

@media (max-width: 576px) {
    .testimonial-card {
        height: 360px;
        /* Smaller for mobile */
    }

    .testimonial-image {
        height: 180px;
    }

    .testimonial-text {
        padding: 12px;
        min-height: 180px;
    }

    .testimonial-description {
        -webkit-line-clamp: 3;
        line-clamp: 3;
    }
}

/* Horizontal Scroll Swiper Styles */
.horizontal-scroll-swiper {
    padding: 10px 0 30px 0;
    overflow: hidden;
    max-width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
}

.swiper-slide-auto {
    width: 320px !important;
    height: auto;
}

/* Scrollbar hidden but scroll functionality maintained */
.horizontal-scroll-swiper .swiper-scrollbar {
    display: none;
}

/* Prevent page scroll and enable only cards section scroll */
body {
    overflow-x: hidden;
}

.testimonial-section {
    overflow-x: hidden;
}

.container-fluid {
    overflow-x: hidden;
}

/* Enable smooth scrolling only in swiper */
.horizontal-scroll-swiper .swiper-wrapper {
    transition-timing-function: ease-in-out;
    display: flex;
    align-items: center;
}

/* Center the swiper container */
.horizontal-scroll-swiper .swiper {
    width: 100%;
    display: flex;
    justify-content: center;
}

/* Responsive adjustments for horizontal scroll */
@media (max-width: 768px) {
    .swiper-slide-auto {
        width: 280px !important;
    }
}

@media (max-width: 576px) {
    .swiper-slide-auto {
        width: 260px !important;
    }
}

/* Mobile Responsive Styles */
@media (max-width: 991px) {
    .doctor-name {
        font-size: 1.75rem;
    }

    .cards {
        padding: 15px;
    }
}

@media (max-width: 768px) {
    .doctor-name {
        font-size: 1.5rem;
        margin-top: 1rem;
    }

    .doctor-description {
        font-size: 0.9rem;
    }

    .book-session-btn {
        width: 100%;
        text-align: center;
        margin-top: 1rem;
    }

    .rating-section {
        flex-direction: column;
        align-items: flex-start;
        gap: 0.5rem;
    }

    .cards {
        padding: 12px;
    }

    .service-card {
        margin-bottom: 1rem;
    }

    .service-card h5 {
        font-size: 1.1rem;
    }

    .service-card p {
        font-size: 0.9rem;
    }

    .subheading {
        font-size: 1.3rem !important;
        line-height: 1.5;
    }
}

@media (max-width: 576px) {
    .doctor-name {
        font-size: 1.25rem;
    }

    .doctor-type-tag {
        font-size: 0.75rem;
        padding: 5px 12px;
        margin-bottom: 0.5rem;
    }

    .rating-section .stars {
        font-size: 1rem;
    }

    .rating-text {
        font-size: 0.8rem;
        padding: 5px 10px;
    }

    .doctor-description {
        font-size: 0.85rem;
        line-height: 1.4;
    }

    .book-session-btn {
        padding: 10px 20px;
        font-size: 0.9rem;
    }

    .cards {
        padding: 10px;
        margin: 1rem 0 !important;
    }

    .service-card {
        padding: 1rem !important;
    }

    .service-card h5 {
        font-size: 1rem;
    }

    .service-card p {
        font-size: 0.85rem;
    }

    .subheading {
        font-size: 1.1rem !important;
        padding: 0 15px;
    }

    .testimonial-section {
        padding: 2rem 0 !important;
    }

    .container-fluid.mt-5.py-5 {
        padding: 2rem 0 !important;
        margin-top: 2rem !important;
    }
}

/* Info Bar Responsive */
@media (max-width: 768px) {
    .info-box .col-md-3 {
        border-right: none !important;
        border-bottom: 1px solid rgba(255, 255, 255, 0.3);
        padding-bottom: 1rem;
        margin-bottom: 1rem;
    }

    .info-box .col-md-3:last-child {
        border-bottom: none;
        margin-bottom: 0;
    }

    .info-box h6 {
        font-size: 0.95rem;
    }

    .info-box p {
        font-size: 0.85rem;
    }
}

@media (max-width: 576px) {
    .info-box {
        padding: 1.5rem 1rem !important;
    }

    .info-box h6 {
        font-size: 0.9rem;
    }

    .info-box p {
        font-size: 0.8rem;
    }

    .info-box .col-6 {
        margin-bottom: 1rem !important;
    }
}

/* Service Card Price Section Responsive */
@media (max-width: 576px) {
    .service-card .my-3.d-flex {
        flex-direction: column;
        align-items: flex-start !important;
        gap: 0.5rem;
    }

    .service-card svg {
        width: 30px;
        height: 30px;
    }
}
</style>
<template>
    <section>
        <div class="container">

            <!-- Doctor card -->
            <div class="cards mx-md-3 my-5">
                <div class="row" v-if="doctor">
                    <!-- Left image only -->
                    <div class="col-md-4 col-12 mb-3 mb-md-0">
                        <div class="rounded-4 text-center"
                            style="background: linear-gradient(180deg, #c4b39a 0%, rgb(91 76 58 / 41%) 100%); padding:0px;">
                            <img :src="doctor?.user?.image ? '/storage/' + doctor.user.image : '/default-image.png'"
                                class="doctorImages img-fluid rounded-4" alt="practitioner"
                                style="display: inline-block;" />
                        </div>
                    </div>

                    <!-- Right content -->
                    <div class="col-md-8 col-12 d-flex align-items-center">
                        <div class="w-100">
                            <!-- Doctor Type Tag -->
                            <div class="doctor-type-tag me-2 mb-2 d-inline-block"
                                v-for="(s, index) in doctor.modalities" :key="index" style="background:#C4B39A;">
                                {{ s?.title }}
                            </div>

                            <!-- Doctor Name -->
                            <h1 style="font-size: 30px; font-weight: 300;" class="doctor-name">{{ doctor?.user?.name }}
                                {{ doctor?.user?.last_name }} {{ doctor?.user?.specialization }}</h1>

                            <!-- Rating Section -->
                            <div class="rating-section">
                                <div class="stars" style="color: #5B4C3A; ">
                                    <i class="bi bi-star-fill me-1" v-for="star in 5" key="star"
                                        :class="star <= avg ? 'bi-star-fill' : 'bi-star-fill text-secondary'"></i>

                                </div>
                                <div class="rating-text" v-if="avg && count"
                                    style="background: #5B4C3A; color: white; padding: 6px 12px; border-radius: 8px; font-weight: 500; font-size: 0.9rem;">
                                    {{ avg.toFixed(1) || '0' }} {{ count }} Reviews
                                </div>
                            </div>

                            <!-- Doctor Description -->
                            <p class="doctor-description">
                            <p class="doctor-description">
                                {{ doctor?.about || "-" }}
                            </p>


                            </p>

                            <!-- Book Session Button -->
                            <router-link v-if="doctor?.user?.id" :to="`/booksession/${doctor.user.id}`"
                                class="book-session-btn">
                                Book A Session
                            </router-link>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container my-5">
                <section class="info-bar my-5">
                    <div class="container" style="background-color: #8A7356; border-radius: 13px;">
                        <div class="row text-center text-white py-4 px-3 rounded-4 info-box">

                            <div class="col-md-3 col-6 mb-3 mb-md-0 border-end border-light">
                                <h6 class="fw-semibold fst-italic">Focus Areas</h6>
                                <hr class="my-2 border-light">
                                <p class="mb-0 small">Personal Development & Life Transitions</p>
                            </div>

                            <div class="col-md-3 col-6 mb-3 mb-md-0 border-end border-light">
                                <h6 class="fw-semibold fst-italic">Location</h6>
                                <hr class="my-2 border-light">
                                <p class="mb-0 small">{{ doctor?.practice_location }},<br>{{ doctor?.address }}
                                </p>
                            </div>

                            <div class="col-md-3 col-6 mb-3 mb-md-0 border-end border-light">
                                <h6 class="fw-semibold fst-italic">Languages</h6>
                                <hr class="my-2 border-light">
                                <p class="mb-0 small">{{ doctor?.languages }}</p>
                            </div>

                            <div class="col-md-3 col-6">
                                <h6 class="fw-semibold fst-italic">Certifications</h6>
                                <hr class="my-2 border-light">
                                <p class="mb-0 small" v-for="GetCer in GetCert">{{ GetCer?.title }}</p>
                            </div>

                        </div>
                    </div>
                </section>

            </div>
            <br>
            <!-- Service cards -->
            <div class="my-5">
                <div class="row g-4">

                    <!-- Trauma therapy -->
                    <div class="col-md-6 col-12" v-for="s in services" :key="s.id">
                        <div class="service-card p-4 h-100 shadow-sm rounded-3">
                            <div class="align-items-start">
                                <div class="my-3 d-flex justify-content-between align-items-center">
                                    <!-- Example SVG -->
                                    <div>
                                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_18_178)">
                                                <path
                                                    d="M39.3094 19.3642C39.3094 30.0749 30.6353 38.6736 20 38.6736C12.4572 38.6736 5.97044 34.4496 2.72705 28.1892C2.95333 27.8875 3.10419 27.5857 3.25504 27.3595C3.4059 27.1332 3.55675 26.9069 3.63218 26.7561C5.81958 23.5127 8.45955 20.6465 11.5521 18.1573C11.5521 19.515 12.6081 20.571 13.9657 20.571C15.3235 20.571 16.3795 19.515 16.3795 18.1573C16.3795 17.1013 15.7006 16.1962 14.7201 15.8945C15.3988 15.4419 16.0777 15.0648 16.832 14.6122C17.8126 14.6122 18.8686 14.5368 19.9246 14.5368C26.2605 14.5368 32.2946 15.5173 38.0271 17.2522L39.1585 17.5538C39.234 18.1573 39.234 18.7607 39.234 19.3642H39.3094ZM14.1166 5.18377C11.3258 5.41004 8.53498 5.78718 5.74416 6.31518C9.28926 2.46837 14.3429 0.0546875 20 0.0546875C22.112 0.0546875 24.0731 0.431826 26.0342 1.03524C21.8102 1.86495 17.8126 3.29807 14.1166 5.18377ZM26.4114 30.0749C26.8639 30.5275 27.6181 30.452 28.0707 29.9995C28.5233 29.4715 28.5233 28.7171 27.9953 28.2646C26.4114 26.8315 23.9222 25.3984 20.6034 25.3984C19.3211 25.3984 18.1897 25.6246 17.2091 25.9264C16.5303 26.1526 16.2286 26.8315 16.3795 27.4349C16.6057 28.1137 17.2846 28.4155 17.888 28.2646C18.7177 28.0384 19.5474 27.8875 20.6034 27.8875C23.168 27.8875 25.1291 28.9435 26.4114 30.0749ZM26.0342 20.571C27.3919 20.571 28.4479 19.515 28.4479 18.1573C28.4479 16.8751 27.3919 15.7436 26.0342 15.7436C24.6765 15.7436 23.6205 16.8751 23.6205 18.1573C23.6205 19.515 24.6765 20.571 26.0342 20.571Z"
                                                    fill="#C1B39D" />
                                                <path
                                                    d="M34.1804 6.31513C29.8811 5.48543 25.4308 4.95743 20.9051 4.95743C23.7714 3.97687 26.7885 3.2226 29.9564 2.84546C31.465 3.82601 32.8982 4.95743 34.1804 6.31513ZM36.4432 9.2568C37.4992 10.9916 38.2535 12.8773 38.7815 14.9139C32.8227 13.1036 26.4868 12.123 20 12.123C18.6423 12.123 17.36 12.1985 16.1533 12.2739C12.5326 12.5002 8.98759 12.9528 5.59334 13.7824C4.08479 14.0842 2.65167 14.4613 1.14312 14.9139C1.67111 12.8773 2.42539 10.9916 3.48138 9.2568C7.17732 8.4271 10.9487 7.82368 14.7955 7.52197C16.4549 7.37111 18.1898 7.29568 20 7.29568C23.0172 7.29568 25.9588 7.52197 28.825 7.89911C31.3896 8.20082 33.9542 8.65339 36.4432 9.2568ZM11.6275 15.1402C7.70532 17.931 4.31108 21.4761 1.59568 25.4737C0.992263 23.5127 0.690552 21.4761 0.690552 19.3642C0.690552 19.1378 0.690552 18.9115 0.690552 18.6853C1.14312 18.1573 1.59568 17.7047 2.04825 17.1767C5.14078 16.2715 8.30874 15.5928 11.6275 15.1402ZM14.7201 15.8944C15.7006 16.1962 16.3795 17.1013 16.3795 18.1573C16.3795 19.5149 15.3235 20.5709 13.9658 20.5709C12.6081 20.5709 11.5521 19.5149 11.5521 18.1573C12.6081 17.403 13.6641 16.5733 14.7201 15.8944ZM26.0343 20.5709C24.6765 20.5709 23.6205 19.5149 23.6205 18.1573C23.6205 16.875 24.6765 15.7435 26.0343 15.7435C27.3919 15.7435 28.4479 16.875 28.4479 18.1573C28.4479 19.5149 27.3919 20.5709 26.0343 20.5709Z"
                                                    fill="#A28F71" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_18_178">
                                                    <rect width="40" height="40" fill="white" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </div>
                                    <div>
                                        <span class="px-2" style="color: #8A7356;">Rate Per Session</span>
                                        <span class="px-2">$ {{ s.rate_per_session }}</span>
                                    </div>
                                </div>
                                <div>
                                    <h5 class="fw-bold">{{ s.title }}</h5>
                                    <p class="text-muted">
                                        {{ s.description }}
                                    </p>
                                </div>
                                <div class="text-center p-2 rounded-2" style="background-color: #F4EFE6;">
                                    <p>{{ s.ideal_for }}</p>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
        <img src="/public/asset/images/d.png" alt="" class="mb--2 w-100 d-none d-md-block">

        <section class="testimonial-section py-5">
            <div class="container-fluid text-center">

                <!-- Heading -->
                <p class="subheading fw-bold" style="font-size: 28px;">Our mission is to help over 100,000 people
                    worldwide improve <br class="d-none d-md-block"> their mental health and wellbeing
                </p>

                <!-- Rating -->
                <div class="d-flex justify-content-center align-items-center mb-3">
                    <div class="modern-rating-container" v-if="avg">

                        <div class="rating-number">{{ avg.toFixed(1) }}</div>

                        <div class="rating-stars">


                            <i class="bi" v-for="star in 5" :key="star"
                                :class="star <= avg ? 'bi-star-fill' : 'bi-star-fill text-secondary'"></i>
                        </div>

                    </div>
                </div>
                <!-- <p class="text-muted">Excellent rating from 200 reviews</p> -->
                <div class="container-fluid mt-5 py-5    d-flex justify-content-center" v-if="Ratings">
                    <Swiper :slides-per-view="'auto'" :space-between="20" :loop="true"
                        class="mySwiper horizontal-scroll-swiper" :autoplay="{ delay: 3000 }" :free-mode="true"
                        :grab-cursor="true" :mousewheel="{
                            forceToAxis: true,
                            sensitivity: 1,
                            releaseOnEdges: true
                        }" :keyboard="true" :resistance-ratio="0.85" :breakpoints="{
                            320: { slidesPerView: 1.2, spaceBetween: 15 },
                            576: { slidesPerView: 1.5, spaceBetween: 20 },
                            768: { slidesPerView: 2.2, spaceBetween: 20 },
                            992: { slidesPerView: 2.8, spaceBetween: 20 },
                            1200: { slidesPerView: 3.2, spaceBetween: 20 }
                        }">

                        <SwiperSlide v-for="(Rating, index) in Ratings" :key="index" class="swiper-slide-auto">
                            <div class="testimonial-card h-100">

                                <!-- Alternate layout -->
                                <div v-if="index % 2 === 0" class="testimonial-content">
                                    <!-- Image on top -->
                                    <div class="testimonial-image">
                                        <img :src="Rating?.user?.image ? '/storage/' + Rating.user.image : '/default-image.png'"
                                            alt="User" />
                                    </div>
                                    <div class="testimonial-text">
                                        <h6 class="testimonial-title">
                                            {{ Rating?.user?.name }} {{
                                                Rating?.user?.last_name
                                            }}</h6>
                                        <p class="testimonial-description">{{ Rating?.msg || "_" }}
                                        </p>
                                        <div class="testimonial-rating">
                                            <i class="bi" v-for="star in 5" :key="star"
                                                :class="star <= Rating.rating ? 'bi-star-fill' : 'bi-star-fill text-secondary'"></i>
                                        </div>
                                    </div>
                                </div>

                                <div v-else class="testimonial-content">
                                    <!-- Text on top -->
                                    <div class="testimonial-text">
                                        <p class="testimonial-description">{{ Rating?.msg || "_" }}</p>
                                        <div class="testimonial-rating">

                                            <i v-for="star in 5" :key="star" class="bi"
                                                :class="star <= Rating.rating ? 'bi-star-fill ' : 'bi-star text-secondary'">
                                            </i>
                                        </div>
                                    </div>
                                    <div class="testimonial-image">
                                        <img :src="Rating?.user?.image ? '/storage/' + Rating.user.image : '/default-image.png'"
                                            alt="User" />
                                    </div>
                                </div>
                            </div>
                        </SwiperSlide>
                    </Swiper>
                </div>


            </div>
        </section>
        <Joinus />
    </section>
</template>
<script setup>
import Joinus from '../components/joinus.vue';
import { ref, watch, onMounted } from "vue";
import { useRoute, useRouter } from "vue-router";
import axios from "axios";

import { Swiper, SwiperSlide } from 'swiper/vue'
import 'swiper/swiper-bundle.css'

const doctor = ref(null);
const services = ref(null);
const route = useRoute();
const router = useRouter();
const doctors = ref(null);
const GetCert = ref(null);
const Ratings = ref(null);
const avg = ref(null);
const count = ref(null);

async function loaddoctor() {
    try {
        axios.get(`/api/doctor/${route.params.id}`).then(({ data }) => {
            doctor.value = data;
        });
    }
    catch (err) { console.error("Failed to load Doctor:", err); }
}
async function getcertificate() {
    try {
        axios.get(`/api/doctorCertificate/${route.params.id}`).then(({ data }) => {
            GetCert.value = data;
        });
    }
    catch (err) { console.error("Failed to load Doctor GetCertificate:", err); }
}


onMounted(async () => {
    try {
        const res = await axios.get(`/api/doctorservice/${route.params.id}`);
        services.value = res.data;

    } catch (error) {
        console.error('Doctor  Serivece APi'.error);

    }
});

onMounted(async () => {
    try {
        const res = await axios.get(`/api/getRating/${route.params.id}`);
        Ratings.value = res.data.data;
        avg.value = res.data.avg;
        count.value = res.data.count;

    } catch (error) {
        console.error('Doctor  Ratings APi'.error);

    }
});

onMounted(async () => {
    try {
        const res = await axios.get('/api/GetAllDoctor');
        doctors.value = res.data;

    } catch (error) {
        console.error('Doctor APi'.error);

    }
});

onMounted(() => {
    loaddoctor();
    getcertificate();
});


</script>
