<template>
    <div class="container d-flex justify-content-center align-items-center py-5">
        <div class="card shadow-sm border-0 rounded-4 p-4 user-profile-card w-100" style="max-width: 900px;">
            <h5 class="mb-4 Seasons-fonts" style="color: #5B4C3A;">
                Basic Information</h5>

            <form @submit.prevent="updateProfile" enctype="multipart/form-data">
                <div class="row g-4">
                    <!-- Left Column (Inputs) -->
                    <div class="col-md-8">
                        <div class="row g-3">
                            <!-- First Name -->
                            <div class="col-md-6">
                                <label class="form-label"
                                    style="color: #737373; font-family: Arial, Helvetica, sans-serif, serif; font-weight: 300; font-size: 15px;">First
                                    Name</label>
                                <input type="text" v-model="form.name" class="form-control rounded-3"
                                    placeholder="John" />
                            </div>

                            <!-- Last Name -->
                            <div class="col-md-6">
                                <label class="form-label"
                                    style="color: #737373; font-family: Arial, Helvetica, sans-serif, serif; font-weight: 300; font-size: 15px;">Second
                                    Name</label>
                                <input type="text" v-model="form.last_name" class="form-control rounded-3"
                                    placeholder="Doe" />
                            </div>

                            <!-- Phone Number -->
                            <div class="col-md-12">
                                <label class="form-label"
                                    style="color: #737373; font-family: Arial, Helvetica, sans-serif, serif; font-weight: 300; font-size: 15px;">Phone
                                    Number</label>
                                <div class="phone-input-container">

                                    <input type="text" v-model="form.number" class="phone-number-input"
                                        placeholder="321 586 97 378" />
                                </div>
                            </div>

                            <!-- Location -->
                            <!-- Last Name -->
                            <div class="col-md-12">
                                <label class="form-label"
                                    style="color: #737373; font-family: Arial, Helvetica, sans-serif, serif; font-weight: 300; font-size: 15px;">
                                    Location</label>
                                <input type="text" v-model="form.address" class="form-control rounded-3"
                                    placeholder="Address" />
                            </div>
                        </div>

                        <!-- Buttons -->
                        <div class="mt-4 d-flex gap-3">
                            <button type="submit" class="btn save-update-btn">
                                Save And Update
                            </button>
                        </div>
                    </div>

                    <!-- Right Column (Profile Image) -->
                    <div class="col-md-4 d-flex flex-column align-items-center justify-content-center">
                        <div class="profile-uploader-container">
                            <!-- Outer Circle -->
                            <div class="outer-circle">
                                <!-- Inner Circle -->
                                <div class="inner-circle">
                                    <img v-if="imagePreview || auth.user.image"
                                        :src="imagePreview || (auth.user?.image ? '/storage/' + auth.user?.image : '/default-avatar.png')"
                                        alt="Profile Preview" class="profile-image" />

                                    <svg v-else xmlns="http://www.w3.org/2000/svg" class="user-icon-svg"
                                        viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </div>

                            <!-- Upload Button -->
                            <button @click="triggerFileInput" type="button" class="upload-button">
                                <svg width="21" height="18" viewBox="0 0 21 18" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" class="camera-icon">
                                    <path
                                        d="M3.5 4H4.5C5.03043 4 5.53914 3.78929 5.91421 3.41421C6.28929 3.03914 6.5 2.53043 6.5 2C6.5 1.73478 6.60536 1.48043 6.79289 1.29289C6.98043 1.10536 7.23478 1 7.5 1H13.5C13.7652 1 14.0196 1.10536 14.2071 1.29289C14.3946 1.48043 14.5 1.73478 14.5 2C14.5 2.53043 14.7107 3.03914 15.0858 3.41421C15.4609 3.78929 15.9696 4 16.5 4H17.5C18.0304 4 18.5391 4.21071 18.9142 4.58579C19.2893 4.96086 19.5 5.46957 19.5 6V15C19.5 15.5304 19.2893 16.0391 18.9142 16.4142C18.5391 16.7893 18.0304 17 17.5 17H3.5C2.96957 17 2.46086 16.7893 2.08579 16.4142C1.71071 16.0391 1.5 15.5304 1.5 15V6C1.5 5.46957 1.71071 4.96086 2.08579 4.58579C2.46086 4.21071 2.96957 4 3.5 4Z"
                                        stroke="#5B4C3A" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path
                                        d="M7.5 10C7.5 10.7956 7.81607 11.5587 8.37868 12.1213C8.94129 12.6839 9.70435 13 10.5 13C11.2956 13 12.0587 12.6839 12.6213 12.1213C13.1839 11.5587 13.5 10.7956 13.5 10C13.5 9.20435 13.1839 8.44129 12.6213 7.87868C12.0587 7.31607 11.2956 7 10.5 7C9.70435 7 8.94129 7.31607 8.37868 7.87868C7.81607 8.44129 7.5 9.20435 7.5 10Z"
                                        stroke="#5B4C3A" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                                <span class="upload-text">Upload Image</span>
                            </button>

                            <!-- Hidden Input -->
                            <input type="file" ref="fileInput" @change="onFileChange" accept="image/*"
                                class="hidden-input" />
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script setup>
import { ref, computed, watch, onMounted, onUnmounted } from "vue";
import axios from "axios";
import { useAuthStore } from "@/stores/auth";
// import { getCountries, getCountryData } from 'country-list';

const auth = useAuthStore();
const preview = ref(null);
const imagePreview = ref(null);
const fileInput = ref(null);

