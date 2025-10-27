<template>
    <section class="joinUs position-relative d-flex align-items-center" style="overflow: hidden; min-height: 300px;">
        <div class=" container">
            <div class="row d-flex align-items-center">
                <div class="col-md-8 mt-4">
                    <h1 class='text-white'  style="font-size: 34px; font-weight: 100;">Join Our Healer Community</h1>
                    <p class="joinUs-p">If you’re a holistic healer, The Healer Network helps you grow your reach and connect with new clients, easily and effortlessly. Relax and let us do the hard work for you.
                    </p>
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
