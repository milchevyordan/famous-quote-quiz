<script setup lang="ts">
import {Head, useForm} from "@inertiajs/vue3";
import {ref} from "vue";

import ChangeLogs from "@/components/HTML/ChangeLogs.vue";
import ResetSaveButtons from "@/components/HTML/ResetSaveButtons.vue";
import Modal from "@/components/Modal.vue";
import Table from "@/DataTable/Table.vue";
import { DataTable } from "@/DataTable/types";
import IconPencilSquare from "@/icons/PencilSquare.vue";
import IconTrash from "@/icons/Trash.vue";
import { type BreadcrumbItem, ChangeLog, QuizQuestionForm, User } from '@/types';
import {dateTimeToLocaleString} from "@/utils";
import AppLayout from "@/layouts/AppLayout.vue";
import InputLabel from "@/components/InputLabel.vue";
import TextInput from "@/components/TextInput.vue";
import InputError from "@/components/InputError.vue";

defineProps<{
    dataTable: DataTable<User>;
    changeLogsLimited: ChangeLog[];
    changeLogs?: DataTable<ChangeLog>;
}>();

const modelDefaults: QuizQuestionForm = {
    id: null!,
    question: null!,
    is_binary: true,
    binary_correct_answer: null!,
};

const showCreateModal = ref(false);
const showUpdateModal = ref(false);
const showDeleteModal = ref(false);

const openCreateModal = () => {
    showCreateModal.value = true;
};

const closeCreateModal = () => {
    showCreateModal.value = false;
    storeForm.reset();
};

const closeUpdateModal = () => {
    showUpdateModal.value = false;
    updateForm.reset();
};

const closeDeleteModal = () => {
    showDeleteModal.value = false;
    deleteForm.reset();
};

const showDeleteForm = (id: number) => {
    showDeleteModal.value = true;
    deleteForm.id = id;
};

const showEditForm = (item: QuizQuestionForm) => {
    updateForm.id = item.id;
    updateForm.question = item.question;
    updateForm.is_binary = item.is_binary;
    updateForm.binary_correct_answer = item.binary_correct_answer;

    showUpdateModal.value = true;
};

const storeForm = useForm<QuizQuestionForm>(modelDefaults);
const updateForm = useForm<QuizQuestionForm>(modelDefaults);
const deleteForm = useForm<QuizQuestionForm>(modelDefaults);

const store = () => {
    storeForm.post(route("quiz.questions.store"), {
        preserveScroll: true,
    });
    closeCreateModal();
};

const update = () => {
    updateForm.put(route("quiz.questions.update", updateForm.id as number), {
        preserveScroll: true,
        onSuccess: () => {
            closeUpdateModal();
            updateForm.reset();
        },
        onError: () => {},
    });
};

const handleDelete = () => {
    deleteForm.delete(route("quiz.questions.destroy", deleteForm.id as number), {
        preserveScroll: true,
    });
    closeDeleteModal();
};

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Quiz Questions',
        href: 'quiz.question',
    },
];
</script>

<template>
    <Head :title="'Quiz Questions'" />

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
                            <template #additionalContent>
                                <div class="w-full flex gap-2">
                                    <button
                                        class="w-full md:w-auto border border-gray-300 dark:border-gray-700 rounded-md px-5 py-1.5 active:scale-95 transition hover:bg-gray-50 dark:hover:bg-gray-800"
                                        @click="openCreateModal"
                                    >
                                        Create Quiz Question
                                    </button>
                                </div>
                            </template>

                            <template #cell(created_at)="{ value, item }">
                                {{ dateTimeToLocaleString(value) }}
                            </template>

                            <template #cell(action)="{ value, item }">
                                <div class="flex gap-1.5">
                                    <button
                                        class="border border-gray-300 dark:border-gray-700 rounded-md p-1 active:scale-90 transition"
                                        :title="'Edit question'"
                                        @click="showEditForm(item)"
                                    >
                                        <IconPencilSquare
                                            classes="w-4 h-4 "
                                        />
                                    </button>

                                    <button
                                        :title="'Delete'"
                                        class="border border-gray-300 dark:border-gray-700 rounded-md p-1 active:scale-90 transition"
                                        @click="showDeleteForm(item)"
                                    >
                                        <IconTrash classes="w-4 h-4 " />
                                    </button>
                                </div>
                            </template>
                        </Table>
                    </div>
                </div>

                <ChangeLogs
                    :change-logs-limited="changeLogsLimited"
                    :change-logs="changeLogs"
                    :show-id="true"
                />
            </div>
        </div>
    </AppLayout>

    <Modal
        :show="showCreateModal"
        max-width="lg"
        @close="closeCreateModal"
    >
        <div
            class="border-b border-gray-100 dark:border-gray-700 px-3.5 p-3 text-xl font-medium"
        >
            <div>Create Quiz Question</div>
        </div>

        <form
            class="p-6"
            @submit.prevent="store"
        >
            <div>
                <InputLabel
                    for="question"
                    :value="`Question`"
                />

                <TextInput
                    id="quantity"
                    v-model="storeForm.question"
                    type="text"
                    :placeholder="'Question'"
                    class="mt-1 block w-full mb-3.5"
                />

<!--                <InputError-->
<!--                    class="mt-2"-->
<!--                    :message="storeForm.errors.question"-->
<!--                />-->
            </div>

            <div class="col-span-2 flex justify-end gap-3 my-2 pt-1 px-4">
                <ResetSaveButtons
                    :processing="storeForm.processing"
                    :recently-successful="storeForm.recentlySuccessful"
                    @reset="closeCreateModal"
                />
            </div>
        </form>
    </Modal>
</template>
