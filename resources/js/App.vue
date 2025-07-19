<template>
  <div id="app" class="min-h-screen bg-gray-50">
    <!-- Global Loading Indicator -->
    <div v-if="isLoading" class="fixed inset-0 bg-white bg-opacity-75 flex items-center justify-center z-50">
      <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-blue-600"></div>
    </div>

    <!-- Navigation Header -->
    <nav class="bg-white shadow-sm border-b border-gray-200">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
          <div class="flex items-center">
            <router-link to="/demo" class="flex items-center space-x-3">
              <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
              </div>
              <h1 class="text-xl font-semibold text-gray-900">DocTypes</h1>
            </router-link>
          </div>
          
          <div class="flex items-center space-x-4">
            <router-link 
              to="/demo" 
              class="text-gray-600 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium"
              :class="{ 'text-blue-600 bg-blue-50': $route.name === 'Demo' }"
            >
              Demo
            </router-link>
            <router-link 
              to="/list" 
              class="text-gray-600 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium"
              :class="{ 'text-blue-600 bg-blue-50': $route.name === 'DoctypeList' }"
            >
              DocTypes
            </router-link>
            <router-link 
              to="/create" 
              class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md text-sm font-medium inline-flex items-center"
            >
              <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
              </svg>
              Create
            </router-link>
          </div>
        </div>
      </div>
    </nav>

    <!-- Main Content -->
    <main class="flex-1">
      <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <!-- Error Boundary -->
        <div v-if="error" class="rounded-md bg-red-50 p-4 mb-6">
          <div class="flex">
            <div class="flex-shrink-0">
              <svg class="h-5 w-5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.962-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
              </svg>
            </div>
            <div class="ml-3">
              <h3 class="text-sm font-medium text-red-800">Application Error</h3>
              <p class="mt-1 text-sm text-red-700">{{ error }}</p>
              <button 
                @click="clearError"
                class="mt-2 text-sm text-red-800 underline hover:text-red-900"
              >
                Dismiss
              </button>
            </div>
          </div>
        </div>

        <!-- Router View with Transition -->
        <router-view v-slot="{ Component, route }">
          <transition 
            name="page" 
            mode="out-in"
            @enter="onEnter"
            @leave="onLeave"
          >
            <component 
              :is="Component" 
              :key="route.path"
              @error="handleError"
            />
          </transition>
        </router-view>
      </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-200 mt-auto">
      <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
        <p class="text-center text-sm text-gray-500">
          DocTypes - Dynamic Document Management System
        </p>
      </div>
    </footer>
  </div>
</template>

<script>
import { ref, onErrorCaptured } from 'vue';

export default {
  name: 'App',
  setup() {
    const isLoading = ref(false);
    const error = ref(null);

    // Error handling
    const handleError = (err) => {
      console.error('Component error:', err);
      error.value = typeof err === 'string' ? err : err.message || 'An unexpected error occurred';
    };

    const clearError = () => {
      error.value = null;
    };

    // Global error boundary
    onErrorCaptured((err, instance, info) => {
      console.error('Error captured:', err, info);
      handleError(err);
      return false;
    });

    // Transition handlers
    const onEnter = () => {
      isLoading.value = false;
    };

    const onLeave = () => {
      isLoading.value = true;
    };

    return {
      isLoading,
      error,
      handleError,
      clearError,
      onEnter,
      onLeave
    };
  }
};
</script>

<style scoped>
/* Page transitions */
.page-enter-active,
.page-leave-active {
  transition: all 0.3s ease;
}

.page-enter-from {
  opacity: 0;
  transform: translateX(10px);
}

.page-leave-to {
  opacity: 0;
  transform: translateX(-10px);
}

/* Custom scrollbar */
::-webkit-scrollbar {
  width: 6px;
}

::-webkit-scrollbar-track {
  background: #f1f1f1;
}

::-webkit-scrollbar-thumb {
  background: #c1c1c1;
  border-radius: 3px;
}

::-webkit-scrollbar-thumb:hover {
  background: #a8a8a8;
}
</style>