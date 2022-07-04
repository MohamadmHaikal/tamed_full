<template>
    <div>
        <Navbar />
        <PageTitle />
        <ContactArea />
        <!-- <AccountCreate /> -->
        <Footer />
    </div>
</template>

<script>
import Navbar from '../layout/Navbar'
import PageTitle from '../contact/PageTitle'
import ContactArea from '../contact/ContactArea'
// import AccountCreate from '../common/AccountCreate'
import Footer from '../layout/Footer'

export default {
    name: 'Contact',
    components: {
        Navbar,
        PageTitle,
        ContactArea,
        // AccountCreate,
        Footer,
    }
}
</script>