import Index from '../pages/Index.vue'
import SekolahBase from '../pages/sekolah/SekolahBase.vue'
import SekolahIndex from '../pages/sekolah/SekolahIndex.vue'

export default [
    { path: '/admin', component: Index, name: 'admin' },
    { path: '/admin/sekolah', component: SekolahBase, children: [
        { path: '/', component: SekolahIndex, name: 'sekolah' },
    ] },
    // { path: '/admin/jemaat/kk', component: KK, name: 'admin.kk' },
    // { path: '/admin/jemaat', component: Jemaat },
    //     { path: '/admin/jemaat/:id', component: InfoJemaat, name: 'jemaat.info' },
]