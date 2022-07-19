<template>
    <div>
        <div class="about-area pb-70">
            <div class="containp  container">
                <div class="header-profile">
                    <img src="../../assets/images/profile.png"
                        style="position: relative; padding-bottom: 25px;width: 92%;  border-bottom-right-radius: 75px;      border-bottom-left-radius: 75px;  margin-right: 4%; margin-left: 4%;"
                        alt="">
                    <div class="logo-profile">

                        <img :src="'/image/'+user.logo" alt="Avatar"
                            style="    width: 100px; height:100px ; border-radius: 50%;  background-color: white;    box-shadow: #dedede 0px 2px 6px -1px;">
                    </div>
                    <div class="profile-title">
                    <span >{{ user.name }}</span>
                    </div>
                    <div class="profile-rate  mt-3 "> <span class="far fa-star" style="font-size:20px; color:#ffd203 ;"
                            aria-hidden=""></span><span class="far fa-star"
                            style="font-size:20px; color:#ffd203 ;"></span><span class="fa fa-star checked"
                            style="font-size:20px;"></span><span class="fa fa-star checked"
                            style="font-size:20px;"></span><span class="fa fa-star checked"
                            style="font-size:20px;"></span></div>
                    <div class="profile-share">
                   
                    <span
                            style="margin-left: 6px; margin-bottom: 2px;">{{ user.seenCount }}</span><i class="far fa-eye"
                            style="font-size: 20px;color: rgb(1, 154, 162);"></i> <a href="javascript:void(0);"><svg version="1.1" id="Layer_1"
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                            y="0px" viewBox="0 0 512 512" xml:space="preserve" style="width: 20px; margin-right: 20px;">
                            <g>
                                <polygon points="334.9,120.6 256,41.7 177.1,120.6 156.3,99.7 256,0 355.7,99.7 	">
                                </polygon>
                                <rect x="241.1" y="20.8" width="29.8" height="312.6"></rect>
                                <path d="M404.8,512H107.2c-25.3,0-44.7-19.4-44.7-44.7V199.4c0-25.3,19.3-44.7,44.7-44.7h104.2v29.8H107.2c-8.9,0-14.9,6-14.9,14.9
		v267.9c0,8.9,6,14.9,14.9,14.9h297.7c8.9,0,14.9-6,14.9-14.9V199.4c0-8.9-6-14.9-14.9-14.9H300.7v-29.8h104.2
		c25.3,0,44.7,19.3,44.7,44.7v267.9C449.5,492.6,430.1,512,404.8,512z"></path>
                            </g>
                        </svg><span style="margin-right: 6px; margin-bottom: 2px;">مشاركة</span></a></div>
                </div>
                <div style="text-align: -webkit-center;">
                    <div class="col-md-10 col-sm-12 mt-3 text-center">

                        <div class="row" style="    padding-right: 0px; padding-left: 0px;">
                            <div class="col-md-8  col-sm-12 text-end mt-3">

                                <div class="row">

                                    <div class="col-md-12 mt-4">
                                        <div class="tab" style="padding:4px;">
                                            <button id="buttonlinks" class="tablinks profile first"
                                                @click="openCity($event, 'London')">نبذة عن المنشآة
                                            </button>
                                            <button class="tablinks profile" @click="openCity($event, 'Paris')">بروفايل
                                                المنشآة</button>
                                            <button class="tablinks profile" @click="openCity($event, 'Tokyo')">
                                                المشاريع</button>
                                            <button class="tablinks profile" @click="openCity($event, 'comment')">
                                                تعليقات</button>
                                        </div>

                                        <div id="London" class="tabcontent">
                                            <div
                                                style="    border-bottom: 1px solid rgb(238, 239, 241); padding-bottom: 40px;">

                                                <small
                                                    style="position:relative;top:26px;right:40px;background-color:#ffffff;padding:0px 10px 0px 10px;">نبذة
                                                    عن المنشآة</small>
                                                <div class="mt-3"
                                                    style="border:1px solid #019aa2;border-radius:25px;padding:20px;">
                                                    <span>{{ user.description }}</span>
                                                </div>
                                            </div>
                                            <h5 class="mt-4">معلومات إضافية</h5>
                                            <div
                                                style=" border-bottom: 1px solid rgb(238, 239, 241); padding-bottom: 50px; ">

                                                <div class="mt-3"
                                                    style="    border:1px solid #c2c2c2;border-radius:15px;padding:10px;">

                                                    <div class="row">
                                                        <div class="col-md-3 col-6">
                                                            <img src="../../assets/images/customer.png" alt=""
                                                                style="    width: 20%;">
                                                            <span
                                                                style="color:#c7c7c7 ;font-size: 10px;font-weight: 500; padding: 0px 5px 0px 0px;">عدد
                                                                العملاء:</span>
                                                            <span style=" color: #039ca4;   font-size: 10px;">
                                                                +{{ user.Customers }} عميل
                                                            </span>
                                                        </div>
                                                        <div class="col-md-3 col-6">
                                                            <img src="../../assets/images/projects.png" alt=""
                                                                style="    width: 18%;">
                                                            <span
                                                                style="color:#c7c7c7 ;font-size: 10px;font-weight: 500; padding: 0px 5px 0px 0px;">عدد
                                                                المشاريع:</span>
                                                            <span style=" color: #039ca4;   font-size: 10px;">
                                                                {{ projects.length }} مشروع
                                                            </span>
                                                        </div>
                                                        <div class="col-md-3 col-6">
                                                            <img src="../../assets/images/activity.png" alt=""
                                                                style="    width: 20%;">
                                                            <span
                                                                style="color:#c7c7c7 ;font-size: 8px;font-weight: 500; padding: 0px 5px 0px 0px;">النشاط
                                                                الرئيسي:</span>
                                                            <span style=" color: #039ca4;   font-size: 10px;">
                                                                {{ user.activity }}</span>
                                                        </div>
                                                        <div class="col-md-3 col-6">
                                                            <img src="../../assets/images/tasnef.png" alt=""
                                                                style="    width: 20%;">
                                                            <span
                                                                style="color:#c7c7c7 ;font-size: 10px;font-weight: 500; padding: 0px 5px 0px 0px;">فئة
                                                                التصنيف:</span>
                                                            <span style=" color: #039ca4;   font-size: 10px;"> تصنيف أول
                                                            </span>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="row mt-4">
                                                <div class="col-md-6 text-end">
                                                    <h5 class="mb-4 mt-4 address">العنوان الرئيسي</h5>
                                                    <i class="fas fa-map-marker-alt"
                                                        style="color: rgb(1, 154, 162); font-size: 20px; "></i>
                                                    <span
                                                        style="color:#7ba9a7; padding-right: 8px;    font-size: small;">العنوان
                                                        الرئيسي: </span>
                                                    <span
                                                        style="color:#858585 ;      font-weight: 500;  font-size: small;">
                                                        المملكة العربية السعودية {{ user.city }} </span>
                                                </div>
                                                <div class="col-md-6 text-center">
                                                    <h5 class="mb-4 mt-4" style="color: #019fa8;">نسبة إنجاز العمل</h5>
                                                    <p style="color: #5d5d5d;     font-weight: 600;">تقدر نسبة إنجاز عمل
                                                        منشآة بحسب العقود المبرمة بين الطرفين</p>
                                                    <div style="    text-align: -webkit-center;">

                                                        <CircleProgress :percent="85" fill-color="#46a69b"
                                                            :viewport="true" :show-percent="true" :size=110 />
                                                    </div>


                                                </div>
                                            </div>

                                        </div>

                                        <div id="Paris" class="tabcontent">
                                            <div class="row text-center">
                                                <div class="col-md-11 text-center">
                                                    <p class="mt-5 mb-4 text-center"
                                                        style="color:#000000;font-weight: 500;">عميلنا العزيز يمكنك
                                                        تحميل البروفايل الشخصي الخاص بنا بالنقر على الملف</p>


                                                    <table
                                                        style=" border-collapse: separate;border-spacing: 0;min-width: 350px;">

                                                        <tr>
                                                            <td
                                                                style=" border: 1px solid #019aa2; border-radius: 20px;">
                                                                <div style="padding: 30px;"> <img
                                                                        src="../../assets/images/pdf.png" alt=""
                                                                        style=" width: 30%;"><br> <span
                                                                        style=" color:#019aa2;  padding-right: 2px;  font-size: 20px;">

                                                                        <a v-if="user.profile!=null" href="" :download="'/image/'+user.profile['file']"
                                                                            style=" color:#17a2b8;    padding-left: 5%;">تحميل</a>
                                                                        <a v-else href="javascript:void(0);"
                                                                            style=" color:#333333;    padding-left: 5%;">غير متوفر</a>
                                                                    </span>
                                                                </div>
                                                            </td>

                                                        </tr>

                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="Tokyo" class="tabcontent">
                                            <div class="section-area ptb-70 pt-0">
                                                <div class="containp  container">
                                                    <div class="section-title">
                                                        <div class="row">
                                                            <div class="col-md-12  row-col-with">
                                                                <h4> مشاريع المنشآة</h4>

                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="feedback-slides">
                                                        <carousel :autoplay="5000" :settings="settings"
                                                            :wrap-around="true" :breakpoints="breakpoints">
                                                            <slide v-for="slide in carouselItems" :key="slide.id">

                                                                <div class="single-section-post">
                                                                    <div class="section-image">
                                                                        <router-link to="/ProjectDetails">
                                                                            <img :src="slide.image" alt="image">
                                                                        </router-link>

                                                                        <div class="date">
                                                                            <i class="far fa-calendar-alt"></i>
                                                                          {{user.registration_date}}
                                                                        </div>
                                                                    </div>

                                                                    <div class="section-post-content">
                                                                        <div class="row section-title">
                                                                            <h6>
                                                                                <router-link to="/ProjectDetails">{{
                                                                                        slide.title
                                                                                }}</router-link>
                                                                            </h6>

                                                                            <span>{{ slide.location }}</span>
                                                                            <br>
                                                                            <span>{{ slide.category }}</span>
                                                                        </div>
                                                                        <div class="row">

                                                                            <div
                                                                                class="col-md-6 col-xs-12 section-title date-end">
                                                                                <span>اخر موعد تقديم 08/05/2022</span>
                                                                                <br>
                                                                                <router-link to="/ProjectDetails"
                                                                                    class="show">تقديم عرض</router-link>
                                                                            </div>
                                                                            <div class="col-md-6 col-xs-12 price">
                                                                                <p>قيمة المشروع</p>
                                                                                <span>الأفضل سعر</span>
                                                                            </div>
                                                                        </div>

                                                                        <!-- <p>{{slide.description}}</p> -->
                                                                        <!-- <router-link to="/blog-details" class="read-more-btn">Read More <i
                                        class="fas fa-arrow-right"></i></router-link> -->
                                                                    </div>
                                                                </div>


                                                            </slide>

                                                            <template #addons>
                                                                <!-- <Navigation /> -->
                                                                <Pagination />
                                                            </template>
                                                        </carousel>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div id="comment" class="tabcontent">
                                            <div class="box mt-4"
                                                style="background: #fff; padding: 25px; border-radius: 3px;box-shadow: 0px 4px 8px rgba(0,0,0,0.15);">

                                                <div class="content"
                                                    style=" display: flex;flex-wrap: wrap;align-items: center;justify-content: space-between;">
                                                    <div class="info">
                                                        <div class="name" style=" font-weight: 600;font-size: 17px;">
                                                            فرسان للمقاولات</div>
                                                        <div class="job"
                                                            style=" font-size: 12px;font-weight: 500;color: #17a2b8;    padding: 3px 0px 3px 0px;">
                                                            شركة | مقاولات</div>
                                                        <div class="stars" style="margin-top: 2px;">
                                                            <i class="fas fa-star" style=" color: #ffd203"></i>
                                                            <i class="fas fa-star" style=" color: #ffd203;"></i>
                                                            <i class="far fa-star" style=" color: #ffd203;"></i>
                                                            <i class="far fa-star" style=" color: #ffd203;"></i>
                                                            <i class="far fa-star" style=" color: #ffd203;"></i>
                                                        </div>
                                                    </div>
                                                    <div class="image"
                                                        style=" height: 75px;width: 75px; padding: 3px;background: #17a2b8;border-radius: 50%;">
                                                        <img src="/image/1648718574.png"
                                                            alt=""
                                                            style="    background-color: white; border-color: #fff;height: 100%; width: 100%; object-fit: cover;border-radius: 50%;border: 2px solid #fff;">
                                                    </div>
                                                </div>

                                                <p style=" padding-top: 10px;">Lorem aliasry ipsum dolor sits ametans,
                                                    consectetur adipisicing
                                                    elitits. Expedita reiciendis itaque placeat thuratu, quasi yiuos
                                                    repellendus repudiandae deleniti ideas fuga molestiae, alias.</p> <i
                                                    class="fas fa-quote-left quote"
                                                    style=" font-size: 20px;color: #17a2b8;display: flow-root;text-align: end;padding-left: 20px;"></i>
                                            </div>
                                            <div class="box mt-4"
                                                style="background: #fff; padding: 25px; border-radius: 3px;box-shadow: 0px 4px 8px rgba(0,0,0,0.15);">

                                                <div class="content"
                                                    style=" display: flex;flex-wrap: wrap;align-items: center;justify-content: space-between;">
                                                    <div class="info">
                                                        <div class="name" style=" font-weight: 600;font-size: 17px;">
                                                            فرسان للمقاولات</div>
                                                        <div class="job"
                                                            style=" font-size: 12px;font-weight: 500;color: #17a2b8;    padding: 3px 0px 3px 0px;">
                                                            شركة | مقاولات</div>
                                                        <div class="stars" style="margin-top: 2px;">
                                                            <i class="fas fa-star" style=" color: #ffd203"></i>
                                                            <i class="fas fa-star" style=" color: #ffd203;"></i>
                                                            <i class="far fa-star" style=" color: #ffd203;"></i>
                                                            <i class="far fa-star" style=" color: #ffd203;"></i>
                                                            <i class="far fa-star" style=" color: #ffd203;"></i>
                                                        </div>
                                                    </div>
                                                    <div class="image"
                                                        style=" height: 75px;width: 75px; padding: 3px;background: #17a2b8;border-radius: 50%;">
                                                        <img src="/image/1653349843.png"
                                                            alt=""
                                                            style="     background-color: white; border-color: #fff;height: 100%; width: 100%; object-fit: cover;border-radius: 50%;border: 2px solid #fff;">
                                                    </div>
                                                </div>

                                                <p style=" padding-top: 10px;">Lorem aliasry ipsum dolor sits ametans,
                                                    consectetur adipisicing
                                                    elitits. Expedita reiciendis itaque placeat thuratu, quasi yiuos
                                                    repellendus repudiandae deleniti ideas fuga molestiae, alias.</p> <i
                                                    class="fas fa-quote-left quote"
                                                    style=" font-size: 20px;color: #17a2b8;display: flow-root;text-align: end;padding-left: 20px;"></i>
                                            </div>
                                            <div class="box mt-4"
                                                style="background: #fff; padding: 25px; border-radius: 3px;box-shadow: 0px 4px 8px rgba(0,0,0,0.15);">

                                                <div class="content"
                                                    style=" display: flex;flex-wrap: wrap;align-items: center;justify-content: space-between;">
                                                    <div class="info">
                                                        <div class="name" style=" font-weight: 600;font-size: 17px;">
                                                            فرسان للمقاولات</div>
                                                        <div class="job"
                                                            style=" font-size: 12px;font-weight: 500;color: #17a2b8;    padding: 3px 0px 3px 0px;">
                                                            شركة | مقاولات</div>
                                                        <div class="stars" style="margin-top: 2px;">
                                                            <i class="fas fa-star" style=" color: #ffd203"></i>
                                                            <i class="fas fa-star" style=" color: #ffd203;"></i>
                                                            <i class="far fa-star" style=" color: #ffd203;"></i>
                                                            <i class="far fa-star" style=" color: #ffd203;"></i>
                                                            <i class="far fa-star" style=" color: #ffd203;"></i>
                                                        </div>
                                                    </div>
                                                    <div class="image"
                                                        style=" height: 75px;width: 75px; padding: 3px;background: #17a2b8;border-radius: 50%;">
                                                        <img src="/image/1648718574.png"
                                                            alt=""
                                                            style="    background-color: white; border-color: #fff;height: 100%; width: 100%; object-fit: cover;border-radius: 50%;border: 2px solid #fff;">
                                                    </div>
                                                </div>

                                                <p style=" padding-top: 10px;">Lorem aliasry ipsum dolor sits ametans,
                                                    consectetur adipisicing
                                                    elitits. Expedita reiciendis itaque placeat thuratu, quasi yiuos
                                                    repellendus repudiandae deleniti ideas fuga molestiae, alias.</p> <i
                                                    class="fas fa-quote-left quote"
                                                    style=" font-size: 20px;color: #17a2b8;display: flow-root;text-align: end;padding-left: 20px;"></i>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div class="col-md-4 col-sm-12 price-card"
                                style="border-right: 1px solid rgb(238, 239, 241);">
                                <a href="/SubmitQuotes" class="btn btn-quotes-profile">الحصول
                                    على عرض سعر لمشروع</a>
                                <div
                                    style="width: 84%; height: 310px; margin-top: 5%; border-radius: 12px; margin-bottom: 5%;  box-shadow: rgb(236 233 233) 1px 1px 5px 2px;">

                                    <div style="border-bottom: 1px solid #eeeff1 ;">
                                        <h5
                                            style="padding-top: 8%; color: #f4a23e; text-align: center; padding-bottom: 10px;">
                                            عدد العقود المبرمة
                                        </h5>


                                    </div>
                                    <div
                                        style="    padding-right: 25px; text-align: right;  border-bottom: 1px solid #eeeff1 ;  padding-top: 15px;padding-bottom: 15px;">
                                        <span
                                            style=" color:#5f5f5f ;  text-align: right; padding-top: 10%;font-weight: 500; font-size: 13px;">
                                            تحسب عدد العقود المبرمة من خلال المنصة من تاريخ تسجيل المنشآة</span>

                                        <br>
                                        <span
                                            style="  text-align: right; padding-top: 10%;font-weight: 500; font-size: 13px; color:#5f5f5f ;">
                                            تاريخ التسجيل </span>
                                        <span style="color:#039ca4 ;">{{user.registration_date}}</span>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <span class="text-center mt-3"
                                                style=" font-size: 350%;font-weight: bold; color:#039ca4;">{{user.contract}}</span><br>

                                        </div>
                                        <div class="col-md-12 text-center">
                                            <span style=" font-size: 25px; color:#039ca4;">
                                                عقد</span>
                                        </div>
                                    </div>

                                </div>
                                <a href="/SubmitQuotes" class="btn btn-report-profile">تقديم
                                    بلاغ على المنشآة</a>
                                <br>

                                <br><br>
                                <a :href="'/chat/'+user.id" class="btn-chat-profile"><i
                                        class="far fa-comment-alt mb-2" style="font-size:25px;color:#039ca4;"></i><small
                                        style="    position: relative;top: 15px;left: 65px;">محادثة مع
                                        المنشآة</small></a>
                                <br><br><br><br>
                            </div>


                        </div>


                    </div>
                </div>


            </div>
        </div>


    </div>
