<script setup>
import AppLayout from '@/layouts/AppLayout.vue';
import { Card, CardHeader, CardContent, CardTitle } from "@/components/ui/card";
import { Head, Link, useForm } from '@inertiajs/vue3';
import { Button, buttonVariants } from "@/components/ui/button";
import { Input } from "@/components/ui/input";

import { Textarea } from "@/components/ui/textarea";
import { Label } from "@/components/ui/label";
import InputError from "@/components/InputError.vue";

const form = useForm({
    kode_mata_kuliah: '',
    nama_mata_kuliah: '',
    sks: '',
    semester: '',
});

const submit = () => {
    form.post(route('mata-kuliah.store'), { // Asumsi route untuk menyimpan data baru adalah 'mata-kuliah.store'
        onFinish: () => form.reset(), // Opsional: reset form setelah selesai
    });
};

const breadcrumbs = [
    {
        title: 'Dashboard',
        href: '/dashboard',
    },
    {
        title: 'Mata Kuliah',
        href: '/mata-kuliah',
    },
    {
        title: 'Tambah Mata Kuliah',
        href: '/tambah-mata-kuliah',
    },
]; 
</script>

<template>
    <Head title="Mata Kuliah" /> 
    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4 overflow-x-auto">
            <Card>
                <CardHeader>
                <h1 class="text-xl font-bold">Tambah Mata Kuliah</h1>
            </CardHeader>
            <CardContent class="space-y-3">
                <form @submit.prevent="submit" class="space-y-6">
                    <div class="grid w-full gap-2">
                        <div>
                            <Label for="kode_mata_kuliah" class="block text-sm font-medium">Kode Mata Kuliah</Label>
                            <Input type="text" id="kode_mata_kuliah" v-model="form.kode_mata_kuliah" class="mt-1 block w-full" required />
                            <InputError :message="form.errors.kode_mata_kuliah" />
                        </div>
                        <div>
                            <Label for="nama_mata_kuliah" class="block text-sm font-medium">Nama Mata Kuliah</Label>
                            <Input type="text" id="nama_mata_kuliah" v-model="form.nama_mata_kuliah" class="mt-1 block w-full" required />
                            <InputError :message="form.errors.nama_mata_kuliah" />
                        </div>
                        <div>
                            <Label for="sks" class="block text-sm font-medium">SKS</Label>
                            <Input type="number" id="sks" v-model="form.sks" class="mt-1 block w-full" required />
                            <InputError :message="form.errors.sks" />
                        </div>
                        <div>
                            <Label for="semester" class="block text-sm font-medium">Semester</Label>
                            <input type="number" id="semester" v-model="form.semester" class="mt-1 block w-full" required />
                            <InputError :message="form.errors.semester" />
                        </div>
                        <div>
                            <Label for="deskripsi" class="block text-sm font-medium">Deskripsi</Label>
                            <Textarea id="deskripsi" v-model="form.deskripsi" class="mt-1 block w-full" required />
                            <InputError :message="form.errors.deskripsi" />
                        </div>
                    </div>
                        <Button variant="default" :disabled="form.processing" class="mt-4 mr-4">Simpan</Button>
                        <Link :href="route('mata-kuliah.index')" :class="buttonVariants({ variant: 'destructive' })" class="mt-4">Batal</Link>
                </form>
            </CardContent>
            </Card>
        </div>
    </AppLayout> 
</template>