<template>


    <section>
        <div class="container-fluid practitionerindex">
            <div class="container p-5">
                <div class="row mt-md-5">
                    <div class="col-md-6">
                        <p class="  practitionerindextext mt-md-3"
                            style="font-size: 50px; line-height: 1.2; font-family: 'Cormorant Garamond', serif !important;">
                            Join Us as a <br> Healer
                        </p>
                        <p class=""
                            style="font-size: 18px; margin-top: 30px; max-width: 340px; font-family: 'Cormorant Garamond'; font-weight: 500; color: #2E2D29;">
                            Let’s build a world where holistic healing is embraced, respected, and accessible to all.

                        </p>
                        <router-link to="practitor_register"
                            class="text-decoration-none apply-now-btn ms-0 px-4 py-2 mt-3"
                            style="border-radius: 12px;">Apply Now</router-link>
                    </div>
                    <div class="col-md-6">
                        <div class="practitionerindeximage1 ">
                            <img src="/public/asset/images/slider1.jpg" class="img-fluid rounded" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Practitioner Index Image -->
        <div class="container-fluid p-0">
            <img src="/public/asset/images/practitionerindex.png" class="img-fluid w-100" alt="Practitioner Index"
                style="display: block;">
        </div>

        <br>
        <div class="container p-4">
            <div class="practitionerindexBox text-center">
                <img src="/public/asset/images/practitionerindtext.svg" class="img-fluid practitioner-text-svg"
                    alt="Practitioner Text">
            </div>
        </div>

        <br>
        <div class="container">
            <div class="row my-5">
                <div
                    class="col-md-6  practitionerabout d-flex flex-column justify-content-center align-items-start p-4">

                    <p><svg width="48" height="57" viewBox="0 0 48 57" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M31.0534 7.54754C31.2348 8.14654 31.4019 8.77025 31.5263 9.4681C31.9305 11.6786 32.3728 14.1087 34.6903 15.1172C36.5981 15.9221 38.5095 14.3237 39.8599 13.1262C43.8929 9.62228 48.5072 13.9009 46.9264 19.1502C45.3599 24.3747 40.7113 26.2053 38.6501 26.4651C36.5889 26.7249 35.5001 30.38 37.1738 32.1042C38.8474 33.8283 41.4609 36.7212 39.3393 38.6267C37.2176 40.5321 32.799 40.024 30.9076 35.538C29.0161 31.052 26.2223 36.0622 25.8908 38.1774C25.5593 40.2926 26.0177 48.6304 25.5664 50.6106C25.0905 52.5765 20.3809 60.962 14.6128 52.6891C12.4217 48.7221 13.7735 43.2417 13.7946 42.4631C13.8158 41.6845 14.3158 35.9101 10.2921 34.1472C6.26834 32.3842 2.5503 31.9181 1.59999 30.7104C0.649679 29.5027 -0.392519 24.2878 5.06579 20.2558C10.5241 16.2237 16.9963 16.5994 18.2274 16.75C20.8807 17.0627 20.8864 14.1992 20.4735 12.3461C19.884 9.60032 18.2503 7.63566 16.8165 5.325C15.8358 3.77029 15.7212 2.4849 17.5412 1.55855C20.06 0.277819 22.9377 0.258771 25.5024 1.40994C28.452 2.75042 30.1702 4.79688 31.0534 7.54754Z"
                                fill="#EFE3D6" />
                        </svg>
                    </p>
                    <b>Who we are</b>
                    <p class="" style="color: #5B4C3A; font-size: 14;">
                        A trusted community connecting the most skilled and heart-led healers with people seeking
                        support.
                    </p>
                    <button class=" btn-light main-btn2 px-3"
                        style="font-family: 'Courier New', Courier, monospace; color: #4F3C1E; background:#C1B39D;">
                        About Us <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M5 12h14M12 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>

                <div class="col-md-6 ">
                    <div class="practitioneraboutimage">
                        <img src="/public/asset/images/practitionerimage1.png" class="img-fluid" alt="">
                    </div>
                </div>
            </div>
            <br>
            <br>
            <div class="row my-5">
                <div class="col-md-6 ">
                    <div class="practitioneraboutimage">
                        <img src="/public/asset/images/practitionerimage2.png" class="img-fluid" alt="">
                    </div>
                </div>
                <div
                    class="col-md-6  practitionerabout d-flex flex-column justify-content-center align-items-start p-4">
                    <p>
                        <svg width="50" height="51" viewBox="0 0 50 51" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M5.05769 42.7144C4.73273 42.5434 4.46511 40.2062 4.38865 39.8642C3.89165 37.717 3.43288 35.5698 2.85941 33.4417C1.99922 30.2874 1.25371 27.0952 0.64202 23.8839C0.125903 21.2047 -0.371103 18.9056 0.393516 16.2644C0.775825 14.9342 1.52133 12.9011 3.05057 12.4641C5.05769 11.894 6.54869 14.5352 7.31331 15.9413C7.31331 15.9413 8.38378 24.093 9.26309 24.872C10.1424 25.6511 11.7099 26.1071 12.6848 21.6608C13.6405 17.2904 13.4111 12.6731 15.036 8.45475C15.8579 6.34559 17.2533 4.36944 19.2605 3.22935C24.154 0.436132 23.0453 11.0009 22.1278 12.9581C21.3058 14.7062 20.1207 16.9294 20.503 18.9436C20.7132 20.0076 21.497 20.9957 22.5866 21.2617C26.0082 22.0598 28.0345 17.0624 29.2196 14.7632C32.3737 8.60676 37.3055 2.92532 44.3017 1.06318C46.6147 0.455135 49.3291 0.55014 48.6983 3.68538C48.6218 4.10341 48.488 4.52145 48.3351 4.92048C46.825 9.0628 43.9003 12.6161 40.7463 15.6373C37.7642 18.5065 33.2148 20.7677 32.2399 25.138C32.1252 25.6701 32.0678 26.2211 32.2781 26.7152C32.9089 28.1973 35.0307 27.7982 36.2732 27.6082C38.4906 27.2662 40.7271 26.9052 42.9827 26.8292C45.3722 26.7342 49.8834 26.8482 49.9981 30.0974C50.1893 35.1518 35.738 37.185 33.1192 37.47C30.4812 37.755 25.798 37.47 27.3654 39.9022C28.9329 42.3344 35.9483 43.1514 33.1192 49.1369C30.2327 55.1223 5.05769 42.7144 5.05769 42.7144Z"
                                fill="#B3A288" />
                        </svg>
                    </p>
                    <b>Who we are looking for</b>
                    <p class="m-color">
                        Healers who share our vision, those who are passionate about guiding others with compassion,
                        authenticity, and skill. Whether you’re an energy worker, counsellor, herbalist, or meditation
                        teacher, this is your space to grow.
                    </p>
                    <button class=" btn-light main-btn2 px-3"
                        style="font-family: 'Courier New', Courier, monospace; color: #4F3C1E; background:#C1B39D;">
                        About Us <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M5 12h14M12 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>
            </div>
            <br><br>
            <div class="container py-5">

                <!-- Benefits Section -->
                <div class="benefits-container">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <img src="/public/asset/images/tabler-icon-mood-smile-beam.svg" alt="Smile"
                                class="benefit-svg-icon">
                        </div>
                        <div class="benefit-text">Be part of a supportive and growing healer network</div>
                    </div>

                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <img src="/public/asset/images/tabler-icon-hand-click.svg" alt="Hand Click"
                                class="benefit-svg-icon">
                        </div>
                        <div class="benefit-text">Showcase your sessions to our huge community</div>
                    </div>

                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <img src="/public/asset/images/tabler-icon-plant.svg" alt="Plant" class="benefit-svg-icon">
                        </div>
                        <div class="benefit-text">Reach more clients through our paid marketing and SEO support</div>
                    </div>

                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <img src="/public/asset/images/tabler-icon-mood-smile-beam.svg" alt="Smile"
                                class="benefit-svg-icon">
                        </div>
                        <div class="benefit-text">Get paid automatically after each session</div>
                    </div>

                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <img src="/public/asset/images/tabler-icon-user-square-rounded.svg" alt="User"
                                class="benefit-svg-icon">
                        </div>
                        <div class="benefit-text">One centralised platform that keeps all your client information in one
                            place</div>
                    </div>

                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <img src="/public/asset/images/tabler-icon-mood-smile-beam.svg" alt="Smile"
                                class="benefit-svg-icon">
                        </div>
                        <div class="benefit-text">Make your life easier as we manage the backend software and marketing
                            for you, so you can just show up and do what you do best</div>
                    </div>

                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <img src="/public/asset/images/tabler-icon-mood-smile-beam.svg" alt="Smile"
                                class="benefit-svg-icon">
                        </div>
                        <div class="benefit-text">
                            <div class="benefit-main-text">Cancel subscriptions you no longer need</div>
                            <div class="benefit-sub-text">zoom, calendly, acuity scheduling and CRM systems</div>
                        </div>
                    </div>
                </div>

                <br><br>
                <!-- How It Works Section -->
                <div class="text-center my-5">
                    <h3 class="how-it-works-title" style="font-size: 50px;color:#2E2D29">How it works</h3>
                </div>

                <div class="how-it-works-container">
                    <div class="how-it-works-card">
                        <h4 class="card-heading">Apply and get approved</h4>
                        <p class="card-text">We review your details and credentials.</p>
                    </div>

                    <div class="how-it-works-card">
                        <h4 class="card-heading">Create your healer profile</h4>
                        <p class="card-text">Add your sessions, price, and availability.</p>
                    </div>

                    <div class="how-it-works-card">
                        <h4 class="card-heading">Start sessions</h4>
                        <p class="card-text">Clients book through the site, pay securely, and you get notified
                            instantly.</p>
                    </div>

                    <div class="how-it-works-card">
                        <h4 class="card-heading">Add client notes</h4>
                        <p class="card-text">Keep track of all your clients in one centralized place.</p>
                    </div>
                </div>

            </div>

        </div>
    </section>
    <section class="cta-section position-relative d-flex align-items-center"
        style="overflow: hidden; min-height: 300px;">
        <div class="container">
            <div class="cta-content text-center">
                <h1 class="cta-title">Ready to start growing your business?</h1>
                <div class="cta-buttons">
                    <router-link to="practitor_register" class="cta-btn cta-btn-primary">Apply Now</router-link>
                    <router-link to="PractitionerIndex" class="cta-btn cta-btn-secondary">Book A Demo</router-link>
                </div>
                <p class="cta-subtext">Any questions? Check out our <a href="#" class="cta-link">Practitioner FAQs</a>
                    or <a href="#" class="cta-link">get in touch</a>.</p>
            </div>
        </div>
        <div class="cta-bg-image">
            <img src="/public/asset/images/PractitionerIndex (2).png" alt="background"
                style="width: 500px; height: 500px; position: absolute; bottom: -50px; left:  0px; z-index: 10;">
        </div>
    </section>
