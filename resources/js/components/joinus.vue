<template>
    <section class="joinUs position-relative d-flex align-items-center"
        style="overflow: hidden; min-height: 300px; margin-top: 60px; background-color: #8A7356;">
        <div class=" container">
            <div class="row d-flex align-items-center">
                <div class="col-md-8 mt-4">
                    <h1 class='text-white TheSeasons'
                        style="font-size: 45px; font-weight: 100; font-family: 'TheSeasons', serif !important;">Join Our
                        Healer Community</h1>
                    <p class="joinUs-p">If you’re a holistic healer, The Healer Network helps you grow your reach and
                        connect with new clients, easily and effortlessly. Relax and let us do the hard work for you.
                    </p>
                </div>
                <div class="col-md-4 d-flex justify-content-end position-relative" style="z-index: 20;">
                    <router-link to="/PractitionerIndex" class="btn btn-join-us"
                        style="position: relative; z-index: 25;">
                        Join Us
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                style="margin-left: 4px; display: inline-block; vertical-align: middle;">
                <path d="M5 12H19M19 12L12 5M19 12L12 19" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round" />
            </svg>
                    </router-link>
                </div>
            </div>
        </div>
        <div class="joinus-bg-image">
            <img :src="JoinUsicon" alt="background"
                style="width: 550px; height: 550px; position: absolute; bottom: -130px; right: 0px; z-index: 10;">
        </div>
    </section>
</template>

<script setup>

import JoinUsicon from '/public/asset/images/JoinUsicon.svg';
</script>

<style scoped>
/* Mobile responsive styles */
@media (max-width: 768px) {
  .joinUs {
    text-align: center;
    padding: 2rem 1rem;
    max-height: 300px;
  }

  .joinUs .row {
    flex-direction: column;
    align-items: center;
    text-align: center;
  }

  .joinUs .col-md-8 {
    text-align: center;
    margin-bottom: 1.5rem;
  }

  .joinUs .col-md-4 {
    justify-content: center !important;
    width: 100%;
  }

  .joinUs h1 {
    font-size: 28px !important;
    text-align: center;
    margin: 0 auto;
  }

  .joinUs-p {
    font-size: 14px !important;
    text-align: center;
    margin: 1rem auto 0;
    max-width: 100%;
  }

  .btn-join-us {
    position: relative !important;
    left: auto !important;
    transform: none !important;
    margin: 0 auto;
    padding: 12px 24px;
    font-size: 16px !important;
    display: inline-flex;
    align-items: center;
    justify-content: center;
  }

  .btn-join-us svg {
    width: 18px !important;
    height: 18px !important;
    margin-left: 8px !important;
  }

  .joinus-bg-image {
    display: none;
  }
}

@media (max-width: 576px) {
  .joinUs h1 {
    font-size: 24px !important;
  }

  .joinUs-p {
    font-size: 13px !important;
  }

  .btn-join-us {
    padding: 10px 20px;
    font-size: 14px !important;
  }

  .btn-join-us svg {
    width: 16px !important;
    height: 16px !important;
  }
}

@media (min-width: 1300px) {
  .joinUs h1 {
    font-size: 45px !important;
  }


  .joinUs-p {
    font-size: 20px !important;
    width: 800px !important;
    margin-top: 20px;
  }

  .btn-join-us {
    position: absolute;
       
        left: 30%;
        transform: translateX(-50%);
        z-index: 10;
        background: #fbf7f1;
        color: #2E2D29;
        padding: 20px 40px;
        border-radius: 16px;
        font-weight: 600;
        font-size: 0.9rem;
        font-family: 'TheSeasons', serif !important;
        font-size: 22px;
        transition: 0.3s;
        text-decoration: none;
        display: inline-flex
;
        align-items: center;
        gap: 0.75rem;
  }

  .btn-join-us svg {
    width: 24px !important;
    height: 24px !important;
    margin-left: 12px !important;
  }
}
</style>
