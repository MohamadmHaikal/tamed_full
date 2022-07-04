<template>
    <div class="faq-area ptb-70">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 col-md-12">
                    <div class="faq-content">
                        <h2>Frequently Asked Questions</h2>
                        <div class="bar"></div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>

                        <div class="faq-image">
                            <img src="../../assets/images/faq.png" alt="image">
                        </div>
                    </div>
                </div>

                <div class="col-lg-7 col-md-12">
                    <div class="faq-accordion">
                        <accordion>
                            <accordion-item>
                                <template v-slot:accordion-trigger>
                                    <button class="accordion-button">
                                        Which material types can you work with?
                                    </button>
                                </template>
                                <template v-slot:accordion-content>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Est nibh felis tortor viverra pulvinar nibh tincidunt pellentesque dolor. Sem lectus magna metus sit felis, ipsum, et. Auctor tellus id nunc nibh felis aliquam.</p>
                                </template>
                            </accordion-item>
                            <accordion-item>
                                <template v-slot:accordion-trigger>
                                    <button class="accordion-button">
                                        Is Smart Lock required for instant apps?
                                    </button>
                                </template>
                                <template v-slot:accordion-content>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Est nibh felis tortor viverra pulvinar nibh tincidunt pellentesque dolor. Sem lectus magna metus sit felis, ipsum, et. Auctor tellus id nunc nibh felis aliquam.</p>
                                </template>
                            </accordion-item>
                            <accordion-item>
                                <template v-slot:accordion-trigger>
                                    <button class="accordion-button">
                                        Can I have multiple activities in a single feature?
                                    </button>
                                </template>
                                <template v-slot:accordion-content>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Est nibh felis tortor viverra pulvinar nibh tincidunt pellentesque dolor. Sem lectus magna metus sit felis, ipsum, et. Auctor tellus id nunc nibh felis aliquam.</p>
                                </template>
                            </accordion-item>
                            <accordion-item>
                                <template v-slot:accordion-trigger>
                                    <button class="accordion-button">
                                        Which material types can you work with?
                                    </button>
                                </template>
                                <template v-slot:accordion-content>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Est nibh felis tortor viverra pulvinar nibh tincidunt pellentesque dolor. Sem lectus magna metus sit felis, ipsum, et. Auctor tellus id nunc nibh felis aliquam.</p>
                                </template>
                            </accordion-item>
                            <accordion-item>
                                <template v-slot:accordion-trigger>
                                    <button class="accordion-button">
                                        How To Get Start With Us?
                                    </button>
                                </template>
                                <template v-slot:accordion-content>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Est nibh felis tortor viverra pulvinar nibh tincidunt pellentesque dolor. Sem lectus magna metus sit felis, ipsum, et. Auctor tellus id nunc nibh felis aliquam.</p>
                                </template>
                            </accordion-item>
                        </accordion>
                    </div>
                </div>
            </div>

            <div class="faq-contact">
                <div class="section-title">
                    <h2>Do You Have Any Questions</h2>
                    <div class="bar"></div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>

                <div class="faq-contact-form">
                    <form id="contactForm">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" name="name" id="name" class="form-control" required data-error="Please enter your name" placeholder="Name">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <input type="email" name="email" id="email" class="form-control" required data-error="Please enter your email" placeholder="Email">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" name="phone_number" id="phone_number" required data-error="Please enter your number" class="form-control" placeholder="Phone">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" name="msg_subject" id="msg_subject" class="form-control" required data-error="Please enter your subject" placeholder="Subject">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <textarea name="message" class="form-control" id="message" cols="30" rows="6" required data-error="Write your message" placeholder="Your Message"></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12">
                                <button type="submit" class="btn btn-primary">Send Message</button>
                                <div id="msgSubmit" class="h3 text-center hidden"></div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Accordion from "./Accordion";
import AccordionItem from "./AccordionItem";

export default {
    name: 'FaqArea',
    components: {
        Accordion,
        AccordionItem
    }
}
</script>