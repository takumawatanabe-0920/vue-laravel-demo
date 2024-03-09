<template>
  <form @submit.prevent="onSubmit">
    <h2 class="label-wrapper">
      <label for="new-tag-input" class="label__lg"> Add a new tag </label>
    </h2>
    <label for="new-tag-input" class="label__lg">Name</label>
    <input
      type="text"
      id="new-tag-input"
      name="new-tag"
      autocomplete="off"
      v-model.lazy.trim="name"
      class="input__lg"
    />
    <!-- color -->
    <label for="new-tag-color" class="label__lg">Color</label>
    <input
      type="color"
      id="new-tag-color"
      name="new-tag-color"
      v-model.lazy.trim="color"
      class="input__lg"
    />
    <!-- description -->
    <label for="new-tag-description" class="label__lg">Description</label>
    <input
      type="text"
      id="new-tag-description"
      name="new-tag-description"
      autocomplete="off"
      v-model.lazy.trim="description"
      class="input__lg"
    />
    <button type="submit" class="btn btn__primary btn__lg">Add</button>
  </form>
</template>

<script>
export default {
  methods: {
    onSubmit() {
      if (this.name === '') {
        return
      }
      this.$emit('tag-added', this.name, this.color, this.description)
      this.name = ''
      this.color = ''
      this.description = ''
    },
  },
  data() {
    return {
      name: '',
      color: '',
      description: '',
    }
  },
}
</script>
