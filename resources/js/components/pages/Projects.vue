<template>
    <div>
        <Navbar />
        <PageTitle />
        <Suspense>

            <template #default>
                <Projects />
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
import PageTitle from '../projects/PageTitle'
import Projects from '../projects/Projects'
import ProjectCardSkeleton from '../projects/ProjectCardSkeleton'
import Footer from '../layout/Footer'

export default {
    name: 'AboutUs',
    components: {
        Navbar,
        PageTitle,
        Projects,
        ProjectCardSkeleton,
        Footer,
    }
}
</script>