</template>

<style>
.feature-card {
    background: #fff;
    border: 1px solid #eee;
    transition: all 0.3s ease;
}

.feature-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
}

.step-card {
    background: #f7f4ef;
    /* beige background */
    border: none;
}

.step-card h2 {
    font-size: 2rem;
    color: #2E2D29;
    margin-bottom: 4rem;
}

.step-card p {
    color: #2E2D29;
    font-family: 'Cormorant Garamond' !important;

}

.apply-now-btn {
    background-color: #8A7356;
    color: #FBF9F7;
    border: none;
    border-radius: 25px;
    font-family: 'Cormorant Garamond', serif;
    font-weight: 400;
    font-size: 16px;
    padding: 12px 30px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
    transition: all 0.3s ease;
    text-transform: none;
    letter-spacing: 0.5px;
}

.apply-now-btn:hover {
    background-color: #6B5B47;
    color: #FBF9F7;
    transform: translateY(-2px);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
}

/* Practitioner Index Image Height */
.practitionerindeximage1 {
    height: 500px;
    overflow: hidden;
    border-radius: 15px;
}

.practitionerindeximage1 img {
    height: 100%;
    width: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.practitionerindeximage1:hover img {
    transform: scale(1.05);
}

/* Responsive height adjustments */
@media (max-width: 768px) {
    .practitionerindeximage1 {
        height: 400px;
        margin-top: 2rem;
    }
}

@media (max-width: 576px) {
    .practitionerindeximage1 {
        height: 300px;
        margin-top: 1.5rem;
    }
}

/* Big Screen Enhancements */
@media (min-width: 1200px) {
    .practitionerindextext {
        font-size: 65px !important;
        line-height: 1.1 !important;
    }

        .practitionerindextext+p {
            font-size: 22px !important;
            max-width: 450px !important;
            margin-top: 40px !important;
        }
    
        .apply-now-btn {
            font-size: 18px !important;
            padding: 15px 40px !important;
            margin-top: 20px !important;
        }
}

@media (min-width: 1400px) {
    .practitionerindextext {
        font-size: 75px !important;
        line-height: 1.1 !important;
    }

    .practitionerindextext + p {
        font-size: 24px !important;
        max-width: 500px !important;
        margin-top: 50px !important;
    }

    .apply-now-btn {
        font-size: 20px !important;
        padding: 18px 45px !important;
        margin-top: 25px !important;
    }
}

/* Practitioner Text SVG Styling */
.practitioner-text-svg {
    max-width: 90%;
    height: auto;
    display: block;
    margin: 0 auto;
}

.practitionerindexBox {
    padding: 3rem 2rem;
    background: #5B4C3A;
    border-radius: 20px;
    margin: 2rem 0;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
}

/* Responsive SVG sizing */
@media (max-width: 768px) {
    .practitioner-text-svg {
        max-width: 90%;
    }
}

@media (max-width: 576px) {
    .practitioner-text-svg {
        max-width: 85%;
    }
}

/* How It Works Section Styling */
.how-it-works-title {
    font-family: 'Cormorant Garamond', serif;
    font-weight: 400;
    margin-bottom: 3rem;
}

.how-it-works-container {
    display: flex;
    gap: 1.5rem;
    max-width: 100%;
    margin: 0 auto;
    flex-wrap: wrap;
    justify-content: center;
}

.how-it-works-card {
    background: #F7F4EF;
    padding: 3rem 1.5rem;
    border-radius: 15px;
    flex: 1;
    min-width: 200px;
    max-width: 250px;
    text-align: left;
    transition: all 0.3s ease;
    min-height: 180px;
}

.how-it-works-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
}

