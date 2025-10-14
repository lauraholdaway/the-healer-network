<template>
    <section>
        <div class="container my-5 p-5" v-if="quiz == true">

            <form @submit.prevent="quizpost">
                <div v-if="currentStep === 1" class="step1">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h1>Let’s find the right healer for you</h1>
                            <p class="m-color">
                                Finding the right holistic healer can feel overwhelming — we understand.
                                That's why we're here to guide you to someone who truly fits your needs.
                                All our practitioners are carefully vetted for their expertise, experience, and genuine
                                care
                                for their clients.
                                Please answer a few simple questions so we can match you with the right support.
                                Rest assured that your information remains completely confidential and secure.
                            </p>
                            <button class="btn main-btn" @click="nextStep">Let’s Start Quiz</button>
                        </div>
                        <div class="col-md-6">
                            <img src="/public/asset/images/quiz.png" alt="Quiz Illustration" class="img-fluid rounded-5"
                                style="width: auto;" />
                        </div>
                    </div>
                </div>

                <!-- Step 2 -->
                <div v-if="currentStep === 2" class="step2">
                    <router-link to="/" class="btn btn-outline-custome mb-3" @click.prevent="prevStep">
                        ← Go Back
                    </router-link>

                    <div>
                        <h1 class="my-4">Complete The Quiz To Match A Therapist</h1>

                        <div class="row">
                            <div class="col-md-6 d-flex flex-column justify-content-between" style="min-height: 100%;">
                                <div class="col-md-3">
                                    <p class="bg-color rounded-5 p-2 mx-auto text-center">Question 1/10</p>
                                </div>

                                <div>
                                    <h3 class="fw-normal">
                                        What specific concerns, challenges, or goals are you hoping to address?
                                        <span class="text-danger">*</span> This question is required.
                                    </h3>
                                </div>

                                <div class="mt-auto pb-3">
                                    <button class="btn bg-dark" @click="nextStep">
                                        <i class="bi bi-arrow-down text-white"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <p>Select as many as you can</p>

                                <div>
                                    <div v-for="(option, index) in modalities" :key="index"
                                        class="form-check border py-2 my-2">
                                        <input class="form-check-input mx-1" type="checkbox" :id="'option' + index"
                                            :value="option.id" v-model="form.checkoptions" />
                                        <label class="form-check-label ms-1" :for="'option' + index">
                                            {{ option.title }}
                                        </label>
                                    </div>
                                </div>
                                <br>

                                <div class="mt-3">
                                    <button class="btn main-btn2" @click="nextStep">Done</button>
                                    <span class="ms-2">Click Enter ↵</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Step 3 -->
                <div v-if="currentStep === 3" class="step3">
                    <router-link to="/" class="btn btn-outline-custome mb-3" @click.prevent="prevStep">
                        ← Go Back
                    </router-link>

                    <div>
                        <h1 class="my-4">Complete The Quiz To Match A Therapist</h1>

                        <div class="row">
                            <div class="col-md-6 d-flex flex-column justify-content-between" style="min-height: 100%;">
                                <div class="col-md-3">
                                    <p class="bg-color rounded-5 p-2 mx-auto text-center">Question 2/10</p>
                                </div>

                                <div>
                                    <h3 class="fw-normal">
                                        Can you tell us a bit more about what you’re experiencing or what you’d like to
                                        achieve?
                                        <small class="text-muted m-color">(optional)</small>
                                    </h3>
                                </div>

                                <div class="mt-auto pb-3 ">
                                    <button class="btn bg-dark mx-2" @click="nextStep">
                                        <i class="bi bi-arrow-down text-white"></i>
                                    </button>
                                    <button class="btn bg-color mx-2" @click="prevStep">
                                        <i class="bi bi-arrow-up text-white"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <p>The more details you provide, the better we can match you.</p>
                                <div class="mb-3">
                                    <textarea class="form-control" v-model="form.details" rows="10"
                                        placeholder="Write here..."></textarea>
                                </div>
                                <br>

                                <div>
                                    <button class="btn main-btn2" @click="nextStep">Done</button>
                                    <span class="ms-2">
                                        Shift ⇧ + Enter ↵ to make a line break
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div v-if="currentStep === 4" class="step3">
                    <router-link to="/" class="btn btn-outline-custome mb-3" @click.prevent="prevStep">
                        ← Go Back
                    </router-link>

                    <div>
                        <h1 class="my-4">Complete The Quiz To Match A Therapist</h1>

                        <div class="row">
                            <div class="col-md-6 d-flex flex-column justify-content-between" style="min-height: 100%;">
                                <div class="col-md-3">
                                    <p class="bg-color rounded-5 p-2 mx-auto text-center">Question 3/10</p>
                                </div>

                                <div>
                                    <h3 class="fw-normal">
                                        Can you tell us a bit more about what you’re experiencing or what you’d like to
                                        achieve? <small class="text-muted m-color">(optional)</small>
                                    </h3>
                                </div>

                                <div class="mt-auto pb-3 ">
                                    <button class="btn bg-dark mx-2" @click="nextStep">
                                        <i class="bi bi-arrow-down text-white"></i>
                                    </button>
                                    <button class="btn bg-color mx-2" @click="prevStep">
                                        <i class="bi bi-arrow-up text-white"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <p>The more details you provide, the better we can match you.</p>
                                <div class="mb-3">
                                    <div class="col-12">
                                        <label for="inputAddress2" class="form-label">Input Field Lable</label>
                                        <input type="text" v-model="form.answer1" class="form-control"
                                            id="inputAddress2" placeholder="typing">
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
                                        <label for="inputAddress2" class="form-label">Input Field Lable</label>
                                        <input type="text" v-model="form.answer3" class="form-control"
                                            id="inputAddress2" placeholder="Please type your answer here...">
                                    </div>
                                </div>
                                <br>
                                <div>
                                    <button class="btn main-btn2" @click="nextStep">Done</button>
                                    <span class="ms-2">
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
                        <h1 class="my-4">Complete The Quiz To Match A Therapist</h1>

                        <div class="row">
                            <div class="col-md-6 d-flex flex-column justify-content-between" style="min-height: 100%;">
                                <div class="col-md-3">
                                    <p class="bg-color rounded-5 p-2 mx-auto text-center">Question 4/10</p>
                                </div>

                                <div>
                                    <h3 class="fw-normal">
                                        Do you have a preference for online or in person?
                                        <small class="text-muted m-color">(optional)</small>
                                    </h3>
                                </div>

                                <div class="mt-auto pb-3 ">
                                    <button class="btn bg-dark mx-2" @click="nextStep">
                                        <i class="bi bi-arrow-down text-white"></i>
                                    </button>
                                    <button class="btn bg-color mx-2" @click="prevStep">
                                        <i class="bi bi-arrow-up text-white"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <p>Choose one</p>
                                <div class="form-check  border py-1 my-3">
                                    <input class="form-check-input mx-1" v-model="form.chose_options" type="radio"
                                        value="yes" name="radioDefault" id="radioDefault1">
                                    <label class="form-check-label" for="radioDefault1">
                                        Yes
                                    </label>
                                </div>
                                <div class="form-check border py-1  my-3">
                                    <input class="form-check-input mx-1 " v-model="form.chose_options" value="no"
                                        type="radio" name="radioDefault" id="radioDefault2" checked>
                                    <label class="form-check-label" for="radioDefault2">
                                        No
                                    </label>
                                </div>


                                <br>
                                <div class="mt-5 pt-5">
                                    <button class="btn main-btn2" type="submit">Submit</button>
                                    <span class="ms-2">
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
        <div class="container">
            <div v-if="loading == true" class="text-center d-flex justity-content-center">
                <div class="my-3 text-center">
                    <div class=" d-flex justify-content-center text-center w-100">
                        <router-link to="/" class="navbar-brand d-flex align-items-center ps-md-5">
                            <img src="/public/asset/images/dark-logo.png" alt="Logo" style="height: 120px;" />
                        </router-link>
                    </div>
                    <h2>Finding your perfect matches</h2>
                    <p>We are carefully reviewing your responses and matching you with the most suitable
                        practitioners
                        to meet your needs. Please bear with us as this process may take some time.</p>
                    <div class=" d-flex justify-content-center text-center w-100 my-4">
                        <div class="loading-bar text-center">
                            <div class="loading-progress"></div>
                        </div>
                    </div>
                    <br>
                    <button class="btn main-btn">Restart</button>
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
