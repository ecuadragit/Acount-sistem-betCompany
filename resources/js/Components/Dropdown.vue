<template>
  <div class="relative">
    <div @click="open = !open" class="flex items-center cursor-pointer">
      <svg
        xmlns="http://www.w3.org/2000/svg"
        fill="none"
        viewBox="0 0 24 24"
        stroke-width="1.5"
        stroke="currentColor"
        class="w-6 h-6 ml-4 text-gray-600"
      >
        <path
          stroke-linecap="round"
          stroke-linejoin="round"
          d="M4.5 12a7.5 7.5 0 0015 0m-15 0a7.5 7.5 0 1115 0m-15 0H3m16.5 0H21m-1.5 0H12m-8.457 3.077l1.41-.513m14.095-5.13l1.41-.513M5.106 17.785l1.15-.964m11.49-9.642l1.149-.964M7.501 19.795l.75-1.3m7.5-12.99l.75-1.3m-6.063 16.658l.26-1.477m2.605-14.772l.26-1.477m0 17.726l-.26-1.477M10.698 4.614l-.26-1.477M16.5 19.794l-.75-1.299M7.5 4.205L12 12m6.894 5.785l-1.149-.964M6.256 7.178l-1.15-.964m15.352 8.864l-1.41-.513M4.954 9.435l-1.41-.514M12.002 12l-3.75 6.495"
        />
      </svg>
      <slot name="trigger" />
    </div>

    <!-- Full Screen Dropdown Overlay -->
    <div v-show="open" class="fixed inset-0 z-40" @click="open = false"></div>

    <transition
      enter-active-class="transition ease-out duration-200"
      enter-from-class="transform opacity-0 scale-95"
      enter-to-class="transform opacity-100 scale-100"
      leave-active-class="transition ease-in duration-75"
      leave-from-class="transform opacity-100 scale-100"
      leave-to-class="transform opacity-0 scale-95"
    >
      <div
        v-show="open"
        class="absolute z-50 mt-2 rounded-md shadow-lg"
        :class="[widthClass, alignmentClasses]"
      >
        <div class="rounded-md ring-1 ring-black ring-opacity-5" :class="contentClasses">
          <ul class="space-y-2 tracking-wide">
            <li v-for="(item, index) in menuItems" :class="itemClass" :key="index">
              <a :href="item.href" >
                <!-- <span>{{ item.label }}</span> -->
                <slot name="item-slot" :item="item" />
              </a>
            </li>
          </ul>
        </div>
      </div>
    </transition>
  </div>
</template>

<script setup>
import { defineProps, computed, ref, onMounted, onUnmounted } from 'vue';

const props = defineProps({
  menuItems: {
    type: Array,
    required: true,
  },
  align: {
    default: 'right',
  },
  width: {
    default: '48',
  },
  active: Boolean,
});

const open = ref(false);

const closeOnEscape = (e) => {
  if (open.value && e.key === 'Escape') {
    open.value = false;
  }
};

onMounted(() => document.addEventListener('keydown', closeOnEscape));
onUnmounted(() => document.removeEventListener('keydown', closeOnEscape));

const widthClass = computed(() => {
  return {
    48: 'w-48',
  }[props.width.toString()];
});

const alignmentClasses = computed(() => {
  if (props.align === 'left') {
    return 'origin-top-left left-0';
  } else if (props.align === 'right') {
    return 'origin-top-right right-0';
  } else {
    return 'origin-top';
  }
});

const contentClasses = computed(() => {
  if (props.active) {
    return [' px-4 py-3 flex items-center space-x-4 rounded-md text-gray-600 group' ];
  } else {
    return [
      'relative px-4 py-3 flex items-center space-x-4 rounded-xl text-white bg-gradient-to-r from-sky-600 to-cyan-400',
    ];
  }
});
const itemClass = computed(() => {
  return props.active
    ? 'relative px-4 py-3 flex items-center space-x-4 rounded-xl text-white bg-gradient-to-r from-sky-600 to-cyan-400'
    : 'px-4 py-3 flex items-center space-x-4 rounded-md text-gray-600 group';
});

</script>
