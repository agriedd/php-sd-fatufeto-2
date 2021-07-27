import Index from '../pages/Index.vue'
import guru from './admin/guru'
import kelas from './admin/kelas'
import jadwal from './admin/jadwal'
import prasarana from './admin/prasarana'
import sarana from './admin/sarana'
import sekolah from './admin/sekolah'
export default [
    { path: '/admin', component: Index, name: 'admin' },
    ...sekolah,
    ...guru,
    ...prasarana,
    ...sarana,
    ...jadwal,
    ...kelas,
    // { path: '/admin/jemaat/kk', component: KK, name: 'admin.kk' },
    // { path: '/admin/jemaat', component: Jemaat },
    //     { path: '/admin/jemaat/:id', component: InfoJemaat, name: 'jemaat.info' },
]