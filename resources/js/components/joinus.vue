<template>
    <section class="joinUs position-relative d-flex align-items-center" style="overflow: hidden; min-height: 300px;">
        <div class=" container">
            <div class="row d-flex align-items-center">
                <div class="col-md-8 mt-4">
                    <h1 class='text-white'>Are you a therapist?</h1>
                    <p class="joinUs-p">Whether it's ayurveda or astrology, naturopathy or Acupuncture - if you're a
                        holistic specialist
                        devoted to your practice and looking to share your wisdom, grow your audience and get more
                        bookings,
                        we can help.</p>
                </div>
                <div class="col-md-4 d-flex justify-content-end position-relative" style="z-index: 20;">
                    <router-link to="/PractitionerIndex" class="btn btn-join-us" style="position: relative; z-index: 25;">
                        Join Us
                       
                    </router-link>
                </div>
            </div>
        </div>
        <div class="joinus-bg-image">
            <img :src="JoinUsicon" alt="background" style="width: 550px; height: 550px; position: absolute; bottom: -130px; right: 0px; z-index: 10;">
        </div>
    </section>
</template>

<script setup>

import JoinUsicon from '/public/asset/images/JoinUsicon.svg';
</script>
