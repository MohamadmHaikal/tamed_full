<template>
    <div>
        <Navbar />
        <MainBanner />
        <Partner />
        <Experience />
        <Support />
        <Business />
        <Testimonials />
        <SuccessStory />
        <Global />
        <Payment />
        <GetStarted />
        <Footer /> 
    </div>
</template>

<script>
import Navbar from '../layout/Navbar'
import MainBanner from '../home-demo-four/MainBanner'
import Partner from '../home-demo-four/Partner'
import Experience from '../home-demo-four/Experience'
import Support from '../home-demo-four/Support'
import Business from '../home-demo-four/Business'
import Testimonials from '../home-demo-four/Testimonials'
import SuccessStory from '../home-demo-four/SuccessStory'
import Global from '../home-demo-four/Global'
import Payment from '../home-demo-four/Payment'
import GetStarted from '../home-demo-four/GetStarted'
import Footer from '../layout/Footer'

export default {
    name: 'HomeDemoFour',
    components: {
        Navbar,
        MainBanner,
        Partner,
        Experience,
        Support,
        Business,
        Testimonials,
        SuccessStory,
        Global,
        Payment,
        GetStarted,
        Footer,
    }
}
</script>