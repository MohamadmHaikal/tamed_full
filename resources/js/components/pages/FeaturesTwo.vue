<template>
    <div>
        <NavbarStyleTwo />
        <PageTitle />
        <Features />
        <Services />
        <ServicesTwo />
        <ServicesThree />
        <ServicesFour />
        <FeatureTwo />
        <ReadyToTalk />
        <Partner />
        <AppDownload />
        <AccountCreate />
        <Footer />
    </div>
</template>

<script>
import NavbarStyleTwo from '../layout/NavbarStyleTwo'
import PageTitle from '../features-two/PageTitle'
import Features from '../features-two/Features'
import Services from '../features-two/Services'
import ServicesTwo from '../features-two/ServicesTwo'
import ServicesThree from '../features-two/ServicesThree'
import ServicesFour from '../features-two/ServicesFour'
import FeatureTwo from '../features-two/FeatureTwo'
import ReadyToTalk from '../common/ReadyToTalk'
import Partner from '../common/Partner'
import AppDownload from '../common/AppDownload'
import AccountCreate from '../common/AccountCreate'
import Footer from '../layout/Footer'

export default {
    name: 'FeaturesTwo',
    components: {
        NavbarStyleTwo,
        PageTitle,
        Features,
        Services,
        ServicesTwo,
        ServicesThree,
        ServicesFour,
        FeatureTwo,
        ReadyToTalk,
        Partner,
        AppDownload,
        AccountCreate,
        Footer,
    }
}
</script>