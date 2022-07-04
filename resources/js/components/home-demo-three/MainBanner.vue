<template>
    <div>
        <div class="banner-section">
            <div class="container">
                <div class="row m-0 align-items-center">
                    <div class="col-lg-5 col-md-12 p-0">
                        <div class="hero-content">
                            <h1>Fast and easy business banking</h1>
                            <p>Get the financial tools and insights to start, build, and grow your business.</p>
                            <router-link to="/contact" class="btn btn-primary">
                                Create your account
                            </router-link>
                        </div>
                    </div>

                    <div class="col-lg-7 col-md-12 p-0">
                        <div class="hero-image">
                            <div class="main-image">
                                <img src="../../assets/images/banner/banner-1.png" alt="image">
                                <img src="../../assets/images/banner/banner-2.png" alt="image">
                                <img src="../../assets/images/banner/banner-3.png" alt="image">
                            </div>

                            <div class="main-mobile-image">
                                <img src="../../assets/images/banner/banner-main-pic.png" alt="image">
                            </div>

                            <div class="circle-image">
                                <img src="../../assets/images/banner/banner-circle.png" alt="image">
                            </div>
                            
                            <div class="video-btn">
                                <a 
                                    href="javascript:void(0)" 
                                    v-on:click="isPopupMethod(isPopup)"
                                >
                                    <i class="fas fa-play"></i> 
                                    Play Video
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div 
            class="popup-video" 
            v-if="isPopup"
        >
            <div class="d-table">
                <div class="d-table-cell">
                    <div 
                        class="popup-overlay-close"
                        v-on:click="isPopupMethod(isPopup)"
                    >
                        <div class="popup-overlay-close-line"></div>
                        <div class="popup-overlay-close-line"></div>
                    </div>
                    <div class="play-video">
                        <iframe src="https://www.youtube.com/embed/bk7McNUjWgw"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'MainBanner',
    data (){
        return {
            isPopup: false,
        }
    },
    methods: {
        isPopupMethod(isPopup){
            return this.isPopup = !isPopup
        },
    },
}
</script>