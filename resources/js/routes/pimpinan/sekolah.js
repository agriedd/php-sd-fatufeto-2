
import SekolahBase from '../../pages/sekolah/SekolahBase.vue'
import SekolahIndex from '../../pages/sekolah/SekolahIndex.vue'
import SekolahInfo from '../../pages/sekolah/SekolahInfo.vue'
import SekolahInfoIndex from '../../pages/sekolah/tab/SekolahInfoIndex.vue'
import SekolahInfoBerita from '../../pages/sekolah/tab/SekolahInfoBerita.vue'

export const sekolah = [
    { path: '/u/pimpinan/sekolah', component: SekolahBase, children: [
        { path: ':id_profil', component: SekolahInfo, children: [
            { path: 'berita', component: SekolahInfoBerita, name: 'sekolah.show.berita' },
            { path: '/', component: SekolahInfoIndex, name: 'sekolah.show' },
        ] },
        { path: '/', component: SekolahIndex, name: 'sekolah' },
    ] },
]
export default sekolah