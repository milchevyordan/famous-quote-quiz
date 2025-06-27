<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import { Attempt } from '@/types';
import GuestAppLayout from '@/layouts/GuestAppLayout.vue';
import { dateTimeToLocaleString } from '@/utils';

defineProps<{
    attempt?: Attempt;
    topScorers: Attempt[];
}>();

function formatSecondsToHHMMSS(seconds: number) {
    const hrs = Math.floor(seconds / 3600).toString().padStart(2, '0');
    const mins = Math.floor((seconds % 3600) / 60).toString().padStart(2, '0');
    const secs = Math.floor(seconds % 60).toString().padStart(2, '0');
    return `${hrs}:${mins}:${secs}`;
}
</script>

<template>
    <Head title="Welcome" />

    <GuestAppLayout>
        <!-- Leaderboard Section -->
        <div
            class="flex-1 rounded-bl-lg rounded-br-lg bg-white p-6 pb-12 text-[13px] leading-[20px] shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] lg:rounded-br-none lg:rounded-tl-lg lg:p-20 dark:bg-[#161615] dark:text-[#EDEDEC] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d]"
        >
            <!-- Guest User Score -->
            <div
                v-if="attempt"
                class="mb-8 rounded-2xl border border-indigo-300 bg-indigo-50 p-6 text-sm text-indigo-900 shadow-sm dark:border-indigo-500 dark:bg-indigo-950 dark:text-indigo-200"
            >
                <div class="mb-2 flex items-center gap-2">
                    <span class="text-xl">🎯</span>
                    <h3 class="text-base font-semibold">Your Result</h3>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-8 gap-y-2">
                    <div>
                        <p class="text-xs font-medium text-indigo-600 dark:text-indigo-400">Name</p>
                        <p class="font-semibold">{{ attempt.guest_user?.name }} {{ attempt.guest_user?.last_name }}</p>
                    </div>
                    <div>
                        <p class="text-xs font-medium text-indigo-600 dark:text-indigo-400">Email</p>
                        <p>{{ attempt.guest_user?.email }}</p>
                    </div>
                    <div>
                        <p class="text-xs font-medium text-indigo-600 dark:text-indigo-400">Total Score</p>
                        <p class="font-semibold">{{ attempt.total_score }}%</p>
                    </div>
                    <div>
                        <p class="text-xs font-medium text-indigo-600 dark:text-indigo-400">Time Used</p>
                        <p>{{ formatSecondsToHHMMSS(attempt.time_taken_seconds) }}</p>
                    </div>
                </div>

                <div class="pt-3">
                    <Link
                        class="inline-flex items-center rounded-md border border-transparent bg-gray-800 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-white transition duration-150 ease-in-out hover:bg-gray-700 focus:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 active:bg-gray-900 dark:bg-gray-200 dark:text-gray-800 dark:hover:bg-white dark:focus:bg-white dark:focus:ring-offset-gray-800 dark:active:bg-gray-300"
                        :href="route('home', attempt.guest_user?.id)"
                    >
                        Restart
                    </Link>
                </div>
            </div>

            <h2 class="mb-4 text-xl font-semibold text-gray-800 dark:text-gray-100">🏆 Leaderboard</h2>

            <!-- Leaderboard Table -->
            <table class="w-full table-auto border-collapse text-left text-sm">
                <thead>
                <tr class="border-b border-gray-300 bg-gray-100 text-xs font-semibold uppercase tracking-wide text-gray-600 dark:border-gray-700 dark:bg-[#1f1f1f] dark:text-gray-300">
                    <th class="px-4 py-3">#</th>
                    <th class="px-4 py-3">Name</th>
                    <th class="px-4 py-3">Email</th>
                    <th class="px-4 py-3">Total Score</th>
                    <th class="px-4 py-3">Time Used</th>
                    <th class="px-4 py-3">Submit Date</th>
                </tr>
                </thead>
                <tbody>
                <tr
                    v-for="(attemptItem, index) in topScorers"
                    :key="attemptItem.id"
                    class="border-b border-gray-100 even:bg-gray-50 dark:border-gray-800 dark:even:bg-[#1a1a1a] hover:bg-gray-100 dark:hover:bg-[#2a2a2a]"
                >
                    <td class="px-4 py-3 text-gray-500 dark:text-gray-400">{{ index + 1 }}</td>
                    <td class="px-4 py-3 font-medium text-indigo-600 dark:text-indigo-400">
                        {{ attemptItem.guest_user?.name }} {{ attemptItem.guest_user?.last_name }}
                    </td>
                    <td class="px-4 py-3">{{ attemptItem.guest_user?.email }}</td>
                    <td class="px-4 py-3">{{ attemptItem.total_score }}%</td>
                    <td class="px-4 py-3">{{ formatSecondsToHHMMSS(attemptItem.time_taken_seconds) }}</td>
                    <td class="px-4 py-3">{{ dateTimeToLocaleString(attemptItem.created_at) }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </GuestAppLayout>
</template>

