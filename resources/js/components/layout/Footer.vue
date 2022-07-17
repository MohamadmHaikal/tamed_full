<template>
    <div>
        <footer class="footer-area">
            <div class="containerfooter container ">
                <div class="row">

                    <div class="col-lg-3 col-sm-6 col-md-6 text-center footer-area-about">
                        <div class="single-footer-widget">
                            <div class="logo">
                                <router-link to="/" style="text-align: right;"><img
                                        src="../../assets/images/tamed-1.png" alt="logo" style="width: 50%; ">
                                </router-link>
                                <p>منصة تعميد لخدمات الأعمال بسجل تجاري رقم (1010811943) هي منصة خدمية للمنشآت والخدمات
                                    التسويقية بالنيابة عن الغير تم إنشائها لتقديم حلول متكاملة لقطاع التشيد والبناء
                                    والمصانع من طالبي الخدمات ومورين ومنفذين المشاريع في المملكة العربية السعودية بنظام
                                    سلس وسهل</p>
                            </div>


                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 col-md-6   col-6 footer-area-services text-center">
                        <div class="single-footer-widget pl-5">
                            <h3>الخدمات</h3>

                            <ul class="list">
                                <li>
                                    <a href="/login"> تسجيل حساب جديد </a>
                                </li>
                                <li>
                                    <a href="/blog/contracts">إنشاء عقد الكتروني</a>
                                </li>
                                <li>
                                    <a href="/blog/contracts">إنشاء الفواتير</a>
                                </li>
                                <!-- <li>
                                    <a href="javascript:void(0);">طلب تمويل عقد <span>قريباً</span></a>
                                </li> -->

                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 col-md-6 col-6 footer-area-services text-center">
                        <div class="single-footer-widget">
                            <h3>الاقسام</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <ul class="list">
                                        <li>
                                            <router-link to="/projects">المشاريع</router-link>
                                        </li>
                                        <li>
                                            <router-link to="/factory-materials">المواد</router-link>
                                        </li>
                                        <li>
                                            <router-link to="/DealsAuctions">الصفقات / المزادات</router-link>
                                        </li>

                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <ul class="list">
                                        <li>
                                            <router-link to="/jobs">الوظائف</router-link>
                                        </li>
                                        <li>
                                            <router-link to="/equipment">المعدات</router-link>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">مكاتب هندسية <span style="color: #039ca5;">قريباً</span>
                                            </a>
                                        </li>

                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 col-md-6 footer-area-contact-us ">
                        <div class="single-footer-widget">
                            <h3>تواصل معنا</h3>

                            <ul class="footer-contact-info" style="    padding-right: 0px;">
                                <li><span><i class="fas fa-map-marker-alt"
                                            style="font-size: 20px;    color: #62c1b6;"></i> &nbsp;</span>
                                    المملكة العربية السعودية / الرياض
                                </li>
                                <li><span><i class="fas fa-envelope" style="font-size: 20px;    color: #62c1b6;"></i>
                                        &nbsp;</span>
                                   tsf@tamed.sa ( أعمال )
                                </li>
                                <li><span><i class="fas fa-envelope" style="font-size: 20px;    color: #62c1b6;"></i>
                                        &nbsp;</span>
                                    tsi@tamed.sa ( أفراد )
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="copyright-area">
                    <div class="row">
                        <div class="col-md-4 col-sm-7 footer-area-priv">
                            <p style="border-left: solid 1px #a3b1b2;" class="parColor">جميع الحقوق محفوظة
                                ©2021 - منصة تعميد - المملكة العربية السعودية</p>
                            <span style="color: #62bbc0;">يدعم المتصفحات</span><img src="../../assets/images/125.png">
                        </div>


                        <div class="col-md-2 col-sm-3 col-1-5">
                            <p style="border-left: solid 1px #a3b1b2;" class="parColor">
                                <router-link to="/usage-policy" style="font-weight: unset;color: #039ca5;">
                                    سياسة الاستخدام
                                </router-link>
                            </p>
                        </div>
                        <div class="col-md-2 col-sm-2 col-1-5">
                            <p class="parColor">
                                <router-link to="/privacy-policy" style="font-weight: unset;color: #039ca5;">سياسة
                                    الخصوصية</router-link>
                            </p>
                        </div>

                        <div class="col align-self-center">
                            <img src="../../assets/images/stars-tech.png" class="stars-tech" alt="">
                        </div>
                        <div class="col align-self-center">
                            <img src="../../assets/images/628975da787bd.png" class="roya" alt="">
                        </div>
                    </div>
                </div>

            </div>

            <div class="map-image"><img src="../../assets/images/map.png" alt="map" style="width:50% ;"></div>
        </footer>
        <!-- End Footer Area -->

        <div @click="scrollToTop()" :class="['back-to-top-btn', { 'go-top': isTop }]">
            <i class="fas fa-arrow-up"></i>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Footer',
    data() {
        return {
            isTop: false,
            currentYear: new Date().getFullYear(),
        }
    },
    methods: {
        scrollToTop() {
            window.scrollTo(0, 0);
        },
    },
    mounted() {
        const that = this
        window.addEventListener('scroll', () => {
            let scrollPos = window.scrollY
            if (scrollPos >= 100) {
                that.isTop = true
            } else {
                that.isTop = false
            }
        })
    }
}
</script>