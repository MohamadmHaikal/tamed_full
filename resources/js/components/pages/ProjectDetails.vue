<template>
    <div>
        <Navbar />
        <PageTitle />
        <Suspense>

            <template #default>
              <Details />
            </template>
            <template #fallback>
                <DetailsCardSkeleton />
            </template>

        </Suspense>
        
        <OtherDeals />
        <Footer />
    </div>
</template>

<script>
import Navbar from '../layout/Navbar'
import PageTitle from '../project details/PageTitle'
import Details from '../project details/Details'
import DetailsCardSkeleton from '../project details/DetailsCardSkeleton'
import Footer from '../layout/Footer'

export default {
    name: 'ProjectDetails',
    components: {
        Navbar,
        PageTitle,
        Details,
        DetailsCardSkeleton,
        Footer,
    }
}
</script>