<template>
	<nav aria-label="Page navigation example">
		<ul class="pagination">
			<li class="page-item"><a class="page-link" href="#">Previous</a></li>
			<li class="page-item" v-for="i in pages_render" :key="i.value" :class="{ active: i.active }"><a class="page-link" href="#" @click.prevent="current = i.value">{{ i.value }}</a></li>
			<li class="page-item"><a class="page-link" href="#">Next</a></li>
		</ul>
	</nav>
</template>
<script>
export default {
	props: {
		value: Number,
		total: {
			type: Number,
			default: 0
		},
		max_page_show: {
			type: Number,
			default: 5
		}
	},
	data() {
		return {
		}
	},
	computed: {
		current: {
			get() {
				return this.value;
			},
			set(value) {
				this.$emit('input', value);
			}
		},
		midrange() {
			return Math.ceil(this.max_page_show / 2);
		},
		pages() {
			return Math.ceil(this.total / this.current);
		},
		pages_render(){
			let pages = [];
			let max_page_show = this.max_page_show;
			let pages_render = this.pages;
			let current = this.current;
			let pages_start = Math.max(1, Math.min(current - this.midrange, pages_render - max_page_show + 1));
			let pages_end = Math.min(pages_render, pages_start + max_page_show - 1);
			for (let i = pages_start; i <= pages_end; i++) {
				pages.push({
					value: i,
					active: i === current
				});
			}
			return pages;
		}
	}
}
</script>