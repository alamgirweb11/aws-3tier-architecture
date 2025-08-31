<template>
  <div class="p-8">
    <h1 class="text-2xl font-bold mb-6">Authors</h1>

    <button class="mb-4 px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700" @click="openModal()">
      + Add Author
    </button>

    <table class="w-full border-collapse border">
      <thead>
        <tr class="bg-gray-100">
          <th class="border px-4 py-2">#</th>
          <th class="border px-4 py-2">Name</th>
          <th class="border px-4 py-2">Email</th>
          <th class="border px-4 py-2">Remarks</th>
          <th class="border px-4 py-2">Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(author, i) in authors" :key="author.id">
          <td class="border px-4 py-2">{{ i + 1 }}</td>
          <td class="border px-4 py-2">{{ author.name }}</td>
          <td class="border px-4 py-2">{{ author.email }}</td>
          <td class="border px-4 py-2">{{ author.remarks }}</td>
          <td class="border px-4 py-2 space-x-2">
            <button class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600" @click="openModal(author)">
              Edit
            </button>
            <button class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600" @click="deleteItem(author.id)">
              Delete
            </button>
          </td>
        </tr>
      </tbody>
    </table>

    <!-- Modal -->
    <AuthorModal
      :show="showModal"
      :isEdit="!!editAuthor"
      :author="editAuthor"
      @close="closeModal"
      @submit="saveAuthor"
    />
  </div>
</template>

<script setup>
import { ref, onMounted } from "vue"
import { useAuthors } from "@/composables/useAuthors"
import AuthorModal from "@/components/AuthorModal.vue"

const { getAuthors, createAuthor, updateAuthor, deleteAuthor } = useAuthors()

const authors = ref([])
const showModal = ref(false)
const editAuthor = ref(null)

const fetchAuthors = async () => {
  authors.value = await getAuthors()
}

onMounted(fetchAuthors)

const openModal = (author = null) => {
  editAuthor.value = author
  showModal.value = true
}

const closeModal = () => {
  showModal.value = false
  editAuthor.value = null
}

const saveAuthor = async (form) => {
  if (editAuthor.value) {
    await updateAuthor(editAuthor.value.id, form)
  } else {
    await createAuthor(form)
  }
  await fetchAuthors()
  closeModal()
}

const deleteItem = async (id) => {
  if (confirm("Are you sure to delete this author?")) {
    await deleteAuthor(id)
    await fetchAuthors()
  }
}
</script>