// Comprehensive country data with phone codes and flags
const countries = ref([
    { code: '+93', name: 'Afghanistan', flag: 'https://flagcdn.com/w20/af.png', iso: 'AF' },
    { code: '+355', name: 'Albania', flag: 'https://flagcdn.com/w20/al.png', iso: 'AL' },
    { code: '+213', name: 'Algeria', flag: 'https://flagcdn.com/w20/dz.png', iso: 'DZ' },
    { code: '+1684', name: 'American Samoa', flag: 'https://flagcdn.com/w20/as.png', iso: 'AS' },
    { code: '+376', name: 'Andorra', flag: 'https://flagcdn.com/w20/ad.png', iso: 'AD' },
    { code: '+244', name: 'Angola', flag: 'https://flagcdn.com/w20/ao.png', iso: 'AO' },
    { code: '+1264', name: 'Anguilla', flag: 'https://flagcdn.com/w20/ai.png', iso: 'AI' },
    { code: '+1268', name: 'Antigua and Barbuda', flag: 'https://flagcdn.com/w20/ag.png', iso: 'AG' },
    { code: '+54', name: 'Argentina', flag: 'https://flagcdn.com/w20/ar.png', iso: 'AR' },
    { code: '+374', name: 'Armenia', flag: 'https://flagcdn.com/w20/am.png', iso: 'AM' },
    { code: '+297', name: 'Aruba', flag: 'https://flagcdn.com/w20/aw.png', iso: 'AW' },
    { code: '+61', name: 'Australia', flag: 'https://flagcdn.com/w20/au.png', iso: 'AU' },
    { code: '+43', name: 'Austria', flag: 'https://flagcdn.com/w20/at.png', iso: 'AT' },
    { code: '+994', name: 'Azerbaijan', flag: 'https://flagcdn.com/w20/az.png', iso: 'AZ' },
    { code: '+1242', name: 'Bahamas', flag: 'https://flagcdn.com/w20/bs.png', iso: 'BS' },
    { code: '+973', name: 'Bahrain', flag: 'https://flagcdn.com/w20/bh.png', iso: 'BH' },
    { code: '+880', name: 'Bangladesh', flag: 'https://flagcdn.com/w20/bd.png', iso: 'BD' },
    { code: '+1246', name: 'Barbados', flag: 'https://flagcdn.com/w20/bb.png', iso: 'BB' },
    { code: '+375', name: 'Belarus', flag: 'https://flagcdn.com/w20/by.png', iso: 'BY' },
    { code: '+32', name: 'Belgium', flag: 'https://flagcdn.com/w20/be.png', iso: 'BE' },
    { code: '+501', name: 'Belize', flag: 'https://flagcdn.com/w20/bz.png', iso: 'BZ' },
    { code: '+229', name: 'Benin', flag: 'https://flagcdn.com/w20/bj.png', iso: 'BJ' },
    { code: '+1441', name: 'Bermuda', flag: 'https://flagcdn.com/w20/bm.png', iso: 'BM' },
    { code: '+975', name: 'Bhutan', flag: 'https://flagcdn.com/w20/bt.png', iso: 'BT' },
    { code: '+591', name: 'Bolivia', flag: 'https://flagcdn.com/w20/bo.png', iso: 'BO' },
    { code: '+387', name: 'Bosnia and Herzegovina', flag: 'https://flagcdn.com/w20/ba.png', iso: 'BA' },
    { code: '+267', name: 'Botswana', flag: 'https://flagcdn.com/w20/bw.png', iso: 'BW' },
    { code: '+55', name: 'Brazil', flag: 'https://flagcdn.com/w20/br.png', iso: 'BR' },
    { code: '+246', name: 'British Indian Ocean Territory', flag: 'https://flagcdn.com/w20/io.png', iso: 'IO' },
    { code: '+1284', name: 'British Virgin Islands', flag: 'https://flagcdn.com/w20/vg.png', iso: 'VG' },
    { code: '+673', name: 'Brunei', flag: 'https://flagcdn.com/w20/bn.png', iso: 'BN' },
    { code: '+359', name: 'Bulgaria', flag: 'https://flagcdn.com/w20/bg.png', iso: 'BG' },
    { code: '+226', name: 'Burkina Faso', flag: 'https://flagcdn.com/w20/bf.png', iso: 'BF' },
    { code: '+257', name: 'Burundi', flag: 'https://flagcdn.com/w20/bi.png', iso: 'BI' },
    { code: '+855', name: 'Cambodia', flag: 'https://flagcdn.com/w20/kh.png', iso: 'KH' },
    { code: '+237', name: 'Cameroon', flag: 'https://flagcdn.com/w20/cm.png', iso: 'CM' },
    { code: '+1', name: 'Canada', flag: 'https://flagcdn.com/w20/ca.png', iso: 'CA' },
    { code: '+238', name: 'Cape Verde', flag: 'https://flagcdn.com/w20/cv.png', iso: 'CV' },
    { code: '+1345', name: 'Cayman Islands', flag: 'https://flagcdn.com/w20/ky.png', iso: 'KY' },
    { code: '+236', name: 'Central African Republic', flag: 'https://flagcdn.com/w20/cf.png', iso: 'CF' },
    { code: '+235', name: 'Chad', flag: 'https://flagcdn.com/w20/td.png', iso: 'TD' },
    { code: '+56', name: 'Chile', flag: 'https://flagcdn.com/w20/cl.png', iso: 'CL' },
    { code: '+86', name: 'China', flag: 'https://flagcdn.com/w20/cn.png', iso: 'CN' },
    { code: '+61', name: 'Christmas Island', flag: 'https://flagcdn.com/w20/cx.png', iso: 'CX' },
    { code: '+61', name: 'Cocos Islands', flag: 'https://flagcdn.com/w20/cc.png', iso: 'CC' },
    { code: '+57', name: 'Colombia', flag: 'https://flagcdn.com/w20/co.png', iso: 'CO' },
    { code: '+269', name: 'Comoros', flag: 'https://flagcdn.com/w20/km.png', iso: 'KM' },
    { code: '+242', name: 'Congo', flag: 'https://flagcdn.com/w20/cg.png', iso: 'CG' },
    { code: '+243', name: 'Congo Democratic Republic', flag: 'https://flagcdn.com/w20/cd.png', iso: 'CD' },
    { code: '+682', name: 'Cook Islands', flag: 'https://flagcdn.com/w20/ck.png', iso: 'CK' },
    { code: '+506', name: 'Costa Rica', flag: 'https://flagcdn.com/w20/cr.png', iso: 'CR' },
    { code: '+225', name: 'Côte d\'Ivoire', flag: 'https://flagcdn.com/w20/ci.png', iso: 'CI' },
    { code: '+385', name: 'Croatia', flag: 'https://flagcdn.com/w20/hr.png', iso: 'HR' },
    { code: '+53', name: 'Cuba', flag: 'https://flagcdn.com/w20/cu.png', iso: 'CU' },
    { code: '+357', name: 'Cyprus', flag: 'https://flagcdn.com/w20/cy.png', iso: 'CY' },
    { code: '+420', name: 'Czech Republic', flag: 'https://flagcdn.com/w20/cz.png', iso: 'CZ' },
    { code: '+45', name: 'Denmark', flag: 'https://flagcdn.com/w20/dk.png', iso: 'DK' },
    { code: '+253', name: 'Djibouti', flag: 'https://flagcdn.com/w20/dj.png', iso: 'DJ' },
    { code: '+1767', name: 'Dominica', flag: 'https://flagcdn.com/w20/dm.png', iso: 'DM' },
    { code: '+1809', name: 'Dominican Republic', flag: 'https://flagcdn.com/w20/do.png', iso: 'DO' },
    { code: '+593', name: 'Ecuador', flag: 'https://flagcdn.com/w20/ec.png', iso: 'EC' },
    { code: '+20', name: 'Egypt', flag: 'https://flagcdn.com/w20/eg.png', iso: 'EG' },
    { code: '+503', name: 'El Salvador', flag: 'https://flagcdn.com/w20/sv.png', iso: 'SV' },
    { code: '+240', name: 'Equatorial Guinea', flag: 'https://flagcdn.com/w20/gq.png', iso: 'GQ' },
    { code: '+291', name: 'Eritrea', flag: 'https://flagcdn.com/w20/er.png', iso: 'ER' },
    { code: '+372', name: 'Estonia', flag: 'https://flagcdn.com/w20/ee.png', iso: 'EE' },
    { code: '+251', name: 'Ethiopia', flag: 'https://flagcdn.com/w20/et.png', iso: 'ET' },
    { code: '+500', name: 'Falkland Islands', flag: 'https://flagcdn.com/w20/fk.png', iso: 'FK' },
    { code: '+298', name: 'Faroe Islands', flag: 'https://flagcdn.com/w20/fo.png', iso: 'FO' },
    { code: '+679', name: 'Fiji', flag: 'https://flagcdn.com/w20/fj.png', iso: 'FJ' },
    { code: '+358', name: 'Finland', flag: 'https://flagcdn.com/w20/fi.png', iso: 'FI' },
    { code: '+33', name: 'France', flag: 'https://flagcdn.com/w20/fr.png', iso: 'FR' },
    { code: '+594', name: 'French Guiana', flag: 'https://flagcdn.com/w20/gf.png', iso: 'GF' },
    { code: '+689', name: 'French Polynesia', flag: 'https://flagcdn.com/w20/pf.png', iso: 'PF' },
    { code: '+241', name: 'Gabon', flag: 'https://flagcdn.com/w20/ga.png', iso: 'GA' },
    { code: '+220', name: 'Gambia', flag: 'https://flagcdn.com/w20/gm.png', iso: 'GM' },
    { code: '+995', name: 'Georgia', flag: 'https://flagcdn.com/w20/ge.png', iso: 'GE' },
    { code: '+49', name: 'Germany', flag: 'https://flagcdn.com/w20/de.png', iso: 'DE' },
    { code: '+233', name: 'Ghana', flag: 'https://flagcdn.com/w20/gh.png', iso: 'GH' },
    { code: '+350', name: 'Gibraltar', flag: 'https://flagcdn.com/w20/gi.png', iso: 'GI' },
    { code: '+30', name: 'Greece', flag: 'https://flagcdn.com/w20/gr.png', iso: 'GR' },
    { code: '+299', name: 'Greenland', flag: 'https://flagcdn.com/w20/gl.png', iso: 'GL' },
    { code: '+1473', name: 'Grenada', flag: 'https://flagcdn.com/w20/gd.png', iso: 'GD' },
    { code: '+590', name: 'Guadeloupe', flag: 'https://flagcdn.com/w20/gp.png', iso: 'GP' },
    { code: '+1671', name: 'Guam', flag: 'https://flagcdn.com/w20/gu.png', iso: 'GU' },
    { code: '+502', name: 'Guatemala', flag: 'https://flagcdn.com/w20/gt.png', iso: 'GT' },
    { code: '+224', name: 'Guinea', flag: 'https://flagcdn.com/w20/gn.png', iso: 'GN' },
    { code: '+245', name: 'Guinea-Bissau', flag: 'https://flagcdn.com/w20/gw.png', iso: 'GW' },
    { code: '+592', name: 'Guyana', flag: 'https://flagcdn.com/w20/gy.png', iso: 'GY' },
    { code: '+509', name: 'Haiti', flag: 'https://flagcdn.com/w20/ht.png', iso: 'HT' },
    { code: '+504', name: 'Honduras', flag: 'https://flagcdn.com/w20/hn.png', iso: 'HN' },
    { code: '+852', name: 'Hong Kong', flag: 'https://flagcdn.com/w20/hk.png', iso: 'HK' },
    { code: '+36', name: 'Hungary', flag: 'https://flagcdn.com/w20/hu.png', iso: 'HU' },
    { code: '+354', name: 'Iceland', flag: 'https://flagcdn.com/w20/is.png', iso: 'IS' },
    { code: '+91', name: 'India', flag: 'https://flagcdn.com/w20/in.png', iso: 'IN' },
    { code: '+62', name: 'Indonesia', flag: 'https://flagcdn.com/w20/id.png', iso: 'ID' },
    { code: '+98', name: 'Iran', flag: 'https://flagcdn.com/w20/ir.png', iso: 'IR' },
    { code: '+964', name: 'Iraq', flag: 'https://flagcdn.com/w20/iq.png', iso: 'IQ' },
    { code: '+353', name: 'Ireland', flag: 'https://flagcdn.com/w20/ie.png', iso: 'IE' },
    { code: '+972', name: 'Israel', flag: 'https://flagcdn.com/w20/il.png', iso: 'IL' },
    { code: '+39', name: 'Italy', flag: 'https://flagcdn.com/w20/it.png', iso: 'IT' },
    { code: '+1876', name: 'Jamaica', flag: 'https://flagcdn.com/w20/jm.png', iso: 'JM' },
    { code: '+81', name: 'Japan', flag: 'https://flagcdn.com/w20/jp.png', iso: 'JP' },
    { code: '+962', name: 'Jordan', flag: 'https://flagcdn.com/w20/jo.png', iso: 'JO' },
    { code: '+7', name: 'Kazakhstan', flag: 'https://flagcdn.com/w20/kz.png', iso: 'KZ' },
    { code: '+254', name: 'Kenya', flag: 'https://flagcdn.com/w20/ke.png', iso: 'KE' },
    { code: '+686', name: 'Kiribati', flag: 'https://flagcdn.com/w20/ki.png', iso: 'KI' },
    { code: '+850', name: 'North Korea', flag: 'https://flagcdn.com/w20/kp.png', iso: 'KP' },
    { code: '+82', name: 'South Korea', flag: 'https://flagcdn.com/w20/kr.png', iso: 'KR' },
    { code: '+965', name: 'Kuwait', flag: 'https://flagcdn.com/w20/kw.png', iso: 'KW' },
    { code: '+996', name: 'Kyrgyzstan', flag: 'https://flagcdn.com/w20/kg.png', iso: 'KG' },
    { code: '+856', name: 'Laos', flag: 'https://flagcdn.com/w20/la.png', iso: 'LA' },
    { code: '+371', name: 'Latvia', flag: 'https://flagcdn.com/w20/lv.png', iso: 'LV' },
    { code: '+961', name: 'Lebanon', flag: 'https://flagcdn.com/w20/lb.png', iso: 'LB' },
    { code: '+266', name: 'Lesotho', flag: 'https://flagcdn.com/w20/ls.png', iso: 'LS' },
    { code: '+231', name: 'Liberia', flag: 'https://flagcdn.com/w20/lr.png', iso: 'LR' },
    { code: '+218', name: 'Libya', flag: 'https://flagcdn.com/w20/ly.png', iso: 'LY' },
    { code: '+423', name: 'Liechtenstein', flag: 'https://flagcdn.com/w20/li.png', iso: 'LI' },
    { code: '+370', name: 'Lithuania', flag: 'https://flagcdn.com/w20/lt.png', iso: 'LT' },
    { code: '+352', name: 'Luxembourg', flag: 'https://flagcdn.com/w20/lu.png', iso: 'LU' },
    { code: '+853', name: 'Macau', flag: 'https://flagcdn.com/w20/mo.png', iso: 'MO' },
    { code: '+389', name: 'North Macedonia', flag: 'https://flagcdn.com/w20/mk.png', iso: 'MK' },
    { code: '+261', name: 'Madagascar', flag: 'https://flagcdn.com/w20/mg.png', iso: 'MG' },
    { code: '+265', name: 'Malawi', flag: 'https://flagcdn.com/w20/mw.png', iso: 'MW' },
    { code: '+60', name: 'Malaysia', flag: 'https://flagcdn.com/w20/my.png', iso: 'MY' },
    { code: '+960', name: 'Maldives', flag: 'https://flagcdn.com/w20/mv.png', iso: 'MV' },
    { code: '+223', name: 'Mali', flag: 'https://flagcdn.com/w20/ml.png', iso: 'ML' },
    { code: '+356', name: 'Malta', flag: 'https://flagcdn.com/w20/mt.png', iso: 'MT' },
    { code: '+692', name: 'Marshall Islands', flag: 'https://flagcdn.com/w20/mh.png', iso: 'MH' },
    { code: '+596', name: 'Martinique', flag: 'https://flagcdn.com/w20/mq.png', iso: 'MQ' },
    { code: '+222', name: 'Mauritania', flag: 'https://flagcdn.com/w20/mr.png', iso: 'MR' },
    { code: '+230', name: 'Mauritius', flag: 'https://flagcdn.com/w20/mu.png', iso: 'MU' },
    { code: '+262', name: 'Mayotte', flag: 'https://flagcdn.com/w20/yt.png', iso: 'YT' },
    { code: '+52', name: 'Mexico', flag: 'https://flagcdn.com/w20/mx.png', iso: 'MX' },
    { code: '+691', name: 'Micronesia', flag: 'https://flagcdn.com/w20/fm.png', iso: 'FM' },
    { code: '+373', name: 'Moldova', flag: 'https://flagcdn.com/w20/md.png', iso: 'MD' },
    { code: '+377', name: 'Monaco', flag: 'https://flagcdn.com/w20/mc.png', iso: 'MC' },
    { code: '+976', name: 'Mongolia', flag: 'https://flagcdn.com/w20/mn.png', iso: 'MN' },
    { code: '+1664', name: 'Montserrat', flag: 'https://flagcdn.com/w20/ms.png', iso: 'MS' },
    { code: '+212', name: 'Morocco', flag: 'https://flagcdn.com/w20/ma.png', iso: 'MA' },
    { code: '+258', name: 'Mozambique', flag: 'https://flagcdn.com/w20/mz.png', iso: 'MZ' },
    { code: '+95', name: 'Myanmar', flag: 'https://flagcdn.com/w20/mm.png', iso: 'MM' },
    { code: '+264', name: 'Namibia', flag: 'https://flagcdn.com/w20/na.png', iso: 'NA' },
    { code: '+674', name: 'Nauru', flag: 'https://flagcdn.com/w20/nr.png', iso: 'NR' },
    { code: '+977', name: 'Nepal', flag: 'https://flagcdn.com/w20/np.png', iso: 'NP' },
    { code: '+31', name: 'Netherlands', flag: 'https://flagcdn.com/w20/nl.png', iso: 'NL' },
    { code: '+599', name: 'Netherlands Antilles', flag: 'https://flagcdn.com/w20/an.png', iso: 'AN' },
    { code: '+687', name: 'New Caledonia', flag: 'https://flagcdn.com/w20/nc.png', iso: 'NC' },
    { code: '+64', name: 'New Zealand', flag: 'https://flagcdn.com/w20/nz.png', iso: 'NZ' },
    { code: '+505', name: 'Nicaragua', flag: 'https://flagcdn.com/w20/ni.png', iso: 'NI' },
    { code: '+227', name: 'Niger', flag: 'https://flagcdn.com/w20/ne.png', iso: 'NE' },
    { code: '+234', name: 'Nigeria', flag: 'https://flagcdn.com/w20/ng.png', iso: 'NG' },
    { code: '+683', name: 'Niue', flag: 'https://flagcdn.com/w20/nu.png', iso: 'NU' },
    { code: '+672', name: 'Norfolk Island', flag: 'https://flagcdn.com/w20/nf.png', iso: 'NF' },
    { code: '+1670', name: 'Northern Mariana Islands', flag: 'https://flagcdn.com/w20/mp.png', iso: 'MP' },
    { code: '+47', name: 'Norway', flag: 'https://flagcdn.com/w20/no.png', iso: 'NO' },
    { code: '+968', name: 'Oman', flag: 'https://flagcdn.com/w20/om.png', iso: 'OM' },
    { code: '+92', name: 'Pakistan', flag: 'https://flagcdn.com/w20/pk.png', iso: 'PK' },
    { code: '+680', name: 'Palau', flag: 'https://flagcdn.com/w20/pw.png', iso: 'PW' },
    { code: '+970', name: 'Palestine', flag: 'https://flagcdn.com/w20/ps.png', iso: 'PS' },
    { code: '+507', name: 'Panama', flag: 'https://flagcdn.com/w20/pa.png', iso: 'PA' },
    { code: '+675', name: 'Papua New Guinea', flag: 'https://flagcdn.com/w20/pg.png', iso: 'PG' },
    { code: '+595', name: 'Paraguay', flag: 'https://flagcdn.com/w20/py.png', iso: 'PY' },
    { code: '+51', name: 'Peru', flag: 'https://flagcdn.com/w20/pe.png', iso: 'PE' },
    { code: '+63', name: 'Philippines', flag: 'https://flagcdn.com/w20/ph.png', iso: 'PH' },
    { code: '+48', name: 'Poland', flag: 'https://flagcdn.com/w20/pl.png', iso: 'PL' },
    { code: '+351', name: 'Portugal', flag: 'https://flagcdn.com/w20/pt.png', iso: 'PT' },
    { code: '+1787', name: 'Puerto Rico', flag: 'https://flagcdn.com/w20/pr.png', iso: 'PR' },
    { code: '+974', name: 'Qatar', flag: 'https://flagcdn.com/w20/qa.png', iso: 'QA' },
    { code: '+262', name: 'Réunion', flag: 'https://flagcdn.com/w20/re.png', iso: 'RE' },
    { code: '+40', name: 'Romania', flag: 'https://flagcdn.com/w20/ro.png', iso: 'RO' },
    { code: '+7', name: 'Russia', flag: 'https://flagcdn.com/w20/ru.png', iso: 'RU' },
    { code: '+250', name: 'Rwanda', flag: 'https://flagcdn.com/w20/rw.png', iso: 'RW' },
    { code: '+290', name: 'Saint Helena', flag: 'https://flagcdn.com/w20/sh.png', iso: 'SH' },
    { code: '+1869', name: 'Saint Kitts and Nevis', flag: 'https://flagcdn.com/w20/kn.png', iso: 'KN' },
    { code: '+1758', name: 'Saint Lucia', flag: 'https://flagcdn.com/w20/lc.png', iso: 'LC' },
    { code: '+508', name: 'Saint Pierre and Miquelon', flag: 'https://flagcdn.com/w20/pm.png', iso: 'PM' },
    { code: '+1784', name: 'Saint Vincent and the Grenadines', flag: 'https://flagcdn.com/w20/vc.png', iso: 'VC' },
    { code: '+685', name: 'Samoa', flag: 'https://flagcdn.com/w20/ws.png', iso: 'WS' },
    { code: '+378', name: 'San Marino', flag: 'https://flagcdn.com/w20/sm.png', iso: 'SM' },
    { code: '+239', name: 'São Tomé and Príncipe', flag: 'https://flagcdn.com/w20/st.png', iso: 'ST' },
    { code: '+966', name: 'Saudi Arabia', flag: 'https://flagcdn.com/w20/sa.png', iso: 'SA' },
    { code: '+221', name: 'Senegal', flag: 'https://flagcdn.com/w20/sn.png', iso: 'SN' },
    { code: '+381', name: 'Serbia', flag: 'https://flagcdn.com/w20/rs.png', iso: 'RS' },
    { code: '+248', name: 'Seychelles', flag: 'https://flagcdn.com/w20/sc.png', iso: 'SC' },
    { code: '+232', name: 'Sierra Leone', flag: 'https://flagcdn.com/w20/sl.png', iso: 'SL' },
    { code: '+65', name: 'Singapore', flag: 'https://flagcdn.com/w20/sg.png', iso: 'SG' },
    { code: '+421', name: 'Slovakia', flag: 'https://flagcdn.com/w20/sk.png', iso: 'SK' },
    { code: '+386', name: 'Slovenia', flag: 'https://flagcdn.com/w20/si.png', iso: 'SI' },
    { code: '+677', name: 'Solomon Islands', flag: 'https://flagcdn.com/w20/sb.png', iso: 'SB' },
    { code: '+252', name: 'Somalia', flag: 'https://flagcdn.com/w20/so.png', iso: 'SO' },
    { code: '+27', name: 'South Africa', flag: 'https://flagcdn.com/w20/za.png', iso: 'ZA' },
    { code: '+34', name: 'Spain', flag: 'https://flagcdn.com/w20/es.png', iso: 'ES' },
    { code: '+94', name: 'Sri Lanka', flag: 'https://flagcdn.com/w20/lk.png', iso: 'LK' },
    { code: '+249', name: 'Sudan', flag: 'https://flagcdn.com/w20/sd.png', iso: 'SD' },
    { code: '+597', name: 'Suriname', flag: 'https://flagcdn.com/w20/sr.png', iso: 'SR' },
    { code: '+268', name: 'Swaziland', flag: 'https://flagcdn.com/w20/sz.png', iso: 'SZ' },
    { code: '+46', name: 'Sweden', flag: 'https://flagcdn.com/w20/se.png', iso: 'SE' },
    { code: '+41', name: 'Switzerland', flag: 'https://flagcdn.com/w20/ch.png', iso: 'CH' },
    { code: '+963', name: 'Syria', flag: 'https://flagcdn.com/w20/sy.png', iso: 'SY' },
    { code: '+886', name: 'Taiwan', flag: 'https://flagcdn.com/w20/tw.png', iso: 'TW' },
    { code: '+992', name: 'Tajikistan', flag: 'https://flagcdn.com/w20/tj.png', iso: 'TJ' },
    { code: '+255', name: 'Tanzania', flag: 'https://flagcdn.com/w20/tz.png', iso: 'TZ' },
    { code: '+66', name: 'Thailand', flag: 'https://flagcdn.com/w20/th.png', iso: 'TH' },
    { code: '+670', name: 'Timor-Leste', flag: 'https://flagcdn.com/w20/tl.png', iso: 'TL' },
    { code: '+228', name: 'Togo', flag: 'https://flagcdn.com/w20/tg.png', iso: 'TG' },
    { code: '+690', name: 'Tokelau', flag: 'https://flagcdn.com/w20/tk.png', iso: 'TK' },
    { code: '+676', name: 'Tonga', flag: 'https://flagcdn.com/w20/to.png', iso: 'TO' },
    { code: '+1868', name: 'Trinidad and Tobago', flag: 'https://flagcdn.com/w20/tt.png', iso: 'TT' },
    { code: '+216', name: 'Tunisia', flag: 'https://flagcdn.com/w20/tn.png', iso: 'TN' },
    { code: '+90', name: 'Turkey', flag: 'https://flagcdn.com/w20/tr.png', iso: 'TR' },
    { code: '+993', name: 'Turkmenistan', flag: 'https://flagcdn.com/w20/tm.png', iso: 'TM' },
    { code: '+1649', name: 'Turks and Caicos Islands', flag: 'https://flagcdn.com/w20/tc.png', iso: 'TC' },
    { code: '+688', name: 'Tuvalu', flag: 'https://flagcdn.com/w20/tv.png', iso: 'TV' },
    { code: '+256', name: 'Uganda', flag: 'https://flagcdn.com/w20/ug.png', iso: 'UG' },
    { code: '+380', name: 'Ukraine', flag: 'https://flagcdn.com/w20/ua.png', iso: 'UA' },
    { code: '+971', name: 'United Arab Emirates', flag: 'https://flagcdn.com/w20/ae.png', iso: 'AE' },
    { code: '+44', name: 'United Kingdom', flag: 'https://flagcdn.com/w20/gb.png', iso: 'GB' },
    { code: '+1', name: 'United States', flag: 'https://flagcdn.com/w20/us.png', iso: 'US' },
    { code: '+598', name: 'Uruguay', flag: 'https://flagcdn.com/w20/uy.png', iso: 'UY' },
    { code: '+998', name: 'Uzbekistan', flag: 'https://flagcdn.com/w20/uz.png', iso: 'UZ' },
    { code: '+678', name: 'Vanuatu', flag: 'https://flagcdn.com/w20/vu.png', iso: 'VU' },
    { code: '+58', name: 'Venezuela', flag: 'https://flagcdn.com/w20/ve.png', iso: 'VE' },
    { code: '+84', name: 'Vietnam', flag: 'https://flagcdn.com/w20/vn.png', iso: 'VN' },
    { code: '+1284', name: 'Virgin Islands', flag: 'https://flagcdn.com/w20/vi.png', iso: 'VI' },
    { code: '+681', name: 'Wallis and Futuna', flag: 'https://flagcdn.com/w20/wf.png', iso: 'WF' },
    { code: '+212', name: 'Western Sahara', flag: 'https://flagcdn.com/w20/eh.png', iso: 'EH' },
    { code: '+967', name: 'Yemen', flag: 'https://flagcdn.com/w20/ye.png', iso: 'YE' },
    { code: '+260', name: 'Zambia', flag: 'https://flagcdn.com/w20/zm.png', iso: 'ZM' },
    { code: '+263', name: 'Zimbabwe', flag: 'https://flagcdn.com/w20/zw.png', iso: 'ZW' }
]);

