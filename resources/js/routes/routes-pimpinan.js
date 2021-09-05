import Index from '../pages/Index.vue'
import guru from './pimpinan/guru'
import kelas from './pimpinan/kelas'
import jadwal from './pimpinan/jadwal'
import prasarana from './pimpinan/prasarana'
import sarana from './pimpinan/sarana'
import sekolah from './pimpinan/sekolah'
import siswa from './pimpinan/siswa'
import kegiatan from './pimpinan/kegiatan'
import kategori from './pimpinan/kategori'
import laporan from './pimpinan/laporan'
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