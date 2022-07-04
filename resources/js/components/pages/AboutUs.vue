<template>
    <div>
        <Navbar />
        <PageTitle />
        <About />
        <!-- <Team /> -->
        <!-- <ReadyToTalk /> -->
        <!-- <Partner /> -->
        <!-- <AppDownload />
        <AccountCreate /> -->
        <Footer />
    </div>
</template>

<script>
import Navbar from '../layout/Navbar'
import PageTitle from '../about-us/PageTitle'
import About from '../about-us/About'
// import Team from '../about-us/Team'
// import ReadyToTalk from '../common/ReadyToTalk'
// import Partner from '../common/Partner'
// import AppDownload from '../common/AppDownload'
// import AccountCreate from '../common/AccountCreate'
import Footer from '../layout/Footer'

export default {
    name: 'AboutUs',
    components: {
        Navbar,
        PageTitle,
        About,
        // Team,
        // ReadyToTalk,
        // Partner,
        // AppDownload,
        // AccountCreate,
        Footer,
    }
}
</script>