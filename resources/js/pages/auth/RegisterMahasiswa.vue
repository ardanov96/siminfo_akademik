<script setup lang="ts">
import InputError from '@/components/InputError.vue';
import TextLink from '@/components/TextLink.vue';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { Select, SelectContent, SelectItem, SelectTrigger, SelectValue } from '@/components/ui/select';
import { Textarea } from '@/components/ui/textarea';
import AuthBase from '@/layouts/AuthLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import { LoaderCircle } from 'lucide-vue-next';




const form = useForm({
    nim: '', 
    nama: '', 
    email: '', 
    password: '',
    password_confirmation: '',
    jenis_kelamin: '', 
    tanggal_lahir: '', 
    tempat_lahir: '',
    alamat: '', 
    no_telepon: '', 
    angkatan: '', 
    program_studi: '', 
});

const submit = () => {
    // Convert angkatan to number before submitting
    form.angkatan = form.angkatan ? String(Number(form.angkatan)) : '';
    form.post(route('mahasiswa.register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <AuthBase title="Daftar Akun Mahasiswa" description="Isi detail anda di bawah untuk membuat akun mahasiswa">
        <Head title="Daftar Mahasiswa Baru" />

        <form @submit.prevent="submit" class="flex flex-col gap-6">
            <div class="grid gap-6">
                <!-- NIM -->
                <div class="grid gap-2">
                    <Label for="nim">NIM</Label>
                    <Input
                        id="nim"
                        type="number"
                        required
                        autofocus
                        :tabindex="1"
                        v-model="form.nim"
                        placeholder="Nomor Induk Mahasiswa"
                    />
                    <InputError :message="form.errors.nim" />
                </div>

                <!-- Nama -->
                <div class="grid gap-2">
                    <Label for="nama">Nama Lengkap</Label>
                    <Input
                        id="nama"
                        type="text"
                        required
                        :tabindex="2"
                        autocomplete="name"
                        v-model="form.nama"
                        placeholder="Nama Lengkap Anda"
                    />
                    <InputError :message="form.errors.nama" />
                </div>

                <!-- Email -->
                <div class="grid gap-2">
                    <Label for="email">Alamat Email</Label>
                    <Input
                        id="email"
                        type="email"
                        required
                        :tabindex="3"
                        autocomplete="email"
                        v-model="form.email"
                        placeholder="email@example.com"
                    />
                    <InputError :message="form.errors.email" />
                </div>

                <!-- Jenis Kelamin -->
                <div class="grid gap-2">
                    <Label for="jenis_kelamin">Jenis Kelamin</Label>
                    
                    <Select v-model="form.jenis_kelamin" :tabindex="4">
                        <SelectTrigger>
                            <SelectValue placeholder="Pilih Jenis Kelamin" />
                        </SelectTrigger>
                        <SelectContent>
                            <SelectItem value="Laki-laki">Laki-laki</SelectItem>
                            <SelectItem value="Perempuan">Perempuan</SelectItem>
                        </SelectContent>
                    </Select>
                   
                    <InputError :message="form.errors.jenis_kelamin" />
                </div>

                <!-- Tempat Lahir -->
                <div class="grid gap-2">
                    <Label for="tempat_lahir">Tempat Lahir</Label>
                    <Input
                        id="tempat_lahir"
                        type="text"
                        required
                        :tabindex="5"
                        v-model="form.tempat_lahir"
                        placeholder="Kota Tempat Lahir"
                    />
                    <InputError :message="form.errors.tempat_lahir" />
                </div>

                <!-- Tanggal Lahir -->
                <div class="grid gap-2">
                    <Label for="tanggal_lahir">Tanggal Lahir</Label>
                    <Input
                        id="tanggal_lahir"
                        type="date"
                        required
                        :tabindex="6"
                        v-model="form.tanggal_lahir"
                    />
                    <InputError :message="form.errors.tanggal_lahir" />
                </div>

                <!-- Alamat -->
                <div class="grid gap-2">
                    <Label for="alamat">Alamat</Label>
                    <Textarea
                        id="alamat"
                        v-model="form.alamat"
                        :tabindex="7"
                        placeholder="Alamat lengkap Anda"
                    />
                   
                    <InputError :message="form.errors.alamat" />
                </div>

                <!-- No Telepon -->
                <div class="grid gap-2">
                    <Label for="no_telepon">Nomor Telepon</Label>
                    <Input
                        id="no_telepon"
                        type="text"
                        :tabindex="8"
                        v-model="form.no_telepon"
                        placeholder="Contoh: 081234567890"
                    />
                    <InputError :message="form.errors.no_telepon" />
                </div>

                <!-- Angkatan -->
                <div class="grid gap-2">
                    <Label for="angkatan">Angkatan</Label>
                    <Input
                        id="angkatan"
                        type="number"
                        required
                        :tabindex="9"
                        v-model="form.angkatan"
                        placeholder="Tahun Angkatan"
                    />
                    <InputError :message="form.errors.angkatan" />
                </div>

                <!-- Program Studi -->
                <div class="grid gap-2">
                    <Label for="program_studi">Program Studi</Label>
                    <Input
                        id="program_studi"
                        type="text"
                        required
                        :tabindex="10"
                        v-model="form.program_studi"
                        placeholder="Contoh: Teknik Informatika"
                    />
                    <InputError :message="form.errors.program_studi" />
                </div>

                <!-- Password -->
                <div class="grid gap-2">
                    <Label for="password">Password</Label>
                    <Input
                        id="password"
                        type="password"
                        required
                        :tabindex="11"
                        autocomplete="new-password"
                        v-model="form.password"
                        placeholder="Password"
                    />
                    <InputError :message="form.errors.password" />
                </div>

                <!-- Confirm password -->
                <div class="grid gap-2">
                    <Label for="password_confirmation">Konfirmasi Password</Label>
                    <Input
                        id="password_confirmation"
                        type="password"
                        required
                        :tabindex="12"
                        autocomplete="new-password"
                        v-model="form.password_confirmation"
                        placeholder="Konfirmasi password"
                    />
                    <InputError :message="form.errors.password_confirmation" />
                </div>

                <Button type="submit" class="mt-2 w-full" :tabindex="13" :disabled="form.processing">
                    <LoaderCircle v-if="form.processing" class="h-4 w-4 animate-spin" />
                    Daftar
                </Button>
            </div>

            <div class="text-center text-sm text-muted-foreground">
                Sudah Punya Akun?
                <TextLink :href="route('mahasiswa.login')" class="underline underline-offset-4" :tabindex="14">Log in</TextLink>
            </div>
        </form>
    </AuthBase>
</template>