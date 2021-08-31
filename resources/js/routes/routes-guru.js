import Index from '../pages/dashboard/guru/Index.vue'
import Kelas from '../pages/dashboard/guru/tab/GuruKelasTab.vue'

export default [
    { path: '/u/guru', component: Index, children: [
        { path: 'siswa', component: Kelas, name: 'siswa' },
        { path: '', component: Kelas, name: 'dashboard' }
    ] },
]