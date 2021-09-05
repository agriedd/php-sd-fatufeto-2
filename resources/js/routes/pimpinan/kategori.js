
import KategoriBase from '../../pages/kategori/KategoriBase.vue'
import KategoriIndex from '../../pages/kategori/KategoriIndex.vue'
import KategoriInfo from '../../pages/kategori/KategoriInfo.vue'
import KategoriInfoIndex from '../../pages/kategori/tab/KategoriInfoIndex.vue'
import KategoriKelasIndex from '../../pages/kategori/tab/KategoriKelasIndex.vue'
import KategoriList from '../../pages/kategori/page/KategoriListIndex.vue'

export const kategori = [
    { path: '/u/pimpinan/kategori', component: KategoriBase, children: [
        { path: 'list', component: KategoriIndex, children: [
            { path: '/', component: KategoriList, name: 'kategori.list' },
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