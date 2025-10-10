<template>
  <div class="p-4">
    <h3 class="text-xl font-bold mb-3">Doctor-User Video Call</h3>

    <div class="grid grid-cols-2 gap-4">
      <video ref="myVideo" autoplay playsinline muted class="rounded shadow bg-black"></video>
      <video ref="userVideo" autoplay playsinline class="rounded shadow bg-black"></video>
    </div>

    <div class="mt-4 space-x-2">
      <input v-model="remoteId" placeholder="Enter ID to call" class="border px-2 py-1 rounded" />
      <button @click="callUser" class="bg-green-500 text-white px-4 py-2 rounded">Call</button>
      <button @click="endCall" class="bg-red-500 text-white px-4 py-2 rounded">End</button>
    </div>

    <p class="mt-2">Your ID: <strong>{{ myId }}</strong></p>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import Peer from 'peerjs'

const myVideo = ref(null)
const userVideo = ref(null)
const myId = ref('')
const remoteId = ref('')
let peer, localStream, currentCall

onMounted(async () => {
  // initialize PeerJS
  peer = new Peer()

  peer.on('open', id => {
    myId.value = id
  })

  // get local camera & mic
  localStream = await navigator.mediaDevices.getUserMedia({ video: true, audio: true })
  myVideo.value.srcObject = localStream

  // when someone calls you
  peer.on('call', call => {
    call.answer(localStream)
    currentCall = call
    call.on('stream', remoteStream => {
      userVideo.value.srcObject = remoteStream
    })
  })
})

function callUser() {
  if (!remoteId.value) return alert('Enter remote ID')
  const call = peer.call(remoteId.value, localStream)
  currentCall = call
  call.on('stream', remoteStream => {
    userVideo.value.srcObject = remoteStream
  })
}

function endCall() {
  currentCall?.close()
  localStream?.getTracks().forEach(t => t.stop())
}
</script>

<style scoped>
video {
  width: 100%;
  height: 250px;
  background: #000;
}
</style>