.card-heading {
    font-family: 'Cormorant Garamond', serif;
    font-size: 1.2rem;
    font-weight: 600;
    color: #2E2D29;
    margin-bottom: 0.8rem;
    line-height: 1.3;
}

.card-text {
    font-family: 'Cormorant Garamond', serif;
    font-size: 0.95rem;
    color: #2E2D29;
    line-height: 1.5;
    margin: 0;
}

/* Responsive How It Works */
@media (max-width: 1200px) {
    .how-it-works-container {
        gap: 1.2rem;
    }

    .how-it-works-card {
        padding: 2.5rem 1.3rem;
        min-width: 180px;
        min-height: 160px;
    }
}

@media (max-width: 992px) {
    .how-it-works-container {
        flex-direction: column;
        gap: 1rem;
        max-width: 600px;
    }

    .how-it-works-card {
        max-width: 100%;
        padding: 2rem 1.5rem;
        min-height: 140px;
    }
}

@media (max-width: 768px) {
    .how-it-works-title {
        font-size: 2.5rem !important;
        margin-bottom: 2rem;
    }

    .how-it-works-card {
        padding: 1.8rem 1.2rem;
        min-height: 120px;
    }

    .card-heading {
        font-size: 1.1rem;
    }

    .card-text {
        font-size: 0.9rem;
    }
}

