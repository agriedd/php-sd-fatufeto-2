
import KegiatanBase from '../../pages/kegiatan/KegiatanBase.vue'
import KegiatanIndex from '../../pages/kegiatan/KegiatanIndex.vue'
import KegiatanInfo from '../../pages/kegiatan/KegiatanInfo.vue'
import KegiatanInfoIndex from '../../pages/kegiatan/tab/KegiatanInfoIndex.vue'
import KegiatanGambarIndex from '../../pages/kegiatan/tab/KegiatanGambarIndex.vue'
import KegiatanList from '../../pages/kegiatan/page/KegiatanListIndex.vue'

export const kegiatan = [
    { path: '/u/pimpinan/kegiatan', component: KegiatanBase, children: [
        { path: 'list', component: KegiatanIndex, children: [
            { path: '/', component: KegiatanList, name: 'kegiatan.list' },
        ]},
        { path: ':id_kegiatan', component: KegiatanInfo, children: [
            { path: 'gambar', component: KegiatanGambarIndex, name: 'kegiatan.gambar' },
            { path: '/', component: KegiatanInfoIndex, name: 'kegiatan.show' },
        ] },
        { path: '/', component: KegiatanIndex, children: [
            { path: '/', component: KegiatanList, name: 'kegiatan' },
        ] },
    ] },
]
export default kegiatan