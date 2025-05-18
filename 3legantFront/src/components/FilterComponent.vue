<script setup>
const emit = defineEmits(['filterByColor'])

const filterByColor = (color) => {
  emit('filterByColor', color)
}
</script>

<template>
  <div class="space-y-8 max-w-[254px] w-full">
    <h3 class="text-[20] text-[#121212] font-semibold leading-[32px] flex items-center space-x-2">
      <svg
        class="huge-icon-interface-outline-filter-05"
        width="24"
        height="24"
        viewBox="0 0 24 24"
        fill="none"
        xmlns="http://www.w3.org/2000/svg"
      >
        <path
          d="M3 7H6M6 7C6 8.65685 7.34315 10 9 10C10.6569 10 12 8.65685 12 7C12 5.34315 10.6569 4 9 4C7.34315 4 6 5.34315 6 7ZM3 17H9M18 17H21M18 17C18 18.6569 16.6569 20 15 20C13.3431 20 12 18.6569 12 17C12 15.3431 13.3431 14 15 14C16.6569 14 18 15.3431 18 17ZM15 7H21"
          stroke="#141718"
          stroke-width="1.5"
          stroke-linecap="round"
        />
      </svg>
      <span class="text-[20px] leading-[32px] font-semibold text-[#121212]">Filter</span>
    </h3>
    <div class="space-y-4 pb-[50px]">
      <h4 class="font-semibold text-[#121212]">COLORS</h4>
      <u class="space-y-3 block">
        <li :class="['block text-[14px] font-semiboold leading-[26px] text-[#807E7E]']">
          <button @click="filterByColor('white')">White</button>
        </li>
        <li class="block text-[14px] font-semiboold leading-[26px] text-[#807E7E]">
          <button @click="filterByColor('maroon')">Maroon</button>
        </li>
        <li class="block text-[14px] font-semiboold leading-[26px] text-[#807E7E]">
          <button @click="filterByColor('black')">Black</button>
        </li>
      </u>
    </div>
  </div>
</template>
