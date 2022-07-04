<template>
    <div>
        <Navbar />
        <PageTitle />
        <UsagePolicyArea />
        <Footer />
    </div>
</template>

<script>
import Navbar from '../layout/Navbar'
import PageTitle from '../usage-policy/PageTitle'
import UsagePolicyArea from '../usage-policy/UsagePolicyArea'
import Footer from '../layout/Footer'

export default {
    name: 'UsagePolicy',
    components: {
        Navbar,
        PageTitle,
        UsagePolicyArea,
        Footer,
    }
}
</script> 