
import KategoriBase from '../../pages/kategori/KategoriBase.vue'
import KategoriIndex from '../../pages/kategori/KategoriIndex.vue'
import KategoriInfo from '../../pages/kategori/KategoriInfo.vue'
import KategoriInfoIndex from '../../pages/kategori/tab/KategoriInfoIndex.vue'
import KategoriKelasIndex from '../../pages/kategori/tab/KategoriKelasIndex.vue'
import KategoriTambah from '../../pages/kategori/page/KategoriTambahIndex.vue'
import KategoriList from '../../pages/kategori/page/KategoriListIndex.vue'

export const kategori = [
    { path: '/admin/kategori', component: KategoriBase, children: [
        { path: 'list', component: KategoriIndex, children: [
            { path: '/', component: KategoriList, name: 'kategori.list' },
        ]},
        { path: 'tambah', component: KategoriIndex, children: [
            { path: '/', component: KategoriTambah, name: 'kategori.insert' },
        ]},
        { path: ':id_guru', component: KategoriInfo, children: [
            { path: 'kelas', component: KategoriKelasIndex, name: 'kategori.kelas' },
            { path: '/', component: KategoriInfoIndex, name: 'kategori.show' },
        ] },
        { path: '/', component: KategoriIndex, children: [
            { path: '/', component: KategoriList, name: 'kategori' },
        ] },
    ] },
]
export default kategori