
import PrasaranaBase from '../../pages/prasarana/PrasaranaBase.vue'
import PrasaranaIndex from '../../pages/prasarana/PrasaranaIndex.vue'
import PrasaranaInfo from '../../pages/prasarana/PrasaranaInfo.vue'
import PrasaranaInfoIndex from '../../pages/prasarana/tab/PrasaranaInfoIndex.vue'
import PrasaranaTambah from '../../pages/prasarana/page/PrasaranaTambahIndex.vue'
import PrasaranaList from '../../pages/prasarana/page/PrasaranaListIndex.vue'

export const prasarana = [
    { path: '/admin/prasarana', component: PrasaranaBase, children: [
        { path: 'list', component: PrasaranaIndex, children: [
            { path: '/', component: PrasaranaList, name: 'prasarana.list' },
        ]},
        { path: 'tambah', component: PrasaranaIndex, children: [
            { path: '/', component: PrasaranaTambah, name: 'prasarana.insert' },
        ]},
        { path: ':id_prasarana', component: PrasaranaInfo, children: [
            { path: '/', component: PrasaranaInfoIndex, name: 'prasarana.show' },
        ] },
        { path: '/', component: PrasaranaIndex, children: [
            { path: '/', component: PrasaranaList, name: 'prasarana' },
        ] },
    ] },
]
export default prasarana