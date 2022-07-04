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
import PageTitle from '../submit-quotes/PageTitle'
import Details from '../submit-quotes/Details'
import Footer from '../layout/Footer'

export default {
    name: 'SubmitQuotes',
    components: {
        Navbar,
        PageTitle,
        Details,
        Footer,
    }
}
</script>