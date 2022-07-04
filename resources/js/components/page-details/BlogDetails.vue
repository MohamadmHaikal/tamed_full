<template>
    <div>
        <div class="about-area pb-70">
            <div class="containp  container">
                <div class="mt-2" style="text-align: -webkit-center;">
                    <div class="col-md-9 col-sm-12 mt-3 text-center">
                        <div class="text-end">
                            <div class="row mt-4">
                                <div class="col-md-4 col-sm-12 ">
                                </div>
                                <div class="col-md-3 col-sm-12 text-center fav-share">
                                    <span style="margin-right: 20px;">2655</span>
                                    <i class="far fa-eye"
                                        style="color: #019aa2;font-size: 20px;margin-right: 10px;"></i>
                                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512"
                                        style="enable-background:new 0 0 512 512; width: 20px;margin-right: 40px;"
                                        xml:space="preserve">
                                        <g>
                                            <polygon
                                                points="334.9,120.6 256,41.7 177.1,120.6 156.3,99.7 256,0 355.7,99.7 	" />
                                            <rect x="241.1" y="20.8" width="29.8" height="312.6" />
                                            <path
                                                d="M404.8,512H107.2c-25.3,0-44.7-19.4-44.7-44.7V199.4c0-25.3,19.3-44.7,44.7-44.7h104.2v29.8H107.2c-8.9,0-14.9,6-14.9,14.9 v267.9c0,8.9,6,14.9,14.9,14.9h297.7c8.9,0,14.9-6,14.9-14.9V199.4c0-8.9-6-14.9-14.9-14.9H300.7v-29.8h104.2c25.3,0,44.7,19.3,44.7,44.7v267.9C449.5,492.6,430.1,512,404.8,512z" />
                                        </g>
                                    </svg>
                                    <span style=" margin-right: 6px; margin-bottom:2px ;">المشاركة</span>

                                </div>
                            </div>

                        </div>
                        <div class="row" style="    padding-right: 0px; padding-left: 0px;">
                            <div class="col-md-7  col-sm-12 text-end mt-3 mb-4">
                                <div style="border-bottom: 1px solid rgb(238, 239, 241); padding-bottom: 5%;">
                                    <h6 style="margin-bottom: 18px;color:#00aeaf ;padding-top: 5%; font-weight: 500;">
                                        وصف الخدمة</h6>
                                    <p v-if="type == 'projects'"
                                        style="font-size: 14px;  font-weight: 500; max-width: 134ch;  color: rgb(13, 13, 13);">
                                        تقدم تعميد خدمة نشر مشاريع المقاولات الخاصة للمنشآت ومن خلال نشر المشروع سيتم
                                        ارساله إلى جميع منشآت التشيد والبناء
                                        التي بنفس الإختصاص في المملكة او مدينة محددة يتم تحديدها خلال نشر الإعلان
                                        وبعد نشر الإعلان سيتم ارسال عروض الاسعار لك من المنشآة التي تقدمت على المشروع
                                        الذي تم نشره
                                    </p>


                                    <p v-else-if="type == 'auction-deals'"
                                        style="font-size: 14px;  font-weight: 500; max-width: 134ch;  color: rgb(13, 13, 13);">
                                        تم انشاء نظام متكامل للصفقات والمزادات لمنصة تعميد يمكنك من نشر او شراء الصفقات
                                        او المزادات من خلال المنصة كما تتيح لك ادارة الطلبات بشكل منتضم
                                        من خلال لوحة التحكم الخاصة بك وحماية التعاملات المالية وتنظضيمها بين الاطرف

                                    </p>

                                    <p v-else-if="type == 'materials'"
                                        style="font-size: 14px;  font-weight: 500; max-width: 134ch;  color: rgb(13, 13, 13);">
                                        الحصول على المواد من خلال منصة تعميد تتيح للمنشآة انشاء اعلان بالمواد التي
                                        يحتاجها وارفاق المواصفات المطلوبة للمنتج وعند نشر الاعلان سيقوم النظام بارسال
                                        اشعار الى جميع المصانع او الموردين الذيين مختصين بنفس المجال وتقديم الاسعار لك.
                                    </p>
                                    <p v-else-if="type == 'contracts'"
                                        style="font-size: 14px;  font-weight: 500; max-width: 134ch;  color: rgb(13, 13, 13);">
                                        بعد الموافقة على عروض الاسعار لاي من خدمات تعميد تتيح لك المنصة انشاء العقود
                                        الالكترونية المبرمه بينك وبين الاطراف الاخرى بنظام متكامل ومتوافق
                                        مع مواصفات هيئة الزكاء والدخل كما تتيح لك اصدار المستخلصات عبر المنصة او
                                        الفواتير الالكترونية بشكل احترافي ومنظم .

                                    </p>
                                    <p v-if="type == 'contracts'"
                                        style="font-size: 14px;  font-weight: 500; max-width: 134ch;  color: rgb(13, 13, 13);">
                                        خدمة العقود والفواتير الإلكترونية من منصة تعميد لجميع الشركات بنظام مطابق لهيئة
                                        الدخل والزكاه تتيح للمستخدم إنشاء العقود الالكترونية وإنشاء و استقبال الفواتير
                                        الالكترونية عبر المنصة وارسال الفواتير الالكترونية لإي جهة اخرى داخل المنصة او
                                        خارجها كما تتيح ارسال واستقبال مستخلصات للمشاريع .

                                    </p>
                                </div>
                                <div v-if="type == 'contracts'" class="mt-3 text-end"
                                    style="padding: 20px;background-color:#f0f6f2 ;border-radius: 18px;">
                                    <h6 style="color:#00aeaf ;font-weight: 500;">آلية استخدام الخدمة
                                    </h6>

                                    <div style="margin-top: 25px;  margin-bottom: 18px;">
                                        <span
                                            style="border-radius: 50%;margin-left: 10px;background-color: #e26b33; padding: 0px 10px 0px 10px;color: #fff;">1</span>
                                        <span style="font-size: 14px;  font-weight: 500;">ارسال الفواتير بعد توقيع العقد
                                            عبر منصة تعميد:</span>

                                        <p style="font-size: 12px;padding-right: 38px; padding-top: 10px;">
                                            يمكن للمتسخدم اصدار فاتورة الكترونية للعميل بعد توقيع العقد المبرم بين
                                            الطرفين عبر الرقم الضريبة للطرف الاخر وارفاق جميع المنتجات المباعة او
                                            الخدمات او المستخلصات على حسب نظام الدفعات المتفق عليها.
                                        </p>
                                    </div>
                                    <div style="margin-bottom: 18px;">
                                        <span
                                            style="border-radius: 50%;margin-left: 10px;background-color: #e26b33; padding: 0px 10px 0px 10px;color: #fff;">2</span>
                                        <span style="font-size: 14px;  font-weight: 500;">ارسال الفواتير لعميل خارج منصة
                                            تعميد:</span>
                                        <p style="font-size: 12px;padding-right: 38px;padding-top: 10px;">
                                            يمكن للعميل ارسال فاتورة الكترونية لعميل متفق معه خارج منصة تعميد يقوم
                                            بانشاء فاتورة جديدة ويرفق اسم المنشآة او العميل ويتم ارفاق الرقم الضريبي
                                            وبعدها يتم تصدير الفاتورة بملف ويقوم العميل بارسالها عبر واتس اب او الايميل.
                                        </p>

                                    </div>
                                    <div style="margin-bottom: 18px;">
                                        <span
                                            style="border-radius: 50%;margin-left: 10px;background-color: #e26b33; padding: 0px 10px 0px 10px;color: #fff;">3</span>
                                        <span style="font-size: 14px;  font-weight: 500;">ارفاق فواتير المشتريات او
                                            انشائها:</span>
                                        <p style="font-size: 12px;padding-right: 38px;padding-top: 10px;">
                                            كما يمكن للعميل ارفاق فواتير المشتريات ان كانت من خارج منصة تعميد يتم ارفاق
                                            الفاتورة وتوضيح المعلومات وارفاق الفاتورة الاصل ويتم احتسابها من ضمن فواتير
                                            المشتريات. </p>
                                    </div>


                                </div>
                                <div v-else class="mt-3 text-end"
                                    style="padding: 20px;background-color:#f0f6f2 ;border-radius: 18px;">
                                    <h6 style="color:#00aeaf ;font-weight: 500;">آلية استخدام الخدمة
                                    </h6>
                                    <p style="color:#070d0b;font-size: 14px;  font-weight: 500;">مسار إنشاء الإعلانات في
                                        منصة تعميد</p>
                                    <div style="margin-top: 25px;  margin-bottom: 18px;">
                                        <span
                                            style="border-radius: 50%;margin-left: 10px;background-color: #e26b33; padding: 0px 10px 0px 10px;color: #fff;">1</span>
                                        <span style="font-size: 14px;  font-weight: 500;">الدخول إلى الخدمة</span>
                                    </div>
                                    <div style="margin-bottom: 18px;">
                                        <span
                                            style="border-radius: 50%;margin-left: 10px;background-color: #e26b33; padding: 0px 10px 0px 10px;color: #fff;">2</span>
                                        <span style="font-size: 14px;  font-weight: 500;">اختيار المنشآة</span>
                                    </div>
                                    <div style="margin-bottom: 18px;">
                                        <span
                                            style="border-radius: 50%;margin-left: 10px;background-color: #e26b33; padding: 0px 10px 0px 10px;color: #fff;">3</span>
                                        <span style="font-size: 14px;  font-weight: 500;">الضغط على الإعلان</span>
                                    </div>
                                    <div style="margin-bottom: 18px;">
                                        <span
                                            style="border-radius: 50%;margin-left: 10px;background-color: #e26b33; padding: 0px 10px 0px 10px;color: #fff;">4</span>
                                        <span style="font-size: 14px;  font-weight: 500;">الضغط على إنشاء الإعلان</span>
                                    </div>
                                    <div style="margin-bottom: 18px;">
                                        <span
                                            style="border-radius: 50%;margin-left: 10px;background-color: #e26b33; padding: 0px 10px 0px 10px;color: #fff;">5</span>
                                        <span style="font-size: 14px;  font-weight: 500;">تحديد القسم المطلوب</span>
                                    </div>
                                    <div style="margin-bottom: 18px;">
                                        <span
                                            style="border-radius: 50%;margin-left: 10px;background-color: #e26b33; padding: 0px 10px 0px 10px;color: #fff;">6</span>
                                        <span style="font-size: 14px;  font-weight: 500;">إختيار النشاط الرئيسي /
                                            والنشاط الفرعي</span>
                                    </div>
                                    <div style="margin-bottom: 18px;">
                                        <span
                                            style="border-radius: 50%;margin-left: 10px;background-color: #e26b33; padding: 0px 10px 0px 10px;color: #fff;">7</span>
                                        <span style="font-size: 14px;  font-weight: 500;">ضع عنوان المشروع / وصف المشروع
                                            / ارفاق المخططات او الصور</span>
                                    </div>
                                    <div style="margin-bottom: 18px;">
                                        <span
                                            style="border-radius: 50%;margin-left: 10px;background-color: #e26b33; padding: 0px 10px 0px 10px;color: #fff;">8</span>
                                        <span style="font-size: 14px;  font-weight: 500;">الضغط على ارسال</span>
                                    </div>

                                </div>
                                <div v-if="type!='contracts'" class="mt-4 text-end"
                                    style=" padding-top: 20px; padding-right: 10px; padding-left: 20px; padding-bottom: 20px;background-color:#f0f6f2 ;border-radius: 18px;">
                                    <span>
                                        <p style="font-weight: 400;font-size: 12px; color: #000;">في حال واجهتك اي مشاكل
                                            في تنزيل الإعلان لا تتردد في
                                            مراسلة الدعم الفني من داخل الحساب <i class="fas fa-info-circle"
                                                style="color:#3e938e; padding-right: 5px;font-size: 18px;"></i></p>
                                    </span>

                                </div>
                            </div>
                            <div class="col-md-5 col-sm-12 price-card">
                                <div
                                    style="width: 75%; background-color:#f0f6f2 ; height: 325px; margin-top: 6%; border-radius: 12px; margin-bottom: 5%;  box-shadow: rgb(236 233 233) 1px 1px 5px 2px;">
                                    <div style="border-bottom: 1px solid #d7ddd9 ;">
                                        <h5 v-if="type == 'projects'"
                                            style="padding-top: 8%;padding-bottom: 8%;text-align: center;color: #1897a0;font-weight: 700;">
                                            مشاريع المقاولات
                                        </h5>
                                        <h5 v-if="type == 'auction-deals'"
                                            style="padding-top: 8%;padding-bottom: 8%;text-align: center;color: #1897a0;font-weight: 700;">
                                            الصفقات و المزادات
                                        </h5>
                                        <h5 v-if="type == 'materials'"
                                            style="padding-top: 8%;padding-bottom: 8%;text-align: center;color: #1897a0;font-weight: 700;">
                                            الحصول على المواد
                                        </h5>
                                        <h5 v-if="type == 'contracts'"
                                            style="padding-top: 8%;padding-bottom: 8%;text-align: center;color: #1897a0;font-weight: 700;">
                                            العقود والفواتير
                                        </h5>

                                    </div>
                                    <div class="mt-3 pb-3"
                                        style="margin-bottom: 1rem !important;text-align: center;    border-bottom: 1px solid #d7ddd9;">
                                        <img src="../../assets/images/projectB.png" style="width: 80px;" alt="">

                                    </div>
                                    <div class="mt-4 pb-3" style="margin-bottom: 1rem !important;text-align: center;">
                                        <a href="/login" class="btn btn-logo btn-animation"
                                            style="    border-radius: 9px;background-color: #00aeaf; width: 78%; color: white; font-size: 19px;font-weight: 800;padding: 12px 29px;text-align: right;">
                                            <img src="../../assets/images/startSe.png" alt="">
                                            ابدأ الخدمة </a>

                                    </div>

                                </div>
                                <div
                                    style="text-align: center;width: 75%;background-color: #fef7e5;  margin-top: 6%; border-radius: 12px;  box-shadow: rgb(236 233 233) 1px 1px 5px 2px;     margin-bottom: 25px;">

                                    <h6 style="color:#34848b ;padding-top: 8%; font-weight: 500;"> رسوم الخدمة لمنصة
                                        تعميد</h6>

                                    <h6 style="padding-top: 5%; font-size: 12px;"> تحصل تعميد على %1.5 ك نسبة مقابل</h6>
                                    <h6 style=" font-size: 12px; padding-bottom: 8%;"> كل عقد يتم الاستحواذ عليه من
                                        المنفذ او المورد</h6>

                                </div>
                            </div>

                            <img v-if="type=='contracts'" src="../../assets/images/contracts.png" alt="">
                            <img  v-if="type=='contracts'" src="../../assets/images/bills.png" alt="">
                        </div>


                    </div>
                </div>
            </div>
        </div>


    </div>
</template>

<script>
export default {
    name: 'BlogDetails',

    mounted() {
        var type = this.$route.params.type;
        this.type = type;
    },
    data: () => ({

        type: '',

    }),
}
</script>