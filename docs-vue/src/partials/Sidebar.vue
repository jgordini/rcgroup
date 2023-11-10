<template>
  <div>
    <transition
      enter-active-class="transition ease-out duration-200"
      enter-from-class="opacity-0"
      enter-to-class="opacity-100"
      leave-active-class="transition ease-out duration-100"
      leave-from-class="opacity-100"
      leave-to-class="opacity-0"
    >            
      <div v-show="sidebarOpen" class="md:hidden fixed inset-0 z-10 bg-slate-900 bg-opacity-20 transition-opacity" aria-hidden="true"></div>
    </transition>
  
    <transition
      enter-active-class="transition ease-out duration-200 transform"
      enter-from-class="opacity-0 -translate-x-full"
      enter-to-class="opacity-100 translate-x-0"
      leave-active-class="transition ease-out duration-200"
      leave-from-class="opacity-100"
      leave-to-class="opacity-0"
    >
      <aside
        id="sidebar"
        class="fixed left-0 top-0 bottom-0 w-64 h-screen border-r border-slate-200 md:left-auto md:shrink-0 z-10 md:!opacity-100 md:!block dark:border-slate-800 dark:bg-slate-900"
        ref="sidebar"
        v-show="sidebarOpen"
      >
        <!-- Gradient bg displaying on light layout only -->
        <div class="absolute inset-0 -left-[9999px] bg-gradient-to-b from-slate-50 to-white pointer-events-none -z-10 dark:hidden" aria-hidden="true"></div>
  
        <div class="fixed top-0 bottom-0 w-64 px-4 sm:px-6 md:pl-0 md:pr-8 overflow-y-auto no-scrollbar">
          <div class="pt-24 md:pt-28 pb-8">
  
            <!-- Docs nav -->
            <nav class="md:block">
              <ul class="text-sm">
                <!-- 1st level -->
                <SidebarLinkGroup v-slot="parentLink" :activeCondition="currentRoute.fullPath.includes('documentation')">
                  <a
                    class="relative flex items-center font-[650] text-slate-800 p-1 before:absolute before:inset-0 before:rounded before:bg-gradient-to-tr before:from-blue-400 before:to-purple-500 before:opacity-20 before:-z-10 before:pointer-events-none dark:text-slate-200"
                    :class="{ 'before:hidden': !currentRoute.fullPath.includes('documentation') }"
                    href="#0"
                    @click.prevent="parentLink.handleClick()"
                  >
                    <svg class="mr-3 shrink-0" width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                      <path class="fill-blue-400" d="M19.888 7.804a.88.88 0 0 0-.314-.328l-7.11-4.346a.889.889 0 0 0-.927 0L4.426 7.476a.88.88 0 0 0-.314.328L12 12.624l7.888-4.82Z" />
                      <path class="fill-white dark:fill-slate-800" d="M4.112 7.804a.889.889 0 0 0-.112.43v7.892c0 .31.161.597.426.758l7.11 4.346c.14.085.3.13.464.13v-8.736l-7.888-4.82Z" />
                      <path class="fill-blue-600" d="M19.888 7.804c.073.132.112.28.112.43v7.892c0 .31-.161.597-.426.758l-7.11 4.346c-.14.085-.3.13-.464.13v-8.736l7.888-4.82Z" />
                    </svg>
                    <span>Documentation</span>
                  </a>
                  <ul class="mb-3 ml-4 pl-6 border-l border-slate-200 dark:border-slate-800" :class="{ 'hidden': !parentLink.expanded }">              
                    <li class="mt-3">
                      <router-link to="/documentation/fundamentals" custom v-slot="{ href, navigate, isExactActive }">
                        <a class="flex items-center space-x-3 font-medium" :class="isExactActive ? 'text-blue-600' : 'text-slate-800 dark:text-slate-200'" :href="href" @click="navigate">Fundamentals</a>
                      </router-link>
                    </li>
                    <li class="mt-3">
                      <router-link to="/documentation/dummy-slug" custom v-slot="{ href, navigate, isExactActive }">
                        <a class="flex items-center space-x-3 font-medium" :class="isExactActive ? 'text-blue-600' : 'text-slate-800 dark:text-slate-200'" :href="href" @click="navigate">Methods and Parameters</a>
                      </router-link>
                    </li>
                    <li class="mt-3">
                      <router-link to="/documentation/dummy-slug" custom v-slot="{ href, navigate, isExactActive }">
                        <a class="flex items-center space-x-3 font-medium" :class="isExactActive ? 'text-blue-600' : 'text-slate-800 dark:text-slate-200'" :href="href" @click="navigate">Merge Fields</a>
                      </router-link>
                    </li>
                    <SidebarLinkSubgroup title="Alternative Schemas" :open="currentRoute.fullPath.includes('alternative-scheme')">
                      <li class="mt-3">
                        <router-link to="/documentation/alternative-scheme/dummy-slug" custom v-slot="{ href, navigate, isExactActive }">
                          <a class="flex items-center space-x-3 font-normal" :class="isExactActive ? 'text-blue-600' : 'text-slate-600 dark:text-slate-400'" :href="href" @click="navigate">File system</a>
                        </router-link>
                      </li>
                      <li class="mt-3">
                        <router-link to="/documentation/alternative-scheme/dummy-slug" custom v-slot="{ href, navigate, isExactActive }">
                          <a class="flex items-center space-x-3 font-normal" :class="isExactActive ? 'text-blue-600' : 'text-slate-600 dark:text-slate-400'" :href="href" @click="navigate">Describing responses</a>
                        </router-link>
                      </li>
                    </SidebarLinkSubgroup>
                    <SidebarLinkSubgroup title="E-Commerce" :open="currentRoute.fullPath.includes('ecommerce')">
                      <li class="mt-3">
                        <router-link to="/documentation/ecommerce/dummy-slug" custom v-slot="{ href, navigate, isExactActive }">
                          <a class="flex items-center space-x-3 font-normal" :class="isExactActive ? 'text-blue-600' : 'text-slate-600 dark:text-slate-400'" :href="href" @click="navigate">Path parameters</a>
                        </router-link>
                      </li>
                      <li class="mt-3">
                        <router-link to="/documentation/ecommerce/dummy-slug" custom v-slot="{ href, navigate, isExactActive }">
                          <a class="flex items-center space-x-3 font-normal" :class="isExactActive ? 'text-blue-600' : 'text-slate-600 dark:text-slate-400'" :href="href" @click="navigate">Query string parameters</a>
                        </router-link>
                      </li>
                    </SidebarLinkSubgroup>
                    <li class="mt-3">
                      <router-link to="/documentation/dummy-slug" custom v-slot="{ href, navigate, isExactActive }">
                        <a class="flex items-center space-x-3 font-medium" :class="isExactActive ? 'text-blue-600' : 'text-slate-800 dark:text-slate-200'" :href="href" @click="navigate">Account Exports</a>
                      </router-link>
                    </li>
                    <li class="mt-3">
                      <router-link to="/documentation/dummy-slug" custom v-slot="{ href, navigate, isExactActive }">
                        <a class="flex items-center space-x-3 font-medium" :class="isExactActive ? 'text-blue-600' : 'text-slate-800 dark:text-slate-200'" :href="href" @click="navigate">Integrations</a>
                      </router-link>
                    </li>
                    <li class="mt-3">
                      <router-link to="/documentation/dummy-slug" custom v-slot="{ href, navigate, isExactActive }">
                        <a class="flex items-center space-x-3 font-medium" :class="isExactActive ? 'text-blue-600' : 'text-slate-800 dark:text-slate-200'" :href="href" @click="navigate">Add a contact</a>
                      </router-link>
                    </li>
                  </ul>
                </SidebarLinkGroup>
                <!-- 1st level -->
                <SidebarLinkGroup v-slot="parentLink" :activeCondition="currentRoute.fullPath.includes('guides')">
                  <a
                    class="relative flex items-center font-[650] text-slate-800 p-1 before:absolute before:inset-0 before:rounded before:bg-gradient-to-tr before:from-blue-400 before:to-purple-500 before:opacity-20 before:-z-10 before:pointer-events-none dark:text-slate-200"
                    :class="{ 'before:hidden': !currentRoute.fullPath.includes('guides') }"
                    href="#0"
                    @click.prevent="parentLink.handleClick()"
                  >
                    <svg class="mr-3 shrink-0" width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                      <path class="fill-purple-400" d="M19.888 7.804a.88.88 0 0 0-.314-.328l-7.11-4.346a.889.889 0 0 0-.927 0L4.426 7.476a.88.88 0 0 0-.314.328L12 12.624l7.888-4.82Z" />
                      <path class="fill-white dark:fill-slate-800" d="M4.112 7.804a.889.889 0 0 0-.112.43v7.892c0 .31.161.597.426.758l7.11 4.346c.14.085.3.13.464.13v-8.736l-7.888-4.82Z" />
                      <path class="fill-purple-600" d="M19.888 7.804c.073.132.112.28.112.43v7.892c0 .31-.161.597-.426.758l-7.11 4.346c-.14.085-.3.13-.464.13v-8.736l7.888-4.82Z" />
                    </svg>
                    <span>Guides / Tutorials</span>
                  </a>
                  <ul class="mb-3 ml-4 pl-6 border-l border-slate-200 dark:border-slate-800" :class="{ 'hidden': !parentLink.expanded }">                    
                    <li class="mt-3">
                      <router-link to="/guides/marketing-api" custom v-slot="{ href, navigate, isExactActive }">
                        <a class="flex items-center space-x-3 font-medium" :class="isExactActive ? 'text-blue-600' : 'text-slate-800 dark:text-slate-200'" :href="href" @click="navigate">Marketing API Quick Start</a>
                      </router-link>
                    </li>
                    <li class="mt-3">
                      <router-link to="/guides/dummy-slug" custom v-slot="{ href, navigate, isExactActive }">
                        <a class="flex items-center space-x-3 font-medium" :class="isExactActive ? 'text-blue-600' : 'text-slate-800 dark:text-slate-200'" :href="href" @click="navigate">Create an account</a>
                      </router-link>
                    </li>
                    <li class="mt-3">
                      <router-link to="/guides/dummy-slug" custom v-slot="{ href, navigate, isExactActive }">
                        <a class="flex items-center space-x-3 font-medium" :class="isExactActive ? 'text-blue-600' : 'text-slate-800 dark:text-slate-200'" :href="href" @click="navigate">Generate your API key</a>
                      </router-link>
                    </li>
                    <li class="mt-3">
                      <router-link to="/guides/dummy-slug" custom v-slot="{ href, navigate, isExactActive }">
                        <a class="flex items-center space-x-3 font-medium" :class="isExactActive ? 'text-blue-600' : 'text-slate-800 dark:text-slate-200'" :href="href" @click="navigate">Make your first API call</a>
                      </router-link>
                    </li>
                    <li class="mt-3">
                      <router-link to="/guides/dummy-slug" custom v-slot="{ href, navigate, isExactActive }">
                        <a class="flex items-center space-x-3 font-medium" :class="isExactActive ? 'text-blue-600' : 'text-slate-800 dark:text-slate-200'" :href="href" @click="navigate">Next steps</a>
                      </router-link>
                    </li>
                  </ul>
                </SidebarLinkGroup>
                <!-- 1st level -->
                <li class="mb-1">
                  <router-link
                    class="relative flex items-center font-[650] text-slate-800 p-1 before:absolute before:inset-0 before:rounded before:bg-gradient-to-tr before:from-blue-400 before:to-purple-500 before:opacity-20 before:-z-10 before:pointer-events-none dark:text-slate-200"
                    :class="{ 'before:hidden': !currentRoute.fullPath.includes('help') }"
                    to="/help"
                  >
                    <svg class="mr-3 shrink-0" width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                      <path class="fill-sky-400" d="M19.888 7.804a.88.88 0 0 0-.314-.328l-7.11-4.346a.889.889 0 0 0-.927 0L4.426 7.476a.88.88 0 0 0-.314.328L12 12.624l7.888-4.82Z" />
                      <path class="fill-white dark:fill-slate-800" d="M4.112 7.804a.889.889 0 0 0-.112.43v7.892c0 .31.161.597.426.758l7.11 4.346c.14.085.3.13.464.13v-8.736l-7.888-4.82Z" />
                      <path class="fill-sky-600" d="M19.888 7.804c.073.132.112.28.112.43v7.892c0 .31-.161.597-.426.758l-7.11 4.346c-.14.085-.3.13-.464.13v-8.736l7.888-4.82Z" />
                    </svg>
                    <span>Help / Support</span>
                  </router-link>
                </li>
              </ul>
            </nav>
          </div>
        </div>
  
      </aside>
    </transition>
  </div>
