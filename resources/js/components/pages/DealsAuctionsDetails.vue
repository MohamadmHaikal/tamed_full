<template>
    <div>
        <Navbar />
        <PageTitle />
        <Details />
        <OtherDeals />
        <Footer />
    </div>
</template>

<script>
import Navbar from '../layout/Navbar'
import PageTitle from '../deals-auctions-details/PageTitle'
import Details from '../deals-auctions-details/Details'
import Footer from '../layout/Footer'

export default {
    name: 'DealsAuctionsDetails',
    components: {
        Navbar,
        PageTitle,
        Details,
        Footer,
    }
}
</script>