<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import { GuestUser } from '@/types';
import GuestAppLayout from '@/layouts/GuestAppLayout.vue';

defineProps<{
    topScorers?: GuestUser[];
}>();


</script>

<template>
    <Head title="Welcome" />
    <GuestAppLayout>
        <!-- Leaderboard Section -->
        <div
            class="flex-1 rounded-bl-lg rounded-br-lg bg-white p-6 pb-12 text-[13px] leading-[20px] shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] lg:rounded-br-none lg:rounded-tl-lg lg:p-20 dark:bg-[#161615] dark:text-[#EDEDEC] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d]"
        >
            <h2 class="mb-4 text-xl font-semibold text-gray-800 dark:text-gray-100">🏆 Leaderboard</h2>

            <table class="w-full table-auto border-collapse text-left text-sm">
                <thead>
                <tr class="border-b border-gray-300 bg-gray-100 text-xs font-semibold uppercase tracking-wide text-gray-600 dark:border-gray-700 dark:bg-[#1f1f1f] dark:text-gray-300">
                    <th class="px-4 py-3">#</th>
                    <th class="px-4 py-3">Name</th>
                    <th class="px-4 py-3">Email</th>
                    <th class="px-4 py-3">Total Score</th>
                    <th class="px-4 py-3">Time Used</th>
                </tr>
                </thead>
                <tbody>
                <tr
                    v-for="(guestUser, index) in topScorers"
                    :key="guestUser.id"
                    class="border-b border-gray-100 even:bg-gray-50 dark:border-gray-800 dark:even:bg-[#1a1a1a] hover:bg-gray-100 dark:hover:bg-[#2a2a2a]"
                >
                    <td class="px-4 py-3 text-gray-500 dark:text-gray-400">{{ index + 1 }}</td>
                    <td class="px-4 py-3 font-medium text-indigo-600 dark:text-indigo-400">
                        {{ guestUser.name }} {{ guestUser.last_name }}
                    </td>
                    <td class="px-4 py-3">{{ guestUser.email }}</td>
                    <td class="px-4 py-3">{{ guestUser.total_score }} out of 10</td>
                    <td class="px-4 py-3">{{ guestUser.time_taken_seconds }} seconds</td>
                </tr>
                </tbody>
            </table>

        </div>

    </GuestAppLayout>
</template>
