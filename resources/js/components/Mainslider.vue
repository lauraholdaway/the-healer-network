
<template>
  <div class="healing-slider-container">
    <div class="healing-center-overlay" aria-hidden="true"></div>
      <div class="healing-bottom-overlay" aria-hidden="true"></div>
    <section class="healing-slider">
      <div class="slide-wrapper">
        <div class="copy-block">
          <transition name="fade" mode="out-in">
            <div :key="activeSlide.id">
              <!-- <p class="eyebrow">{{ activeSlide.eyebrow }}</p> -->
              <h2 class="slide-titlee">{{ activeSlide.title }}</h2>
              <p class="slide-subtitle">{{ activeSlide.subtitle }}</p>
            </div>
          </transition>
  
          <div class="card-area">
            <div class="slide-indicator" aria-hidden="true">
              <div class="indicator-count">{{ formattedCurrent }}</div>
              <div class="indicator-stem">
                <span class="indicator-progress" :style="{ height: progressHeight }"></span>
              </div>
              <div class="indicator-total">{{ formattedTotal }}</div>
            </div>
  
            <div class="healing-card">
              <transition name="fade" mode="out-in">
                <div :key="`card-${activeSlide.id}`">
                  <h3 class="card-title">{{ activeSlide.cardTitle }}</h3>
                  <p class="card-copy">{{ activeSlide.cardDescription }}</p>
                </div>
              </transition>

              <div class="card-nav">
                <button type="button" class="nav-button" @click="goPrev" aria-label="Previous healing image">
                  <span aria-hidden="true"><img src="/public/asset/images/arrowliftt.svg" alt="Previous" class="arrow-icon"></span>
                </button>
                <button type="button" class="nav-button" @click="goNext" aria-label="Next healing image">
                    <span aria-hidden="true"><img src="/public/asset/images/arrowrightt.svg" alt="Next" class="arrow-icon"></span>
                </button>
              </div>
            </div>
          </div>
        </div>
  
        <div class="image-block">
          <router-link to="/Alldoctor" class="book-now">
            Book Now
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                style="margin-left: 4px; display: inline-block; vertical-align: middle;">
                <path d="M5 12H19M19 12L12 5M19 12L12 19" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round" />
            </svg>
          </router-link>
          <Swiper
            class="healing-swiper"
            :modules="swiperModules"
            :slides-per-view="1"
            :loop="true"
            speed="900"
            @swiper="onInit"
            @slideChange="onSlideChange"
          >
            <SwiperSlide v-for="slide in slides" :key="slide.id">
              <img :src="slide.image" :alt="slide.alt" loading="lazy" />
            </SwiperSlide>
          </Swiper>
        </div>
      </div>
    </section>
  </div>
</template>
  
  <script setup>
  import { computed, ref } from "vue";
