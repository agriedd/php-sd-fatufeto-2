<template>
	<v-navigation-drawer app width="275">
		<template #prepend>
            <sidebar-admin-header/>
			<v-divider></v-divider>
		</template>
		<v-subheader v-text="'Menu'" inset/>
		<v-list dense nav>
			<v-list-item dense link color="primary" :to="{ name: 'admin' }" exact>
				<v-list-item-icon>
					<v-icon>mdi-home</v-icon>
				</v-list-item-icon>
				<v-list-item-content>
					<v-list-item-title v-text="'Home'" />
					<v-list-item-subtitle v-text="'Halaman awal panel admin'" />
				</v-list-item-content>
			</v-list-item>
			<v-subheader v-text="'Sekolah'" inset/>
			<v-list-item-group color="primary">
				<v-list-item dense link color="primary" :to="{ name: 'sekolah' }" exact>
					<v-list-item-icon>
						<v-badge dot :value="warning_sekolah" color="error" offset-x="6" offset-y="6" bottom>
							<v-icon>mdi-school</v-icon>
						</v-badge>
					</v-list-item-icon>
					<v-list-item-content>
						<v-list-item-title v-text="'Sekolah'" />
						<v-list-item-subtitle v-text="'Halaman awal panel admin'" />
					</v-list-item-content>
				</v-list-item>
				<v-list-item dense link color="primary" :to="{ name: 'kelas' }" exact>
					<v-list-item-icon>
						<v-icon>mdi-bookmark</v-icon>
					</v-list-item-icon>
					<v-list-item-content>
						<v-list-item-title v-text="'Kelas'" />
						<v-list-item-subtitle v-text="'Kelola Data Kelas'" />
					</v-list-item-content>
					<v-menu content-class="shadow-lg rounded-lg" open-on-hover right min-width="250" :close-on-content-click="false" :close-on-click="false" open-delay=".5" transition="slide-x-transition">
						<template #activator="{ attrs, on }">
							<v-list-item-action v-on="on" v-bind="attrs">
								<v-icon>mdi-plus</v-icon>
							</v-list-item-action>
						</template>
						<v-list>
							<v-list-item dense>
								<v-list-item-icon>
									<v-icon>mdi-bookmark-plus</v-icon>
								</v-list-item-icon>
								<v-list-item-content>
									<v-list-item-title v-text="'Tambah Kelas'"/>
								</v-list-item-content>
							</v-list-item>
						</v-list>
					</v-menu>
				</v-list-item>
				<v-list-item dense link color="primary" :to="{ name: 'jadwal' }" exact>
					<v-list-item-icon>
						<v-icon>mdi-calendar</v-icon>
					</v-list-item-icon>
					<v-list-item-content>
						<v-list-item-title v-text="'Jadwal'" />
						<v-list-item-subtitle v-text="'Kelola Jadwal Mingguan Kelas'" />
					</v-list-item-content>
					<v-menu content-class="shadow-lg rounded-lg" open-on-hover right min-width="250" :close-on-content-click="false" :close-on-click="false" open-delay=".5" transition="slide-x-transition">
						<template #activator="{ attrs, on }">
							<v-list-item-action v-on="on" v-bind="attrs">
								<v-icon>mdi-plus</v-icon>
							</v-list-item-action>
						</template>
						<v-list>
							<v-list-item dense>
								<v-list-item-icon>
									<v-icon>mdi-bookmark-plus</v-icon>
								</v-list-item-icon>
								<v-list-item-content>
									<v-list-item-title v-text="'Tambah Jadwal'"/>
								</v-list-item-content>
							</v-list-item>
						</v-list>
					</v-menu>
				</v-list-item>
				<v-list-item dense link color="primary" :to="{ path: './admin/hei' }">
					<v-list-item-icon>
						<v-icon>mdi-account-group</v-icon>
					</v-list-item-icon>
					<v-list-item-content>
						<v-list-item-title v-text="'Siswa'" />
						<v-list-item-subtitle v-text="'Kelola data siswa'" />
					</v-list-item-content>
					<v-menu content-class="shadow-lg rounded-lg" open-on-hover right min-width="250" :close-on-content-click="false" :close-on-click="false" open-delay=".5" transition="slide-x-transition">
						<template #activator="{ attrs, on }">
							<v-list-item-action v-on="on" v-bind="attrs">
								<v-icon>mdi-plus</v-icon>
							</v-list-item-action>
						</template>
						<v-list>
							<v-list-item dense>
								<v-list-item-icon>
									<v-icon>mdi-account-plus</v-icon>
								</v-list-item-icon>
								<v-list-item-content>
									<v-list-item-title v-text="'Tambah Siswa'"/>
								</v-list-item-content>
							</v-list-item>
							<v-list-item dense>
								<v-list-item-icon>
									<v-icon>mdi-account-search</v-icon>
								</v-list-item-icon>
								<v-list-item-content>
									<v-list-item-title v-text="'Temukan Siswa'"/>
								</v-list-item-content>
							</v-list-item>
						</v-list>
					</v-menu>
				</v-list-item>
				<v-list-item dense link color="primary" :to="{ name: 'guru' }" exact>
					<v-list-item-icon>
						<v-icon>mdi-account-tie</v-icon>
					</v-list-item-icon>
					<v-list-item-content>
						<v-list-item-title v-text="'Guru'" />
						<v-list-item-subtitle v-text="'Kelola data guru'" />
					</v-list-item-content>
					<v-menu content-class="shadow-lg rounded-lg" open-on-hover right min-width="250" :close-on-content-click="false" :close-on-click="false" open-delay=".5" transition="slide-x-transition">
						<template #activator="{ attrs, on }">
							<v-list-item-action v-on="on" v-bind="attrs">
								<v-icon>mdi-plus</v-icon>
							</v-list-item-action>
						</template>
						<v-list nav>
							<v-list-item dense link :to="{ name: 'guru.insert' }">
								<v-list-item-icon>
									<v-icon>mdi-plus</v-icon>
								</v-list-item-icon>
								<v-list-item-content>
									<v-list-item-title v-text="'Tambah Guru'"/>
								</v-list-item-content>
							</v-list-item>
							<v-list-item dense link :to="{ name: 'guru' }">
								<v-list-item-icon>
									<v-icon>mdi-magnify</v-icon>
								</v-list-item-icon>
								<v-list-item-content>
									<v-list-item-title v-text="'Temukan Guru'"/>
								</v-list-item-content>
							</v-list-item>
						</v-list>
					</v-menu>
				</v-list-item>
				<v-list-item dense link color="primary" :to="{ name: 'prasarana' }" exact>
					<v-list-item-icon>
						<v-icon>mdi-package-variant</v-icon>
					</v-list-item-icon>
					<v-list-item-content>
						<v-list-item-title v-text="'Prasarana'" />
						<v-list-item-subtitle v-text="'Kelola data Prasarana'" />
					</v-list-item-content>
				</v-list-item>
				<v-list-item dense link color="primary" :to="{ name: 'sarana' }" exact>
					<v-list-item-icon>
						<v-icon>mdi-package-variant</v-icon>
					</v-list-item-icon>
					<v-list-item-content>
						<v-list-item-title v-text="'Sarana'" />
						<v-list-item-subtitle v-text="'Kelola data Sarana'" />
					</v-list-item-content>
				</v-list-item>
			</v-list-item-group>
			<v-subheader v-text="'Pimpinan dan Laporan'" inset/>
			<v-list-item-group dense flat nav>
				<v-list-item dense link color="primary" :to="{ name: 'admin' }" exact>
					<v-list-item-icon>
						<v-icon>mdi-shield-account</v-icon>
					</v-list-item-icon>
					<v-list-item-content>
						<v-list-item-title v-text="'Pimpinan'" />
					</v-list-item-content>
				</v-list-item>
				<v-list-item dense link color="primary" :to="{ name: 'admin' }" exact>
					<v-list-item-icon>
						<v-icon>mdi-printer</v-icon>
					</v-list-item-icon>
					<v-list-item-content>
						<v-list-item-title v-text="'Laporan'" />
						<v-list-item-subtitle v-text="'Daftar Laporan'" />
					</v-list-item-content>
					<v-menu content-class="shadow-lg rounded-lg" open-on-hover right min-width="250" :close-on-content-click="false" :close-on-click="false" open-delay=".5" transition="slide-x-transition">
						<template #activator="{ attrs, on }">
							<v-list-item-action v-on="on" v-bind="attrs">
								<v-icon>mdi-plus</v-icon>
							</v-list-item-action>
						</template>
						<v-list nav>
							<v-list-item dense>
								<v-list-item-icon>
									<v-icon>mdi-printer</v-icon>
								</v-list-item-icon>
								<v-list-item-content>
									<v-list-item-title v-text="'Rekap Siswa'"/>
									<v-list-item-subtitle v-text="'Rekap Siswa Tahunan'"/>
								</v-list-item-content>
							</v-list-item>
							<v-list-item dense>
								<v-list-item-icon>
									<v-icon>mdi-printer</v-icon>
								</v-list-item-icon>
								<v-list-item-content>
									<v-list-item-title v-text="'Rekap Guru'"/>
									<v-list-item-subtitle v-text="'Rekap Guru Tahunan'"/>
								</v-list-item-content>
							</v-list-item>
						</v-list>
					</v-menu>
				</v-list-item>
			</v-list-item-group>
			<v-subheader v-text="'Berita dan Kegiatan'" inset/>
			<v-list-item-group dense flat nav>
				<v-list-item dense link color="primary" :to="{ name: 'admin' }" exact>
					<v-list-item-icon>
						<v-icon>mdi-newspaper</v-icon>
					</v-list-item-icon>
					<v-list-item-content>
						<v-list-item-title v-text="'Berita'" />
					</v-list-item-content>
					<v-menu content-class="shadow-lg rounded-lg" open-on-hover right min-width="250" :close-on-content-click="false" :close-on-click="false" open-delay=".5" transition="slide-x-transition">
						<template #activator="{ attrs, on }">
							<v-list-item-action v-on="on" v-bind="attrs">
								<v-icon>mdi-plus</v-icon>
							</v-list-item-action>
						</template>
						<v-list>
							<v-list-item dense>
								<v-list-item-icon>
									<v-icon>mdi-newspaper-plus</v-icon>
								</v-list-item-icon>
								<v-list-item-content>
									<v-list-item-title v-text="'Tambah Berita'"/>
								</v-list-item-content>
							</v-list-item>
							<v-list-item dense>
								<v-list-item-icon>
									<v-icon>mdi-magnify</v-icon>
								</v-list-item-icon>
								<v-list-item-content>
									<v-list-item-title v-text="'Temukan Berita'"/>
								</v-list-item-content>
							</v-list-item>
							<v-subheader v-text="'Kategori Berita'" inset/>
							<v-list-item dense>
								<v-list-item-icon>
									<v-icon>mdi-tag-plus</v-icon>
								</v-list-item-icon>
								<v-list-item-content>
									<v-list-item-title v-text="'Tambah Kategori Berita'"/>
								</v-list-item-content>
							</v-list-item>
						</v-list>
					</v-menu>
				</v-list-item>
				<v-list-item dense link color="primary" :to="{ name: 'admin' }" exact>
					<v-list-item-icon>
						<v-icon>mdi-flag</v-icon>
					</v-list-item-icon>
					<v-list-item-content>
						<v-list-item-title v-text="'Kegiatan'" />
						<v-list-item-subtitle v-text="'Daftar Kegiatan'" />
					</v-list-item-content>
				</v-list-item>
			</v-list-item-group>
		</v-list>
		<template #append>
			<v-divider/>
			<v-subheader v-text="'Akun dan Pengaturan'" inset/>
			<v-list dense flat nav>
			<v-menu content-class="shadow-lg rounded-lg" open-on-hover offset-x min-width="250" :close-on-content-click="false" :close-on-click="false" open-delay=".5" transition="slide-x-transition">
				<template #activator="{ attrs, on }">
					<v-list-item dense link color="primary" :to="{ name: 'admin' }" exact v-on="on" v-bind="attrs">
						<v-list-item-icon>
							<v-icon>mdi-cogs</v-icon>
						</v-list-item-icon>
						<v-list-item-content>
							<v-list-item-title v-text="'Pengaturan'" />
						</v-list-item-content>
						<v-list-item-action>
							<v-icon>mdi-chevron-right</v-icon>
						</v-list-item-action>
					</v-list-item>
				</template>
				<v-list nav>
					<v-list-item dense>
						<v-list-item-icon>
							<v-icon>mdi-link</v-icon>
						</v-list-item-icon>
						<v-list-item-content>
							<v-list-item-title v-text="'Lihat Website'"/>
						</v-list-item-content>
					</v-list-item>
					<v-list-item dense link @click="logout()">
						<v-list-item-icon>
							<v-icon>mdi-power</v-icon>
						</v-list-item-icon>
						<v-list-item-content>
							<v-list-item-title v-text="'Keluar'" />
						</v-list-item-content>
					</v-list-item>
				</v-list>	
				</v-menu>
			</v-list>	
		</template>
	</v-navigation-drawer>
</template>
<script>
import { mapGetters, mapMutations } from 'vuex'
import SidebarAdminHeader from './SidebarAdminHeader.vue'
export default {
    components: { 
        SidebarAdminHeader 
    },
	computed: {
        ...mapGetters({
            total_sekolah: 'sekolah/getTotal'
        }),
		warning_sekolah(){
			return this.total_sekolah <= 0
		}
	},
	methods: {
		...mapMutations({
			showLogoutConfirm: 'login/admin/SET_LOGOUT_MODAL'
		}),
		logout(){
			this.showLogoutConfirm(true)
		}
	},
}
</script>