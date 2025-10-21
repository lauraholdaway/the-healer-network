<template>
    <section class="my-services-page">
        <!-- White Card Container -->
        <div class="content-card">
            <!-- Header Section -->
            <div class="services-header">
                <div class="header-left">
                    <h1 class="page-title">
                        <svg width="21" height="26" viewBox="0 0 21 26" fill="none" xmlns="http://www.w3.org/2000/svg" class="title-icon">
                            <path
                                d="M6.42857 3.66667H3.71429C2.99441 3.66667 2.30402 3.94762 1.795 4.44772C1.28597 4.94781 1 5.62609 1 6.33333V22.3333C1 23.0406 1.28597 23.7189 1.795 24.219C2.30402 24.719 2.99441 25 3.71429 25H17.2857C18.0056 25 18.696 24.719 19.205 24.219C19.714 23.7189 20 23.0406 20 22.3333V6.33333C20 5.62609 19.714 4.94781 19.205 4.44772C18.696 3.94762 18.0056 3.66667 17.2857 3.66667H14.5714M6.42857 3.66667C6.42857 2.95942 6.71454 2.28115 7.22357 1.78105C7.73259 1.28095 8.42298 1 9.14286 1H11.8571C12.577 1 13.2674 1.28095 13.7764 1.78105C14.2855 2.28115 14.5714 2.95942 14.5714 3.66667M6.42857 3.66667C6.42857 4.37391 6.71454 5.05219 7.22357 5.55229C7.73259 6.05238 8.42298 6.33333 9.14286 6.33333H11.8571C12.577 6.33333 13.2674 6.05238 13.7764 5.55229C14.2855 5.05219 14.5714 4.37391 14.5714 3.66667M6.42857 13H6.44214M11.8571 13H14.5714M6.42857 18.3333H6.44214M11.8571 18.3333H14.5714"
                                stroke="#8A7356" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        My Services
                    </h1>
                </div>
                <div class="header-right">
                    <router-link to="/Docterdashboard/AddService" class="add-service-btn">
                        Add New Service
                    </router-link>
                </div>
            </div>
            <hr>
        
          
            <!-- Services Grid -->
            <div class="services-grid">
                <div class="service-card" v-for="s in services" :key="s.id">
                    <!-- Card Header with Icon, Rate, and Actions -->
                    <div class="card-header">
                        <div class="rate-section">
                            <svg width="38" height="40" viewBox="0 0 38 40" fill="none" xmlns="http://www.w3.org/2000/svg" class="brain-icon">
                                <g clip-path="url(#clip0_261_6855)">
                                    <path
                                        d="M8.35925 18.4822C8.60496 17.254 9.17639 16.4828 9.21639 16.437C9.44496 16.14 9.89067 16.0658 10.2107 16.2829C10.5307 16.4942 10.5878 16.9055 10.3764 17.214C10.0221 17.7224 9.55923 19.0934 9.77066 20.3045C9.9878 21.5098 10.3535 22.4867 12.3592 22.8466C13.6335 23.075 13.7592 24.0519 13.8507 24.766C13.9535 25.5486 14.0792 26.5254 15.2907 27.5937C15.7707 28.0164 16.3821 28.3306 17.0278 28.6619C17.3478 28.8276 17.685 28.999 18.0164 29.1932C18.5135 28.1307 18.9307 26.3141 18.8964 25.2287C18.8564 23.8863 18.3878 22.601 17.5535 21.5212L17.3707 21.287L17.4278 21.0014C17.5307 20.4988 17.5707 19.9846 17.5592 19.4819C17.3078 19.5675 16.9821 19.619 16.6564 19.619C15.2907 19.6075 14.245 19.082 13.5307 18.2309C12.3078 16.7684 12.5878 15.1404 12.645 14.2891C12.7021 13.438 12.7535 12.7582 12.8564 11.7985C13.0164 10.3075 13.2107 8.45096 13.0621 7.79402C12.5992 5.76607 11.5535 5.80035 11.1592 5.81178C10.765 5.82321 10.4392 5.53758 10.4278 5.16626C10.4164 4.79494 10.725 4.48646 11.1192 4.47503C12.1021 4.44647 13.8392 4.79493 14.4564 7.50839C14.6507 8.37098 14.4564 10.1762 14.2735 11.9242C14.1707 12.8839 14.085 13.5751 14.0678 14.352C14.0507 15.1232 13.925 16.5513 14.6564 17.4025C15.1135 17.9395 15.7935 18.2309 16.7421 18.2766C17.085 18.2993 17.8392 17.9567 18.245 17.2654C18.485 16.7285 18.605 16.1514 18.5821 15.563C18.5535 14.7005 18.2392 13.8779 17.6735 13.1924L17.325 12.7696L17.685 12.3584C18.3535 11.5929 18.7078 10.6331 18.6735 9.65057C18.645 8.82798 18.3592 8.03967 17.845 7.37701L17.525 6.9657L17.8621 6.56582C18.5021 5.80606 18.8335 4.86349 18.805 3.90378C18.7307 1.53308 17.0964 -0.0664297 14.8278 0.00212071C13.2621 0.0535335 12.0907 0.699048 11.4392 2.21287C9.8564 1.79586 8.00494 3.16687 7.58779 4.53788C7.15922 5.95459 7.4221 7.6512 9.21067 9.79343C9.47924 10.1133 9.75923 10.399 10.0564 10.6446C10.3478 10.8902 10.3764 11.313 10.1135 11.5871C9.97639 11.73 9.79353 11.8042 9.60495 11.8099C9.42781 11.8099 9.25068 11.7586 9.10782 11.6443C8.75354 11.3472 8.41066 11.0045 8.09066 10.6217C6.81066 9.09077 6.35354 7.35987 6.18782 6.19451C3.47925 8.04537 3.13068 11.4501 4.36496 13.3238C2.7821 15.7059 5.23923 18.6135 8.34781 18.4708L8.35925 18.4822Z"
                                        fill="#C1B39D" />
                                    <path
                                        d="M16.3403 29.8326C15.6203 29.5299 14.9232 29.1071 14.3118 28.5645C12.7232 27.1648 12.5518 25.8167 12.4375 24.9256C12.3461 24.2001 12.3118 24.1944 12.0832 24.1544C10.9289 23.9487 10.1289 23.5717 9.57463 23.0975C8.88892 23.4003 8.21461 23.5317 7.59175 23.5545C5.75746 23.6117 4.35175 22.749 4.27175 22.7034C3.94603 22.4977 3.86034 22.0865 4.07748 21.778C4.29462 21.4695 4.74033 21.3895 5.06033 21.5894C5.14033 21.6351 6.8489 22.6691 8.73461 21.9893C8.55175 21.6008 8.19176 20.784 8.21462 19.83C5.22605 19.91 2.46032 18.1447 2.34032 15.1914C-1.52255 20.864 3.07748 26.1823 8.32892 27.6905C9.74035 28.096 10.7632 29.5127 10.7746 30.9865C10.7746 31.2436 10.7403 31.6321 10.5861 32.0663C11.1461 32.169 11.8032 32.3633 12.4546 32.6661C12.2946 31.6549 12.4203 30.8095 12.4318 30.7524C12.4889 30.3867 12.8546 30.1354 13.2375 30.1868C13.6261 30.2382 13.8946 30.5752 13.8375 30.9408C13.8375 30.958 13.5118 33.083 14.4489 34.077C14.9461 34.6026 15.4432 35.4824 15.5861 36.4535C15.6375 36.819 15.3689 37.1561 14.9803 37.2075C14.9518 37.2075 14.9289 37.2075 14.9003 37.2132C14.5403 37.2246 14.2261 36.979 14.1746 36.6363C13.7518 33.7857 10.8318 33.3915 9.79746 33.2887C9.32889 33.7628 8.64891 34.2142 7.63748 34.5512C7.56891 34.5741 7.49461 34.5854 7.42033 34.5911C7.11747 34.6026 6.83175 34.4312 6.72889 34.1456C6.59746 33.7971 6.79175 33.4144 7.16318 33.2945C8.58033 32.8203 9.35176 32.0091 9.34604 31.0037C9.34033 30.1126 8.6946 29.2157 7.87175 28.9644C4.94603 28.0618 2.79748 26.5822 1.47177 24.5657C-0.242522 29.05 3.47747 30.958 5.85462 30.6781C6.23748 30.6381 6.59749 30.8894 6.64892 31.2607C6.69463 31.6264 6.41461 31.9634 6.02604 32.0091C5.83175 32.032 5.64319 32.0434 5.46034 32.0491C4.64318 32.0777 3.91176 31.9463 3.28891 31.7349C2.72891 34.2142 5.26606 38.3443 9.90034 36.6477C10.4832 39.8981 15.2718 41.4006 18.0318 38.3101C20.7518 35.2709 18.8661 30.9123 16.3289 29.8498L16.3403 29.8326Z"
                                        fill="#A28F71" />
                                    <path
                                        d="M19.7617 9.28506C19.7617 9.45072 19.7846 9.61634 19.8131 9.78205C20.3674 9.05084 20.9789 8.43389 21.3789 8.10827C21.5389 7.97689 21.6989 7.85693 21.8474 7.73696C23.3446 6.54875 24.0989 5.95464 23.9674 3.96097C23.9446 3.60678 24.2303 3.29832 24.6131 3.27547C25.0017 3.25262 25.3217 3.5211 25.3446 3.87528C25.516 6.52018 24.3503 7.44561 22.7389 8.72522C22.5903 8.84518 22.436 8.96515 22.276 9.09083C21.6703 9.57643 20.9046 10.4561 20.4131 11.3016V11.3187L20.276 11.6101C20.0017 12.1756 19.8703 12.7754 19.8874 13.3866C19.9046 13.9636 20.0589 14.5235 20.3389 15.049L20.476 15.3061L20.3617 15.5745C20.0646 16.2829 19.9274 17.0256 19.9503 17.791C19.9674 18.4022 20.1046 19.0021 20.3331 19.5677C20.8303 18.9336 21.4931 18.3851 22.2874 17.9681C23.4189 17.3741 24.7389 17.094 25.7046 17.2198C27.1046 15.6488 29.0131 14.7462 31.1274 14.6662C31.1446 14.6662 31.1617 14.6662 31.1789 14.6662C32.396 14.6262 34.7903 14.9747 35.8474 16.4029C36.3103 13.8208 35.3846 11.7015 32.6989 11.153C33.2189 9.02798 31.876 7.05145 30.6303 6.37166C30.116 7.8512 29.2931 8.66239 28.4131 9.30791C28.7331 9.74205 29.5046 10.9131 29.5217 12.1584C29.5217 12.5126 29.2303 12.804 28.8531 12.8154C28.8531 12.8154 28.8474 12.8154 28.8417 12.8154C28.4646 12.8211 28.1503 12.5355 28.1446 12.1813C28.1331 11.3016 27.5389 10.399 27.2931 10.0677C26.1789 10.8046 25.1446 11.5929 24.4874 13.5866C24.396 13.8551 24.1389 14.0321 23.8531 14.0436C23.7789 14.0436 23.7046 14.0436 23.6303 14.015C23.2703 13.9122 23.0646 13.5523 23.1789 13.2096C24.0303 10.6275 25.4931 9.67348 26.7903 8.82806C27.8874 8.11399 28.8417 7.4856 29.3674 5.87467L29.476 5.33769C29.5389 5.01207 29.5674 4.69217 29.556 4.37227C29.476 1.88732 27.2589 -0.0663722 24.6131 0.019316C21.9674 0.105004 19.876 2.19579 19.956 4.68075C19.9789 5.30913 20.1331 5.92036 20.4246 6.49161L20.5846 6.80581L20.3903 7.10858C19.956 7.77123 19.7389 8.531 19.7674 9.30791L19.7617 9.28506Z"
                                        fill="#C1B39D" />
                                    <path
                                        d="M36.2736 25.2399C35.7079 25.9197 35.1022 26.4739 34.9993 26.5709C34.8736 26.6852 34.7079 26.7481 34.5422 26.7538C34.3536 26.7595 34.165 26.6967 34.0222 26.5595C33.7593 26.3025 33.7708 25.8968 34.045 25.6455C34.3365 25.3827 35.0108 24.7144 35.4736 24.0803L35.4622 24.0688L35.7079 23.6861C36.2736 22.8007 36.5593 21.7952 36.525 20.7727C36.4793 19.396 35.8736 18.1107 34.8222 17.1396C34.7765 17.0939 34.7308 17.0482 34.6793 17.0082L34.6279 16.9625C33.7822 16.2884 32.5193 15.917 31.1822 15.957C30.1193 15.997 28.0965 16.3627 26.525 18.3278L26.2165 18.7163L25.7365 18.5448C25.3079 18.3963 24.1593 18.4648 22.965 19.0932C22.1136 19.5388 21.1193 20.4014 20.725 21.8581C20.1079 24.1546 21.8736 25.4913 22.5022 25.9311C22.805 26.1483 22.9479 26.4967 22.765 26.8108C22.645 27.0166 22.4165 27.1366 22.1879 27.1422C22.0679 27.1422 21.9479 27.1193 21.8336 27.0623C21.3079 26.7938 20.5936 26.2339 20.045 25.417C19.8793 25.9197 19.7936 26.451 19.8108 26.9823C19.845 28.0106 20.2165 28.9817 20.885 29.7986L21.085 30.0385C21.6622 30.6783 22.4679 31.3009 23.1022 31.7865C23.3993 32.015 23.6679 32.2264 23.8736 32.3978C25.7936 34.0372 25.4165 36.0424 24.9536 36.8706C24.8336 37.0821 24.605 37.2077 24.365 37.2191C24.2508 37.2191 24.1308 37.1963 24.0222 37.1448C23.6908 36.9792 23.5593 36.5907 23.7365 36.2766C23.8222 36.1167 24.5193 34.6999 22.9479 33.3574C22.7593 33.1975 22.5079 33.0033 22.2279 32.7919C21.7479 32.4263 21.1765 31.9807 20.645 31.4894C20.6165 31.678 20.5993 31.8607 20.6108 32.055C20.6279 32.552 20.7536 33.0319 20.9936 33.4774L21.1536 33.7802L20.9765 34.0772C20.5993 34.7113 20.4108 35.4197 20.4336 36.1338C20.5022 38.3217 22.4565 40.0411 24.7879 39.9668C26.4222 39.9154 27.8508 39.0071 28.5193 37.6019L28.6393 37.3506L28.9136 37.2534C29.6793 36.9907 30.325 36.4879 30.7593 35.8481C30.1708 35.7853 29.6108 35.6025 29.1136 35.2997C28.1822 34.7285 27.5822 33.8087 27.4736 32.7633C27.3765 31.8094 27.6679 30.7354 27.9936 29.9071C27.405 30.1013 26.7993 30.1985 26.2508 30.2155C25.6622 30.2327 25.1365 30.1642 24.7593 30.0156C24.405 29.8843 24.2393 29.5072 24.3822 29.1759C24.525 28.8446 24.925 28.6847 25.2793 28.8217C26.045 29.113 28.4736 28.8503 29.3079 27.3822C30.1593 25.8626 30.3879 25.0686 30.0679 24.3031C29.7593 23.5662 29.165 23.3034 28.7193 23.2063C27.9022 23.0349 26.9536 23.3206 26.2508 23.9432C25.9765 24.1888 25.5365 24.1774 25.2793 23.9204C25.0165 23.6633 25.0336 23.252 25.3079 23.0064C26.1708 22.2408 27.3022 21.8353 28.3879 21.8752C28.7136 20.6756 28.4222 19.516 28.4222 19.5046C28.3307 19.1561 28.5593 18.8076 28.9307 18.7219C29.2965 18.6363 29.6736 18.8476 29.7593 19.1961C29.7765 19.2647 30.125 20.6699 29.7308 22.178C30.4679 22.5036 31.0393 23.0806 31.3536 23.8289C32.0165 25.417 31.2222 26.868 29.8736 29.1016C29.8736 29.1073 28.7022 31.1582 28.8565 32.6377C28.925 33.2889 29.285 33.8773 29.8793 34.2201C33.6679 36.4137 38.165 30.2669 36.2965 25.2286L36.2736 25.2399Z"
                                        fill="#C1B39D" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_261_6855">
                                        <rect width="36.1905" height="40" fill="white" transform="translate(0.90625)" />
                                    </clipPath>
                                </defs>
                            </svg>
                            <span class="rate-text">Rate Per Session $ {{ s.rate_per_session }}.00</span>
                        </div>
                        <div class="action-buttons">
                            <router-link :to="{ name: 'EditService', params: { id: s.id } }" class="action-btn edit-btn" title="Edit">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z" fill="currentColor"/>
                                </svg>
                            </router-link>
                            <button @click="deleteService(s.id)" class="action-btn delete-btn" title="Delete">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z" fill="currentColor"/>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Service Content -->
                    <div class="service-content">
                        <h3 class="service-title">{{ s.title }}</h3>
                        <p class="service-description" v-html="formatDescription(s.description)"></p>
                    </div>

                    <!-- Ideal For Section -->
                    <div class="ideal-for-section">
                        <p class="ideal-for-text">{{ s.ideal_for }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import { ref ,onMounted } from 'vue';
import axios from 'axios';

const services = ref([]);

const fetchServices = async () => {
  const res = await axios.get('/api/services')
  services.value = res.data
}
const deleteService = async (id) => {
  if (confirm('Delete this service?')) {
    await axios.delete(`/api/services/${id}`)
    fetchServices()
  }
}

const formatDescription = (description) => {
  if (!description) return ''
  
  // Keywords to highlight
  const keywords = ['trauma', 'relationships', 'ADHD', 'anxiety', 'depression', 'stress']
  
  let formattedDesc = description
  
  // Highlight keywords with underline
  keywords.forEach(keyword => {
    const regex = new RegExp(`\\b${keyword}\\b`, 'gi')
    formattedDesc = formattedDesc.replace(regex, `<span class="highlighted-keyword">${keyword}</span>`)
  })
  
  // Add "See more" if description is long
  if (description.length > 100) {
    formattedDesc = formattedDesc.substring(0, 100) + '... <span class="see-more">See more</span>'
  }
  
  return formattedDesc
}

onMounted(fetchServices)

</script>

<style scoped>
/* Main Page Container */
.my-services-page {
    padding: 20px;
    background: transparent;
    min-height: 100vh;
}

/* White Card Container */
.content-card {
    background: #ffffff;
    border-radius: 12px;
    padding: 30px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
}

/* Header Section */
.services-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 30px;
}