</template>

<script>
import "vue3-circle-progress/dist/circle-progress.css";
import CircleProgress from "vue3-circle-progress";

import {
    Carousel,
    Slide,
    Pagination,
    // Navigation
} from 'vue3-carousel';

import 'vue3-carousel/dist/carousel.css';
import axios from 'axios';
export default {

    methods: {

        openCity(evt, cityName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active-profile", "");
            }
            document.getElementById(cityName).style.display = "block";

            evt.currentTarget.className += " active-profile";
        },
    },

    components: {
        CircleProgress, Carousel,
        Slide,
        Pagination,
    },
    async mounted() {
        var id = this.$route.params.id;
        var element = document.getElementById("buttonlinks");
        element.classList.add("active-profile");
        document.getElementById('London').style.display = "block";
        const { data } = await axios.get(
            '/api/profile/' + id + '/details'
        );
        this.user = data;
         document.title = window.site.site_name+' - '+data['name'] +' - '+'الملف الشخصي';
        this.projects = data['projects'];
        console.log(data);
    },
    data: () => ({
        carouselItems: [{
            id: 1,
            image: '/image/1653999463.Article1015241.jpg',
            title: 'مشروع تأثيث مبنى في طريق النهضة',
            location: 'الرياض - طريق النهضة',
            category: 'التصنيف: أثاث',
            description: 'Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. ',
        },
        {
            id: 2,
            image: '/image/1653999463.Article1015241.jpg',
            title: 'مشروع تأثيث مبنى في طريق النهضة',
            location: 'الرياض - طريق النهضة',
            category: 'التصنيف: أثاث',
            description: 'Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. ',
        },
        {
            id: 3,
            image:'/image/1653999463.Article1015241.jpg',
            title: 'مشروع تأثيث مبنى في طريق النهضة',
            location: 'الرياض - طريق النهضة',
            category: 'التصنيف: أثاث',
            description: 'Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis..',
        },
        {
            id: 4,
            image: '/image/1653999463.Article1015241.jpg',
            title: 'مشروع تأثيث مبنى في طريق النهضة',
            location: 'الرياض - طريق النهضة',
            category: 'التصنيف: أثاث',
            description: 'Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis..',
        },
        {
            id: 5,
            image: '/image/1653999463.Article1015241.jpg',
            title: 'مشروع تأثيث مبنى في طريق النهضة',
            location: 'الرياض - طريق النهضة',
            category: 'التصنيف: أثاث',
            description: 'Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. ',
        },
        ],
        settings: {

            snapAlign: 'center',
            // transition:300
        },
        breakpoints: {
            // 700px and up
            500: {
                itemsToShow: 1,
                snapAlign: 'center',
            },
            // 1024 and up
            1024: {
                itemsToShow: 2,
                snapAlign: 'start',
            },
        },
        user: [],
        projects: [],
    }),
}


</script>
<style>
/* Style the tab */
.tab {
     overflow: hidden;
    border: 1px solid #ccc;
    border-radius: 30px;
    padding: 4px;
    
}

/* Style the buttons inside the tab */



/* Create an active/current tablink class */

/* Style the tab content */
</style>
<style>
table {
    border-collapse: unset;
    width: 100%;
}
</style>