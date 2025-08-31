<template>
  <div v-if="show" class="fixed inset-0 bg-gray-600 bg-opacity-80 flex items-center justify-center z-50">
    <div class="bg-white rounded-2xl shadow-lg w-full max-w-md p-6">
      <h2 class="text-xl font-bold mb-4">{{ isEdit ? "Edit Author" : "Add Author" }}</h2>
      <form @submit.prevent="submitForm">
        <div class="mb-4">
          <label class="block mb-1">Name</label>
          <input v-model="form.name" type="text" class="w-full border rounded border-gray-800 p-2" required />
        </div>
        <div class="mb-4">
          <label class="block mb-1">Email</label>
          <input v-model="form.email" type="email" class="w-full border rounded border-gray-800 p-2" required />
        </div>
        <div class="mb-4">
          <label class="block mb-1">Remarks</label>
          <textarea v-model="form.remarks" class="w-full border rounded border-gray-800 p-2"></textarea>
        </div>
        <div class="flex justify-end space-x-2">
          <button type="button" class="px-4 py-2 rounded bg-gray-300 hover:bg-gray-400" @click="$emit('close')">Cancel</button>
          <button type="submit" class="px-4 py-2 rounded bg-blue-600 text-white hover:bg-blue-700">
            {{ isEdit ? "Update" : "Save" }}
          </button>
        </div>
      </form>
    </div>
  </div>
</template>

<script setup>
import { ref, watch } from "vue"

const props = defineProps({
  show: Boolean,
  isEdit: Boolean,
  author: Object
})
const emit = defineEmits(["close", "submit"])

const form = ref({ name: "", email: "", remarks: "" })

watch(
  () => props.author,
  (val) => {
    if (props.isEdit && val) {
      form.value = { ...val }
    } else {
      form.value = { name: "", email: "", remarks: "" }
    }
  },
  { immediate: true }
)

const submitForm = () => {
  emit("submit", form.value)
}
</script>
