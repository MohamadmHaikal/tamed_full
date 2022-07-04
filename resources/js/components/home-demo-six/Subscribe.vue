<template>
    <div class="subscribe-wrap-area pb-100">
        <div class="container">
            <div class="subscribe-wrap-inner-box">
                <div class="subscribe-wrap-box-content">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-12">
                            <div class="subscribe-content">
                                <h3>Subscribe our nesletter</h3>
                                <p>Don’t miss any update on new promotions</p>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12">
                            <form class="newsletter-form" data-toggle="validator">
                                <input type="text" class="input-newsletter" placeholder="Enter your email address" name="EMAIL">
                                <button type="submit" class="btn btn-primary">Subscribe Now<span></span></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Subscribe'
}
</script>