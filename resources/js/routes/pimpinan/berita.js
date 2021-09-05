
import BeritaBase from '../../pages/berita/BeritaBase.vue'
import BeritaIndex from '../../pages/berita/BeritaIndex.vue'
import BeritaInfo from '../../pages/berita/BeritaInfo.vue'
import BeritaInfoIndex from '../../pages/berita/tab/BeritaInfoIndex.vue'
import BeritaList from '../../pages/berita/page/BeritaListIndex.vue'

export const berita = [
    { path: '/u/pimpinan/berita', component: BeritaBase, children: [
        { path: 'list', component: BeritaIndex, children: [
            { path: '/', component: BeritaList, name: 'berita.list' },
        ]},
        { path: ':id_berita', component: BeritaInfo, children: [
            { path: '/', component: BeritaInfoIndex, name: 'berita.show' },
        ] },
        { path: '/', component: BeritaIndex, children: [
            { path: '/', component: BeritaList, name: 'berita' },
        ] },
    ] },
]
export default berita