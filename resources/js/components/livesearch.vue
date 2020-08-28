<template>
<div>
    <input type="text" class="input" placeholder="intertext" v-model="q">
<ul class="autocomplete-results">
<li class="autocomplete-results"> </li>
</ul>
</div>
</template>

<script>

    export default {
data() {
    return {
        q:''
    }
}
    }
</script>

<style>

</style>
