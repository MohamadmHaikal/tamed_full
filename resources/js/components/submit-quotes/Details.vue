<template>
    <div>
        <div class="about-area pb-70">
            <div class="containp container">

                <div class="mt-2" style="text-align: -webkit-center;">
                    <div class="col-md-12 col-sm-12 mt-5 text-center">
                        <div class="row" id="main-content">
                            <div v-if="ads.type == 5" class="col-md-8">
                                <h5 style="color:#049ba6 ;">تقديم طلب شراء ل</h5>
                                <h4 style="color:#424242 ;">صفقة لبيع مواد بناء</h4>
                                <h6 v-if="ads.pricestatus == 'off'" class="mt-4" style="color:#000000 ; ">هل انت موافق
                                    على
                                    السعر</h6>
                                <a v-if="ads.pricestatus == 'off'" href="javascript:void(0);" id="accept"
                                    class="btn  mt-2" @click="openCity($event, 'accept')"
                                    style="border-radius: 10px;background-color: #ffffff;border: 1px solid #019ea7;color: #019aa2; padding: 7px 20px 7px 20px;">نعم
                                    موافق</a>
                                <br>
                                <a v-if="ads.pricestatus == 'off'" href="javascript:void(0);" id="negotiation"
                                    class="btn mt-3" @click="openCity($event, 'negotiation')"
                                    style="border-radius: 10px;background-color: #ffffff;border: 1px solid #019ea7;color: #019aa2;padding: 5px 15px 5px 15px;">اريد
                                    التفاوض على السعر </a>
                                <br>
                                <div class="accept-content mt-5 " id="accept-content" style="display:none ;">
                                    <span> يجب عليك دفع تأمين لحجز الصفقة إن لم ترغب بدفع المبلغ كامل </span>
                                    <br>
                                    <span>قبل التأكد من مواصفات الصفقة</span>

                                    <h6 style="padding-top:15px ;color:#049ba6 ;">نسبة التأمين 5 % من قيمة الصفقة</h6>
                                    <dir class="text-center">
                                        <div class="mt-2"
                                            style="     margin-right: 9%;background-color:#b6e2e5;  border-radius: 20px;  width: 76%;     padding: 22px;   text-align: right; ">
                                            <h6 style="color:#4e8a8b ; font-weight: 800;">ملاحظة</h6>
                                            <p style="     font-weight: 300;color: #000;font-size: 12px;"> بعد دفع
                                                التأمين سيتم اصدار فاتورة بالمبلغ المدفوع وحجز الصفقة لك حسب المدة
                                                المتفق عليها ريثما يتم التشيك والتأكد من حقيقية مواصفات الصفقة بشكل كامل
                                                وبعدها يمكنكم استكمال المبلغ المتبقي وسيتم اصدار فاتورة نهائية لك وتكون
                                                الصفقة من نصيبك</p>

                                        </div>
                                        <div class="mt-2"
                                            style="margin-right: 9%;background-color:#f6dec2;  border-radius: 20px;  width: 76%;     padding: 22px;   text-align: right; ">

                                            <p style="font-weight: 300;font-size: 12px; color: #000;"> وان لم تكن بفس
                                                المواصفات المعروضة سيتم استردادالمبلغ المدفوع بعد خصم رسوم تعميد وسيتم
                                                استرداد المبلغ خلال 5 ايام عمل</p>

                                        </div>
                                    </dir>

                                    <div class="accept-price-check mt-5">
                                        <label class="container1 mt-5" @click="accept('all-accept-deals')">
                                            <input type="checkbox" id="all-accept-deals">
                                            تم الإطلاع على جميع المواصفات المرفقة
                                            <span class="checkmark"></span>
                                        </label>
                                        <br>
                                        <label class="container1" @click="accept('all-privacy-deals')">
                                            <input type="checkbox" id="all-privacy-deals">
                                            موافق على <router-link to="/privacy-policy" style="color:#039ba0 ;">الشروط
                                                والاحكام
                                            </router-link> لمنصة تعميد
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="quotes-btn mt-5 ">
                                        <a href="#" class="btn btn-logo" @click="openCity($event, 'deposit')"
                                            style="border-radius:10px;background-color:#039ca4;color:white;    padding: 5px 15px 5px 15px;">دفع
                                            تأمين الصفقة</a>
                                        <br>
                                        <a href="#" class="btn btn-logo" @click="openCity($event, 'full-payment')"
                                            style="border-radius: 10px;background-color: #ecb072; margin-top: 15px;color: white; padding: 5px 20px 5px 20px;">دفع
                                            المبلغ كامل</a>
                                        <br>
                                        <a href="javascript:void(0);">
                                            <p style="padding-top: 15px;font-weight: 500; padding-bottom: 15px;">العودة
                                                للصفحة السابقة</p>
                                        </a>
                                    </div>
                                </div>
                                <div class="deposit1 " id="full-payment"
                                    style="display:none ;     text-align: -webkit-center;">
                                    <div class="col-md-8"
                                        style="    padding-right: 25px;text-align: -webkit-center; padding-top: 15px;">
                                        <div class="row mt-5 text-start">
                                            <div class="col-md-6 text-center">

                                                <a @click="chooseFilesDeposit('full-file')" href="javascript:void(0);"
                                                    class="btn btn-logo"
                                                    style="border-radius: 12px;background-color: #d6a562; width: 55%;color: white; padding: 10px 10px;">ارفاق
                                                    إيصال الدفع </a>


                                                <input type="file" class="full" name="full" id="full-file"
                                                    style="display:none;">
                                            </div>
                                            <div class="col-md-6 text-center">
                                                <p style="     font-weight: 400;   font-size: 12px;color:#282828 ;">نرجو
                                                    الالتزام بالصيغ التالية لإرفاق الملف</p>
                                                <p style="    font-weight: 400;color:#282828 ;">PDF,JPG,PNG,EXCEL,WORD
                                                </p>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-8">
                                        <small
                                            style="position:relative;top: 58px; left: 180px;background-color:#ffffff; color:#b6e6e8;padding:0px 10px 0px 10px;     font-size: 12px;">هل
                                            لديك ملاحظات</small>
                                        <div style="text-align:-webkit-center ; ">
                                            <textarea class="mt-5" name="" id="full_note" cols="40" rows="6"
                                                style=" border: 1px solid #ccc; border-radius: 25px;    padding: 15px; width:100%;"></textarea>

                                        </div>
                                    </div>

                                    <div class="accept-price-check mt-5">
                                        <label class="container1 mt-5" @click="accept('all-accept-deals')">
                                            <input type="checkbox" id="all-accept-deals">
                                            تم الإطلاع على جميع المواصفات المرفقة
                                            <span class="checkmark"></span>
                                        </label>
                                        <br>
                                        <label class="container1" @click="accept('all-privacy-deals')">
                                            <input type="checkbox" id="all-privacy-deals">
                                            موافق على <router-link to="/privacy-policy" style="color:#039ba0 ;">الشروط
                                                والاحكام
                                            </router-link> لمنصة تعميد
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="quotes-btn mt-5 ">
                                        <a href="#" class="btn btn-logo" @click="send('send', 'full-payment')"
                                            style="border-radius:10px;background-color:#039ca4;color:white;    padding: 5px 15px 5px 15px;">ارسال
                                            عرض السعر
                                        </a>
                                        <br>

                                        <a href="javascript:void(0);">
                                            <p style="padding-top: 15px;font-weight: 500; padding-bottom: 15px;">العودة
                                                للصفحة السابقة</p>
                                        </a>
                                    </div>
                                </div>
                                <div class="deposit1 " id="deposit"
                                    style="display:none ;     text-align: -webkit-center;">
                                    <div class="col-md-8"
                                        style="    padding-right: 25px;text-align: -webkit-center; padding-top: 15px;">
                                        <div class="row mt-5 text-start">
                                            <div class="col-md-6 text-center">

                                                <a @click="chooseFilesDeposit('deposit-file')"
                                                    href="javascript:void(0);" class="btn btn-logo"
                                                    style="border-radius: 12px;background-color: #d6a562; width: 55%;color: white; padding: 10px 10px;">ارفاق
                                                    إيصال الدفع </a>


                                                <input type="file" class="deposit" name="deposit" id="deposit-file"
                                                    style="display:none;">
                                            </div>
                                            <div class="col-md-6 text-center">
                                                <p style="     font-weight: 400;   font-size: 12px;color:#282828 ;">نرجو
                                                    الالتزام بالصيغ التالية لإرفاق الملف</p>
                                                <p style="    font-weight: 400;color:#282828 ;">PDF,JPG,PNG,EXCEL,WORD
                                                </p>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-8">
                                        <small
                                            style="position:relative;top: 58px; left: 180px;background-color:#ffffff; color:#b6e6e8;padding:0px 10px 0px 10px;     font-size: 12px;">هل
                                            لديك ملاحظات</small>
                                        <div style="text-align:-webkit-center ; ">
                                            <textarea class="mt-5" name="" id="deposit_note" cols="40" rows="6"
                                                style=" border: 1px solid #ccc; border-radius: 25px;    padding: 15px; width:100%;"></textarea>

                                        </div>
                                    </div>

                                    <div class="accept-price-check mt-5">
                                        <label class="container1 mt-5" @click="accept('all-accept-deals')">
                                            <input type="checkbox" id="all-accept-deals">
                                            تم الإطلاع على جميع المواصفات المرفقة
                                            <span class="checkmark"></span>
                                        </label>
                                        <br>
                                        <label class="container1" @click="accept('all-privacy-deals')">
                                            <input type="checkbox" id="all-privacy-deals">
                                            موافق على <router-link to="/privacy-policy" style="color:#039ba0 ;">الشروط
                                                والاحكام
                                            </router-link> لمنصة تعميد
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="quotes-btn mt-5 ">
                                        <a href="#" class="btn btn-logo" @click="send('send', 'deposit')"
                                            style="border-radius:10px;background-color:#039ca4;color:white;    padding: 5px 15px 5px 15px;">ارسال
                                            عرض السعر
                                        </a>
                                        <br>

                                        <a href="javascript:void(0);">
                                            <p style="padding-top: 15px;font-weight: 500; padding-bottom: 15px;">العودة
                                                للصفحة السابقة</p>
                                        </a>
                                    </div>
                                </div>
                                <div class="negotiation-content mt-5"
                                    v-bind:style="[ads.pricestatus == 'on' ? 'display: block;' : 'display: none;']">
                                    <span>ماهو السعر المناسب لك </span>
                                    <input type="text" value="" id="price"
                                        style="     margin-right: 5px; color: #049fa8;   text-align: center; width: 20%;border: 1px solid #049fa8;border-radius: 5px;">
                                    <br>
                                    <small
                                        style="position:relative;top: 58px; left: 180px;background-color:#ffffff; color:#b6e6e8;padding:0px 10px 0px 10px;     font-size: 12px;">هل
                                        لديك ملاحظات</small>
                                    <div style="text-align:-webkit-center ; ">
                                        <div class="mt-5 col-md-8">
                                            <textarea name="" id="note" cols="38" rows="6"
                                                style=" border: 1px solid #ccc; border-radius: 25px; width:100%;   padding: 15px;"></textarea>
                                        </div>
                                        <div class="mt-2 col-md-8"
                                            style="background-color:#b6e2e5;  border-radius: 20px; padding: 22px;   text-align: right; ">
                                            <h6 style="color:#4e8a8b ;">أوراق المنشآة</h6>
                                            <small style="color:white ;">يجب عليك تحميل اوراق المنشآة الرسمية من خلال
                                                <small style="color: #31a1ad;"> الملف الشخصي الخاص بك</small></small>

                                            <small style="color:white ;"> وستظهر لمقدم الطلب الأوراق مع عرض السعر
                                                المقدم</small>
                                        </div>
                                        <div v-if="ads['userFile'] != null" class="mt-5 col-md-8"
                                            style="border: 1px solid rgb(204, 204, 204); border-radius: 25px; padding: 20px;    padding-top: 0px;">
                                            <small
                                                style="position:relative;top: -13px; left: 180px;background-color:#ffffff; color:#b6e6e8;padding:0px 10px 0px 10px;     font-size: 12px;">
                                                الأوراق المرفقة
                                            </small>
                                            <div class="row">

                                                <div v-for=" file in ads.userFile" class="col-md-4 col-6 text-center"><a
                                                        href="javascript:void(0);" @click="selectPaper($event, file.id)"
                                                        class="btn paper">{{ file.name }}</a></div>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="accept-price-check mt-5">
                                        <label class="container1 mt-5" @click="accept('all-accept')">
                                            <input type="checkbox" id="all-accept">
                                            تم الإطلاع على جميع المواصفات المرفقة
                                            <span class="checkmark"></span>
                                        </label>
                                        <br>
                                        <label class="container1" @click="accept('privacy-accept')">
                                            <input type="checkbox" id="privacy-accept">
                                            موافق على <router-link to="/privacy-policy" style="color:#039ba0 ;">الشروط
                                                والاحكام
                                            </router-link> لمنصة تعميد
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="quotes-btn mt-5 ">
                                        <a href="javascript:void(0);" class="btn btn-logo"
                                            @click="send('send', 'deals')"
                                            style="border-radius:10px;background-color:#039ca4;color:white;    padding: 5px 15px 5px 15px;">ارسال
                                            إلى مقدم الصفقة</a>
                                        <br>
                                        <a href="javascript:void(0);">
                                            <p style="padding-top: 15px;font-weight: 500; padding-bottom: 15px;">العودة
                                                للصفحة السابقة</p>
                                        </a>
                                    </div>
                                </div>

                            </div>
                            <div v-else class="col-md-8">
                                <h5 style="color:#049ba6 ;">تقديم طلب شراء ل</h5>
                                <h4 style="color:#424242 ;">{{ ads.title }}</h4>
                                <div class="col-md-10 mt-5"
                                    style="    padding-right: 25px;text-align: -webkit-center; padding-top: 15px;">
                                    <div class="row mt-5 text-start">
                                        <div class="col-md-6">

                                            <a @click="chooseFiles" href="javascript:void(0);" class="btn btn-logo"
                                                style="border-radius: 12px;background-color: #d6a562; width: 55%;color: white; padding: 10px 10px;">ارفاق
                                                عرض السعر</a>


                                            <input type="file" class="quotes" name="quotes" id="quotes-file"
                                                style="display:none;">
                                        </div>
                                        <div class="col-md-6 text-center">
                                            <p style="     font-weight: 400;   font-size: 12px;color:#282828 ;">نرجو
                                                الالتزام بالصيغ التالية لإرفاق الملف</p>
                                            <p style="    font-weight: 400;color:#282828 ;">PDF,JPG,PNG,EXCEL,WORD</p>
                                        </div>
                                    </div>

                                </div>
                                <div style="text-align: -webkit-center;">
                                    <div class="mt-5 col-md-8"
                                        style="background-color:#b6e2e5;border-radius: 20px;padding: 22px;text-align: right; ">
                                        <h6 style="color:#4e8a8b ;">أوراق المنشآة</h6>
                                        <small style="color:white ;">يجب عليك تحميل اوراق المنشآة الرسمية من خلال
                                            <small style="color: #31a1ad;"> الملف الشخصي الخاص بك</small></small>

                                        <small style="color:white ;"> وستظهر لمقدم الطلب الأوراق مع عرض السعر
                                            المقدم</small>
                                    </div>
                                    <div v-if="ads['userFile'] != null" class="mt-5 col-md-8"
                                        style="border: 1px solid rgb(204, 204, 204); border-radius: 25px; padding: 20px;    padding-top: 0px;">
                                        <small
                                            style="position:relative;top: -13px; left: 180px;background-color:#ffffff; color:#b6e6e8;padding:0px 10px 0px 10px;     font-size: 12px;">
                                            الأوراق المرفقة
                                        </small>
                                        <div class="row">

                                            <div v-for=" file in ads.userFile" class="col-md-4 col-6 text-center"><a
                                                    href="javascript:void(0);" @click="selectPaper($event, file.id)"
                                                    class="btn paper">{{ file.name }}</a></div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <small
                                            style="position:relative;top: 58px; left: 180px;background-color:#ffffff; color:#b6e6e8;padding:0px 10px 0px 10px;     font-size: 12px;">هل
                                            لديك ملاحظات</small>
                                        <div style="text-align:-webkit-center ; ">
                                            <textarea class="mt-5" name="" id="project_note" cols="40" rows="6"
                                                style=" border: 1px solid #ccc; border-radius: 25px;    padding: 15px; width:100%;"></textarea>

                                        </div>
                                    </div>
                                </div>
                                <div class="quotes-btn mt-5 ">
                                    <a href="javascript:void(0);" class="btn btn-logo" @click="send('send', 'project')"
                                        style="border-radius:10px;background-color:#039ca4;color:white;    padding: 8px 28px 8px 28px;">ارسال
                                        عرض السعر</a>
                                    <br>
                                    <br>
                                    <router-link :to="'/project/' + id + '/details'">
                                        <p style="padding-top: 15px;font-weight: 500; padding-bottom: 15px;">العودة
                                            للصفحة السابقة</p>
                                    </router-link>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div
                                    style="width: 85%; padding-bottom: 15px; margin-top: 6%; border-radius: 12px; margin-bottom: 5%; box-shadow: rgb(236, 233, 233) 1px 1px 5px 2px;">
                                    <div style="border-bottom: 1px solid rgb(238, 239, 241);     padding-bottom: 15px;">
                                        <p
                                            style="text-align:right;padding-right:10%;padding-top:10%;font-weight:500;font-size:13px;">
                                            اخر موعد لتقديم العروض </p>
                                        <div style="text-align: right;">

                                            <i class="far fa-calendar-alt"
                                                style=" text-align:right;color:#37D337;padding-right:10%;font-size:15px;"></i><span
                                                style=" text-align:right;color:rgb(87 83 77);font-size:12px;padding-right:2px;">
                                                {{ ads.created }}
                                            </span><span
                                                style=" text-align:right;color:rgb(87 83 77);font-size:12px;padding-right:5px;"><i
                                                    class="far fa-clock"
                                                    style=" text-align:right;color:#37D337;font-size:15px;"></i>
                                                12:00</span>
                                        </div>
                                    </div>
                                    <div style="text-align: right;">

                                        <h5 v-if="ads.type == 5"
                                            style="padding-top: 8%; text-align: center;color: #62bbc0; ">قيمة الصفقة
                                        </h5>
                                        <h5 v-else style="padding-top: 8%; text-align: center;color: #62bbc0; ">قيمة
                                            المشروع
                                        </h5>
                                        <div v-if="ads.pricestatus == 'off'">
                                            <h6 style="color: rgb(244, 162, 62); text-align: center; ">
                                                {{ ads.price }} ريال </h6>
                                            <div class=" mt-3 text-center mb-2" id="price-with-material-accept"
                                                style="display:none;">
                                                <small style="padding-top: 8%; text-align: center;color:#019aa2; ">قيمة
                                                    تأمين حجز الصفقة

                                                </small>
                                                <h6 style="color: rgb(244, 162, 62); text-align: center; ">
                                                    {{ ads.price * 5 / 100 }} ريال </h6>
                                            </div>
                                        </div>
                                        <div v-else>
                                            <h6 style="color: rgb(244, 162, 62); text-align: center; ">
                                                الأفضل سعر </h6>
                                        </div>
                                        <div class=" mt-3 text-center" id="price-with-material" style="display:none;">
                                            <small style="color: #65a632; text-align: center; ">
                                                تسعيرة مع المواد </small>
                                        </div>

                                        <div style="border-bottom:1px solid #eeeff1;">
                                            <h5 id="owner-title"
                                                style=" color:#019aa2; padding-top:8%;padding-right: 10%;text-align:right; padding-bottom: 2%;font-size:95%;">
                                                معلومات صاحب
                                                الطلب </h5>
                                        </div>
                                        <div class="mt-3" id="owner-details"
                                            style="text-align:center;padding-bottom:15px;">
                                            <span class="text-end" style="color:#019aa2;font-size:14px;"> مقدم
                                                الطلب:</span><span class="text-end"
                                                style="color:rgb(87 83 77);font-size:14px;padding-right:5px;">{{
                                                        author.name
                                                }}</span>
                                            <div style="text-align:center;">
                                                <router-link :to="'/profile/' + author.id + '/details'"
                                                    class="btn btn-logo btn-animation"
                                                    style="border-radius:25px;background-color:rgb(3, 156, 164);width:69%;color:white;font-size:90%;margin-top:25px;padding:10px 23px;">
                                                    الملف الشخصي للمنشآة </router-link>
                                            </div>
                                            <div class="mt-3"> 20/100 <span class="far fa-star checked"
                                                    style="font-size:20px;" aria-hidden=""></span><span
                                                    class="far fa-star checked" style="font-size:20px;"></span><span
                                                    class="fa fa-star checked" style="font-size:20px;"></span><span
                                                    class="fa fa-star checked" style="font-size:20px;"></span><span
                                                    class="fa fa-star checked" style="font-size:20px;"></span></div>
                                            <div class="row text-center mt-2">
                                                <div class="col-md-5 col-sm-2"
                                                    style="text-align:center;margin-bottom:12px;"><a
                                                        :href="'/chat/' + author.id" style="color:#039ca4;">
                                                        <p style="position:relative;top:18px;">رسالة</p><i
                                                            class="far fa-comment-alt mb-2"
                                                            style="font-size:25px;color:#039ca4;"></i>
                                                    </a></div>
                                                <div class="col-md-7 col-sm-10"><a href="javascript:void(0);"
                                                        class="btn report"> تقديم بلاغ على الصفقة </a></div>
                                            </div>
                                        </div>
                                        <div class="mt-3" id="payment-info"
                                            style="text-align: -webkit-center;padding-bottom: 15px;display: block;">

                                        </div>
                                        <div class="text-center" id="ref-number">
                                            <span v-if="ads.type == 1" class="text-end "
                                                style="color: #019aa2;    font-size: 12px;"> الرقم
                                                المرجعي للمشروع:</span>
                                            <span v-else class="text-end " style="color: #019aa2;    font-size: 12px;">
                                                الرقم
                                                المرجعي لل{{ infoArray.dealsOrAuction }}:</span>
                                            <span class="text-end"
                                                style="color: rgb(87 83 77) ;font-size: 12px; padding-right: 5px;">
                                                {{ ads.reference_number }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="quotes-finish" id="quotes-finish" style="display:none ;">
                            <h3 style="color:#545454 ;">شكراً لك </h3>
                            <h5 style="color:#545454 ;">تم ارسال الطلب بنجاح </h5>
                            <img src="../../assets/images/check.png" alt="" style="width: 5%;margin-top: 5%;">
                            <p style="color:#000 ;    margin-top: 20px;">في حال الموافقة من قبل صاحب الطلب سيتم
                                التواصل معك</p>
                            <div v-if="ads.type == '5'">
                                <h6 style="margin-top: 60px;color:#026f90;"> يمكنك الآن مراسلة صاحب الصفقة <i
                                        class="fa fa-chevron-left	"
                                        style="     padding-right: 25px;color:#fdc57b;  vertical-align: middle;  font-size: 25px;"></i>
                                </h6>
                                <br>
                                <a href="/DealsAuctions/issued">
                                    <h6 style="color:#026f90;    margin-top: 15px;margin-bottom: 90px;">الذهاب إلى قائمة
                                        الصفقات
                                        الصادرة<i class="fa fa-chevron-left	"
                                            style="     padding-right: 20px;color:#fdc57b; vertical-align: middle;  font-size: 25px;"></i>
                                    </h6>
                                </a>
                                <p style="color:#000 ;">او يمكنك طلب وسيط من موظفين تعميد ليقوم بإنهاء الصفقة و التأكد
                                    من
                                    جميع المواصفات المطلوبة لك مقابل 2.5% من إجمالي الصفقة</p>

                                <a href="/dashboard" class="btn btn-logo  mb-5"
                                    style="border-radius: 10px; background-color: rgb(3, 156, 164);  color: white; margin-top: 10px; padding: 7px 12px;">
                                    تقديم طلب وسيط استكمال صفقة من تعميد</a>

                            </div>
                            <div v-else>
                                <router-link to="/projects">

                                    <h6 style="margin-top: 60px;color:#026f90;">الرجوع إلى قائمة المشاريع <i
                                            class="fa fa-chevron-left	"
                                            style="     padding-right: 25px;color:#fdc57b;  vertical-align: middle;  font-size: 25px;"></i>
                                    </h6>
                                </router-link>
                                <br>
                                <a href="/Quotes/issued">
                                    <h6 style="color:#026f90;    margin-top: 15px;margin-bottom: 90px;">الذهاب إلى قائمة
                                        عروض الأسعار
                                        <i class="fa fa-chevron-left	"
                                            style="     padding-right: 20px;color:#fdc57b; vertical-align: middle;  font-size: 25px;"></i>
                                    </h6>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>


    </div>
</template>

<script>
import axios from 'axios';
export default {
    methods: {
        accept(id) {
            if (document.getElementById(id).checked == true) {
                document.getElementById(id).checked = false;
            }
            else {
                document.getElementById(id).checked = true;
            }

        },
        remove(arrOriginal, elementToRemove) {
            return arrOriginal.filter(function (el) { return el !== elementToRemove });
        },
        selectPaper(e, id) {

            if (e.currentTarget.classList.contains('selected-file')) {
                e.currentTarget.style.color = "#019aa2";
                e.currentTarget.style.backgroundColor = "#fff";
                e.currentTarget.classList.remove("selected-file");
                this.paper = this.remove(this.paper, id);

            } else {
                e.currentTarget.style.color = "#fff";
                e.currentTarget.style.backgroundColor = "#019aa2";
                e.currentTarget.className += " selected-file";
                this.paper.push(id);
            }

        },
        chooseFilesDeposit(id) {
            document.getElementById(id).click();
        },
        chooseFiles() {
            document.getElementById("quotes-file").click()
        },
        send(type, category = '') {

            if (category == 'deals') {
                if (document.getElementById('all-accept').checked != true || document.getElementById('privacy-accept').checked != true) {
                    this.$toast('الرجاء الموافقة على الشروط والأحكام', {
                        duration: 2000,
                        pauseOnHover: true,
                        styles: {
                            borderRadius: '5px',
                            background: '#cc2e2e',
                            boxShadow: '0 1px 3px #0000',
                            width: '340px'

                        },
                        slotRight: '<i class="fas fa-info-circle"></i>', // Add icon to left
                        class: 'local-class', // Added to this toast only
                        type: 'error', // Default classes: 'success', 'error' and 'passive'
                        positionX: 'left',
                        positionY: 'bottom',
                        disableClick: false,
                    });
                    return;
                }

            }

            if (type == 'send') {
                var id = this.$route.params.id;
                let formData = new FormData();
                formData.append('from_id', window.Laravel.user.id);
                formData.append('to_id', this.author.id);
                formData.append('ads_id', id);
                formData.append('title', this.ads.title);
                formData.append('category', category);
                formData.append('paper', this.paper);
                if (category == 'project') {
                    formData.append('note', document.getElementById('project_note').value);
                    formData.append('file', document.getElementById('quotes-file').files[0]);
                }
                else if (category == 'deals') {
                    formData.append('price', document.getElementById('price').value);
                    formData.append('note', document.getElementById('note').value);
                }
                else if (category == 'full-payment') {
                     formData.append('price', this.ads['price']);
                    formData.append('note', document.getElementById('full-file').value);
                     formData.append('file', document.getElementById('full-file').files[0]);
                }
                else if (category == 'deposit') {
                    formData.append('price',this.ads['price']);
                    formData.append('note', document.getElementById('deposit_note').value);
                     formData.append('file', document.getElementById('deposit-file').files[0]);
                }

                const headers = {
                    "Authorization": "Bearer my-token",
                    "My-Custom-Header": "foobar"
                };
                axios.post("/api/quotes/send", formData, { headers })
                    .then(response => {
                        console.log(response);
                        if (response['data']['code'] == '200') {
                            document.getElementById('main-content').style.display = 'none';
                            document.getElementById('quotes-finish').style.display = 'block';
                            this.$toast(response['data']['message'], {
                                duration: 2000,
                                pauseOnHover: true,
                                styles: {
                                    borderRadius: '5px',
                                    background: '#2ecc71',
                                    boxShadow: '0 1px 3px #0000',
                                    width: '340px'

                                },
                                slotRight: '<i class="fa fa-check"></i>', // Add icon to left
                                class: 'local-class', // Added to this toast only
                                type: 'error', // Default classes: 'success', 'error' and 'passive'
                                positionX: 'left',
                                positionY: 'bottom',
                                disableClick: false,
                            });
                        }
                        else {

                            this.$toast(response['data']['message'], {
                                duration: 2000,
                                pauseOnHover: true,
                                styles: {
                                    borderRadius: '5px',
                                    background: '#cc2e2e',
                                    boxShadow: '0 1px 3px #0000',
                                    width: '340px'

                                },
                                slotRight: '<i class="fas fa-info-circle"></i>', // Add icon to left
                                class: 'local-class', // Added to this toast only
                                type: 'error', // Default classes: 'success', 'error' and 'passive'
                                positionX: 'left',
                                positionY: 'bottom',
                                disableClick: false,
                            });
                        }


                    });


            } else {
                document.getElementById('main-content').style.display = 'flex';
                document.getElementById('quotes-finish').style.display = 'none';

            }
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        },
        openCity(evt, cityName) {
            if (cityName == 'accept') {
                var elems = document.getElementsByClassName('negotiation-content');
                for (var i = 0; i < elems.length; i += 1) {
                    elems[i].style.display = 'none';
                }
                var elems2 = document.getElementsByClassName('accept-content');
                for (var i2 = 0; i2 < elems2.length; i2 += 1) {
                    elems2[i2].style.display = 'block';
                }
                evt.currentTarget.style.color = "white";
                evt.currentTarget.style.backgroundColor = "#039ca4";
                document.getElementById("negotiation").style.color = "#039ca4";
                document.getElementById("negotiation").style.backgroundColor = "white";
                document.getElementById('price-with-material-accept').style.display = 'block';
                document.getElementById('price-with-material').style.display = 'none';
            }
            else if (cityName == 'deposit') {
                document.getElementById('deposit').style.display = 'block';
                document.getElementById('accept-content').style.display = 'none';
                document.getElementById('owner-title').style.display = 'none';
                document.getElementById('ref-number').style.display = 'none';
                document.getElementById('owner-details').style.display = 'none';
                document.getElementById('payment-info').innerHTML = `
                                            <h5>معلومات الدفع</h5>
                                            <span style="color: #039ca5;">قيمة الصفقة : 
                                            <span style="color: #fdc57b;">`+ this.ads['price'] + ` ريال</span>
                                            </span>
                                            <br>
                                            <span style="color: #039ca5;"> قيمة تأمين حجز الصفقة : 
                                            <span style="color: #fdc985;">`+ (((this.ads['price']) * 5) / 100) + ` ريال</span></span>
                                            <br>
                                            <span style="color: #039ca5;"> ضريبة القيمة المضافة : 
                                            <span style="color: #fdc57b;">`+ ((((this.ads['price']) * 5) / 100) * 0.15) + ` ريال</span>
                                            </span>
                                            <hr style="width: 80%;">
                                            <span style="color: #039ca5;">المبلغ الإجمالي: 
                                            <span style="color: #fdc57b;">`+ ((((this.ads['price']) * 5) / 100) + ((((this.ads['price']) * 5) / 100) * 0.15)) + ` ريال</span>
                                            </span>`;
                document.getElementById('payment-info').style.display = 'block';

            }
            else if (cityName == 'full-payment') {
                document.getElementById('full-payment').style.display = 'block';
                document.getElementById('accept-content').style.display = 'none';
                document.getElementById('owner-title').style.display = 'none';
                document.getElementById('ref-number').style.display = 'none';
                document.getElementById('owner-details').style.display = 'none';
                document.getElementById('payment-info').innerHTML = `
                                            <h5>معلومات الدفع</h5>
                                            <span style="color: #039ca5;">قيمة الصفقة : 
                                            <span style="color: #fdc57b;">`+ this.ads['price'] + ` ريال</span>
                                            </span>
                                            <br>
                                            <span style="color: #039ca5;"> ضريبة القيمة المضافة : 
                                            <span style="color: #fdc57b;">`+ ((((this.ads['price']))) * 0.15) + ` ريال</span>
                                            </span>
                                            <hr style="width: 80%;">
                                            <span style="color: #039ca5;">المبلغ الإجمالي: 
                                            <span style="color: #fdc57b;">`+ (((((this.ads['price']))) * 0.15) + ((((this.ads['price']))))) + ` ريال</span>
                                            </span>`;
                document.getElementById('payment-info').style.display = 'block';
            }
            else {
                var elems3 = document.getElementsByClassName('negotiation-content');
                for (var i3 = 0; i3 < elems3.length; i3 += 1) {
                    elems3[i3].style.display = 'block';
                }
                var elems4 = document.getElementsByClassName('accept-content');
                for (var i4 = 0; i4 < elems4.length; i4 += 1) {
                    elems4[i4].style.display = 'none';
                }

                evt.currentTarget.style.color = "white";
                evt.currentTarget.style.backgroundColor = "#039ca4";
                document.getElementById("accept").style.color = "#039ca4";
                document.getElementById("accept").style.backgroundColor = "white";
                document.getElementById('price-with-material-accept').style.display = 'none';
                document.getElementById('price-with-material').style.display = 'block';
                document.getElementById('deposit').style.display = 'none';
                document.getElementById('full-payment').style.display = 'none';
                document.getElementById('owner-details').style.display = 'block';
                document.getElementById('payment-info').style.display = 'none';
                document.getElementById('owner-title').style.display = 'block';
            }


        },



    },
    async mounted() {
        var id = this.$route.params.id;
        var data = await axios.get(
            '/api/ads/' + id + '/details'
        );

        this.ads = data['data'];
        this.author = this.ads['author'];
        this.infoArray = this.ads['infoArray'];
        this.id = id;

    },
    data: () => ({
        id: '',
        ads: [],
        author: [],
        infoArray: [],
        paper: [],

    }),

}

</script>
<style>
.container1 {
    display: block;
    position: relative;
    padding-left: 35px;
    margin-bottom: 12px;
    cursor: pointer;
    font-size: 15px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}


.container1 input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
    height: 0;
    width: 0;
}



.container1:hover input~.checkmark {
    background-color: #fff;
}


.container1 input:checked~.checkmark {
    background-color: #039ca4;
}


.checkmark:after {
    content: "";
    position: absolute;
    display: none;
}


.container1 input:checked~.checkmark:after {
    display: block;
}


.container1 .checkmark:after {
    left: 15px;
    top: 3px;
    width: 7px;
    height: 13px;
    border: solid white;
    border-width: 0 3px 3px 0;
    transform: rotate(45deg);

}

input[type=text]:focus {
    border: 3px solid red;
}
</style>