import Index from '../pages/Index.vue'
import guru from './admin/guru'
import kelas from './admin/kelas'
import jadwal from './admin/jadwal'
import prasarana from './admin/prasarana'
import sarana from './admin/sarana'
import sekolah from './admin/sekolah'
import siswa from './admin/siswa'
import kegiatan from './admin/kegiatan'
import kategori from './admin/kategori'
import laporan from './admin/laporan'
export default [
    { path: '/u/pimpinan', component: Index, name: 'dashboard' },
    ...sekolah,
    ...guru,
    ...prasarana,
    ...sarana,
    ...jadwal,
    ...kelas,
    ...siswa,
    ...kegiatan,
    ...kategori,
    ...laporan,
]