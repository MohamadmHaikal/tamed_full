<template>
    <div>
        <Navbar />
        <MainBanner />
        <Featured />
        <HowItWorks />
        <Services />
        <ServicesTwo />
        <ServicesThree />
        <ServicesFour />
        <Comparisons />
        <FeaturesTwo />
        <Invoicing />
        <FunFacts />
        <Feedback />
        <ReadyToTalk />
        <Partner />
        <AppDownload />
        <Blog />
        <AccountCreate />
        <Footer />
    </div>
</template>

<script>
import Navbar from '../layout/Navbar'
import MainBanner from '../home-demo-two/MainBanner'
import Featured from '../home-demo-two/Featured'
import HowItWorks from '../home-demo-two/HowItWorks'
import Services from '../home-demo-two/Services'
import ServicesTwo from '../home-demo-two/ServicesTwo'
import ServicesThree from '../home-demo-two/ServicesThree'
import ServicesFour from '../home-demo-two/ServicesFour'
import Comparisons from '../common/Comparisons'
import FeaturesTwo from '../home-demo-two/FeaturesTwo'
import Invoicing from '../common/Invoicing'
import FunFacts from '../common/FunFacts'
import Feedback from '../common/Feedback'
import ReadyToTalk from '../common/ReadyToTalk'
import Partner from '../common/Partner'
import AppDownload from '../common/AppDownload'
import Blog from '../home-demo-two/Blog'
import AccountCreate from '../common/AccountCreate'
import Footer from '../layout/Footer'

export default {
    name: 'HomeDemoTwo',
    components: {
        Navbar,
        MainBanner,
        Featured,
        HowItWorks,
        Services,
        ServicesTwo,
        ServicesThree,
        ServicesFour,
        Comparisons,
        FeaturesTwo,
        Invoicing,
        FunFacts,
        Feedback,
        ReadyToTalk,
        Partner,
        AppDownload,
        Blog,
        AccountCreate,
        Footer,
    }
}
</script>
