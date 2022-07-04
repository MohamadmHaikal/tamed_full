<template>
    <div>
        <div class="success-story-area ptb-70 pt-0">
            <div class="container">
                <div class="section-title">
                    <h2>Business success story</h2>
                </div>

                <div class="success-story-inner">
                    <div class="single-success-story-box">
                        <div class="row m-0 align-items-center">
                            <div class="col-lg-6 col-md-6 p-0">
                                <div class="content">
                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto.</p>
                                    <h3>John Smith <span>CTO at EnvyTheme</span></h3>
                                    <div 
                                        class="btn btn-primary popup-youtube"
                                        v-on:click="isPopupMethod(isPopup)"
                                        style="cursor: pointer"
                                    >
                                        Watch Video
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 p-0">
                                <div class="image">
                                    <img src="../../assets/images/success-story1.jpg" alt="image">
                                </div>
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
    name: 'Projects',
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