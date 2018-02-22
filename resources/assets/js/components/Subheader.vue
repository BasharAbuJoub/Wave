<template>
    <div class="hero" style="background: #0081eb;">
        <div class="hero-body has-text-centered">
            <h3 class="title is-2" style="color: white;margin-bottom: 0;"><icon :name="icon" size="40"></icon> {{title}}</h3>
            <p style="font-size: 20px;color: #ffffffa1;font-weight: 300;">{{body}}</p>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        icon: String,
        title: String,
        body: String,
    }
}
</script>
