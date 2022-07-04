<template>
    <div>
        <NavbarStyleTwo class="bg-white" />
        <MainBanner />
        <Partner />
        <AboutUs />
        <Flexibility />
        <FunFacts />
        <Security />
        <AwesomeFeatures />
        <Testimonials />
        <Blog />
        <Subscribe />
        <FooterTwo />
    </div>
</template>

<script>
import NavbarStyleTwo from '../layout/NavbarStyleTwo'
import MainBanner from '../home-demo-six/MainBanner'
import Partner from '../home-demo-six/Partner'
import AboutUs from '../home-demo-six/AboutUs'
import Flexibility from '../home-demo-six/Flexibility'
import FunFacts from '../home-demo-six/FunFacts'
import Security from '../home-demo-six/Security'
import AwesomeFeatures from '../home-demo-six/AwesomeFeatures'
import Testimonials from '../home-demo-six/Testimonials'
import Blog from '../home-demo-six/Blog'
import Subscribe from '../home-demo-six/Subscribe'
import FooterTwo from '../layout/FooterTwo'

export default {
    name: 'HomeDemoSix',
    components: {
        NavbarStyleTwo,
        MainBanner,
        Partner,
        AboutUs,
        Flexibility,
        FunFacts,
        Security,
        AwesomeFeatures,
        Testimonials,
        Blog,
        Subscribe,
        FooterTwo,
    }
}
</script>
