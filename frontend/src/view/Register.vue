<template>
  <div>
    <h1>Signup</h1>
    <form @submit.prevent="onSubmit">
      <label for="username" class="label__lg">Username</label>
      <input
        type="text"
        id="username"
        name="username"
        autocomplete="off"
        v-model.lazy.trim="username"
        class="input__lg"
      />
      <label for="password" class="label__lg">Password</label>
      <input
        type="password"
        id="password"
        name="password"
        autocomplete="off"
        v-model.lazy.trim="password"
        class="input__lg"
      />
      <button type="submit" class="btn btn__primary btn__lg">Signup</button>
    </form>
  </div>
</template>

<script>
export default {
  name: 'SignupPage',
  methods: {
    onSubmit() {
      if (!this.username || !this.password) {
        return
      }
      this.$emit('signup', this.username, this.password)
      this.username = ''
      this.password = ''
    },
  },
  data() {
    return {
      username: '',
      password: '',
    }
  },
}
</script>
