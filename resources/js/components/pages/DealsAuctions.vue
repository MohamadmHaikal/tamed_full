<template>
    <div>
        <Navbar />
        <PageTitle />
         <Suspense>

            <template #default>
                <DealsAuctions />
            </template>
            <template #fallback>
                <DealsAuctionsCardSkeleton />
            </template>

        </Suspense>
        <Footer />
    </div>
</template>

<script>
import Navbar from '../layout/Navbar'
import PageTitle from '../deals-auctions/PageTitle'
import DealsAuctions from '../deals-auctions/DealsAuctions'
import DealsAuctionsCardSkeleton from '../deals-auctions/DealsAuctionsCardSkeleton'
import Footer from '../layout/Footer'

export default {
    name: 'deals-auctions',
    components: {
        Navbar,
        PageTitle,
        DealsAuctions,
        DealsAuctionsCardSkeleton,
        Footer,
    }
}
</script>