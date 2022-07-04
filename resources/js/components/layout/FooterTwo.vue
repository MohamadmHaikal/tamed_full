<template>
    <div>
        <footer class="footer-area footer-style-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-sm-6 col-md-6">
                        <div class="single-footer-widget">
                            <div class="logo">
                                <router-link to="/">
                                    <img src="../../assets/images/logo.png" alt="logo">
                                </router-link>
                                <p>Quis ipsum suspendisse ultrices gravida commodo. Risus commodo veliliee vel viverra maecenas accumsan lacus vel facilisis.</p>
                            </div>

                            <ul class="social-links">
                                <li><a href="https://www.facebook.com/" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="https://www.twitter.com/" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="https://www.linkedin.com/" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 col-md-6">
                        <div class="single-footer-widget">
                            <h3>Company</h3>

                            <ul class="list">
                                <li><router-link to="/about-us">About Us</router-link></li>
                                <li><router-link to="/#">Services</router-link></li>
                                <li><router-link to="/features-2">Features</router-link></li>
                                <li><router-link to="/pricing">Our Pricing</router-link></li>
                                <li><router-link to="/#">Latest News</router-link></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 col-md-6">
                        <div class="single-footer-widget">
                            <h3>Support</h3>

                            <ul class="list">
                                <li><router-link to="/faq">FAQ's</router-link></li>
                                <li><router-link to="/privacy-policy">Privacy Policy</router-link></li>
                                <li><router-link to="/terms-condition">Terms & Condition</router-link></li>
                                <li><router-link to="/#">Community</router-link></li>
                                <li><router-link to="/contact">Contact Us</router-link></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 col-md-6">
                        <div class="single-footer-widget">
                            <h3>Address</h3>

                            <ul class="footer-contact-info">
                                <li><span>Location:</span> 27 Division St, New York, NY 10002, USA</li>
                                <li><span>Email:</span> <a href="mailto:hello@vibion.com">hello@vibion.com</a></li>
                                <li><span>Phone:</span> <a href="tel:+321984754">+ (321) 984 754</a></li>
                                <li><span>Fax:</span> <a href="tel:+12129876543">+1-212-9876543</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="copyright-area">
                    <p>&copy; {{currentYear}} Vibion. All rights reserved <a href="https://envytheme.com/" target="_blank">EnvyTheme.com</a></p>
                </div>
            </div>

            <div class="map-image"><img src="../../assets/images/map.png" alt="map"></div>
        </footer>
        <!-- End Footer Area -->

        <div 
            @click="scrollToTop()" 
            :class="['back-to-top-btn', {'go-top': isTop}]"
        >
            <i class="fas fa-arrow-up"></i>
        </div>
    </div>
</template>

<script>
export default {
    name: 'FooterTwo',
    data (){
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
    mounted(){
        const that = this
        window.addEventListener('scroll', () => {
            let scrollPos = window.scrollY
            if(scrollPos >= 100){
                that.isTop = true
            } else {
                that.isTop = false
            }
        })
    }
}
</script>