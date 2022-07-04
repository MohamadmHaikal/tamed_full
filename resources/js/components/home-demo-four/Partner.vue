<template>
    <div class="partner-area-two ptb-70">
        <div class="container">
            <div class="partner-slider owl-carousel owl-theme">
                <carousel
                    dir="rtl"
                    :autoplay="5000"
                    :settings='settings' 
                    :breakpoints='breakpoints'
                >
                    <Slide v-for="slide in carouselItems" :key="slide.id">
                        <div class="single-partner-item">
                            <img :src="slide.image" alt="image">
                        </div>
                    </Slide>

                    <template #addons>
                    </template>
                </carousel>
            </div>
        </div>
    </div>
</template>

<script>
import { defineComponent } from 'vue';
import { Carousel, Slide  } from 'vue3-carousel';

import 'vue3-carousel/dist/carousel.css';

export default defineComponent ({
    name: 'Partner',
    components: {
        Carousel,
        Slide,
    },
    data: () => ({
        settings: {
            itemsToShow: 1,
            snapAlign: 'center',
        },
        carouselItems: [
            {
                id: 1,
                image: require('../../assets/images/partner1.png'),
            },
            {
                id: 2,
                image: require('../../assets/images/partner2.png'),
            },
            {
                id: 3,
                image: require('../../assets/images/partner3.png'),
            },
            {
                id: 4,
                image: require('../../assets/images/partner4.png'),
            },
            {
                id: 5,
                image: require('../../assets/images/partner5.png'),
            },
            {
                id: 1,
                image: require('../../assets/images/partner1.png'),
            },
        ],
        breakpoints: {
            0: {
                itemsToShow: 1,
                snapAlign: 'center',
			},
            576: {
                itemsToShow: 1,
                snapAlign: 'center',
            },
            768: {
                itemsToShow: 3,
                snapAlign: 'center',
            },
            1024: {
                itemsToShow: 4,
                snapAlign: 'center',
            },
            1200: {
                itemsToShow: 5,
                snapAlign: 'center',
            },
        },
    }),
})
</script>