// Location data
const locations = ref([
    { value: 'Perth, Australia', label: 'Perth, Australia' },
    { value: 'Sydney, Australia', label: 'Sydney, Australia' },
    { value: 'Melbourne, Australia', label: 'Melbourne, Australia' },
    { value: 'Brisbane, Australia', label: 'Brisbane, Australia' },
    { value: 'Adelaide, Australia', label: 'Adelaide, Australia' },
    { value: 'New York, USA', label: 'New York, USA' },
    { value: 'Los Angeles, USA', label: 'Los Angeles, USA' },
    { value: 'Chicago, USA', label: 'Chicago, USA' },
    { value: 'Houston, USA', label: 'Houston, USA' },
    { value: 'Phoenix, USA', label: 'Phoenix, USA' },
    { value: 'Philadelphia, USA', label: 'Philadelphia, USA' },
    { value: 'San Antonio, USA', label: 'San Antonio, USA' },
    { value: 'San Diego, USA', label: 'San Diego, USA' },
    { value: 'Dallas, USA', label: 'Dallas, USA' },
    { value: 'San Jose, USA', label: 'San Jose, USA' },
    { value: 'London, UK', label: 'London, UK' },
    { value: 'Manchester, UK', label: 'Manchester, UK' },
    { value: 'Birmingham, UK', label: 'Birmingham, UK' },
    { value: 'Glasgow, UK', label: 'Glasgow, UK' },
    { value: 'Liverpool, UK', label: 'Liverpool, UK' },
    { value: 'Toronto, Canada', label: 'Toronto, Canada' },
    { value: 'Vancouver, Canada', label: 'Vancouver, Canada' },
    { value: 'Montreal, Canada', label: 'Montreal, Canada' },
    { value: 'Calgary, Canada', label: 'Calgary, Canada' },
    { value: 'Ottawa, Canada', label: 'Ottawa, Canada' },
    { value: 'Paris, France', label: 'Paris, France' },
    { value: 'Marseille, France', label: 'Marseille, France' },
    { value: 'Lyon, France', label: 'Lyon, France' },
    { value: 'Toulouse, France', label: 'Toulouse, France' },
    { value: 'Nice, France', label: 'Nice, France' },
    { value: 'Berlin, Germany', label: 'Berlin, Germany' },
    { value: 'Hamburg, Germany', label: 'Hamburg, Germany' },
    { value: 'Munich, Germany', label: 'Munich, Germany' },
    { value: 'Cologne, Germany', label: 'Cologne, Germany' },
    { value: 'Frankfurt, Germany', label: 'Frankfurt, Germany' },
    { value: 'Rome, Italy', label: 'Rome, Italy' },
    { value: 'Milan, Italy', label: 'Milan, Italy' },
    { value: 'Naples, Italy', label: 'Naples, Italy' },
    { value: 'Turin, Italy', label: 'Turin, Italy' },
    { value: 'Palermo, Italy', label: 'Palermo, Italy' },
    { value: 'Madrid, Spain', label: 'Madrid, Spain' },
    { value: 'Barcelona, Spain', label: 'Barcelona, Spain' },
    { value: 'Valencia, Spain', label: 'Valencia, Spain' },
    { value: 'Seville, Spain', label: 'Seville, Spain' },
    { value: 'Zaragoza, Spain', label: 'Zaragoza, Spain' },
    { value: 'Tokyo, Japan', label: 'Tokyo, Japan' },
    { value: 'Osaka, Japan', label: 'Osaka, Japan' },
    { value: 'Nagoya, Japan', label: 'Nagoya, Japan' },
    { value: 'Sapporo, Japan', label: 'Sapporo, Japan' },
    { value: 'Fukuoka, Japan', label: 'Fukuoka, Japan' },
    { value: 'Beijing, China', label: 'Beijing, China' },
    { value: 'Shanghai, China', label: 'Shanghai, China' },
    { value: 'Guangzhou, China', label: 'Guangzhou, China' },
    { value: 'Shenzhen, China', label: 'Shenzhen, China' },
    { value: 'Chengdu, China', label: 'Chengdu, China' },
    { value: 'Mumbai, India', label: 'Mumbai, India' },
    { value: 'Delhi, India', label: 'Delhi, India' },
    { value: 'Bangalore, India', label: 'Bangalore, India' },
    { value: 'Hyderabad, India', label: 'Hyderabad, India' },
    { value: 'Chennai, India', label: 'Chennai, India' },
    { value: 'São Paulo, Brazil', label: 'São Paulo, Brazil' },
    { value: 'Rio de Janeiro, Brazil', label: 'Rio de Janeiro, Brazil' },
    { value: 'Brasília, Brazil', label: 'Brasília, Brazil' },
    { value: 'Salvador, Brazil', label: 'Salvador, Brazil' },
    { value: 'Fortaleza, Brazil', label: 'Fortaleza, Brazil' },
    { value: 'Moscow, Russia', label: 'Moscow, Russia' },
    { value: 'Saint Petersburg, Russia', label: 'Saint Petersburg, Russia' },
    { value: 'Novosibirsk, Russia', label: 'Novosibirsk, Russia' },
    { value: 'Yekaterinburg, Russia', label: 'Yekaterinburg, Russia' },
    { value: 'Kazan, Russia', label: 'Kazan, Russia' },
    { value: 'Mexico City, Mexico', label: 'Mexico City, Mexico' },
    { value: 'Guadalajara, Mexico', label: 'Guadalajara, Mexico' },
    { value: 'Monterrey, Mexico', label: 'Monterrey, Mexico' },
    { value: 'Puebla, Mexico', label: 'Puebla, Mexico' },
    { value: 'Tijuana, Mexico', label: 'Tijuana, Mexico' },
    { value: 'Cairo, Egypt', label: 'Cairo, Egypt' },
    { value: 'Alexandria, Egypt', label: 'Alexandria, Egypt' },
    { value: 'Giza, Egypt', label: 'Giza, Egypt' },
    { value: 'Shubra El Kheima, Egypt', label: 'Shubra El Kheima, Egypt' },
    { value: 'Port Said, Egypt', label: 'Port Said, Egypt' },
    { value: 'Lagos, Nigeria', label: 'Lagos, Nigeria' },
    { value: 'Kano, Nigeria', label: 'Kano, Nigeria' },
    { value: 'Ibadan, Nigeria', label: 'Ibadan, Nigeria' },
    { value: 'Benin City, Nigeria', label: 'Benin City, Nigeria' },
    { value: 'Port Harcourt, Nigeria', label: 'Port Harcourt, Nigeria' },
    { value: 'Johannesburg, South Africa', label: 'Johannesburg, South Africa' },
    { value: 'Cape Town, South Africa', label: 'Cape Town, South Africa' },
    { value: 'Durban, South Africa', label: 'Durban, South Africa' },
    { value: 'Pretoria, South Africa', label: 'Pretoria, South Africa' },
    { value: 'Port Elizabeth, South Africa', label: 'Port Elizabeth, South Africa' }
]);

