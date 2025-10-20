<template>
    <section>
        <div class="container my-3 my-md-5 p-3 p-md-5" v-if="quiz == true">

            <form @submit.prevent="quizpost">
                <div v-if="currentStep === 1" class="step1">
                    <div class="row align-items-center g-4">
                        <div class="col-12 col-md-6 order-2 order-md-1">
                            <h1 class="quiz-main-heading">Let's find the <br class="d-none d-md-block">right healer for <br class="d-none d-md-block"> you</h1>
                            <p class="quiz-intro-text">Finding the right holistic healer can feel overwhelming - we understand. That's why we're here to guide you to someone who truly fits your needs. <br class="d-none d-md-block"> All our practitioners are carefully vetted for their expertise, experience, and genuine care for their clients.<br class="d-none d-md-block">Please answer a few simple questions so we can match you with the right support.<br class="d-none d-md-block">Rest assured that your information remains completely confidential and secure.</p>

                            <button class="quiz-start-btn mt-3" type="button" @click="nextStep">Let's Start Quiz</button>
                        </div>
                        <div class="col-12 col-md-6 order-1 order-md-2 text-center">
                            <img src="/public/asset/images/quiz.png" alt="Quiz Illustration" class="img-fluid rounded-5 quiz-image" />
                        </div>
                    </div>
                </div>

                <!-- Step 2 -->
                <div v-if="currentStep === 2" class="step2">
                    <router-link to="/" class="btn btn-outline-custome mb-3" @click.prevent="prevStep">
                        <img src="/public/asset/images/back-arrow.svg" alt="Back" class="me-2" style="width: 16px; height: 16px;" />
                        Go Back
                    </router-link>

                    <div>
                        <h1 class="my-3 my-md-4 quiz-heading">Complete The Quiz To Match A Therapist</h1>

                        <div class="row g-4">
                            <div class="col-12 col-lg-6 d-flex flex-column justify-content-between quiz-question-section">
                                <div class="col-12 col-md-6 col-lg-4">
                                    <p class="bg-color rounded-5 p-2 mt-5 mx-auto text-center justify-content-center question-badge">Question 1/10</p>
                                </div>

                                <div class="my-3 my-md-4">
                                    <h3 class="fw-normal " style="font-size: 30px;">
                                        What specific concerns, challenges, or goals are you hoping to address?This question is required.
                                    </h3>
                                </div>

                                <div class="mt-auto pb-3 d-none d-lg-block">
                                    <button class="btn bg-dark" type="button" @click="nextStep">
                                        <i class="bi bi-arrow-down text-white"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="col-12 col-lg-6 mt-5">
                                <p class="mb-3" style="color: #5B4C3A;">Select as many as you can</p>

                                <div class="options-container" >
                                    <div v-for="(option, index) in modalities" :key="index" style="background-color: #fff; border-radius: 10px; padding: 10px;"
                                        class="form-check border py-2 my-2 px-2">
                                        <input class="form-check-input mx-1" type="checkbox" :id="'option' + index"
                                            :value="option.id" v-model="form.checkoptions" />
                                        <label class="form-check-label ms-1" :for="'option' + index">
                                            {{ option.title }}
                                        </label>
                                    </div>
                                </div>

                                <div class="mt-3 mt-md-4">
                                    <button class="btn main-btn2" type="button" @click="nextStep" style="background-color: #DED1BA; border-radius: 10px; padding: 10px 20px; color: #2E2D29; border: none; ">Done</button>
                                    <span class="ms-2 d-none d-md-inline" style="color: #5B4C3A;">Click Enter ↵</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Step 3 -->
                <div v-if="currentStep === 3" class="step3">
                    <router-link to="/" class="btn btn-outline-custome mb-3" @click.prevent="prevStep">
                        <img src="/public/asset/images/back-arrow.svg" alt="Back" class="me-2" style="width: 16px; height: 16px;" />
                        Go Back
                    </router-link>

                    <div>
                        <h1 class="my-3 my-md-4 quiz-heading">Complete The Quiz To Match A Therapist</h1>

                        <div class="row g-4 mt-5">
                            <div class="col-12 col-lg-6 d-flex flex-column justify-content-between quiz-question-section">
                                <div class="col-12 col-md-6 col-lg-4">
                                    <p class="bg-color rounded-5 p-2 mx-auto text-center question-badge">Question 2/10</p>
                                </div>

                                <div class="my-3 my-md-4">
                                    <h3 class="fw-normal quiz-question" style="color: #2E2D29; max-width: 400px;">
                                        Can you tell us a bit more about what you're experiencing or what you'd like to
                                        achieve?
                                        <small style="color: #C4B39A;">(optional)</small>
                                    </h3>
                                </div>

                                <div class="mt-auto pb-3 d-none d-lg-block">
                                    <button class="btn bg-dark mx-2" type="button" @click="nextStep">
                                        <i class="bi bi-arrow-down text-white"></i>
                                    </button>
                                    <button class="btn bg-color mx-2" type="button" @click="prevStep">
                                        <i class="bi bi-arrow-up text-white"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="col-12 col-lg-6">
                                <p class="mb-3" style="color: #5B4C3A; font-size: 13px;">The more details you provide, the better we can match you.</p>
                                <div class="mb-3">
                                    <textarea class="form-control" v-model="form.details" rows="10"
                                        placeholder="Please type your answer here..."></textarea>
                                </div>

                                <div class="mt-3 mt-md-4">
                                    <button class="btn main-btn2" type="button" @click="nextStep">Done</button>
                                    <span class="ms-2 d-none d-md-inline">
                                        Shift ⇧ + Enter ↵ to make a line break
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div v-if="currentStep === 4" class="step3">
                    <router-link to="/" class="btn btn-outline-custome mb-3" @click.prevent="prevStep">
                        <img src="/public/asset/images/back-arrow.svg" alt="Back" class="me-2" style="width: 16px; height: 16px;" />
                        Go Back
                    </router-link>

                    <div>
                        <h1 class="my-3 my-md-4 quiz-heading">Complete The Quiz To Match A Therapist</h1>

                        <div class="row g-4 mt-5">
                            <div class="col-12 col-lg-6 d-flex flex-column justify-content-between quiz-question-section">
                                <div class="col-12 col-md-6 col-lg-4">
                                    <p class="bg-color rounded-5 p-2 mx-auto text-center question-badge">Question 3/10</p>
                                </div>

                                <div class="my-3 my-md-4">
                                    <h3 class="fw-normal quiz-question" style="color: #2E2D29; max-width: 400px;">
                                        Can you tell us a bit more about what you're experiencing or what you'd like to
                                        achieve?
                                        <small style="color: #C4B39A;">(optional)</small>
                                    </h3>
                                </div>

                                <div class="mt-auto pb-3 d-none d-lg-block">
                                    <button class="btn bg-dark mx-2" type="button" @click="nextStep">
                                        <i class="bi bi-arrow-down text-white"></i>
                                    </button>
                                    <button class="btn bg-color mx-2" type="button" @click="prevStep">
                                        <i class="bi bi-arrow-up text-white"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="col-12 col-lg-6">
                                <p class="mb-3" style="color: #5B4C3A; font-size: 13px;">The more details you provide, the better we can match you.</p>
                                <div class="mb-3">
                                    <div class="col-12">
                                        <label for="inputAddress1" class="form-label">Input Field Lable</label>
                                        <input type="text" v-model="form.answer1" class="form-control"
                                            id="inputAddress1" placeholder="typing">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="col-12">
                                        <label for="inputAddress2" class="form-label">Input Field Lable</label>
                                        <input type="text" v-model="form.answer2" class="form-control"
                                            id="inputAddress2" placeholder="Please type your answer here...">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="col-12">
                                        <label for="inputAddress3" class="form-label">Input Field Lable</label>
                                        <input type="text" v-model="form.answer3" class="form-control"
                                            id="inputAddress3" placeholder="Please type your answer here...">
                                    </div>
                                </div>
                                
                                <div class="mt-3 mt-md-4">
                                    <button class="btn main-btn2" type="button" @click="nextStep">Done</button>
                                    <span class="ms-2 d-none d-md-inline">
                                        Shift ⇧ + Enter ↵ to make a line break
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div v-if="currentStep === 5" class="step3">
                    <router-link to="/" class="btn btn-outline-custome mb-3" @click.prevent="prevStep">
                        ← Go Back
                    </router-link>

                    <div>
                        <h1 class="my-3 my-md-4 quiz-heading">Complete The Quiz To Match A Therapist</h1>

                        <div class="row g-4 mt-5">
                            <div class="col-12 col-lg-6 d-flex flex-column justify-content-between quiz-question-section">
                                <div class="col-12 col-md-6 col-lg-4">
                                    <p class="bg-color rounded-5 p-2 mx-auto text-center question-badge">Question 4/10</p>
                                </div>

                                <div class="my-3 my-md-4">
                                  <h3 class="fw-normal quiz-question" style="color: #2E2D29; max-width: 400px;">Do you have a preference for online or in person?
                                    <small style="color: #C4B39A;">(optional)</small>
                                </h3>
                                </div>

                                <div class="mt-auto pb-3 d-none d-lg-block">
                                    <button class="btn bg-dark mx-2" type="button" @click="nextStep">
                                        <i class="bi bi-arrow-down text-white"></i>
                                    </button>
                                    <button class="btn bg-color mx-2" type="button" @click="prevStep">
                                        <i class="bi bi-arrow-up text-white"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="col-12 col-lg-6">
                                <p class="mb-5" style="color: #5B4C3A; font-size: 13px; margin-bottom: 30px;">Choose one</p>
                                <div class="custom-radio-option" :class="{ 'selected': form.chose_options === 'yes' }">
                                    <input class="custom-radio-input" v-model="form.chose_options" type="radio"
                                        value="yes" name="radioDefault" id="radioDefault1">
                                    <label class="custom-radio-label" for="radioDefault1">
                                        <span class="radio-circle"></span>
                                        Yes
                                    </label>
                                    <span v-if="form.chose_options === 'yes'" class="checkmark">✓</span>
                                </div>
                                <div class="custom-radio-option" :class="{ 'selected': form.chose_options === 'no' }">
                                    <input class="custom-radio-input" v-model="form.chose_options" value="no"
                                        type="radio" name="radioDefault" id="radioDefault2">
                                    <label class="custom-radio-label" for="radioDefault2">
                                        <span class="radio-circle"></span>
                                        No
                                    </label>
                                    <span v-if="form.chose_options === 'no'" class="checkmark">✓</span>
                                </div>

                                <div class="mt-4 mt-md-5 pt-3 pt-md-5">
                                    <button class="btn main-btn2" type="submit">Submit</button>
                                    <span class="ms-2 d-none d-md-inline">
                                        Shift ⇧ + Enter ↵ to make a line break
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Step 4 (Example Final Step) -->

            </form>

        </div>
        <div class="container px-3 px-md-4">
            <div v-if="loading == true" class="text-center d-flex justify-content-center">
                <div class="my-3 my-md-5 text-center px-2">
                    <div class="d-flex justify-content-center text-center w-100 mb-3">
                        <router-link to="/" class="navbar-brand d-flex align-items-center">
                            <img src="/public/asset/images/dark-logo.png" alt="Logo" class="loading-logo" />
                        </router-link>
                    </div>
                    <h2 class="loading-heading mb-3">Finding your perfect matches</h2>
                    <p class="loading-text px-2">Finding the right holistic healer can feel overwhelming - we understand. That's why we're here to guide you to someone who truly fits your needs. <br class="d-none d-md-block"> All our practitioners are carefully vetted for their expertise, experience, and genuine care for their clients.<br class="d-none d-md-block">Please answer a few simple questions so we can match you with the right support.<br class="d-none d-md-block">Rest assured that your information remains completely confidential and secure.</p>
                    <div class="d-flex justify-content-center text-center w-100 my-4">
                        <div class="loading-bar text-center">
                            <div class="loading-progress"></div>
                        </div>
                    </div>
                    <br>
                    <button class="btn main-btn" type="button">Restart</button>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import { ref, onMounted } from "vue";
