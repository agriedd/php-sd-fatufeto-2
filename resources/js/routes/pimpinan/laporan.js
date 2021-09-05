
import LaporanBase from '../../pages/laporan/LaporanBase.vue'
import LaporanIndex from '../../pages/laporan/LaporanIndex.vue'
import LaporanInfo from '../../pages/laporan/LaporanInfo.vue'
import LaporanInfoIndex from '../../pages/laporan/tab/LaporanInfoIndex.vue'
import LaporanList from '../../pages/laporan/page/LaporanListIndex.vue'

export const laporan = [
    { path: '/u/pimpinan/laporan', component: LaporanBase, children: [
        { path: 'list', component: LaporanIndex, children: [
            { path: '/', component: LaporanList, name: 'laporan.list' },
        ]},
        { path: ':id_laporan', component: LaporanInfo, children: [
            { path: '/', component: LaporanInfoIndex, name: 'laporan.show' },
        ] },
        { path: '/', component: LaporanIndex, children: [
            { path: '/', component: LaporanList, name: 'laporan' },
        ] },
    ] },
]
export default laporan