const selectedCountryCode = ref('+92');
const phoneNumber = ref('');
const isDropdownOpen = ref(false);
const searchQuery = ref('');

// Location selector variables
const selectedLocation = ref('Perth, Australia');
const isLocationDropdownOpen = ref(false);
const locationSearchQuery = ref('');

// Computed property for selected country
const selectedCountry = computed(() => {
    return countries.value.find(country => country.code === selectedCountryCode.value) || countries.value[0];
});

// Filtered countries based on search
const filteredCountries = computed(() => {
    if (!searchQuery.value) {
        return countries.value;
    }
    return countries.value.filter(country =>
        country.name.toLowerCase().includes(searchQuery.value.toLowerCase()) ||
        country.code.includes(searchQuery.value)
    );
});

// Filtered locations based on search
const filteredLocations = computed(() => {
    if (!locationSearchQuery.value) {
        return locations.value;
    }
    return locations.value.filter(location =>
        location.label.toLowerCase().includes(locationSearchQuery.value.toLowerCase())
    );
});

// Dropdown functions
const toggleDropdown = () => {
    isDropdownOpen.value = !isDropdownOpen.value;
};

const selectCountry = (country) => {
    selectedCountryCode.value = country.code;
    isDropdownOpen.value = false;
};

// Location dropdown functions
const toggleLocationDropdown = () => {
    isLocationDropdownOpen.value = !isLocationDropdownOpen.value;
};

