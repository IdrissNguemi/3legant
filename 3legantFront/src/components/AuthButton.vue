<script setup name="AuthButton">

defineProps({
  buttonProps: String,
})
</script>

<template>
  <button
    type="submit"
    class="flex items-center justify-center py-[10px] text-white leading-[28px] tracking-[-0.4px] bg-[#141718] font-semibold rounded-[8px] text-base w-full"
  >
    {{ buttonProps }}
  </button>
</template>
