<template>
  <div>
    <h1>Signup</h1>
    <form @submit.prevent="onSubmit">
      <label for="name" class="label__lg">Username</label>
      <input
        type="text"
        id="name"
        name="name"
        autocomplete="off"
        v-model.lazy.trim="name"
        class="input__lg"
      />
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
      <button type="submit" class="btn btn__primary btn__lg">Signup</button>
    </form>
  </div>
</template>

<script>
export default {
  name: 'SignupPage',
  methods: {
    async onSubmit() {
      if (!this.name || !this.password || !this.email) {
        return
      }
      await this.signup(this.name, this.password, this.email)
      this.name = ''
      this.password = ''
      this.email = ''
    },
    async signup(name, password, email) {
      await this.axios.post('http://localhost:9000/auth/signup', {
        name,
        password,
        email,
      })
      this.$router.push('/')
    },
  },
  data() {
    return {
      name: '',
      password: '',
      email: '',
    }
  },
}
</script>
