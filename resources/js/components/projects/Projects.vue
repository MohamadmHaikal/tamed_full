<template>
    <div>
        <div class="about-area pb-70">
        
            <div v-if="ads.length > 0" class="containp  container">
                <div class="mt-2" style="text-align: -webkit-center;">
                    <div class="col-10 mt-3 text-center">
                        <div class="row mt-4">
                            <div class="col-lg-4">
                                <input type="text" placeholder="البحث عن خدمة"
                                    style="width:100%;border-radius: 20px;border-color: #c1c1c1;border-top-color: #ffffff;border-width: 1px; border-left-color: #ffffff; padding: 8px 19px 11px 4px;">
                                <i class='fas fa-search'
                                    style="right: 44%;bottom: 48%;color: #b7b7b7;position: relative;"></i>
                            </div>
                            <div class="col-md-4"></div>

                            <div class="col-md-4 btn-project-search"><a href="/login" class="btn btn-project-search"
                                    style="border-radius: 25px; background-color: #039ca4;color: white;padding: 7px 42px 7px 42px;">بحث
                                    متقدم </a></div>
                        </div>
                    </div>

                </div>
                <div v-for="ad in ads" v-bind:key="ad.id" class="mt-2" style="text-align: -webkit-center;">
                    <div class="col-md-10 col-sm-12 mt-3 text-center">
                        <div class="card"
                            style="border-radius: 14px;  margin-bottom: 40px; box-shadow: 1px 1px 5px 2px #ece9e9;">
                            <div class="card-horizontal"
                                style=" display: flex; flex: 1 1 auto; border-radius: 13px 13px 13px 13px; ">

                                <div class="card-body"
                                    style="border-radius: 13px 13px 13px 13px; padding-right: 0px; padding-left: 0px;">
                                    <div
                                        style=" border-bottom: 1px solid #d8d8d8; padding-left: 1rem; padding-right: 1rem ;">
                                        <div class="row text-end">

                                            <div class="col-md-9">
                                                <div class="row text-end">
                                                    <div class="col-md-4 col-6 pt-1">
                                                        <i class='far fa-clock'
                                                            style="color: #ababab; font-size: 13px;"></i>
                                                        <span style="color: #ababab;    font-size: 13px;"> التاريخ:
                                                        </span>
                                                        <span style="color: #ababab;  font-size: 13px;">{{ ad.created
                                                        }}</span>

                                                    </div>
                                                    <div class="col-md-3 col-6">
                                                        <div v-if="ad.Signed == 1"
                                                            style=" background-color: #9fcf95; text-align: center;">
                                                            <p
                                                                style="color: white; padding-top: 1px; padding-bottom: 1px;">
                                                                لم التوقيع بعد
                                                            </p>
                                                        </div>
                                                        <div v-else
                                                            style=" background-color: #ebebeb; text-align: center;">
                                                            <p
                                                                style="color: white;padding-top: 1px;padding-bottom: 1px;">
                                                                تم التوقيع
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4"><span style="color:#019aa2;font-size:12px;">
                                                            الرقم المرجعي : </span><span
                                                            style="color:rgb(87 83 77);font-size:12px;">
                                                            {{ ad.reference_number }}</span>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-md-3 " style="padding-right: 20px;">
                                            </div>

                                        </div>

                                        <div class="row text-end mt-3 mb-2">
                                            <div class="col-md-8">
                                                <router-link :to="{ name: 'details', params: { projectId: ad.id } }">
                                                    <span style="color: #019aa2;"> {{ ad.title }}</span>
                                                </router-link>
                                                <p class="mt-2" style="color: rgb(87 83 77);">{{ ad.BriefDescription }}</p>
                                            </div>
                                            <div class="col-md-4 mt-1">
                                            </div>
                                        </div>

                                    </div>
                                    <div
                                        style=" border-bottom: 1px solid #d8d8d8; padding-left: 1rem; padding-right: 1rem ;">
                                        <div class="row text-end mt-2">
                                            <div class="col-md-12">
                                                <span style="color: #019aa2;"> النشاط : </span>
                                                <span style="color: rgb(87 83 77);"> {{ ad.activity }}</span>

                                            </div>
                                            <div class="col-md-8 mt-2  mb-2">
                                                <span
                                                    style="color: rgb(87 83 77); color: rgb(87 83 77);font-size: 12px;"><i
                                                        class='fas fa-map-marker-alt' style="color: #ababab;"></i>
                                                    العنوان : </span>
                                                <span
                                                    style="color: rgb(87 83 77); color: rgb(87 83 77);font-size: 12px;">
                                                    المملكة العربية السعودية - {{ ad.city }} - {{ ad.neighborhood
                                                    }}</span>
                                            </div>
                                            <div class="col-md-4 mt-2 mb-2">

                                            </div>
                                        </div>

                                    </div>
                                    <div style="padding-left: 1rem; padding-right: 1rem ; ">
                                        <div class="row">
                                            <div class="col-md-3  col-6  text-end mt-2 ">
                                                <p class="text-end" style="color: #019aa2;  font-size: 12px;"> اخر
                                                    موعد لتقديم العروض</p>
                                                <i class='far fa-calendar-alt' style="color: #37D337;"></i>
                                                <span class="date-icon">
                                                    {{ ad.created }} </span>
                                                <span class="time-icon">
                                                    <i class='far fa-clock' style="color: #37D337;"></i> {{ ad.time
                                                    }}</span>

                                            </div>
                                            <div class="col-md-1 row-col-with view"
                                                style="margin-top: 43px;padding-right: 0;padding-left: 0;">
                                                <span style="color: #019aa2;  font-size: 14px; padding-right: 5px;">
                                                    {{ ad.seenCount }} <i class='far fa-eye'
                                                        style="color: #37D337;"></i></span>

                                            </div>
                                            <div class="col-md-3 col-6 mt-3">
                                                <h6 class="text-center" style="color: #019aa2;  font-size: 11px;">
                                                    عروض الاسعار المقدمة</h6>

                                                <span
                                                    style="color:#019aa2;  font-size: 20px; padding-right: 2px;    padding-left: 3px;">
                                                    {{ ad.quotes_count }}  {{' '}}
                                                </span>
                                                <i class='far fa-file-alt	'
                                                    style="color: #019aa2;  font-size: 25px;"></i>

                                            </div>
                                            <div class="col-md-2 col-6 mt-3">

                                                <h6 class="text-center" style="color: #019aa2;  font-size: 12px;">
                                                    قيمةالمشروع
                                                </h6>

                                                <span v-if="ad.pricestatus == 'on'"
                                                    style="color:#d4a259;  font-size: 17px; padding-right: 2px;">
                                                    الأفضل سعر </span>
                                                <span v-else
                                                    style="color:#d4a259;  font-size: 17px; padding-right: 2px;">
                                                    {{ ad.price }} ريال</span>

                                            </div>

                                            <div class="col-md-3 col-6 ">
                                                <router-link :to="{ name: 'details', params: { projectId: ad.id } }"
                                                    class="btn btn-logo btn-animation"
                                                    style="border-radius: 16px;background-color: #039ca4;color: white;margin-top: 25px;padding: 7px 30px 7px 30px;">
                                                    التفاصيل</router-link>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="img-square-wrapper "
                                    style="     border-right: 1px solid #d8d8d8; width: 265px;height: 280px;border-right: 1px solid rgb(216, 216, 216);">
                                    <router-link :to="{ name: 'details', params: { projectId: ad.id } }">
                                        <img class=""
                                            style="border-radius: 13px 0px 0px 13px;  height: 282px; width:100% ;  border-right: 1px solid #d8d8d8;"
                                            :src="ad.cover" alt="Card image cap">
                                    </router-link>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 mt-5 mb-5">
                    <div class="pagination-area">
                        <a href="/projects?page=1" class="prev page-numbers">
                            <i class="fas fa-angle-double-left"></i>
                        </a>
                        <a v-for="i in last_page" :key="i" :href="'/projects?page=' + i"
                            v-bind:class="[currentPage == i ? 'page-numbers current' : 'page-numbers']">{{ i }}</a>
                        <a :href="'/projects?page=' + last_page" class="next page-numbers">
                            <i class="fas fa-angle-double-right"></i>
                        </a>
                    </div>
                </div>
            </div>
             <div v-else class="containp container no-job">
                <img src="../../assets/images/prtameed.png" alt=""  width="662.5" height="662.5">
                <br>
                <a href="/login" class="btn" >سجل الآن</a>
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
                "/api/ads/1/all?page=" + page
            ))

        }, 2000)
    })
}
export default {

    async setup() {
        let ads = ref(await loadUserData())['_rawValue']['data'];
        let currentPage = ads['current_page'], last_page = ads['last_page'], from = ads['from'];
        ads = ads['data'];
        console.log(ads.length);
        return {
            ads, currentPage, last_page, from
        }
    },
}

</script>