
import KelasBase from '../../pages/kelas/KelasBase.vue'
import KelasIndex from '../../pages/kelas/KelasIndex.vue'
import KelasInfo from '../../pages/kelas/KelasInfo.vue'
import KelasInfoIndex from '../../pages/kelas/tab/KelasInfoIndex.vue'
import KelasJadwalIndex from '../../pages/kelas/tab/KelasJadwalIndex.vue'
import KelasTambah from '../../pages/kelas/page/KelasTambahIndex.vue'
import KelasList from '../../pages/kelas/page/KelasListIndex.vue'

export const kelas = [
    { path: '/admin/kelas', component: KelasBase, children: [
        { path: 'list', component: KelasIndex, children: [
            { path: '/', component: KelasList, name: 'kelas.list' },
        ]},
        { path: 'tambah', component: KelasIndex, children: [
            { path: '/', component: KelasTambah, name: 'kelas.insert' },
        ]},
        { path: ':id_kelas', component: KelasInfo, children: [
            { path: 'jadwal', component: KelasJadwalIndex, name: 'kelas.jadwal' },
            { path: '/', component: KelasInfoIndex, name: 'kelas.show' },
        ] },
        { path: '/', component: KelasIndex, children: [
            { path: '/', component: KelasList, name: 'kelas' },
        ] },
    ] },
]
export default kelas