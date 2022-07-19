<template>
    <div>
        <div class="about-area ptb-70">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-12">
                        <div class="about-content">
                            <div class="row">
                                <div class="col-md-11 col-11">
                                    <h2> نبذة مختصرة عن منصة تعميد</h2>
                                </div>
                                <div class="col-md-1 col-1"><i class="fa fa-quote-left"></i></div>
                            </div>


                            <p>تم تصميم وبرمجة منصة وتطبيق تعميد لتلبية احتياجات قطاعات التشيد و البناء في المملكة ولحل
                                بعض المشاكل التي تواجها المنشآت من الحصول على عروض الاسعار للمشاريع والمواد او المعدات
                                وغيرها.فقامت تعميد بتلبيه احتياجات هذا القطاع لتكون منصة تعميد منصة وطنية وخدمية لفئات
                                قطاع التشيد و البناء.كما قامت تعميد بتوفير عدة ميزات للشركات منها/ سهولةالتعاقدات مع
                                الشركات/انشاءالعقود الالكترونية مباشرة واصدار فواتير المبيعات والمشتريات بالاضافة الى
                                خدمات تمويل العقود المقدمة من مزودي خدمات التمويل.والمزيد من الميزات المتطورة و
                                الحديثةالتي تساعدالشركات وتنظيم اعمالهم .</p>
                            <i class="fa fa-quote-left mt-4"></i>
                            <div class="mt-5 text-center">

                                <p>وتعتمد المنصة على الذكاء التقني وتم برمجتها بكفاءه عالية بأفضل التقنيات المتطورة</p>
                                <p class="foot">
                                    خاصة وأن حكومتنا الرشيدة شجعت وساندت هذا القطاع تحت قيادة خادم الحرمين الشريفين
                                    ( الملك سلمان بن عبدالعزيز آل سعود و ولي عهده الأمير محمد بن سلمان بن عبدالعزيز آل
                                    سعود )
                                    حفظهم الله ورعاه</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                        <div class="about-image">
                            <img src="../../assets/images/about-tamed.jpg" alt="image" width="546px" height="437px">

                            <!-- <div class="video-btn popup-youtube" v-on:click="isPopupMethod(isPopup)"
                                style="cursor: pointer">
                                <i class='fas fa-play'></i>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="popup-video" v-if="isPopup">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="popup-overlay-close" v-on:click="isPopupMethod(isPopup)">
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
    name: 'About',
    data() {
        return {
            isPopup: false,
        }
    },
    methods: {
        isPopupMethod(isPopup) {
            return this.isPopup = !isPopup
        },
    },
}
</script>