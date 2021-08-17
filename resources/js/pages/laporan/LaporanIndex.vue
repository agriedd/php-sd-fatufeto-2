<template>
    <div>
        <v-app-bar app flat absolute class="white">
            <v-app-bar-nav-icon></v-app-bar-nav-icon>
            <v-toolbar-title>
                Laporan
            </v-toolbar-title>
        </v-app-bar>
        <v-main>
            <v-container>
                <div style="position: relative">
                    <v-expand-transition>
                        <div class="d-grid-sekolah" v-if="show">

                        </div>
                    </v-expand-transition>
                </div>
            </v-container>
            <div class="grey lighten-5">
                <v-container>
                    <router-view no-select :data-session="session"/>
                </v-container>
            </div>
        </v-main>
    </div>
</template>
<script>
import { mapActions, mapGetters, mapMutations, mapState } from 'vuex'
export default {
    data(){
        return {
            loading: false,
            items: [],
            total: 0,
            show: true,
        }
    },
    computed: {
        ...mapState({}),
        ...mapGetters({
        }),
    },
    watch: {
        '$route.name': function(val){
            if(val == 'guru'){
                this.show = true
            }
        },
    },
    methods: {
    },
    created(){
    }
}
</script>