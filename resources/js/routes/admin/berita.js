
import BeritaBase from '../../pages/berita/BeritaBase.vue'
import BeritaIndex from '../../pages/berita/BeritaIndex.vue'
import BeritaInfo from '../../pages/berita/BeritaInfo.vue'
import BeritaInfoIndex from '../../pages/berita/tab/BeritaInfoIndex.vue'
import BeritaKelasIndex from '../../pages/berita/tab/BeritaKelasIndex.vue'
import BeritaTambah from '../../pages/berita/page/BeritaTambahIndex.vue'
import BeritaList from '../../pages/berita/page/BeritaListIndex.vue'

export const berita = [
    { path: '/admin/berita', component: BeritaBase, children: [
        { path: 'list', component: BeritaIndex, children: [
            { path: '/', component: BeritaList, name: 'berita.list' },
        ]},
        { path: 'tambah', component: BeritaIndex, children: [
            { path: '/', component: BeritaTambah, name: 'berita.insert' },
        ]},
        { path: ':id_guru', component: BeritaInfo, children: [
            { path: 'kelas', component: BeritaKelasIndex, name: 'berita.kelas' },
            { path: '/', component: BeritaInfoIndex, name: 'berita.show' },
        ] },
        { path: '/', component: BeritaIndex, children: [
            { path: '/', component: BeritaList, name: 'berita' },
        ] },
    ] },
]
export default berita