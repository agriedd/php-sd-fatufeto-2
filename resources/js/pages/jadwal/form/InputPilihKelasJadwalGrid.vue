<template>
    <div>
        <div class="d-flex justify-between">
            <div style="max-width: 400px" class="mx-auto">
                <v-text-field
                    rounded
                    solo-inverted
                    flat
                    append-icon="mdi-magnify"
                    v-model="search"/>
            </div>
        </div>
        <v-slide-y-transition class="d-grid-sekolah" group>
            <v-hover v-slot="{ hover }" v-for="item in items" :key="item.id_kelas" >
                <v-card rounded="xl" :class="hover ? 'shadow-sm' : 'elevation-0'" :outlined="!hover" link style="transition: all .25s" class="overflow-hidden" :to="{ name: 'jadwal.list.kelas', params: { id_kelas: item.id_kelas } }">
                    <v-card-text class="content-middle">
                        <div class="text-h6">
                            {{ item.nama }}
                        </div>
                        <div v-if="item.guru" class="pt-3">
                            <div>
                                {{ item.guru.nama }}
                            </div>
                            <div class="text--disabled">
                                NIP. {{ item.guru.nip }}
                            </div>
                            <div class="pt-3 text-center text--disabled">
                                [{{ item.siswa_count }} Siswa]
                            </div>
                        </div>
                    </v-card-text>
                </v-card>
            </v-hover>
        </v-slide-y-transition>
    </div>
</template>
<script>
import { mapState, mapGetters, mapActions, mapMutations } from 'vuex'
export default {
    props: {
        value: String|Number,
        label: { default: "Pilih Prasarana" },
        itemText: { default: 'nama' },
        name: { default: 'id_prasarana' },
    },
    computed: {
        album: {
            get(){ return this.value },
            set(val){ 
                this.$emit('input', val)
            },
        },
        data_prasarana(){
            const r = RegExp(this.search)
            return this.items.filter(it => r.test(it.nama) )
        },
    },
    data(){
        return {
            items: [],
            loading: false,
            total: 0,
            lazyTransition: null,
            search: '',
        }
    },
    methods: {
        ...mapActions({
            getItem: 'kelas/get',
        }),
        lazy(callback){
            if(this.lazyTransition)
                clearTimeout(this.lazyTransition);
            this.lazyTransition = setTimeout(()=>{
                callback();
                this.lazyTransition = null;
            }, 800);
        },
        async loadItems(){
            this.loading = true
            let res = await this.getItem({
                search: this.search,
            }).catch(e => {
                this.loading = false
            })
            this.loading = false
            if(res?.data?.data){
                this.items = res.data.data
            }
        }
    },
    watch: {
        search(val, old){
            if(val != old)
                this.lazy(_=>this.loadItems())
        },
    },
    created(){
        this.loadItems()
    }
}
</script>