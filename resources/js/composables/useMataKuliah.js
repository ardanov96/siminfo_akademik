
import { router } from '@inertiajs/vue3';

export function deleteMatakuliah(id) {
    if (confirm('Apa anda yakin ingin menghapus mata kuliah ini?')) {
        router.delete(route('mata-kuliah.destroy', id), {
            preserveScroll: true
        })
    }
};