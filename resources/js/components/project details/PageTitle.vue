<template>
    <div class=" " style="position: relative; 
 
    background-color: #039ca4;
    padding-top: 105px;
    padding-bottom: 25px;">
        <div class="containp  container">
            <div v-if="type == '1'" class=" text-left">
                <p style="color:white; margin-bottom: 30px;"><a href="/" style="color: white;">الصفحة الرئيسية</a> / <a
                        href="/projects" style="color: white;">مشاريع مقاولات</a> / <a :href="route"
                        style="color: white;">{{ ads.title }}</a></p>
                <h5 style="color:white;     margin-bottom: 5px;">تفاصيل المشروع</h5>
            </div>
            <div v-else-if="type == '2'" class=" text-left">
                <p style="color:white; margin-bottom: 30px;"><a href="/" style="color: white;">الصفحة الرئيسية</a> / <a
                        href="/factory-materials" style="color: white;">مواد و مصانع </a> / <a
                        :href="route" style="color: white;"> {{ads.title}}</a> </p>
                <h5 style="color:white;     margin-bottom: 5px;">تفاصيل المشروع</h5>
            </div>
            <div v-else-if="type == '3'" class=" text-left">
                <p style="color:white; margin-bottom: 30px;"> <a href="/" style="color: white;">الصفحة الرئيسية</a> / <a
                        href="/raw-materials" style="color: white;">مواد خام </a> / <a :href="route"
                        style="color: white;"> {{ads.title}}</a></p>
                <h5 style="color:white;     margin-bottom: 5px;">تفاصيل المشروع</h5>
            </div>
            <div v-else-if="type == '4'" class=" text-left">
                <p style="color:white; margin-bottom: 30px;"><a href="/" style="color: white;">الصفحة الرئيسية</a> / <a
                        href="/technique" style="color: white;">معدات </a> / <a :href="route"
                        style="color: white;"> {{ads.title}} </a></p>
                <h5 style="color:white;     margin-bottom: 5px;">تفاصيل المشروع</h5>
            </div>
            <div v-else-if="type == '5'" class=" text-left">
                <p style="color:white; margin-bottom: 30px;"> <a href="/" style="color: white;">الصفحة الرئيسية</a> / <a
                        href="/DealsAuctions" style="color: white;">الصفقات و المزادات</a> / <a :href="route"
                        style="color: white;"> {{ads.title}} </a></p>
                <h5 v-if="ads.infoArray.dealsOrAuction == 'صفقة'" style="color:white;     margin-bottom: 5px;">تفاصيل
                    الصفقة</h5>
                <h5 v-else style="color:white;     margin-bottom: 5px;">تفاصيل المزاد</h5>
            </div>
            <div v-else-if="type == '7'" class=" text-left">
                <p style="color:white; margin-bottom: 30px;"><a href="/" style="color: white;">الصفحة الرئيسية</a> / <a
                        href="/technique" style="color: white;">مشاريع تقنية </a> / <a :href="route"
                        style="color: white;">{{ads.title}}</a> </p>
                <h5 style="color:white;margin-bottom: 5px;">تفاصيل المشروع</h5>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
export default {

    name: 'PageTitle',
    async mounted() {
        var id = this.$route.params.projectId;
        var data = await axios.get(
            '/api/ads/' + id + '/details'
        );
        this.ads = data['data'];
        this.type = data['data']['type'];
        this.route = this.$route.path;

    },
    data: () => ({
        type: '',
        ads: [],
        route: ''
    }),
}
</script>