import { Swiper, SwiperSlide } from "swiper/vue";
import "swiper/css";

  
const slides = [
  {
      id: 1,
    //   eyebrow: "Discover the Right Healing for You",
      title: "Discover the Right Healing for You",
      subtitle:
        "Explore holistic approaches that enhance your mind, body, and soul.",
      cardTitle: "Energy Healing",
      cardDescription:
        "Explore transformative healing techniques like Reiki, Kinesiology, and EFT to restore harmony and balance to your body’s energy systems.",
      image: "/asset/images/slider1.jpg",
      alt: "Energy therapy session with glowing hands near head",
    },
    {
      id: 2,
      eyebrow: "Discover the holistic therapy that is right for you",
      title: "Discover the holistic therapy that is right for you",
      subtitle:
        "THNs practitioners provide expertise across a wide range of holistic modalities going beyond the physical body.",
      cardTitle: "Holistic Self Care",
      cardDescription:
        "Nurture yourself and those around you with mindfulness and holistic nutrition that promotes overall health and wellbeing.",
      image: "/asset/images/slider2.jpg",
      alt: "Close-up of hands clasped together with warm background",
    },
    {
      id: 3,
      eyebrow: "Discover the holistic therapy that is right for you",
      title: "Discover the holistic therapy that is right for you",
      subtitle:
        "THNs practitioners provide expertise across a wide range of holistic modalities going beyond the physical body.",
      cardTitle: "Natural Healing",
      cardDescription:
        "Harness the power of nature to support your self-healing abilities through naturopathy, ayurveda, and herbal medicine.",
      image: "/asset/images/slider3.jpg",
      alt: "Natural healing ingredients in jars and wooden spoon",
    },
    {
      id: 4,
      eyebrow: "Discover the holistic therapy that is right for you",
      title: "Discover the holistic therapy that is right for you",
      subtitle:
        "THNs practitioners provide expertise across a wide range of holistic modalities going beyond the physical body.",
      cardTitle: "Emotional and Mental Support",
      cardDescription:
        "Boost your emotional and mental wellbeing with holistic coaching, hypnotherapy, and NLP experts by your side.",
      image: "/asset/images/slider4.jpg",
      alt: "Therapist talking with patient on yellow sofa",
    },
    {
      id: 5,
      eyebrow: "Discover the holistic therapy that is right for you",
      title: "Discover the holistic therapy that is right for you",
      subtitle:
        "THNs practitioners provide expertise across a wide range of holistic modalities going beyond the physical body.",
      cardTitle: "Fertility and Pregnancy Support",
      cardDescription:
        "Discover supportive therapies for your fertility and pregnancy journey like acupuncture, hypnobirthing, or personalised doula services.",
      image: "/asset/images/slider5.jpg",
      alt: "Woman sitting on couch holding pregnancy test",
    },
    {
      id: 6,
      eyebrow: "Discover the holistic therapy that is right for you",
      title: "Discover the holistic therapy that is right for you",
      subtitle:
        "THNs practitioners provide expertise across a wide range of holistic modalities going beyond the physical body.",
      cardTitle: "Spiritual Growth",
      cardDescription:
        "Explore spiritual practices that deepen your understanding through modalities like past life regression or timeline therapy.",
      image: "/asset/images/slider6.jpg",
      alt: "Woman meditating in warm interior lighting",
    },
  ];
  
const swiperModules = [];
  
  const swiperInstance = ref(null);
  const activeIndex = ref(0);
  
  const formatIndex = (value) => value.toString().padStart(2, "0");
  
  const activeSlide = computed(() => slides[activeIndex.value] ?? slides[0]);
  const formattedCurrent = computed(() => formatIndex(activeIndex.value + 1));
  const formattedTotal = computed(() => formatIndex(slides.length));
  const progressHeight = computed(
    () => `${((activeIndex.value + 1) / slides.length) * 100}%`
  );
  
  const onInit = (swiper) => {
    swiperInstance.value = swiper;
    activeIndex.value = swiper.realIndex ?? swiper.activeIndex ?? 0;
  };
  
  const onSlideChange = (swiper) => {
    activeIndex.value = swiper.realIndex ?? swiper.activeIndex ?? 0;
  };
  
  const goNext = () => {
    if (swiperInstance.value) swiperInstance.value.slideNext();
  };
  const goPrev = () => {
    if (swiperInstance.value) swiperInstance.value.slidePrev();
  };
  </script>
  
<style scoped>
.healing-slider-container {
  position: relative;
  background: rgb(255, 255, 255);
  overflow: hidden;
  margin-top: 60px;
}

.healing-center-overlay {
  position: absolute;
  top: -30px;
  left: 0;
  width: 100%;
  height: 120px;
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1440 120'%3E%3Cpath d='M0 0H1440V40C1350 10 1200 70 800 40C500 5 300 40 0 70Z' fill='%23FBF9F7'/%3E%3C/svg%3E");
  background-repeat: no-repeat;
  /* background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1440 120'%3E%3Cpath d='M0 0H1440V40C1350 10 1200 70 800 40C500 5 300 40 0 70Z' fill='%23FBF9F7'/%3E%3C/svg%3E"); */
  background-size: cover;
  background-position: top center;
  z-index: 20;
  pointer-events: none;
}

