<template>
    <div class="featured-boxes-area">
        <div class="container">
            <div class="featured-boxes-inner">
                <div class="row m-0">
                    <div class="col-lg-3 col-sm-6 col-md-6 p-0">
                        <div class="single-featured-box">
                            <div class="icon color-fb7756">
                               <img src="../../assets/images/projectMain.png" alt="">
                            </div>

                            <h3>مشاريع المقاولات</h3>
                            <p>تقدم تعميد خدمة نشر مشاريع المقاولات الخاصة للمنشآت ومنخلال نشر المشروع سيتم ارساله الى جميع منشآت التشيد والبناء في المملكة وخلال ساعات سيتم ارسال عرو ض الأسعار وبعدها يمكنك اختيارالعرض المناسب</p>

                            <router-link :to="{ name: 'blog', params: { type: 'projects' } }" class="read-more-btn">اقرأ أكثر</router-link>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 col-md-6 p-0">
                        <div class="single-featured-box">
                            <div class="icon color-facd60">
                           <img src="../../assets/images/dealsMain.png" alt="">

                            </div>

                            <h3>الصفقات / المزادات</h3>
                            <p>تقدم تعميد خدمة نشر مشاريع المقاولات الخاصة للمنشآت ومنخلال نشر المشروع سيتم ارساله الى جميع منشآت التشيد والبناء في المملكة وخلال ساعات سيتم ارسال عرو ض الأسعار وبعدها يمكنك اختيارالعرض المناسب</p>

                            <router-link :to="{ name: 'blog', params: { type: 'auction-deals' } }" class="read-more-btn">اقرأ أكثر</router-link>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 col-md-6 p-0">
                        <div class="single-featured-box">
                            <div class="icon color-1ac0c6">
                               <img src="../../assets/images/materialMain.png" alt="">
                            </div>

                            <h3>الحصول على المواد</h3>
                            <p>تقدم تعميد خدمة نشر مشاريع المقاولات الخاصة للمنشآت ومنخلال نشر المشروع سيتم ارساله الى جميع منشآت التشيد والبناء في المملكة وخلال ساعات سيتم ارسال عرو ض الأسعار وبعدها يمكنك اختيارالعرض المناسب</p>

                            <router-link :to="{ name: 'blog', params: { type: 'materials' } }" class="read-more-btn">اقرأ أكثر</router-link>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 col-md-6 p-0">
                        <div class="single-featured-box">
                            <div class="icon">
                                <i class="flaticon-shield"></i>
                            </div>

                            <h3>الآمان لعمليات التعاقدات</h3>
                            <p>تقدم تعميد خدمة نشر مشاريع المقاولات الخاصة للمنشآت ومنخلال نشر المشروع سيتم ارساله الى جميع منشآت التشيد والبناء في المملكة وخلال ساعات سيتم ارسال عرو ض الأسعار وبعدها يمكنك اختيارالعرض المناسب</p>

                            <router-link :to="{ name: 'blog', params: { type: 'contracts' } }" class="read-more-btn">اقرأ أكثر</router-link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'Featured'
    }
</script>