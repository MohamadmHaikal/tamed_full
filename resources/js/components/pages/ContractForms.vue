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
import PageTitle from '../contract-forms/PageTitle'
import Details from '../contract-forms/Details'
import Footer from '../layout/Footer'

export default {
    name: 'ContractForms',
    components: {
        Navbar,
        PageTitle,
        Details,
        Footer,
    }
}
</script>