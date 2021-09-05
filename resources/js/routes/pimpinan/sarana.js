
import SaranaBase from '../../pages/sarana/SaranaBase.vue'
import SaranaIndex from '../../pages/sarana/SaranaIndex.vue'
import SaranaInfo from '../../pages/sarana/SaranaInfo.vue'
import SaranaInfoIndex from '../../pages/sarana/tab/SaranaInfoIndex.vue'
import SaranaList from '../../pages/sarana/page/SaranaListIndex.vue'

export const sarana = [
    { path: '/u/pimpinan/sarana', component: SaranaBase, children: [
        { path: 'list', component: SaranaIndex, children: [
            { path: '/', component: SaranaList, name: 'sarana.list' },
        ]},
        { path: ':id_sarana', component: SaranaInfo, children: [
            { path: '/', component: SaranaInfoIndex, name: 'sarana.show' },
        ] },
        { path: '/', component: SaranaIndex, children: [
            { path: '/', component: SaranaList, name: 'sarana' },
        ] },
    ] },
]
export default sarana