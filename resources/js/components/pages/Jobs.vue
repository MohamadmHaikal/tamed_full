<template>
    <div>
        <Navbar />
        <PageTitle />
        <Suspense>

            <template #default>
                <Jobs />
            </template>
            <template #fallback>
                <JobsCardSkeleton />
            </template>

        </Suspense>
        <Footer />
    </div>
</template>

<script>
import Navbar from '../layout/Navbar'
import PageTitle from '../jobs/PageTitle'
import Jobs from '../jobs/Jobs'
import JobsCardSkeleton from '../jobs/JobsCardSkeleton'
import Footer from '../layout/Footer'

export default {
    name: 'deals-auctions',
    components: {
        Navbar,
        PageTitle,
        Jobs,
        JobsCardSkeleton,
        Footer,
    }
}
</script>