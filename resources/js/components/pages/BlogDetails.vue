<template>
    <div>
        <Navbar />
        <PageTitle />
        <BlogDetails />
        <Footer />
    </div>
</template>

<script>
import Navbar from '../layout/Navbar'
import PageTitle from '../page-details/PageTitle'
import BlogDetails from '../page-details/BlogDetails'
import Footer from '../layout/Footer'

export default {
    name: 'BlogOne',
    components: {
        Navbar,
        PageTitle,
       BlogDetails,
        Footer,
    }
}
</script>