
import SaranaBase from '../../pages/sarana/SaranaBase.vue'
import SaranaIndex from '../../pages/sarana/SaranaIndex.vue'
import SaranaInfo from '../../pages/sarana/SaranaInfo.vue'
import SaranaInfoIndex from '../../pages/sarana/tab/SaranaInfoIndex.vue'
import SaranaTambah from '../../pages/sarana/page/SaranaTambahIndex.vue'
import SaranaList from '../../pages/sarana/page/SaranaListIndex.vue'

export const sarana = [
    { path: '/admin/sarana', component: SaranaBase, children: [
        { path: 'list', component: SaranaIndex, children: [
            { path: '/', component: SaranaList, name: 'sarana.list' },
        ]},
        { path: 'tambah', component: SaranaIndex, children: [
            { path: '/', component: SaranaTambah, name: 'sarana.insert' },
        ]},
        { path: ':sarana', component: SaranaInfo, children: [
            { path: '/', component: SaranaInfoIndex, name: 'sarana.show' },
        ] },
        { path: '/', component: SaranaIndex, children: [
            { path: '/', component: SaranaList, name: 'sarana' },
        ] },
    ] },
]
export default sarana