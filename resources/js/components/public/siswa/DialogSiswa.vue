<template>
	<div class="backdrop d-flex" :class="{ 'active': dialog }" @click.self="dialog =! dialog">
		<div style="max-height: 90%; max-width: 450px;" class="m-auto w-100 h-100">
			<div class="card border-0 d-flex flex-column" style="max-height: 100%;">
				<div class="card-body border-bottom">
					<div class="d-flex">
						<div>
							<div class="d-flex justify-content-center flex-column h-100 fw-bold">
								Informasi Siswa
							</div>
						</div>
						<div class="ms-auto">
							<button class="btn btn-sm btn-link text-dark" @click="dialog = false">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
									<path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
								</svg>
							</button>
						</div>
					</div>
				</div>
				<div class="card-body flex-wrap-1" style="overflow-y: auto;">
					<div class="p-lg-5">
						<div class="mb-3">
							<div class="text-muted">
								<small>
									Nama Siswa
								</small>
							</div>
							<div>
								<h5>
									{{ item.nama_siswa }}
								</h5>
							</div>
						</div>
						<div class="mb-3">
							<div class="text-muted">
								<small>
									NIS
								</small>
							</div>
							<div>
								<h6>
									{{ item.nis }}
								</h6>
							</div>
						</div>
						<div class="mb-3">
							<div class="text-muted">
								<small>
									NISN
								</small>
							</div>
							<div>
								<h6>
									{{ item.nisn }}
								</h6>
							</div>
						</div>
						<div class="mb-3">
							<div class="text-muted">
								<small>
									Jenis Kelamin
								</small>
							</div>
							<div>
								<h6>
									{{ item.jenis_kelamin == 'l' ? 'Laki-Laki' : 'Perempuan' }}
								</h6>
							</div>
						</div>
						<!-- <div class="mb-3">
							<div class="text-muted">
								<small>
									Tempat, Tanggal Lahir
								</small>
							</div>
							<div>
								<h6>
									{{  item.tempat_lahir ? `${item.tempat_lahir},` : null }} {{ item.tanggal_lahir | date }}
								</h6>
							</div>
						</div> -->
						<div class="mb-3">
							<div class="text-muted">
								<small>
									Agama
								</small>
							</div>
							<div>
								<h6>
									{{ item.agama | agama }}
								</h6>
							</div>
						</div>
						<div class="mb-3 border-bottom">
							<div class="text-muted">
								<small>
									Alamat
								</small>
							</div>
							<div>
								<h6>
									{{ item.alamat }}
								</h6>
							</div>
						</div>
						<div class="mb-3">
							<div class="text-muted">
								<small>
									Kelas
								</small>
							</div>
							<div>
								<h6>
									{{ item.kelas.nama }}
								</h6>
							</div>
						</div>
						<div class="mb-3">
							<div class="text-muted">
								<small>
									Wali Kelas
								</small>
							</div>
							<div>
								<h6>
									<span v-if="item.kelas.guru">
										{{ item.kelas.guru.nama }}
									</span>
								</h6>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>
<script>
export default {
	props: {
		value: {
			type: Boolean,
			default: false
		},
		item: {
			type: Object,
			required: true
		}
	},
	data(){
		return {
		}
	},
	computed: {
		dialog: {
			get(){
				return this.value
			},
			set(value){
				this.$emit('input', value);
			}
		}
	},
	filters: {
		agama(value){
			switch(value){
				case '0':
					return 'Islam'
				case '1':
					return 'Kristen Protestan'
				case '2':
					return 'Kristen Katolik'
				case '3':
					return 'Hindu'
				case '4':
					return 'Budha'
				case '5':
					return 'Konghucu'
				default:
					return '-'
			}
		}
	}
}
</script>
<style lang="scss" scoped>
	.backdrop{
		position: fixed;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		transition: all .25s ease;
		pointer-events: none;
		z-index: 100000;
		& > div {
			transform: translateY(calc(100% + 20vh));
			transition: all .25s ease;
		}
	}
	.active{
		&.backdrop{
			background: rgba(0,0,0,0.5);
			// backdrop-filter: blur(1px);
			pointer-events: unset;
			& > div {
				transform: translateY(0%);
			}
		}
	}
</style>