.healing-bottom-overlay {
  position: absolute;
  bottom: -72px;
  left: 0;
  width: 100%;
  height: 120px;
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1440 120'%3E%3Cpath d='M0 50H1440V120C1100 100 900 50 600 80C350 100 150 70 0 90Z' fill='%23FBF9F7'/%3E%3C/svg%3E");
  background-repeat: no-repeat;
  /* background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1440 120'%3E%3Cpath d='M0 50H1440V120C1100 100 900 50 600 80C350 100 150 70 0 90Z' fill='%23FBF9F7'/%3E%3C/svg%3E"); */
  background-size: cover;
  background-position: bottom center;
  transform: scaleY(-1);
  transform-origin: center;
  z-index: 20;
  pointer-events: none;
}

@media (min-width: 1400px) {
  .healing-center-overlay {
  position: absolute;
  top: -20px;
  left: 0;
  width: 100%;
  height: 120px;
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1440 120'%3E%3Cpath d='M0 0H1440V40C1350 10 1200 70 800 40C500 5 300 40 0 70Z' fill='%23FBF9F7'/%3E%3C/svg%3E");
  background-repeat: no-repeat;
  background-size: cover;
  background-position: top center;
  z-index: 20;
  pointer-events: none;
}

.healing-bottom-overlay {
  position: absolute;
  bottom: -53px;
  left: 0;
  width: 100%;
  height: 120px;
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1440 120'%3E%3Cpath d='M0 50H1440V120C1100 100 900 50 600 80C350 100 150 70 0 90Z' fill='%23FBF9F7'/%3E%3C/svg%3E");
  background-repeat: no-repeat;
  background-size: cover;
  background-position: bottom center;
  transform: scaleY(-1);
  transform-origin: center;
  z-index: 20;
  pointer-events: none;
}
}

.slider-top-image,
.slider-bottom-image {
  width: 100%;
  height: 85px;
  object-fit: cover;
  display: block;
  margin: -5px 0px;
  padding: 0;
}

.healing-slider {
  margin: 0;
  background: rgb(255, 255, 255);
  min-height: 70vh;
  padding: 0;
}

  .healing-swiper {
    width: 100%;
  }
  
  .slide-wrapper {
    display: grid;
    grid-template-columns: 1fr 1fr;
    align-items: stretch;
  min-height: 70vh;
  height: 87vh;
  }
  @media screen and (max-width: 1400px) {
    .slide-wrapper {
      min-height: 90vh;
      height: 90vh;
    }
  }

  /* Tablet landscape (993px - 1199px) */
  @media (min-width: 993px) and (max-width: 1199px) {
    .copy-block {
      padding: 2rem 2rem;
    }

    .slide-titlee {
      font-size: 38px;
      margin-left: 30px;
    }

    .slide-subtitle {
      font-size: 0.95rem;
      margin-left: 30px;
    }

    .slide-indicator {
      margin-left: 30px;
    }

    .healing-card {
      max-width: 280px;
      height: 240px;
      padding: 1.5rem;
    }

    .card-title {
      font-size: 1.3rem;
    }

    .card-copy {
      font-size: 11px;
    }

    .book-now {
      bottom: 40px;
      padding: 14px 26px;
      font-size: 16px;
    }

    .book-now svg {
      width: 20px;
      height: 20px;
    }
  }
  
.copy-block {
    padding: 2.5rem;
    background:#DED1BA;
    display: flex;
    flex-direction: column;
    justify-content: space-around;
    gap: 1.5rem;
  color: #2d2013;
  height: 100%;
}
  
  .eyebrow {
    font-size: 0.8rem;
    color: #8a6b47;
  }
  