.header-left {
    display: flex;
    align-items: center;
}

.page-title {
    font-size: 28px;
    font-weight: 600;
    color: #8A7356;
    margin: 0;
    font-style: italic;
    display: flex;
    align-items: center;
    gap: 12px;
}

.title-icon {
    width: 21px;
    height: 26px;
}

.add-service-btn {
    background: #8A7356;
    color: white;
    padding: 12px 24px;
    border-radius: 8px;
    text-decoration: none;
    font-weight: 500;
    transition: background-color 0.3s ease;
    border: none;
    cursor: pointer;
}

.add-service-btn:hover {
    background: #5B4C3A;
    color: white;
    text-decoration: none;
}

/* Services Grid */
.services-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 24px;
    max-width: 1200px;
}

/* Service Card */
.service-card {
    background: #ffffff;
    border-radius: 12px;
    padding: 24px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    transition: transform 0.2s ease, box-shadow 0.2s ease;
    border: 1px solid #DED1BA;
}

.service-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.12);
}

/* Card Header */
.card-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.rate-section {
    display: flex;
    align-items: center;
    gap: 8px;
}

.brain-icon {
    width: 38px;
    height: 40px;
}

.rate-text {
    color: #8A7356;
    font-weight: 500;
    font-size: 14px;
}

.action-buttons {
    display: flex;
    gap: 8px;
}

