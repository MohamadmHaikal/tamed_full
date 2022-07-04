 <template>
      <div>
        <div class="about-area pb-70">
            <div class="container">
            <div class="row ">
          <div class="col-md-12">
         
    <carousel :autoplay="500000" :settings="settings" :wrap-around="true" :breakpoints="breakpoints">
        <slide v-for="slide in carouselItems" :key="slide.id">
     

            <div class="single-section-post">
                <div class="section-image">
                    <router-link to="/blog-details">
                        <img :src="slide.image" alt="image">
                    </router-link>

                    <div class="date">
                        <i class="far fa-calendar-alt"></i> 2022-04-08
                    </div>
                </div>

                <div class="section-post-content">
                    <div class="row section-title">
                        <h6>
                            <router-link to="/blog-details">{{ slide.title }}</router-link>
                        </h6>

                        <span>{{ slide.location }}<br>{{ slide.category }}</span>
                    </div>
                    <div class="row">

                        <div class="col-md-6 section-title">
                            <span>اخر موعد تقديم 08/05/2022</span>
                            <a class="show">تقديم عرض</a>
                        </div>
                        <div class="col-md-6 price">
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
            carouselItems: [{
                    id: 1,
                    image: require('../../assets/images/blog/blog-1.jpg'),
                    title: 'مشروع تأثيث مبنى في طريق النهضة',
                    location: 'الرياض - طريق النهضة',
                    category: 'التصنيف: أثاث',
                    description: 'Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. ',
                },
                {
                    id: 2,
                    image: require('../../assets/images/blog/blog-2.jpg'),
                    title: 'مشروع تأثيث مبنى في طريق النهضة',
                    location: 'الرياض - طريق النهضة',
                    category: 'التصنيف: أثاث',
                    description: 'Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. ',
                },
                {
                    id: 3,
                    image: require('../../assets/images/blog/blog-3.jpg'),
                    title: 'مشروع تأثيث مبنى في طريق النهضة',
                    location: 'الرياض - طريق النهضة',
                    category: 'التصنيف: أثاث',
                    description: 'Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis..',
                },
                {
                    id: 4,
                    image: require('../../assets/images/blog/blog-3.jpg'),
                    title: 'مشروع تأثيث مبنى في طريق النهضة',
                    location: 'الرياض - طريق النهضة',
                    category: 'التصنيف: أثاث',
                    description: 'Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis..',
                },
                {
                    id: 5,
                    image: require('../../assets/images/blog/blog-2.jpg'),
                    title: 'مشروع تأثيث مبنى في طريق النهضة',
                    location: 'الرياض - طريق النهضة',
                    category: 'التصنيف: أثاث',
                    description: 'Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. ',
                },
            ],
            settings: {
                itemsToShow: 2,
                snapAlign: 'center',
                // transition:300
            },
        }),
    })
</script>
<style>
.carousel__slide{

width: 27%;
    
} 
</style>