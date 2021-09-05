
import JadwalBase from '../../pages/jadwal/JadwalBase.vue'
import JadwalIndex from '../../pages/jadwal/JadwalIndex.vue'
import JadwalInfo from '../../pages/jadwal/JadwalInfo.vue'
import JadwalInfoIndex from '../../pages/jadwal/tab/JadwalInfoIndex.vue'
import JadwalList from '../../pages/jadwal/page/JadwalListIndex.vue'
import JadwalKelasList from '../../pages/jadwal/page/JadwalListKelasIndex.vue'

export const jadwal = [
    { path: '/u/pimpinan/jadwal', component: JadwalBase, children: [
        { path: 'list', component: JadwalIndex, children: [
            { path: ':id_kelas', component: JadwalList, name: 'jadwal.list.kelas' },
            { path: '/', component: JadwalList, name: 'jadwal.list' },
        ]},
        { path: ':id_jadwal', component: JadwalInfo, children: [
            { path: '/', component: JadwalInfoIndex, name: 'jadwal.show' },
        ] },
        { path: '/', component: JadwalIndex, children: [
            { path: '/', component: JadwalKelasList, name: 'jadwal' },
        ] },
    ] },
]
export default jadwal