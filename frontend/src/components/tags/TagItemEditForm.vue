<template>
  <form class="stack-small" @submit.prevent="onSubmit">
    <div>
      <label class="edit-label">Edit Name for &quot;{{ name }}&quot;</label>
      <input
        :id="id"
        ref="nameInput"
        type="text"
        autocomplete="off"
        v-model.lazy.trim="newName"
      />
      <label class="edit-label">Edit Color for &quot;{{ name }}&quot;</label>
      <input :id="id" type="color" v-model.lazy.trim="newColor" />
      <label class="edit-label"
        >Edit Description for &quot;{{ name }}&quot;</label
      >
      <input
        :id="id"
        type="text"
        autocomplete="off"
        v-model.lazy.trim="newDescription"
      />
    </div>
    <div class="btn-group">
      <button type="button" class="btn" @click="onCancel">
        Cancel
        <span class="visually-hidden">editing {{ name }}</span>
      </button>
      <button type="submit" class="btn btn__primary">
        Save
        <span class="visually-hidden">edit for {{ name }}</span>
      </button>
    </div>
  </form>
</template>
<script>
export default {
  props: {
    name: {
      type: String,
      required: true,
    },
    color: {
      type: String,
      required: true,
    },
    description: {
      type: String,
      required: true,
    },
    id: {
      type: String,
      required: true,
    },
  },
  data() {
    return {
      newName: this.name,
      newColor: this.color,
      newDescription: this.description,
    }
  },
  methods: {
    onSubmit() {
      console.log({
        id: this.id,
        newName: this.newName,
        newColor: this.newColor,
        newDescription: this.newDescription,
        this: this,
        props: this.$props,
      })
      this.$emit(
        'item-edited',
        this.$props.id,
        this.newName,
        this.newColor,
        this.newDescription
      )
    },
    onCancel() {
      this.$emit('edit-cancelled')
    },
  },
  mounted() {
    const labelInputRef = this.$refs.nameInput
    labelInputRef.focus()
  },
}
</script>
<style scoped>
.edit-label {
  font-family: Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  color: #0b0c0c;
  display: block;
  margin-bottom: 5px;
}
input {
  display: inline-block;
  margin-top: 0.4rem;
  width: 100%;
  min-height: 4.4rem;
  padding: 0.4rem 0.8rem;
  border: 2px solid #565656;
}
form {
  display: flex;
  flex-direction: row;
  flex-wrap: wrap;
}
form > * {
  flex: 0 0 100%;
}
</style>
