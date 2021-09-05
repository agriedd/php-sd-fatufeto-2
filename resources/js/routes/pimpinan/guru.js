
import GuruBase from '../../pages/guru/GuruBase.vue'
import GuruIndex from '../../pages/guru/GuruIndex.vue'
import GuruInfo from '../../pages/guru/GuruInfo.vue'
import GuruInfoIndex from '../../pages/guru/tab/GuruInfoIndex.vue'
import GuruKelasIndex from '../../pages/guru/tab/GuruKelasIndex.vue'
import GuruTambah from '../../pages/guru/page/GuruTambahIndex.vue'
import GuruList from '../../pages/guru/page/GuruListIndex.vue'

export const guru = [
    { path: '/u/pimpinan/guru', component: GuruBase, children: [
        { path: 'list', component: GuruIndex, children: [
            { path: '/', component: GuruList, name: 'guru.list' },
        ]},
        { path: ':id_guru', component: GuruInfo, children: [
            { path: 'kelas', component: GuruKelasIndex, name: 'guru.kelas' },
            { path: '/', component: GuruInfoIndex, name: 'guru.show' },
        ] },
        { path: '/', component: GuruIndex, children: [
            { path: '/', component: GuruList, name: 'guru' },
        ] },
    ] },
]
export default guru