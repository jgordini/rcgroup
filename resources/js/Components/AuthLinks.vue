<template>
    <div v-if="canLogin" class="hidden lg:flex lg:flex-1 lg:justify-end">
      <Link v-if="$page.props.auth.user" :href="route('dashboard')"
          class="text-sm font-semibold leading-6 text-gray-900">Dashboard</Link>
      <template v-else>
          <Link :href="route('login')" class="px-8 text-sm font-semibold leading-6 text-gray-900">Log in</Link>
          <Link v-if="canRegister" :href="route('register')"
              class="text-sm font-semibold leading-6 text-gray-900">Register</Link>
      </template>
    </div>
  </template>
  
  <script setup>
  import { Link } from '@inertiajs/vue3'
  import { defineProps } from 'vue'
  
  defineProps({
    canLogin: Boolean,
    canRegister: Boolean
  })
  </script>
  