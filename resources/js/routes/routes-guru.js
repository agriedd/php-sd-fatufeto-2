import Index from '../pages/dashboard/guru/Index.vue'
import Kelas from '../pages/dashboard/guru/tab/GuruKelasTab.vue'
import Siswa from '../pages/dashboard/guru/tab/GuruSiswaTab.vue'
import SiswaIndex from '../pages/dashboard/guru/tab/siswa/GuruSiswaIndex.vue'
import SiswaInfo from '../pages/dashboard/guru/tab/siswa/GuruSiswaInfo.vue'
import SiswaInfoIndex from '../pages/dashboard/guru/tab/siswa/GuruSiswaInfoIndex.vue'

export default [
    { path: '/u/guru', component: Index, children: [
        { path: 'siswa', component: Siswa, children: [
            { path: ':id', component: SiswaInfo, children: [
                { path: '/', component: SiswaInfoIndex, name: 'siswa.show' },
            ] },
            { path: '', component: SiswaIndex, name: 'siswa' },
        ]},
        { path: '', component: Kelas, name: 'dashboard' }
    ] },
]