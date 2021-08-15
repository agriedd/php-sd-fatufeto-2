<template>
	<div class="position-relative">
		<div class="card mb-2 position-relative bg-dark text-light border-0" style="border-radius: 1rem;" id="list-item-2">
			<div class="card-body">
				<div class="row g-0">
					<div class="col" style="max-width: 4rem;">
					</div>
					<div class="col">
						Nama
					</div>
					<div class="col-3">
						Jenis Kelamin
					</div>
					<div class="col-3 d-none d-sm-block">
						Keterangan
					</div>
				</div>
			</div>
		</div>
		<div id="list-item-3" class="position-relative">
			<transition-group tag="div" class="position-relative" name="slide-fade">
				<div class="card mb-2 bg-light border-0 position-relative" style="border-radius: 1rem;" v-for="siswa in items" :key="siswa.id">
					<div class="card-body">
						<div class="row g-0">
							<div class="col" style="max-width: 4rem;">
								<div class="foto-profil flex-grow-1 d-flex flex-column justify-content-center align-items-center" style="height: 3rem; width: 3rem; background: #0001">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
										<path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
									</svg>
								</div>
							</div>
							<div class="col">
								<div class="content-middle align-items-start">
									<div class="text-uppercase small fw-bold">
										{{ siswa.nama_siswa }}
									</div>
									<div class="text-muted small">
										{{ siswa.nis }}
									</div>
								</div>
							</div>
							<div class="col-3">
								<div class="content-middle align-items-start">
									<small>
										{{ siswa.jenis_kelamin == 'l' ? 'Laki-laki' : 'Perempuan' }}
									</small>
								</div>
							</div>
							<div class="col-3 d-none d-sm-block">
								<div class="content-middle align-items-start">
									<small>
										{{ siswa.kelas.nama }}
									</small>
								</div>
							</div>
						</div>
					</div>
				</div>
			</transition-group>
		</div>
		<a href="#" class="card mb-2 bg-light border-0 position-relative text-dark" style="border-radius: 1rem; min-height: 25vh" id="list-item-4" @click.prevent="options.page += 1">
			<div class="card-body d-flex justify-content-center text-muted" v-if="items.length < total">
				[{{items.length}}/{{total}}] Memuat...
			</div>
			<div class="card-body d-flex justify-content-center text-muted" v-else-if="items.length === total">
				[{{items.length}}/{{total}}]
			</div>
			<div class="card-body d-flex justify-content-center text-muted" v-if="total == 0">
				Data Kosong
			</div>
			<div class="card-body d-flex justify-content-center">
				Klik disini untuk memuat data lainnya
			</div>
		</a>

		<div class="" style="bottom: 0; top: unset; display: none">
			<div id="list-example" class="list-group p-3" style="min-width: 200px">
				<a class="list-group-item list-group-item-action" href="#list-item-2">
					Header Tabel
				</a>
				<a class="list-group-item list-group-item-action" href="#list-item-3">
					List Item
				</a>
				<a class="list-group-item list-group-item-action" href="#list-item-4">
					Kalo aktif load item page selanjutnya
				</a>
			</div>
		</div>

	</div>
</template>
<script>
import { ScrollSpy } from 'bootstrap'
import { mapActions } from 'vuex'
import Pagination from '../paginations/Pagination.vue'
export default {
  	components: { Pagination },
	props: {
		value: {
			type: String,
			default: ''
		},
	},
	data () {
		return {
			items: [],
			total: 0,
			options: {
				page: 1,
			},
			scrollSpy: null,
			lazyTimeout: null,
			stopWatchOptions: false
		}
	},
	computed: {
		search: {
			get () {
				return this.value
			},
			set (value) {
				this.$emit('input', value)
			}
		},
		pages () {
			return Math.ceil(this.total / 10)
		},
	},
	methods: {
		...mapActions({
			getItems: 'siswa/get'
		}),
		async loadData(push = true) {
			this.$nextTick(e => {
				this.scrollSpy.refresh()
			})
			let res = await this.getItems({
				...this.options,
				search: this.search
			}).catch(err => console.error(err))
			if(res){
				if(push)
					this.items.push(...res.data?.data)
				else
					this.items = res.data?.data 
				this.total = res.data?.meta?.total || 0
				if(this.scrollSpy){
					this.$nextTick(e => {
						this.scrollSpy.refresh()
					})
				}
			}
		},
	},
	watch: {
		search: function(val){
			if(this.lazyTimeout != null)
				clearTimeout(this.lazyTimeout)
			
			this.lazyTimeout = setTimeout(() => {
				this.items = []
				this.stopWatchOptions = true
				this.options.page = 1
				this.loadData(false)
				this.stopWatchOptions = false
			}, 800)
		},
		items: {
			handler: function(){
				this.$nextTick(e => {
					this.scrollSpy.refresh()
				})
			},
			deep: true,
		},
		options: {
			handler: function(val, oldVal) {
				if(!this.stopWatchOptions)
					this.loadData()
			},
			deep: true
		}
	},
	created () {
		this.loadData()
	},
	mounted(){
		this.$nextTick(() => {
			window.addEventListener('activate.bs.scrollspy', e => {
				this.$nextTick(() => {
					this.scrollSpy.refresh()
				})
				if(e.relatedTarget === '#list-item-4'){
					this.options.page += 1
				}
			})
		})
		this.scrollSpy = new ScrollSpy(document.body, {
			target: '#list-example'
		})
		console.log(this.scrollSpy);
	}
}
</script>
<style lang="scss" scoped>
	.scrollspy-example {
		// max-height: 200px;
		// overflow-y: auto;
	}
	.slide-fade-enter-active {
		transition: all .3s ease;
	}
	.slide-fade-leave-active {
		transition: all .25s cubic-bezier(1.0, 0.5, 0.8, 1.0);
	}
	.slide-fade-enter, .slide-fade-leave-to
		/* .slide-fade-leave-active below version 2.1.8 */ {
		transform: translateX(10px);
		opacity: 0;
	}

</style>