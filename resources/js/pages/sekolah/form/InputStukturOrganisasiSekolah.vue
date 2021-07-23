<template>
    <div class="rowspan-3">
        <transition name="fly-down">
            <div v-if="imgdata" class="mb-3">
                <v-card flat outlined rounded="lg">
                    <v-list>
                        <v-list-item>
                            <v-list-item-avatar @click="previewImage(imgdata)">
                                <img :src="imgdata" alt="" :style="imgStyle" class="img-transition">
                            </v-list-item-avatar>
                            <v-list-item-content>
                                <v-list-item-title>
                                    {{ item.input_foto.name }}
                                </v-list-item-title>
                                <v-list-item-subtitle>
                                    {{ item.input_foto.size }}byte
                                </v-list-item-subtitle>
                            </v-list-item-content>
                        </v-list-item>
                    </v-list>
                </v-card>
            </div>
            <div class="d-flex pb-10" v-else-if="foto">
                <div class="d-flex justify-center" style="position: relative; width: 100%">
                    <img :src="foto.src_md" alt="" :style="imgStyle" class="rounded-lg img-transition">
                    <v-btn fab bottom absolute dark small @click.prevent="small = !small" type="button">
                        <v-icon light v-text="small ? 'mdi-fullscreen' : 'mdi-fullscreen-exit'"/>
                    </v-btn>
                </div>
            </div>
            <div v-else class="mb-3">
                <v-card outlined flat rounded="lg">
                    <v-list>
                        <v-list-item>
                            <v-list-item-avatar color="grey lighten-4">
                                <v-icon>mdi-plus</v-icon>
                            </v-list-item-avatar>
                            <v-list-item-content>
                                <v-list-item-title>
                                    Pilih Berkas
                                </v-list-item-title>
                            </v-list-item-content>
                        </v-list-item>
                    </v-list>
                </v-card>
            </div>
        </transition>
        <v-file-input
            accept="image/png, image/jpeg, image/bmp"
            prepend-icon="mdi-image"
            label="Struktur Organisasi"
            v-model="item.input_foto"
            @change="errors.struktur_organisasi = []"
            :error-messages="errors.struktur_organisasi"
            v-bind="$attrs"
            outlined
            dense
            ></v-file-input>
    </div>
</template>
<script>
import { mapActions } from 'vuex'
export default {
    props: {
        errors: { required: true },
        value: { required: true },
        foto: { }
    },
    data(){
        return {
            imgdata: null,
            small: false,
        }
    },
    computed: {
        item: {
            get(){
                return this.value
            },
            set(val){ this.$emit('input', val) }
        },
        imgStyle(){
            return [
                {
                    'max-width': this.small ? '200px' : '100%',
                    width: '100%'
                }
            ]
        }
    },
    methods: {
        ...mapActions({
            showImage: 'image/showImage'
        }),
        getImage(){
            if(this.item.input_foto){
                let reader = new FileReader();
                reader.onload = e =>{
                    this.imgdata = reader.result;
                }
                reader.readAsDataURL(this.item.input_foto);
                return
            }
            this.imgdata = null;
        },
        previewImage(src){
            this.showImage({ src: src })
        }
    },
    watch: {
        'value.input_foto': function(val){
            this.getImage()
        }
    }
}
</script>
<style lang="scss" scoped>
    .img-transition{
        transition: all .25s ease;
    }
</style>