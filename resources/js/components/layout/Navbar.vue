<template>
    <div :class="['navbar-area', { 'is-sticky': isSticky }]">
        <div class="luvion-nav">
            <div class="container contain">
                <nav class="navbar navbar-expand-md navbar-light">
                    <a class="navbar-brand big-nav" href="/">
                        <img src="../../assets/images/logo2.e73a83f9.png" alt="image" style="width: 120px;">
                        <img src="../../assets/images/logo2.e73a83f9.png" alt="image" style="width: 120px;">
                    </a>

                    <div class="navbar-toggler" @click="active = !active" :aria-pressed="active ? 'true' : 'false'"
                        v-bind:class="{ 'active': button_active_state }"
                        v-on:click="button_active_state = !button_active_state">
                        <span class="icon-bar top-bar"></span>
                        <span class="icon-bar middle-bar"></span>
                        <span class="icon-bar bottom-bar"></span>
                    </div>
                    <a class="navbar-brand small-nav" href="/">
                        <img src="../../assets/images/logo2.e73a83f9.png" alt="image" style="width: 120px;">
                        <img src="../../assets/images/logo2.e73a83f9.png" alt="image" style="width: 120px;">
                    </a>
                    <b-collapse class="collapse navbar-collapse" :class="{ show: active }" is-nav>
                        <ul class="navbar-nav " style="padding-top: 5px;">
                            <li class="nav-item">
                                <router-link to="/about-us" class="nav-link">
                                    عن تعميد
                                </router-link>

                            </li>
                            <li class="nav-item">
                                <a href="javascript:void(0);" class="nav-link">
                                    المشاريع <i class="fas fa-chevron-down"></i>
                                </a>
                                <ul class="dropdown-menu"
                                    style="box-shadow: 0px 0px 15px 0px rgb(0 0 0 / 0%);background: #ffffff00;">
                                    <div class="drop-arrow"
                                        style="position: absolute;width: 0;height: 0;border-style: solid;border-width: 0 7.5px 10px;border-color: transparent transparent #fff;right: 9%;z-index: 9;transform: translateX(-50%); bottom: 318px;transition: .25s ease-in-out;">
                                    </div>
                                    <div class="card border-0 shadow-lg-6 rounded "
                                        style="    padding: 14px;margin-top: 18px;transition: .25s ease-in-out;    box-shadow: 0 6px 12px rgba(0,0,0,.1)!important;">

                                        <li class="nav-item">
                                            <router-link to="/projects" class=""
                                                style="font-weight: 300; line-height: 3.5;height: 60px; padding-left: 89px;transition: .3s ease-in-out;position: relative;">
                                                مشاريع مقاولات
                                            </router-link>
                                            <i class="fas fa-caret-left"
                                                style="position: absolute;top: 18px;left: 10px;"></i>
                                        </li>
                                        <li class="nav-item">
                                            <router-link to="/technique" class=""
                                                style="font-weight: 300; line-height: 3.5;height: 60px; padding-left: 106px;transition: .3s ease-in-out;position: relative;">
                                                مشاريع تقنية
                                            </router-link>
                                            <i class="fas fa-caret-left"
                                                style="position: absolute;top: 18px;left: 10px;"></i>
                                        </li>
                                        <li class="nav-item">
                                            <router-link to="/factory-materials" class=""
                                                style="font-weight: 300; line-height: 3.5;height: 60px; padding-left: 109px;transition: .3s ease-in-out;position: relative;">
                                                مواد / مصانع
                                            </router-link>
                                            <i class="fas fa-caret-left"
                                                style="position: absolute;top: 18px;left: 10px;"></i>
                                        </li>
                                        <li class="nav-item">
                                            <router-link to="/raw-materials" class=""
                                                style="font-weight: 300; line-height: 3.5;height: 60px; padding-left: 135px;transition: .3s ease-in-out;position: relative;">
                                                مواد خام
                                            </router-link>
                                            <i class="fas fa-caret-left"
                                                style="position: absolute;top: 18px;left: 10px;"></i>
                                        </li>
                                        <li class="nav-item">
                                            <router-link to="/equipment" class=""
                                                style="font-weight: 300; line-height: 3.5;height: 60px; padding-left: 151px;transition: .3s ease-in-out;position: relative;">
                                                معدات
                                            </router-link>
                                            <i class="fas fa-caret-left"
                                                style="position: absolute;top: 18px;left: 10px;"></i>
                                        </li>

                                    </div>
                                </ul>

                            </li>
                            <li class="nav-item">
                                <router-link to="/DealsAuctions" class="nav-link">
                                    الصفقات / المزادات
                                </router-link>

                            </li>

                            <li class="nav-item">
                                <a href="javascript:void(0);" class="nav-link">
                                    تمويل العقود
                                </a>

                                <!-- <ul class="dropdown-menu">
                                    <li class="nav-item">
                                        <router-link to="/about-us" class="nav-link">
                                            About Us
                                        </router-link>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            Features <i class="fas fa-chevron-down"></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li class="nav-item">
                                                <router-link to="/features-1" class="nav-link">
                                                    Features Style One
                                                </router-link>
                                            </li>
                                            <li class="nav-item">
                                                <router-link to="/features-2" class="nav-link">
                                                    Features Style Two
                                                </router-link>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <router-link to="/team" class="nav-link">
                                            Team
                                        </router-link>
                                    </li>
                                    <li class="nav-item">
                                        <router-link to="/pricing" class="nav-link">
                                            Pricing
                                        </router-link>
                                    </li>
                                    <li class="nav-item">
                                        <router-link to="/login" class="nav-link">
                                            Login
                                        </router-link>
                                    </li>
                                    <li class="nav-item">
                                        <router-link to="/register" class="nav-link">
                                            Register
                                        </router-link>
                                    </li>
                                    <li class="nav-item">
                                        <router-link to="/faq" class="nav-link">
                                            FAQ
                                        </router-link>
                                    </li>
                                    <li class="nav-item">
                                        <router-link to="/error" class="nav-link">
                                            Error Page
                                        </router-link>
                                    </li>
                                    <li class="nav-item">
                                        <router-link to="/terms-condition" class="nav-link">
                                            Terms & Conditions
                                        </router-link>
                                    </li>
                                    <li class="nav-item">
                                        <router-link to="/privacy-policy" class="nav-link">
                                            Privacy Policy
                                        </router-link>
                                    </li>
                                </ul> -->
                            </li>
                            <li class="nav-item">
                                <router-link to="/jobs" class="nav-link">
                                    الوظائف

                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="/ContractForms" class="nav-link">
                                    نماذج العقود
                                </router-link>

                            </li>
                            <li class="nav-item">
                                <router-link to="/contact" class="nav-link">
                                    الإتصال بنا
                                </router-link>
                            </li>
                            <li class="test ">
                                <a href="javascript:void(0);" class="nav-link" style="color: white;">
                                    نسخة تجريبية
                                </a>
                            </li>
                            <li class="nav-item" style=" padding-top: 4px; position: absolute; right: 84%;">
                                <a v-if="CurrentLanguage == 'en'" href="/lan/ar" class=" lang-btn"
                                    style="    box-shadow: 0px 1px 5px rgb(0 0 0 / 15%); padding: 3px;">

                                    EN
                                </a>
                                <a v-else href="/lan/en" class=" lang-btn"
                                    style="    box-shadow: 0px 1px 5px rgb(0 0 0 / 15%); padding: 3px;">

                                    AR
                                </a>
                            </li>
                            <li class="nav-item" style="padding-top: 0px; position: absolute; right: 88%;">
                                <a v-if="isLoggedIn == false" href="/login" class="btn btn-login btn-animation"
                                    style="    border-radius: 25px;
                                            background-color: #f2a23b;
                                            color: white;
                                            font-weight: 400;
                                            text-align: center;
                                            text-decoration: none;
                                            vertical-align: middle;
                                            width:140%;
                                            height: 35px;
                                            padding-right: 1px;
                                            margin-right: 10px;
                                            cursor: pointer;
                                            -moz-user-select: none;
                                            -ms-user-select: none;
                                            user-select: none;
                                            border: 1px solid transparent;

                                            font-size: 1rem;
                                            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;">
                                    تسجيل الدخول

                                </a>
                                <div class="info-login" v-else>
                                    <img :src="'/image/' + user.logo" alt="avatar"
                                        style="  width: 50px;border-radius: 50%; height: 50px;  position: relative;  top: -8px;  right: 20px; border: 1px solid #eee;">
                                    <a href="javascript:void(0);"
                                        style="position: relative;top: -10px;right: 8px;color:#4c9da5;">
                                        {{ user.name }}<i class="fas fa-chevron-down"></i>
                                    </a>
                                    <ul class="dropdown-menu rounded"  style="width: 170px;position: relative;top: 30px;">
                                        <div class="drop-arrow"
                                            style="position: absolute;width: 0;height: 0;border-style: solid;border-width: 0 7.5px 10px;border-color: transparent transparent #fff;right: 17%;z-index: 9;transform: translateX(-50%); bottom: 142px;transition: .25s ease-in-out;">
                                        </div>
                                        <li class="nav-item">
                                            <a href="/profile"
                                                style="color: #6c757d;font-size: 12px;    padding: 8px 15px 8px 40px;"><i
                                                    class="fas fa-user" style="font-size: 15px;"></i>
                                                <span> الملف الشخصي</span>
                                            </a>
                                        </li>
                                        <hr style="color:white;margin:5px;">
                                        <li class="nav-item">
                                            <a href="/dashboard"
                                                style="color: #6c757d;font-size: 12px;    padding: 8px 15px 8px 55px;">
                                                <i class="fas fa-stop-circle" style="font-size: 15px;"></i>
                                                <span>
                                                    لوحة القيادة
                                                </span>
                                            </a>
                                        </li>
                                        <hr style="margin:10px;">
                                        <li class="nav-item">
                                            <a href="/auth/logout"
                                                style="color: #6c757d;font-size: 12px;    padding: 8px 15px 8px 55px;"><i
                                                    class="fas fa-sign-out-alt" style="font-size: 15px;"></i>
                                                <span> تسجيل خروج</span>
                                            </a>
                                        </li>
                                    </ul>



                                </div>
                            </li>
                        </ul>
                    </b-collapse>
                    <div class="others-options">
                        <a v-if="isLoggedIn == false" href="/login" class="login-btn">
                            <i class="flaticon-user" style="    color: #039ca5;  "></i>
                        </a>
                        <div class="" v-else>
                            <img :src="'/image/' + user.logo" alt="avatar" id="mobile-user-logo"
                                style="  width: 50px;border-radius: 50%; height: 50px;position: relative;top: -14px;right: 45px;border: 1px solid #eee;">

                            <ul class="dropdown-menu" id="user-menu"
                                style="     border: 1px solid rgb(255 255 255 / 0%);width: 140px;min-width: 100%;text-align: right;padding-right: 10px;position: absolute;top: 65px;left: -50px;">
                                <div class=""
                                    style="position: absolute;width: 0;height: 0;border-style: solid;border-width: 0 7.5px 10px;border-color: transparent transparent #fff;right: 67%;z-index: 9;transform: translateX(-50%);bottom: 150px;transition: .25s ease-in-out;">
                                </div>
                                <li class="nav-item" style="padding: 5px 10px 5px 0px;">
                                    <a href="/profile" style="color: #6c757d;font-size: 12px;"><i class="fas fa-user"
                                            style="font-size: 15px;"></i>
                                        <span> الملف الشخصي</span>
                                    </a>
                                </li>
                                <hr style="color:white;margin:5px;">
                                <li class="nav-item" style="padding: 5px 10px 5px 0px;">
                                    <a href="/dashboard" style="color: #6c757d;font-size: 12px;"> <i
                                            class="fas fa-stop-circle" style="font-size: 15px;"></i>
                                        <span>
                                            لوحة القيادة
                                        </span>
                                    </a>
                                </li>
                                <hr style="margin:10px;">
                                <li class="nav-item" style="padding: 5px 10px 5px 0px;">
                                    <a href="/auth/logout" style="color: #6c757d;font-size: 12px;"><i
                                            class="fas fa-sign-out-alt" style="font-size: 15px;"></i>
                                        <span> تسجيل خروج</span>
                                    </a>
                                </li>
                            </ul>



                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Navbar',
    data() {
        return {
            isSticky: false,
            active: false,
            button_active_state: false,
            user: null,
            isLoggedIn: false,
            CurrentLanguage: '',
        }
    },
    created() {

        if (window.Laravel.isLoggedin) {
            this.isLoggedIn = true;
            this.user = window.Laravel.user;
        }
        this.CurrentLanguage = window.language.currentLanguage;


    },

    mounted() {
        var menu = document.getElementById("user-menu");
        const that = this
        window.addEventListener('scroll', () => {
            let scrollPos = window.scrollY
            if (scrollPos >= 100) {
                that.isSticky = true
            } else {
                that.isSticky = false
            }
            if (menu != null) {
                menu.style.display = "none";
            }
        });
        var logo = document.getElementById("mobile-user-logo");
        if (logo != null) {
            logo.addEventListener("click", function () {
                document.getElementById("user-menu").style.display = "block";
            });
        }

    }
}
</script>
