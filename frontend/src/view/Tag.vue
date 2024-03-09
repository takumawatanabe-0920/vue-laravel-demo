<template>
  <div>
    <tag-form @tag-added="addTag" />
    <ul>
      <li v-for="tag in TagItems" :key="tag.id">
        <tag-item
          :name="tag.name"
          :color="tag.color"
          :description="tag.description"
          @tag-deleted="deleteTag(tag.id)"
          @tag-edited="editTag"
        >
        </tag-item>
      </li>
    </ul>
  </div>
</template>

<script>
import TagForm from '../components/tags/TagForm.vue'
import TagItem from '../components/tags/TagItem.vue'

export default {
  name: 'TagPage',
  components: {
    TagItem,
    TagForm,
  },
  data() {
    return {
      TagItems: [],
    }
  },
  methods: {
    async listTags() {
      this.TagItems = (
        await this.axios.get('http://localhost:9000/api/tags')
      ).data.data
    },
    async addTag(name, color, description) {
      await this.axios.post('http://localhost:9000/api/tags', {
        name,
        color,
        description,
      })
      await this.listTags()
    },
    async deleteTag(tagId) {
      await this.axios.delete(`http://localhost:9000/api/tags/${tagId}`)
      await this.listTags()
    },
    async editTag(tagId, name, color, description) {
      console.log('editTag', tagId, name, color, description)
      await this.axios.put(`http://localhost:9000/api/tags/${tagId}`, {
        name,
        color,
        description,
      })
      await this.listTags()
    },
  },
  computed: {},
  mounted() {
    this.listTags()
  },
}
</script>

<style></style>
