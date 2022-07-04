<template>
    <div>
        <Navbar />
        <PageTitle />
        <Services />
        <ServicesTwo />
        <ServicesThree />
        <ReadyToTalk />
        <Partner />
        <AppDownload />
        <AccountCreate />
        <Footer />
    </div>
</template>

<script>
import Navbar from '../layout/Navbar'
import PageTitle from '../features-one/PageTitle'
import Services from '../common/Services'
import ServicesTwo from '../common/ServicesTwo'
import ServicesThree from '../common/ServicesThree'
import ReadyToTalk from '../common/ReadyToTalk'
import Partner from '../common/Partner'
import AppDownload from '../common/AppDownload'
import AccountCreate from '../common/AccountCreate'
import Footer from '../layout/Footer'

export default {
    name: 'FeaturesOne',
    components: {
        Navbar,
        PageTitle,
        Services,
        ServicesTwo,
        ServicesThree,
        ReadyToTalk,
        Partner,
        AppDownload,
        AccountCreate,
        Footer,
    }
}
</script>