<!-- DropdownLink.vue -->
<template>
    <a :href="item.href" :class="itemClass"  class="flex items-center space-x-2">
      <span>{{ item.label }}</span>
      <slot name="item-slot" :item="item"  />
    </a>
   
  </template>
  
  <script setup>
  import { defineProps,computed } from 'vue';

  const props = defineProps({
    item: {
      type: Object,
      required: true,
    },
    active: Boolean, 
  });

  const itemClass = computed(() => {
  return props.active
    ? 'relative px-4 py-3 flex items-center space-x-4 rounded-xl text-white bg-gradient-to-r from-sky-600 to-cyan-400'
    : 'px-4 py-3 flex items-center space-x-4 rounded-md text-gray-600 group';
});
  </script>
  