import axios from "axios";
import { useRouter } from "vue-router";

// track current step
const currentStep = ref(1);
const modalities = ref([])
const quiz = ref(true);
const router = useRouter();

const loading = ref(false)

// methods
const nextStep = () => {
    if (currentStep.value < 6) currentStep.value++;
};

const prevStep = () => {
    if (currentStep.value > 1) currentStep.value--;
};

const restartQuiz = () => {
    currentStep.value = 1;
};

onMounted(async () => {
    try {
        const res = await axios.get("/api/modalities");
        modalities.value = res.data;
    } catch (err) {
        console.error("Error fetching modalities:", err);
    }
});
const form = ref({
    checkoptions: [],
    details: '',
    answer1: '',
    answer2: '',
    answer3: '',
    chose_options: '',
})

const quizpost = async () => {
    console.log(form.value);
    loading.value = true;
    quiz.value = false;
    try {
        const res = await axios.post("api/quiz", form.value);
        router.push({
            name: "DoctorFind", // Must match your route name
            query: { doctors: JSON.stringify(res.data) }
        });
    } catch (error) {
        console.error(error);
    } finally {
        loading.value = false;
        quiz.value = true;
    }
}
</script>

<style scoped>
/* Main heading on first screen */
.quiz-main-heading {
    font-size: clamp(28px, 5vw, 44px);
    max-width: 440px;
    font-weight: 300;
    line-height: 1.2;
    margin-bottom: 1rem;
}

