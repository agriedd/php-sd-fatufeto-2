<template>
	<v-navigation-drawer app width="275">
		<template #prepend>
            <sidebar-admin-header/>
			<v-divider></v-divider>
		</template>
		<v-subheader v-text="'Menu'" inset/>
		<v-list dense nav>
			<v-list-item dense link color="primary" :to="{ name: 'dashboard' }" exact>
				<v-list-item-icon>
					<v-icon>mdi-view-dashboard-outline</v-icon>
				</v-list-item-icon>
				<v-list-item-content>
					<v-list-item-title v-text="'Dashboard'" />
					<v-list-item-subtitle v-text="'Halaman Dashboard'" />
				</v-list-item-content>
			</v-list-item>
			<v-subheader v-text="'Pimpinan dan Laporan'" inset/>
			<v-list-item-group dense flat nav>
				<v-list-item dense link color="primary" :to="{ name: 'pimpinan' }" exact>
					<v-list-item-icon>
						<v-icon>mdi-shield-account</v-icon>
					</v-list-item-icon>
					<v-list-item-content>
						<v-list-item-title v-text="'Pimpinan'" />
					</v-list-item-content>
				</v-list-item>
				<v-list-item dense link color="primary" :to="{ name: 'laporan' }" exact>
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
							<v-list-item dense link href="/print/rekap/siswa" target="blank">
								<v-list-item-icon>
									<v-icon>mdi-printer</v-icon>
								</v-list-item-icon>
								<v-list-item-content>
									<v-list-item-title v-text="'Rekap Siswa'"/>
									<v-list-item-subtitle v-text="'Rekap Siswa Tahunan'"/>
								</v-list-item-content>
							</v-list-item>
							<v-list-item dense link href="/print/rekap/guru" target="blank">
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
				<v-list-item dense link color="primary" :to="{ name: 'berita' }" exact>
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
							<v-list-item dense link :to="{ name: 'berita.insert' }">
								<v-list-item-icon>
									<v-icon>mdi-newspaper-plus</v-icon>
								</v-list-item-icon>
								<v-list-item-content>
									<v-list-item-title v-text="'Tambah Berita'"/>
								</v-list-item-content>
							</v-list-item>
							<v-list-item dense :to="{ name: 'berita.list' }">
								<v-list-item-icon>
									<v-icon>mdi-magnify</v-icon>
								</v-list-item-icon>
								<v-list-item-content>
									<v-list-item-title v-text="'Temukan Berita'"/>
								</v-list-item-content>
							</v-list-item>
							<v-subheader v-text="'Kategori Berita'" inset/>
							<v-list-item dense link :to="{ name: 'kategori' }">
								<v-list-item-icon>
									<v-icon>mdi-tag</v-icon>
								</v-list-item-icon>
								<v-list-item-content>
									<v-list-item-title v-text="'Kategori Berita'"/>
								</v-list-item-content>
							</v-list-item>
							<v-list-item dense link :to="{ name: 'kategori.insert' }">
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
				<v-list-item dense link color="primary" :to="{ name: 'kegiatan' }" exact>
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
			<v-list dense flat nav>
			<v-menu content-class="shadow-lg rounded-lg" open-on-hover offset-x min-width="250" :close-on-content-click="false" :close-on-click="false" open-delay=".5" transition="slide-x-transition">
				<template #activator="{ attrs, on }">
					<v-list-item dense link color="primary" exact v-on="on" v-bind="attrs">
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
					<v-list-item dense link target="_blank" :href="host">
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
import { mapGetters, mapMutations, mapState } from 'vuex'
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
	data(){
		return {
			host: ''
		}
	},
	created(){
		this.host = `http://${window.location.host}`
	}
}
</script>