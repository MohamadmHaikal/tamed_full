<template>
    <div>
        <Navbar />
        <PageTitle />
        <TermsConditionArea />
        <Footer />
    </div>
</template>

<script>
import Navbar from '../layout/Navbar'
import PageTitle from '../terms-condition/PageTitle'
import TermsConditionArea from '../terms-condition/TermsConditionArea'
import Footer from '../layout/Footer'

export default {
    name: 'TermsCondition',
    components: {
        Navbar,
        PageTitle,
        TermsConditionArea,
        Footer,
    }
}
</script> 