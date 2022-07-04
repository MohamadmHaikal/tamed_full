<template>
    <div>
        <Navbar />
        <PageTitle />
        <BlogDetails />
        <AccountCreate />
        <Footer />
    </div>
</template>

<script>
import Navbar from '../layout/Navbar'
import PageTitle from '../blog-details/PageTitle'
import BlogDetails from '../blog-details/BlogDetails'
import AccountCreate from '../common/AccountCreate'
import Footer from '../layout/Footer'

export default {
    name: 'BlogThree',
    components: {
        Navbar,
        PageTitle,
        BlogDetails,
        AccountCreate,
        Footer,
    }
}
</script>