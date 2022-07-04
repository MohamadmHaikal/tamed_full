<template>
    <div class="testimonials-wrap-area ptb-100">
        <div class="container">
            <div class="testimonials-wrap-slides">
                <carousel 
                    dir="rtl"
                    :autoplay="5000"
                    :settings="settings"
                    :wrap-around="true"
                    :breakpoints="breakpoints"
                >
                    <slide v-for="slide in carouselItems" :key="slide.id">
                        <div class="testimonials-card">
                            <p>{{slide.description}}</p>
                            <div class="information d-flex align-items-center justify-content-center">
                                <img :src="slide.image" class="rounded-circle" alt="image">

                                <div class="title">
                                    <h3>{{slide.name}}</h3>
                                    <span>{{slide.position}}</span>
                                </div>
                            </div>
                            <div class="vector-icon-image">
                                <img src="../../assets/images/home-six/vector-icon.png" alt="icon">
                            </div>
                        </div>
                    </slide>

                    <template #addons>
                        <Navigation />
                    </template>
                </carousel>
            </div>
        </div>

        <div class="testimonials-wrap-shape">
            <img src="../../assets/images/home-six/vector-shape-2.png" alt="image">
        </div>
    </div>
</template>

<script>
import { defineComponent } from 'vue';
import { Carousel, Slide, Navigation } from 'vue3-carousel';

import 'vue3-carousel/dist/carousel.css';

export default defineComponent ({
    name: 'Testimonials',
    components: {
        Carousel,
        Slide,
        Navigation,
    },
    data: () => ({
        carouselItems: [
            {
                id: 1,
                description: 'But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself.',
                image: require('../../assets/images/home-six/user.png'),
                name: 'Alex Smith',
                position: 'Founder & CEO',
            },
            {
                id: 2,
                description: 'But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself.',
                image: require('../../assets/images/home-six/user.png'),
                name: 'Steven Smith',
                position: 'Web Developer',
            },
            {
                id: 3,
                description: 'But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself.',
                image: require('../../assets/images/home-six/user.png'),
                name: 'Sarah Taylor',
                position: 'Co-Founder',
            },
        ],
        settings: {
            itemsToShow: 1,
            snapAlign: 'center',
        },
    }),
})
</script>