<template>
    <div>
        <v-dialog v-model="dialog" transition="scroll-x-transition" content-class="shadow-lg" max-width="400" overlay-opacity=".25">
            <v-card>
                <v-toolbar flat title="Peringatan">
                    Konfirmasi
                </v-toolbar>
                <v-card-text>
                    Apakah Anda yakin ingin keluar dari aplikasi?
                </v-card-text>
                <v-card-actions>
                    <v-btn text @click="dialog = false">
                        Batal
                    </v-btn>
                    <v-spacer/>
                    <v-btn text color="error" @click="logout">
                        Keluar
                    </v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>
    </div>
</template>
<script>
import { mapActions, mapMutations, mapState } from 'vuex'
export default {
    computed: {
        ...mapState({
            dialog_value: state => state.login.admin.modal.logout,
        }),
        dialog: {
            set(val){
                this.showLogoutConfirm(val)
            },
            get(){ return this.dialog_value }
        }
    },
    methods: {
		...mapActions({
			clearSession: 'login/admin/logout'
		}),
		...mapMutations({
			showLogoutConfirm: 'login/admin/SET_LOGOUT_MODAL'
		}),
		async logout(){
			let res = await this.clearSession().catch(e => {
				console.error("clearSession@PanelAdmin.vue")
			})
			window.location = "/login"
		}
    }
}
</script>