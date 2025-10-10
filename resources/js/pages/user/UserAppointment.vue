<template>
    <section class="container-fluid">
        <div class="d-flex justify-content-between mt-3">
            <div>
                <h4>Appointment Details</h4>
            </div>
        </div>
        <hr />

        <!-- Video Call Box -->
        <div class="card shadow-sm p-4">
            <div class="row bg-dark">
                <!-- User's own camera -->
                <div class="col-md-6 text-white">
                    <div class="position-relative">
                        <video ref="myVideo" autoplay playsinline muted class="rounded shadow-sm"
                            style="width:100%;"></video>
                        <div class="position-absolute bottom-0 start-50 translate-middle-x">
                            <h5 class="fw-bold text-white">{{ resultdatas.user?.name || 'You' }}</h5>
                        </div>
                    </div>
                </div>

                <!-- Doctor’s video -->
                <div class="col-md-6 text-white">
                    <div class="position-relative">
                        <video ref="userVideo" autoplay playsinline class="rounded shadow-sm"
                            style="width:100%;"></video>
                        <div class="position-absolute bottom-0 start-50 translate-middle-x">
                            <h5 class="fw-bold text-white">{{ resultdatas?.doctor?.name || 'Doctor' }}</h5>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Controls -->
            <div class="mt-4 d-flex gap-2 align-items-center">
                <input type="hidden" v-model="remoteId" />

                <!-- When doctor is live -->
                <templates v-if="remoteId">
                    <button @click="joinCall" class="btn btn-success">Join Call</button>
                    <button @click="endCall" class="btn btn-danger">End Call</button>
                </templates>

                <!-- When waiting for doctor -->
                <templates v-else>
                    <p class="text-muted mb-0">
                        🕒 Waiting for the doctor to start the meeting... Please stay on this page.
                         <router-link to="/profile/bookings" >
                    Go Back
                </router-link>
                    </p>
                </templates>
            </div>
        </div>
    </section>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import { useRoute, useRouter } from 'vue-router'
import axios from 'axios'
import Peer from 'peerjs'

const route = useRoute()
const router = useRouter()

// State variables
const resultdatas = ref({})
const myVideo = ref(null)
const userVideo = ref(null)
const myId = ref('')
const remoteId = ref('')
let peer, localStream, currentCall

// 📡 Fetch appointment data
const getdata = async () => {
    try {
        const res = await axios.get(`/api/doctor/oneappointment/${route.params.id}`)
        resultdatas.value = res.data

        // If doctor started the meeting, store his Peer ID
        if (res.data.peer_id || res.data.Zomemeting) {
            remoteId.value = res.data.peer_id || res.data.Zomemeting
        }
    } catch (err) {
        console.error('Error fetching data:', err)
    }
}

onMounted(async () => {
    await getdata()

    // Initialize PeerJS
    peer = new Peer()
    peer.on('open', (id) => {
        myId.value = id
        console.log('My Peer ID:', id)
    })

    // Get user camera stream
    try {
        localStream = await navigator.mediaDevices.getUserMedia({ video: true, audio: true })
        myVideo.value.srcObject = localStream
    } catch (err) {
        console.error('Camera access error:', err)
        alert('Please allow camera and microphone access to join the call.')
        return
    }

    // Auto-retry every 5 seconds to see if doctor started call
    const interval = setInterval(async () => {
        if (!remoteId.value) {
            await getdata()
            if (remoteId.value) {
                clearInterval(interval)
            }
        }
    }, 5000)

    // When doctor calls this user
    peer.on('call', (call) => {
        call.answer(localStream)
        currentCall = call
        call.on('stream', (remoteStream) => {
            userVideo.value.srcObject = remoteStream
        })
    })
})

// 📞 Join call manually
const joinCall = () => {
    if (!remoteId.value) return alert('Doctor has not started the call yet.')
    const call = peer.call(remoteId.value, localStream)
    currentCall = call

    call.on('stream', (remoteStream) => {
        userVideo.value.srcObject = remoteStream
    })
}

// ❌ End call
const endCall = () => {
    if (currentCall) currentCall.close()
    if (localStream) localStream.getTracks().forEach((t) => t.stop())
    peer?.destroy()
    router.push('/profile/bookings')
}
</script>

<style scoped>
.badge {
    font-size: 0.85rem;
    padding: 6px 10px;
    border-radius: 5px;
}

.text-muted {
    font-size: 0.95rem;
}
</style>
