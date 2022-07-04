<template>
    <div class="contact-area ptb-70">
        <div class="container">
            <div class="section-title text-center">
                <h2>أرسل لنا رسالة لأي استفسار</h2>
                <div class="bar"></div>
                <br>
            </div>

            <div class="row align-items-center">
                <div class="col-lg-5 col-md-12">
                    <div class="contact-info">
                        <ul>
                            <li>
                                <div class="icon">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <span>العنوان</span>
                                المملكة العربية السعودية / الرياض
                            </li>

                            <li>
                                <div class="icon">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <span>البريد الالكتروني</span>
                                <a href="mailto:support@tamedksa.com">support@tamedksa.com</a>

                            </li>

                            <li>
                                <div class="icon">
                                    <i class="fas fa-phone-volume"></i>
                                </div>
                                <span>رقم الجوال</span>
                                <a href="tel:+966581333357">581333357 (966+)</a>

                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-7 col-md-12">
                    <div class="contact-form">
                        <form id="contactForm">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="name" id="name" class="form-control" required
                                            data-error="Please enter your name" placeholder="الاسم">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <input type="email" name="email" id="email" class="form-control" required
                                            data-error="Please enter your email" placeholder="البريد الالكتروني">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="phone_number" id="phone_number" required
                                            data-error="Please enter your number" class="form-control"
                                            placeholder="رقم الجوال">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="msg_subject" id="msg_subject" class="form-control"
                                            required data-error="Please enter your subject" placeholder="الموضوع">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <textarea name="message" class="form-control" id="message" cols="30" rows="6"
                                            required data-error="Write your message"
                                            placeholder="نص الرسالة"></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 "  style="text-align: end;">
                                    <button type="submit" class="btn btn-primary">أرسل رسالة</button>
                                    <div id="msgSubmit" class="h3 text-center hidden"></div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-map"><img src="../../assets/images/bg-map.png" alt="image"></div>
    </div>
</template>

<script>
export default {
    name: 'ContactArea'
}
</script>