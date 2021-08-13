
import PimpinanBase from '../../pages/pimpinan/PimpinanBase.vue'
import PimpinanIndex from '../../pages/pimpinan/PimpinanIndex.vue'
import PimpinanInfo from '../../pages/pimpinan/PimpinanInfo.vue'
import PimpinanInfoIndex from '../../pages/pimpinan/tab/PimpinanInfoIndex.vue'
import PimpinanKelasIndex from '../../pages/pimpinan/tab/PimpinanKelasIndex.vue'
import PimpinanTambah from '../../pages/pimpinan/page/PimpinanTambahIndex.vue'
import PimpinanList from '../../pages/pimpinan/page/PimpinanListIndex.vue'

export const pimpinan = [
    { path: '/admin/pimpinan', component: PimpinanBase, children: [
        { path: 'list', component: PimpinanIndex, children: [
            { path: '/', component: PimpinanList, name: 'pimpinan.list' },
        ]},
        { path: 'tambah', component: PimpinanIndex, children: [
            { path: '/', component: PimpinanTambah, name: 'pimpinan.insert' },
        ]},
        { path: ':id_guru', component: PimpinanInfo, children: [
            { path: 'kelas', component: PimpinanKelasIndex, name: 'pimpinan.kelas' },
            { path: '/', component: PimpinanInfoIndex, name: 'pimpinan.show' },
        ] },
        { path: '/', component: PimpinanIndex, children: [
            { path: '/', component: PimpinanList, name: 'pimpinan' },
        ] },
    ] },
]
export default pimpinan