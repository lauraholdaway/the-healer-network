<style scoped>
/* Hero Text Styles */
.hero-text {
  font-size: 55px;
  font-family: 'TheSeasons', serif !important;
  font-weight: 700;
  line-height: 1.2;
  margin-bottom: 50px;
  width: 100%;
  max-width: 900px;
}


.main-color {
  background-color: #F4EFE6;
  padding: 40px;
  border-radius: 20px;
  margin-top: 10px;
  text-align: center;
}

.coprate-img {
  height: 230px;
  width: 100%;
  object-fit: cover;
}

/* Cards */
.work-card {
  border-radius: 20px;
  padding: 35px 40px;
  min-height: 180px;
}

/* Card Variants */
.light-card {
  background-color: #ffffff;
}

.beige-card {
  background-color: #f2ede3;
}

/* Card Text */
.work-card h4 {
  font-size: 24px;
  font-weight: 500;
  margin-bottom: 15px;
}

.work-card p {
  font-size: 15px;
  line-height: 1.7;
  margin: 0;
}

@media (max-width: 768px) {
      .bg-custome {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .bg-custome .container {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .bg-custome img {
        max-height: 600px !important;
        min-height: 600px;
        width: 400px !important;
        max-width: 600px !important;
        display: block;
        margin: 0 auto;
    }
    .hero-text {
        font-size: 20px;
    }
    }
</style>
<template>
  <section style="background-color: #FBF9F7; min-height: 100vh;">
    <div class="bg-custome p-3 p-md-5">
      <div class="container p-3 p-md-5 position-relative text-center">
        <img src="/public/asset/images/corporateMainImages.png" class="img-fluid rounded-4 mt-3 m-md-0" alt=""
          style="max-height: 700px; object-fit: cover; width: 100%;">
        <div class="position-absolute top-50 start-50 translate-middle text-white   w-75">
          <p class="hero-text">
            The Healer Network — Corporate
            <br class="d-none d-md-inline">
            Wellness Solutions
          </p>
          <h3 class="text-white">Elevate your people. Transform your culture.</h3>
          <br>
          <p>In today’s world, employee wellbeing isn’t a luxury, it’s the foundation of thriving, forward thinking
            companies. 
            At The Healer Network, we connect organisations with the world’s leading wellness practitioners, healers,
            and facilitators to support healthier, happier, more energised teams. Whether you’re hosting a wellness day,
            planning ongoing support for your staff, or seeking standout speakers for your corporate event, we make it
            effortless to find the right expert.</p>
          <br>

        </div>

      </div>
    </div>
    <div class="w-100">
      <img src="/public/asset/images/about.png" class="w-100" alt="" style="display: block;">
    </div>

    <br>
    <div class="container my-2">
      <div class="main-color p-md-4">
        <p class="f-48 Seasons-fonts mt-2">
          Why Corporate Wellness Matters
        </p>
        <p>When your people feel supported, mentally, emotionally, and physically… everything shifts.  <br>
          Productivity rises. Burnout decreases. Team relationships strengthen. And your culture becomes a place where
          people don’t just work… they <br> flourish. We’re here to help you create that ripple effect.</p>
      </div>
    </div>
    <br>
    <div class="container">
      <div class="text-center">
        <p class="f-48 Seasons-fonts mt-2">
          What We Offer
        </p>
        <p>Through our global platform, you can easily book:</p>
      </div>

      <div class="row my-5">
        <div class="col-md-6 ">
          <div class="bg-white p-4 rounded-4">
            <img src="/public/asset/images/coporate (4).png" class="coprate-img img-fluid rounded-4" alt="">
            <p class="f-32 Seasons-fonts mt-4">Wellness Workshops and Talks  </p>
            <p>Topics include mental health, the power of the breath, emotional resilience, <br> stress mastery, nervous
              system
              regulation, meditation, and more.</p>
          </div>
        </div>
        <div class="col-md-6 ">
          <div class="bg-white p-4 rounded-4">
            <img src="/public/asset/images/coporate (1).png" class="coprate-img img-fluid rounded-4" alt="">
            <p class="f-32 Seasons-fonts mt-4">In Office or Virtual Sessions</p>
            <p>Yoga classes, breathwork sessions, mindfulness breaks, and grounding <br> practices tailored to your
              team’s needs.</p>
          </div>
        </div>
      </div>
      <div class="row my-5">
        <div class="col-md-6 ">
          <div class="bg-white p-4 rounded-4">
            <img src="/public/asset/images/coporate (2).png" class="coprate-img img-fluid rounded-4" alt="">
            <p class="f-32 Seasons-fonts mt-4">One Day or Multi Day Immersions</p>
            <p>Bring in specialist practitioners for transformative wellbeing experiences that <br> leave your team
              refreshed and  reconnected.</p>
              <br>
          </div>
        </div>
        <div class="col-md-6 ">
          <div class="bg-white p-4 rounded-4">
            <img src="/public/asset/images/coporate (3).png" class="coprate-img img-fluid rounded-4" alt="">
            <p class="f-32 Seasons-fonts mt-4">Holistic Practitioners and Healers</p>
            <p>Choose from world class energy healers, somatic practitioners, trauma- <br>informed guides, and experts
              in
              mind-body wellbeing, all vetted, experienced, <br>and available globally.</p>
          </div>
        </div>
      </div>
    </div>

    <br>
    <!-- Why Work With The Healer Network? -->
    <div class="w-100">
      <img src="/public/asset/images/aboutbg-top.png" class="w-100" alt="" style="display: block; margin: 0;">
    </div>
    <div class="container-fluid bg-custome py-1" style="margin-top: -2px; margin-bottom: 0;">
      <div class="container py-md-4 py-md-5">
        <div class="row align-items-center">
          <div class="col-md-12 text-center text-md-start p-3 p-md-5">
            <div>
              <p class="fw-bold section-heading text-center text-md-start f-62">
                Why Work With The Healer Network?
              </p>

              <div>
                <span class="f-24 Seasons-fonts"> <i class="bi bi-check2 me-1 " style="color: #8A7356;"></i>Curated
                  global network of trusted practitioners</span>
                <p class="pe-3"> &nbsp; &nbsp; &nbsp; &nbsp;You’ll only find highly qualified facilitators who bring
                  professionalism, integrity, and depth to their work.</p>
              </div>
              <div>
                <span class="f-24 Seasons-fonts"> <i class="bi bi-check2 me-1 " style="color: #8A7356;"></i>One simple
                  booking platform</span>
                <p class="pe-3"> &nbsp; &nbsp; &nbsp; &nbsp; Browse, compare, and schedule practitioners with ease - no
                  long email conversations, no confusion.</p>
              </div>
              <div>
                <span class="f-24 Seasons-fonts"> <i class="bi bi-check2 me-1 " style="color: #8A7356;"></i>Tailored to
                  your organisation</span>
                <p class="pe-3"> &nbsp; &nbsp; &nbsp; &nbsp; Whether you need a single speaker or a full wellness
                  programme, we help you find the perfect fit.</p>
              </div>
              <div>
                <span class="f-24 Seasons-fonts"> <i class="bi bi-check2 me-1 " style="color: #8A7356;"></i>A ripple
                  effect of wellbeing</span>
                <p class="pe-3"> &nbsp; &nbsp; &nbsp; &nbsp; When your employees feel supported, that energy moves
                  through every level of your company - improving collaboration, creativity, and overall workplace
                  culture.</p>
              </div>
              <div>
                <span class="f-24 Seasons-fonts"> <i class="bi bi-check2 me-1 " style="color: #8A7356;"></i>Stress free
                  experience</span>
                <p class="pe-3"> &nbsp; &nbsp; &nbsp; &nbsp; We streamline the entire process so you can focus on your
                  people while we handle the details.</p>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
    <div class="w-100">
      <img src="/public/asset/images/aboutbg-bt.png" class="w-100" alt="" style="display: block; margin: -2px;">
    </div>
    <br>

    <section class="how-it-works-section py-5">
      <div class="container">

        <!-- Title -->
        <div class="mb-4">
          <h2 class="f-62 Session-fonts">How It Works</h2>
        </div>

        <!-- Cards -->
        <div class="row g-4">

          <!-- Left Column -->
          <div class="col-lg-6">
            <div class="work-card light-card mb-4">
              <p class="f-32 Cormorant">Browse the Platform</p>
              <p>
                Explore our directory of healers, teachers, speakers,
                and practitioners.
              </p>
            </div>

            <div class="work-card beige-card">
              <p class="f-32 Cormorant">Book Directly</p>
              <p>
                Schedule sessions in just a few clicks – everything flows
                through our system.
              </p>
            </div>
          </div>

          <!-- Right Column -->
          <div class="col-lg-6">
            <br>
            <br>
            <br>
            <br>
            <br>
            <div class="work-card beige-card mb-4">
              <p class="f-32 Cormorant">2. Select Your Experience</p>
              <p>
                Choose workshops, sessions, or wellness programmes
                aligned with your team’s goals.
              </p>
            </div>

            <div class="work-card light-card">
              <p class="f-32 Cormorant">Elevate Your Workplace</p>
              <p>
                Let the transformation begin. Wellness becomes part of
                your company DNA.
              </p>
            </div>
          </div>

        </div>
      </div>
    </section>

    <br>
    <div class="container">
      <div class="text-center">
        <h2 class="f-62 Session-fonts">How It Works</h2>
      </div>
      <div class="row my-4">
        <div class="col-md-3">
          <div class="beige-card p-3 rounded-4">
            <h1 class="Cormorant" style="color: #C4B39A;">
              01
            </h1>
            <p class="f-28 Cormorant" style="color: #2E2D29;">
              Browse the <br>
              Platform
            </p>
            <p>Explore our directory of healers, <br> teachers, speakers, and <br> practitioners.</p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="light-card p-3 rounded-4">
            <h1 class="Cormorant" style="color: #C4B39A;">
              02
            </h1>
            <p class="f-28 Cormorant" style="color: #2E2D29;">
              Select Your Experience
            </p>
            <p>Choose workshops, sessions, or wellness programmes aligned with your team’s goals.</p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="beige-card p-3 rounded-4">
            <h1 class="Cormorant" style="color: #C4B39A;">
              03
            </h1>
            <p class="f-28 Cormorant" style="color: #2E2D29;">
              Book <br>
              Directly
            </p>
            <p>Schedule sessions in just a few <br> clicks — everything flows through our system.</p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="light-card p-3 rounded-4">
            <h1 class="Cormorant" style="color: #C4B39A;">
              04
            </h1>
            <p class="f-28 Cormorant" style="color: #2E2D29;">
              Elevate Your Workplace
            </p>
            <p>Let the transformation begin. <br> Wellness becomes part of your <br> company DNA.</p>
          </div>
        </div>
      </div>
    </div>
    <br>
    <section class="joinUsAbout position-relative d-flex align-items-center"
      style="overflow: hidden; min-height: 300px;">
      <div class="container px-3">
        <div class="d-flex justify-content-center align-items-center py-4 py-md-5">
          <div class="text-center mt-3 mt-md-4 mx-auto">
            <h1 class='text-white touch-heading '>Invest in Your People. Amplify Your Impact.</h1>
            <p class="joinUs-p px-3 text-center" style="font-size: 14px; font-family:
Cormorant Garamond; color: #F4EFE6; font-style: italic; ">
              Corporate wellbeing isn’t just about avoiding burnout, it’s about unlocking the full potential of your
              team. 
              With The Healer Network, you gain access to the world’s best practitioners, ready to support your
              employees in becoming the healthiest, happiest, most empowered versions of themselves.
            </p>
            <p class="joinUs-p px-3 text-center" style="font-size: 14px; font-family:
Cormorant Garamond; color: #F4EFE6; font-style: italic; ">
              Let’s create a thriving, energised workplace — together.
            </p>
            <router-link to="Contact" class="btn btn-light contact-btn px-4 mt-1">FIND YOUR PRACTITIONER</router-link>
          </div>

        </div>
      </div>
      <!-- Touch With Us SVG positioned in bottom left -->
      <div class="about-bg-image">
        <img src="/public/asset/images/Touch With Us.svg" alt="Touch With Us"
          style="width: 500px; height: 500px; position: absolute; bottom: -50px; left: 0px; z-index: 10;">
      </div>
    </section>
    <br>
    <br>
    <div class="container px-3">
      <h1 class="fw-bold section-heading mb-5 mt-2 mb-md-4 text-center text-md-start">
        A Note From Our Founders
      </h1>
      <!-- Susie -->
      <div class="row mt-4 mb-5  align-items-center">
        <div class="col-md-3 mb-3 mb-md-0 d-flex align-items-center rounded-4" style="background-color: #C4B39A;">
          <img src="/public/asset/images/svglogo.svg" class="img-fluid founder-image" alt="Susie">
        </div>
        <div class="col-md-9 text-center text-md-start">
          <div class="ps-3">
            <p class="founder-text ">
              As former corporate women who’ve experienced the pressure, pace, and emotional toll of demanding
              workplaces, we deeply understand how essential true wellbeing is. Each of us, in different roles, in
              different companies have walked through stress, burnout, and the mental health challenges that follow when
              support isn’t available. <br> <br>

              This is why we’re so passionate about making wellness accessible, easy to implement, and genuinely
              transformative for organisations.  <br>

              With The Healer Network, we’ve created a simple way for companies to connect with world-class
              practitioners who can support their teams to thrive, not just survive. <br>
            </p>

            <hr>
            <p style="font-size: 14px; color: #5B4C3A;">Love</p>
            <h3 class="founder-name">Laura, Pia, and Susie</h3>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup>

</script>
