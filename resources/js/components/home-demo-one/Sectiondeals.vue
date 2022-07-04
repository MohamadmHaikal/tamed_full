<template>
    <div class="blog-area ptb-70 pt-0">
        <div class="containp  container">
            <!-- <div class="section-title" >
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="deal-title">الصفقات و المزادات</h4>

                    </div>

                    <div class="col-md-6">
                <a href="/contact" class="button">جميع الخدمات</a>

                    </div>
                </div>
            </div> -->
            <div class="section-title">
                <div class="row">
                    <div class="col-md-6  row-col-with mt-1" style="    width: 50%;">
                        <h4 class="project-title-section">الصفقات و المزادات</h4>

                    </div>
                    <div class="col-md-6   " style="    width: 50%;">
                        <router-link to="/DealsAuctions" class="button"> عرض الجميع </router-link>

                    </div>
                </div>
            </div>

            <div class="feedback-slides">
                <carousel :autoplay="carouselItems.length > 3 ? 3500 : 90000" :settings="settings" :wrap-around="true"
                    :breakpoints="breakpoints">
                    <slide v-for="slide in carouselItems" :key="slide.id">

                        <div class="single-deals-post">

                            <div class="deals-post-content">
                                <div class="row section-title">
                                    <span style="padding-right: 0;">{{ slide.authorName }}</span>
                                    <h5 class="titleDEals" style="padding-right: 0;">
                                        <router-link to="/deals-auctions-details">{{ slide.title }}</router-link>
                                        <i class="fas fa-angle-left	"></i>
                                    </h5>

                                    <p class="desc" style="padding-right: 0;">{{ slide.description }}</p>


                                </div>
                                <div class="row">

                                    <span v-if="slide.dealsOrAuction == 'مزاد'">ينتهي المزاد في</span>
                                    <span v-else>تنتهي الصفقة في</span>
                                    <div>
                                        <Countdown :deadline="slide.startdate" :showLabels="false"
                                            :mainFlipBackgroundColor="slide.dealsOrAuction == 'مزاد' ? '#d7a358' : '#019aa2'"
                                            :secondFlipBackgroundColor="slide.dealsOrAuction == 'مزاد' ? '#d7a358' : '#019aa2'"
                                            countdownSize="1.1rem" mainColor="#ffff" />

                                    </div>
                                </div>

                                <div class="row pt">
                                    <div class="col-md-6 col-sm-6  price-deals " style="width: 50%;">


                                        <router-link :to="{ name: 'details', params: { projectId: slide.id } }"
                                            class="btn link btn-animation"
                                            style="margin-top: 5px; padding: 5px 1px 5px 1px;"> {{ 'شارك بال' +
                                                    slide.dealsOrAuction
                                            }}
                                        </router-link>
                                    </div>
                                    <div class="col-md-6 col-sm-6 pt-2 price-deals" style="width: 50%;">
                                        <h6 v-if="slide.dealsOrAuction == 'مزاد'" class="typeDeals">سعر المشاركة بالمزاد
                                        </h6>
                                        <h6 v-else class="typeDeals">صفقة بقيمة</h6>
                                        <span v-if="slide.pricestatus == 'on'" style="color: #f4a032;"> الأفضل
                                            سعر</span>
                                        <span v-else style="color: #f4a032;">{{ slide.price }}</span>
                                    </div>

                                </div>

                            </div>
                        </div>

                    </slide>

                    <template #addons>
                        <!-- <Navigation /> -->
                        <div v-if="carouselItems.length > 3 || width < 600">
                            <Pagination />
                        </div>
                    </template>
                </carousel>
            </div>
        </div>
    </div>


</template>

<script>
import {
    defineComponent
} from 'vue';
import {
    Carousel,
    Slide,
    Pagination,
} from 'vue3-carousel';
import {
    Countdown
} from 'vue3-flip-countdown'

import 'vue3-carousel/dist/carousel.css';
import axios from 'axios';
export default defineComponent({
    name: 'Sectiondeals',
    components: {
        Countdown,
        Carousel,
        Slide,
        Pagination,
    },
    data: () => ({
        carouselItems: [{
            id: 1,
            title: 'استشارات و تصميم نماذج الأعمال',
            typeDeals: 'صفقة بقيمة',
            price: '500000 ريال',
            button: 'شراء',
            color: '#ebde46',
            description: 'تتيح خدمة تحديد و تعريف التحديات لمنسوبي الجهات الحكوميةتتيح خدمة تحديد و تعريف التحديات لمنسوبي الجهات الحكوميةتتيح خدمة تحديد و تعريف التحديات لمنسوبي الجهات الحكوميةتتيح خدمة تحديد و تعريف التحديات لمنسوبي الجهات الحكومية',
        },

        ],
        settings: {

            snapAlign: 'center',
        },
        breakpoints: {
            // 700px and up
            500: {
                itemsToShow: 1,
                snapAlign: 'center',
            },
            // 1024 and up
            1024: {
                itemsToShow: 3,
                snapAlign: 'start',
            },
        },
        width: 0,
    }),
    async mounted() {
        let width = screen.width;
        this.width = width;
        let { data } = await axios.get(
            '/api/ads/5/all'
        );
        data = data['data'];
        data.forEach(element => {
            element.price = new Intl.NumberFormat('ar', { style: 'currency', currency: 'SAR' }).format(element.price);
        });
        this.carouselItems = data;

    }
})

</script>
