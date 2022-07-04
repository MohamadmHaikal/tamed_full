<template>
    <div class="section-area ptb-70 pt-0">
        <div class="containp  container">
            <div class="section-title">
                <div class="row">
                    <div class="col-md-6  row-col-with" style="    width: 50%;">
                        <h4 class="project-title-section">أحدث المشاريع</h4>

                    </div>
                    <div class="col-md-6   " style="    width: 50%;">
                        <router-link to="/projects" class="button"> عرض الجميع </router-link>

                    </div>
                </div>
            </div>
            <div class="feedback-slides">
                <carousel :autoplay="carouselItems.length > 3 ? 5000 : 9000" :settings="settings" :wrap-around="true"
                    :breakpoints="breakpoints">
                    <slide v-for="slide in carouselItems" :key="slide.id">

                        <div v-if="slide.id != '!!'" class="single-section-post">
                            <div class="section-image">
                                <div class="rtl-d6rd6l">
                                    <span class="rtl-rb483s">{{ slide.seenCount }}</span>
                                    <div class="rtl-kknodv">
                                        <i class="far fa-eye"></i>
                                    </div>
                                </div>
                                <img :src="slide.cover" alt="image">
                                <div class="date">
                                    <i class="far fa-calendar-alt"></i> {{ slide.created }}
                                </div>
                            </div>

                            <div class="section-post-content">
                                <div class="row section-title">
                                    <h6>
                                        <router-link :to="{ name: 'details', params: { projectId: slide.id } }">{{
                                                slide.title
                                        }}</router-link>
                                    </h6>

                                    <span>{{ slide.city }} - {{ slide.neighborhood }} <i
                                            class="fas fa-map-marker-alt font-15"></i></span>
                                    <br>
                                    <div v-if="slide.status == 1" class="UnSigned">
                                        <p>
                                            لم التوقيع بعد
                                        </p>
                                    </div>
                                    <div v-else class="Signed">
                                        <p>
                                            تم التوقيع
                                        </p>
                                    </div>
                                    <span class="activity">{{ slide.activity }} &nbsp; <svg viewBox="0 0 64 64"
                                            width="15px" height="24px">
                                            <g fill="#ababab">
                                                <path
                                                    d="M62,11A8.99,8.99,0,0,0,45.935,5.443,29.994,29.994,0,1,0,62,32a29.614,29.614,0,0,0-2.783-12.595C60.744,16.577,62,13.5,62,11ZM53,4a7.009,7.009,0,0,1,7,7c0,4.507-5.027,11.7-7,14.354C51.026,22.7,46,15.512,46,11A7.009,7.009,0,0,1,53,4ZM4,32a28.081,28.081,0,0,1,.258-3.747l6.486,1.714a.987.987,0,0,0,.572-.019L17.162,28H22v5a1,1,0,0,0,1,1h3.279l1.667,5-1.894,5.684A1,1,0,0,0,27,46h4.612l-1.56,4.684a.977.977,0,0,0,0,.632L31.612,56H29a1,1,0,0,0-1,1v2.71A28.039,28.039,0,0,1,4,32ZM32,60c-.673,0-1.339-.032-2-.079V58h3a1,1,0,0,0,.948-1.316L32.054,51l1.894-5.684A1,1,0,0,0,33,44H28.388l1.56-4.684a.977.977,0,0,0,0-.632l-2-6A1,1,0,0,0,27,32H24V27a1,1,0,0,0-1-1H17a1,1,0,0,0-.316.052l-5.717,1.905L4.591,26.272a28.045,28.045,0,0,1,26.7-22.254L32.946,9l-1.894,5.684a.977.977,0,0,0,0,.632L32.946,21l-1.894,5.684A1,1,0,0,0,31,27v6a1,1,0,0,0,1.316.948L38,32.054l5,1.667V39a1,1,0,0,0,1,1h5v4a1,1,0,0,0,1,1h6.788A28.022,28.022,0,0,1,32,60ZM60,32a27.844,27.844,0,0,1-2.254,11H51V39a1,1,0,0,0-1-1H45V33a1,1,0,0,0-.684-.948l-6-2a.991.991,0,0,0-.632,0L33,31.612v-4.45l1.948-5.846a.977.977,0,0,0,0-.632L33.054,15l1.894-5.684a.977.977,0,0,0,0-.632L33.4,4.045a27.961,27.961,0,0,1,11.477,3.1A8.926,8.926,0,0,0,44,11c0,6.278,7.884,16.2,8.219,16.625a1,1,0,0,0,1.562,0,63.369,63.369,0,0,0,4.2-6.057A27.64,27.64,0,0,1,60,32Z">
                                                </path>
                                                <path
                                                    d="M53,16a5,5,0,1,0-5-5A5.006,5.006,0,0,0,53,16Zm0-8a3,3,0,1,1-3,3A3,3,0,0,1,53,8Z">
                                                </path>
                                                <path
                                                    d="M15,32a7.009,7.009,0,0,0-7,7c0,4.29,5.648,10.063,6.293,10.707a1,1,0,0,0,1.414,0C16.352,49.063,22,43.29,22,39A7.009,7.009,0,0,0,15,32Zm0,15.551c-1.853-2.02-5-5.985-5-8.551a5,5,0,0,1,10,0C20,41.566,16.853,45.531,15,47.551Z">
                                                </path>
                                                <path
                                                    d="M15,36a3,3,0,1,0,3,3A3,3,0,0,0,15,36Zm0,4a1,1,0,1,1,1-1A1,1,0,0,1,15,40Z">
                                                </path>
                                            </g>
                                        </svg> </span>
                                </div>
                                <div class="row">

                                    <div class="col-md-6 col-xs-12 section-title date-end">
                                        <span>اخر موعد تقديم {{ slide.created }}</span>
                                        <br>
                                        <router-link :to="{ name: 'details', params: { projectId: slide.id } }"
                                            class="show btn-animation-project">تقديم عرض</router-link>
                                    </div>
                                    <div class="col-md-6 col-xs-12 price">
                                        <p>قيمة المشروع</p>
                                        <span v-if="slide.pricestatus == 'on'">الأفضل سعر</span>
                                        <span v-else>{{ slide.price }}</span>
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
    // Navigation
} from 'vue3-carousel';
import axios from 'axios';
import 'vue3-carousel/dist/carousel.css';

export default defineComponent({
    name: 'SectionProject',
    components: {
        Carousel,
        Slide,
        Pagination,
        // Navigation,
    },
    data: () => ({
        carouselItems: [
            {
                id: '!!',
                image: require('../../assets/images/blog/blog-1.jpg'),
                title: 'مشروع تأثيث مبنى في طريق النهضة',
                location: 'الرياض - طريق النهضة',
                category: 'التصنيف: أثاث',
                description: 'Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. ',
            },
        ],
        rial: 'ريال',
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
            '/api/ads/1/all'
        );
        data = data['data'];
        data.forEach(element => {
            element.price = new Intl.NumberFormat('ar', { style: 'currency', currency: 'SAR' }).format(element.price);
        });
        this.carouselItems = data;

    }
})
</script>