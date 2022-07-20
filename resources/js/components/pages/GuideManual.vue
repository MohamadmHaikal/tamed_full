<template>
    <div>
        <Navbar />
        <PageTitle />
        <Details />
        <Footer />
    </div>
</template>

<script>
import Navbar from '../layout/Navbar'
import PageTitle from '../guide-manual/PageTitle'
import Details from '../guide-manual/Details'
import Footer from '../layout/Footer'

export default {
    name: 'GuideManual',
    components: {
        Navbar,
        PageTitle,
        Details,
        Footer,
    }
}
</script>