.slide-titlee {
    font-size: 45px;
    font-weight: 400;
    font-family: 'FONTSPRING DEMO - The Seasons', serif;
    color: #2E2D29;
    max-width: 300px;
    line-height: 1.2;
    margin-left: 50px;
}
  
  .slide-subtitle {
    font-size: 0.9rem;
    color: #57442f;
    max-width: 400px;
    margin-left: 50px;
  }
  
.slide-indicator {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 1rem;
    margin-left: 50px;
  }

  .indicator-count,
  .indicator-total {
    text-align: center;
    font-family: 'Cormorant Garamond', serif;
    letter-spacing: 0.06em;
  }

  .indicator-count {
    font-size: 1.2rem;
    color: #4d3925;
  }

  .indicator-total {
    font-size: 1rem;
    color: rgba(77, 57, 37, 0.3);
  }
  
  .indicator-stem {
    width: 2px;
    height: 100px;
    background: rgba(91, 67, 43, 0.15);
    position: relative;
  }
  
  .indicator-progress {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    background: #5b432b;
    transition: height 0.4s ease;
  }
  
.card-area {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    gap: 2rem;
    margin-top: 1rem;
    width: 100%;
    max-width: 520px;
  }
  
  .healing-card {
    background: #8A7356;
    color: #fbf7f1;
    border-radius: 18px;
    padding: 1.2rem;
    max-width: 260px;
  height: 220px;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  }
  
  .card-title {
    font-size: 1.2rem;
    font-weight: 300;
    color: white;
    font-family: 'TheSeasons', serif !important;
  }
  
  .card-copy {
    font-size: 10px;
    flex: 1;
    overflow: hidden;
    display: -webkit-box;
    line-clamp: 2;
    -webkit-line-clamp: 4;
    -webkit-box-orient: vertical;
  }

  .card-nav {
    margin-top: 1.5rem;
    display: flex;
    align-items: center;
    justify-content: start;
    gap: 6px;
  }

.arrow-icon {
    width: 14px;
    height: 14px;
}
 
  .nav-button {
    width: 30px;
    height: 30px;
    border-radius: 50%;
    border: 1px solid rgba(251, 247, 241, 0.6);
    background: transparent;
    color: #fbf7f1;
    font-size: 12px;
    cursor: pointer;
    transition: 0.3s;
  }
  
  .nav-button:hover {
    background: #5B4C3A;
    color: #6d5233;
  }
  
.image-block {
  position: relative;
  height: 100%;
  overflow: hidden;
}

.healing-swiper,
.healing-swiper .swiper-wrapper,
.healing-swiper .swiper-slide {
  height: 100%;
}