const selectLocation = (location) => {
    selectedLocation.value = location.value;
    form.value.address = location.value;
    isLocationDropdownOpen.value = false;
};

// Close dropdown when clicking outside
const closeDropdown = (event) => {
    if (!event.target.closest('.country-selector')) {
        isDropdownOpen.value = false;
    }
    if (!event.target.closest('.location-selector')) {
        isLocationDropdownOpen.value = false;
    }
};

// Add event listener for clicking outside
onMounted(() => {
    document.addEventListener('click', closeDropdown);
});

onUnmounted(() => {
    document.removeEventListener('click', closeDropdown);
});

// Form data initialized from current user
const form = ref({
    name: auth.user?.name || "",
    last_name: auth.user?.last_name || "",
    number: auth.user?.number || "",
    address: auth.user?.address || "",
    image: null,
});



// Watch for changes and update form.number
watch([selectedCountryCode, phoneNumber], () => {
    form.value.number = selectedCountryCode.value + ' ' + phoneNumber.value;
});

// Handle file input
const handleImageUpload = (event) => {
    const file = event.target.files[0];
    if (file) {
        form.value.image = file;
        preview.value = URL.createObjectURL(file);
    }
};

// Trigger file input
function triggerFileInput() {
    fileInput.value?.click();
}

// Handle file change
function onFileChange(event) {
    const file = event.target.files?.[0];
    if (file) {
        const reader = new FileReader();
        reader.onloadend = () => {
            imagePreview.value = reader.result;
        };
        reader.readAsDataURL(file);

        // Also update the form data
        form.value.image = file;
        preview.value = URL.createObjectURL(file);
    }
}

