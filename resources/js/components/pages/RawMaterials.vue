<template>
    <div>
        <Navbar />
        <PageTitle />
        <Suspense>

            <template #default>
                <RawMaterials />
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
import PageTitle from '../raw-materials/PageTitle'
import RawMaterials from '../raw-materials/RawMaterials'
import ProjectCardSkeleton from '../raw-materials/ProjectCardSkeleton'
import Footer from '../layout/Footer'

export default {
    name: 'AboutUs',
    components: {
        Navbar,
        PageTitle,
        RawMaterials,
        ProjectCardSkeleton,
        Footer,
    }
}
</script>