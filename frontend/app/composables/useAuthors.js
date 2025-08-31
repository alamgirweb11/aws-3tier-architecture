export const useAuthors = () => {
  const config = useRuntimeConfig()
  const apiBase = config.public.apiBase

  const getAuthors = async () => $fetch(`${apiBase}/authors`)
  const createAuthor = async (payload) => $fetch(`${apiBase}/authors`, { method: "POST", body: payload })
  const updateAuthor = async (id, payload) => $fetch(`${apiBase}/authors/${id}`, { method: "PUT", body: payload })
  const deleteAuthor = async (id) => $fetch(`${apiBase}/authors/${id}`, { method: "DELETE" })

  return { getAuthors, createAuthor, updateAuthor, deleteAuthor }
}
