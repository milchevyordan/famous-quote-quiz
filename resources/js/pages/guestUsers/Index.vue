<script setup lang="ts">
import {Head} from "@inertiajs/vue3";
import Table from "@/DataTable/Table.vue";
import { DataTable } from "@/DataTable/types";
import { type BreadcrumbItem, GuestUser} from '@/types';
import {dateTimeToLocaleString} from "@/utils";
import AppLayout from "@/layouts/AppLayout.vue";

defineProps<{
    dataTable: DataTable<GuestUser>;
}>();

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Guest Users',
        href: 'guest.user',
    },
];
</script>

<template>
    <Head :title="'Guest Users'" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div
                    class="bg-white shadow-sm sm:rounded-lg dark:bg-gray-800"
                >
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <Table
                            :data-table="dataTable"
                            :per-page-options="[5, 10, 15, 20, 50]"
                            :global-search="true"
                            :advanced-filters="false"
                        >
                            <template #cell(updated_at)="{ value, item }">
                                {{ dateTimeToLocaleString(value) }}
                            </template>
                        </Table>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
