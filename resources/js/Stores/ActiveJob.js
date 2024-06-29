import { defineStore } from 'pinia';
import { reactive } from 'vue';
export const useActiveJobStore = defineStore('ActiveJob', () => {

  state: (job) => {
    return {
      // all these properties will have their type inferred automatically
      count: 0,
      name: 'Eduardo',
      isAdmin: true,
      items: [],
      hasChanged: true,
    }
  },
  getters: () => {
      return state.count * 2
  },

  const job = reactive({});
  // const name = ref('Eduardo')
  // const doubleCount = computed(() => count.value * 2)
  // function increment() {
  //   count.value++
  // }

  return { job }
})