.image-block img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}
  
  .book-now {
    position: absolute;
    bottom: 50px;
    left: 50%;
    transform: translateX(-50%);
    z-index: 10;
    background: #fbf7f1;
    color: #2E2D29;
    padding: 12px 24px;
    border-radius: 12px;
    border: 1px solid transparent;
    font-weight: 600;
    font-size: 0.9rem;
    font-family: 'TheSeasons', serif !important;
    transition: all 0.3s ease;
    font-size: 12px;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 0.25rem;
  }

  .book-now svg {
    width: 20px;
    height: 20px;
    display: inline-block;
  }
  @media (min-width: 1300px) {
    .book-now {
    position: absolute;
    bottom: 70px;
    left: 50%;
    transform: translateX(-50%);
    z-index: 10;
    background: #fbf7f1;
    color: #2E2D29;
    padding: 16px 30px;
    border-radius: 16px;
    border: 1px solid transparent;
    font-weight: 600;
    font-size: 0.9rem;
    font-family: 'TheSeasons', serif !important;
    font-size: 22px;
    transition: all 0.3s ease;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    }
    .book-now svg {
      width: 24px !important;
      height: 24px !important;
      margin-left: 6px !important;
    }
  }
  @media (min-width: 1600px) {
    .book-now {
    position: absolute;
    bottom: 95px;
    left: 50%;
    transform: translateX(-50%);
    z-index: 10;
    background: #fbf7f1;
    color: #2E2D29;
    padding: 16px 30px;
    border-radius: 16px;
    border: 1px solid transparent;
    font-weight: 600;
    font-size: 0.9rem;
    font-family: 'TheSeasons', serif !important;
    font-size: 22px;
    transition: all 0.3s ease;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    }
    .book-now svg {
      width: 24px !important;
      height: 24px !important;
      margin-left: 6px !important;
    }
  }
  @media (max-width: 1300px) {
    .book-now {
    position: absolute;
    bottom: 60px;
    left: 50%;
    transform: translateX(-50%);
    z-index: 10;
    background: #fbf7f1;
    color: #2E2D29;
    padding: 16px 30px;
    border-radius: 16px;
    border: 1px solid transparent;
    font-weight: 600;
    font-size: 0.9rem;
    font-family: 'TheSeasons', serif !important;
    font-size: 22px;
    transition: all 0.3s ease;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    }
  }
  .book-now:hover {
    background: #E8E0D3;
    border: 1px solid #C1B39D;
    color: #2E2D29;
    transform: translateX(-50%) translateY(-2px);
  }

  .book-now:hover svg {
    color: #2E2D29;
  }
  
  .fade-enter-active,
  .fade-leave-active {
    transition: opacity 0.3s ease;
  }
  
  .fade-enter-from,
  .fade-leave-to {
    opacity: 0;
  }
  
  /* Tablet and below (992px and below) */
  @media (max-width: 992px) {
    .slide-wrapper {
      grid-template-columns: 1fr;
      min-height: auto;
      height: auto;
    }
  
    .image-block {
      order: -1;
      min-height: 300px;
      height: 50vh;
    }
  
    .healing-card {
      max-width: 100%;
      height: auto;
      min-height: 200px;
    }

    .copy-block {
      padding: 2rem 1.5rem;
      gap: 1rem;
    }

    .slide-titlee {
      font-size: 32px;
      margin-left: 0;
      max-width: 100%;
      text-align: center;
    }

    .slide-subtitle {
      font-size: 0.85rem;
      margin-left: 0;
      max-width: 100%;
      text-align: center;
    }

  .card-area {
    flex-direction: column;
    align-items: center;
    gap: 1.5rem;
    max-width: 100%;
    margin-top: 1.5rem;
  }

  .slide-indicator {
    flex-direction: row;
    align-items: center;
    justify-content: center;
    text-align: center;
    margin-left: 0;
  }

  .indicator-stem {
    height: 60px;
    width: 60px;
    transform: rotate(90deg);
  }

  .card-nav {
    gap: 1.1rem;
    justify-content: center;
  }

  .nav-button {
    width: 36px;
    height: 36px;
  }

  .arrow-icon {
    width: 18px;
    height: 18px;
  }

  .book-now {
    bottom: 30px;
    padding: 10px 20px;
    font-size: 14px;
  }

  .book-now svg {
    width: 18px;
    height: 18px;
  }
  }

  /* Mobile devices (768px and below) */
  @media (max-width: 768px) {
    .healing-slider-container {
      margin-top: 0;
    }

    .slide-wrapper {
      min-height: auto;
      height: auto;
    }

    .copy-block {
      padding: 1.5rem 1rem;
      gap: 1rem;
    }

    .slide-titlee {
      font-size: 28px;
      line-height: 1.3;
      margin-left: 0;
    }

    .slide-subtitle {
      font-size: 0.8rem;
      margin-left: 0;
    }

    .image-block {
      min-height: 250px;
      height: 40vh;
    }

    .healing-card {
      padding: 1rem;
      height: auto;
      min-height: 180px;
    }

    .card-title {
      font-size: 1.1rem;
    }

    .card-copy {
      font-size: 9px;
    }

    .card-area {
      gap: 1rem;
      margin-top: 1rem;
    }

    .slide-indicator {
      gap: 0.5rem;
    }

    .indicator-count {
      font-size: 1rem;
    }

    .indicator-total {
      font-size: 0.9rem;
    }

    .indicator-stem {
      height: 50px;
      width: 50px;
    }

    .nav-button {
      width: 32px;
      height: 32px;
    }

    .arrow-icon {
      width: 16px;
      height: 16px;
    }

    .book-now {
      bottom: 20px;
      padding: 8px 16px;
      font-size: 12px;
      left: 50%;
      transform: translateX(-50%);
    }

    .book-now svg {
      width: 16px;
      height: 16px;
      margin-left: 4px;
    }
  }

  /* Small mobile devices (576px and below) */
  @media (max-width: 576px) {
    .healing-center-overlay,
    .healing-bottom-overlay {
      display: none;
    }

    .copy-block {
      padding: 1rem 0.75rem;
      gap: 0.75rem;
    }

    .slide-titlee {
      font-size: 24px;
      line-height: 1.2;
    }

    .slide-subtitle {
      font-size: 0.75rem;
    }

    .image-block {
      min-height: 200px;
      height: 35vh;
    }

    .healing-card {
      padding: 0.75rem;
      min-height: 160px;
    }

    .card-title {
      font-size: 1rem;
    }

    .card-copy {
      font-size: 8px;
    }

    .card-area {
      gap: 0.75rem;
      margin-top: 0.75rem;
    }

    .slide-indicator {
      gap: 0.4rem;
    }

    .indicator-count {
      font-size: 0.9rem;
    }

    .indicator-total {
      font-size: 0.8rem;
    }

    .indicator-stem {
      height: 40px;
      width: 40px;
    }

    .nav-button {
      width: 28px;
      height: 28px;
    }

    .arrow-icon {
      width: 14px;
      height: 14px;
    }

    .book-now {
      bottom: 15px;
      padding: 6px 12px;
      font-size: 11px;
    }

    .book-now svg {
      width: 14px;
      height: 14px;
      margin-left: 3px;
    }
  }

  /* Extra small devices (480px and below) */
  @media (max-width: 480px) {
    .slide-titlee {
      font-size: 20px;
    }

    .slide-subtitle {
      font-size: 0.7rem;
    }

    .healing-card {
      padding: 0.6rem;
      min-height: 140px;
    }

    .card-title {
      font-size: 0.9rem;
    }

    .card-copy {
      font-size: 7px;
    }

    .book-now {
      bottom: 10px;
      padding: 5px 10px;
      font-size: 10px;
    }
  }

