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
          @tag-edited="editTag(tag.id, $event)"
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
    async addTag(tagLabel) {
      await this.axios.post('http://localhost:9000/api/tags', {
        label: tagLabel,
        is_done: false,
      })
      await this.listTags()
    },
    async updateIsDoneStatus(tagId) {
      await this.axios.put(`http://localhost:9000/api/tags/${tagId}`, {
        is_done: !this.TagItems.find((item) => item.id === tagId).is_done,
        label: this.TagItems.find((item) => item.id === tagId).label,
      })
      await this.listTags()
    },
    async deleteTag(tagId) {
      await this.axios.delete(`http://localhost:9000/api/tags/${tagId}`)
      await this.listTags()
      this.$refs.listSummary.focus()
    },
    async editTag(tagId, newLabel) {
      await this.axios.put(`http://localhost:9000/api/tags/${tagId}`, {
        label: newLabel,
        is_done: this.TagItems.find((item) => item.id === tagId).is_done,
      })
      await this.listTags()
    },
  },
  computed: {
    listSummary() {
      const numberFinishedItems = this.TagItems.filter(
        (item) => item.is_done
      ).length
      return `${numberFinishedItems} out of ${this.TagItems.length} items completed`
    },
  },
  mounted() {
    this.listTags()
  },
}
</script>

<style></style>
