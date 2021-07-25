
import GuruBase from '../../pages/guru/GuruBase.vue'
import GuruIndex from '../../pages/guru/GuruIndex.vue'
import GuruInfo from '../../pages/guru/GuruInfo.vue'
import GuruInfoIndex from '../../pages/guru/tab/GuruInfoIndex.vue'
import GuruTambah from '../../pages/guru/page/GuruTambahIndex.vue'

export const guru = [
    { path: '/admin/guru', component: GuruBase, children: [
        { path: 'tambah', component: GuruIndex, children: [
            { path: '/', component: GuruTambah, name: 'guru.insert' },
        ]},
        { path: ':id_guru', component: GuruInfo, children: [
            { path: '/', component: GuruInfoIndex, name: 'guru.show' },
        ] },
        { path: '/', component: GuruIndex, name: 'guru' },
    ] },
]
export default guru