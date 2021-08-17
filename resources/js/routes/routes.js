import Index from '../pages/Index.vue'
import guru from './admin/guru'
import kelas from './admin/kelas'
import jadwal from './admin/jadwal'
import prasarana from './admin/prasarana'
import sarana from './admin/sarana'
import sekolah from './admin/sekolah'
import siswa from './admin/siswa'
import pimpinan from './admin/pimpinan'
import berita from './admin/berita'
import kegiatan from './admin/kegiatan'
import kategori from './admin/kategori'
export default [
    { path: '/admin', component: Index, name: 'admin' },
    ...sekolah,
    ...guru,
    ...prasarana,
    ...sarana,
    ...jadwal,
    ...kelas,
    ...siswa,
    ...pimpinan,
    ...berita,
    ...kegiatan,
    ...kategori,
]