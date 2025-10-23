<template>
    <div class="container py-2">
        <div class="cards chat-container shadow-sm">
            <div class="row g-0">
                <!-- LEFT SIDEBAR -->
                <div class="col-md-4 border-end chat-sidebar">
                    <div class="p-3 border-bottom">
                        <h5 class="fw-semibold mb-0 Seasons-fonts">Inbox</h5>
                    </div>

                    <div class="list-group list-group-flush chat-list">
                        <div v-for="(msg, index) in messages" :key="index"
                            class="list-group-item list-group-item-action d-flex align-items-start"
                            :class="{ active: selectedUser?.id === msg.id }" @click="selectUser(msg)">
                            <img :src="msg.avatar" class="rounded-circle me-3" width="45" height="45"
                                alt="User Avatar" />
                            <div class="flex-grow-1">
                                <div class="d-flex justify-content-between">
                                    <strong class="name-text Seasons-fonts">{{ msg.name }}</strong>
                                    <small class="text-muted Seasons-fonts">{{ msg.time }}</small>
                                </div>
                                <small class="text-muted Seasons-fonts">{{ msg.preview }}</small>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- RIGHT CHAT PANEL -->
                <div class="col-md-8 chat-main d-flex flex-column">
                    <div v-if="selectedUser" class="chat-header p-3 border-bottom d-flex align-items-center">
                        <img :src="selectedUser.avatar" class="rounded-circle me-3" width="45" height="45"
                            alt="Avatar" />
                        <div>
                            <h6 class="mb-0 fw-semibold">{{ selectedUser.name }}</h6>
                            <small class="text-muted">{{ selectedUser.email }}</small>
                        </div>
                        <button class="btn btn-sm btn-link ms-auto text-danger">
                            <i class="bi bi-trash"></i>
                        </button>
                    </div>

                    <div class="chat-body flex-grow-1 p-4">
                        <div v-for="(chat, index) in selectedUser.chats" :key="index">
                            <div class="chat-message mb-3" :class="chat.sentByUser ? 'text-end' : 'text-start'">
                                <div class="d-inline-block px-3 py-2 rounded-4"
                                    :class="chat.sentByUser ? 'msg-user' : 'msg-other'">
                                    {{ chat.text }}
                                </div>
                                <div class="small text-muted mt-1">
                                    {{ chat.time }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- MESSAGE INPUT -->
                    <div class="chat-footer border-top p-3">
                        <form @submit.prevent="sendMessage" class="d-flex align-items-center">
                            <input v-model="newMessage" type="text"
                                class="form-control border-0 bg-light rounded-pill px-3 me-2"
                                placeholder="Type your message..." />
                            <button type="submit" class="btn send-btn rounded-circle">
                                <i class="bi bi-send"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref } from "vue";

const messages = ref([
  {
    id: 1,
    name: "Esther Howard",
    email: "esther@email.com",
    avatar: "https://i.pravatar.cc/150?img=47",
    preview: "Your appointment has been cancelled.",
    time: "2 mins ago",
    chats: [
      { text: "Hi! How are you John?", time: "4 Apr, 2023 08:37 PM", sentByUser: false },
      { text: "I am good Esther.", time: "4 Apr, 2023 08:37 PM", sentByUser: true },
    ],
  },
  {
    id: 2,
    name: "Annette Black",
    email: "annette@email.com",
    avatar: "https://i.pravatar.cc/150?img=32",
    preview: "Your appointment has been cancelled.",
    time: "2 mins ago",
    chats: [],
  },
  {
    id: 3,
    name: "Brooklyn Simmons",
    email: "brooklyn@email.com",
    avatar: "https://i.pravatar.cc/150?img=28",
    preview: "Your appointment has been cancelled.",
    time: "2 mins ago",
    chats: [],
  },
  {
    id: 4,
    name: "Devon Lane",
    email: "devon@email.com",
    avatar: "https://i.pravatar.cc/150?img=14",
    preview: "Your appointment has been cancelled.",
    time: "2 mins ago",
    chats: [],
  },
]);

const selectedUser = ref(messages.value[0]);
const newMessage = ref("");

const selectUser = (user) => {
  selectedUser.value = user;
};

const sendMessage = () => {
  if (!newMessage.value.trim()) return;
  selectedUser.value.chats.push({
    text: newMessage.value,
    time: new Date().toLocaleString(),
    sentByUser: true,
  });
  newMessage.value = "";
};
</script>

<style scoped>
.chat-container {
  border-radius: 14px;
  overflow: hidden;
  background-color: #fff;
  color: #4a3b2d;
}

.chat-sidebar {
  background-color: #fdfbf8;
}

.chat-list .list-group-item {
  border: none;
  padding: 12px 16px;
  cursor: pointer;
  background: transparent;
  transition: background-color 0.2s;
}

.chat-list .list-group-item:hover {
  background-color: #f3eee6;
}

.chat-list .list-group-item.active {
  background-color: #e8dfcf;
}

.name-text {
  color: #4a3b2d;
  font-weight: 500;
}

.chat-header {
  background-color: #fff;
}

.chat-body {
  background-color: #fffdfb;
  overflow-y: auto;
  height: 400px;
}

.msg-user {
  background-color: #ded1ba;
  color: #4a3b2d;
}

.msg-other {
  background-color: #f2ece5;
  color: #4a3b2d;
}

.chat-footer {
  background-color: #fff;
}

.send-btn {
  background-color: #8b674b;
  color: #fff;
  width: 42px;
  height: 42px;
  display: flex;
  align-items: center;
  justify-content: center;
}

.send-btn:hover {
  background-color: #74563f;
}
</style>
