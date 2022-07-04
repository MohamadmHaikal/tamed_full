<template>
    <div class="feedback-area ptb-70 bg-f7fafd">
        <div class="container">
            <div class="section-title">
                <h2>What customers say about Us</h2>
                <div class="bar"></div>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>

            <div class="feedback-slides">
                <Carousel 
                    dir="rtl"
                    :autoplay="5000"
                    :settings="settings"
                    :wrap-around="true"
                    :breakpoints="breakpoints"
                >
                    <slide v-for="slide in carouselItems" :key="slide.id">
                        <div class="single-feedback">
                            <div class="client-img">
                                <img :src="slide.image" alt="image">
                            </div>

                            <h3>{{slide.name}}</h3>
                            <span>{{slide.position}}</span>
                            <p>{{slide.description}}</p>
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
    name: 'ManagePortfolio',
    components: {
        Carousel,
        Slide,
        Navigation,
    },
    data: () => ({
        carouselItems: [
            {
                id: 1,
                image: require('../../assets/images/clients/client-1.jpg'),
                name: 'John Lucy',
                position: 'Web Developer',
                description: 'Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            },
            {
                id: 2,
                image: require('../../assets/images/clients/client-2.jpg'),
                name: 'John Smith',
                position: 'Web Developer',
                description: 'Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            },
            {
                id: 3,
                image: require('../../assets/images/clients/client-3.jpg'),
                name: 'Ross Taylor',
                position: 'Web Developer',
                description: 'Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            },
            {
                id: 4,
                image: require('../../assets/images/clients/client-4.jpg'),
                name: 'James Anderson',
                position: 'Web Developer',
                description: 'Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            },
            {
                id: 5,
                image: require('../../assets/images/clients/client-5.jpg'),
                name: 'Steven Smith',
                position: 'Web Developer',
                description: 'Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            },
        ],
        settings: {
            itemsToShow: 1,
            snapAlign: 'center',
        },
    }),
})
</script>