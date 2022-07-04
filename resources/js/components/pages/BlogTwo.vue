<template>
    <div>
        <NavbarStyleTwo />
        <PageTitle />
        <BlogRightSidebar />
        <AccountCreate />
        <Footer />
    </div>
</template>

<script>
import NavbarStyleTwo from '../layout/NavbarStyleTwo'
import PageTitle from '../blog-two/PageTitle'
import BlogRightSidebar from '../blog-two/BlogRightSidebar'
import AccountCreate from '../common/AccountCreate'
import Footer from '../layout/Footer'

export default {
    name: 'BlogTwo',
    components: {
        NavbarStyleTwo,
        PageTitle,
        BlogRightSidebar,
        AccountCreate,
        Footer,
    }
}
</script>