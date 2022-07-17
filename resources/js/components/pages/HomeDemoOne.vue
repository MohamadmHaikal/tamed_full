<template>
    <div>
        <Navbar />
        <MainBanner />
        <Featured />
        <Services />
        <!-- <SectionProject />-->
        <Sectiondeals /> 
        <Invoicing />
        <!-- <ReadyToTalk /> -->
        <!-- <Partner /> -->
        <AppDownload />
        <!-- <Subscribe /> -->
        <Footer />
    </div>
</template>

<script>
import Navbar from '../layout/Navbar'
import MainBanner from '../home-demo-four/MainBanner'
import Featured from '../common/Featured'
import Services from '../common/Services'
import Invoicing from '../common/Invoicing'
// import ReadyToTalk from '../common/ReadyToTalk'
// import Partner from '../common/Partner'
import AppDownload from '../common/AppDownload'
// import Subscribe from '../home-demo-six/Subscribe'
import Footer from '../layout/Footer'
// import SectionProject from '../home-demo-one/SectionProject'
import Sectiondeals from '../home-demo-one/Sectiondeals'
export default {
    name: 'HomeDemoOne',
    components: {
        Navbar,
        MainBanner,
        Featured,
        Services,
        // SectionProject,
        Sectiondeals,
        Invoicing,
        // ReadyToTalk,
        // Partner,
        AppDownload,
        // Subscribe,
        Footer,
    }
}
</script>
