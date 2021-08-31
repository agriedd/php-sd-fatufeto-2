import Index from '../pages/dashboard/guru/Index.vue'
import Kelas from '../pages/dashboard/guru/tab/GuruKelasTab.vue'
import Siswa from '../pages/dashboard/guru/tab/GuruSiswaTab.vue'

export default [
    { path: '/u/guru', component: Index, children: [
        { path: 'siswa', component: Siswa, name: 'siswa' },
        { path: '', component: Kelas, name: 'dashboard' }
    ] },
]