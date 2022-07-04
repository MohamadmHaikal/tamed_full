<template>
    <div>
        <Navbar />
       
        <Details />
        <Footer />
    </div>
</template>

<script>
import Navbar from '../layout/Navbar'

import Details from '../profile/Details'
import Footer from '../layout/Footer'

export default {
    name: 'profile',
    components: {
        Navbar,
     
        Details,
        Footer,
    }
}
</script>