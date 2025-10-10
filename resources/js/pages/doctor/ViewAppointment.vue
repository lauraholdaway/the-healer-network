<template>
    <section class="container-fluid">
        <div class="d-flex justify-content-between mt-3">
            <div>
                <h4>Practitioner  Video Call</h4>
            </div>
        </div>
        <hr>

        <div class="card shadow-sm p-4">
            <div class="row bg-dark">
                <!-- Doctor’s own camera -->
                <div class="col-md-6 text-white">
                    <div class="position-relative">
                        <video ref="myVideo" autoplay playsinline muted class="rounded shadow-sm"
                            style="width:100%;"></video>
                        <div class="position-absolute bottom-0 start-50">
                            <h4 class="fw-bold text-white">{{ resultdatas.doctor?.name }}</h4>
                        </div>
                    </div>
                </div>
                <!-- Patient’s video -->
                <div class="col-md-6">
                    <div class="position-relative">
                        <video ref="userVideo" autoplay playsinline class="rounded shadow-sm"
                            style="width:100%;"></video>
                        <div class="position-absolute bottom-0 start-50">
                            <h4 class="fw-bold text-white">{{ resultdatas.user?.name }}</h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-4 d-flex gap-2">
                <button @click="startCall" class="btn btn-success" v-if="!callStarted">Start Call</button>
                <button @click="endCall" class="btn btn-danger" v-if="callStarted">End Call</button>
            </div>

            <p v-if="!callStarted" class="text-secondary mt-3">Click "Start Call" to begin video call.</p>
        </div>
    </section>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import { useRoute ,useRouter } from 'vue-router'
import axios from 'axios'
import Peer from 'peerjs'

const route = useRoute()
const resultdatas = ref({})
const myVideo = ref(null)
const userVideo = ref(null)
const myId = ref('')
const callStarted = ref(false)
const router = useRouter()

let peer, localStream, currentCall

// ✅ Get appointment data
const getdata = async () => {
    const res = await axios.get(`/api/doctor/oneappointment/${route.params.id}`)
    resultdatas.value = res.data
}

// ✅ Doctor starts call
const startCall = async () => {
    callStarted.value = true

    // Initialize PeerJS
    peer = new Peer()
    peer.on('open', async (id) => {
        myId.value = id
        console.log('Doctor Peer ID:', id)

        await axios.put(`/api/doctor/update-appointment-status/${route.params.id}`, {
            status: "in_call",
            peer_id: myId.value
        })
    })

    // Get doctor’s camera
    localStream = await navigator.mediaDevices.getUserMedia({ video: true, audio: true })
    myVideo.value.srcObject = localStream

    // Wait for incoming call (patient connects)
    peer.on('call', (call) => {
        call.answer(localStream)
        currentCall = call
        call.on('stream', (remoteStream) => {
            userVideo.value.srcObject = remoteStream
        })
    })
}

// ✅ End the call
const endCall = async () => {
await axios.put(`/api/doctor/update-appointment-status/${route.params.id}`, {
            status: "end_call",
            peer_id: myId.value
        })
    currentCall?.close()
    localStream?.getTracks().forEach((t) => t.stop())
    callStarted.value = false
    peer?.destroy()

    router.push('/Docterdashboard/UserBooking');
}
</script>

<style scoped>
.badge {
    font-size: 0.85rem;
    padding: 6px 10px;
    border-radius: 5px;
}
</style>