/* Call-to-Action Section Styling */
.cta-section {
    padding: 4rem 0;
    margin: 3rem 0 0.5rem 0;
    position: relative;
    background-color: #8A7356;
}

.cta-content {
    position: relative;
    z-index: 2;
    padding: 2rem 0;
}

.cta-title {
    font-family: 'Cormorant Garamond', serif;
    font-size: 3.5rem;
    font-weight: 400;
    color: #F7F4EF;
    margin-bottom: 2.5rem;
    line-height: 1.2;
}

.cta-buttons {
    display: flex;
    gap: 1.5rem;
    justify-content: center;
    margin-bottom: 2rem;
    flex-wrap: wrap;
}

.cta-btn {
    padding: 1rem 2.5rem;
    border-radius: 12px;
    font-family: 'Cormorant Garamond', serif;
    font-size: 1.1rem;
    font-weight: 500;
    text-decoration: none;
    transition: all 0.3s ease;
    border: none;
    cursor: pointer;
    display: inline-block;
    min-width: 200px;
    text-align: center;
}

.cta-btn-primary {
    background-color: #F7F4EF;
    color: #2E2D29;
}

.cta-btn-primary:hover {
    background-color: #EFE3D6;
    color: #2E2D29;
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
}

.cta-btn-secondary {
    background-color: #F7F4EF;
    color: #2E2D29;
}

