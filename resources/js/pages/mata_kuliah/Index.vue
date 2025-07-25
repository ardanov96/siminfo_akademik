<script setup>
import AppLayout from '@/layouts/AppLayout.vue';
import { Table, TableHeader, TableBody, TableRow, TableHead, TableCell } from "@/components/ui/table";
import { Head, Link } from '@inertiajs/vue3';
import { Button, buttonVariants } from "@/components/ui/button";
import { deleteMatakuliah } from "@/composables/useMataKuliah";


defineProps({
    matakuliah: {
        type: Array,
        required: true,
    },
});

const breadcrumbs = [
    {
        title: 'Mata Kuliah',
        href: '/mata-kuliah',
    },
]; 
</script>

<template>
    <Head title="Mata Kuliah" /> 
    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4 overflow-x-auto">
            <div class="mt-3 right-0 flex items-center justify-end">
                <Link :href="route('mata-kuliah.create')" :class="buttonVariants({ variant: 'outline' })">Tambah Mata Kuliah</Link>
            </div>
            <Table>
                <TableHeader>
                    <TableRow>
                        <TableHead>ID</TableHead>
                        <TableHead>Kode Matkul</TableHead>
                        <TableHead>Nama Matkul</TableHead>
                        <TableHead>SKS</TableHead>
                        <TableHead>Semester</TableHead>
                        <TableHead class="w-[120px]">Actions</TableHead>
                    </TableRow>
                </TableHeader>
                <TableBody>
                    <TableRow v-for="item in matakuliah" :key="item.id">
                        <TableCell>{{ item.id }}</TableCell>
                        <TableCell>{{ item.kode_mata_kuliah}}</TableCell>
                        <TableCell>{{ item.nama_mata_kuliah }}</TableCell>
                        <TableCell>{{ item.sks }}</TableCell>
                        <TableCell>{{ item.semester }}</TableCell>
                        <TableCell>
                            <Link :href="route('mata-kuliah.edit', item.id)" :class="buttonVariants({ variant: 'secondary' })">Edit</Link>
                            <Button variant="destructive" class="ml-2" @click="deleteMatakuliah(item.id)">
                                Hapus
                            </Button>
                        </TableCell>
                    </TableRow>
                </TableBody>
            </Table>
        </div>
    </AppLayout>
</template>