.action-btn {
    width: 32px;
    height: 32px;
    border-radius: 6px;
    border: none;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: background-color 0.2s ease;
    text-decoration: none;
}

.edit-btn {
    /* background: #DED1BA; */
    border: 1px solid #DED1BA;
    color: #8A7356;
}

.edit-btn:hover {
    background: #C1B39D;
    color: #8A7356;
    text-decoration: none;
}

.delete-btn {
    border: 1px solid #DED1BA;
    color: #8A7356;
}

.delete-btn:hover {
    background: #C1B39D;
    color: #8A7356;
}

/* Service Content */
.service-content {
    margin-bottom: 20px;
}

.service-title {
    font-size: 20px;
    font-weight: 600;
    color: #5B4C3A;
    margin: 0 0 12px 0;
    font-style: italic;
    line-height: 1.3;
}

.service-description {
    color: #666;
    font-size: 14px;
    line-height: 1.5;
    margin: 0;
}

.highlighted-keyword {
    text-decoration: underline;
    color: #8A7356;
    font-weight: 500;
}

.see-more {
    color: #8A7356;
    text-decoration: underline;
    cursor: pointer;
    font-weight: 500;
}

.see-more:hover {
    color: #5B4C3A;
}

/* Ideal For Section */
.ideal-for-section {
    background: #F4EFE6;
    border-radius: 8px;
    padding: 16px;
    text-align: center;
    margin-top: 16px;
}

.ideal-for-text {
    margin: 0;
    color: #5B4C3A;
    font-size: 14px;
    font-weight: 500;
}

/* Responsive Design */
@media (max-width: 768px) {
    .services-grid {
        grid-template-columns: 1fr;
        gap: 16px;
    }
    
    .services-header {
        flex-direction: column;
        gap: 16px;
        align-items: flex-start;
    }
    
    .page-title {
        font-size: 24px;
    }
    
    .service-card {
        padding: 20px;
    }
    
    .card-header {
        flex-direction: column;
        gap: 12px;
        align-items: flex-start;
    }
    
    .action-buttons {
        align-self: flex-end;
    }
}

@media (max-width: 480px) {
    .my-services-page {
        padding: 16px;
    }
    
    .page-title {
        font-size: 20px;
    }
    
    .add-service-btn {
        padding: 10px 20px;
        font-size: 14px;
    }
    
    .service-card {
        padding: 16px;
    }
    
    .service-title {
        font-size: 18px;
    }
}
</style>
