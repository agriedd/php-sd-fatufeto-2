
import JadwalBase from '../../pages/jadwal/JadwalBase.vue'
import JadwalIndex from '../../pages/jadwal/JadwalIndex.vue'
import JadwalInfo from '../../pages/jadwal/JadwalInfo.vue'
import JadwalInfoIndex from '../../pages/jadwal/tab/JadwalInfoIndex.vue'
import JadwalTambah from '../../pages/jadwal/page/JadwalTambahIndex.vue'
import JadwalList from '../../pages/jadwal/page/JadwalListIndex.vue'

export const jadwal = [
    { path: '/admin/jadwal', component: JadwalBase, children: [
        { path: 'list', component: JadwalIndex, children: [
            { path: '/', component: JadwalList, name: 'jadwal.list' },
        ]},
        { path: 'tambah', component: JadwalIndex, children: [
            { path: '/', component: JadwalTambah, name: 'jadwal.insert' },
        ]},
        { path: ':id_jadwal', component: JadwalInfo, children: [
            { path: '/', component: JadwalInfoIndex, name: 'jadwal.show' },
        ] },
        { path: '/', component: JadwalIndex, children: [
            { path: '/', component: JadwalList, name: 'jadwal' },
        ] },
    ] },
]
export default jadwal