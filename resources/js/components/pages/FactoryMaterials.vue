<template>
    <div>
        <Navbar />
        <PageTitle />
        <Suspense>

            <template #default>
                <FactoryMaterials />
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
import PageTitle from '../factory-materials/PageTitle'
import FactoryMaterials from '../factory-materials/FactoryMaterials'
import ProjectCardSkeleton from '../factory-materials/ProjectCardSkeleton'
import Footer from '../layout/Footer'

export default {
    name: 'factory-materials',
    components: {
        Navbar,
        PageTitle,
        FactoryMaterials,
        ProjectCardSkeleton,
        Footer,
    }
}
</script>