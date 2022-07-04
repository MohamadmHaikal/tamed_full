<template>
    <div class="invoicing-area ptb-70">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12">
                    <div class="invoicing-content">
                        <h2>نظام متكامل للعقود / والفواتير الالكترونية</h2>
                        <div class="bar"></div>
                        <p>ظام متكامل يتيح للمنشآة إنشاء العقود الالكترونية والفواتير الالكترونية منمنشآة الى منشآة او من منشأة الى فرد مطابق لشروط هيئة الزكاه والدخل</p>
                        <router-link :to="{ name: 'blog', params: { type: 'contracts' } }" class="btn reg btn-warning btn-animation">
                           التفاصيل
                        </router-link>
                    </div>
                </div>

                <div class="col-lg-6 col-md-12">
                    <div class="invoicing-image">
                        <div class="main-image">
                            <img src="../../assets/images/invoicing/invoicing-1.png" alt="image">
                            <img src="../../assets/images/invoicing/invoicing-2.png" alt="image">
                            <img src="../../assets/images/invoicing/invoicing-3.png" alt="image">
                            <img src="../../assets/images/invoicing/invoicing-4.png" alt="image">
                        </div>

                        <div class="main-mobile-image">
                            <img src="../../assets/images/invoicing/invoicing-main-pic.png" alt="image">
                        </div>

                        <div class="circle-image">
                            <img src="../../assets/images/invoicing/invoicing-circle-1.png" alt="image">
                            <img src="../../assets/images/invoicing/invoicing-circle-2.png" alt="image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'Invoicing'
    }
</script>