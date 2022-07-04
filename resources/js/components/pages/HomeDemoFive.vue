<template>
    <div>
        <Navbar />
        <MainBanner />
        <Featured />
        <Services />
        <ServicesTwo />
        <ServicesThree />
        <Comparisons />
        <FeaturesTwo />
        <Invoicing />
        <FunFacts />
        <Feedback />
        <ReadyToTalk />
        <Partner />
        <AppDownload />
        <AccountCreate />
        <Footer />
    </div>
</template>

<script>
import Navbar from '../layout/Navbar'
import MainBanner from '../home-demo-five/MainBanner'
import Featured from '../common/Featured'
import Services from '../common/Services'
import ServicesTwo from '../common/ServicesTwo'
import ServicesThree from '../common/ServicesThree'
import Comparisons from '../common/Comparisons'
import FeaturesTwo from '../common/FeaturesTwo'
import Invoicing from '../common/Invoicing'
import FunFacts from '../common/FunFacts'
import Feedback from '../common/Feedback'
import ReadyToTalk from '../common/ReadyToTalk'
import Partner from '../common/Partner'
import AppDownload from '../common/AppDownload'
import AccountCreate from '../common/AccountCreate'
import Footer from '../layout/Footer'

export default {
    name: 'HomeDemoFive',
    components: {
        Navbar,
        MainBanner,
        Featured,
        Services,
        ServicesTwo,
        ServicesThree,
        Comparisons,
        FeaturesTwo,
        Invoicing,
        FunFacts,
        Feedback,
        ReadyToTalk,
        Partner,
        AppDownload,
        AccountCreate,
        Footer,
    }
}
</script>