.cta-btn-secondary:hover {
    background-color: #EFE3D6;
    color: #2E2D29;
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
}

.cta-subtext {
    font-family: 'Cormorant Garamond', serif;
    font-size: 1rem;
    color: #F7F4EF;
    margin: 0;
    line-height: 1.5;
}

.cta-link {
    color: #F7F4EF;
    text-decoration: underline;
    transition: color 0.3s ease;
}

.cta-link:hover {
    color: #EFE3D6;
}

/* Responsive CTA Section */
@media (max-width: 1440px) {
    .cta-section {
        padding: 3rem 0;
    }

    .cta-title {
        font-size: 2.5rem;
        margin-bottom: 2rem;
    }

    .cta-btn {
        padding: 0.9rem 2rem;
        font-size: 1rem;
        min-width: 180px;
    }

    .cta-subtext {
        font-size: 0.95rem;
    }

    .cta-bg-image img {
        width: 400px !important;
        height: 400px !important;
        bottom: -40px !important;
    }
}

@media (max-width: 768px) {
    .cta-section {
        padding: 3rem 0;
        margin: 2rem 0;
    }

    .cta-title {
        font-size: 2rem;
        margin-bottom: 2rem;
    }

    .cta-buttons {
        flex-direction: column;
        align-items: center;
        gap: 1rem;
    }

    .cta-btn {
        width: 200px;
        padding: 0.9rem 2rem;
        font-size: 1rem;
    }

    .cta-subtext {
        font-size: 0.9rem;
        padding: 0 1rem;
    }
}

@media (max-width: 576px) {
    .cta-title {
        font-size: 1.8rem;
    }

    .cta-btn {
        width: 180px;
        padding: 0.8rem 1.5rem;
    }
}

/* Benefits Section Styling */
.benefits-container {
    display: flex;
    flex-direction: column;
    gap: 0.8rem;
    max-width: 80%;
    margin: 0 auto;
    width: 80%;

}

.benefit-card {
    display: flex;
    align-items: center;
    background: white;
    padding: 1rem 2rem;
    border-radius: 15px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
    border: 1px solid #f0f0f0;
    width: 100%;
}

.benefit-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
}

.benefit-icon {
    margin-right: 1.5rem;
    min-width: 3rem;
    text-align: center;
    display: flex;
    align-items: center;
    justify-content: center;
}

/* SVG Icon Styling */
.benefit-svg-icon {
    width: 40px;
    height: 40px;
}

.benefit-main-text {
    font-size: 1rem;
    color: #2E2D29;
    font-weight: 500;
    line-height: 1.5;
    font-family: 'Cormorant Garamond', serif !important;
}

.benefit-sub-text {
    font-size: 0.9rem;
    color: #2E2D29;
    font-weight: 400;
    line-height: 1.4;
    margin-top: 0.3rem;
    font-family: 'Cormorant Garamond', serif !important;
}

.benefit-text {
    font-size: 1rem;
    color: #2E2D29;
    font-weight: 500;
    line-height: 1.5;
    flex: 1;
    font-family: 'Cormorant Garamond', serif !important;
}

/* Responsive Benefits */
@media (max-width: 768px) {
    .benefits-container {
        gap: 0.8rem;
    }

    .benefit-card {
        padding: 1.2rem 1.5rem;
    }

    .benefit-icon {
        font-size: 1.8rem;
        margin-right: 1.2rem;
        min-width: 2.5rem;
    }

    .benefit-text {
        font-size: 0.95rem;
    }
}

@media (max-width: 576px) {
    .benefit-card {
        padding: 1rem 1.2rem;
        flex-direction: column;
        text-align: center;
    }

    .benefit-icon {
        margin-right: 0;
        margin-bottom: 0.8rem;
        font-size: 1.6rem;
    }

    .benefit-text {
        font-size: 0.9rem;
    }
}
</style>
