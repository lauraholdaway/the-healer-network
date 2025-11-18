
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
          <router-link to="/Booksession" class="book-now">
            Book Now <span aria-hidden="true"><img src="/public/asset/images/arowright.svg" alt="" class="book-now-icon" /></span>
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
      cardTitle: "Energy Therapy",
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
      cardTitle: "Holistic Self-Care",
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
      cardTitle: "Emotional & Mental Support",
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
      cardTitle: "Fertility & Pregnancy Support",
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
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1440 120'%3E%3Cpath d='M0 0H1440V40C1350 10 1200 70 800 40C500 5 300 40 0 70Z' fill='%23ffffff'/%3E%3C/svg%3E");
  background-repeat: no-repeat;
  /* background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1440 120'%3E%3Cpath d='M0 0H1440V40C1350 10 1200 70 800 40C500 5 300 40 0 70Z' fill='%23ffffff'/%3E%3C/svg%3E"); */
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
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1440 120'%3E%3Cpath d='M0 50H1440V120C1100 100 900 50 600 80C350 100 150 70 0 90Z' fill='%23ffffff'/%3E%3C/svg%3E");
  background-repeat: no-repeat;
  /* background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1440 120'%3E%3Cpath d='M0 50H1440V120C1100 100 900 50 600 80C350 100 150 70 0 90Z' fill='%230e0e0e'/%3E%3C/svg%3E"); */
  background-size: cover;
  background-position: bottom center;
  transform: scaleY(-1);
  transform-origin: center;
  z-index: 20;
  pointer-events: none;
}

@media (min-width: 1300px) {
  .healing-center-overlay {
  position: absolute;
  top: -20px;
  left: 0;
  width: 100%;
  height: 120px;
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1440 120'%3E%3Cpath d='M0 0H1440V40C1350 10 1200 70 800 40C500 5 300 40 0 70Z' fill='%23ffffff'/%3E%3C/svg%3E");
  background-repeat: no-repeat;
  background-size: cover;
  background-position: top center;
  z-index: 20;
  pointer-events: none;
}

.healing-bottom-overlay {
  position: absolute;
  bottom: -40px;
  left: 0;
  width: 100%;
  height: 120px;
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1440 120'%3E%3Cpath d='M0 50H1440V120C1100 100 900 50 600 80C350 100 150 70 0 90Z' fill='%23ffffff'/%3E%3C/svg%3E");
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
  
.copy-block {
    padding: 1.5rem;
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
    font-size: 1.8rem;
    font-weight: 300;
    font-family: 'FONTSPRING DEMO - The Seasons', serif;
    color: #3e2b1a;
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
    font-weight: 600;
    font-size: 0.9rem;
    font-family: 'FONTSPRING DEMO - The Seasons', serif;
    transition: 0.3s;
    font-size: 12px;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
  }

  .book-now-icon {
    width: 10px;
    height: 10px;
    display: inline-block;
  }
  @media (min-width: 1300px) {
    .book-now {
    position: absolute;
    bottom: 140px;
    left: 50%;
    transform: translateX(-50%);
    z-index: 10;
    background: #fbf7f1;
    color: #2E2D29;
    padding: 1.6rem 3.2rem;
    border-radius: 16px;
    font-weight: 600;
    font-size: 0.9rem;
    font-family: 'FONTSPRING DEMO - The Seasons', serif;
    transition: 0.3s;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 0.75rem;
    }
    .book-now-icon {
      width: 14px;
      height: 14px;
    }
  }
  
  .book-now:hover {
    background: #C4B39A;
    color: #2E2D29;
    transform: translateX(-50%) translateY(-3px);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
  }
  
  .fade-enter-active,
  .fade-leave-active {
    transition: opacity 0.3s ease;
  }
  
  .fade-enter-from,
  .fade-leave-to {
    opacity: 0;
  }
  
  @media (max-width: 992px) {
    .slide-wrapper {
      grid-template-columns: 1fr;
    }
  
    .image-block {
      order: -1;
      min-height: 200px;
    }
  
    .healing-card {
      max-width: 100%;
    }

  .card-area {
    flex-direction: column;
    align-items: center;
    gap: 1.5rem;
  }

  .slide-indicator {
    flex-direction: row;
    align-items: center;
    justify-content: center;
    text-align: center;
   
  }

  .indicator-stem {
    height: 80px;
  }

  .card-nav {
    gap: 1.1rem;
  }

  .nav-button {
    width: 36px;
    height: 36px;
  }

  .arrow-icon {
    width: 26px;
    height: 26px;
  }
  }

@media (min-width: 1400px) {
  .slide-wrapper {
    min-height: 100vh;
    height: 100vh;
  }
  .slide-titlee {
    font-size: 1.8rem;
    font-weight: 300;
    font-family: 'FONTSPRING DEMO - The Seasons', serif;
    color: #3e2b1a;
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
    gap: 2.4rem;
  }

  .slide-titlee {
    font-size: 3.6rem;
    font-weight: 300;
    font-family: 'FONTSPRING DEMO - The Seasons', serif;
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
  






















































