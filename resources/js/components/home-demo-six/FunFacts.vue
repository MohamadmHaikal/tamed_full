<template>
    <div class="funfacts-style-area">
        <div class="container">
            <div class="funfacts-style-inner-box ptb-100">
                <div class="row">
                    <div class="col-lg-3 col-sm-3 col-md-3 col-6">
                        <div class="funfact">
                            <h3>180K</h3>
                            <p>Downloaded</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-3 col-md-3 col-6">
                        <div class="funfact">
                            <h3>20K</h3>
                            <p>Feedback</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-3 col-md-3 col-6">
                        <div class="funfact">
                            <h3>500+</h3>
                            <p>Workers</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-3 col-md-3 col-6">
                        <div class="funfact">
                            <h3>70+</h3>
                            <p>Contrubutors</p>
                        </div>
                    </div>
                </div>

                <div class="contact-cta-box">
                    <h3>Have any question about us?</h3>
                    <p>Don't hesitate to contact us</p>
                    <router-link to="/contact" class="btn btn-primary">Contact Us</router-link>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'FunFacts'
}
</script>