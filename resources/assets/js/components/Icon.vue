<template>
  <span :class="'icon ' + (large ? 'is-large' : '')">
    <i :class="name" :style="'font-size: ' + size + 'px;' + ';color: ' + (white != 1 ? color : 'white') + ';'"></i>
  </span>
</template>


<script>
export default {
    // props: ['name', 'color', 'size'],
    props: {
        name: String,
        color: String,
        size: {
            type: String, 
            default: 40
        },
        white: Boolean,
        large: Boolean,

    }

}
</script>
