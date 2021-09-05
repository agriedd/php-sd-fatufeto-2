
import PrasaranaBase from '../../pages/prasarana/PrasaranaBase.vue'
import PrasaranaIndex from '../../pages/prasarana/PrasaranaIndex.vue'
import PrasaranaInfo from '../../pages/prasarana/PrasaranaInfo.vue'
import PrasaranaInfoIndex from '../../pages/prasarana/tab/PrasaranaInfoIndex.vue'
import PrasaranaList from '../../pages/prasarana/page/PrasaranaListIndex.vue'

export const prasarana = [
    { path: '/u/pimpinan/prasarana', component: PrasaranaBase, children: [
        { path: 'list', component: PrasaranaIndex, children: [
            { path: '/', component: PrasaranaList, name: 'prasarana.list' },
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