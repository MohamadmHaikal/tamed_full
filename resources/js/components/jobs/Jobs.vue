<template>

    <div>
        <div class="about-area pb-70">
            <div v-if="ads.length > 0" class="containp container">
                <div class="mt-2 job-filter">
                    <div class="col-12 mt-3 text-center">
                        <div class="row mt-4">
                            <div class="col-md-5">
                                <select name="date" id="date">
                                    <option value="volvo">تاريخ</option>
                                    <option value="saab">Saab</option>
                                    <option value="mercedes">Mercedes</option>
                                    <option value="audi">Audi</option>
                                </select>
                                <select class="city" name="city" id="city">
                                    <option value="volvo">المدينة</option>
                                    <option value="saab">Saab</option>
                                    <option value="mercedes">Mercedes</option>
                                    <option value="audi">Audi</option>
                                </select>
                                <select class="type" name="type" id="type">
                                    <option value="volvo">المهنة</option>
                                    <option value="saab">Saab</option>
                                    <option value="mercedes">Mercedes</option>
                                    <option value="audi">Audi</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <div class="mt-2">
                                    <div class="row align-items-center">
                                        <div class="col-md-1 col-1">
                                            <i class="fa fa-info-circle"></i>
                                        </div>
                                        <div class="col-md-11 col-11">
                                            <p>
                                                عزيزي الباحث عن وظيفة
                                                <span>لا داعي لارفاق سيرتك
                                                    الذاتية
                                                </span>
                                                عند التقديم إلى اي وظيفة
                                                <span>يمكنك ارفاق سيرتك
                                                    الذاتية مرة واحده في ملفك
                                                    الشخصي او تعديلها من هناك
                                                </span>
                                                وبعدها إذا احببت التقدم إلى اي
                                                وظيفة ما عليك سوى الضغط على ارسل سيرتك الذاتيةإلى المعلن وسيتم مشاركة
                                                السيرة الذاتية بشكل مباشر إلى المعلن
                                                <span> او
                                                    يمكنك ارسال سيرة ذاتية اخرى عند الارسال فقط قم بارفاقها وقم
                                                    بالارسال
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-5 mt-3 job-card text-center">
                        <div v-for="ad in ads" class="card" @click="openAds($event, ad)">
                            <div class="card-horizontal">
                                <div class="card-body">
                                    <div class="first-section">
                                        <div class="row text-end">
                                            <div class="col-md-9 col-9">
                                                <div class="row text-end">
                                                    <div class=" col-md-12 col-sm-12 mt-3 mb-3 job-card-header">
                                                        <span class="view">
                                                            {{ ad.seenCount }}
                                                            <i class="far fa-eye"></i>
                                                        </span>
                                                        <span class="first-dot"></span>
                                                        <i class="fas fa-map-marker-alt"></i>
                                                        <span class="address"> المدينة:
                                                            <span>{{ ad.city }} </span>
                                                        </span>
                                                        <span class="sec-dot"></span>
                                                        <span class="d-line">
                                                            اخر موعد للتقديم
                                                            <i class="far fa-calendar-alt"></i>
                                                            {{ ad.deadline }}
                                                        </span>
                                                    </div>
                                                </div>
                                                <a href="javascript:void(0);" class="job-title">
                                                    <span>
                                                        {{ ad.title }}
                                                    </span>
                                                </a>
                                                <div class="row align-items-center">
                                                    <div class="col-md-6 col-6">
                                                        <p class="mt-2 job-activity">
                                                            نشاط
                                                            المنشآة:
                                                            <span>
                                                                {{ ad.activity }}
                                                            </span>
                                                        </p>
                                                    </div>
                                                    <div class="col-md-6 col-6" style="padding-bottom: 5px;">
                                                        <a href="javascript:void(0);" class="salary">
                                                            <span class="text">الراتب </span>
                                                            <span class="number">{{ ad.salary }} ريال</span>
                                                        </a>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-md-3  col-3 job-sq">
                                                <p class="status">
                                                    جديد
                                                </p>
                                                <i class="far fa-heart"></i>
                                                <p class="title">
                                                    عاملين
                                                </p>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <p class="ref-n">
                                                            الرقم المرجعي:
                                                            <span>{{ ad.reference_number }}</span>
                                                        </p>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="second-section">
                                        <div class="row text-end mt-4">
                                            <!-- <div class="col-md-4 col-4">
                                                <a href="javascript:void(0);" class="salary">
                                                    <span class="text">الراتب </span>
                                                    <span class="number"> {{ad.salary}} ريال</span>

                                                </a>
                                            </div> -->
                                            <div class="col-md-3 col-3">
                                                <a href="javascript:void(0);" class="contract-type">
                                                    {{ ad.infoArray['work_hours'] }}
                                                </a>
                                            </div>
                                            <div v-if="ad['employment_on_warranty'] != ''" class="col-md-3 col-3">
                                                <a href="javascript:void(0);" class="transp-w">{{
                                                        ad['employment_on_warranty']
                                                }}

                                                </a>
                                            </div>
                                            <div v-if="ad['employment_rent_contract'] != ''" class="col-md-3 col-3">
                                                <a href="javascript:void(0);" class="transp-rent">{{
                                                        ad['employment_rent_contract']
                                                }}

                                                </a>
                                            </div>
                                            <div v-if="ad['residintal'] != ''" class="col-md-3 col-3">
                                                <a href="javascript:void(0);" class="residintal">{{
                                                        ad['residintal']
                                                }}

                                                </a>
                                            </div>
                                        </div>
                                        <p class="description">
                                            {{ ad.BriefDescription }}
                                        </p>
                                        <p class="since">
                                            {{ ad.from_date }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="spaceUnderAds"></div>

                    </div>
                    <div class="col-md-6 mt-3 text-center" id="details-side">

                        <div class="card details-job"
                            style="border-radius: 14px; margin-bottom: 20px; box-shadow: rgb(236, 233, 233) 1px 1px 5px 2px;    position: sticky;top: 105px;">
                            <div class="card-horizontal" style="display: flex; flex: 1 1 auto; border-radius: 13px;">
                                <div class="card-body"
                                    style="border-radius: 13px; padding-right: 0px; padding-left: 0px; padding-top: 0px;">
                                    <div
                                        style="border-bottom: 1px solid rgb(216, 216, 216); padding-left: 1rem; padding-right: 1rem;">
                                        <div class="row text-end">
                                            <div class="col-md-8">
                                                <div class="row text-end">
                                                    <div class="col-md-12 col-sm-12 mt-3 mb-3"><span
                                                            style="font-size:12px;color:#03a8c5;font-weight:500;">{{
                                                                    ads['0']['seenCount']
                                                            }}
                                                            <i class="far fa-eye"
                                                                style="color:#b9b9b9;font-size:15px;margin-right:10px;"></i></span><i
                                                            class="fas fa-map-marker-alt"
                                                            style="color:#777777;font-size:15px;margin-right:25px;"></i><span
                                                            style="margin-right:6px;font-size:12px;"> المدينة: <span
                                                                style="color:#00b0ac;font-weight:500;">{{
                                                                        ads['0']['city']
                                                                }}
                                                            </span></span><i class="far fa-heart"
                                                            style="font-size:15px;margin-right:20px;"></i><span
                                                            style="margin-right:6px;margin-bottom:2px;font-size:12px;">المفضلة</span>
                                                        <svg version="1.1" id="Layer_1"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                            viewBox="0 0 512 512" xml:space="preserve"
                                                            style="width: 15px; margin-right: 20px;">
                                                            <g>
                                                                <polygon
                                                                    points="334.9,120.6 256,41.7 177.1,120.6 156.3,99.7 256,0 355.7,99.7 	">
                                                                </polygon>
                                                                <rect x="241.1" y="20.8" width="29.8" height="312.6">
                                                                </rect>
                                                                <path
                                                                    d="M404.8,512H107.2c-25.3,0-44.7-19.4-44.7-44.7V199.4c0-25.3,19.3-44.7,44.7-44.7h104.2v29.8H107.2c-8.9,0-14.9,6-14.9,14.9v267.9c0,8.9,6,14.9,14.9,14.9h297.7c8.9,0,14.9-6,14.9-14.9V199.4c0-8.9-6-14.9-14.9-14.9H300.7v-29.8h104.2c25.3,0,44.7,19.3,44.7,44.7v267.9C449.5,492.6,430.1,512,404.8,512z">
                                                                </path>
                                                            </g>
                                                        </svg>
                                                        <span
                                                            style="margin-right: 6px; margin-bottom: 2px; font-size: 12px;">المشاركة</span>
                                                    </div>
                                                </div><a href="javascript:void(0);" class=""
                                                    style="padding-top: 21px;"><span
                                                        style="color: rgb(1, 154, 162); font-size: 18px;">{{
                                                                ads['0']['title']
                                                        }}</span></a>
                                                <div class="row align-items-center">
                                                    <div class="col-md-6">
                                                        <p class="mt-2"
                                                            style="color: rgb(87, 83, 77); padding-bottom: 10px;">
                                                            نشاط المنشآة: <span
                                                                style="color: rgb(0, 0, 0); font-weight: 400;">{{
                                                                        ads['0']['activity']
                                                                }}</span></p>
                                                    </div>
                                                    <div class="col-md-6" style="padding-bottom: 5px;">
                                                        <a href="javascript:void(0);" class="author-deals"
                                                            style="font-size: 13px;padding:0px 18px 0px 18px;"><span
                                                                style="color:rgb(1, 154, 162);">الراتب </span><span
                                                                style="color:#dc961c;    font-weight: 700;">{{
                                                                        ads['0']['salary']
                                                                }} ريال </span></a>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-md-4"><a href="javascript:void(0);" @click="openModal"
                                                    class="btn btn-logo"
                                                    style="border-radius: 8px; background-color: rgb(3, 156, 164); width: 95%; color: white; font-size: 90%; margin-top: 25px; padding: 10px 23px;"><i
                                                        class="fa fa-paper-plane"></i>ارسل
                                                    السيرة الذاتية</a>
                                                <p
                                                    style="color: rgb(3, 156, 165); font-size: 10px; position: absolute; top: 95px; font-weight: 700; left: 60px;">
                                                    الرقم المرجعي: <span style="color: rgb(0, 0, 0);">{{
                                                            ads['0']['reference_number']
                                                    }}</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="padding-left:0.6rem;padding-right:0.6rem;">
                                        <div class="row text-end" style="border-bottom:1px solid #d8d8d8;">
                                            <div class="col-md-4 mt-2" style="text-align:center;padding-bottom:10px;">
                                                <p class=""
                                                    style="color:rgb(1, 154, 162);font-size:12px;margin-bottom:3px;font-weight:500;padding-left:45px;">
                                                    اخر موعد للتقديم </p><i class="far fa-calendar-alt"
                                                    style="color:rgb(55, 211, 55);"></i><span class="date-icon">{{
                                                            ads['0']['deadline']
                                                    }}</span><span class="time-icon"><i class="far fa-clock"
                                                        style="color:rgb(55, 211, 55);"></i>
                                                    12:00</span>
                                            </div>
                                            <div class="col-md-8 mt-4" style=" text-align:center;padding-left:25px;"><a
                                                    href="javascript:void(0);" class="author-deals"
                                                    style="color:#000;font-size:11px;padding:5px 14px 5px 14px;margin-right:10px;">
                                                    {{ ads['0']['infoArray']['work_hours'] }}&nbsp;
                                                </a>
                                                <a v-if="ads['0']['employment_on_warranty'] != ''"
                                                    href="javascript:void(0);" class="author-deals"
                                                    style="font-size:11px;padding:5px 15px 5px 15px;color:#7ace5e;margin-right:10px;">{{
                                                            ads['0']['employment_on_warranty']
                                                    }}
                                                </a>
                                                <a v-if="ads['0']['employment_rent_contract'] != ''"
                                                    href="javascript:void(0);" class="author-deals"
                                                    style="font-size:11px;padding:5px 15px 5px 15px;color:#000;margin-right:10px;">{{
                                                            ads['0']['employment_rent_contract']
                                                    }}
                                                </a>
                                                <a v-if="ads['0']['residintal'] != ''" href="javascript:void(0);"
                                                    class="author-deals"
                                                    style="font-size:11px;padding:5px 15px 5px 15px;color:#7ace5e;margin-right:10px;">{{
                                                            ads['0']['residintal']
                                                    }}
                                                </a>

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12"
                                                style="padding-bottom:40px;border-bottom:1px solid #d8d8d8;">
                                                <h2
                                                    style="text-align:right;font-size:18px;font-weight:600;margin-right:15px;margin-top:25px;">
                                                    الوصف الوظيفي الكامل</h2>
                                                <p v-html="ads['0']['description']"
                                                    style="margin-top:20px;font-size:12px;text-align:right;padding-right:2px;margin-right:15px;">

                                                </p>
                                            </div>
                                            <div class="col-md-7 mt-3 text-end"
                                                style="padding: 8px 6px 8px 6px;background-color:rgb(240, 246, 242);border-radius: 20px;width:51%;margin-right:15px;">
                                                <span>
                                                    <p style="font-weight:400;font-size: 12px;color:rgb(0, 0, 0);"> في
                                                        حال واجهتك اي مشاكل لا تتردد بالإبلاغ عن الوظيفة<i
                                                            class="fas fa-info-circle"
                                                            style="color:rgb(62, 147, 142);padding-right:5px;font-size:18px;"></i>
                                                    </p>
                                                </span>
                                            </div>
                                            <div class="col-md-5 mt-3" style="padding-right:100px;"><a href="/login"
                                                    class="btn btn-project-search"
                                                    style="border-radius:20px;background-color:#f0f6f2;padding: 8px 10px 8px 10px;font-size: 13px;color:#039ca5;">تقديم
                                                    بلاغ على الاعلان</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div id="myModal" class="job-modal" :data-id="ads['0']['id']">
                    <div class="job-modal-content">
                        <span class="close" @click="closeModal">
                            <span>Cancel</span>
                            &times;
                        </span>
                        <div class="row">
                            <div class="col-md-4 mt-2">
                                <div class="green-btn">
                                    <a @click="send('old-cv')" href="javascript:void(0);" class="btn btn-logo">
                                        <i class="fa fa-paper-plane">
                                        </i>
                                        ارسل
                                        سيرتي الذاتية المرفقة ب ملفي الشخصي
                                    </a>
                                </div>
                                <div class="mt-3 custom-cv">
                                    <img src="../../assets/images/projectB.png" />
                                    <span>
                                        <a href="javascript:void(0);" @click="chooseFiles" class="author-deals">
                                            ارفاق
                                            سيرة ذاتية مخصصة
                                        </a>
                                        <input type="file" class="cv" name="cv" id="cv-file" style="display:none;">
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-8 note-area">
                                <small>
                                    وصف
                                    إضافي
                                    <span>
                                        (إختياري)
                                    </span>
                                </small>
                                <div class="content">
                                    <textarea name="" id="note" cols="38" class="mt-3" rows="4"></textarea>
                                    <a href="javascript:void(0);" @click="send('with-cv')" class="btn btn-logo">
                                        <i class="fa fa-paper-plane"></i>
                                        ارسل سيرتي الذاتية المخصصة
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div id="job-mobile-details" class="job-details-modal">

                </div>
                <div class="col-lg-12 col-md-12 mt-5 mb-5">
                    <div class="pagination-area">
                        <a href="/jobs?page=1" class="prev page-numbers">
                            <i class="fas fa-angle-double-left"></i>
                        </a>
                        <a v-for="i in last_page" :key="i" :href="'/jobs?page=' + i"
                            v-bind:class="[currentPage == i ? 'page-numbers current' : 'page-numbers']">{{ i }}</a>
                        <a :href="'/jobs?page=' + last_page" class="next page-numbers">
                            <i class="fas fa-angle-double-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div v-else class="containp container no-job">
                <img src="../../assets/images/jobtameed.png" alt="" width="662.5" height="662.5">
                <br>
                <a href="/login" class="btn">سجل الآن</a>
            </div>
        </div>
    </div>


</template>
<script>
import axios from 'axios';
import { useRoute } from "vue-router";
import { ref } from 'vue'
const loadUserData = async () => {
    var page = useRoute().query.page;

    if (page == null) { page = 1; }
    return new Promise((resolve) => {
        setTimeout(() => {
            resolve(axios.get(
                "/api/ads/6/all?page=" + page
            ))

        }, 2000)
    })
}
export default {
    methods: {
        data() {
            return {
                adsDetails: '',
            }
        },
        send(type = '') {
            var openModalButton = document.getElementById("myModal");
            var id = openModalButton.getAttribute('data-id');
            let formData = new FormData();
            formData.append('from_id', window.Laravel.user.id);
            formData.append('ads_id', id);
            formData.append('note', document.getElementById('note').value);
            formData.append('type', type);
            if (type == 'with-cv') {
                formData.append('file', document.getElementById('cv-file').files[0]);
            }

            const headers = {
                "Authorization": "Bearer my-token",
                "My-Custom-Header": "foobar"
            };
            axios.post("/api/quotes/send-employment", formData, { headers })
                .then(response => {

                    if (response['data']['code'] == '200') {

                        this.$toast(response['data']['message'], {
                            duration: 2000,
                            pauseOnHover: true,
                            styles: {
                                borderRadius: '5px',
                                background: '#2ecc71',
                                boxShadow: '0 1px 3px #0000',
                                width: '340px'

                            },
                            slotRight: '<i class="fa fa-check"></i>', // Add icon to left
                            class: 'local-class', // Added to this toast only
                            type: 'error', // Default classes: 'success', 'error' and 'passive'
                            positionX: 'left',
                            positionY: 'bottom',
                            disableClick: false,
                        });
                        setTimeout(function () {// wait for 5 secs(2)
                            location.reload(); // then reload the page.(3)
                        }, 1000);
                    }
                    else {

                        this.$toast(response['data']['message'], {
                            duration: 2000,
                            pauseOnHover: true,
                            styles: {
                                borderRadius: '5px',
                                background: '#cc2e2e',
                                boxShadow: '0 1px 3px #0000',
                                width: '340px'

                            },
                            slotRight: '<i class="fas fa-info-circle"></i>', // Add icon to left
                            class: 'local-class', // Added to this toast only
                            type: 'error', // Default classes: 'success', 'error' and 'passive'
                            positionX: 'left',
                            positionY: 'bottom',
                            disableClick: false,
                        });
                    }


                });



        },
        chooseFiles() {
            document.getElementById("cv-file").click()
        },
        openModal() {
            var modal = document.getElementById("myModal");
            modal.style.display = "block";
        },
        closeModal() {
            var modal = document.getElementById("myModal");
            modal.style.display = "none";
        },
        closeDetailsModal() {
            var modal = document.getElementById("job-mobile-details");
            modal.style.display = "none";
        },
        async showData() {
            let id = this.adsDetails.id;
            const { data } = await axios.get(
                '/api/ads/' + id + '/details'
            );
            document.getElementById("details-side").innerHTML = ` <div class="card details-job"
                            style="border-radius: 14px; margin-bottom: 20px; box-shadow: rgb(236, 233, 233) 1px 1px 5px 2px;    position: sticky;top: 105px;">
                            <div class="card-horizontal" style="display: flex; flex: 1 1 auto; border-radius: 13px;">
                                <div class="card-body"
                                    style="border-radius: 13px; padding-right: 0px; padding-left: 0px; padding-top: 0px;">
                                    <div
                                        style="border-bottom: 1px solid rgb(216, 216, 216); padding-left: 1rem; padding-right: 1rem;">
                                        <div class="row text-end">
                                            <div class="col-md-8">
                                                <div class="row text-end">
                                                    <div class="col-md-12 col-sm-12 mt-3 mb-3"><span
                                                            style="font-size:12px;color:#03a8c5;font-weight:500;">`+ data['seenCount'] + `
                                                            <i class="far fa-eye"
                                                                style="color:#b9b9b9;font-size:15px;margin-right:10px;"></i></span><i
                                                            class="fas fa-map-marker-alt"
                                                            style="color:#777777;font-size:15px;margin-right:25px;"></i><span
                                                            style="margin-right:6px;font-size:12px;"> المدينة: <span
                                                                style="color:#00b0ac;font-weight:500;">`+ data['city'] + `
                                                            </span></span><i class="far fa-heart"
                                                            style="font-size:15px;margin-right:20px;"></i><span
                                                            style="margin-right:6px;margin-bottom:2px;font-size:12px;">المفضلة</span>
                                                        <svg version="1.1" id="Layer_1"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                            viewBox="0 0 512 512" xml:space="preserve"
                                                            style="width: 15px; margin-right: 20px;">
                                                            <g>
                                                                <polygon
                                                                    points="334.9,120.6 256,41.7 177.1,120.6 156.3,99.7 256,0 355.7,99.7 	">
                                                                </polygon>
                                                                <rect x="241.1" y="20.8" width="29.8" height="312.6">
                                                                </rect>
                                                                <path
                                                                    d="M404.8,512H107.2c-25.3,0-44.7-19.4-44.7-44.7V199.4c0-25.3,19.3-44.7,44.7-44.7h104.2v29.8H107.2c-8.9,0-14.9,6-14.9,14.9v267.9c0,8.9,6,14.9,14.9,14.9h297.7c8.9,0,14.9-6,14.9-14.9V199.4c0-8.9-6-14.9-14.9-14.9H300.7v-29.8h104.2c25.3,0,44.7,19.3,44.7,44.7v267.9C449.5,492.6,430.1,512,404.8,512z">
                                                                </path>
                                                            </g>
                                                        </svg>
                                                        <span
                                                            style="margin-right: 6px; margin-bottom: 2px; font-size: 12px;">المشاركة</span>
                                                    </div>
                                                </div><a href="javascript:void(0);" class=""
                                                    style="padding-top: 21px;"><span
                                                        style="color: rgb(1, 154, 162); font-size: 18px;">`+ data['title'] + `</span></a>
                                                <div class="row align-items-center">
                                               <div class="col-md-6">
                                                <p class="mt-2" style="color: rgb(87, 83, 77); padding-bottom: 10px;">
                                                    نشاط المنشآة: <span
                                                        style="color: rgb(0, 0, 0); font-weight: 400;">`+ data['activity'] + `</span></p>
                                                </div>
                                                <div class="col-md-6 " style="padding-bottom:5px">
                                                <a
                                                    href="javascript:void(0);" class="author-deals"
                                                    style="font-size:13px;padding:0px 18px 0px 18px;"><span 
                                                        style="color:rgb(1, 154, 162);">الراتب </span><span
                                                        style="color:#dc961c; font-weight: 700;"> `+ data['salary'] + ` ريال </span></a>
                                                 </div>
                                                 </div>
                                            </div>
                                            <div class="col-md-4"><a href="javascript:void(0);"
                                                    class="btn btn-logo " id="openModal"
                                                    style="border-radius: 8px; background-color: rgb(3, 156, 164); width: 95%; color: white; font-size: 90%; margin-top: 25px; padding: 10px 23px;"><i
                                                        class="fa fa-paper-plane"></i>ارسل
                                                    السيرة الذاتية</a>
                                                <p
                                                    style="color: rgb(3, 156, 165); font-size: 10px; position: absolute; top: 95px; font-weight: 700; left: 60px;">
                                                    الرقم المرجعي: <span style="color: rgb(0, 0, 0);">`+ data['reference_number'] + `</span></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="padding-left:0.6rem;padding-right:0.6rem;">
                                        <div class="row text-end" style="border-bottom:1px solid #d8d8d8;">
                                            <div class="col-md-4 mt-2" style="text-align:center;padding-bottom:10px;">
                                                <p class=""
                                                    style="color:rgb(1, 154, 162);font-size:12px;margin-bottom:3px;font-weight:500;padding-left:45px;">
                                                    اخر موعد للتقديم </p><i class="far fa-calendar-alt"
                                                    style="color:rgb(55, 211, 55);"></i><span
                                                    class="date-icon">`+ data['deadline'] + `</span><span class="time-icon"><i
                                                        class="far fa-clock" style="color:rgb(55, 211, 55);"></i>
                                                    12:00</span>
                                            </div>
                                            <div class="col-md-8 mt-4" style="text-align:center;padding-left:25px;"><a href="javascript:void(0);"
                                                    class="author-deals"
                                                    style="color:#000;font-size:11px;padding:5px 14px 5px 14px;margin-right:10px;">`+ data['infoArray']['work_hours'] + ` </a>
                                                    
                                                    <a href="javascript:void(0);" class="author-deals" id="employment_on_warranty"
                                                    style="font-size:11px;padding:5px 15px 5px 15px;color:#7ace5e;margin-right:10px;">`+ data['employment_on_warranty'] + `
                                                    
                                                </a>
                                                 <a   href="javascript:void(0);" class="author-deals " id="employment_rent_contract"
                                                    style="font-size:11px;padding:5px 15px 5px 15px;color:#000;margin-right:10px;">`+ data['employment_rent_contract'] + `
                                                    
                                                </a>
                                                 <a   href="javascript:void(0);" class="author-deals "  id="residintal"
                                                    style="font-size:11px;padding:5px 15px 5px 15px;color:#7ace5e;margin-right:10px;"> `+ data['residintal'] + `
                                                   
                                                </a>
                                                    </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12"
                                                style="padding-bottom:40px;border-bottom:1px solid #d8d8d8;">
                                                <h2
                                                    style="text-align:right;font-size:18px;font-weight:600;margin-right:15px;margin-top:25px;">
                                                    الوصف الوظيفي الكامل</h2>
                                                <p id="full-description" style="margin-top:20px;font-size:12px;text-align:right;padding-right:2px;margin-right:15px;"></p>
                                            </div>
                                            <div class="col-md-7 mt-3 text-end"
                                                style="padding: 8px 6px 8px 6px;background-color:rgb(240, 246, 242);border-radius: 20px;width:51%;margin-right:15px;">
                                                <span>
                                                    <p style="font-weight:400;font-size: 12px;color:rgb(0, 0, 0);"> في
                                                        حال واجهتك اي مشاكل لا تتردد بالإبلاغ عن الوظيفة<i
                                                            class="fas fa-info-circle"
                                                            style="color:rgb(62, 147, 142);padding-right:5px;font-size:18px;"></i>
                                                    </p>
                                                </span>
                                            </div>
                                            <div class="col-md-5 mt-3" style="padding-right:100px;"><a href="/login"
                                                    class="btn btn-project-search"
                                                    style="border-radius:20px;background-color:#f0f6f2;padding: 8px 10px 8px 10px;font-size: 13px;color:#039ca5;">تقديم
                                                    بلاغ على الاعلان</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>`;
            document.getElementById("full-description").innerHTML = data['description'];
            var openModalButton = document.getElementById("openModal");
            if (openModalButton != null) {
                openModalButton.addEventListener("click", function () {
                    var modal = document.getElementById("myModal");
                    modal.style.display = "block";
                    modal.dataset.id = data['id'];
                });
            }
            if (data['employment_on_warranty'] == '') {
                document.getElementById('employment_on_warranty').style.display = 'none';
            }
            if (data['employment_rent_contract'] == '') {
                document.getElementById('employment_rent_contract').style.display = 'none';
            }
            if (data['residintal'] == '') {
                document.getElementById('residintal').style.display = 'none';
            }


        },
        async openAds(event, ads) {
            let width = screen.width;

            if (width > 600) {
                const formGroup = document.querySelectorAll('.card')
                if (formGroup.length != 0) {
                    for (let i = 0; i < formGroup.length; i++) {
                        formGroup[i].style.borderColor = '';

                    }

                }
                event.currentTarget.style.borderColor = '#039ca5';
                document.getElementById("details-side").innerHTML = `<div class="card details-job"
                            style="border-radius: 14px; margin-bottom: 20px; box-shadow: rgb(236, 233, 233) 1px 1px 5px 2px;    position: sticky;top: 105px;">
                            <div class="card-horizontal" style="display: flex; flex: 1 1 auto; border-radius: 13px;">
                                <div class="card-body"
                                    style="border-radius: 13px; padding-right: 0px; padding-left: 0px; padding-top: 0px;">
                                    <div
                                        style="border-bottom: 1px solid rgb(216, 216, 216); padding-left: 1rem; padding-right: 1rem;">
                                        <div class="row text-end">
                                            <div class="col-md-8">
                                                <div class="row text-end">
                                                    <div class="col-md-12 col-sm-12 mt-3 mb-3 sk-header2">
                                                    </div>
                                                </div><a href="javascript:void(0);" class="sk-title"
                                                    style="padding-top: 21px;"><span
                                                        style="color: rgb(1, 154, 162); font-size: 18px;"></span></a>
                                                <p class="mt-2 sk-title" style=" margin-bottom: 10px;">
                                                </p>
                                            </div>
                                            <div class="col-md-4"><a href="javascript:void(0);"
                                                    class="btn btn-logo sk-send"
                                                    style="border-radius: 8px;  width: 95%; color: white; font-size: 90%; margin-top: 25px; padding: 10px 23px;"><i
                                                        class="fa fa-paper-plane"></i>ارسل
                                                    السيرة الذاتية</a>
                                                <p class="sk-ref"
                                                    style="color: #f6f7f8; font-size: 10px; position: absolute; top: 95px; font-weight: 700; left: 42px;">
                                                    الرقم المرجعي: <span style="color: #f6f7f8;">2589637</span></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="padding-left:0.6rem;padding-right:0.6rem;">
                                        <div class="row text-end" style="border-bottom:1px solid #d8d8d8;">
                                            <div class="col-md-4 mt-2"
                                                style="text-align:center;padding-bottom:10px;padding-right: 19px;">
                                                <p class=" sk-ref"
                                                    style="color:#f6f7f8;font-size:12px;margin-bottom:3px;font-weight:500;padding-left:45px;">
                                                    اخر موعد للتقديم </p>
                                                <p class=" sk-ref"
                                                    style="color:#f6f7f8;font-size:12px;margin-bottom:3px;font-weight:500;padding-left:45px;">
                                                    اخر موعد للتقديم </p>
                                            </div>
                                            <div class="col-md-8 mt-4" style="text-align:end;padding-left:25px;"><a
                                                    href="javascript:void(0);" class="author-deals sk-salary"
                                                    style="font-size:11px;padding:5px 25px 5px 25px;"><span
                                                        style="color:#f6f7f8;">الراتب </span><span
                                                        style="color:#f6f7f8;"> 3,500 ريال </span></a><a href="javascript:void(0);"
                                                    class="author-deals sk-salary"
                                                    style="color:#f6f7f8;font-size:11px;padding:5px 25px 5px 25px;margin-right:10px;">دوام
                                                    كامل </a><a href="javascript:void(0);" class="author-deals sk-salary"
                                                    style="font-size:11px;padding:5px 25px 5px 25px;color:#f6f7f8;margin-right:10px;">نقل
                                                    كفالة </a></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12"
                                                style="padding-bottom:40px;border-bottom:1px solid #d8d8d8;">
                                                <h2 class="sk-title2"
                                                    style="text-align:right;font-size:18px;font-weight:600;margin-right:15px;margin-top:25px;">
                                                </h2>
                                               
                                                <p class="sk-description"
                                                    style="font-size: 12px;text-align: right;padding-right: 2px;margin-right: 15px;">
                                                </p>
                                                <p class="sk-description"
                                                    style="font-size: 12px;text-align: right;padding-right: 2px;margin-right: 15px;">
                                                </p>
                                                <p class="sk-description"
                                                    style="font-size: 12px;text-align: right;padding-right: 2px;margin-right: 15px;">
                                                </p>
                                                <p class="sk-description"
                                                    style="font-size: 12px;text-align: right;padding-right: 2px;margin-right: 15px;">
                                                </p>
                                                <p class="sk-description"
                                                    style="font-size: 12px;text-align: right;padding-right: 2px;margin-right: 15px;">
                                                </p>
                                                <p class="sk-description"
                                                    style="font-size: 12px;text-align: right;padding-right: 2px;margin-right: 15px;">
                                                </p>
                                                <p class="sk-description"
                                                    style="font-size: 12px;text-align: right;padding-right: 2px;margin-right: 15px;">
                                                </p>
                                                <p class="sk-description"
                                                    style="font-size: 12px;text-align: right;padding-right: 2px;margin-right: 15px;">
                                                </p>
                                                <p class="sk-description"
                                                    style="font-size: 12px;text-align: right;padding-right: 2px;margin-right: 15px;">
                                                </p>
                                                <p class="sk-description"
                                                    style="font-size: 12px;text-align: right;padding-right: 2px;margin-right: 15px;">
                                                </p>
                                                <p class="sk-description"
                                                    style="font-size: 12px;text-align: right;padding-right: 2px;margin-right: 15px;">
                                                </p>
                                                <p class="sk-description"
                                                    style="font-size: 12px;text-align: right;padding-right: 2px;margin-right: 15px;">
                                                </p>
                                                <p class="sk-description"
                                                    style="font-size: 12px;text-align: right;padding-right: 2px;margin-right: 15px;">
                                                </p>
                                                <p class="sk-description"
                                                    style="font-size: 12px;text-align: right;padding-right: 2px;margin-right: 15px;">
                                                </p>
                                            </div>
                                            <div class="col-md-7 mt-3 text-end sk-salary"
                                                style="padding: 8px 6px 8px 6px;background-color:rgb(240, 246, 242);border-radius: 20px;width:51%;margin-right:15px;">
                                                <span>
                                                    <p style="font-weight:400;font-size: 12px;color:#f6f7f8;"> في
                                                        حال واجهتك اي مشاكل لا تتردد بالإبلاغ عن الوظيفة<i
                                                            class="fas fa-info-circle"
                                                            style="color:#f6f7f8;padding-right:5px;font-size:18px;"></i>
                                                    </p>
                                                </span>
                                            </div>
                                            <div class="col-md-5 mt-3 " style="padding-right:100px;"><a href="/login"
                                                    class="btn btn-project-search sk-salary"
                                                    style="border-radius:20px;padding: 8px 10px 8px 10px;font-size: 13px;color:#f6f7f8;">تقديم
                                                    بلاغ على الاعلان</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>`;
                this.adsDetails = ads;
                setTimeout(this.showData, 1000);
            }
            else {
                // alert(width);
                const { data } = await axios.get(
                    '/api/ads/' + ads['id'] + '/details'
                );

                var modal = document.getElementById("job-mobile-details");
                modal.innerHTML = ` <div class="job-modal-content">
                        <h3 style="text-align: center;color: #039ca4;">تفاصيل الوظيفة</h3>
                        <div class="col-md-12 col-sm-12 mt-3 mb-3">
                            <span style="color: #fdc57b; font-size: 18px;">`+ data['title'] + `</span>
                            <br>
                            <p
                                style="color: rgb(3, 156, 165);font-size: 10px;font-weight: 700;float: right;margin-top: 10px;">
                                الرقم المرجعي: <span style="color: rgb(0, 0, 0);">`+ data['reference_number'] + `</span></p>
                        </div>
                        <div class="col-md-12 col-sm-12  mb-3 ">
                            <span style="font-size:12px;color:#03a8c5;font-weight:500;">`+ data['seenCount'] + `
                                <i class="far fa-eye" style="color:#b9b9b9;font-size:15px;margin-right:10px;"></i>
                            </span>
                            <i class="fas fa-map-marker-alt"
                                style="color:#777777;font-size:15px;margin-right:25px;"></i><span
                                style="margin-right:6px;font-size:12px;"> المدينة:
                                <span style="color:#00b0ac;font-weight:500;">`+ data['city'] + `</span>
                            </span>
                            <i class="far fa-heart" style="font-size:15px;margin-right:20px;"></i><span
                                style="margin-right:6px;margin-bottom:2px;font-size:12px;">المفضلة</span>
                            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512"
                                xml:space="preserve" style="width: 15px; margin-right: 20px;">
                                <g>
                                    <polygon points="334.9,120.6 256,41.7 177.1,120.6 156.3,99.7 256,0 355.7,99.7 	">
                                    </polygon>
                                    <rect x="241.1" y="20.8" width="29.8" height="312.6">
                                    </rect>
                                    <path
                                        d="M404.8,512H107.2c-25.3,0-44.7-19.4-44.7-44.7V199.4c0-25.3,19.3-44.7,44.7-44.7h104.2v29.8H107.2c-8.9,0-14.9,6-14.9,14.9v267.9c0,8.9,6,14.9,14.9,14.9h297.7c8.9,0,14.9-6,14.9-14.9V199.4c0-8.9-6-14.9-14.9-14.9H300.7v-29.8h104.2c25.3,0,44.7,19.3,44.7,44.7v267.9C449.5,492.6,430.1,512,404.8,512z">
                                    </path>
                                </g>
                            </svg>
                            <span style="margin-right: 6px; margin-bottom: 2px; font-size: 12px;">المشاركة</span>
                        </div>
                        <div class="row text-center mt-3">
                            <div class="col-12 mb-3" style="padding-bottom: 5px;">
                                <a href="javascript:void(0);" class="author-deals"
                                    style="font-size: 15px;padding: 4px 12px;">
                                    <span style="color: rgb(1, 154, 162);">الراتب </span>
                                    <span style="color: rgb(220, 150, 28); font-weight: 700;">`+ data['salary'] + ` ريال </span>
                                </a>
                            </div>
                        </div>
                        <div class="row text-center">
                            <div class="col-12 mt-2 mb-4">
                                <a href="javascript:void(0);" class="author-deals"
                                    style="color: rgb(0, 0, 0); font-size: 11px; padding: 5px 14px;">`+ data['infoArray']['work_hours'] + `
                                    &nbsp; </a>
                                <a href="javascript:void(0);" class="author-deals" id="employment_on_warranty1"
                                    style="font-size: 11px; padding: 5px 15px; color: rgb(122, 206, 94); margin-right: 5px;">`+ data['employment_on_warranty'] + `
                                    </a>
                                <a href="javascript:void(0);" class="author-deals" id="employment_rent_contract1"
                                    style="font-size: 11px; padding: 5px 15px; color: rgb(0, 0, 0); margin-right: 5px;">`+ data['employment_rent_contract'] + `
                                    </a>
                                <a href="javascript:void(0);" class="author-deals"  id="residintal1"
                                    style="font-size: 11px; padding: 5px 15px; color: rgb(122, 206, 94); margin-right: 5px;">`+ data['residintal'] + `
                                    </a>
                            </div>
                        </div>
                        <div class="row" style="border: 1px solid #d8d8d8;    border-radius: 10px;">
                            <div class="col-6"
                                style="padding-top: 5px;padding-bottom: 5px; border-left: 1px solid #d8d8d8;">
                                <p class=""
                                    style="color: rgb(1, 154, 162); font-size: 12px; margin-bottom: 3px; font-weight: 500; padding-left: 45px;">
                                    اخر موعد للتقديم </p>
                                <i class="far fa-calendar-alt" style="color: rgb(55, 211, 55);"></i>
                                <span class="date-icon">`+ data['deadline'] + `</span>
                                <span class="time-icon"><i class="far fa-clock" style="color: rgb(55, 211, 55);"></i>
                                    12:00</span>
                            </div>
                            <div class="col-6 mt-2" style="padding-bottom: 10px;">
                                <p class="mt-2" style="color: rgb(87, 83, 77); padding-bottom: 10px;"> نشاط المنشآة:
                                    <span style="color: rgb(0, 0, 0); font-weight: 400;">`+ data['activity'] + `</span>
                                </p>
                            </div>
                        </div>

                        <div class="col-md-12"
                            style="padding-bottom: 40px; border-bottom: 1px solid rgb(216, 216, 216);">
                            <h2 style="text-align: right; font-size: 18px; font-weight: 600; margin-top: 25px;">
                                الوصف الوظيفي الكامل</h2>
                            <p id="full-description"
                                style="margin-top: 20px; font-size: 12px; text-align: right; padding-right: 2px; margin-right: 15px;">
                       
                            </p>
                        </div>
                        <div class="row text-center mt-4 mb-4">
                            <div class="col-9 "
                                style="padding:8px 6px 8px 6px;background-color:rgb(240, 246, 242);border-radius:20px;">
                                <p style="font-weight:400;color:rgb(0, 0, 0);font-size:10px;"> في حال واجهتك اي مشاكل لا
                                    تتردد بالإبلاغ عن الوظيفة <i class="fas fa-info-circle"
                                        style="color:rgb(62, 147, 142);padding-right:5px;font-size:18px;"></i></p>
                            </div>
                            <div class="col-3 "><a href="/login" class="btn btn-project-search"
                                    style="font-size: 12px;border-radius:20px;background-color:#f0f6f2;padding:8px 10px 8px 10px;color:#039ca5;">تقديم
                                    بلاغ </a></div>
                        </div>

                    </div>
                    <div class="mobile-quotes-action"
                        style="background: #f5f5f5;position: fixed;width: 100%;bottom: 0;left: 0;padding: 9px 0;z-index: 9;    border-top-left-radius: 20px;border-top-right-radius: 20px;">
                        <div class="container">
                            <div class="action-inner"
                                style="display: flex;align-items: center;justify-content: space-between;">
                                <div class="action-price-wrapper" style="margin-right: 20px;">

                                    <a href="javascript:void(0);"  class="btn action-button" id="closeDetails"
                                        style=" padding: 9px 15px; color: #fff;text-decoration: none;    height: 45px; width:100%;border-radius: 12px;background: #039ca4; border-color: #039ca4;">
                                        العودة لقائمة الوظائف
                                    </a>


                                </div>
                                <a href="javascript:void(0);" id="openSend" class="btn action-button"
                                    style=" padding: 9px 15px; color: #fff;text-decoration: none; margin-left: 20px;   height: 45px; width:40%;border-radius: 12px;background: #039ca4; border-color: #039ca4;">ارسل
                                    السيرة الذاتية</a>

                            </div>
                        </div>
                    </div>`;
                document.getElementById("full-description").innerHTML = data['description'];
                modal.style.display = "block";
                var closeModalButton = document.getElementById("closeDetails");
                if (closeModalButton != null) {
                    closeModalButton.addEventListener("click", function () {
                        modal.style.display = "none";
                    });
                }
                var openSendModalButton = document.getElementById("openSend");
                var sendModal = document.getElementById("myModal");
                if (openSendModalButton != null) {
                    openSendModalButton.addEventListener("click", function () {
                        sendModal.style.display = "block";
                        sendModal.dataset.id = data['id'];
                        console.log( data['id']);
                    });
                }
                if (data['employment_on_warranty'] == '') {
                    document.getElementById('employment_on_warranty1').style.display = 'none';
                }
                if (data['employment_rent_contract'] == '') {
                    document.getElementById('employment_rent_contract1').style.display = 'none';
                }
                if (data['residintal'] == '') {
                    document.getElementById('residintal1').style.display = 'none';
                }

            }
        },


    },
    mounted() {
        let width = screen.width;
        if (width > 600 && document.getElementsByClassName('card')[1] != null) {
            document.getElementsByClassName('card')[1].style.borderColor = '#039ca5';
        }
    },
    async setup() {
        let ads = ref(await loadUserData())['_rawValue']['data'];
        let currentPage = ads['current_page'], last_page = ads['last_page'], from = ads['from'];
        ads = ads['data'];

        return {
            ads, currentPage, last_page, from
        }
    },
}
</script>