</template>

<script>
import { ref, onMounted, onUnmounted } from 'vue'
import { useRouter } from 'vue-router'

import SidebarLinkGroup from '../utils/SidebarLinkGroup.vue'
import SidebarLinkSubgroup from '../utils/SidebarLinkSubgroup.vue'

export default {
  name: 'Sidebar',
  props: ['sidebarOpen'],
  components: {
    SidebarLinkGroup,
    SidebarLinkSubgroup,
  },
  setup(props, { emit }) {

    const sidebar = ref(null)

    const currentRoute = useRouter().currentRoute.value

    // close on click outside
    const clickHandler = ({ target }) => {
      if (!sidebar.value) return
      if (
        !props.sidebarOpen ||
        sidebar.value.contains(target)
      ) return
      emit('close-sidebar')
    }

    // close if the esc key is pressed
    const keyHandler = ({ keyCode }) => {
      if (!props.sidebarOpen || keyCode !== 27) return
      emit('close-sidebar')
    } 

    onMounted(() => {
      document.addEventListener('click', clickHandler)
      document.addEventListener('keydown', keyHandler)
    })

    onUnmounted(() => {
      document.removeEventListener('click', clickHandler)
      document.removeEventListener('keydown', keyHandler)
    })
    
    return {
      currentRoute,
      sidebar,
    }
  },  
}
</script>