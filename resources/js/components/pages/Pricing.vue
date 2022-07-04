<template>
    <div>
        <Navbar />
        <PageTitle />
        <PricingArea />
        <AccountCreate />
        <Footer />
    </div>
</template>

<script>
import Navbar from '../layout/Navbar'
import PageTitle from '../pricing/PageTitle'
import PricingArea from '../pricing/PricingArea'
import AccountCreate from '../common/AccountCreate'
import Footer from '../layout/Footer'

export default {
    name: 'Pricing',
    components: {
        Navbar,
        PageTitle,
        PricingArea,
        AccountCreate,
        Footer,
    }
}
</script>