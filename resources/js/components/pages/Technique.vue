<template>
    <div>
        <Navbar />
        <PageTitle />
        <Suspense>

            <template #default>
                <Technique />
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
import PageTitle from '../technique/PageTitle'
import Technique from '../technique/technique'
import ProjectCardSkeleton from '../technique/ProjectCardSkeleton'
import Footer from '../layout/Footer'

export default {
    name: 'AboutUs',
    components: {
        Navbar,
        PageTitle,
        Technique,
        ProjectCardSkeleton,
        Footer,
    }
}
</script>