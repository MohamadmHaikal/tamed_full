<template>
    <div>
        <Navbar />
        <PageTitle />
        <TeamArea />
        <AccountCreate />
        <Footer />
    </div>
</template>

<script>
import Navbar from '../layout/Navbar'
import PageTitle from '../team/PageTitle'
import TeamArea from '../team/TeamArea'
import AccountCreate from '../common/AccountCreate'
import Footer from '../layout/Footer'

export default {
    name: 'Team',
    components: {
        Navbar,
        PageTitle,
        TeamArea,
        AccountCreate,
        Footer,
    }
}
</script>