/* Intro text */
.quiz-intro-text {
    font-size: clamp(13px, 2vw, 14px);
    max-width: 440px;
    line-height: 1.6;
    margin-bottom: 1rem;
}

/* Quiz heading */
.quiz-heading {
    font-size: clamp(24px, 4vw, 36px);
    font-weight: 300;
    margin-top: 20px;
    margin-bottom: 20px;
}

/* Question text */
.quiz-question {
    font-size: clamp(18px, 3vw, 24px);
    line-height: 1.4;
}

/* Question badge */
.question-badge {
    font-size: clamp(12px, 2vw, 14px);
    white-space: nowrap;
}

/* Quiz start button */
.quiz-start-btn {
    background: #8A7356;
    border-radius: 10px;
    padding: 12px 24px;
    color: white;
    border: none;
    transition: all 0.3s ease;
    cursor: pointer;
    font-size: clamp(14px, 2vw, 16px);
    width: auto;
}

.quiz-start-btn:hover {
    background: #6f5b43;
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(138, 115, 86, 0.3);
}

.quiz-start-btn:active {
    transform: translateY(0);
    box-shadow: 0 2px 4px rgba(138, 115, 86, 0.3);
}

/* Quiz image */
.quiz-image {
    max-height: 500px;
    height: auto;
    width: 100%;
    object-fit: cover;
}

