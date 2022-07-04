<template>
    <div>
        <Navbar />
        <PageTitle />
        <FaqArea />
        <Footer />
    </div>
</template>

<script>
import Navbar from '../layout/Navbar'
import PageTitle from '../faq/PageTitle'
import FaqArea from '../faq/FaqArea'
import Footer from '../layout/Footer'

export default {
    name: 'Faq',
    components: {
        Navbar,
        PageTitle,
        FaqArea,
        Footer,
    }
}
</script>