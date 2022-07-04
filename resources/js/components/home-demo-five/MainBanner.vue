<template>
    <div class="home-area">
        <div class="container">
            <div class="home-slides">
                <Carousel 
                    dir="rtl"
                    :autoplay="5000"
                    :settings="settings"
                    :wrap-around="true"
                    :breakpoints="breakpoints"
                >
                    <slide v-for="slide in carouselItems" :key="slide.id">
                        <div class="banner-item">
                            <div class="row align-items-center m-0">
                                <div class="col-lg-6 col-md-12 p-0">
                                    <div class="banner-item-content">
                                        <h1>{{slide.heading}}</h1>
                                        <p>{{slide.description}}</p>
                                        <router-link :to="slide.btnLink" class="btn btn-primary">
                                            {{slide.btnText}}
                                        </router-link>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 p-0">
                                    <div class="banner-item-image">
                                        <img :src="slide.image" alt="banner-image">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </slide>
                    
                    <template #addons>
                        <Navigation />
                    </template>
                </Carousel>
            </div>
        </div>
    </div>
</template>

<script>
import { defineComponent } from 'vue';
import { Carousel, Slide, Navigation } from 'vue3-carousel';

import 'vue3-carousel/dist/carousel.css';

export default defineComponent ({
    name: 'MainBanner',
    components: {
        Carousel,
        Slide,
        Navigation,
    },
    data: () => ({
        carouselItems: [
            {
                id: 1,
                heading: 'Easy, fee-free banking for entrepreneurs',
                description: 'Get the financial tools and insights to start, build, and grow your business.',
                btnText: 'Get Started',
                btnLink: '/contact',
                image: require('../../assets/images/banner/banner-4.jpg'),
            },
            {
                id: 2,
                heading: 'Easy, fee-free banking for entrepreneurs',
                description: 'Get the financial tools and insights to start, build, and grow your business.',
                btnText: 'Get Started',
                btnLink: '/contact',
                image: require('../../assets/images/banner/banner-5.jpg'),
            },
        ],
        settings: {
            itemsToShow: 1,
            snapAlign: 'center',
        },
    }),
})
</script>