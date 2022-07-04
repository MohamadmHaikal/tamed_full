<template>
    <div>
        <Navbar />
        <PageTitle />
        <Blog />
        <AccountCreate />
        <Footer />
    </div>
</template>

<script>
import Navbar from '../layout/Navbar'
import PageTitle from '../blog-one/PageTitle'
import Blog from '../blog-one/Blog'
import AccountCreate from '../common/AccountCreate'
import Footer from '../layout/Footer'

export default {
    name: 'BlogOne',
    components: {
        Navbar,
        PageTitle,
        Blog,
        AccountCreate,
        Footer,
    }
}
</script>