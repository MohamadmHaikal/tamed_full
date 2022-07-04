<template>
    <div class="blog-wrap-area pt-100 pb-75">
        <div class="container">
            <div class="wrap-section-title">
                <span>Our Blog</span>
                <h2>We make banking faster & easier, so you can do more</h2>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6">
                    <div class="single-blog-card">
                        <div class="image">
                            <router-link to="/blog-details" class="d-block">
                                <img src="../../assets/images/home-six/blog1.jpg" alt="image">
                            </router-link>
                            <span class="date">October 30, 2022</span>
                        </div>
                        <div class="content">
                            <h3>
                                <router-link to="/blog-details">
                                    Protect Your Workplace from Cyber Attacks
                                </router-link>
                            </h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna ali</p>
                            <router-link to="/blog-details" class="read-more-btn">
                                Read more 
                                <i class="fa fa-chevron-right"></i>
                            </router-link>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="single-blog-card">
                        <div class="image">
                            <router-link to="/blog-details" class="d-block">
                                <img src="../../assets/images/home-six/blog2.jpg" alt="image">
                            </router-link>
                            <span class="date">October 30, 2022</span>
                        </div>
                        <div class="content">
                            <h3>
                                <router-link to="/blog-details">
                                    The security risks of changing package owners
                                </router-link>
                            </h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna ali</p>
                            <router-link to="/blog-details" class="read-more-btn">
                                Read more 
                                <i class="fa fa-chevron-right"></i>
                            </router-link>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="single-blog-card">
                        <div class="image">
                            <router-link to="/blog-details" class="d-block">
                                <img src="../../assets/images/home-six/blog3.jpg" alt="image">
                            </router-link>
                            <span class="date">October 30, 2022</span>
                        </div>
                        <div class="content">
                            <h3>
                                <router-link to="/blog-details">
                                    10 Tips To Reduce Your Card Processing Costs
                                </router-link>
                            </h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna ali</p>
                            <router-link to="/blog-details" class="read-more-btn">
                                Read more 
                                <i class="fa fa-chevron-right"></i>
                            </router-link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Blog'
}
</script>