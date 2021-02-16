<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Sites
            </h2>
        </template>

        <div class="py-9">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <sites-app :sites="sites"></sites-app>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import SitesApp from '../../src/nginxconfig/templates/app';

    export default {
        props: {
            sites: Array,
        },
        components: {
            SitesApp,
            AppLayout
        },
    }
</script>
