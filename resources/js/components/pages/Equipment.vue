<template>
    <div>
        <Navbar />
        <PageTitle />
        <Suspense>

            <template #default>
                <Equipment />
            </template>
            <template #fallback>
                <ProjectCardSkeleton />
            </template>

        </Suspense>
        <Footer />
    </div>
</template>

<script>
import Navbar from '../layout/Navbar'
import PageTitle from '../equipment/PageTitle'
import Equipment from '../equipment/Equipment'
import ProjectCardSkeleton from '../equipment/ProjectCardSkeleton'
import Footer from '../layout/Footer'

export default {
    name: 'AboutUs',
    components: {
        Navbar,
        PageTitle,
        Equipment,
        ProjectCardSkeleton,
        Footer,
    }
}
</script>