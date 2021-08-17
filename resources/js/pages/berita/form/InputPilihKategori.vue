<template>
    <v-autocomplete
        v-model="kategori"
        :name="name"
        :items="items"
        :loading="loading"
        :search-input.sync="search"
        :item-text="itemText"
        item-value="id_kategori"
        :label="label"
        required
		dense
        outlined
        v-bind="$attrs"
        persistent-hint
        :error-messages="errors[name]"
        @change="errors[name] = []"/>
</template>
<script>
import { mapState, mapGetters, mapActions, mapMutations } from 'vuex'
export default {
    props: {
        value: String|Number,
        errors: { required: true },
        label: { default: "Pilih Kategori" },
        itemText: { default: 'nama_kategori' },
        name: { default: 'id_kategori' },
    },
    computed: {
        kategori: {
            get(){ return this.value },
            set(val){ 
                this.$emit('input', val)
            },
        },
        data_kategori(){
            const r = RegExp(this.search)
            return this.items.filter(it => r.test(it.nama) )
        },
        search: {
            get(){ return this.query },
            set(value, old){
                this.query = value
                if(!value) return
                if(this.data_kategori.length > 0) return
                if(this.loading) return
                this.loadItems()
            }
        },
    },
    data(){
        return {
            items: [],
            query: '',
            loading: false,
            total: 0,
        }
    },
    methods: {
        ...mapActions({
            getItem: 'kategori/get',
        }),
        async loadItems(){
            this.loading = true
            let res = await this.getItem({
                search: this.query,
                id: this.value,
            }).catch(e => {
                this.loading = false
            })
            this.loading = false
            if(res?.data?.data){
                this.items = res.data.data
            }
        }
    },
    watch: {},
    created(){
        this.loadItems()
    }
}
</script>