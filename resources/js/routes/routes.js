import Index from '../pages/Index.vue'
import SekolahBase from '../pages/sekolah/SekolahBase.vue'
import SekolahIndex from '../pages/sekolah/SekolahIndex.vue'
import SekolahInfo from '../pages/sekolah/SekolahInfo.vue'
import SekolahInfoIndex from '../pages/sekolah/tab/SekolahInfoIndex.vue'
import SekolahInfoBerita from '../pages/sekolah/tab/SekolahInfoBerita.vue'
import SekolahTambah from '../pages/sekolah/page/SekolahTambahIndex.vue'

export default [
    { path: '/admin', component: Index, name: 'admin' },
    { path: '/admin/sekolah', component: SekolahBase, children: [
        { path: 'tambah', component: SekolahIndex, children: [
            { path: '/', component: SekolahTambah, name: 'sekolah.insert' },
        ]},
        { path: ':id_profil', component: SekolahInfo, children: [
            { path: 'berita', component: SekolahInfoBerita, name: 'sekolah.show.berita' },
            { path: '/', component: SekolahInfoIndex, name: 'sekolah.show' },
        ] },
        { path: '/', component: SekolahIndex, name: 'sekolah' },
    ] },
    // { path: '/admin/jemaat/kk', component: KK, name: 'admin.kk' },
    // { path: '/admin/jemaat', component: Jemaat },
    //     { path: '/admin/jemaat/:id', component: InfoJemaat, name: 'jemaat.info' },
]