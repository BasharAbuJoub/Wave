<template>
    <section>
        <button class="button is-primary is-small"
            @click="isComponentModalActive = true">
            info
        </button>

        <b-modal :active.sync="isComponentModalActive">


            <div class="box">
                <p>Broadcast included devices: </p>
                <b-taglist>
                    <b-tag v-for="device in data" type="is-info">{{device.room}}</b-tag>
                </b-taglist>
            </div>            
            
        </b-modal>
    </section>
</template>

<script>
export default {
  props: ["data"],
  data() {
    return {
      isComponentModalActive: false
    };
  }
};
</script>