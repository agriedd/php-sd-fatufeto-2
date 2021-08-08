
import SiswaBase from '../../pages/siswa/SiswaBase.vue'
import SiswaIndex from '../../pages/siswa/SiswaIndex.vue'
import SiswaInfo from '../../pages/siswa/SiswaInfo.vue'
import SiswaInfoIndex from '../../pages/siswa/tab/SiswaInfoIndex.vue'
import SiswaKelasIndex from '../../pages/siswa/tab/SiswaKelasIndex.vue'
import SiswaTambah from '../../pages/siswa/page/SiswaTambahIndex.vue'
import SiswaList from '../../pages/siswa/page/SiswaListIndex.vue'

export const siswa = [
    { path: '/admin/siswa', component: SiswaBase, children: [
        { path: 'list', component: SiswaIndex, children: [
            { path: '/', component: SiswaList, name: 'siswa.list' },
        ]},
        { path: 'tambah', component: SiswaIndex, children: [
            { path: '/', component: SiswaTambah, name: 'siswa.insert' },
        ]},
        { path: ':id_siswa', component: SiswaInfo, children: [
            { path: 'kelas', component: SiswaKelasIndex, name: 'siswa.kelas' },
            { path: '/', component: SiswaInfoIndex, name: 'siswa.show' },
        ] },
        { path: '/', component: SiswaIndex, children: [
            { path: '/', component: SiswaList, name: 'siswa' },
        ] },
    ] },
]
export default siswa