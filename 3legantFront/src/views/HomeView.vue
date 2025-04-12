<script setup>
import BannerComponent from '@/components/BannerComponent.vue'
import BlogSection from '@/components/BlogSection.vue'
import CategoryComponent from '@/components/CategoryComponent.vue'
import FooterComponent from '@/components/FooterComponent.vue'
import HeaderComponent from '@/components/HeaderComponent.vue'
import NavBar from '@/components/NavBar.vue'
import NewArrivalsComponent from '@/components/NewArrivalsComponent.vue'
import NewsLetter from '@/components/NewsLetter.vue'
import ValuesComponents from '@/components/ValuesComponents.vue'
</script>

<template>
  <NavBar />
  <main>
    <HeaderComponent />
    <CategoryComponent />
    <NewArrivalsComponent />
    <ValuesComponents />
    <BannerComponent />
    <BlogSection />
    <NewsLetter />
  </main>
  <FooterComponent />
</template>
