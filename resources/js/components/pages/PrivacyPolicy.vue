<template>
    <div>
        <Navbar />
        <PageTitle />
        <PrivacyPolicyArea />
        <Footer />
    </div>
</template>

<script>
import Navbar from '../layout/Navbar'
import PageTitle from '../privacy-policy/PageTitle'
import PrivacyPolicyArea from '../privacy-policy/PrivacyPolicyArea'
import Footer from '../layout/Footer'

export default {
    name: 'PrivacyPolicy',
    components: {
        Navbar,
        PageTitle,
        PrivacyPolicyArea,
        Footer,
    }
}
</script> 