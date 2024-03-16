<template>
  <div>
    <h1>Login</h1>
    <form @submit.prevent="onSubmit">
      <label for="email" class="label__lg">Email</label>
      <input
        type="email"
        id="email"
        name="email"
        autocomplete="off"
        v-model.lazy.trim="email"
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
      <button type="submit" class="btn btn__primary btn__lg">Login</button>
    </form>
  </div>
</template>

<script>
export default {
  name: 'LoginPage',
  methods: {
    async onSubmit() {
      if (!this.email || !this.password) {
        return
      }
      await this.login(this.email, this.password)
      this.email = ''
      this.password = ''
    },
    async login(email, password) {
      await this.axios.post('http://localhost:9000/auth/login', {
        email,
        password,
      })
      this.$router.push('/')
    },
  },
  data() {
    return {
      email: '',
      password: '',
    }
  },
}
</script>