@media (min-width: 1400px) {
  .slide-wrapper {
    min-height: 100vh;
    height: 100vh;
  }
  .slide-titlee {
    font-size: 1.8rem;
    font-weight: 400;
    font-family: 'FONTSPRING DEMO - The Seasons', serif;
    color: #2E2D29;
    max-width: 620px;
    line-height: 1.2;
    
}
.slide-indicator {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 1rem;
    margin-left: 0px;
  }
  .copy-block {
    padding: 4.5rem 7.5rem;
    gap: 25px;
  }

  .slide-titlee {
    font-size: 45px;
    font-weight: 400;
    font-family: 'FONTSPRING DEMO - The Seasons', serif;
    color: #2E2D29;
    margin-left: 0px;
  }

  .slide-subtitle {
    font-size: 1.35rem;
    max-width: 600px;
    margin-left: 0px;
  }

  .card-area {
    max-width: 760px;
    gap: 3.4rem;
  }

  .indicator-count {
    font-size: 2rem;
  }

  .indicator-total {
    font-size: 1.5rem;
  }
  

  .indicator-stem {
    height: 200px;
  }

  .healing-card {
    max-width: 400px;
    height: 330px;
    padding: 2.3rem;
  }

  .card-title {
    font-size: 1.9rem;
  }

  .card-copy {
    font-size: 14px;
  }

  .card-nav {
    gap: 14px;
  }

  .nav-button {
    width: 54px;
    height: 54px;
    font-size: 12px;
  }

  .arrow-icon {
    width: 25px;
    height: 25px;
  }
}
  </style>
  






















































