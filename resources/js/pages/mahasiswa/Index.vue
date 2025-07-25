<script setup>
import AppLayout from '@/layouts/AppLayout.vue';
import { Head } from '@inertiajs/vue3';

const breadcrumbs = [
    {
        title: 'Mahasiswa',
        href: '/mahasiswa',
    },
]; 
</script>

<template>
    <Head title="Mahasiswa" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4 overflow-x-auto">
            <h1>Data Mahasiswa</h1>
        </div>
    </AppLayout>
</template>