// Update profile
const updateProfile = async () => {
    try {
        const formData = new FormData();
        formData.append("name", form.value.name);
        formData.append("last_name", form.value.last_name);
        formData.append("number", form.value.number);
        formData.append("address", form.value.address);

        if (form.value.image) {
            formData.append("image", form.value.image);
        }

        const { data } = await axios.post("/api/user/update", formData, {
            headers: { "Content-Type": "multipart/form-data" },
        });

        auth.user = data.user; // ✅ Update Pinia store with new user info
        alert("Profile updated successfully!");
    } catch (error) {
        console.error(error);
        alert("Failed to update profile.");
    }
};
</script>

<style scoped>
                                                                                                                                .profile-uploader-container {
                                                                                                                                    position: relative;
                                                                                                                                    display: flex;
                                                                                                                                    flex-direction: column;
                                                                                                                                    align-items: center;
                                                                                                                                    justify-content: center;
                                                                                                                                }

                                                                                                                                .outer-circle {
                                                                                                                                    width: 280px;
                                                                                                                                    height: 280px;
                                                                                                                                    border-radius: 50%;
                                                                                                                                    background-color: #F4EFE6;
                                                                                                                                    display: flex;
                                                                                                                                    align-items: center;
                                                                                                                                    justify-content: center;

                                                                                                                                }

                                                                                                                                .inner-circle {
                                                                                                                                    width: 150px;
                                                                                                                                    height: 150px;
                                                                                                                                    border-radius: 50%;
                                                                                                                                    background-color: #C4B39A;
                                                                                                                                    display: flex;
                                                                                                                                    align-items: center;
                                                                                                                                    justify-content: center;
                                                                                                                                    overflow: hidden;
                                                                                                                                }

                                                                                                                                .profile-image {
                                                                                                                                    width: 100%;
                                                                                                                                    height: 100%;
                                                                                                                                    object-fit: cover;
                                                                                                                                }

                                                                                                                                .user-icon-svg {
                                                                                                                                    width: 96px;
                                                                                                                                    height: 96px;
                                                                                                                                    color: #F4EFE6;
                                                                                                                                }

                                                                                                                                .upload-button {

                                                                                                                                    position: absolute;
                                                                                                                                    bottom: 0px;
                                                                                                                                    display: flex;
                                                                                                                                    align-items: center;
                                                                                                                                    justify-content: center;
                                                                                                                                    gap: 8px;
                                                                                                                                    padding: 10px 14px;

                                                                                                                                    background-color: #C1B39D;
                                                                                                                                    color: #695D51;
                                                                                                                                    border: 3px solid white;
                                                                                                                                    border-radius: 8px;

                                                                                                                                    cursor: pointer;
                                                                                                                                    transition: all 0.3s ease;
                                                                                                                                    transform: scale(1);
                                                                                                                                }

                                                                                                                                .upload-button:hover {
                                                                                                                                    background-color: #C1B39D;
                                                                                                                                    transform: scale(1.05);
                                                                                                                                }

                                                                                                                                .camera-icon {
                                                                                                                                    width: 20px;
                                                                                                                                    height: 20px;
                                                                                                                                }

                                                                                                                                .upload-text {
                                                                                                                                    font-family: 'Cormorant Garamond', serif;
                                                                                                                                    font-size: 16px;
                                                                                                                                    color: #5B4C3A;
                                                                                                                                    font-weight: 400;
                                                                                                                                }

                                                                                                                                .hidden-input {
                                                                                                                                    display: none;
                                                                                                                                }

                                                                                                                                /* Phone Input Container Styles */
                                                                                                                                .phone-input-container {
                                                                                                                                    display: flex;
                                                                                                                                    border: 1px solid #D4C6B5;
                                                                                                                                    border-radius: 8px;
                                                                                                                                    background-color: white;
                                                                                                                                    overflow: hidden;
                                                                                                                                }

                                                                                                                                .country-selector {
                                                                                                                                    display: flex;
                                                                                                                                    align-items: center;
                                                                                                                                    background-color: #F4EFE6;
                                                                                                                                    border-right: 1px solid #D4C6B5;
                                                                                                                                    padding: 0 12px;
                                                                                                                                    min-width: 120px;
                                                                                                                                    position: relative;
                                                                                                                                    cursor: pointer;
                                                                                                                                    user-select: none;
                                                                                                                                }

                                                                                                                                .country-flag {
                                                                                                                                    width: 20px;
                                                                                                                                    height: 15px;
                                                                                                                                    margin-right: 8px;
                                                                                                                                    border-radius: 2px;
                                                                                                                                }

                                                                                                                                .country-code {
                                                                                                                                    color: #5B4C3A;
                                                                                                                                    font-size: 14px;
                                                                                                                                    font-weight: 500;
                                                                                                                                    margin-right: 8px;
                                                                                                                                }

                                                                                                                                .dropdown-arrow {
                                                                                                                                    width: 16px;
                                                                                                                                    height: 16px;
                                                                                                                                    color: #5B4C3A;
                                                                                                                                    transition: transform 0.3s ease;
                                                                                                                                }

                                                                                                                                .dropdown-arrow.rotated {
                                                                                                                                    transform: rotate(180deg);
                                                                                                                                }

                                                                                                                                .country-dropdown {
                                                                                                                                    position: absolute;
                                                                                                                                    top: 100%;
                                                                                                                                    left: 0;
                                                                                                                                    right: 0;
                                                                                                                                    background: white;
                                                                                                                                    border: 1px solid #D4C6B5;
                                                                                                                                    border-radius: 8px;
                                                                                                                                    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
                                                                                                                                    max-height: 300px;
                                                                                                                                    overflow: hidden;
                                                                                                                                    z-index: 1000;
                                                                                                                                    min-width: 300px;
                                                                                                                                }

                                                                                                                                .search-container {
                                                                                                                                    padding: 8px;
                                                                                                                                    border-bottom: 1px solid #D4C6B5;
                                                                                                                                    background-color: #F4EFE6;
                                                                                                                                }

                                                                                                                                .search-input {
                                                                                                                                    width: 100%;
                                                                                                                                    padding: 8px 12px;
                                                                                                                                    border: 1px solid #D4C6B5;
                                                                                                                                    border-radius: 6px;
                                                                                                                                    font-size: 14px;
                                                                                                                                    color: #5B4C3A;
                                                                                                                                    background: white;
                                                                                                                                    outline: none;
                                                                                                                                }

                                                                                                                                .search-input:focus {
                                                                                                                                    border-color: #C1B39D;
                                                                                                                                    box-shadow: 0 0 0 2px rgba(193, 179, 157, 0.2);
                                                                                                                                }

                                                                                                                                .search-input::placeholder {
                                                                                                                                    color: #B9A997;
                                                                                                                                }

                                                                                                                                .countries-list {
                                                                                                                                    max-height: 240px;
                                                                                                                                    overflow-y: auto;
                                                                                                                                }

                                                                                                                                .country-option {
                                                                                                                                    display: flex;
                                                                                                                                    align-items: center;
                                                                                                                                    padding: 10px 12px;
                                                                                                                                    cursor: pointer;
                                                                                                                                    transition: background-color 0.2s ease;
                                                                                                                                    border-bottom: 1px solid #F4EFE6;
                                                                                                                                }

                                                                                                                                .country-option:last-child {
                                                                                                                                    border-bottom: none;
                                                                                                                                }

                                                                                                                                .country-option:hover {
                                                                                                                                    background-color: #F4EFE6;
                                                                                                                                }

                                                                                                                                .country-option.selected {
                                                                                                                                    background-color: #C1B39D;
                                                                                                                                    color: white;
                                                                                                                                }

                                                                                                                                .option-flag {
                                                                                                                                    width: 20px;
                                                                                                                                    height: 15px;
                                                                                                                                    margin-right: 10px;
                                                                                                                                    border-radius: 2px;
                                                                                                                                    flex-shrink: 0;
                                                                                                                                }

                                                                                                                                .option-code {
                                                                                                                                    font-size: 14px;
                                                                                                                                    font-weight: 600;
                                                                                                                                    margin-right: 10px;
                                                                                                                                    min-width: 50px;
                                                                                                                                    flex-shrink: 0;
                                                                                                                                }

                                                                                                                                .option-name {
                                                                                                                                    font-size: 14px;
                                                                                                                                    color: #5B4C3A;
                                                                                                                                    flex: 1;
                                                                                                                                    overflow: hidden;
                                                                                                                                    text-overflow: ellipsis;
                                                                                                                                    white-space: nowrap;
                                                                                                                                }

                                                                                                                                .country-option.selected .option-name {
                                                                                                                                    color: white;
                                                                                                                                }

                                                                                                                                .no-results {
                                                                                                                                    padding: 20px;
                                                                                                                                    text-align: center;
                                                                                                                                    color: #B9A997;
                                                                                                                                    font-style: italic;
                                                                                                                                }

                                                                                                                                .phone-number-input {
                                                                                                                                    flex: 1;
                                                                                                                                    border: none;
                                                                                                                                    padding: 12px 16px;
                                                                                                                                    background: transparent;
                                                                                                                                    color: #5B4C3A;
                                                                                                                                    font-size: 16px;
                                                                                                                                    outline: none;
                                                                                                                                }

                                                                                                                                .phone-number-input::placeholder {
                                                                                                                                    color: #B9A997;
                                                                                                                                }

                                                                                                                                .phone-input-container:focus-within {
                                                                                                                                    border-color: #C1B39D;
                                                                                                                                    box-shadow: 0 0 0 0.2rem rgba(193, 179, 157, 0.25);
                                                                                                                                }

                                                                                                                                /* Location Input Container Styles */
                                                                                                                                .location-input-container {
                                                                                                                                    display: flex;
                                                                                                                                    border: 1px solid #D4C6B5;
                                                                                                                                    border-radius: 8px;
                                                                                                                                    background-color: white;
                                                                                                                                    overflow: hidden;
                                                                                                                                }

                                                                                                                                .location-selector {
                                                                                                                                    display: flex;
                                                                                                                                    align-items: center;
                                                                                                                                    background-color: white;
                                                                                                                                    padding: 12px 16px;
                                                                                                                                    width: 100%;
                                                                                                                                    position: relative;
                                                                                                                                    cursor: pointer;
                                                                                                                                    user-select: none;
                                                                                                                                }

                                                                                                                                .location-icon {
                                                                                                                                    width: 16px;
                                                                                                                                    height: 16px;
                                                                                                                                    margin-right: 12px;
                                                                                                                                    color: #737373;
                                                                                                                                    flex-shrink: 0;
                                                                                                                                }

                                                                                                                                .location-text {
                                                                                                                                    color: #737373;
                                                                                                                                    font-size: 16px;
                                                                                                                                    font-weight: 400;
                                                                                                                                    flex: 1;
                                                                                                                                    text-align: left;
                                                                                                                                }

                                                                                                                                .location-dropdown {
                                                                                                                                    position: absolute;
                                                                                                                                    top: 100%;
                                                                                                                                    left: 0;
                                                                                                                                    right: 0;
                                                                                                                                    background: white;
                                                                                                                                    border: 1px solid #D4C6B5;
                                                                                                                                    border-radius: 8px;
                                                                                                                                    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
                                                                                                                                    max-height: 300px;
                                                                                                                                    overflow: hidden;
                                                                                                                                    z-index: 1000;
                                                                                                                                    min-width: 100%;
                                                                                                                                }

                                                                                                                                .locations-list {
                                                                                                                                    max-height: 240px;
                                                                                                                                    overflow-y: auto;
                                                                                                                                }

                                                                                                                                .location-option {
                                                                                                                                    display: flex;
                                                                                                                                    align-items: center;
                                                                                                                                    padding: 12px 16px;
                                                                                                                                    cursor: pointer;
                                                                                                                                    transition: background-color 0.2s ease;
                                                                                                                                    border-bottom: 1px solid #F4EFE6;
                                                                                                                                }

                                                                                                                                .location-option:last-child {
                                                                                                                                    border-bottom: none;
                                                                                                                                }

                                                                                                                                .location-option:hover {
                                                                                                                                    background-color: #F4EFE6;
                                                                                                                                }

                                                                                                                                .location-option.selected {
                                                                                                                                    background-color: #C1B39D;
                                                                                                                                    color: white;
                                                                                                                                }

                                                                                                                                .option-location-icon {
                                                                                                                                    width: 16px;
                                                                                                                                    height: 16px;
                                                                                                                                    margin-right: 12px;
                                                                                                                                    color: #737373;
                                                                                                                                    flex-shrink: 0;
                                                                                                                                }

                                                                                                                                .location-option.selected .option-location-icon {
                                                                                                                                    color: white;
                                                                                                                                }

                                                                                                                                .location-option .option-name {
                                                                                                                                    font-size: 16px;
                                                                                                                                    color: #737373;
                                                                                                                                    flex: 1;
                                                                                                                                    overflow: hidden;
                                                                                                                                    text-overflow: ellipsis;
                                                                                                                                    white-space: nowrap;
                                                                                                                                }

                                                                                                                                .location-option.selected .option-name {
                                                                                                                                    color: white;
                                                                                                                                }

                                                                                                                                .location-input-container:focus-within {
                                                                                                                                    border-color: #C1B39D;
                                                                                                                                    box-shadow: 0 0 0 0.2rem rgba(193, 179, 157, 0.25);
                                                                                                                                }

                                                                                                                                /* Save And Update Button Styles */
                                                                                                                                .save-update-btn {
                                                                                                                                    background-color: #C1B39D;
                                                                                                                                    color: #4F3C1E;
                                                                                                                                    border: none;
                                                                                                                                    border-radius: 8px;
                                                                                                                                    padding: 12px 24px;
                                                                                                                                    font-family: 'Cormorant Garamond', serif;
                                                                                                                                    font-size: 16px;
                                                                                                                                    font-weight: 500;
                                                                                                                                    text-transform: capitalize;
                                                                                                                                    cursor: pointer;
                                                                                                                                    transition: all 0.3s ease;
                                                                                                                                    box-shadow: none;
                                                                                                                                }

                                                                                                                                .save-update-btn:hover {
                                                                                                                                    background-color: #B8A892;
                                                                                                                                    color: #737373;
                                                                                                                                    transform: translateY(-1px);
                                                                                                                                    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
                                                                                                                                }

                                                                                                                                .save-update-btn:active {
                                                                                                                                    transform: translateY(0);
                                                                                                                                    box-shadow: 0 1px 4px rgba(0, 0, 0, 0.1);
                                                                                                                                }

                                                                                                                                .save-update-btn:focus {
                                                                                                                                    outline: none;
                                                                                                                                    box-shadow: 0 0 0 3px rgba(193, 179, 157, 0.3);
                                                                                                                                }

                                                                                                                                /* Mobile Responsive Styles */
                                                                                                                                @media (max-width: 768px) {
                                                                                                                                    .container {
                                                                                                                                        padding: 1rem !important;
                                                                                                                                    }

                                                                                                                                    .user-profile-card {
                                                                                                                                        max-width: 100% !important;
                                                                                                                                        margin: 0 !important;
                                                                                                                                        padding: 1.5rem !important;
                                                                                                                                    }

                                                                                                                                    .row.g-4 {
                                                                                                                                        --bs-gutter-x: 1rem;
                                                                                                                                        --bs-gutter-y: 1rem;
                                                                                                                                    }

                                                                                                                                    .row.g-3 {
                                                                                                                                        --bs-gutter-x: 0.75rem;
                                                                                                                                        --bs-gutter-y: 0.75rem;
                                                                                                                                    }

                                                                                                                                    /* Profile Image Section */
                                                                                                                                    .col-md-4 {
                                                                                                                                        margin-top: 2rem;
                                                                                                                                    }

                                                                                                                                    .outer-circle {
                                                                                                                                        width: 200px !important;
                                                                                                                                        height: 200px !important;
                                                                                                                                    }

                                                                                                                                    .inner-circle {
                                                                                                                                        width: 120px !important;
                                                                                                                                        height: 120px !important;
                                                                                                                                    }

                                                                                                                                    .user-icon-svg {
                                                                                                                                        width: 72px !important;
                                                                                                                                        height: 72px !important;
                                                                                                                                    }

                                                                                                                                    .upload-button {
                                                                                                                                        padding: 8px 12px !important;
                                                                                                                                        font-size: 14px !important;
                                                                                                                                    }

                                                                                                                                    .camera-icon {
                                                                                                                                        width: 16px !important;
                                                                                                                                        height: 16px !important;
                                                                                                                                    }

                                                                                                                                    /* Form Inputs */
                                                                                                                                    .form-control {
                                                                                                                                        font-size: 16px !important;
                                                                                                                                        /* Prevents zoom on iOS */
                                                                                                                                    }

                                                                                                                                    /* Phone Input */
                                                                                                                                    .phone-input-container {
                                                                                                                                        flex-direction: column;
                                                                                                                                    }

                                                                                                                                    .country-selector {
                                                                                                                                        min-width: 100% !important;
                                                                                                                                        border-right: none !important;
                                                                                                                                        border-bottom: 1px solid #D4C6B5;
                                                                                                                                        padding: 12px !important;
                                                                                                                                    }

                                                                                                                                    .phone-number-input {
                                                                                                                                        padding: 12px 16px !important;
                                                                                                                                    }

                                                                                                                                    .country-dropdown {
                                                                                                                                        min-width: 100% !important;
                                                                                                                                        left: 0 !important;
                                                                                                                                        right: 0 !important;
                                                                                                                                    }

                                                                                                                                    /* Location Input */
                                                                                                                                    .location-dropdown {
                                                                                                                                        min-width: 100% !important;
                                                                                                                                        left: 0 !important;
                                                                                                                                        right: 0 !important;
                                                                                                                                    }

                                                                                                                                    /* Button */
                                                                                                                                    .save-update-btn {
                                                                                                                                        width: 100% !important;
                                                                                                                                        padding: 14px 24px !important;
                                                                                                                                        font-size: 16px !important;
                                                                                                                                    }

                                                                                                                                    /* Typography */
                                                                                                                                    h5 {
                                                                                                                                        font-size: 20px !important;
                                                                                                                                        text-align: center;
                                                                                                                                    }

                                                                                                                                    .form-label {
                                                                                                                                        font-size: 14px !important;
                                                                                                                                    }

                                                                                                                                    /* Dropdown Lists */
                                                                                                                                    .countries-list,
                                                                                                                                    .locations-list {
                                                                                                                                        max-height: 200px !important;
                                                                                                                                    }

                                                                                                                                    .country-option,
                                                                                                                                    .location-option {
                                                                                                                                        padding: 12px 16px !important;
                                                                                                                                    }

                                                                                                                                    .option-name {
                                                                                                                                        font-size: 14px !important;
                                                                                                                                    }

                                                                                                                                    .option-code {
                                                                                                                                        font-size: 13px !important;
                                                                                                                                    }
                                                                                                                                }

                                                                                                                                @media (max-width: 576px) {
                                                                                                                                    .container {
                                                                                                                                        padding: 0.5rem !important;
                                                                                                                                    }

                                                                                                                                    .user-profile-card {
                                                                                                                                        padding: 1rem !important;
                                                                                                                                        border-radius: 12px !important;
                                                                                                                                    }

                                                                                                                                    .outer-circle {
                                                                                                                                        width: 160px !important;
                                                                                                                                        height: 160px !important;
                                                                                                                                    }

                                                                                                                                    .inner-circle {
                                                                                                                                        width: 100px !important;
                                                                                                                                        height: 100px !important;
                                                                                                                                    }

                                                                                                                                    .user-icon-svg {
                                                                                                                                        width: 60px !important;
                                                                                                                                        height: 60px !important;
                                                                                                                                    }

                                                                                                                                    .upload-button {
                                                                                                                                        padding: 6px 10px !important;
                                                                                                                                        font-size: 13px !important;
                                                                                                                                    }

                                                                                                                                    .upload-text {
                                                                                                                                        font-size: 14px !important;
                                                                                                                                    }

                                                                                                                                    h5 {
                                                                                                                                        font-size: 18px !important;
                                                                                                                                    }

                                                                                                                                    .form-label {
                                                                                                                                        font-size: 13px !important;
                                                                                                                                    }

                                                                                                                                    .form-control {
                                                                                                                                        font-size: 15px !important;
                                                                                                                                        padding: 10px 12px !important;
                                                                                                                                    }

                                                                                                                                    .save-update-btn {
                                                                                                                                        padding: 12px 20px !important;
                                                                                                                                        font-size: 15px !important;
                                                                                                                                    }

                                                                                                                                    .country-selector,
                                                                                                                                    .location-selector {
                                                                                                                                        padding: 10px 12px !important;
                                                                                                                                    }

                                                                                                                                    .phone-number-input {
                                                                                                                                        padding: 10px 12px !important;
                                                                                                                                    }

                                                                                                                                    .location-text {
                                                                                                                                        font-size: 15px !important;
                                                                                                                                    }

                                                                                                                                    .country-code {
                                                                                                                                        font-size: 13px !important;
                                                                                                                                    }

                                                                                                                                    .search-input {
                                                                                                                                        font-size: 13px !important;
                                                                                                                                        padding: 6px 10px !important;
                                                                                                                                    }
                                                                                                                                }
</style>
