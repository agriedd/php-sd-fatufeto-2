<template>
    <transition name="fly-down">
        <div class="card shadow border-0" style="border-radius: .5rem;" id="login-panel" v-if="show">
            <div class="nav-scroller border-bottom d-flex justify-content-center">
                <nav class="nav nav-underline" aria-label="Secondary navigation">
                    <a class="nav-link py-3" :class="{ active: tab == 0 }" href="#" @click.prevent="tab = 0">Admin</a>
                    <a class="nav-link py-3" :class="{ active: tab == 1 }" href="#" @click.prevent="tab = 1">Guru</a>
                    <a class="nav-link py-3" :class="{ active: tab == 2 }" href="#" @click.prevent="tab = 2">Pimpinan</a>
                </nav>
            </div>
            <div class="p-3">
                <div class="card-body">
                    <h5>
                        Form Login
                    </h5>
                </div>
                <div class="card-body bg-white text-dark rounded-3">
                    <form method="POST" :action="action" @submit.prevent="submit($event)" :disabled="loading">
                        <slot name="csrf"></slot>
                        <div class="form-group mb-3">
                            <label for="email" class="form-label text-md-right small">E-mail</label>
                            <input id="email" type="email" class="form-control" :class="{'is-invalid' : errors.email && errors.email.length}" name="email" required autocomplete="off" autofocus>
                            <span class="invalid-feedback" role="alert" v-if="errors.email && errors.email.length">
                                <strong v-for="message in errors.email" :key="message">{{ message }}</strong>
                            </span>
                        </div>
                        <div class="form-group mb-3">
                            <label for="password" class="form-label text-md-right small">Password</label>
                            <input id="password" type="password" class="form-control" name="password" required autocomplete="current-password">
                        </div>

                        <div class="form-group mb-5">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                <label class="form-check-label" for="remember">
                                    Ingat saya di perangkat ini
                                </label>
                            </div>
                        </div>

                        <div class="form-group mb-0">
                            <button type="submit" class="btn btn-primary w-100 py-3 text-white shadow" :disabled="loading">
                                Login
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </transition>
</template>
<script>
import { mapActions } from 'vuex';
import { Tooltip } from 'bootstrap'
export default {
    props: {
        action: Object,
    },
    data(){
        return {
            loading: false,
            errors: {},
            show: true,
            tab: 0
        }
    },
    computed: {
        tabActive:{
            get(){
                return this.tab;
            },
            set(value){
                this.tab = value;
            }
        }
    },
    methods: {
        ...mapActions({
            login: 'login/admin/login',
        }),
        submit(form){
            switch (this.tab) {
                case 0:
                default:
                    this.loginAdmin(form);
                    break;
                case 1:
                    this.loginGuru(form);
                    break;
                case 2:
                    break;
            }
        },
        async loginAdmin(){
            this.loading = true
            let data = new FormData(form.target);
            let res = await axios.post(this.action['admin'], data).catch(e => {
                if(e.response.status == 422)
                    this.errors = e.response.data.errors
                if(e.response.status == 429)
                    this.errors = { email: ['Aktivitas anda mencurigakan', 'harap coba kembali dalam 1 menit'] }
            })
            this.loading = false
            if(res){
                window.localStorage.setItem('authToken', res.data.token)
                this.show = false
                setTimeout(()=>{
                    window.history.pushState({}, "Panel Admin", "/admin")
                    window.history.go();
                }, 250)
            }
        },
        async loginGuru(){
            this.loading = true
            let data = new FormData(form.target);
            let res = await axios.post(this.action['guru'], data).catch(e => {
                if(e.response.status == 422)
                    this.errors = e.response.data.errors
                if(e.response.status == 429)
                    this.errors = { email: ['Aktivitas anda mencurigakan', 'harap coba kembali dalam 1 menit'] }
            })
            this.loading = false
            if(res){
                window.localStorage.setItem('authToken', res.data.token)
                this.show = false
                setTimeout(()=>{
                    window.history.pushState({}, "Panel Admin", "/admin")
                    window.history.go();
                }, 250)
            }
        }
    },
    mounted(){
        this.$nextTick(e => {
            window.scrollTo({
                top: 300,
                behavior: 'smooth'
            });
            let element = this.$el.querySelector('.nav-scroller')
            var tooltip = new Tooltip(element, {
                placement: 'top',
                trigger: 'manual',
                title: 'Gunakan navigasi untuk mengubah form',
                popperConfig: function (defaultBsPopperConfig) {}
            })
            tooltip.show()
        })
    }
}
</script>
<style scoped lang="scss">
    .fly-down{
        opacity: 1;
        &-leave-active{
            transition: all .25s ease;
        }
        &-leave-to{
            transform: translateY(100px);
            opacity: 0;
        }
    }
    .active{
        border-bottom: 3px solid var(--bs-primary);
    }
</style>