/* Quiz question section */
.quiz-question-section {
    min-height: auto;
}

/* Options container */
.options-container {
    max-height: 400px;
    overflow-y: auto;
}

/* Loading section */
.loading-logo {
    height: clamp(80px, 15vw, 120px);
    width: auto;
}

.loading-heading {
    font-size: clamp(20px, 4vw, 32px);
}

.loading-text {
    font-size: clamp(13px, 2vw, 16px);
    line-height: 1.6;
}

/* Loading bar */
.loading-bar {
    width: 100%;
    max-width: 400px;
    height: 8px;
    background: #f0f0f0;
    border-radius: 10px;
    overflow: hidden;
}

.loading-progress {
    height: 100%;
    background: #8A7356;
    animation: loading 2s ease-in-out infinite;
}

@keyframes loading {
    0% {
        width: 0%;
    }
    50% {
        width: 70%;
    }
    100% {
        width: 100%;
    }
}

/* Mobile specific adjustments */
@media (max-width: 768px) {
    .quiz-main-heading {
        text-align: left;
        margin-bottom: 1.5rem;
    }

    .quiz-intro-text {
        text-align: left;
        margin-bottom: 1.5rem;
    }

    .quiz-start-btn {
        width: 100%;
        padding: 14px 20px;
    }

    .quiz-image {
        max-height: 300px;
        margin-bottom: 1rem;
    }

    .quiz-question-section {
        min-height: auto !important;
        margin-bottom: 1rem;
    }

    .options-container {
        max-height: none;
    }

    .form-control,
    textarea.form-control {
        font-size: 16px; /* Prevents zoom on iOS */
    }

    .btn {
        font-size: 14px;
        padding: 10px 16px;
    }

    .main-btn2 {
        width: 100%;
        margin-bottom: 0.5rem;
    }
}

/* Tablet adjustments */
@media (min-width: 769px) and (max-width: 1024px) {
    .quiz-main-heading {
        font-size: 36px;
    }

    .quiz-heading {
        font-size: 30px;
    }

    .quiz-question {
        font-size: 20px;
    }
}

/* Large screens */
@media (min-width: 1025px) {
    .quiz-question-section {
        min-height: 400px;
    }

    .quiz-image {
        max-height: 700px;
    }
}

/* Extra large screens */
@media (min-width: 1400px) {
    .quiz-image {
        max-height: 800px;
    }
}

/* Custom Radio Button Styling */
.custom-radio-option {
    background: white;
    border: 1px solid #E0DED9;
    border-radius: 8px;
    padding: 12px 16px;
    margin: 8px 0;
    cursor: pointer;
    transition: all 0.3s ease;
    position: relative;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.custom-radio-option:hover {
    border-color: #C4B39A;
}

.custom-radio-option.selected {
    border-color: #C4B39A;
    background: white;
}

.custom-radio-input {
    display: none;
}

.custom-radio-label {
    display: flex;
    align-items: center;
    cursor: pointer;
    margin: 0;
    font-size: 16px;
    color: #B0A99F;
    transition: color 0.3s ease;
}

.custom-radio-option.selected .custom-radio-label {
    color: #705F4D;
}

.radio-circle {
    width: 20px;
    height: 20px;
    border-radius: 50%;
    border: 2px solid #DED8CE;
    background: #EAE5DD;
    margin-right: 12px;
    position: relative;
    transition: all 0.3s ease;
}

.custom-radio-option.selected .radio-circle {
    background: #705F4D;
    border-color: #705F4D;
}

.radio-circle::after {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: white;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.custom-radio-option.selected .radio-circle::after {
    opacity: 1;
}

.checkmark {
    color: #705F4D;
    font-size: 18px;
    font-weight: bold;
}

/* Ensure proper spacing on very small screens */
@media (max-width: 576px) {
    section {
        padding: 0;
    }

    .container {
        padding-left: 1rem;
        padding-right: 1rem;
    }

    h1, h2, h3 {
        word-wrap: break-word;
    }
}
</style>
