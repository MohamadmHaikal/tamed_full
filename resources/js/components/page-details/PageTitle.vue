<template>
    <div class=" " style="position: relative; 
 
    background-color: #039ca4;
    padding-top: 105px;
    padding-bottom: 25px;">
        <div class="containp  container">
            <div v-if="ttype == 'projects'" class=" text-left">
                <p style="color:white; margin-bottom: 30px;"> الصفحة الرئيسية / مشاريع المقاولات</p>
                <h5 style="color:white;     margin-bottom: 5px;">مشاريع المقاولات </h5>
            </div>
            <div v-else-if="ttype == 'auction-deals'" class=" text-left">
                <p style="color:white; margin-bottom: 30px;"> الصفحة الرئيسية / الصفقات / المزادات</p>
                <h5 style="color:white;     margin-bottom: 5px;">الصفقات / المزادات</h5>
            </div>
            <div v-else-if="ttype == 'materials'" class=" text-left">
                <p style="color:white; margin-bottom: 30px;"> الصفحة الرئيسية / الحصول على المواد</p>
                <h5 style="color:white;     margin-bottom: 5px;">الحصول على المواد </h5>
            </div>
            <div v-else-if="ttype == 'contracts'" class=" text-left">
                <p style="color:white; margin-bottom: 30px;"> الصفحة الرئيسية / الآمان لعمليات التعاقدات</p>
                <h5 style="color:white;     margin-bottom: 5px;">الآمان لعمليات التعاقدات</h5>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'PageTitle',
    mounted() {
        var ttype = this.$route.params.type;
        this.ttype = ttype;
    },
    data: () => ({

        ttype: '',

    }),
}
</script>